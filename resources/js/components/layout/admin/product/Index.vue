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
                <table class="table table-striped  text-center" id="userList" v-if="products.length > 0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Hình ảnh</th>
                            <th>Tên sản phẩm</th>
                            <th>Giá</th>    
                            <th>Số lượng</th>
                            <th>Giảm giá</th>
                            <th>Thời gian giảm giá</th>
                            <th>Trạng thái</th>
                            <th>Cập nhật</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                            <tr v-for="(product, index) in products" :key="product.id" class="delete">
                                <td>{{ setStt(index)}}</td>
                                                
                                <td>   
                                    <img :src="setPicturePath(product.picture)" class="picture">
                                </td>
                               <td width="200">{{ product.name }}</td>
                               <td>{{ product.price }}</td>
                               <td>{{ product.quantities }}</td>
                               <td>{{ product.discount }}</td>
                               <td>{{ product.time_discount }}</td>
                                <td>
                                    <button v-if="product.status == 1" @click="changeActive(product)" class="btn btn-success btn-sm">
                                        <i class="fa fa-check-circle mr-2" aria-hidden="true"></i>Kích hoạt</button>
                                    <button v-else class="btn btn-danger btn-sm" @click="changeActive(category)">
                                        <i class="mr-2 fa fa-times-circle" aria-hidden="true"></i>Không kích hoạt</button>
                                </td>
            
                                <td>
                                    {{product.updated_at}}
                                    <p class="font-weight-bold">{{ product.nameUpdate}}</p>
                                </td>
                                <td>
                                    <button data-toggle="modal" type="button" @click="showModal(product)"  data-target="#detail-product" class="btn btn-danger"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                    <router-link :to="{name: 'ProductEdit', query: {'sanpham': product.id}}" class="btn btn-warning"><i class="fa fa-pencil-square" aria-hidden="true"></i></router-link>
                                    <button @click="deleteItem(product.id)" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                </td>
                            </tr>
                 
                    </tbody>
                </table>
                <p v-else class="text-center text-danger">không có dữ liệu</p>
            </div>
            <div id="pagination mt-5">
                <pagination-item v-on:change-page="changePage" v-if="pagi != null && count > 6" :pagi="pagi"></pagination-item>
            </div>

            <detail-item :subPicture="subPicture" :product="productDetail" />
        </div>
 
        </template>
         
    </index-item>
</template>
<script>
import IndexItem from '../Index.vue';
import PaginationItem from '../Pagination.vue';
import DetailItem from './Detail.vue';
import RepositoryFactory from '../../../repositoryfactory/RepositoryFactory.js';
const ProductRepository = RepositoryFactory.get('product');
import {mapActions} from 'vuex';
 

export default {
    name: 'ProductItem',
    metaInfo: {
        title: 'Danh sách sản phẩm'
    },
    data: function() {
        return {
            path: '/upload/product/',
            products: [],
            pagi: null,
            active: 0,
            count: 0,
            level: '-',
            categoriesAll: [],
            productDetail: null,
            subPicture: [],

        }
    },
    components: {
        IndexItem,
        PaginationItem,
        DetailItem
    }, 
    async mounted() {

        this.$loading.show({ delay: 0, background: 'rgba(246, 246, 246, 0.5)' })
        const productData = await ProductRepository.getAll(this.$route.query.page);
        this.$loading.hide();
        this.pagi = productData.products;
        this.products = productData.products.data;
        this.categoriesAll = productData.categoriesAll;
        this.active = productData.active;
        this.count = productData.count;
        if (this.$route.params.isActive != null) {

            this.setMessage('Sửa thành công');
            if(this.$route.params.type == 'add')
                this.setMessage('Thêm thành công');
            this.setActive(true);

            setTimeout(() => { this.setActive(false) }, 3000);
        }

        $('#detail-product').on('hidden.bs.modal', function (event) {
           this.subPicture = []
        })
         
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
        setPicturePath(picture){
            let str = picture.split('.');
            return this.path + str[0] + '-200x150.' + str[1];
        }, 
        async showModal(product){
            let sub_picture = await ProductRepository.getSubPicture(product.id);
            this.subPicture.splice(0, 0, product);
            this.subPicture = sub_picture;
            this.productDetail = product;
           
             
        }
     
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

.picture{
    width: 100px;
    height: 130px;
    object-fit: fill;
    border-radius: 5px;
}
#second #second-track{
	text-align: center !important;
}
#second .splide__list{
	display: inline-block;
}
 
</style>
