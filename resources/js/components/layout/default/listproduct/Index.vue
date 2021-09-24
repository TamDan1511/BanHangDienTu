<template>
<div>
    <index-item>
        <template v-slot:main>
            <div class="container">
                <div class="row mt-2">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Laptop</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Asus</li>
                        </ol>
                    </nav>

                </div>

                <div class="row mb-5">
                    <div class="col-md-3">
                        <h5 class="pb-1 d-inline-block" style="border-bottom: 2px solid #FED700">Danh mục</h5>
                        <ul class="nav border-bottom pb-3">
                            <li class="nav-item w-50 pl-2 mb-2" v-for="(item, index) in _.range(6)" :key="index">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                    <label class="custom-control-label" for="customCheck1">Asus</label>
                                </div>
                            </li>
                        </ul>

                        <div class="mt-3 border-bottom pb-3">
                            <label for="#customRange1" class="mb-0">Giá</label>
                            <input type="range" class="custom-range" id="customRange1">
                            <div>
                                <span>50000</span> - <span>1000000</span>
                            </div>

                            <button class="btn btn-warning mt-3 px-4">Lọc</button>
                        </div>

                         
                        <div class="mt-3">
                            <h5 class="pb-1 d-inline-block" style="border-bottom: 2px solid #FED700">Sản phẩm giảm giá</h5>
                             <ul class="nav">
                                <li class="nav-item py-2 row">
                                    <div class="col-auto d-flex align-items-center">
                                        <img width="75" height="75" src="/upload/product/1uVa6ShnJ0TRoWLkL5bKsggV6ie6JNt1yvRUUPty-220x200.png" alt="">
                                    </div>

                                    <div class="col">
                                        <span class="text-product-cart">Ultra Wireless S50 Headphones S50 with Bluetooth</span>
                                        <span>1 × $1,100.00</span> <br>
                                        <span class="text-danger textfs-time-discount">00 ngày : 00 giờ : 00 phut</span>
                                    </div>
        
                                </li>
                                <li class="nav-item py-2 row">
                                    <div class="col-auto">
                                        <img width="75" height="75" src="/upload/product/1uVa6ShnJ0TRoWLkL5bKsggV6ie6JNt1yvRUUPty-220x200.png" alt="">
                                    </div>

                                    <div class="col">
                                        <span>Ultra Wireless S50 Headphones S50 with Bluetooth</span> <br>
                                        <span>1 × $1,100.00</span> <br>
                                        <span class="text-danger textfs-time-discount">00 ngày : 00 giờ : 00 phut</span>
                                    </div>
        
                                </li>
                             </ul>
                            <div class="text-center">
                                 <button class="btn btn-success mt-3">Xem thêm</button>
                            </div>
                             
                        </div>

                    </div>
                    <div class="col-md-9">
                        <h4>Danh mục Asus</h4>
                        <div class="rounded px-3 py-1" style="background: #f5f5f5;">
                            <ul class="nav">
                                <li class="nav-item ml-auto" style="width: 150px">
                                    <select class="custom-select rounded-pill px-3">
                                        <option selected>Sắp xếp theo</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </li>
                            </ul>
                        </div>
                        <div class="row mt-3" style="margin: 0px 0px">
                            <div class="col-lg-3 col-md-4 col-6 py-3 product-item" v-for="i in _.range(8)" :key="i">
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
                             
                        </div>

                         <div class="text-center">
                                 <button class="btn btn-success mt-5">Xem thêm</button>
                            </div>
                    </div>
                </div>
            </div>

        </template>
    </index-item>
</div>
</template>

<script>
import IndexItem from '../Index.vue';
export default {
    name: 'IndexListProduct',
    components: {
        IndexItem
    },
    mounted() {
        $('.drop-category').css({
            display: 'none'
        })
    }
}
</script>

<style lang="scss" scoped>
.breadcrumb-item+.breadcrumb-item::before {
    content: ">";
}
.text-product-cart{
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
.breadcrumb,
.breadcrumb-item.active {
    background: white !important;
}
</style>
