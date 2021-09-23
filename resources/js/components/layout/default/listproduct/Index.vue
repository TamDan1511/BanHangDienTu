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
        name: 'IndexListProduct',
        components:{
            IndexItem
        },
        created(){
            console.log(this.$route.params.category);
            
        }
    }
</script>

<style lang="scss" scoped>

</style>