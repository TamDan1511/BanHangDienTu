<template>
<index-item>
    <template v-slot:MainRight>
        <div class="bg-white h-100 p-3">
            <h5 class="d-inline-block font-weight-bold">Danh sách menu</h5>
            <ul class="nav border-bottom pb-2 mt-3">
                <li class="nav-item mr-2">
                    <button class="btn btn-danger">Tổng:
                        <span class="d-inline-block px-1 rounded-circle bg-white text-danger">{{count}}</span>
                    </button>
                </li>
                <li class="nav-item">
                    <button class="btn btn-info">Kích hoạt:
                        <span class="d-inline-block px-1 rounded-circle bg-white text-danger">{{active}}</span>
                    </button>
                </li>
                <li class="nav-item ml-auto">
                    <router-link :to="{name: 'MenuStore'}" class="btn btn-warning">
                        <img src="https://img.icons8.com/color/24/000000/add-link.png" />
                        <span class="pl-2">Thêm mới</span>
                    </router-link>
                </li>
            </ul>
            <div class="mt-4">
                <table v-if="count > 0" class="table table-striped  text-center" id="userList">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tên hiển thị</th>
                            <th>Url</th>
                            <th>Di chuyển</th>
                            <th>Trạng thái</th>
                            <th>Tạo mới</th>
                            <th>Cập nhật</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(menu, index) in menus" :key="menu.id" class="delete">
                            <td>{{ setStt(index)}}</td>
                            <td>
                                {{menu.name}}
                            </td>
                            <td>
                                {{menu.url}}
                            </td>
                            <td>
                                <button class="btn btn-info" v-if="menu.order == 1 && count > 1" @click="changeOrder(menu, 'up')">
                                    <i class="fa fa-arrow-up" aria-hidden="true"></i>
                                </button>
                                <button class="btn btn-info" v-else-if="menu.order == count && count > 1" @click="changeOrder(menu, 'down')">
                                    <i class="fa fa-arrow-down" aria-hidden="true"></i>
                                </button>
                                <span v-else-if="menu.order > 1 && count > menu.order">
                                    <button class="btn btn-info" @click="changeOrder(menu, 'up')">
                                        <i class="fa fa-arrow-up" aria-hidden="true"></i>
                                    </button>
                                    <button class="btn btn-info" @click="changeOrder(menu, 'down')">
                                        <i class="fa fa-arrow-down" aria-hidden="true"></i>
                                    </button>
                                </span>

                            </td>
                            <td>
                                <button v-if="menu.status == 1" @click="changeActive(menu)" class="btn btn-success btn-sm">
                                    <i class="fa fa-check-circle mr-2" aria-hidden="true"></i>Kích hoạt</button>
                                <button v-else class="btn btn-danger btn-sm" @click="changeActive(menu)">
                                    <i class="mr-2 fa fa-times-circle" aria-hidden="true"></i>Không kích hoạt</button>
                            </td>

                            <td>
                                {{menu.created_at}}
                                <p class="font-weight-bold">{{ menu.nameCreate}}</p>
                            </td>
                            <td>
                                {{menu.updated_at}}
                                <p class="font-weight-bold">{{ menu.nameUpdate}}</p>
                            </td>
                            <td>
                                <router-link :to="{name: 'MenuEdit', query: {'menu': menu.id}}" class="btn btn-warning"><i class="fa fa-pencil-square" aria-hidden="true"></i></router-link>
                                <button @click="deleteItem(menu.id)" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                            </td>
                        </tr>

                    </tbody>
                </table>
                <p v-else class="text-center text-danger">Không có dữ liệu</p>
            </div>
            <div id="pagination mt-5">
                <pagination-item v-on:change-page="changePage" v-if="pagi != null && count > 6" :pagi="pagi"></pagination-item>
            </div>
        </div>
    </template>

</index-item>
</template>

<script>
import IndexItem from '../Index.vue';
import PaginationItem from '../Pagination.vue';
import RepositoryFactory from '../../../repositoryfactory/RepositoryFactory.js';
const MenuRepository = RepositoryFactory.get('menu');
import {
    mapActions
} from 'vuex';

