<template>
<div>
    <index-item>
        <template v-slot:slider>
            <slider-item></slider-item>
        </template>
        <template v-slot:main>
            <div class="top-banner">
                <div class="container mt-4">
                    <div class="row">
                        <div class="col-xl-3 col-sm-6 mb-3">
                            <img class="img-fluid" src="/images/bannertop.jpg" alt="">
                        </div>
                        <div class="col-xl-3 col-sm-6  mb-3">
                            <img class="img-fluid" src="/images/bannertop.jpg" alt="">
                        </div>
                        <div class="col-xl-3 col-sm-6">
                            <img class="img-fluid" src="/images/bannertop.jpg" alt="">
                        </div>
                        <div class="col-xl-3 col-sm-6">
                            <img class="img-fluid" src="/images/bannertop.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="container mt-4">
                <div class="row ">
                    <div class="col-md-auto position-relative main-onsale">
                        <div class="wrapper-onsale overflow-hidden">
                            <splide :options="options">
                                <splide-slide>
                                    <div class="wrapper-onsale-item pb-3">
                                        <div class="m-2 rounded-circle text-center d-inline-block bgcolor-custom position-absolute" style="width: 70px; height: 70px; right: 0">
                                            <span class="font-weight-bold" style="line-height: 65px">On sale</span>
                                        </div>
                                        <div class="img-on-sale text-center pt-5">
                                            <img class="img-fluid" src="\upload\product\jiKsnk8HZGuPF567w74tXSK7PkrE0yoAcAxGA44k-500x500.png" alt="">
                                        </div>
                                        <div class="text-center mt-3 text-on-sale">
                                            <h5><a href="">Game Console Controller + USB 3.0 Cable Game Console Controller + USB 3.0 Cable</a></h5>
                                            <div class="mt-2 d-flex align-items-center justify-content-center">
                                                <h6 class="d-inline-block mr-2" style=" text-decoration: line-through;">50.000 ₫</h6>
                                                <h4 class="d-inline-block text-danger">50.000 ₫</h4>
                                            </div>
                                        </div>

                                        <p class="text-center">Thời gian ưu đãi:</p>
                                        <div class="time-onsale d-flex justify-content-center">
                                            <div class="text-center">
                                                <div class="rounded px-2" style="background: #e6e6e6;">
                                                    <span class="text-fs">00</span>
                                                </div>
                                                <span class="d-inline-block mt-1">Ngày</span>
                                            </div>
                                            <div class="mx-1">
                                                <span class="text-fs">:</span>
                                            </div>
                                            <div class="text-center">
                                                <div class="rounded px-2" style="background: #e6e6e6;">
                                                    <span class="text-fs">00</span>
                                                </div>
                                                <span class="d-inline-block mt-1">Giờ</span>
                                            </div>
                                            <div class="mx-1">
                                                <span class="text-fs">:</span>
                                            </div>
                                            <div class="text-center">
                                                <div class="rounded px-2" style="background: #e6e6e6;">
                                                    <span class="text-fs">00</span>
                                                </div>
                                                <span class="d-inline-block mt-1">Phút</span>
                                            </div>
                                            <div class="mx-1">
                                                <span class="text-fs">:</span>
                                            </div>
                                            <div class="text-center">
                                                <div class="rounded px-2" style="background: #e6e6e6;">
                                                    <span class="text-fs">00</span>
                                                </div>
                                                <span class="d-inline-block mt-1">Giây</span>
                                            </div>

                                        </div>
                                    </div>
                                </splide-slide>
                                <splide-slide>
                                    <div class="wrapper-onsale-item pb-3">
                                        <div class="m-2 rounded-circle text-center d-inline-block bgcolor-custom position-absolute" style="width: 70px; height: 70px; right: 0">
                                            <span class="font-weight-bold" style="line-height: 65px">On sale</span>
                                        </div>
                                        <div class="img-on-sale text-center pt-5">
                                            <img class="img-fluid" src="\upload\product\jiKsnk8HZGuPF567w74tXSK7PkrE0yoAcAxGA44k-500x500.png" alt="">
                                        </div>
                                        <div class="text-center mt-3 text-on-sale">
                                            <h5><a href="">Game Console Controller + USB 3.0 Cable Game Console Controller + USB 3.0 Cable</a></h5>
                                            <div class="mt-2 d-flex align-items-center justify-content-center">
                                                <h6 class="d-inline-block mr-2" style=" text-decoration: line-through;">50.000 ₫</h6>
                                                <h4 class="d-inline-block text-danger">50.000 ₫</h4>
                                            </div>
                                        </div>

                                        <p class="text-center">Thời gian ưu đãi:</p>
                                        <div class="time-onsale d-flex justify-content-center">
                                            <div class="text-center">
                                                <div class="rounded px-2" style="background: #e6e6e6;">
                                                    <span class="text-fs">00</span>
                                                </div>
                                                <span class="d-inline-block mt-1">Ngày</span>
                                            </div>
                                            <div class="mx-1">
                                                <span class="text-fs">:</span>
                                            </div>
                                            <div class="text-center">
                                                <div class="rounded px-2" style="background: #e6e6e6;">
                                                    <span class="text-fs">00</span>
                                                </div>
                                                <span class="d-inline-block mt-1">Giờ</span>
                                            </div>
                                            <div class="mx-1">
                                                <span class="text-fs">:</span>
                                            </div>
                                            <div class="text-center">
                                                <div class="rounded px-2" style="background: #e6e6e6;">
                                                    <span class="text-fs">00</span>
                                                </div>
                                                <span class="d-inline-block mt-1">Phút</span>
                                            </div>
                                            <div class="mx-1">
                                                <span class="text-fs">:</span>
                                            </div>
                                            <div class="text-center">
                                                <div class="rounded px-2" style="background: #e6e6e6;">
                                                    <span class="text-fs">00</span>
                                                </div>
                                                <span class="d-inline-block mt-1">Giây</span>
                                            </div>

                                        </div>
                                    </div>
                                </splide-slide>
                                <template v-slot:controls>
                                    <div class="splide__arrows">
                                        <button class="splide__arrow splide__arrow--prev rounded-circle px-3 py-2">
                                            <i class="fa fa-arrow-circle-left" aria-hidden="true"></i>
                                        </button>
                                        <button class="splide__arrow splide__arrow--next rounded-circle px-3 py-2">
                                            <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </template>
                            </splide>
                        </div>

                    </div>

                    <div class="col main-list-product">
                        <!-- labtop -->
                        <h5 class="pb-2 border-bottom text-center px-3 mt-md-0 mt-4">Laptop</h5>
                        <div class="row mt-3" id="laptop" style="margin: 0px">
                            <div class="col-lg-4 col-xl-3 col-md-4 col-6 py-3  product-item">
                                <div class="product-item-w border-right">
                                    <h5><a class="text-product" href="">Game Console Controller + USB 3.0 Cable Game Console Controller + USB 3.0 Cable</a></h5>
                                    <div class="wrapper-img text-center">
                                        <img class="img-fluid" src="\upload\product\jiKsnk8HZGuPF567w74tXSK7PkrE0yoAcAxGA44k-220x200.png" alt="">
                                    </div>

                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5 class="d-inline-block textfs-price">50.000 ₫</h5>
                                        <button title="Thêm vào giỏ hàng" class="rounded-circle btn-cart d-md-none d-lg-block">
                                            <img src="/images/shopping-cart-20.png" alt="">
                                        </button>
                                    </div>

                                    <div class="mt-3 pt-2 border-top text-center textfs-time-discount">
                                        <span>00</span> Ngày : <span>00</span> Giờ : <span>00</span> Phút
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-4 col-xl-3 col-md-4 col-6 py-3  product-item">
                                <div class="product-item-w border-right">
                                    <h5><a class="text-product" href="">Game Console Controller + USB 3.0 Cable Game Console Controller + USB 3.0 Cable</a></h5>
                                    <div class="wrapper-img text-center">
                                        <img class="img-fluid" src="\upload\product\jiKsnk8HZGuPF567w74tXSK7PkrE0yoAcAxGA44k-220x200.png" alt="">
                                    </div>

                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5 class="d-inline-block textfs-price">50.000 ₫</h5>
                                        <button title="Thêm vào giỏ hàng" class="rounded-circle btn-cart d-md-none d-lg-block">
                                            <img src="/images/shopping-cart-20.png" alt="">
                                        </button>
                                    </div>

                                    <div class="mt-3 pt-2 border-top text-center textfs-time-discount">
                                        <span>00</span> Ngày : <span>00</span> Giờ : <span>00</span> Phút
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-4 col-xl-3 col-md-4 py-3 col-6 product-item">
                                <div class="product-item-w border-right">
                                    <h5><a class="text-product" href="">Game Console Controller + USB 3.0 Cable Game Console Controller + USB 3.0 Cable</a></h5>
                                    <div class="wrapper-img text-center">
                                        <img class="img-fluid" src="\upload\product\jiKsnk8HZGuPF567w74tXSK7PkrE0yoAcAxGA44k-220x200.png" alt="">
                                    </div>

                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h6 class="d-inline-block mr-2 textfs-price" style=" text-decoration: line-through;">50.000 ₫</h6>
                                            <h5 class="d-inline-block text-danger textfs-discount">50.000 ₫</h5>
                                        </div>

                                        <button title="Thêm vào giỏ hàng" class="rounded-circle btn-cart d-md-none d-lg-block">
                                            <img src="/images/shopping-cart-20.png" alt="">
                                        </button>
                                    </div>

                                    <div class="mt-3 pt-2 border-top text-center textfs-time-discount">
                                        <span>00</span> Ngày : <span>00</span> Giờ : <span>00</span> Phút
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-4 col-xl-3 col-md-4 py-3 col-6 d-md-none d-xl-block product-item">
                                <div class="product-item-w border-right">
                                    <h5><a class="text-product" href="">Game Console Controller + USB 3.0 Cable Game Console Controller + USB 3.0 Cable</a></h5>
                                    <div class="wrapper-img text-center">
                                        <img class="img-fluid" src="\upload\product\jiKsnk8HZGuPF567w74tXSK7PkrE0yoAcAxGA44k-220x200.png" alt="">
                                    </div>

                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5 class="d-inline-block textfs-price">50.000 ₫</h5>
                                        <button title="Thêm vào giỏ hàng" class="rounded-circle btn-cart d-md-none d-lg-block ">
                                            <img src="/images/shopping-cart-20.png" alt="">
                                        </button>
                                    </div>

                                    <div class="mt-3 pt-2 border-top text-center textfs-time-discount">
                                        <span>00</span> Ngày : <span>00</span> Giờ : <span>00</span> Phút
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- điện thoại -->
                        <h5 class="pb-2 border-bottom text-center mt-4 px-3 mt-md-0 mt-4">Điện thoại</h5>
                        <div class="row mt-3" id="dienthoai" style="margin: 0px">
                            <div class="col-lg-4 col-xl-3 col-md-4 col-6 py-3  product-item">
                                <div class="product-item-w border-right">
                                    <h5><a class="text-product" href="">Game Console Controller + USB 3.0 Cable Game Console Controller + USB 3.0 Cable</a></h5>
                                    <div class="wrapper-img text-center">
                                        <img class="img-fluid" src="\upload\product\jiKsnk8HZGuPF567w74tXSK7PkrE0yoAcAxGA44k-220x200.png" alt="">
                                    </div>

                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5 class="d-inline-block textfs-price">50.000 ₫</h5>
                                        <button title="Thêm vào giỏ hàng" class="rounded-circle btn-cart d-md-none d-lg-block ">
                                            <img src="/images/shopping-cart-20.png" alt="">
                                        </button>
                                    </div>

                                    <div class="mt-3 pt-2 border-top text-center textfs-time-discount">
                                        <span>00</span> Ngày : <span>00</span> Giờ : <span>00</span> Phút
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-4 col-xl-3 col-md-4 py-3 col-6 product-item">
                                <div class="product-item-w border-right">
                                    <h5><a class="text-product" href="">Game Console Controller + USB 3.0 Cable Game Console Controller + USB 3.0 Cable</a></h5>
                                    <div class="wrapper-img text-center">
                                        <img class="img-fluid" src="\upload\product\jiKsnk8HZGuPF567w74tXSK7PkrE0yoAcAxGA44k-220x200.png" alt="">
                                    </div>

                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5 class="d-inline-block textfs-price">50.000 ₫</h5>
                                        <button title="Thêm vào giỏ hàng" class="rounded-circle btn-cart d-md-none d-lg-block ">
                                            <img src="/images/shopping-cart-20.png" alt="">
                                        </button>
                                    </div>

                                    <div class="mt-3 pt-2 border-top text-center textfs-time-discount">
                                        <span>00</span> Ngày : <span>00</span> Giờ : <span>00</span> Phút
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-4 col-xl-3 col-md-4 py-3 col-6 product-item">
                                <div class="product-item-w border-right">
                                    <h5><a class="text-product" href="">Game Console Controller + USB 3.0 Cable Game Console Controller + USB 3.0 Cable</a></h5>
                                    <div class="wrapper-img text-center">
                                        <img class="img-fluid" src="\upload\product\jiKsnk8HZGuPF567w74tXSK7PkrE0yoAcAxGA44k-220x200.png" alt="">
                                    </div>

                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h6 class="d-inline-block mr-2 textfs-price" style=" text-decoration: line-through;">50.000 ₫</h6>
                                            <h5 class="d-inline-block text-danger textfs-discount">50.000 ₫</h5>
                                        </div>

                                        <button title="Thêm vào giỏ hàng" class="rounded-circle btn-cart d-md-none d-lg-block ">
                                            <img src="/images/shopping-cart-20.png" alt="">
                                        </button>
                                    </div>

                                    <div class="mt-3 pt-2 border-top text-center textfs-time-discount">
                                        <span>00</span> Ngày : <span>00</span> Giờ : <span>00</span> Phút
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-4 col-xl-3 col-md-4 py-3 col-6 d-md-none d-xl-block product-item">
                                <div class="product-item-w border-right">
                                    <h5><a class="text-product" href="">Game Console Controller + USB 3.0 Cable Game Console Controller + USB 3.0 Cable</a></h5>
                                    <div class="wrapper-img text-center">
                                        <img class="img-fluid" src="\upload\product\jiKsnk8HZGuPF567w74tXSK7PkrE0yoAcAxGA44k-220x200.png" alt="">
                                    </div>

                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5 class="d-inline-block textfs-price">50.000 ₫</h5>
                                        <button title="Thêm vào giỏ hàng" class="rounded-circle btn-cart d-md-none ">
                                            <img src="/images/shopping-cart-20.png" alt="">
                                        </button>
                                    </div>

                                    <div class="mt-3 pt-2 border-top text-center textfs-time-discount">
                                        <span>00</span> Ngày : <span>00</span> Giờ : <span>00</span> Phút
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div style="background: #f9f9f9; margin: 0px -15px; " class="mt-5 pb-sm-4" id="tab-categories">
                <div class="container mt-5">
                    <div class="row">
                        <div class="col py-sm-2">
                            <ul class="nav justify-content-center">
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#home">Laptop</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#menu1">Router wifi</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#menu2">Iphone</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane container active" id="home">
                                    <div class="row row-xs">
                                        <div class="py-3 col-md-4 col-xl-2 col-lg-3 col-6 product-item">
                                            <div class="product-item-w border-right">
                                                <h5><a class="text-product" href="">Game Console Controller + USB 3.0 Cable Game Console Controller + USB 3.0 Cable</a></h5>
                                                <div class="wrapper-img text-center">
                                                    <img class="img-fluid" src="\upload\product\jiKsnk8HZGuPF567w74tXSK7PkrE0yoAcAxGA44k-220x200.png" alt="">
                                                </div>

                                                <div class="d-flex justify-content-between align-items-center">
                                                    <h5 class="d-inline-block textfs-price">50.000 ₫</h5>
                                                    <button title="Thêm vào giỏ hàng" class="rounded-circle btn-cart d-md-none d-lg-block ">
                                                        <img src="/images/shopping-cart-20.png" alt="">
                                                    </button>
                                                </div>

                                                <div class="mt-3 pt-2 border-top text-center textfs-time-discount">
                                                    <span>00</span> Ngày : <span>00</span> Giờ : <span>00</span> Phút
                                                </div>

                                            </div>
                                        </div>
                                        <div class="py-3 col-md-4 col-xl-2 col-lg-3 col-6 product-item">
                                            <div class="product-item-w border-right">
                                                <h5><a class="text-product" href="">Game Console Controller + USB 3.0 Cable Game Console Controller + USB 3.0 Cable</a></h5>
                                                <div class="wrapper-img text-center">
                                                    <img class="img-fluid" src="\upload\product\jiKsnk8HZGuPF567w74tXSK7PkrE0yoAcAxGA44k-220x200.png" alt="">
                                                </div>

                                                <div class="d-flex justify-content-between align-items-center">
                                                    <h5 class="d-inline-block textfs-price">50.000 ₫</h5>
                                                    <button title="Thêm vào giỏ hàng" class="rounded-circle btn-cart d-md-none d-lg-block ">
                                                        <img src="/images/shopping-cart-20.png" alt="">
                                                    </button>
                                                </div>

                                                <div class="mt-3 pt-2 border-top text-center textfs-time-discount">
                                                    <span>00</span> Ngày : <span>00</span> Giờ : <span>00</span> Phút
                                                </div>

                                            </div>
                                        </div>
                                        <div class="py-3 col-md-4 col-xl-2 col-lg-3 col-6 product-item">
                                            <div class="product-item-w border-right">
                                                <h5><a class="text-product" href="">Game Console Controller + USB 3.0 Cable Game Console Controller + USB 3.0 Cable</a></h5>
                                                <div class="wrapper-img text-center">
                                                    <img class="img-fluid" src="\upload\product\jiKsnk8HZGuPF567w74tXSK7PkrE0yoAcAxGA44k-220x200.png" alt="">
                                                </div>

                                                <div class="d-flex justify-content-between align-items-center">
                                                    <h5 class="d-inline-block textfs-price">50.000 ₫</h5>
                                                    <button title="Thêm vào giỏ hàng" class="rounded-circle btn-cart d-md-none d-lg-block ">
                                                        <img src="/images/shopping-cart-20.png" alt="">
                                                    </button>
                                                </div>

                                                <div class="mt-3 pt-2 border-top text-center textfs-time-discount">
                                                    <span>00</span> Ngày : <span>00</span> Giờ : <span>00</span> Phút
                                                </div>

                                            </div>
                                        </div>
                                        <div class="py-3 col-md-4 col-xl-2 col-lg-3 col-6 product-item">
                                            <div class="product-item-w border-right">
                                                <h5><a class="text-product" href="">Game Console Controller + USB 3.0 Cable Game Console Controller + USB 3.0 Cable</a></h5>
                                                <div class="wrapper-img text-center">
                                                    <img class="img-fluid" src="\upload\product\jiKsnk8HZGuPF567w74tXSK7PkrE0yoAcAxGA44k-220x200.png" alt="">
                                                </div>

                                                <div class="d-flex justify-content-between align-items-center">
                                                    <h5 class="d-inline-block textfs-price">50.000 ₫</h5>
                                                    <button title="Thêm vào giỏ hàng" class="rounded-circle btn-cart d-md-none d-lg-block ">
                                                        <img src="/images/shopping-cart-20.png" alt="">
                                                    </button>
                                                </div>

                                                <div class="mt-3 pt-2 border-top text-center textfs-time-discount">
                                                    <span>00</span> Ngày : <span>00</span> Giờ : <span>00</span> Phút
                                                </div>

                                            </div>
                                        </div>
                                        <div class="py-3 col-xl-2 d-none d-xl-block product-item">
                                            <div class="product-item-w border-right">
                                                <h5><a class="text-product" href="">Game Console Controller + USB 3.0 Cable Game Console Controller + USB 3.0 Cable</a></h5>
                                                <div class="wrapper-img text-center">
                                                    <img class="img-fluid" src="\upload\product\jiKsnk8HZGuPF567w74tXSK7PkrE0yoAcAxGA44k-220x200.png" alt="">
                                                </div>

                                                <div class="d-flex justify-content-between align-items-center">
                                                    <h5 class="d-inline-block textfs-price">50.000 ₫</h5>
                                                    <button title="Thêm vào giỏ hàng" class="rounded-circle btn-cart d-md-none d-lg-block ">
                                                        <img src="/images/shopping-cart-20.png" alt="">
                                                    </button>
                                                </div>

                                                <div class="mt-3 pt-2 border-top text-center textfs-time-discount">
                                                    <span>00</span> Ngày : <span>00</span> Giờ : <span>00</span> Phút
                                                </div>

                                            </div>
                                        </div>
                                        <div class="py-3 col-xl-2 d-none d-xl-block product-item">
                                            <div class="product-item-w border-right">
                                                <h5><a class="text-product" href="">Game Console Controller + USB 3.0 Cable Game Console Controller + USB 3.0 Cable</a></h5>
                                                <div class="wrapper-img text-center">
                                                    <img class="img-fluid" src="\upload\product\jiKsnk8HZGuPF567w74tXSK7PkrE0yoAcAxGA44k-220x200.png" alt="">
                                                </div>

                                                <div class="d-flex justify-content-between align-items-center">
                                                    <h5 class="d-inline-block textfs-price">50.000 ₫</h5>
                                                    <button title="Thêm vào giỏ hàng" class="rounded-circle btn-cart d-md-none d-lg-block ">
                                                        <img src="/images/shopping-cart-20.png" alt="">
                                                    </button>
                                                </div>

                                                <div class="mt-3 pt-2 border-top text-center textfs-time-discount">
                                                    <span>00</span> Ngày : <span>00</span> Giờ : <span>00</span> Phút
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="tab-pane container fade" id="menu1">...</div>
                                <div class="tab-pane container fade" id="menu2">...</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container mt-3">
                <div class="row">
                    <div class="col">
                        <div class="full-banner">
                            <img src="/images/banner-trang-bottom.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>

            <div id="product-other">
                <div class="container mt-4  position-relative">
                    <h5 style="border-bottom: 2px solid yellow" class="pb-2 d-inline-block">Các sản phẩm khác</h5>
                    <div class="border-top pt-3"></div> 
                    <div class="row">
                        <splide :options="optionsOther">
                            <splide-slide v-for="i in _.range(1, 10)" :key="i">
                                <div style="padding: 0px 15px"  class="py-3 product-item">
                                    <div class="product-item-w border-right">
                                        <h5><a class="text-product" href="">Game Console Controller + USB 3.0 Cable Game Console Controller + USB 3.0 Cable</a></h5>
                                        <div class="wrapper-img text-center">
                                            <img class="img-fluid" src="\upload\product\jiKsnk8HZGuPF567w74tXSK7PkrE0yoAcAxGA44k-220x200.png" alt="">
                                        </div>

                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5 class="d-inline-block textfs-price">50.000 ₫</h5>
                                            <button title="Thêm vào giỏ hàng" class="rounded-circle btn-cart d-md-none d-lg-block">
                                                <img src="/images/shopping-cart-20.png" alt="">
                                            </button>
                                        </div>

                                        <div class="mt-3 pt-2 border-top text-center textfs-time-discount">
                                            <span>00</span> Ngày : <span>00</span> Giờ : <span>00</span> Phút
                                        </div>

                                    </div>
                                </div>
                            </splide-slide> 

                            <template v-slot:controls>
                                <div class="splide__arrows">
                                    <button class="splide__arrow splide__arrow--prev">
                                        <i class="fa fa-chevron-left" aria-hidden="true"></i>
                                    </button>
                                    <button class="splide__arrow splide__arrow--next">
                                        <i class="fa fa-chevron-right" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </template>
                        </splide>
                    </div>
                </div>
            </div>

        </template>

    </index-item>

