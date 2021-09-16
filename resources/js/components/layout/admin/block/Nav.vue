<template>
<ul class="nav flex-column">
    <li class="nav-item text-center">
        <router-link class="nav-link" :to="{name: 'IndexAdmin'}">
            <img src="https://img.icons8.com/officel/40/000000/home.png" />
            <span class="nav-color font-weight-bold">Dashboard</span>
        </router-link>
    </li>
    <li class="nav-item text-center">
        <router-link class="nav-link" to="/admin/user">
            <img src="/images/icons8-user-40.png" />
            <span class="nav-color font-weight-bold">User</span>
        </router-link>
    </li>
    <li class="nav-item text-center">
        <router-link class="nav-link" :to="{name: 'ProductItem'}">
            <img src="https://img.icons8.com/dusk/40/000000/product.png" />
            <span class="nav-color font-weight-bold">Product</span>
        </router-link>
    </li>
    <li class="nav-item text-center">
        <router-link class="nav-link" :to="{name: 'CategoryItem'}">
            <img src="https://img.icons8.com/plasticine/40/000000/category.png" />
            <span class="nav-color font-weight-bold">Category</span>
        </router-link>
    </li>
    <li class="nav-item text-center">
        <a class="nav-link">
            <img src="https://img.icons8.com/fluency/40/000000/sorting-options.png" />
            <span class="nav-color font-weight-bold">Slider</span>
        </a>
    </li>
    <li class="nav-item text-center">
        <router-link class="nav-link" :to="{name: 'MenuItem'}">
            <img src="https://img.icons8.com/clouds/40/000000/menu.png" />
            <span class="nav-color font-weight-bold">Menu</span>
        </router-link>
    </li>
    <li class="nav-item text-center">
        <router-link class="nav-link" :to="{name: 'BannerItem'}">
            <img src="https://img.icons8.com/external-vitaliy-gorbachev-blue-vitaly-gorbachev/40/000000/external-flag-award-vitaliy-gorbachev-blue-vitaly-gorbachev.png" />
            <span class="nav-color font-weight-bold">Banner</span>
        </router-link>
    </li>
    <li class="nav-item text-center">
        <a class="nav-link" href="#">
            <img src="https://img.icons8.com/fluency/40/000000/settings.png" />
            <span class="nav-color font-weight-bold">Setting</span>
        </a>
    </li>
</ul>
</template>

<script>
export default {
    name: 'Nav'
}
</script>

<style></style>
