<template>
<div class="wrapper-header-bottom-sm">
    <div class="py-2 border-bottom d-md-block d-none">
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
                        <li class="nav-item dropdown-account position-relative ml-3 border-right pr-3">
                            <a class=" ">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <span class="ml-1">Tài khoản</span>
                                <i class="fa fa-angle-down" style="font-size: 1rem" aria-hidden="true"></i>
                            </a>
                            <div class="position-absolute shadow rounded dropdown-collapse p-2">
                                <ul class="nav flex-column">
                                    <li class="nav-item border-bottom">
                                        <a class="nav-link" href="#">Lịch sử đặt hàng</a>
                                    </li>
                                    <li class="nav-item border-bottom">
                                        <a class="nav-link" href="#">Đổi mật khẩu</a>
                                    </li>
                                    <li class="nav-item border-bottom">
                                        <a class="nav-link" href="#">Đăng xuất</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Giỏ hàng</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item ml-3 border-right pr-3">
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

    <div class="container position-relative">
        <div class="row py-xl-4 py-2 header-bottom">
            <div class="col-sm-2 col-auto">
                <a class="logo">
                    <img src="/images/logo.svg" alt="">
                </a>
            </div>
            <div class="col d-lg-block d-none">
                <input type="text" class="input-search" placeholder="Bạn cần tìm gì?">
                <button class="position-absolute button-search"><i class="fa fa-search" aria-hidden="true"></i></button>
            </div>
            <div class="col dis col-lg-2 d-flex justify-content-end align-items-center">
                <ul class="nav h-100 mt-3">
                    <li class="nav-item mr-4 d-lg-none">
                        <a href="#collapse-search" data-toggle="collapse">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </a>

                    </li>
                    <li class="nav-item mr-4 d-lg-none">
                        <a href="#" @click.prevent="toggleTopNav">
                            <i class="fa fa-bars top-navbar" aria-hidden="true"></i>
                        </a>

                        <div class="position-fixed top-nav vh-100">
                            <div class="position-relative h-100">
                                <div class="nav-header row p-3">
                                    <div class="col">
                                        <a class="logo">
                                            <img src="/images/logo.svg" alt="">
                                        </a>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fa fa-times d-inline-block" @click="toggleTopNav" aria-hidden="true"></i>
                                    </div>
                                </div>

                                <div class="nav-body">
                                    <div class="d-flex flex-wrap overflow-auto justify-content-between px-3 pb-3" style="height: 200px">
                                        <a href="" style="width:75px;" class="d-inline-block py-1 mb-2 px-2 border rounded">Laptop</a>
                                        <a href="" style="width:75px;" class="d-inline-block py-1 mb-2 px-2 border rounded">Laptop</a>
                                        <a href="" style="width:75px;" class="d-inline-block py-1 mb-2 px-2 border rounded">Laptop</a>
                                        <a href="" style="width:75px;" class="d-inline-block py-1 mb-2 px-2 border rounded">Laptop</a>
                                        <a href="" style="width:75px;" class="d-inline-block py-1 mb-2 px-2 border rounded">Laptop</a>
                                        <a href="" style="width:75px;" class="d-inline-block py-1 mb-2 px-2 border rounded">Laptop</a>
                                        <a href="" style="width:75px;" class="d-inline-block py-1 mb-2 px-2 border rounded">Laptop</a>
                                        <a href="" style="width:75px;" class="d-inline-block py-1 mb-2 px-2 border rounded">Laptop</a>
                                        <a href="" style="width:75px;" class="d-inline-block py-1 mb-2 px-2 border rounded">Laptop</a>
                                        <a href="" style="width:75px;" class="d-inline-block py-1 mb-2 px-2 border rounded">Laptop</a>
                                        <a href="" style="width:75px;" class="d-inline-block py-1 mb-2 px-2 border rounded">Laptop</a>
                                        <a href="" style="width:75px;" class="d-inline-block py-1 mb-2 px-2 border rounded">Laptop</a>
                                        <a href="" style="width:75px;" class="d-inline-block py-1 mb-2 px-2 border rounded">Laptop</a>
                                        <a href="" style="width:75px;" class="d-inline-block py-1 mb-2 px-2 border rounded">Laptop</a>
                                        <a href="" style="width:75px;" class="d-inline-block py-1 mb-2 px-2 border rounded">Laptop</a>
                                        <a href="" style="width:75px;" class="d-inline-block py-1 mb-2 px-2 border rounded">Laptop</a>

                                    </div>
                                    <div style="height: 200px; overflow-y: scroll; overflow-x: hidden;">
                                        <div class="mt-3 row pb-5">
                                            <div class="col">
                                                <ul class="nav flex-column">
                                                    <li class="nav-item">
                                                        <span class="nav-link font-weight-bold">Tài khoản của bạn</span>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="" class="nav-link border-bottom">
                                                            Đăng nhập
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="" class="nav-link border-bottom">
                                                            Đăng ký
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="" class="nav-link border-bottom">
                                                            Giở hàng
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="" class="nav-link border-bottom">
                                                            Lịch sử mua hàng
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="" class="nav-link border-bottom">
                                                            Lịch sử mua hàng
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col">
                                                <ul class="nav flex-column">
                                                    <li class="nav-item">
                                                        <span class="nav-link font-weight-bold">Các liên kết khác</span>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="" class="nav-link border-bottom">
                                                            Giới thiệu
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="" class="nav-link border-bottom">
                                                            Blog
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="" class="nav-link border-bottom">
                                                            Liên hệ
                                                        </a>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="nav-footer position-absolute">
                                    <svg id="nav-footer-img" version="1.2" baseProfile="tiny-ps" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 200" width="300" height="120">
                                        <title>Dự án mới</title>
                                        <defs>
                                            <image width="500" height="200" id="img1" href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAfQAAADIAQMAAAAk14GrAAAAAXNSR0IB2cksfwAAAANQTFRF////p8QbyAAAACNJREFUeJztwTEBAAAAwqD1T20ND6AAAAAAAAAAAAAAAAB4NjIAAAGmV0+ZAAAAAElFTkSuQmCC" />
                                        </defs>

                                        <use id="Background" href="#img1" x="0" y="0" />
                                        <path id="Đổ màu Solid 4" class="shp0" d="M0 116C0 116 52 49.38 145 86C238 122.62 178.85 -17.46 322 60.63C377 90.63 398 119.37 449 100C500 80.63 500 80 500 80L500 200L0 200L0 116ZM0 116L0 116ZM0 113L0 113ZM0 75C0 75 56 52 70 75.63C70 76.63 0 98.37 0 118C0 137.63 0 75 0 75ZM500 43L500 77.63C500 77.63 405 154 324 59.63C382 8.25 429 48 447 52.63C465 57.25 500 43 500 43ZM500 39L500 39Z" />
                                        <path id="Đổ màu Solid 3" class="shp1" d="M0 116C0 116 52 49.38 145 86C238 122.62 178.85 -17.46 322 60.63C377 90.63 398 119.37 449 100C500 80.63 500 80 500 80L500 200L0 200L0 116ZM0 116L0 116ZM0 113L0 113ZM0 75C0 75 56 52 70 75.63C70 76.63 0 98.37 0 118C0 137.63 0 75 0 75Z" />
                                        <path id="Đổ màu Solid 1" class="shp2" d="M0 116C0 116 52 49.38 145 86C238 122.62 178.85 -17.46 322 60.63C377 90.63 398 119.37 449 100C500 80.63 500 80 500 80L500 200L0 200L0 116ZM0 117" />
                                    </svg>
                                </div>
                            </div>

                        </div>
                    </li>
                    <li class="nav-item mr-4 d-lg-none d-none d-sm-block">
                        <a href="">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li class="nav-item mr-4 d-lg-none">
                        <a href="" class="position-relative ">
                            <span><i class="fa fa-shopping-bag" style="font-size: 1.3rem" aria-hidden="true"></i></span>
                            <span class="position-absolute d-inline-block px-2 rounded-circle count-p-cart">2</span>

                        </a>
                    </li>
                    <li class="nav-item position-relative d-none d-lg-block dropdown-cart">
                        <a href="#" role="button" class="position-relative ">
                            <span><i class="fa fa-shopping-bag" style="font-size: 1.3rem" aria-hidden="true"></i></span>
                            <span class="position-absolute px-2 rounded-circle count-p-cart">2</span>
                            <span class="pl-3 cart-total">20.000.000Đ</span>
                        </a>
                        <div class="cart-collapse shadow rounded position-absolute">
                            <ul class="nav">
                                <li class="nav-item border-bottom py-2 row">
                                    <div class="col-auto">
                                        <img width="75" height="75" src="/upload/product/1uVa6ShnJ0TRoWLkL5bKsggV6ie6JNt1yvRUUPty-200x150.png" alt="">
                                    </div>

                                    <div class="col">
                                        <span>Ultra Wireless S50 Headphones S50 with Bluetooth</span> <br>
                                        <span>1 × $1,100.00</span>
                                    </div>
                                    <div class="col-auto">
                                        <span><i class="fa fa-times" aria-hidden="true"></i></span>
                                    </div>

                                </li>
                                <li class="nav-item border-bottom  py-2 row">
                                    <div class="col-auto">
                                        <img width="75" height="75" src="/upload/product/1uVa6ShnJ0TRoWLkL5bKsggV6ie6JNt1yvRUUPty-200x150.png" alt="">
                                    </div>

                                    <div class="col">
                                        <span>Ultra Wireless S50 Headphones S50 with Bluetooth</span> <br>
                                        <span>1 × $1,100.00</span>
                                    </div>
                                    <div class="col-auto">
                                        <span><i class="fa fa-times" aria-hidden="true"></i></span>
                                    </div>

                                </li>
                                <li class="nav-item border-bottom  py-2 row">
                                    <div class="col-auto">
                                        <img width="75" height="75" src="/upload/product/1uVa6ShnJ0TRoWLkL5bKsggV6ie6JNt1yvRUUPty-200x150.png" alt="">
                                    </div>

                                    <div class="col">
                                        <span>Ultra Wireless S50 Headphones S50 with Bluetooth</span> <br>
                                        <span>1 × $1,100.00</span>
                                    </div>
                                    <div class="col-auto">
                                        <span><i class="fa fa-times" aria-hidden="true"></i></span>
                                    </div>

                                </li>
                                <li class="nav-item border-bottom  py-2 row">
                                    <div class="col-auto">
                                        <img width="75" height="75" src="/upload/product/1uVa6ShnJ0TRoWLkL5bKsggV6ie6JNt1yvRUUPty-200x150.png" alt="">
                                    </div>

                                    <div class="col">
                                        <span>Ultra Wireless S50 Headphones S50 with Bluetooth</span> <br>
                                        <span>1 × $1,100.00</span>
                                    </div>
                                    <div class="col-auto">
                                        <span><i class="fa fa-times" aria-hidden="true"></i></span>
                                    </div>

                                </li>
                            </ul>
                            <div class="d-flex justify-content-center mt-3">
                                <button class="btn btn-secondary rounded-pill px-3 mr-2">Giỏ hàng</button>
                                <button class="btn btn-warning rounded-pill px-3 ml-2">Đặt hàng</button>
                            </div>

                        </div>

                    </li>
                </ul>

            </div>
        </div>
        <div class="d-none d-lg-block">
            <div class="row mt-2">
                <div class="col-xl-2 col-lg-3">
                    <div class="position-relative">
                        <button @click="removeDblock" class="btn-dropdown-category w-100 border-0 py-2 px-3 font-weight-bold d-flex align-items-center text-left bgcolor-custom" type="button">
                            <i class="fa fa-list d-inline-block mr-3" aria-hidden="true"></i>Danh mục
                        </button>
                        <div class="drop-category position-absolute shadow-sm w-100 rounded-bottom">
                            <ul class="nav flex-column">
                                <li class="nav-item position-relative">
                                    <a href="#" role="button" class="nav-link border-bottom">
                                        <span>Computers</span>
                                        <i class="fa fa-chevron-right float-right pt-1 pl-2" style="font-size: 0.8rem;" aria-hidden="true"></i>
                                    </a>
                                    <div style="width: 600px; left: 100%; top: 0px;" class="position-absolute">
                                        <div class="category-collapse shadow-sm position-absolute">
                                            <div class="wraper d-flex flex-wrap">
                                                <ul class="nav flex-column">
                                                    <li class="nav-item">
                                                        <a href="" class="nav-link">
                                                            Asus
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="" class="nav-link">
                                                            Điện thoại
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="" class="nav-link">
                                                            Oppo
                                                        </a>
                                                    </li>
                                                </ul>
                                                <ul class="nav flex-column">
                                                    <li class="nav-item">
                                                        <a href="" class="nav-link">
                                                            Asus
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="" class="nav-link">
                                                            Điện thoại
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="" class="nav-link">
                                                            Oppo
                                                        </a>
                                                    </li>
                                                </ul>
                                                <ul class="nav flex-column">
                                                    <li class="nav-item">
                                                        <a href="" class="nav-link">
                                                            Asus
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="" class="nav-link">
                                                            Điện thoại
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="" class="nav-link">
                                                            Oppo
                                                        </a>
                                                    </li>
                                                </ul>
                                                <ul class="nav flex-column">
                                                    <li class="nav-item">
                                                        <a href="" class="nav-link">
                                                            Asus
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="" class="nav-link">
                                                            Điện thoại
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="" class="nav-link">
                                                            Oppo
                                                        </a>
                                                    </li>
                                                </ul>

                                            </div>

                                        </div>
                                    </div>

                                </li>
                                <li class="nav-item position-relative">
                                    <a href="#" role="button" class="nav-link border-bottom">
                                        <span>Laptop</span>
                                        <i class="fa fa-chevron-right float-right pt-1 pl-2" style="font-size: 0.8rem;" aria-hidden="true"></i>
                                    </a>
                                    <div style="width: 600px; left: 100%; top: 0px;" class="position-absolute">
                                        <div class="category-collapse position-absolute shadow-sm">
                                            <div class="wraper d-flex flex-wrap ">
                                                <ul class="nav flex-column">
                                                    <li class="nav-item">
                                                        <a href="" class="nav-link">
                                                            Del
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="" class="nav-link">
                                                            Điện thoại
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="" class="nav-link">
                                                            Oppo
                                                        </a>
                                                    </li>
                                                </ul>
                                                <ul class="nav flex-column">
                                                    <li class="nav-item">
                                                        <a href="" class="nav-link">
                                                            Asus
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="" class="nav-link">
                                                            Điện thoại
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="" class="nav-link">
                                                            Oppo
                                                        </a>
                                                    </li>
                                                </ul>
                                                <ul class="nav flex-column">
                                                    <li class="nav-item">
                                                        <a href="" class="nav-link">
                                                            Asus
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="" class="nav-link">
                                                            Điện thoại
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="" class="nav-link">
                                                            Oppo
                                                        </a>
                                                    </li>
                                                </ul>
                                                <ul class="nav flex-column">
                                                    <li class="nav-item">
                                                        <a href="" class="nav-link">
                                                            Asus
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="" class="nav-link">
                                                            Điện thoại
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="" class="nav-link">
                                                            Oppo
                                                        </a>
                                                    </li>
                                                </ul>

                                            </div>

                                        </div>
                                    </div>

                                </li>
                                <li class="nav-item">
                                    <a href="#" role="button" class="nav-link border-bottom">
                                        <span>Điện thoại</span>
                                        <i class="fa fa-chevron-right float-right pt-1 pl-2" style="font-size: 0.8rem;" aria-hidden="true"></i>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" role="button" class="nav-link border-bottom">
                                        <span>Điện thoại</span>
                                        <i class="fa fa-chevron-right float-right pt-1 pl-2" style="font-size: 0.8rem;" aria-hidden="true"></i>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" role="button" class="nav-link border-bottom">
                                        <span>Điện thoại</span>
                                        <i class="fa fa-chevron-right float-right pt-1 pl-2" style="font-size: 0.8rem;" aria-hidden="true"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <ul class="nav" style="font-size: 1.1rem;">
                        <li class="nav-item">
                            <a href="" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">Giới thiệu</a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">Liên hệ</a>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
        <div class="shadow-sm position-absolute collapse p-2 mx-1" id="collapse-search">
            <div class="position-relative">
                <input type="text" class="input-search" placeholder="Bạn cần tìm gì?">
                <button class="position-absolute button-search"><i class="fa fa-search" aria-hidden="true"></i></button>
            </div>
        </div>
    </div>

