<template>
<div>
    <index-item>
        <template v-slot:main>
           
                    <div class="container">
                        <div class="main-content">
                            <div class="row">
                                <div class="col-lg-5">
                                    <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
                                        <div class="carousel-inner">
                                            <div class="carousel-item active" data-interval="10000">
                                                <img src="https://transvelo.github.io/electro-html/2.0/assets/img/720X660/img1.jpg
                                        " class="d-block w-100" alt="...">
                                            </div>
                                            <div class="carousel-item" data-interval="2000">
                                                <img src="https://transvelo.github.io/electro-html/2.0/assets/img/720X660/img2.jpg
                                        " class="d-block w-100" alt="...">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="https://transvelo.github.io/electro-html/2.0/assets/img/720X660/img3.jpg" class="d-block w-100" alt="...">
                                            </div>
                                        </div>
                                        <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="product-content">
                                        <div class="top-product-content">
                                            <a href="#">Headphones</a>
                                            <h2>Ultra Wireless S50 Headphones S50 with Bluetooth</h2>
                                            <div class="top-product-number">
                                                <span>Available: </span>
                                                <span>16 in stock</span>
                                            </div>
                                        </div>
                                        <div class="main-product-content">
                                            <div class="product-summary">
                                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nobis totam autem
                                                    rerum eos, qui sunt cupiditate tempore, id exercitationem repellendus omnis,
                                                    nam tenetur quisquam? Adipisci ex id nihil accusamus quod. </p>
                                                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aut quaerat iure
                                                    laborum? Asperiores eos libero minus suscipit magni quae dignissimos labore
                                                    modi praesentium recusandae quibusdam ut hic, vel facilis delectus.</p>
                                            </div>
                                            <div class="product-price">
                                                <span class="sale-price">$1,999.00</span>
                                                <span class="primary-price">$2,299.00</span>
                                            </div>
                                        </div>
                                        <div class="bottom-product-content">
                                            <div class="choose-color">
                                                <div class="form-group">
                                                    <label for="exampleFormControlSelect1">Choose Color</label>
                                                    <select class="form-control" id="exampleFormControlSelect1">
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="choose-quantity">
                                                <p>Quantity</p>
                                                <div>
                                                    <div class="quantity-input">
                                                        <input type="text" class="form-control" placeholder="0" id="product-num">
                                                        <i class="fas fa-plus"></i>
                                                        <i class="fas fa-minus"></i>
                                                    </div>
                                                    <div class="add-to-cart-btn">
                                                        <i class="fas fa-shopping-cart"></i>
                                                        <span>Add to cart</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="footer-content">
                            <div class="footer-content-header">
                                <div class="product-description footer-content-header-active">
                                    <p>Description</p>
                                </div>
                                <div class="product-review">
                                    <p>Review</p>
                                </div>
                            </div>
                            <div class="footer-content-main">
                                <div class="product-description">
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus magnam soluta adipisci
                                        magni inventore. Alias quidem ipsum maiores iste eaque tempore ea! Nulla hic modi veniam
                                        est nemo cumque porro!</p>
                                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptas totam consectetur
                                        repellat placeat, similique dolorum necessitatibus modi? Aliquid tenetur sequi a,
                                        deserunt praesentium officia ullam aperiam! Quo sed voluptas nemo! Lorem ipsum dolor sit
                                        amet consectetur adipisicing elit. Deserunt expedita sapiente suscipit ipsa vitae neque
                                        totam facilis illum, quos unde quam animi voluptatibus. Optio non sit quis. Aliquam,
                                        alias quis.</p>
                                </div>
                                <div class="product-review">
                                    <h3 class="your-reviews">Your Reviews</h3>
                                    <form>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputName">Name</label>
                                                <input type="text" class="form-control" id="inputName">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail">Email</label>
                                                <input type="email" class="form-control" id="inputEmail">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputReview">Your Reviews</label>
                                            <textarea class="form-control" name="" id="inputReview" cols="30" rows="10"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Add Reviews</button>
                                    </form>
                                    <div class="list-reviews">
                                        <h3 class="">Another Reviews</h3>
                                        <div>
                                            <div>
                                                <span class="user-review">John Doe</span>
                                                <span class="date-review">- April 3, 2019</span>
                                            </div>
                                            <p>
                                                Fusce vitae nibh mi. Integer posuere, libero et ullamcorper facilisis, enim eros tincidunt orci, eget vestibulum sapien nisi ut leo. Cras finibus vel est ut mollis. Donec luctus condimentum ante et euismod.
                                            </p>
                                        </div>
                                        <div>
                                            <div>
                                                <span class="user-review">John Doe</span>
                                                <span class="date-review">- April 3, 2019</span>
                                            </div>
                                            <p>
                                                Fusce vitae nibh mi. Integer posuere, libero et ullamcorper facilisis, enim eros tincidunt orci, eget vestibulum sapien nisi ut leo. Cras finibus vel est ut mollis. Donec luctus condimentum ante et euismod.
                                            </p>
                                        </div>
                                        <div>
                                            <div>
                                                <span class="user-review">John Doe</span>
                                                <span class="date-review">- April 3, 2019</span>
                                            </div>
                                            <p>
                                                Fusce vitae nibh mi. Integer posuere, libero et ullamcorper facilisis, enim eros tincidunt orci, eget vestibulum sapien nisi ut leo. Cras finibus vel est ut mollis. Donec luctus condimentum ante et euismod.
                                            </p>
                                        </div>
                                    </div>
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
    metaInfo: {
        title: 'Chi tiết sản phẩm'
    },
    name: 'ProductDetail',
    components: {
        IndexItem
    },
    created() {
        console.log(this.$route.params.product);

    }
}
</script>

