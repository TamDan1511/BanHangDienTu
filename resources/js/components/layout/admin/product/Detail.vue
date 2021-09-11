<template>
<div>
    <div class="modal fade" id="detail-product">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Thông tin chi tiết sản phẩm</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" v-if="subPicture.length > 0">
                    <div class="mt-5">
                        <splide :options="primaryOptions" ref="primary" id="primary" class="float-right">
                            <splide-slide v-for="picture in subPicture" :key="path + picture.picture">
                                <img :src="path + picture.picture" class="picture-primary">
                            </splide-slide>
                        </splide>
                        <splide :options="secondaryOptions" id="second" ref="secondary">
                            <template v-slot:controls>
                                <div class="splide__arrows">
                                    <button class="splide__arrow splide__arrow--prev rounded-circle btn px-3 py-2">
                                        <i class="fa fa-arrow-circle-o-down" aria-hidden="true"></i>
                                    </button>
                                    <button class="splide__arrow splide__arrow--next rounded-circle btn px-3 py-2">
                                        <i class="fa fa-arrow-circle-o-up" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </template>
                            <splide-slide v-for="picture in subPicture" :key="path + picture.picture">
                                <img :src="path + picture.picture">
                            </splide-slide>
                        </splide>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                </div>
            </div>
        </div>
    </div>

</div>
</template>

<script>
import {
    Splide,
    SplideSlide
} from '@splidejs/vue-splide';
// import '@splidejs/splide/dist/css/themes/splide-default.min.css';
 
export default {
    name: 'DetailItem',
    props: {
        product: Object,
        subPicture: []
    },
     
    components: {
        Splide,
        SplideSlide,
    },
    data: function () {
        return {
            path: '/upload/product/',
            primaryOptions: {
                type: 'fade',
                height: 300,
                width: 550,
                rewind: true,
                pagination: false,
                arrows: false,

            },
            secondaryOptions: {
                fixedWidth: 120,
                fixedHeight: 100,
                height: 270,
                gap: 10,
                width: 216,
                rewind: true,
                cover: true,
                direction: 'ttb',
                pagination: false,
                isNavigation: true,
                 
            } 

        }
    }, 
    updated() {    
  
        this.$refs.primary.sync(this.$refs.secondary.splide);
    }
}
</script>

<style lang="scss" scoped>
.picture-primary {
    object-fit: fill;
    height: 300px !important;
    border: 4px solid#f1f8e9;
    border-radius: 5px;
    width: 550px !important;
}
.splide__arrow--prev{
    position: absolute;
    top: -57px;
    left: 40%;
    background-color: #f1f8e9;
}

.splide__arrow--next{
    position: absolute;
    bottom: -57px;
     background-color: #f1f8e9;
    left: 40%;
}
#second .splide__list .is-active{
    border: 4px solid#f1f8e9;
    border-radius: 5px;
}
</style>
