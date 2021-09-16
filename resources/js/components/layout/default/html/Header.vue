<template>
    <div class="py-2 border-bottom d-lg-block d-md-none">
        <div class="container">
        <!-- header top -->   
        <div class="row">
            <div class="col-12">
                 <ul class="nav">
                <li class="nav-item mr-auto">
                    <router-link to="" class="">
                        <span class="ml-2">Chào mừng bạn đến với chúng tôi</span>
                    </router-link>
                </li>
                <li class="nav-item ml-3">
                    <router-link to="" class="">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <span class="ml-1">Tài khoản</span>
                    </router-link>
                </li>
                <li class="nav-item ml-3">
                    <router-link to="" class="">
                        <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                        <span class="ml-1">Đăng nhập</span>
                    </router-link>
                </li>
                <li class="nav-item ml-3">
                    <router-link to="" class="">
                        <i class="fa fa-registered" aria-hidden="true"></i>
                        <span class="ml-1">Đăng ký</span>
                    </router-link>
                </li>
            </ul>
            </div>
            
        </div>
    </div>
    </div>
     
</template>

<script>
    export default {
        name: 'HeaderItem'
    }
</script>

<style lang="scss" scoped>

</style>