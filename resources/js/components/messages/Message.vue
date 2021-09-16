<template>
	<transition :css="false" @beforeEnter="beforeEnter" @enter="enter" > 
	<div class="position-absolute mx-auto btn rounded-pill" :class="{'bg-success': getFlag, 'bg-danger': !getFlag}" :style="{width: 300 + 'px', left: 40 + '%'}" v-if="getActive">
		<i class="fa fa-check-circle mr-2" :style="{fontSize: 1.2 + 'rem'}" aria-hidden="true"></i> 
		<span>{{ getMessage }}</span> 
	</div>
	</transition>
</template>

<script>
import {mapGetters} from 'vuex';
 
	export default{
		name: 'MessageItem',
		computed: {
			...mapGetters('message', [
				'getMessage',
				'getActive',
				'getFlag'
			])
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
		    } 
		}
	      
	}
</script>

<style>
</style>