</div>
</template>

<script>
import {
    Splide,
    SplideSlide
} from '@splidejs/vue-splide';
import IndexItem from '../Index.vue';
import SliderItem from './Slider.vue'
export default {
    name: 'IndexDefault',
    data() {
        return {
            options: {
                width: 340,
                pagination: false,
                breakpoints: {
                    768: {
                        width: 768,
                    },

                    992: {
                        width: 300,
                    },
                }

            },

            optionsOther: {
                width: '100%',
                rewind : true,
                padding: 15,
                perMove: 2,
                perPage: 6,
                breakpoints: {
                    1200: {
                        perPage: 4,
                    },
                    992: {
                        perPage: 3,
                    },
                    768: {
                        perPage: 2,
                    },
                    576: {
                        perPage: 2,
                    }
                }
            }
        }
    },
    components: {
        IndexItem,
        SliderItem,
        Splide,
        SplideSlide
    }
}
</script>

<style lang="scss" >
.main-onsale:hover .splide__arrow--next {
    opacity: 1 !important;
    cursor: pointer !important;
    transform: translateX(0px) !important;
}

.main-onsale:hover .splide__arrow--prev {
    opacity: 1 !important;
    cursor: pointer !important;
    transform: translateX(0px) !important;
}

.textfs-time-discount {
    font-size: 0.9rem !important;
}

