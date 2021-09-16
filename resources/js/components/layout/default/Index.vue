<template>
    <div class="container-fluid bg-white vh-100">
        <header-item />
    </div>
</template>

<script>
import HeaderItem from './html/Header.vue';
import FooterItem from './html/Footer.vue';
    export default {
        name: 'IndexItem',
        components: {
            HeaderItem,
            FooterItem
        }
    }
</script>

<style lang="scss">
    body *{
        color: #334141;
    }
    .container{
        max-width: 1430px !important;
    }
    a, a:hover{
        color: #334141 !important;
        text-decoration: none !important;
    }
</style>