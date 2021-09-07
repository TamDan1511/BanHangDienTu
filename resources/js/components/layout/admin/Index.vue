<template>
        <div class="container-fluid mh-100 bg-white" >
          <message-item></message-item>

          <div class="row h-100">
              <div id="nav-left" class="min-vh-100">
                  <Nav />
              </div>
              <div id="main-right" class="flex-grow-1 h-100">
                  <Header/>
                  <slot name="MainRight"></slot>
              </div>
          </div>
    </div>
</template>
<script>
import Nav from "./block/Nav";
import Header from "./block/Header";
import MessageItem from "../../messages/Message.vue";

export default {
  name: "IndexItem",
  components: {
    Nav,
    Header,
    MessageItem,
  },
};
</script>
<style>
#nav-left {
  flex-basis: 100px;
  background-color: #b3e5fc;
}

.nav-color {
  color: #546e7a;
}
.nav-link:hover {
  background-color: #fafafa !important;
}
</style>