.wrapper-onsale {
    border: 2px solid #FED700;
    border-radius: 30px;

    .wrapper-onsale-item {
        .img-on-sale {
            img {
                // max-width: 320px;
                min-height: 300px;
            }
        }

        .text-fs {
            font-size: 1.8rem;
        }

        .text-on-sale {
            margin: 0 auto;
            width: 250px;

            h5 {
                line-height: 1;

                a {
                    color: #3949ab !important;
                    font-size: 1.1rem;
                }

            }

        }
    }

    .splide__arrows {
        .splide__arrow--prev {
            position: absolute;
            top: 47%;
            opacity: 0;
            left: 15px;
            transform: translateX(-55px);
            transition: all 0.5s;
            border: none;
            background: #ffff00;

            i {
                color: #6200ea;
            }
        }

        .splide__arrow--next {
            position: absolute;
            top: 47%;
            opacity: 0;
            transform: translateX(55px);
            transition: all 0.5s;
            border: none;
            background: #ffff00;
            right: 15px;

            i {
                color: #6200ea;
            }
        }
    }
}

.textfs-price {
    font-size: 1.1rem !important;
}

.textfs-discount {
    font-size: 1.2rem !important;
}

// product

.product-item-w {
    margin-right: -15px;
    padding: 0px 15px;
}

