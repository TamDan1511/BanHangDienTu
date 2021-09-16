<template>
<div>
    <div class="modal fade" id="detail-product">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Thông tin chi tiết sản phẩm</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" v-if="subPicture.length > 0">
<<<<<<< HEAD
                    <div class="mt-5 clearfix">
=======
                    <div class="mt-5">
>>>>>>> f54b535ab842f3ea4ea9407da0eb228aeb7012b3
                        <splide :options="primaryOptions" ref="primary" id="primary" class="float-right">
                            <splide-slide v-for="picture in subPicture" :key="path + picture.picture">
                                <img :src="path + picture.picture" class="picture-primary">
                            </splide-slide>
                        </splide>
                        <splide :options="secondaryOptions" id="second" ref="secondary">
                            <template v-slot:controls>
                                <div class="splide__arrows">
                                    <button class="splide__arrow splide__arrow--prev rounded-circle btn px-3 py-2">
                                        <i class="fa fa-arrow-circle-o-down" aria-hidden="true"></i>
                                    </button>
                                    <button class="splide__arrow splide__arrow--next rounded-circle btn px-3 py-2">
                                        <i class="fa fa-arrow-circle-o-up" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </template>
                            <splide-slide v-for="picture in subPicture" :key="path + picture.picture">
                                <img :src="path + picture.picture">
                            </splide-slide>
                        </splide>
                    </div>
<<<<<<< HEAD
                    <div>
                        <table class="table mt-5 table-striped">
                            <tr class="mt-5 bg-first">
                                <th>Tên sản phẩm</th>
                                <td>{{product.name}}</td>
                            </tr>
                            <tr class="bg-second">
                                <th>Giá sản phẩm</th>
                                <td>{{formatMoney(product.price)}}</td>
                            </tr>
                            <tr class="bg-first">
                                <th>Số lượng sản phẩm</th>
                                <td>{{product.quantities}}</td>
                            </tr>
                            <tr class="bg-second">
                                <th>Giảm giá</th>
                                <td>{{formatMoney(product.discount)}}</td>
                            </tr>
                            <tr class="bg-first">
                                <th>Thời gian giảm giá</th>
                                <td>
                                    {{countDownDiscount(product.time_discount, product.id)}}
                                    <span :id="'time_discount-' + product.id"></span>
                                </td>
                            </tr>
                            <tr class="bg-second">
                                <th>Trạng thái</th>
                                <td>
                                    <button v-if="product.status == 1" class="btn btn-success btn-sm">
                                        <i class="fa fa-check-circle mr-2" aria-hidden="true"></i>Kích hoạt
                                    </button>
                                    <button v-else class="btn btn-danger btn-sm">
                                        <i class="mr-2 fa fa-times-circle" aria-hidden="true"></i>Không kích hoạt
                                    </button>
                                </td>
                            </tr>

                            <tr class="bg-first">
                                <th>Danh mục</th>
                                <td>
                                    <select v-model="product.category_id" class="custom-select custom-select-sm parent-id" style="max-width: 270px" @change="updateCategory($event.target.value)">
                                        <template v-for="item in categoriesAll">
                                            <option :value="item.id">{{ level.repeat(item.level * 4) + item.name + level.repeat(item.level * 4) }}</option>
                                        </template>
                                    </select>
                                </td>
                            </tr>
                            <tr class="bg-second">
                                <th>Tạo mới</th>
                                <td>
                                    <span>{{product.created_at}}</span>
                                    <p>{{product.nameCreate}}</p>
                                </td>
                            </tr>
                            <tr class="bg-first">
                                <th>Cập nhật</th>
                                <td>
                                    <span>{{product.updated_at}}</span>
                                    <p>{{product.nameUpdate}}</p>
                                </td>
                            </tr>
                            <tr class="bg-second">
                                <th colspan="2" class="text-center" style="font-size: 1.3rem">
                                    Thông tin chi tiết
                                </th>

                            </tr>
                            <tr v-for="(option, index) in product.options" :key="index" :class="{'table-secondary': index % 2 == 0, 'table-success': index % 2 != 0}">
                                <th>{{ option.key }}</th>
                                <td>{{ option.value }}</td>
                            </tr>
                            <tr class="bg-first" v-if="product.options == null">
                                <th colspan="2" class="text-center text-danger">
                                     không có dữ liệu
                                </th>
                            </tr>

                            <tr class="bg-second">
                                <th colspan="2" class="text-center" style="font-size: 1.3rem">
                                    Mô tả
                                </th>
                            </tr>

                            <tr class="bg-white" v-if="product.description != null">
                                <td v-html="product.description" colspan="2">

                                </td>
                            </tr>
                            <tr v-else class="bg-second">
                                <th colspan="2" class="text-center text-danger">
                                     không có dữ liệu
                                </th>
                            </tr>

                        </table>
                    </div>
