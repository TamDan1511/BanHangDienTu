<template>
	<div class="w-100" :style="{backgroundColor: '#fafafa'}">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link text-dark" data-toggle="collapse" href="#dropdownProfile">
                                <img src="https://img.icons8.com/fluency/40/000000/top-view-bird.png"/>
                                <span class="pl-1">Xem website</span>
                            </a>
                        </li>
                        <li class="nav-item ml-auto position-relative">
                            <a class="nav-link text-dark" data-toggle="collapse" href="#dropdownProfile">
                                <img src="/images/img-avatar.png" class="rounded-circle" :style="{width: 40 + 'px', height: 40 + 'px'}" />
                                <span class="pl-1">{{ getUserLogin != null ? getUserLogin.user.name: ''}}</span>
                            </a>
                            <div class="collapse position-absolute" id="dropdownProfile">
                                <ul class="nav flex-column rounded d-inline-block" :style="{backgroundColor: '#b3e5fc', width: 150 + 'px'}">
                                    <li class="nav-item">
                                        <a class="nav-link nav-color" href="#">
                                        <img src="https://img.icons8.com/fluency-systems-regular/24/000000/password-window.png"/><span class="pl-2">Đổi mật khẩu</span> </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link nav-color" @click.prevent="logout" href="#">
                                            <img src="https://img.icons8.com/office/24/000000/shutdown.png"/><span class="pl-2">Đăng xuất</span> </a>
                                    </li>
                                    
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
</template>

<script >
	import RepositoryFactory from '../../../repositoryfactory/RepositoryFactory.js';
    const UserRepository = RepositoryFactory.get('user');
    import {mapActions, mapGetters} from 'vuex';
	export default{
		name: 'Header', 
        computed: {
            ...mapGetters('checkLogin', ['getUserLogin'])
        },
        async mounted(){
            const userLogin =  await UserRepository.checkLogin(this);
            this.setUserLogin(userLogin);
        },
		methods: {
			logout: function(){
				let authorization = window.localStorage.getItem('token');
        		let config = { headers: { "Authorization": `Bearer ${authorization}` } };
				UserRepository.logout(this,config);
			},

            ...mapActions('checkLogin', [
                'setUserLogin'
            ])
		}
	}
</script>