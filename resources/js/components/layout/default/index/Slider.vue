<template>
<div>
    <div id="wrapper-slider">
        <div class="container position-relative">
            <template>
                <splide :options="options">
                    <splide-slide>
                        <div class="row h-100">
                            <div class="offset-lg-3 pt-lg-4 col-lg-4 col-md-5 col-sm-6 col">
                                <h1 class="mt-lg-5 title mt-2">
                                    <span>Sam sung Galaxy x5</span>
                                </h1>
                                <p class="w-75 content">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque hendrerit in tortor non ullamcorper.</p>

                                <a class="btn btn-warning py-sm-2 px-sm-5 mt-3">Xem ngay</a>
                            </div>
                            <div class="col-lg-5 col-md-6 col-sm-6 col d-flex align-items-center">
                                <img class="img-fluid" src="/images/img2.png">
                            </div>
                        </div>
                    </splide-slide>
                    <splide-slide>
                        <div class="row h-100">
                            <div class="offset-lg-3 pt-lg-4 col-lg-4 col-md-5 col-sm-6 col">
                                <h1 class="mt-lg-5 mt-2 title">
                                    <span>Sam sung Galaxy x5</span>
                                </h1>
                                <p class="w-75 content">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque hendrerit in tortor non ullamcorper.</p>

                                <a class="btn btn-warning py-sm-2 px-sm-5 mt-3">Xem ngay</a>
                            </div>
                            <div class="col-lg-5 col-md-6 col-sm-6 col d-flex align-items-center">
                                <img class="img-fluid" src="/images/img2.png">
                            </div>
                        </div>
                    </splide-slide>
                </splide>
            </template>
        </div>
    </div>   
</div>
</template>

<script>
import {
    Splide,
    SplideSlide
} from '@splidejs/vue-splide';
export default {
    name: 'SliderItem',
    data() {
        return {
            options: {
                rewind: true,
                width: '100%',
                perPage: 1,
                gap: '1rem',
                arrows: false
            },
        };
    },
    components: {
        Splide,
        SplideSlide,
    }
}
</script>

<style lang="scss">
#wrapper-slider {
    margin: 0 -15px;
    padding: 0 15px !important;
    max-height: 420px;
    background-image: url('/images/bgslider.jpg');

    img {
        max-height: 420px !important;
    }

    .splide__pagination {
        position: absolute;
        left: 25%;
        width: auto;
        justify-content: start;
        bottom: 30px;

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
}

@media screen and(max-width: 768px) {
    #wrapper-slider .content {
        width: 100% !important;
    }

    #wrapper-slider .title {
        font-size: 1rem;
    }
}

@media screen and(max-width: 576px) {
    #wrapper-slider .content {
        display: none;
    }
}
</style>