</div>
</template>

<script>
export default {
    name: 'HeaderItem',
    data: function () {
        return {
            toggleNav: false
        }
    },
    methods: {
        removeDblock() {
            $('.drop-category').toggle(500);

        },

        toggleTopNav() {
            this.toggleNav = !this.toggleNav;
            if (this.toggleNav) {
                $('.top-navbar').addClass('fa-times').removeClass('fa-bars')
                this.gsap.to(".top-nav", {
                    x: 0,
                    duration: 0.5
                });
            } else {
                $('.top-navbar').addClass('fa-bars').removeClass('fa-times')
                this.gsap.to(".top-nav", {
                    x: -320,
                    duration: 0.5
                });
            }
        }
    }
}
</script>

<style lang="scss" scoped>
.logo {
    display: inline-block;
    font-size: 1.25rem;

    img {
        width: 150px;
        height: 42px;
    }
}

@media screen and (max-width: 340px) {
    .logo {
        width: 100px !important;

        img {
            max-width: 100% !important;

        }
    }
}

.input-search {
    display: block;
    width: 100%;
    outline: none;
    border: 2px solid #FED700;
    height: 42px;
    color: #334141;
    padding: 7px;
    font-weight: 400;
    padding-left: 20px;
    border-radius: 25px;
}
 
