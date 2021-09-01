<template>
    <ul class="nav justify-content-center">
        <li class="nav-item mr-2">
            <a class="nav-link rounded-circle bg-page" :class="{disabled: pagi.current_page == 1}" v-on:click="$emit('change-page', pagi.current_page  - 1)">
            	<i class="fa fa-arrow-circle-o-left" aria-hidden="true"></i>
            </a>
        </li>

        <li class="nav-item mr-2" v-for="(page, index) in _.range(startPage, endPage)" :key="index">
            <a class="nav-link rounded-circle bg-page" :class="{active: pagi.current_page == page}" v-on:click="$emit('change-page', page)" >{{page}}</a>
        </li>
        
        <li class="nav-item mr-2">
            <a class="nav-link rounded-circle bg-page" :class="{disabled: pagi.current_page == pagi.last_page}" v-on:click="$emit('change-page', pagi.current_page  + 1)">
            	<i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i>
            </a>
        </li>
      
    </ul>
</template>
<script>
export default {
    name: 'PaginationItem',
    data: function(){
        return {
            rangePages: 6,
            startPage : 0,
            endPage: 0
        }
    },
    props: {
        pagi: Object
    },
    watch:{
         pagi: function(){
             this.pagination();
         }
    },
    methods:{
        pagination: function(){
            if(this.pagi.current_page <= 3)
            {
                 this.startPage = 1;
                 this.endPage = this.rangePages + 1;
            }else{
       
                this.startPage =this.pagi.current_page - (this.pagi.current_page % 2) - 1;
                this.endPage = this.rangePages + this.startPage;
                if(this.endPage > this.pagi.last_page)
                {
                     
                    this.endPage -= this.endPage % this.pagi.last_page ; 
                    this.endPage += 1;
                    this.startPage = this.endPage - this.rangePages;
                }
            }

            if(this.pagi.last_page < this.rangePages)
            {
                this.endPage = this.pagi.last_page + 1;
                this.startPage = 1;
            }

        }
    },
    created(){
        this.pagination();
    }
}

</script>
<style>
.bg-page {
    background-color: #eeeeee;
    transition: background-color 0.5s ease-out;
}

.bg-page:hover, .active {
    background-color: #fff176 !important;
    color: #546e7a;
}



</style>
