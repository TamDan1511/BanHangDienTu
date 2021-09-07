<template>
    <index-item>
        <template v-slot:MainRight>
            <div class="bg-white h-100 p-3">
            <h5 class="d-inline-block font-weight-bold">Danh sách sản phẩm</h5>
            <ul class="nav border-bottom pb-2 mt-3">
                <li class="nav-item mr-2">
                    <button class="btn btn-danger">Tổng: 
                        <span class="d-inline-block px-1 rounded-circle bg-white text-danger">{{count}}</span>
                    </button>
                </li>
                <li class="nav-item">
                    <button class="btn btn-info">Kích hoạt: 
                        <span class="d-inline-block px-1 rounded-circle bg-white text-danger">{{active}}</span>
                    </button>
                </li>
                <li class="nav-item ml-auto">
                    <router-link :to="{name: 'ProductStore'}" class="btn btn-warning">
                        <img src="https://img.icons8.com/color/24/000000/add-link.png" />
                        <span class="pl-2">Thêm mới</span>
                    </router-link>
                </li>
            </ul>
            <div class="mt-4">
                <table class="table table-striped  text-center" id="userList">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tên danh mục</th>    
                            <th>Danh mục cha</th>
                            <th>Di chuyển</th>
                            <th>Trạng thái</th>
                            <th>Tạo mới</th>
                            <th>Cập nhật</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                            <tr v-for="(product, index) in products" :key="product.id" class="delete">
                                <td>{{ setStt(index)}}</td>
                                                
                                <td>   
                                    <select class="custom-select custom-select-sm parent-id" style="max-width: 270px" @change="moveLeft(category.id, $event.target.value)">
                                        
                                    </select>
                              
                                </td>
                               
                                <td>
                                    <button v-if="product.status == 1" @click="changeActive(product)" class="btn btn-success btn-sm">
                                        <i class="fa fa-check-circle mr-2" aria-hidden="true"></i>Kích hoạt</button>
                                    <button v-else class="btn btn-danger btn-sm" @click="changeActive(category)">
                                        <i class="mr-2 fa fa-times-circle" aria-hidden="true"></i>Không kích hoạt</button>
                                </td>
            
                                <td>
                                    {{product.created_at}}
                                    <p class="font-weight-bold">{{ product.nameCreate}}</p>
                                </td>
                                <td>
                                    {{product.updated_at}}
                                    <p class="font-weight-bold">{{ product.nameUpdate}}</p>
                                </td>
                                <td>
                                    <router-link :to="{name: 'CategoryEdit', query: {'danhmuc': product.id}}" class="btn btn-warning"><i class="fa fa-pencil-square" aria-hidden="true"></i></router-link>
                                    <button @click="deleteItem(product.id)" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                </td>
                            </tr>
                 
                    </tbody>
                </table>
            </div>
            <div id="pagination mt-5">
                <pagination-item v-on:change-page="changePage" v-if="pagi != null" :pagi="pagi"></pagination-item>
            </div>
        </div>
        </template>
         
    </index-item>
</template>
<script>
import IndexItem from '../Index.vue';
import PaginationItem from '../Pagination.vue';
import RepositoryFactory from '../../../repositoryfactory/RepositoryFactory.js';
const ProductRepository = RepositoryFactory.get('product');
import {mapActions} from 'vuex';

export default {
    name: 'ProductItem',
    metaInfo: {
        title: 'Danh sách danh mục'
    },
    data: function() {
        return {
            path: '/upload/category/',
            products: [],
            pagi: null,
            active: 0,
            count: 0,
            level: '-',
            categoriesAll: []
        }
    },
    components: {
        IndexItem,
        PaginationItem
    },
    computed: {
         

    },
    async mounted() {

        // this.$loading.show({ delay: 0, background: 'rgba(246, 246, 246, 0.5)' })
        // const productData = await ProductRepository.getAll(this.$route.query.page);
        // this.$loading.hide();
        // this.pagi = productData.categories;
        // this.products = productData.categories.data;
        // this.categoriesAll = productData.categoriesAll;
        // this.active = productData.active;
        // this.count = productData.count;
        // if (this.$route.params.isActive != null) {

        //     this.setMessage('Sửa thành công');
        //     if(this.$route.params.type == 'add')
        //         this.setMessage('Thêm thành công');
        //     this.setActive(true);

        //     setTimeout(() => { this.setActive(false) }, 3000);
        // }
    },
    methods: {
        changeActive: async function(product) {
            this.$loading.show({ delay: 0, background: 'rgba(246, 246, 246, 0.5)' })

            let updateStatus = { id: product.id, value: product.status};

            let update = await ProductRepository.changeActive(updateStatus);
            this.$loading.hide()
            if (update == true) {
               
                product.status = (product.status == 1) ? 0 : 1;
                
                this.setMessage('Sửa thành công');
                this.setFlag(true);
                this.setActive(true);
                
                setTimeout(() => { this.setActive(false); }, 3000);
            }
        },

        changePage: async function(page) {
            this.$loading.show({ delay: 0, background: 'rgba(246, 246, 246, 0.5)' })

            const productData = await ProductRepository.getAll(page);
            this.$loading.hide();
            this.$router.push({ name: "CategoryItem", query: { page: page } });
            this.pagi = productData.products;
            this.products = categoryData.products.data;

        },
        deleteItem(id) {
            this.diaLogDelete(id);
        },

        diaLogDelete(id) {
            this.$dialog({
                title: 'Thông báo',
                content: 'Xóa tất cả dữ liệu bên trong danh mục này!',
                btns: [{
                        label: 'OK',
                        color: '#09f',
                        callback: async () => {   
                            this.$loading.show({ delay: 0, background: 'rgba(246, 246, 246, 0.5)' }) 
                            let del = await ProductRepository.deleteItem(id)
                            this.$loading.hide();
                            if(del > 0){
                                this.setMessage('Xóa thành công');
                                this.setFlag(true);
                                this.setActive(true);
                                setTimeout(() => { this.setActive(false); }, 3000);    
                                const productData = await ProductRepository.getAll(this.$route.query.page);
                                this.pagi = productData.products;
                                this.products = productData.products.data;
                                this.categoriesAll = productData.categoriesAll;
                                this.active = productData.active;
                                this.count = productData.count;
                               
                            }              
                        },
                    },
                    {
                        label: 'Cancel',
                        color: '#444' 
                    }
                ],
            })
        },
        setStt(i){    
            return (6 * this.pagi.current_page - 6) + i + 1;  
        },
        ...mapActions('message', [
				'setMessage',
				'setActive',
				'setFlag'
			]),
    }

}

</script>
<style>
#userList td {
    vertical-align: middle;
}

delete-item-leave-to {
    opacity: 0;
    transform: translateX(10px);
}

.delete {
    transition: all 0.5s ease;
}

.parent-id{
    text-align-last: center;
}

</style>
