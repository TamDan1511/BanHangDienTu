<template>
    <index-item>
        <template v-slot:MainRight> 
        <div class="vh-100 p-3 bg-form">
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
            <div class="mt-4 row">
                <div class="col-5 mx-auto">
                    <form action="Form.vue">
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label font-weight-bold">Họ tên</label>
                            <div class="col-sm-9">
                                <input type="text" :class="{'is-invalid': errors.name, 'is-valid': userModel.name}" v-model="userModel.name" class="form-control" placeholder="Nhập tên của bạn" name="name" id="name">
                                <div v-if="errors.name" class="invalid-feedback">
                                {{errors.name[0]}}
                            </div>
                            </div>
                             
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-3 col-form-label font-weight-bold">Email</label>
                            <div class="col-sm-9">
                                <input type="email" :class="{'is-invalid': errors.email, 'is-valid': userModel.email}" v-model="userModel.email" placeholder="Nhập địa chỉ email" class="form-control" name="email" id="email">
                                 <div v-if="errors.email" class="invalid-feedback">
                                {{errors.email[0]}}
                            </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="status" class="col-sm-3 col-form-label font-weight-bold">Trạng thái</label>
                            <div class="col-sm-9">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" value="1" v-model="userModel.status" id="customRadioStatus1" checked name="status" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadioStatus1">Kích hoạt</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" value="0" v-model="userModel.status" id="customRadioStatus2" name="status" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadioStatus2">Không kích hoạt</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="status" class="col-sm-3 col-form-label font-weight-bold">Admin</label>
                            <div class="col-sm-9">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" value="1" v-model="userModel.isAdmin" id="customRadioisAdmin1" checked name="isAdmin" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadioisAdmin1">Kích hoạt</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" value="0" v-model="userModel.isAdmin" id="customRadioisAdmin2" name="isAdmin" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadioisAdmin2">Không kích hoạt</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-sm-3 col-form-label font-weight-bold">Mật khẩu</label>
                            <div class="col-sm-9">
                                <input type="password" :class="{'is-invalid': errors.password, 'is-valid': userModel.password}" v-model="userModel.password" placeholder="Nhập mật khẩu" class="form-control" name="password" id="password">
                                 <div v-if="errors.password" class="invalid-feedback">
                                {{errors.password[0]}}
                            </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="confirmpassword" class="col-sm-3 col-form-label font-weight-bold">Nhập lại mật khẩu</label>
                            <div class="col-sm-9">
                                <input type="password" :class="{'is-invalid': errors.confirmpassword, 'is-valid': userModel.confirmpassword}" v-model="userModel.confirmpassword" placeholder="Nhập lại mật khẩu" class="form-control" name="confirmpassword" id="confirmpassword">
                                <div v-if="errors.confirmpassword" class="invalid-feedback">
                                {{errors.confirmpassword[0]}}
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
const UserRepository = RepositoryFactory.get('user');
import {mapActions} from 'vuex';
export default {
    name: 'UserUpdate',
    metaInfo() {
        return {
            title: this.title
        }
    },
    data: function() {
        return {
            title: 'Sửa người dùng',
            path: '/upload/user/',
            userModel: {},
            errors: {}
        }
    },
    components: {
        IndexItem
    },
    async created() {

        if(this.$route.params.id != null){
            let id = this.$route.params.id;
            this.userModel = await UserRepository.find(id);
            this.userModel._method = 'PUT';
        }
        if(this.$route.params.isActive != null)
        {
            if(this.$route.params.type == 'add')
                this.setMessage('Thêm thành công');
            this.setActive(true);  
            setTimeout(() => { this.setActive(false)}, 3000);
        }
    
    },
    methods: {
        form: async function(type) {
           
            let userModel;
            this.$loading.show({ delay: 0, background: 'rgba(246, 246, 246, 0.5)' });
            if (this.userModel.password == null)
                this.userModel.password = '';
             
            if(this.userModel.confirmpassword == null)
                 this.userModel.confirmpassword = '';

            userModel = await UserRepository.update(this.userModel, type, this);
            this.$loading.hide();
             
            if (typeof userModel !== 'undefined') {
            	if(userModel.status != 200 ){
            		this.errors = userModel.errors; 
	                for (const [key, value] of Object.entries(this.errors)) {
	                   this.userModel[key] = '';

	                }
            	}else{
                    if(userModel.affected > 0)
	                    this.setMessage('Sửa thành công');
                    else
                        this.setMessage('Sửa thất bại');
                    this.setActive(true);  
	                 
	                setTimeout(() => { this.setActive(false)}, 3000);
                    this.errors = {};
	            } 
                 
            } 
        },
        resetUser(){
            return {
                    name: '',
                    email: '',
                    status: 1,
                    isAdmin: 1,
                    password: '',
                    confirmpassword: ''
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
