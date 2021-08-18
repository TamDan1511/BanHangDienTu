<template>
	<index-item v-slot:MainRight>
		<div>trang index</div>
	</index-item>
</template>
<script>
	import IndexItem from '../Index.vue';
	export default{
		name: 'IndexAdmin',
		metaInfo: {
	        title: 'Trang admin'
	    },
	    components: {
	    	IndexItem
	    }
	}
</script>

<style>
	
</style>