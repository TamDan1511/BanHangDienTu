<template>
    <index-item>
        <template v-slot:MainRight> 
        <div class="h-100 p-3 bg-form">
            <h5 class="d-inline-block font-weight-bold">{{  title }}</h5>
            <ul class="nav">
                <li class="nav-item mr-2 ml-auto">
                    <button class="btn btn-warning" @click="form('save')">
                        <img src="https://img.icons8.com/office/24/000000/save.png" />
                        <span class="pl-2">Lưu</span>
                    </button>
                </li>
                <li class="nav-item mr-2">
                    <button class="btn btn-info" @click="form('save-add')">
                        <img src="https://img.icons8.com/office/24/000000/add--v1.png" />
                        <span class="pl-2">Lưu & thêm mới</span>
                    </button>
                </li>
                <li class="nav-item mr-2">
                    <button class="btn btn-success" @click="form('save-close')">
                        <img src="https://img.icons8.com/color/24/000000/save-close--v1.png" />
                        <span class="pl-2">Lưu & Thoát</span>
                    </button>
                </li>
                <li class="nav-item">
                    <button @click="back" class="btn btn-danger">
                        <img src="https://img.icons8.com/color/24/000000/moved-topic.png" />
                        <span class="pl-2">Quay lại</span>
                    </button>
                </li>
            </ul>
            <div class="mt-5 row">
                <div class="col-7">
                    <form action="Form.vue">
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label font-weight-bold">Tên sản phẩm:</label>
                            <div class="col-sm-9">
                                <input type="text" :class="{'is-invalid': errors.name, 'is-valid': product.name}" v-model="product.name" class="form-control" placeholder="Nhập tên sản phẩm" >
                                <div v-if="errors.name" class="invalid-feedback">
                                    {{errors.name[0]}}
                                </div>
                            </div>
                             
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label font-weight-bold">Giá sản phẩm:</label>
                            <div class="col-sm-9">
                                <input type="text" :class="{'is-invalid': errors.price, 'is-valid': product.price}" v-model="product.price" class="form-control" placeholder="Nhập giá sản phẩm">
                                <div v-if="errors.price" class="invalid-feedback">
                                {{errors.price[0]}}
                            </div>
                            </div>
                             
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label font-weight-bold">Số lượng sản phẩm:</label>
                            <div class="col-sm-9">
                                <input type="text" :class="{'is-invalid': errors.quantities, 'is-valid': product.quantities}" v-model="product.quantities" class="form-control" placeholder="Nhập số lượng sản phẩm">
                                <div v-if="errors.quantities" class="invalid-feedback">
                                {{errors.quantities[0]}}
                            </div>
                            </div>
                             
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label font-weight-bold">Giảm giá sản phẩm:</label>
                            <div class="col-sm-9">
                                <input type="text" :class="{'is-invalid': errors.discount, 'is-valid': product.discount}" v-model="product.discount" class="form-control" placeholder="Nhập giảm giá sản phẩm (VND)">
                                <div v-if="errors.discount" class="invalid-feedback">
                                {{errors.discount[0]}}
                            </div>
                            </div>     
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label font-weight-bold">Chọn thời gian giảm giá:</label>
                            <div class="col-sm-9">
                                <input type="datetime-local" :class="{'is-invalid': errors.time_discount, 'is-valid': product.time_discount}" v-model="product.time_discount" class="form-control">
                                <div v-if="errors.time_discount" class="invalid-feedback">
                                {{errors.time_discount[0]}}
                            </div>
                            </div>     
                        </div>
                        <div class="form-group row">
                            <label for="status" class="col-sm-3 col-form-label font-weight-bold">Trạng thái</label>
                            <div class="col-sm-9">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" value="1" v-model="product.status" id="customRadioStatus1" checked name="status" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadioStatus1">Kích hoạt</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" value="0" v-model="product.status" id="customRadioStatus2" name="status" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadioStatus2">Không kích hoạt</label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="status" class="col-sm-3 col-form-label font-weight-bold">Chọn danh mục:</label>
                            <div class="col-sm-9">
                                <select class="custom-select parent-id" v-model="product.category_id">
                                        <template v-for="item in categoriesAll">
                                            <option :disabled="item.id == 0" :value="item.id">{{ level.repeat(item.level * 4) + item.name + level.repeat(item.level * 4) }}</option>          
                                        </template>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="status" class="col-sm-3 col-form-label font-weight-bold">Hình ảnh chính:</label>
                            <div class="col-sm-9">
                                <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Chọn hình ảnh</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="status" class="col-sm-3 col-form-label font-weight-bold">Hình ảnh phụ:</label>
                            <div class="col-sm-9" style="min-height: 200px">
                                <div class="border bg-white h-100">
                                    <input type="file" multiple class="d-none" id="picture">
                                    <ul class="nav p-3" id="list-picture">
                                        <li class="nav-item mr-3 mb-3">
                                            <div @click.prevent="$('#picture').click()" style="border: 3px dotted #aa00ff; width: 100px; height: 120px;" class="text-center nav-link">
                                                <i style=" line-height: 100px" class="fa fa-plus"></i>
                                            </div>
                                        </li>
                                      
                                    </ul>
                                     
                                </div>  
                            </div>
                        </div>
                       <div class="form-group row">
                            <label for="status" class="col-sm-3 col-form-label font-weight-bold">Mô tả:</label>
                            <div class="col-sm-9">
                                  <textarea class="editor" id="editor"></textarea>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-5">
                     <div class="form-group row">
                            <label for="status" class="col-sm-5 col-form-label font-weight-bold">Thông tin chi tiết sản phẩm:</label>
                            <div class="col-sm-7">
                                <div class="row-option">
                                    <div @click="pushOption('down')" class=""><i class="fa fa-minus" aria-hidden="true"></i></div>
                                    <div class="d-inline-block border-left border-info border-right">{{ product.options.length }}</div>
                                    <div @click="pushOption('up')" class=""><i class="fa fa-plus" aria-hidden="true"></i></div>
                                </div>
                            </div>
                    </div>
                   
                    <div class="form-group row" v-for="(item, index) in product.options" :key="index">
                        <div class="col-sm-5">
                            <input type="text" v-model="item.key" class="form-control" placeholder="Tên thông số">
                        </div>
                        <div class="col-sm-7">
                            <input type="text" v-model="item.value" class="form-control" placeholder="Mô tả">
                        </div>
                         
                        
                    </div>
                </div> 
            </div>        
        </div>
        </template>
    </index-item>