=======
>>>>>>> f54b535ab842f3ea4ea9407da0eb228aeb7012b3
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                </div>
            </div>
        </div>
    </div>

</div>
</template>

<script>
import {
    Splide,
    SplideSlide
} from '@splidejs/vue-splide';
<<<<<<< HEAD
import RepositoryFactory from '../../../repositoryfactory/RepositoryFactory.js';
const ProductRepository = RepositoryFactory.get('product');
import moment from 'moment';

import {mapActions} from 'vuex';
=======
// import '@splidejs/splide/dist/css/themes/splide-default.min.css';
 
>>>>>>> f54b535ab842f3ea4ea9407da0eb228aeb7012b3
export default {
    name: 'DetailItem',
    props: {
        product: Object,
<<<<<<< HEAD
        subPicture: [],
        categoriesAll: []  
    },

=======
        subPicture: []
    },
     
>>>>>>> f54b535ab842f3ea4ea9407da0eb228aeb7012b3
    components: {
        Splide,
        SplideSlide,
    },
    data: function () {
        return {
            path: '/upload/product/',
            primaryOptions: {
                type: 'fade',
                height: 300,
                width: 550,
                rewind: true,
                pagination: false,
                arrows: false,

            },
            secondaryOptions: {
                fixedWidth: 120,
                fixedHeight: 100,
                height: 270,
                gap: 10,
                width: 216,
                rewind: true,
                cover: true,
                direction: 'ttb',
                pagination: false,
                isNavigation: true,
<<<<<<< HEAD

            },
            idsIntervar: [],
            level: '-'

        }
    },
    
    methods: {
        ...mapActions('message', [
            'setMessage', 'setFlag', 'setActive'
        ]),
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
                        $('#time_discount-' + id).empty();
                        $('#time_discount-' + id).append('<span>'+ day +' ngày </span> '+ moment(datetime).format('HH:mm:ss') +'');
                    }else{
                        clearInterval(countDownid);
                        return;
                    }
                }, 1000);

                 
            }else{
                $('#time-discount-' + id).empty();
            }
             
        },
        clearSetIntervar(){     
            this.idsIntervar.forEach((i) => {clearInterval(i)});
        },
        async updateCategory(category_id){
            this.$loading.show({ delay: 0, background: 'rgba(246, 246, 246, 0.5)' })
            const affected = await ProductRepository.updateCategory(this.product.id, category_id);
            this.$loading.hide();

            if (affected == true) {
               
                this.product.category_id = category_id ;
                
                this.setMessage('Sửa thành công');
                this.setFlag(true);
                this.setActive(true);
                
                setTimeout(() => { this.setActive(false); }, 3000);
            }
        }
    },
    mounted(){
        let vmThis = this;
        $('#detail-product').on('hidden.bs.modal', function (event) {
            vmThis.clearSetIntervar();
        })
    },
    watch: {
        product: function(){
           
            if(typeof this.product.options  == 'string')
                this.product.options = JSON.parse(this.product.options)
        }
    },
    updated() {
        if (this.subPicture.length > 0)
            this.$refs.primary.sync(this.$refs.secondary.splide);
=======
                 
            } 

        }
    }, 
    updated() {    
  
        this.$refs.primary.sync(this.$refs.secondary.splide);
>>>>>>> f54b535ab842f3ea4ea9407da0eb228aeb7012b3
    }
}
</script>

<style lang="scss" scoped>
.picture-primary {
    object-fit: fill;
    height: 300px !important;
    border: 4px solid#f1f8e9;
    border-radius: 5px;
    width: 550px !important;
}
<<<<<<< HEAD

.splide__arrow--prev {
=======
.splide__arrow--prev{
>>>>>>> f54b535ab842f3ea4ea9407da0eb228aeb7012b3
    position: absolute;
    top: -57px;
    left: 40%;
    background-color: #f1f8e9;
}

<<<<<<< HEAD
.splide__arrow--next {
    position: absolute;
    bottom: -57px;
    background-color: #f1f8e9;
    left: 40%;
}

#second .splide__list .is-active {
    border: 4px solid#f1f8e9;
    border-radius: 5px;
}

.bg-first {
    background-color: #f1f8e9;
}

.bg-second {
    background-color: #e8f5e9;
}

.parent-id{
    text-align-last: center;
}

=======
.splide__arrow--next{
    position: absolute;
    bottom: -57px;
     background-color: #f1f8e9;
    left: 40%;
}
#second .splide__list .is-active{
    border: 4px solid#f1f8e9;
    border-radius: 5px;
}
>>>>>>> f54b535ab842f3ea4ea9407da0eb228aeb7012b3
</style>
