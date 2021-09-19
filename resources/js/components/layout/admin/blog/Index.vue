<template>
    <index-item>
        <template v-slot:MainRight>
            <div class="bg-white h-100 p-3">
                <h5 class="d-inline-block font-weight-bold">Danh sách bài viết</h5>
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
                        <router-link :to="{name: 'BlogStore'}" class="btn btn-warning">
                            <img src="https://img.icons8.com/color/24/000000/add-link.png" />
                            <span class="pl-2">Thêm mới</span>
                        </router-link>
                    </li>
                </ul>

                <!-- Content -->
                <div class="mt-4">
                    <table class="table table-striped  text-center" id="userList">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Tên bài viết</th>
                            <th>Nội dung</th>
                            <th>Trạng thái</th>
                            <th>Tạo mới</th>
                            <th>Cập nhật</th>
                            <th>Hành động</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(blog, index) in blogs" :key="blog.id" class="delete">
                            <td>{{ setStt(index)}}</td>
                            <td>
                                <span><span class="d-inline-block rounded bg-warning px-2"></span> {{blog.title }}</span>
                            </td>
                            <td>
<!--                                <p>{{blog.content }}</p>-->
                            </td>
                            <td>
                                <button v-if="blog.status == 1" @click="changeActive(blog)" class="btn btn-success btn-sm">
                                    <i class="fa fa-check-circle mr-2" aria-hidden="true"></i>Kích hoạt</button>
                                <button v-else class="btn btn-danger btn-sm" @click="changeActive(blog)">
                                    <i class="mr-2 fa fa-times-circle" aria-hidden="true"></i>Không kích hoạt</button>
                            </td>

                            <td>
                                {{blog.created_at}}
                            </td>
                            <td>
                                {{blog.updated_at}}
                            </td>
                            <td>
                                <router-link :to="{name: 'BlogEdit', query: {'post': blog.id}}" class="btn btn-warning"><i class="fa fa-pencil-square" aria-hidden="true"></i></router-link>
                                <button @click="deleteItem(blog.id, index)" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                            </td>
                        </tr>

                        </tbody>
                    </table>
                </div>

                <div id="pagination mt-5">
                    <pagination-item v-on:change-page="changePage" v-if="pagi != null" :pagi="pagi"></pagination-item>
                </div>
            </div>
        </template>

    </index-item>
</template>

<script>
import IndexItem from '../Index.vue';
import PaginationItem from '../Pagination.vue';
import RepositoryFactory from '../../../repositoryfactory/RepositoryFactory.js';
const BlogRepository = RepositoryFactory.get('blog');
import {mapActions} from 'vuex';

export default {
    name: "BlogIndex",
    metaInfo: {
        title: 'Danh sách bài viết'
    },
    data() {
        return {
            path: '/upload/blog/',
            blogs: [],
            pagi: null,
            active: 0,
            count: 0,
            blogsAll: [],
        }
    },
    components: {
        IndexItem,
        PaginationItem
    },

    computed: {

    },

    async mounted() {

        this.$loading.show({ delay: 0, background: 'rgba(246, 246, 246, 0.5)' })
        const blogData = await BlogRepository.getAll(this.$route.query.page);
        this.$loading.hide();
        this.pagi = blogData.blogs;
        this.blogs = blogData.blogs.data;
        this.blogsAll = blogData.blogsAll;
        this.active = blogData.active;
        this.count = blogData.count;
        if (this.$route.params.isActive != null) {

            this.setMessage('Sửa thành công');
            if(this.$route.params.type == 'add')
                this.setMessage('Thêm thành công');
            this.setActive(true);

            setTimeout(() => { this.setActive(false) }, 3000);
        }
    },
    methods: {
        changeActive: async function(blog) {
            this.$loading.show({ delay: 0, background: 'rgba(246, 246, 246, 0.5)' })

            let updateStatus = { id: blog.id, value: blog.status};

            let update = await BlogRepository.changeActive(updateStatus);
            this.$loading.hide()
            if (update == true) {

                blog.status = (blog.status == 1) ? 0 : 1;

                this.setMessage('Sửa thành công');
                this.setFlag(true);
                this.setActive(true);

                setTimeout(() => { this.setActive(false); }, 3000);
            }
        },

        changePage: async function(page) {
            this.$loading.show({ delay: 0, background: 'rgba(246, 246, 246, 0.5)' })

            const blogData = await BlogRepository.getAll(page);
            this.$loading.hide();
            this.$router.push({ name: "BlogIndex", query: { page: page } });
            this.pagi = blogData.blogs;
            this.blogs = blogData.blogs.data;
        },
        deleteItem(id, index) {
            this.diaLogDelete(id, index);
        },

        diaLogDelete(id, index) {
            // console.log(index)
            this.$dialog({
                title: 'Thông báo',
                content: 'Xóa bài viết này!',
                btns: [{
                    label: 'OK',
                    color: '#09f',
                    callback: async () => {
                        this.$loading.show({ delay: 0, background: 'rgba(246, 246, 246, 0.5)' })
                        console.log(id)
                        let del = await BlogRepository.deleteItem(id)
                        this.$loading.hide();

                        if(del.status && del.status === 'success'){
                            this.setMessage('Xóa thành công');
                            this.setFlag(true);
                            this.setActive(true);
                            setTimeout(() => { this.setActive(false); }, 3000);
                            const blogData = await BlogRepository.getAll(this.$route.query.page);
                            this.pagi = blogData.blogs;
                            this.blogs = blogData.blogs.data;
                            this.active = blogData.active;
                            this.count = blogData.count;
                            this.blogs.splice(index, 1);
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
        setStt(i){
            return (6 * this.pagi.current_page - 6) + i + 1;
        },
        ...mapActions('message', [
            'setMessage',
            'setActive',
            'setFlag'
        ]),
    }
}
</script>

<style scoped>

</style>