export default {
    name: 'MenuItem',
    metaInfo: {
        title: 'Danh sách menu'
    },
    data: function () {
        return {
            pagi: null,
            active: 0,
            count: 0,
            menus: []
        }
    },
    components: {
        IndexItem,
        PaginationItem
    },
    async mounted() {

        this.$loading.show({
            delay: 0,
            background: 'rgba(246, 246, 246, 0.5)'
        })
        const menuData = await MenuRepository.getAll(this.$route.query.page);

        this.$loading.hide();

        this.pagi = menuData.menus;
        this.menus = menuData.menus.data;
        this.active = menuData.active;
        this.count = menuData.count;
        if (this.$route.params.isActive != null) {

            this.setMessage('Sửa thành công');
            if (this.$route.params.type == 'add')
                this.setMessage('Thêm thành công');
            this.setActive(true);

            setTimeout(() => {
                this.setActive(false)
            }, 3000);
        }

    },
    methods: {
        changeActive: async function (menu) {
            this.$loading.show({
                delay: 0,
                background: 'rgba(246, 246, 246, 0.5)'
            })

            let updateStatus = {
                id: menu.id,
                value: menu.status
            };

            let update = await MenuRepository.changeActive(updateStatus);
            this.$loading.hide()
            if (update == true) {

                const menuData = await MenuRepository.getAll(this.$route.query.page);

                this.menus = menuData.menus.data;
                this.active = menuData.active;
                menu.status = (menu.status == 1) ? 0 : 1;

                this.setMessage('Sửa thành công');
                this.setFlag(true);
                this.setActive(true);

                setTimeout(() => {
                    this.setActive(false);
                }, 3000);

            }
        },

        changePage: async function (page) {
            this.$loading.show({
                delay: 0,
                background: 'rgba(246, 246, 246, 0.5)'
            })

            const menuData = await MenuRepository.getAll(page);
            this.$loading.hide();
            this.$router.push({
                name: "MenuItem",
                query: {
                    page: page
                }
            });
            this.pagi = menuData.menus;
            this.menus = menuData.menus.data;

        },
        deleteItem(id) {
            this.diaLogDelete(id);
        },

        diaLogDelete(id) {
            this.$dialog({
                title: 'Thông báo',
                content: 'Bạn có chắc muốn xóa không!',
                btns: [{
                        label: 'OK',
                        color: '#09f',
                        callback: async () => {
                            this.$loading.show({
                                delay: 0,
                                background: 'rgba(246, 246, 246, 0.5)'
                            })
                            let del = await MenuRepository.deleteItem(id)
                            this.$loading.hide();
                            if (del > 0) {
                                this.setMessage('Xóa thành công');
                                this.setFlag(true);
                                this.setActive(true);
                                setTimeout(() => {
                                    this.setActive(false);
                                }, 3000);
                                const menuData = await MenuRepository.getAll(this.$route.query.page);
                                this.pagi = menuData.menus;
                                this.menus = menuData.menus.data;

                                this.active = menuData.active;
                                this.count = menuData.count;

                            }
                        },
                    },
                    {
                        label: 'Cancel',
                        color: '#444'
                    }
                ],
            })
        },
        setStt(i) {
            return (6 * this.pagi.current_page - 6) + i + 1;
        },
        ...mapActions('message', [
            'setMessage',
            'setActive',
            'setFlag'
        ]),

        changeOrder: async function (menu, type) {
            this.$loading.show({
                delay: 0,
                background: 'rgba(246, 246, 246, 0.5)'
            })
            let page = this.$route.query.page;
            const moveObj = {
                id: menu.id,
                order: menu.order,
                type: type
            };
            let data = await MenuRepository.changeOrder(moveObj, page);
            this.$loading.hide();
            if (data.status == 200) {
                const menuData = await MenuRepository.getAll(page);
                this.pagi = menuData.menus;
                this.menus = menuData.menus.data;
                this.setMessage('Sửa thành công');
                this.setFlag(true);
                this.setActive(true);

                setTimeout(() => {
                    this.setActive(false);
                }, 3000);

            }

        },

    }

}
</script>

<style>
#userList td {
    vertical-align: middle;
}

delete-item-leave-to {
    opacity: 0;
    transform: translateX(10px);
}

.delete {
    transition: all 0.5s ease;
}

.parent-id {
    text-align-last: center;
}
</style>
