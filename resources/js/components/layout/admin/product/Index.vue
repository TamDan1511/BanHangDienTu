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
                               <td>{{ formatMoney(product.price) }}</td>
                               <td>{{ product.quantities }}</td>
                               <td>{{ formatMoney(product.discount)}}</td>
                               <td>
                                {{ countDownDiscount(product.time_discount, product.id)}}
                                <span :id="'time-discount-' + product.id" ></span>
                               </td>
                                <td>
                                    <button v-if="product.status == 1" @click="changeActive(product)" class="btn btn-success btn-sm">
                                        <i class="fa fa-check-circle mr-2" aria-hidden="true"></i>Kích hoạt
                                    </button>
                                    <button v-else class="btn btn-danger btn-sm" @click="changeActive(product)">
                                        <i class="mr-2 fa fa-times-circle" aria-hidden="true"></i>Không kích hoạt
                                    </button>
                                </td>
                                <td>
                                    <button data-toggle="modal" type="button" @click="showModal(product)"  data-target="#detail-product" class="btn btn-danger"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                    <button @click="clearSetIntervar(product)" class="btn btn-warning"><i class="fa fa-pencil-square" aria-hidden="true"></i></button>
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
           
            <detail-item :subPicture="subPicture" :product="productDetail" :categoriesAll="categoriesAll"/>
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
import moment from 'moment';
const CategoryRepository = RepositoryFactory.get('category');
 

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
            time_discount: '',
            idsIntervar: []

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
        this.active = productData.active;
        this.count = productData.count;
        if (this.$route.params.isActive != null) {

            this.setMessage('Sửa thành công');
            if(this.$route.params.type == 'add')
                this.setMessage('Thêm thành công');
            this.setActive(true);

            setTimeout(() => { this.setActive(false) }, 3000);
        }

        let vmThis = this;
        $('#detail-product').on('hidden.bs.modal', function (event) {
            vmThis.subPicture = []; 
        });

        const categoryData = await CategoryRepository.getCategoryAll();
        this.categoriesAll = categoryData.categoriesAll;
        this.categoriesAll.splice(0, 1);
   
    },
    methods: {
        
        changeActive: async function(product) {
            this.$loading.show({ delay: 0, background: 'rgba(246, 246, 246, 0.5)' })

            let updateStatus = { id: product.id, value: product.status};
             
            let update = await ProductRepository.changeActive(updateStatus);
            this.$loading.hide();
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
            this.$router.push({ name: "ProductItem", query: { page: page } });
            this.pagi = productData.products;
            this.products = productData.products.data;

        },
        deleteItem(id) {
            this.diaLogDelete(id);
        },

        diaLogDelete(id) {
            this.$dialog({
                title: 'Thông báo',
                content: 'Bạn có chắc muốn xóa không!',
                btns: [{
                        label: 'OK',
                        color: '#09f',
                        callback: async () => {   
                            this.$loading.show({ delay: 0, background: 'rgba(246, 246, 246, 0.5)' }) 
                            let del = await ProductRepository.deleteItem(id)
                            this.$loading.hide();
                            if(typeof del.error != 'undefined'){
                                this.setMessage('Đã có lỗi không thể xóa!');
                                this.setFlag(false);
                                this.setActive(true);
                                setTimeout(() => { this.setActive(false); }, 3000);    
                            }
                            else if(del > 0){
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
            this.subPicture = sub_picture;
            this.subPicture.splice(0, 0, product);
            this.productDetail = product;  
             
        },
        formatMoney(money) {
            var formatter = new Intl.NumberFormat('vi', {
                style: 'currency',
                currency: 'VND',
            });

            return formatter.format(money); /* $2,500.00 */
        },
        countDownDiscount(time_discount, id){
            
            let timeDc = moment(time_discount).valueOf();
            let currentTime = null;
            if(timeDc > currentTime){
                let day  = null;
                let time = null;        
                let hms = null;
                let countDownid = setInterval(() => {
                    this.idsIntervar.push(countDownid)
                    currentTime = moment().valueOf();
                    time = timeDc - currentTime;
                    if(time > 1000){
                        hms = moment.duration(time);
                        day = hms.days();
                        let datetime = moment(time - (7 * 60 * 60 * 1000)).format("YYYY-MM-DD HH:mm:ss")
                        $('#time-discount-' + id).empty();
                        $('#time-discount-' + id).append('<span>'+ day +' ngày </span> '+ moment(datetime).format('HH:mm:ss') +'');
                    }else{
                        clearInterval(countDownid);
                        return;
                    }
                }, 1000);

                 
            }else{
                $('#time-discount-' + id).empty();
            }
             
        },
        clearSetIntervar(product){     
            this.idsIntervar.forEach((i) => {clearInterval(i)});
            this.$router.push({name: 'ProductEdit', query: {'sanpham': product.id}})
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