.button-search {
    background-color: #FED700;
    right: 0px;
    top: 0px;
    border: none;
    margin-right: 15px;
    height: 42px;

    font-size: 1.3rem;
    padding: 5px 20px;
    border-top-right-radius: 25px;
    border-bottom-right-radius: 25px;

}

.count-p-cart {
    left: 10px;
    background-color: #FED700;
    top: 13px;
}

.fa {
    font-size: 1.3rem;
    color: #757575;
}

.dropdown-account {
    overflow: hidden;
}

.dropdown-account:hover {
    overflow: visible !important;
}

.dropdown-account:hover .dropdown-collapse {
    opacity: 1 !important;
    height: 172px !important;
    transform: translateY(0px);
}

.dropdown-collapse {
    opacity: 0 !important;
    height: 0px !important;
    width: 170px;
    right: 0px;
    transform: translateY(15px);

    z-index: 10;
    background-color: white;
    transition: opacity 0.5s, transform 1s;
    padding-top: 15px;
}

.dropdown-cart:hover .cart-collapse {
    opacity: 1;
    transform: translateY(0px);
    min-height: 300px !important;
    height: auto !important;
    top: 40px;
    width: 332px;
    border-top: 2px solid #FED700;
    padding: 8px 8px 24px 8px;
}

.cart-collapse {
    width: 127px;
    opacity: 0;
    background-color: white;
    right: 0px;
    overflow: hidden;
    height: 0px !important;
    z-index: 10;
    transform: translateY(14px);
    transition: opacity 0.5s, transform 0.5s;
}

