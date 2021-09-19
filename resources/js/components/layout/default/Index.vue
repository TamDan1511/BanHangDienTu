<template>
<div class="container-fluid bg-white">
    
    <header-item />
    <slot name="slider"></slot>
    <slot name="main"></slot>
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
body * {
    color: #334141;
}

.bgcolor-custom {
    background-color: #FED700;
}

@media screen and (min-width: 1480px) {
    .container {
        max-width: 1430px !important;
    }
}

a,
a:hover {
    color: #334141 !important;
    text-decoration: none !important;
}
 

@media screen and (max-width: 576px) {
    .container {
        padding: 0px !important;
    }
  

}
</style>
