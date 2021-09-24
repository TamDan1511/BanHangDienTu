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
                    <router-link :to="{name: 'SliderStore'}" class="btn btn-warning">
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
                            <th>Tiêu đề</th>
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
                        <tr v-for="(slider, index) in sliders" :key="slider.id" class="delete">
                            <td>{{ setStt(index)}}</td>
                            <td>
                                {{slider.title}}
                            </td>
                            <td>
                                {{slider.content}}
                            </td>
                            <td>
                                {{slider.url}}
                            </td>
                            <td>  
                                <img :src="setPicturePath(slider.picture)" class="picture">
                            </td>
                            <td>
                                <button v-if="slider.status == 1" @click="changeActive(slider)" class="btn btn-success btn-sm">
                                    <i class="fa fa-check-circle mr-2" aria-hidden="true"></i>Kích hoạt</button>
                                <button v-else class="btn btn-danger btn-sm" @click="changeActive(slider)">
                                    <i class="mr-2 fa fa-times-circle" aria-hidden="true"></i>Không kích hoạt</button>
                            </td>

                            <td>
                                {{slider.created_at}}
                                <p class="font-weight-bold">{{ slider.nameCreate}}</p>
                            </td>
                            <td>
                                {{slider.updated_at}}
                                <p class="font-weight-bold">{{ slider.nameUpdate}}</p>
                            </td>
                            <td>
                                <router-link :to="{name: 'SliderEdit', query: {'slider': slider.id}}" class="btn btn-warning"><i class="fa fa-pencil-square" aria-hidden="true"></i></router-link>
                                <button @click="deleteItem(slider.id)" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
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
const SliderRepository = RepositoryFactory.get('slider');
import {
    mapActions
} from 'vuex';

export default {
    name: 'SldierItem',
    metaInfo: {
        title: 'Danh sách slider'
    },
    data: function () {
        return {
            path: '/upload/sliders/',
            pagi: null,
            active: 0,
            count: 0,
            sliders: []
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
    
        const data = await SliderRepository.getAll(this.$route.query.page);

        this.$loading.hide();

        this.pagi = data.sliders;
        this.sliders = data.sliders.data;
        this.active = data.active;
        this.count = data.count;
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
        changeActive: async function (slider) {
            this.$loading.show({
                delay: 0,
                background: 'rgba(246, 246, 246, 0.5)'
            })

            let updateStatus = {
                id: slider.id,
                value: slider.status
            };

            let update = await SliderRepository.changeActive(updateStatus);
            this.$loading.hide()
            if (update == true) {

                const data = await SliderRepository.getAll(this.$route.query.page);

                // this.sliders = data.sliders.data;
                // this.active = data.active;
                slider.status = (slider.status == 1) ? 0 : 1;
                if(slider.status == 1) this.active += 1;
                else  this.active -= 1;
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

            const data = await SliderRepository.getAll(page);
            this.$loading.hide();
            this.$router.push({
                name: "SliderItem",
                query: {
                    page: page
                }
            });
            this.pagi = data.sliders;
            this.sliders = data.sliders.data;

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
                            let del = await SliderRepository.deleteItem(id)
                            this.$loading.hide();
                            if (del > 0) {
                                this.setMessage('Xóa thành công');
                                this.setFlag(true);
                                this.setActive(true);
                                setTimeout(() => {
                                    this.setActive(false);
                                }, 3000);
                                const data = await SliderRepository.getAll(this.$route.query.page);
                                this.pagi = data.sliders;
                                this.sliders = data.sliders.data;

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
            return this.path + str[0] + '.' + str[1];
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
