<template>
    <index-item>
        <template v-slot:MainRight>
            <div class="h-100 p-3">
                <h5 class="d-inline-block font-weight-bold">
                    Danh sách người dùng
                </h5>
                <ul class="nav border-bottom pb-2 mt-3">
                    <li class="nav-item mr-2">
                        <button class="btn btn-danger">
                            Tổng:
                            <span
                                class="d-inline-block px-1 rounded-circle bg-white text-danger"
                                >{{ count }}</span
                            >
                        </button>
                    </li>
                    <li class="nav-item">
                        <button class="btn btn-info">
                            Kích hoạt:
                            <span
                                class="d-inline-block px-1 rounded-circle bg-white text-danger"
                                >{{ active }}</span
                            >
                        </button>
                    </li>
                    <li class="nav-item ml-auto">
                        <router-link
                            :to="{ name: 'UserStore' }"
                            class="btn btn-warning"
                        >
                            <img
                                src="https://img.icons8.com/color/24/000000/add-link.png"
                            />
                            <span class="pl-2">Thêm mới</span>
                        </router-link>
                    </li>
                </ul>
                <div class="mt-4">
                    <table
                        class="table table-striped  text-center"
                        id="userList"
                    >
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Hình ảnh</th>
                                <th>Họ tên</th>
                                <th>Email</th>
                                <th>Trạng thái</th>
                                <th>Admin</th>
                                <th>Tạo mới</th>
                                <th>Cập nhật</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                v-for="(user, index) in users"
                                :key="user.id"
                                class="delete"
                            >
                                <td>{{ setStt(index) }}</td>
                                <td>
                                    <img
                                        v-if="user.picture == null"
                                        src="/images/80x120.jpg"
                                        alt=""
                                    />
                                    <img v-else :src="path + user.picture" />
                                </td>
                                <td>{{ user.name }}</td>
                                <td>{{ user.email }}</td>
                                <td>
                                    <button
                                        v-if="user.status == 1"
                                        @click="changeActive(user, 'status')"
                                        class="btn btn-success btn-sm"
                                    >
                                        <i
                                            class="fa fa-check-circle mr-2"
                                            aria-hidden="true"
                                        ></i
                                        >Kích hoạt
                                    </button>
                                    <button
                                        v-else
                                        class="btn btn-danger btn-sm"
                                        @click="changeActive(user, 'status')"
                                    >
                                        <i
                                            class="mr-2 fa fa-times-circle"
                                            aria-hidden="true"
                                        ></i
                                        >Không kích hoạt
                                    </button>
                                </td>
                                <td>
                                    <button
                                        v-if="user.isAdmin == 1"
                                        @click="changeActive(user, 'isAdmin')"
                                        class="btn btn-success btn-sm"
                                    >
                                        <i
                                            class="fa fa-check-circle mr-2"
                                            aria-hidden="true"
                                        ></i
                                        >Kích hoạt
                                    </button>
                                    <button
                                        v-else
                                        class="btn btn-danger btn-sm"
                                        @click="changeActive(user, 'isAdmin')"
                                    >
                                        <i
                                            class="fa fa-times-circle mr-2"
                                            aria-hidden="true"
                                        ></i
                                        >Không kích hoạt
                                    </button>
                                </td>
                                <td>
                                    {{ user.created_at }}
                                    <p class="font-weight-bold">
                                        {{ user.nameCreate}}
                                    </p>
                                </td>
                                <td>
                                    {{ user.updated_at }}
                                    <p class="font-weight-bold">
                                        {{ user.nameUpdate }}
                                    </p>
                                </td>
                                <td>
                                    <a href="" class="btn btn-primary"
                                        ><i
                                            class="fa fa-eye"
                                            aria-hidden="true"
                                        ></i
                                    ></a>
                                    <router-link
                                        :to="{
                                            name: 'UserEdit',
                                            params: { id: user.id }
                                        }"
                                        class="btn btn-warning"
                                        ><i
                                            class="fa fa-pencil-square"
                                            aria-hidden="true"
                                        ></i
                                    ></router-link>
                                    <button
                                        @click="deleteItem(user.id, index)"
                                        class="btn btn-danger"
                                    >
                                        <i
                                            class="fa fa-trash"
                                            aria-hidden="true"
                                        ></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div id="pagination mt-5">
                    <pagination-item
                        v-on:change-page="changePage"
                        v-if="pagi != null"
                        :pagi="pagi"
                    ></pagination-item>
                </div>
            </div>
        </template>
    </index-item>