<style lang="scss">
.carousel-control-next-icon,
.carousel-control-prev-icon {
    padding: 30px 10px;
    background-color: #F79F1F;
}

/*  */
.top-product-content {
    padding-bottom: 20px;
    border-bottom: .5px solid #d2dae2;
}

.top-product-content a {
    font-size: 1rem;
    color: #878787;
}

.top-product-content a:hover {
    text-decoration: none;
    color: #2f3640;
}

.top-product-content h2 {
    font-size: 1.5rem;
    font-weight: 100;
    margin: 10px 0;
}

.top-product-content span:first-child {
    color: #878787;
}

.top-product-content span:last-child {
    color: #009432;
    font-weight: bold;
}

/* start main-product-content */
.main-product-content {
    margin-top: 30px;
}

.product-price .sale-price {
    font-size: 2rem;
    /* color: #1e272e; */
}

.product-price .primary-price {
    color: #848484;
    font-size: 1rem;
    text-decoration: line-through;
}

.main-product-content {
    padding-bottom: 20px;
    border-bottom: .5px solid #d2dae2;
}

/*  */
.bottom-product-content,
.choose-color {
    margin-top: 30px;
    padding-bottom: 20px;
    border-bottom: .5px solid #d2dae2;
}

.choose-color .form-group {
    display: flex;
    align-items: center;
    margin-bottom: 0;
}

.choose-color .form-group label {
    margin-bottom: 0;
    margin-right: 10px;
}

.choose-color .form-group select {
    width: 170px;
    border-radius: 20px;
}

/* start choose-quantity */

.bottom-product-content,
.choose-quantity {
    margin-top: 30px;
}

.choose-quantity>div {
    display: flex;
    align-items: center;
}

.choose-quantity .quantity-input {
    width: 200px;
    margin-right: 20px;
    position: relative;
}

.quantity-input input {
    border-radius: 20px;
    padding-right: 50px;
}

.choose-quantity .quantity-input i {
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

.choose-quantity .quantity-input i:hover {
    background-color: #77838f;
    color: #fff;
}

.choose-quantity .quantity-input .fa-plus {
    right: 5px;
}

.choose-quantity .quantity-input .fa-minus {
    right: 25px;
}

.choose-quantity .add-to-cart-btn {
    width: 200px;
    padding: 7px 13px;
    background-color: #F79F1F;
    text-align: center;
    cursor: pointer;
    border-radius: 20px;
    transition: .5s;
}

.choose-quantity .add-to-cart-btn:hover {
    margin-top: -10px;
    background-color: #2f3542;
    box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
}

.add-to-cart-btn i,
.add-to-cart-btn span {
    color: #fff;
}

/* start footer-content-header */
.footer-content {
    margin-top: 70px;
}

.footer-content-header {
    display: flex;
    align-items: center;
    justify-content: center;
}

.footer-content-header>div {
    margin: 0 10px 10px;
    padding: 10px;
    font-size: 1.125rem;
    color: #343f49;
    cursor: pointer;
    transition: .3s;
    border-bottom: 2px solid transparent;
}

.footer-content-header>div>p {
    margin-bottom: 0;
}

.footer-content-header-active {
    border-bottom-color: #fed700 !important;
    font-weight: 700;
    color: #343f49;
}

/*  */
.footer-content-main {
    box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
    padding: 30px 50px;
    border: 1px solid transparent;
    border-radius: 10px;
}

.footer-content-main>div {
    display: none;
}

.footer-content-main>div:first-child {
    display: block;
}

.footer-content-main .product-description {
    padding-top: 30px;
}

.footer-content-main .your-reviews {
    font-size: 1.12525rem;
    font-weight: 500;
    color: #1e272e;
    margin-top: 30px;
    margin-bottom: 50px;
    text-align: center;
}

.product-review form {
    border-bottom: 1px solid #ced6e0;
    padding-bottom: 20px;
}

.list-reviews {
    margin-top: 40px;
}

.list-reviews h3 {
    font-size: 1.12525rem;
    font-weight: 400;
    color: #1e272e;
    margin-top: 0px;
    margin-bottom: 30px;
    text-align: center;
}

.list-reviews>div {
    border-bottom: 1px solid #f1f2f6;
    margin-bottom: 5px;
    margin-top: 60px;
}

.list-reviews .user-review {
    font-weight: 700;
}

.list-reviews .date-review {
    color: #747d8c;
    font-size: 13px;
}

.list-reviews>div>p {
    margin-top: 13px;
}
</style>
