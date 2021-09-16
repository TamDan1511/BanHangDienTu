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
                            <label for="name" class="col-sm-3 col-form-label font-weight-bold">Tên danh mục:</label>
                            <div class="col-sm-9">
                                <input type="text" :class="{'is-invalid': errors.name, 'is-valid': category.name}" v-model="category.name" class="form-control" placeholder="Nhập tên danh mục" name="name" id="name">
                                <div v-if="errors.name" class="invalid-feedback">
                                    {{errors.name[0]}}
                                </div>
                            </div>

                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label font-weight-bold">Icon:</label>
                            <div class="col-sm-9">
                                <div class="custom-file">
                                    <input type="file" :class="{'is-invalid': errors.icon, 'is-valid': category.icon}" class="custom-file-input" id="customFile" @change="setPicture">
                                    <label class="custom-file-label" for="customFile">Chọn icon</label>
                                    <div v-if="errors.icon" class="invalid-feedback">
                                        {{errors.icon[0]}}
                                    </div>
                                </div>
                                <div v-if="category.icon != null" class="my-2">
                                    <img :src="setPicturePath(category.icon)" />
                                </div>
                            </div>

                        </div>
                        <div class="form-group row">
                            <label for="status" class="col-sm-3 col-form-label font-weight-bold">Trạng thái</label>
                            <div class="col-sm-9">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" value="1" v-model="category.status" id="customRadioStatus1" checked name="status" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadioStatus1">Kích hoạt</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" value="0" v-model="category.status" id="customRadioStatus2" name="status" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadioStatus2">Không kích hoạt</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="status" class="col-sm-3 col-form-label font-weight-bold">Danh mục cha:</label>
                            <div class="col-sm-9">
                                <select class="custom-select parent-id" v-model="category.parent_id">
                                    <template v-for="item in categoriesAll">
                                        <option :value="item.id" v-if="item.id == category.parent_id" selected>{{ level.repeat(item.level * 4) + item.name + level.repeat(item.level * 4) }}</option>
                                        <option :value="item.id" :disabled="item.left > category.left && item.left < category.right || category.id == item.id" v-else>{{ level.repeat(item.level * 4) + item.name + level.repeat(item.level * 4) }}</option>
                                    </template>
                                </select>
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
const CategoryRepository = RepositoryFactory.get('category');
import {
    mapActions
} from 'vuex';
export default {
    name: 'CategoryEdit',
    metaInfo() {
        return {
            title: this.title
        }
    },
    data: function () {
        return {
            path: '/upload/category/',
            title: 'Sửa danh mục',
            category: {},
            errors: {},
            categoriesAll: [],
            level: '-',
        }
    },
    components: {
        IndexItem
    },
    async created() {
        if (this.$route.query.danhmuc != null) {
            let id = this.$route.query.danhmuc;
            this.category = await CategoryRepository.find(id);
            this.category._method = 'PUT';
        }
        if (this.$route.params.isActive != null) {
            if (this.$route.params.type == 'add')
                this.setMessage('Thêm thành công');
            this.setActive(true);
            setTimeout(() => {
                this.setActive(false)
            }, 3000);
        }

        let data = await CategoryRepository.getCategoryAll();
        this.categoriesAll = data.categoriesAll;
        $(".custom-file-input").on("change", function () {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").html(fileName);
        });
    },
    methods: {
        form: async function (type) {

            let category;
            this.$loading.show({
                delay: 0,
                background: 'rgba(246, 246, 246, 0.5)'
            });

            category = await CategoryRepository.update(this.category, type, this);
            this.$loading.hide();

            if (typeof category !== 'undefined') {
                if (category.status != 200) {
                    this.errors = category.errors;
                    for (const [key, value] of Object.entries(this.errors)) {
                        this.category[key] = '';

                    }
                } else {

                    this.setMessage('Sửa thành công');
                    this.setActive(true);

                    setTimeout(() => {
                        this.setActive(false)
                    }, 3000);
                }

            }
        },
        resetCategory() {
            return {
                name: '',
                status: 1,
                parent_id: 1
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
        setPicture(event) {
            this.category.icon = event.target.files[0];

        },
        setPicturePath(icon){
            if(!(icon instanceof File)){
                return this.path + icon;
            }else{
                let pic = this.category.icon;
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
