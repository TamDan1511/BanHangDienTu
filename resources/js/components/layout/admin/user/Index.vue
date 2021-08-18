<template>
    <index-item v-slot:MainRight :user="userLogin" :isActive="isActive">
        <div class="bg-white h-100 p-3">
            <h5 class="d-inline-block font-weight-bold">Danh sách người dùng</h5>
            <ul class="nav">
                <li class="nav-item ml-auto">
                    <router-link :to="{name: 'UserForm'}" class="btn btn-warning">
                        <img src="https://img.icons8.com/color/24/000000/add-link.png" /> 
                        <span class="pl-2">Thêm mới</span>
                    </router-link>
                </li>
            </ul>
            <div class="mt-4">
            	<table class="table table-striped  text-center" id="userList">
            		<thead>
            			<tr>
            				<th>#</th>
            				<th>Hình ảnh</th>
            				<th>Họ tên</th>
            				<th>Email</th>
            				<th>Trạng thái</th>
            				<th>Admin</th>
            				<th>Tạo mới</th>
            				<th>Cập nhật</th>
            				<th>Hành động</th>
            			</tr>
            		</thead>
            		<tbody>
            			<tr v-for="(user, index) in users" :key="index" >
            				<td>{{++index}}</td>
            				<td>
            					<img v-if="user.picture == null" src="/images/80x120.jpg" alt="">
                                <img v-else :src="path + user.picture">
            				</td>
                            <td>{{ user.name }}</td>
                            <td>{{ user.email }}</td>
                            <td>
                                <button v-if="user.status == 1" @click="changeActive(user, 'status')" class="btn btn-success btn-sm">
                                    <i class="fa fa-check-circle mr-2" aria-hidden="true"></i>Kích hoạt</button>
                                <button v-else class="btn btn-danger btn-sm" @click="changeActive(user, 'status')">
                                    <i class="mr-2 fa fa-times-circle" aria-hidden="true"></i>Không kích hoạt</button>
                            </td>
                            
                            <td>
                                <button v-if="user.isAdmin == 1" @click="changeActive(user, 'isAdmin')" class="btn btn-success btn-sm">
                                <i class="fa fa-check-circle mr-2" aria-hidden="true"></i>Kích hoạt</button>

                                <button v-else class="btn btn-danger btn-sm" @click="changeActive(user, 'isAdmin')">
                                <i class="fa fa-times-circle mr-2" aria-hidden="true"></i>Không kích hoạt</button>
                            </td>
                            <td>
                                {{user.created_at}}
                                <p class="font-weight-bold">{{ user.user_id}}</p>
                            </td>
                            <td>
                                {{user.updated_at}}
                                <p class="font-weight-bold">{{ user.updated_by}}</p>
                            </td>
                            <td>
                                <a href="" class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                <a href="" class="btn btn-warning"><i class="fa fa-pencil-square" aria-hidden="true"></i></a>
                                <a href="" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
                            </td>
            			</tr>
            		</tbody>
            	</table>
            </div>
            <div id="pagination mt-5">
                 <pagination-item v-on:change-page="changePage" v-if="pagi != null" :pagi="pagi"></pagination-item>
            </div>
        </div>
    </index-item>
</template>
<script>
import IndexItem from '../Index.vue';
import PaginationItem from '../Pagination.vue';
import RepositoryFactory from '../../../repositoryfactory/RepositoryFactory.js';
const UserRepository = RepositoryFactory.get('user');


export default {
    name: 'UserIndex',
    metaInfo: {
        title: 'Danh sách người dùng'
    },
    data: function(){
    	return {
    		userLogin: {},
            path: '/upload/user/',
            users: [],
            pagi: null,
            isActive: false
    	}
    },
    components: {
        IndexItem,
        PaginationItem
    },
    async mounted(){
        let data = await UserRepository.checkLogin(this);
        this.userLogin = data.user;
        this.$loading.show({delay:0, background:'rgba(246, 246, 246, 0.5)'})   
        const userData = await UserRepository.getAll(this.$route.query.page);
        this.$loading.hide(); 
        this.pagi = userData.users;
        this.users = userData.users.data;     
    },
    methods: {
        changeActive: async function(user, type){
            this.$loading.show({delay:0, background:'rgba(246, 246, 246, 0.5)'})   
             
            let updateStatus = {id: user.id, value: user[type], type: type};
            
            let update = await UserRepository.changeActive(updateStatus);
            console.log(type )
            if(update == true) 
            {
                if(type == 'status')
                    user.status = (user.status == 1) ? 0 : 1;
                else if(type == 'isAdmin')
                    user.isAdmin = (user.isAdmin == 1) ? 0 : 1;

                this.$loading.hide()
               
                this.isActive = true;
                
                setTimeout(() => { this.isActive = false }, 3000);
            }
        },

        changePage: async function(page){
            this.$loading.show({delay:0, background:'rgba(246, 246, 246, 0.5)'})

            const userData = await UserRepository.getAll(page);
            this.$loading.hide(); 
            this.$router.push({name: "UserIndex", query: {page: page}});
            this.pagi = userData.users;
            this.users = userData.users.data;        
        }


    }

}

</script>
<style>
#userList td{
    vertical-align: middle;
}
</style>
