<template>
 <transition name="fade" mode="out-in">
	<router-view></router-view>
</transition>
</template>
<script>
	export default{}
</script>
<style>
.fade-enter-active, .fade-leave-active {
  transition: all 0.3s ease;
}
.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
  opacity: 0;

}
</style>