@media screen and (max-width: 768px) {
    .count-p-cart {
        background-color: black !important;
        color: white;
    }

}

.btn-dropdown-category {
    border-top-left-radius: 15px;
    border-top-right-radius: 15px;
}
.drop-category {
    z-index: 10;
    background-color: white;
}
.drop-category .nav-item:hover .category-collapse {
    opacity: 1;
    min-height: 150px !important;
    transform: translateY(0px);
    height: auto !important;
}

.category-collapse {
    opacity: 0;
    top: 0px;
    height: 0px !important;
    background-color: white;
    overflow: hidden;
    transform: translateY(10px);
    transition: opacity 0.5s, transform 0.5s;

    .wraper {
        min-width: 300px;
        display: inline-block;

        ul {
            width: 150px;
        }

    }
}

.top-nav {
    width: 300px;
    top: 0;
    transform: translateX(-320px);
    left: 0;
    background-color: white;
    z-index: 10;

    .fa-fa-times {
        line-height: 30px;
    }
}

.nav-footer {
    bottom: 0;
}

#nav-footer-img {
    tspan {
        white-space: pre
    }

    .shp0 {
        fill: #fff176
    }

    .shp1 {
        fill: #fff176
    }

    .shp2 {
        fill: #ffeb3b
    }
}

#collapse-search {
    left: 0;
    z-index: 9;
    background-color: white;
    top: 70px;
    right: 0;

    button {
        margin-right: 0px;
    }
}

@media screen and (max-width: 768px) {
    .wrapper-header-bottom-sm {
        margin: 0px -15px !important;
        background-color: #FED700 !important;
    }

}

@media screen and (max-width: 576px) {
    .header-bottom {
        background-color: #FED700 !important;
    }

    .wrapper-header-bottom-sm {
        margin: 0px !important;
        background-color: none !important;
    }

}
</style>
