<template>
    <div id="login" class="vh-100">
        <div class="wrapper py-3 bg-white mx-auto text-center p-3 shadown rounded">
            <div class="rounded-circle bg-primary d-inline-block user">
                <i class="fa fa-user text-white" aria-hidden="true"></i>
            </div>
            <h4 class="text-primary my-4">Đăng nhập</h4>
            <form action="">
                <div class="input-group mb-4">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="email">
                            <i class="fa fa-user text-info" aria-hidden="true"></i>
                        </span>
                    </div>
                    <input type="text" class="form-control" :class="{'is-invalid': errors.email}" v-model="user.email" placeholder="Nhập email" aria-describedby="email">
                    <div class="invalid-feedback"  id="email">
                        {{errors.email}}
                    </div>

                </div>
                <div class="input-group position-relative">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="password">
                            <i class="fa fa-lock text-info" aria-hidden="true"></i>
                        </span>
                    </div>
                    <input :type="showPass ? 'text' : 'password'" class="form-control" :class="{'is-invalid': errors.password}" v-model="user.password" placeholder="Mật khẩu" aria-describedby="password">
                    <i class="fa position-absolute show-pass" :class="{'fa-eye' : showPass, 'fa-eye-slash': !showPass}" @click="showPass = !showPass" aria-hidden="true"></i>
                    <div class="invalid-feedback" id="password">
                        {{errors.password}}
                    </div>
                </div>
                <button class="btn btn-warning mt-3 font-weight-bold btn-block" @click.prevent="login">Đăng nhập
                    <div v-if="loading" class="ml-3 spinner-border spinner-border-sm text-primary" role="status">        
                    </div>
                </button>
                <router-link class="text-danger mt-3 d-inline-block text-right" to="/admin/password-forget">Quên mật khẩu?</router-link>
            </form>
        </div>
    </div>
</template>
<script>
import RepositoryFactory from '../../../repositoryfactory/RepositoryFactory.js';
const UserRepository = RepositoryFactory.get('user');

export default {
    name: 'Login',
    metaInfo: {
        title: 'Đăng nhập'
    },
    data() {
        return {
            user: {
                email: '',
                password: ''
            },
            errors: {},
            loading: false,
            showPass: false
        }
    },
    mounted(){
        let token = window.localStorage.getItem('token');
        if(token != null) this.$router.push({name: 'IndexAdmin'});
    },
    methods: {
        login: async function() {
            this.loading = true;
            let data = await UserRepository.login(this.user);
            if(data.status === 200){
                this.loading = false;
                this.$router.push({name: 'IndexAdmin'});
            }
            else 
            {
                this.loading = false;
                this.errors = data.errors 
            }

        }
    }


}

</script>
<style>
#login {
    height: 100%;
    padding-top: 150px;
    background-color: #eeeeee;
}

.wrapper {
    width: 380px;
}

.user {
    line-height: 50px;
    font-size: 1.2rem;
    width: 50px;
    height: 50px;
}

.show-pass{
    right: 35px;
    line-height: 37px;
    z-index: 10;
    color: #2962ff;
}

</style>