#laptop .product-item:last-child .product-item-w {
    border-right: none !important;
}

#dienthoai .product-item:last-child .product-item-w {
    border-right: none !important;
}

.product-item:hover {
    box-shadow: 1px 1px 5px 3px rgb(228, 226, 226);

}

.product-item:hover .product-item-w {
    border-right: none !important;

}

.product-item {
    h5 {
        line-height: 1;
    }

    .text-product {
        color: #3949ab !important;
        font-size: 0.9rem;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .btn-cart:hover {
        transform: translateY(-5px);
        box-shadow: 1px 1px 5px 2px rgb(238, 218, 129);
    }

    .btn-cart {
        border: none;
        background-color: #FED700;
        height: 2.2rem;
        transition: all 0.5s;
        width: 2.2rem;
    }
}

#tab-categories {
    .nav-link.active {
        font-weight: bold !important;
        border-bottom: 2px solid #FED700;
        background-color: #f9f9f9 !important;
    }

    .tab-content {
        .active {
            background-color: white !important;
        }
    }
}

@media screen and (max-width: 576px) {
    .wrapper-onsale-item img {
        max-width: 100% !important;
    }

    .text-fs {
        font-size: 1.2rem !important;
    }

    .text-on-sale {
        width: 200px !important;

        a {
            font-size: 0.9rem !important;
            ;
        }

    }

    #tab-categories {
        margin: 0px !important;
    }

    .product-item-w {
        padding-left: 0px !important;

    }

    .row-xs {
        margin: 0px !important;
    }

}

