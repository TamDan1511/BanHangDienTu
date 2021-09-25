<template>
<div>
    <index-item>
        <template v-slot:slider>
            <slider-item></slider-item>
        </template>
        <template v-slot:main>
             <div class="container">
                <div class="content-main">
                    <h1>Cart</h1>
                    <div class="cart-table">
                        <table class="table" cellspacing="0">
                            <thead>
                                <tr>
                                    <th class="product-remove"></th>
                                    <th class="product-img"></th>
                                    <th class="product-name">Product</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-total">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <i class="fa fa-times"></i>
                                    </td>
                                    <td>
                                        <a href="#"><img src="https://transvelo.github.io/electro-html/2.0/assets/img/300X300/img6.jpg" alt=""></a>
                                    </td>
                                    <td>
                                        <a href="#">Ultra Wireless S50 Headphones S50 with Bluetooth </a>
                                    </td>
                                    <td>
                                        <span>$1,100.00</span>
                                    </td>
                                    <td>
                                        <div class="quantity-input">
                                            <input type="text" class="form-control" placeholder="0"
                                                id="product-num">
                                            <i class="fas fa-plus"></i>
                                            <i class="fas fa-minus"></i>
                                        </div>
                                    </td>
                                    <td>
                                        <span>$1,100.0000000</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <i class="fas fa-times"></i>
                                    </td>
                                    <td>
                                        <a href="#"><img src="https://transvelo.github.io/electro-html/2.0/assets/img/300X300/img6.jpg" alt=""></a>
                                    </td>
                                    <td>
                                        <a href="#">Ultra Wireless S50 Headphones S50 with Bluetooth </a>
                                    </td>
                                    <td>
                                        <span>$1,100.00</span>
                                    </td>
                                    <td>
                                        <div class="quantity-input">
                                            <input type="text" class="form-control" placeholder="0"
                                                id="product-num">
                                            <i class="fas fa-plus"></i>
                                            <i class="fas fa-minus"></i>
                                        </div>
                                    </td>
                                    <td>
                                        <span>$1,100.00</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <i class="fas fa-times"></i>
                                    </td>
                                    <td>
                                        <a href="#"><img src="https://transvelo.github.io/electro-html/2.0/assets/img/300X300/img6.jpg" alt=""></a>
                                    </td>
                                    <td>
                                        <a href="#">Ultra Wireless S50 Headphones S50 with Bluetooth </a>
                                    </td>
                                    <td>
                                        <span>$1,100.000000</span>
                                    </td>
                                    <td>
                                        <div class="quantity-input">
                                            <input type="text" class="form-control" placeholder="0"
                                                id="product-num">
                                            <i class="fas fa-plus"></i>
                                            <i class="fas fa-minus"></i>
                                        </div>
                                    </td>
                                    <td>
                                        <span>$1,100.00</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="cart-buttons">
                        <div class="left-buttons">
                            <input type="text" class="form-control" placeholder="Coupon code">
                            <button class="btn"><i class="fas fa-tags"></i></button>
                        </div>
                        <div class="right-buttons">
                            <button class="btn update-cart">Update cart</button>
                            <button class="btn checkout-cart">Proceed to checkout</button>
                        </div>
                    </div>
                    <div class="cart-total">
                        <div>
                            <h3>Cart totals</h3>
                            <table>
                                <tr>
                                    <th>Subtotal</th>
                                    <td><span>$1,785.00</span></td>
                                </tr>
                                <tr>
                                    <th>Shipping</th>
                                    <td><span>Flat Rate: $300.00</span></td>
                                </tr>
                                <tr>
                                    <th>Total</th>
                                    <td><span>$2,085.00</span></td>
                                </tr>
                            </table>
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
    name: 'CartItem',
    data() {
        return {
        }
    },
    components: {
        IndexItem,
    },
    mounted() {
        $('.drop-category').css({
            display: 'none'
        })
    }
}
</script>
 <style lang="scss" scoped>
 @media screen and (min-width: 1200px) {
    .container {
        max-width: 1200px !important;
    }
}
h1 {
    text-align: center;
    margin: 10px 0 20px;
}

