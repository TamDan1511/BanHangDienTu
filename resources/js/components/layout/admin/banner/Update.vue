<template>
<index-item>
    <template v-slot:MainRight>
        <div class="vh-100 p-3 bg-form">
            <h5 class="d-inline-block font-weight-bold">{{ title }}</h5>
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
            <div class="mt-4 row">
                <div class="col-5 mx-auto">
                     <form action="Form.vue">
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label font-weight-bold">Liên kết:</label>
                            <div class="col-sm-9">
                                <input type="text" :class="{'is-invalid': errors.url, 'is-valid': banner.url}" v-model="banner.url" class="form-control" placeholder="Nhập liên kết quảng cáo"  >
                                <div v-if="errors.url" class="invalid-feedback">
                                {{errors.url[0]}}
                            </div>
                            </div>
                             
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label font-weight-bold">Mô tả:</label>
                            <div class="col-sm-9">
                                <input type="text" :class="{'is-invalid': errors.description, 'is-valid': banner.description}" v-model="banner.description" class="form-control" placeholder="Nhập mô tả"  >
                                <div v-if="errors.description" class="invalid-feedback">
                                {{errors.description[0]}}
                            </div>
                            </div>
                             
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label font-weight-bold">Vị trí:</label>
                            <div class="col-sm-9">
                                <input type="text" :class="{'is-invalid': errors.position, 'is-valid': banner.position}" v-model="banner.position" class="form-control" placeholder="Nhập vị trí"  >
                                <div v-if="errors.position" class="invalid-feedback">
                                {{errors.position[0]}}
                            </div>
                            </div>
                             
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label font-weight-bold">Hình ảnh:</label>
                            <div class="col-sm-9">
                                <div class="custom-file">
                                    <input type="file" accept=".png, .jpg, .jpeg, .GIF, .WebP" :class="{'is-invalid': errors.picture, 'is-valid': banner.picture}" class="custom-file-input" id="customFile" @change="setPicture">
                                    <label class="custom-file-label" for="customFile">Chọn hình ảnh</label>
                                       
                                    <div v-if="errors.picture" class="invalid-feedback">
                                        {{errors.picture[0]}}
                                    </div>
                                </div>
                                 <div class="my-2">
                                    <img class="picture img-thumbnail" style="width: 100px; height: 130px; object-fit: fill" :src="setPicturePath(banner.picture)" />
                                 </div>
                            </div>
                             
                        </div>
                        <div class="form-group row">
                            <label for="status" class="col-sm-3 col-form-label font-weight-bold">Trạng thái</label>
                            <div class="col-sm-9">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" value="1" v-model="banner.status" id="customRadioStatus1" checked name="status" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadioStatus1">Kích hoạt</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" value="0" v-model="banner.status" id="customRadioStatus2" name="status" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadioStatus2">Không kích hoạt</label>
                                </div>
                            </div>
                        </div>
                        
                      
                    </form>
                </div>
            </div>
        </div>
    </template>
</index-item>
</template>

<script>
import IndexItem from '../Index.vue';
import RepositoryFactory from '../../../repositoryfactory/RepositoryFactory.js';
const BannerRepository = RepositoryFactory.get('banner');
import {
    mapActions
} from 'vuex';
export default {
    name: 'BannerEdit',
    metaInfo() {
        return {
            title: this.title
        }
    },
    data: function () {
        return {
            path: '/upload/banners/',
            title: 'Sửa quảng cáo',
            banner: this.resetBanner(),
            errors: {},
        }
    },
    components: {
        IndexItem
    },
    async created() {
        if (this.$route.query.banner != null) {
            let id = this.$route.query.banner;
            this.banner = await BannerRepository.find(id);
            this.banner._method = 'PUT';
        }
        if (this.$route.params.isActive != null) {
            if (this.$route.params.type == 'add')
                this.setMessage('Thêm thành công');
            this.setActive(true);
            setTimeout(() => {
                this.setActive(false)
            }, 3000);
        }

    },
    methods: {
        form: async function (type) {
            this.$loading.show({
                delay: 0,
                background: 'rgba(246, 246, 246, 0.5)'
            });

            let banner = await BannerRepository.update(this.banner, type, this);
            this.$loading.hide();

            if (typeof banner !== 'undefined') {
                if (banner.status != 200) {
                    this.errors = banner.errors;
                    for (const [key, value] of Object.entries(this.errors)) {
                        this.banner[key] = '';

                    }
                } else {
                    if (banner.affected > 0) {
                        this.setMessage('Sửa thành công');
                        this.setActive(true);
                    } else {
                        this.setMessage('Sửa thất bại');
                        this.setActive(false);
                    }

                    setTimeout(() => {
                        this.setActive(false)
                    }, 3000);
                }

            }
        },
        resetBanner(){
            return {
                    url: '',
                    status: 1,
                    position: '',
                    picture: '',
                    description: ''

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

        setPicture(event){
            this.banner.picture = event.target.files[0];
             
        },

        setPicturePath(picture){
            if(!(picture instanceof File)){
                let str = picture.split('.');
                return this.path + str[0] + '-600x300.' + str[1];
            }else{
                let pic = this.banner.picture;
                return URL.createObjectURL(pic);
            }
             
        }
    }
}
</script>

<style>
.bg-form {
    background-color: #f5f5f5;
}
</style>
