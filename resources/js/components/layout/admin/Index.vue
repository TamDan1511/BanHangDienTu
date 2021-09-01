<template>
        <div class="container-fluid vh-100" id="app">
        <message-item></message-item>

        <div class="row d-flex h-100">
            <div id="nav-left" class="">
                <Nav />
            </div>
            <div id="main-right" class="flex-grow-1 overflow-hidden">
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
  width: 100px;
  background-color: #b3e5fc;
}

.nav-color {
  color: #546e7a;
}
.nav-link:hover {
  background-color: #fafafa !important;
}
</style>
