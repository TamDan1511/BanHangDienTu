<template>
    <index-item v-slot:MainRight :user="userLogin">
        <div class="h-100 p-3 bg-form">
            <h5 class="d-inline-block font-weight-bold">Thêm người dùng</h5>
            <ul class="nav">
            	<li class="nav-item mr-2 ml-auto">
            		<button class="btn btn-warning" @click="form('save')">
            			<img src="https://img.icons8.com/office/24/000000/save.png"/>
            			 <span class="pl-2">Lưu</span>
            		</button>
            	</li>
            	<li class="nav-item mr-2">
            		<button class="btn btn-info">
            			<img src="https://img.icons8.com/office/24/000000/add--v1.png"/>
            			 <span class="pl-2">Lưu & thêm mới</span>
            		</button>
            	</li>
            	<li class="nav-item mr-2">
            		<button class="btn btn-success">
            			<img src="https://img.icons8.com/color/24/000000/save-close--v1.png"/>
            			 <span class="pl-2">Lưu & Thoát</span>
            		</button>
            	</li>
                <li class="nav-item">
                    <router-link :to="{name: 'UserIndex'}" class="btn btn-danger">
                        <img src="https://img.icons8.com/color/24/000000/moved-topic.png" />
                        <span class="pl-2">Quay lại</span>
                    </router-link>
                </li>
            </ul>
            <div class="mt-4 row">
                <div class="col-5 mx-auto">
                    <form action="Form.vue">
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label font-weight-bold">Họ tên</label>
                            <div class="col-sm-9">
                                <input type="text" v-model="userModel.name" class="form-control" placeholder="Nhập tên của bạn" name="name" id="name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-3 col-form-label font-weight-bold">Email</label>
                            <div class="col-sm-9">
                                <input type="email" v-model="userModel.email" placeholder="Nhập địa chỉ email" class="form-control" name="email" id="email">
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
                                <input type="password" v-model="userModel.password" placeholder="Nhập mật khẩu" class="form-control" name="password" id="password">
                            </div>
                        </div>
                        <div class="form-group row" v-if="userModel.id == 'undefined'">
                            <label for="confirmpassword" class="col-sm-3 col-form-label font-weight-bold">Nhập lại mật khẩu</label>
                            <div class="col-sm-9">
                                <input type="password" v-model="userModel.confirmpassword" placeholder="Nhập lại mật khẩu" class="form-control" name="confirmpassword" id="confirmpassword">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </index-item>
</template>
<script>
import IndexItem from '../Index.vue';
import RepositoryFactory from '../../../repositoryfactory/RepositoryFactory.js';
const UserRepository = RepositoryFactory.get('user');
export default {
    name: 'UserForm',
    metaInfo() {
        return {
            title: this.title
        } 
    },
    data: function() {
        return {
        	title: 'Thêm người dùng',
            isActive: false,
            userLogin: 			{},
            path: 				'/upload/user/',
            isActive: 			false,
            userModel: {    name: 				'',
                            email: 				'',
                            status: 			1,
                            isAdmin: 			1,
                            password: 			'',
                            confirmpassword: 	''
                       }
        }
    },
    components: {
        IndexItem
    },
    async created() {
        let data = await UserRepository.checkLogin(this);
        this.userLogin = data.user;
        console.log(this.userModel.id)

    },
    methods: {
    	form: async function(type){
    		let user = {
    			name: 				this.name,
    			email: 				this.email,
    			status:   			this.status,
    			isAdmin:  			this.isAdmin,
    			password: 			this.password,
    			confirmpassword: 	this.confirmpassword
    		};

    		this.$loading.show({delay:0, background:'rgba(246, 246, 246, 0.5)'}) ;  
    		let userModel = await UserRepository.form(user, type, this);
    		this.$loading.hide();

            if(userModel.status == 200){
                this.isActive = true;
                
                setTimeout(() => { this.isActive = false }, 3000);

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
