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
                            <label for="name" class="col-sm-3 col-form-label font-weight-bold">Tên Menu:</label>
                            <div class="col-sm-9">
                                <input type="text" :class="{'is-invalid': errors.name, 'is-valid': menu.name}" v-model="menu.name" class="form-control" placeholder="Nhập tên menu">
                                <div v-if="errors.name" class="invalid-feedback">
                                    {{errors.name[0]}}
                                </div>
                            </div>

                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label font-weight-bold">Tên Menu:</label>
                            <div class="col-sm-9">
                                <input type="text" :class="{'is-invalid': errors.url, 'is-valid': menu.url}" v-model="menu.url" class="form-control" placeholder="Nhập url">
                                <div v-if="errors.url" class="invalid-feedback">
                                    {{errors.url[0]}}
                                </div>
                            </div>

                        </div>
                        <div class="form-group row">
                            <label for="status" class="col-sm-3 col-form-label font-weight-bold">Trạng thái</label>
                            <div class="col-sm-9">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" value="1" v-model="menu.status" id="customRadioStatus1" checked name="status" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadioStatus1">Kích hoạt</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" value="0" v-model="menu.status" id="customRadioStatus2" name="status" class="custom-control-input">
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
const MenuRepository = RepositoryFactory.get('menu');
import {
    mapActions
} from 'vuex';
export default {
    name: 'MenuEdit',
    metaInfo() {
        return {
            title: this.title
        }
    },
    data: function () {
        return {
            title: 'Sửa menu',
            menu: this.resetMenu(),
            errors: {},
        }
    },
    components: {
        IndexItem
    },
    async created() {
        if (this.$route.query.menu != null) {
            let id = this.$route.query.menu;
            this.menu = await MenuRepository.find(id);
            this.menu._method = 'PUT';
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

            let menu = await MenuRepository.update(this.menu, type, this);
            this.$loading.hide();

            if (typeof menu !== 'undefined') {
                if (menu.status != 200) {
                    this.errors = menu.errors;
                    for (const [key, value] of Object.entries(this.errors)) {
                        this.menu[key] = '';

                    }
                } else {
                    if (menu.affected > 0) {
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
        resetMenu() {
            return {
                name: '',
                status: 1,
                url: '',

            };
        },
        back() {
            this.$router.go(-1)
        },

        ...mapActions('message', [
            'setMessage',
            'setActive',
            'setFlag'
        ])
    }
}
</script>

<style>
.bg-form {
    background-color: #f5f5f5;
}
</style>