/* start cart-table */
.cart-table {
    overflow: auto;
}

.cart-table table {
    /* color: #333e48; */
    border-collapse: collapse;
}

.cart-table thead th {
    border-bottom-width: 1px;
    border-top: none;
    color: #747474;
    vertical-align: middle;
    padding: .75rem;
    font-weight: 400;
}

.cart-table tr {
    padding-top: 2.188rem;
}

.cart-table tr td {
    padding: 1.125rem 0.75rem;
    vertical-align: middle;
    border-top: none;
}

.cart-table tr {
    border-bottom-width: 1px !important;
}

.cart-table tr td i {
    cursor: pointer;
}

.cart-table tr td img {   
    max-width: 6.25rem;
}

.cart-table tr td a {   
    text-decoration: none;
    color: #333e48;
}

.cart-table tr td a:hover {
    color: #57606f;   
}

table .quantity-input {
    width: 200px;
    margin-right: 20px;
    position: relative;
}

.quantity-input input {
    border-radius: 20px;
    padding-right: 50px;
}

table .quantity-input i {
    position: absolute;
    top: 11px;
    padding: 3px;
    border-radius: 100%;
    border: 1px solid transparent;
    font-size: 10px;
    color: #77838f;
    cursor: pointer;
    transition: .5s;
}

table .quantity-input i:hover {
    background-color: #77838f;
    color: #fff;
}

table .quantity-input .fa-plus {
    right: 5px;
}

table .quantity-input .fa-minus {
    right: 25px;
}

/* start cart-buttons */
.cart-buttons {
    display: flex;
    align-items: center;
    justify-content: space-between;
    /* flex-wrap: wrap; */
}

.cart-buttons .left-buttons {
    width: 40%;    
    position: relative;
}

.cart-buttons .left-buttons input {
    border-radius: 20px;
    height: calc(24px + 2px + 24px);
    padding-right: 100px;
}

.cart-buttons .left-buttons button {
    position: absolute;
    top: 0;
    right: 0;
    background-color: #2f3542;
    border-top-left-radius: 0;
    border-top-right-radius: 20px;
    border-bottom-right-radius: 20px;
    border-bottom-left-radius: 0;
    transition: .5s;
    padding: 12px 30px;
    font-weight: 700;
}

.cart-buttons .left-buttons button i {
    color: #fff;
}

.cart-buttons .left-buttons button:hover {
    box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
}

.cart-buttons .right-buttons button {
    border: 1px solid transparent;
    border-radius: 20px;
    padding: 12px 30px;
}

.right-buttons .update-cart {
    color: #77838f;
    background: rgba(119, 131, 143, 0.1);
    transition: .5s;
}

.right-buttons .update-cart:hover {
    background-color: #747d8c;
    color: #fff;
    box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
}

.right-buttons .checkout-cart {
    color: #333e48;
    background-color: #fed700;
    font-weight: 700;
    transition: .5s;
}

.right-buttons .checkout-cart:hover {
    color: #fff;
    background-color: #2f3542;
}

/* start cart-total */
.cart-total {
    display: flex;
    justify-content: flex-end;
}

.cart-total > div {
    width: 40%;
    margin-top: 50px;
}

.cart-total h3 {
    padding-bottom: 10px;
    margin-bottom: 0;
    border-bottom: 1px solid #ffa502;
}

.cart-total table {
    width: 100%;
}

.cart-total table tr {
    border-top: 1px solid #ecedf2;
}

.cart-total table td {
    text-align: right;
    padding: 20px 0 10px;

}

@media screen and (max-width: 768px) {
    
}

@media screen and (max-width: 426px) {
    .cart-buttons {
        flex-direction: column;
    }

    .cart-buttons .left-buttons {
        width: 80%;
    }

    .right-buttons {
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .right-buttons .update-cart {
        margin: 20px 0;
    }

    .cart-total {
        justify-content: center;
    }

    .cart-total > div {
        width: 100%;
    }
}
 </style>