</template>
<script>
import IndexItem from "../Index.vue";
import PaginationItem from "../Pagination.vue";
import RepositoryFactory from "../../../repositoryfactory/RepositoryFactory.js";
const UserRepository = RepositoryFactory.get("user");
import { mapActions, mapGetters } from "vuex";

export default {
    name: "UserIndex",
    metaInfo: {
        title: "Danh sách người dùng"
    },
    data: function() {
        return {
            path: "/upload/user/",
            users: [],
            pagi: null,
            active: 0,
            count: 0
        };
    },
    computed: {
        ...mapGetters("checkLogin", ['getUserLogin'])
    },
    components: {
        IndexItem,
        PaginationItem
    },
    async mounted() {
        this.$loading.show({
            delay: 0,
            background: "rgba(246, 246, 246, 0.5)"
        });
        const userData = await UserRepository.getAll(this.$route.query.page);
        this.$loading.hide();
        this.pagi = userData.users;
        this.users = userData.users.data;
        this.active = userData.active;
        this.count = userData.count;
        if (this.$route.params.isActive != null) {
            this.setMessage("Sửa thành công");
            if (this.$route.params.type == "add")
                this.setMessage("Thêm thành công");
            this.setActive(true);

            setTimeout(() => {
                this.setActive(false);
            }, 3000);
        }
    },
    methods: {
        changeActive: async function(user, type) {
            this.$loading.show({
                delay: 0,
                background: "rgba(246, 246, 246, 0.5)"
            });

            let updateStatus = { id: user.id, value: user[type], type: type };

            let update = await UserRepository.changeActive(updateStatus);
            this.$loading.hide();
            if (update == true) {
                if (type == "status") user.status = user.status == 1 ? 0 : 1;
                else if (type == "isAdmin")
                    user.isAdmin = user.isAdmin == 1 ? 0 : 1;

                this.setMessage("Sửa thành công");
                this.setFlag(true);
                this.setActive(true);

                setTimeout(() => {
                    this.setActive(false);
                }, 3000);
            }
        },

        changePage: async function(page) {
            this.$loading.show({
                delay: 0,
                background: "rgba(246, 246, 246, 0.5)"
            });

            const userData = await UserRepository.getAll(page);
            this.$loading.hide();
            this.$router.push({ name: "UserIndex", query: { page: page } });
            this.pagi = userData.users;
            this.users = userData.users.data;
        },
        deleteItem(id, index) {
            this.diaLogDelete(id, index);
        },

        diaLogDelete(id, index) {
            this.$dialog({
                title: "Thông báo",
                content: "Bạn có chắc muốn xóa không!",
                btns: [
                    {
                        label: "OK",
                        color: "#09f",
                        callback: async () => {
                             
                            if (this.getUserLogin.user.id == id) {
                                this.setMessage(
                                    "Tài khoản này hiện đang đăng nhập nên không thể xóa"
                                );
                                this.setFlag(false);
                                this.setActive(true);

                                setTimeout(() => {
                                    this.setActive(false);
                                }, 3000);
                            } else {
                                let del = await UserRepository.deleteItem(id);
                                if (del > 0) {
                                    this.setMessage("Xóa thành công");
                                    this.setFlag(true);
                                    this.setActive(true);
                                    setTimeout(() => {
                                        this.setActive(false);
                                    }, 3000);
                                    this.users.splice(index, 1);
                                }
                            }
                        }
                    },
                    {
                        label: "Cancel",
                        color: "#444"
                    }
                ]
            });
        },
        setStt(i) {
            return 6 * this.pagi.current_page - 6 + i + 1;
        },

        ...mapActions("message", ["setMessage", "setActive", "setFlag"]),
         
    }
};
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
</style>
