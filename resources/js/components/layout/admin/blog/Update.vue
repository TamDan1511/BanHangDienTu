<template>
    <index-item>
        <template v-slot:MainRight>
            <div class="h-100 p-3 bg-form">
                <h5 class="d-inline-block font-weight-bold">{{ title }}</h5>
                <ul class="nav">
                    <li class="nav-item mr-2 ml-auto">
                        <button class="btn btn-warning" @click="update()">
                            <img
                                src="https://img.icons8.com/office/24/000000/save.png"
                            />
                            <span class="pl-2">Lưu</span>
                        </button>
                    </li>
                    <li class="nav-item">
                        <button @click="back" class="btn btn-danger">
                            <img
                                src="https://img.icons8.com/color/24/000000/moved-topic.png"
                            />
                            <span class="pl-2">Quay lại</span>
                        </button>
                    </li>
                </ul>
                <div class="m-5 row">
                    <div class="col-12 mx-auto">
                        <form action="Form.vue">
                            <div class="form-group row">
                                <label
                                    for="name"
                                    class="col-sm-3 col-form-label font-weight-bold"
                                    >Tiêu đề:</label
                                >
                                <div class="col-sm-9">
                                    <input
                                        type="text"
                                        class="form-control"
                                        placeholder="Nhập tiêu đề bài viết"
                                        name="title"
                                        v-model="form.title"
                                        id="title"
                                    />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label
                                    for="status"
                                    class="col-sm-3 col-form-label font-weight-bold"
                                    >Trạng thái</label
                                >
                                <div class="col-sm-9">
                                    <div
                                        class="custom-control custom-radio custom-control-inline"
                                    >
                                        <input
                                            type="radio"
                                            value="1"
                                            id="customRadioStatus1"
                                            checked
                                            name="status"
                                            v-model="form.status"
                                            class="custom-control-input"
                                        />
                                        <label
                                            class="custom-control-label"
                                            for="customRadioStatus1"
                                            >Kích hoạt</label
                                        >
                                    </div>
                                    <div
                                        class="custom-control custom-radio custom-control-inline"
                                    >
                                        <input
                                            type="radio"
                                            value="0"
                                            id="customRadioStatus2"
                                            name="status"
                                            v-model="form.status"
                                            class="custom-control-input"
                                        />
                                        <label
                                            class="custom-control-label"
                                            for="customRadioStatus2"
                                            >Không kích hoạt</label
                                        >
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label
                                    for="status"
                                    class="col-sm-3 col-form-label font-weight-bold"
                                    >Hình ảnh:</label
                                >
                                <div class="col-sm-9">
                                    <img
                                        v-if="form.picture"
                                        style="width:50px"
                                        @click="onClickChoseFile()"
                                        :src="'/' + form.picture"
                                    />
                                    <div class="custom-file">
                                        <input
                                            type="file"
                                            class="custom-file-input"
                                            id="customFile"
                                        />
                                        <label
                                            class="custom-file-label"
                                            for="customFile"
                                            >Chọn hình ảnh</label
                                        >
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label
                                    for="status"
                                    class="col-form-label font-weight-bold"
                                    >Nội dung:</label
                                >
                                <textarea id="blog-editor"></textarea>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </template>
    </index-item>
</template>

<script>
import IndexItem from "../Index.vue";
import PaginationItem from "../Pagination.vue";
import RepositoryFactory from "../../../repositoryfactory/RepositoryFactory.js";
const BlogRepository = RepositoryFactory.get("blog");
import { mapActions } from "vuex";
import axios from "axios";

export default {
    name: "BlogStore",
    metaInfo: {
        title: "Thêm mới bài viết"
    },
    mounted() {
        CKEDITOR.replace("blog-editor");
    },
    created() {
        var promise = BlogRepository.find(this.$route.query.post);
        promise.then(res => {
            this.form = res;
            CKEDITOR.instances["blog-editor"].setData(res.content);
        });
    },
    components: {
        IndexItem
    },
    data() {
        return {
            title: "Thêm bài viết",
            path: "/upload/blog/",
            form: {
                title: "",
                status: "",
                content: ""
            }
        };
    },
    methods: {
        back() {
            this.$router.go(-1);
        },
        onClickChoseFile() {
            document.querySelector("#customFile").click();
        },
        async update() {
            var form = new FormData();
            var file = document.querySelector("#customFile");
            form.append("file", file.files[0]);
            form.append("title", this.form.title);
            form.append("status", this.form.status);
            form.append("content", CKEDITOR.instances["blog-editor"].getData());
            form.append("_method", "PUT");
            let token = window.localStorage.getItem("token");
            let _this = this;
            let config = { headers: { Authorization: `Bearer ${token}` } };
            let id = this.$route.query.post;

            return BlogRepository.update(id, form, "edit", this);
        }
    },

    ...mapActions("message", ["setMessage", "setActive", "setFlag"])
};
</script>

<style scoped></style>
