<template>
    <div style="background: #f8f8f8; margin: 0px -15px;">
        <div class="container mt-4">
            <div class="row py-3">
                <div class="col-md-5">
                    <a href="" class="logo">
                         <img class="img-fluid" src="/images/logo.svg" alt="">
                    </a>
                    <div class="row">
                        <div class="col-auto">
                            <i style="font-size: 2.2rem; line-height: 50px " class="text-warning fa fa-headphones" aria-hidden="true"></i>
                        </div>
                        <div class="col">
                            <span class="font-weight-light" style="font-size: 0.9rem">Gọi cho chúng tôi 24/7</span>
                            <p style="font-size: 1.2rem">(+84) 32317352</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <span class="font-weight-bold">Contact infoK</span>
                            <p>17 Princess Road, London, Greater London NW1 8JR, U</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-6">
                    <h5 class="font-weight-bold title">Danh mục hữu ích</h5>
                    <ul class="nav flex-column text-xs">
                         <li class="nav-item">
                             <a href="" class="nav-link">
                                 Laptop, Điện thoại
                             </a>
                              <a href="" class="nav-link">
                                 Laptop, Điện thoại
                             </a>
                              <a href="" class="nav-link">
                                 Laptop, Điện thoại
                             </a>

                              <a href="" class="nav-link">
                                 Laptop, Điện thoại
                             </a>
                              <a href="" class="nav-link">
                                 Laptop, Điện thoại
                             </a>
                         </li>
                    </ul>
                </div>
                <div class="col-md-3 col-6">
                    <h5 class="font-weight-bold title">Liên kết khác</h5>
                    <ul class="nav flex-column text-xs">
                         <li class="nav-item">
                             <a href="" class="nav-link">
                                 Lịch sử mua hàng
                             </a>
                              
                         </li>
                         <li class="nav-item">
                             <a href="" class="nav-link">
                                 Giỏ hàng
                             </a>
                              
                         </li>

                         <li class="nav-item">
                             <a href="" class="nav-link">
                                 Đổi mật khẩu
                             </a>
                              
                         </li>
                         <li class="nav-item">
                             <a href="" class="nav-link">
                                 Blog
                             </a>
                              
                         </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'FooterItem'
    }
</script>

<style lang="scss" scoped>
.logo{
    display: inline-block;
    width: 180px;
    
}

@media screen and (max-width: 576px){
    .container{
        padding: 0px 15px !important;
    }

    .text-xs{
        font-size: 0.7rem !important;
    }
}

@media screen and (max-width: 768px){
    .title{
        font-size: 0.9rem !important;
    }
}
</style>