</template>
<script>
import IndexItem from '../Index.vue';
import RepositoryFactory from '../../../repositoryfactory/RepositoryFactory.js';
const CategoryRepository = RepositoryFactory.get('category');
const ProductRepository = RepositoryFactory.get('category');
import {mapActions} from 'vuex';
 
export default {
    name: 'ProductStore',
    metaInfo() {
        return {
            title: this.title
        }
    },
    data: function() {
        return {
            title: 'Thêm sản phẩm',     
            path: '/upload/category/',
            product: this.resetProduct(),
            errors: {},
            categoriesAll: [],
            level: '-',
            
        }
    },
    components: {
        IndexItem,
       
    },
    async mounted(){  
       
        if(this.$route.params.isActive != null)
        {
            this.setMessage('Sửa thành công');
            this.setActive(true);
            setTimeout(() => { this.setActive(false)}, 3000);
        } 

        let data = await CategoryRepository.getCategoryAll();
        this.categoriesAll = data.categoriesAll;
        this.categoriesAll.splice(0, 1);
        this.categoriesAll.splice(0, 0, {id: 0, name: 'Vui lòng chọn danh muc', level: 0});     
        
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").html(fileName);
        });
        CKEDITOR.replace('editor');
        this.uploadPicture();
        this.$('.del-picture').click(function(){
            alert('abc');
        })
         
    },
    methods: {
        form: async function(type) {
           
            let product;
            this.$loading.show({ delay: 0, background: 'rgba(246, 246, 246, 0.5)' });

            product = await ProductRepository.store(this.product, type, this);
            this.$loading.hide();
             
            if (typeof product !== 'undefined') {
                if(product.status != 200 ){
                    this.errors = product.errors; 
                    for (const [key, value] of Object.entries(this.errors)) {
                       this.product[key] = '';

                    }
                }else{
                    this.setMessage('Thêm thành công');
                    this.setActive(true);
                    setTimeout(() => { this.setActive(false)}, 3000);
                    this.product = this.resetProduct();
                } 
                 
            }
        },
        resetProduct(){
            return {
                    name: '',
                    price: '',
                    quantities: '',
                    discount: '',
                    picture: '',
                    status: 1,
                    time_discount: null,
                    description: '',
                    options: [{key: '', value: ''}],
                    category_id: 0
                };
        },
        back() {
            this.$router.go(-1)
        },

        ...mapActions('message', [
				'setMessage',
				'setActive',
				'setFlag'
		]),

        pushOption(type){
            if(type == 'up'){
                this.product.options.push({key: '', value: ''})
            }else{
               this.product.options.splice(this.product.options.length - 1 , 1); 
            }
        },

        uploadPicture: function(){
            let rootThis = this;
            let listPicture  = this.$('#list-picture');
            this.$('#picture').change(function() {
                for(let i = 0; i < this.files.length; i++){
                    let li = document.createElement('li');
                    let img = document.createElement('img');
                    rootThis.$(li).append('<i class="fa fa-times-circle-o del-picture" aria-hidden="true"></i>');
                    li.classList.add('mr-2', 'mb-3')
                    listPicture.append(li);

                    img.src = URL.createObjectURL(this.files[i]);
                    img.classList.add('item-picture', 'img-thumbnail')
                    img.onload = function () {
                        URL.revokeObjectURL(this.src);
                    }
                    li.appendChild(img);
                    
                }  
             });
        } 

       
    } 
}
function delPicture(){
    console.log('abc')
}
</script>
<style>
.bg-form {
    background-color: #f1f8e9 !important;
}

.row{
    flex-wrap: nowrap !important;
}

.row-option{
    height: 30px;
    width: 100px;
    text-align: center;
    display: flex;
    border: 2px solid #9e9e9e;
    border-radius: 5px;
     
}

.row-option div:nth-child(2){
    width: 40px;
}

.row-option div:nth-child(1){
    width: 30px;
}
.row-option div:nth-child(3){
    width: 30px;
}
#list-picture li{
    position: relative;
    display: inline-block;
     
}

#list-picture .del-picture{
    position: absolute;
    z-index: 20;
    font-size: 1.4rem;
    right: -5px;
    top: -5px;
    color: red;
     
}
#list-picture li img{
    width: 100px;
    height: 120px;
    object-fit: cover;
}

</style>
