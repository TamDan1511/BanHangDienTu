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
                    <router-link :to="{name: 'BannerStore'}" class="btn btn-warning">
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
                            <th>Vị trí</th>
                            <th>Mô tả</th>
                            <th>Url</th>
                            <th>Hình ảnh</th>
                            <th>Trạng thái</th>
                            <th>Tạo mới</th>
                            <th>Cập nhật</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(banner, index) in banners" :key="banner.id" class="delete">
                            <td>{{ setStt(index)}}</td>
                            <td>
                                {{banner.position}}
                            </td>
                            <td>
                                {{banner.description}}
                            </td>
                            <td>
                                {{banner.url}}
                            </td>
                            <td>  
                                <img :src="setPicturePath(banner.picture)" class="picture">
                            </td>
                            <td>
                                <button v-if="banner.status == 1" @click="changeActive(banner)" class="btn btn-success btn-sm">
                                    <i class="fa fa-check-circle mr-2" aria-hidden="true"></i>Kích hoạt</button>
                                <button v-else class="btn btn-danger btn-sm" @click="changeActive(banner)">
                                    <i class="mr-2 fa fa-times-circle" aria-hidden="true"></i>Không kích hoạt</button>
                            </td>

                            <td>
                                {{banner.created_at}}
                                <p class="font-weight-bold">{{ banner.nameCreate}}</p>
                            </td>
                            <td>
                                {{banner.updated_at}}
                                <p class="font-weight-bold">{{ banner.nameUpdate}}</p>
                            </td>
                            <td>
                                <router-link :to="{name: 'BannerEdit', query: {'banner': banner.id}}" class="btn btn-warning"><i class="fa fa-pencil-square" aria-hidden="true"></i></router-link>
                                <button @click="deleteItem(banner.id)" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
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
const BannerRepository = RepositoryFactory.get('banner');
import {
    mapActions
} from 'vuex';

export default {
    name: 'MenuItem',
    metaInfo: {
        title: 'Danh sách quảng cáo'
    },
    data: function () {
        return {
            path: '/upload/banners/',
            pagi: null,
            active: 0,
            count: 0,
            banners: []
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
    
        const bannerData = await BannerRepository.getAll(this.$route.query.page);

        this.$loading.hide();

        this.pagi = bannerData.banners;
        this.banners = bannerData.banners.data;
        this.active = bannerData.active;
        this.count = bannerData.count;
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
        changeActive: async function (banner) {
            this.$loading.show({
                delay: 0,
                background: 'rgba(246, 246, 246, 0.5)'
            })

            let updateStatus = {
                id: banner.id,
                value: banner.status
            };

            let update = await BannerRepository.changeActive(updateStatus);
            this.$loading.hide()
            if (update == true) {

                const data = await BannerRepository.getAll(this.$route.query.page);

                this.banners = data.banners.data;
                this.active = data.active;
                banner.status = (banner.status == 1) ? 0 : 1;

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

            const data = await BannerRepository.getAll(page);
            this.$loading.hide();
            this.$router.push({
                name: "BannerItem",
                query: {
                    page: page
                }
            });
            this.pagi = data.banners;
            this.banners = data.banners.data;

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
                            let del = await BannerRepository.deleteItem(id)
                            this.$loading.hide();
                            if (del > 0) {
                                this.setMessage('Xóa thành công');
                                this.setFlag(true);
                                this.setActive(true);
                                setTimeout(() => {
                                    this.setActive(false);
                                }, 3000);
                                const data = await BannerRepository.getAll(this.$route.query.page);
                                this.pagi = data.banners;
                                this.banners = data.banners.data;

                                this.active = data.active;
                                this.count = data.count;

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
        setPicturePath(picture){
            let str = picture.split('.');
            return this.path + str[0] + '-600x300.' + str[1];
        }, 

    }

}
</script>

<style>
 
.picture{
    width: 100px;
    height: 130px;
    object-fit: fill;
    border-radius: 5px;
}
</style>