@media screen and (max-width: 992px) {
    .wrapper-onsale-item {
        max-width: 300px;
    }

    .textfs-price {
        font-size: 0.9rem !important;
    }

    .textfs-discount {
        font-size: 1.1rem !important;
    }

    .textfs-time-discount {
        font-size: 0.8rem !important;
    }

    #tab-categories .product-item:nth-child(3) .product-item-w {
        border-right: none !important;
    }
}

@media screen and (max-width: 768px) {
    .wrapper-onsale-item {
        max-width: 768px !important;
    }

    #laptop .product-item:nth-child(2) .product-item-w {
        border-right: none !important;
    }

    #dienthoai .product-item:nth-child(2) .product-item-w {
        border-right: none !important;
    }

    #tab-categories .product-item:nth-child(even) .product-item-w {
        border-right: none !important;
    }

    #tab-categories .product-item:nth-child(odd) .product-item-w {
        border-right: 1px solid #dee2e6 !important;
    }

}

@media screen and (max-width: 1200px) {
    .product-item-w {
        padding-left: 0px !important;
    }

    #tab-categories .product-item:nth-child(4) .product-item-w {
        border-right: none !important;
    }
}

@media screen and (max-width: 1200px) and (min-width: 768px) {
    #laptop .product-item:nth-child(3) .product-item-w {
        border-right: none !important;
    }

    #dienthoai .product-item:nth-child(3) .product-item-w {
        border-right: none !important;
    }

}

#tab-categories .product-item:last-child .product-item-w {
    border-right: none !important;
}

@media screen and (min-width: 1200px) {}

.full-banner {
    img {
        width: 100% !important;
        max-height: 146px !important;
        object-fit: fill;
    }
}

#product-other{
    .splide__pagination {   
        width: 100%;
        margin-top: 20px;
        justify-content: center;

        li {
            margin-right: 10px;

            .splide__pagination__page {
                width: 10px;
                height: 10px;
                border: none;
                background-color: rgb(172, 165, 165);
                border-radius: 10px;
            }

            .is-active {
                width: 30px;
                border-radius: 30px;
                background-color: #f8e67e;
            }
        }
    }

    .splide__arrows{
         
        .splide__arrow--prev{
            border: none !important;
            position: absolute;
            top: -50px;
            right: 45px;
        }

        .splide__arrow--next{
             border: none !important;
             position: absolute;
             top: -50px;
             right: 15px;
        }
    }
}
</style>
