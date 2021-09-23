<template>
    <div>
        <index-item>
            <template v-slot:main>

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
        components:{
            IndexItem
        },
        created(){
            console.log(this.$route.params.product);
            
        }
    }
</script>

<style lang="scss" scoped>

</style>