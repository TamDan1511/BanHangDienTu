<template>
	<transition :css="false" @beforeEnter="beforeEnter" @enter="enter" > 
	<div class="position-absolute mx-auto btn rounded-pill bg-success" :style="{width: 300 + 'px', left: 40 + '%'}" v-if="isActive">
		<i class="fa fa-check-circle mr-2" :style="{fontSize: 1.2 + 'rem'}" aria-hidden="true"></i> 
		<span>{{ message }}</span> 
	</div>
	</transition>
</template>

<script>
	export default{
		name: 'MessageItem',
		data: function(){
			return {
				message: 'Sửa thành công'
			}
		},
		props:{
			isActive: Boolean
			 
		},
		methods: {
			beforeEnter: function (el) {
			    this.gsap.to(el, {	        
		        top: 0,
		        opacity: 0
		      });
			 },
			enter(el, done) {
				let top = this.$(window).scrollTop() + 100;
		       	this.gsap.to(el, {top: top ,  opacity: 1, duration: 1})
		       	this.gsap.to(el, {opacity: 0, duration: 1, delay: 2, onComplete: done})
		    },
		}
	      
	}
</script>

<style>
</style>