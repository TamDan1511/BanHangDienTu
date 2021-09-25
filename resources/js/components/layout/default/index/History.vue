<template>
<div>
    <index-item>
        <template v-slot:slider>
            <slider-item></slider-item>
        </template>

        <template v-slot:main>
            <div class="container">
                <div class="content-main">
                    <h1>History</h1>
                    <div class="cart-table">
                        <table class="table" cellspacing="0">
                            <thead>
                                <tr>
                                    <th class="product-remove">Code</th>
                                    <th class="product-img">Image</th>
                                    <th class="product-name">Product</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-total">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <p>DH-3293</p>
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
                                        <p>1</p>

                                    </td>
                                    <td>
                                        <span>$1,100.00</span>

                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>DH-23947</p>
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
                                        <p>1</p>

                                    </td>
                                    <td>
                                        <span>$1,100.00</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>DH-123y7219</p>
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
                                        <p>1</p>
                                    </td>
                                    <td>
                                        <span>$1,100.00</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </template>

    </index-item>
</div>
</template>

<script>
import Index from '../../admin/Index.vue';

import IndexItem from '../Index.vue';
export default {
    name: 'HistoryItem',
    data() {
        return {}
    },
    components: {
        IndexItem,
        Index,
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
</style>
