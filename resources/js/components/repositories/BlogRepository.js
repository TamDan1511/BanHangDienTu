import Repository from "./Repository.js";

const resource = "/api/admin/blog";
export default {
    getBlogAll() {
        let token = window.localStorage.getItem("token");

        let config = { headers: { Authorization: `Bearer ${token}` } };

        return Repository.get(`/api/admin/getBlogAll`, config).then(
            response => {
                return response.data;
            }
        );
    },
    move(moveObj, page) {
        let token = window.localStorage.getItem("token");

        let config = { headers: { Authorization: `Bearer ${token}` } };

        return Repository.post(
            `${resource}/move?page=${page}`,
            moveObj,
            config
        ).then(response => {
            return response.data;
        });
    },
    async find(id) {
        let token = window.localStorage.getItem("token");

        let config = { headers: { Authorization: `Bearer ${token}` } };

        return await Repository.get(`${resource}/${id}`, config).then(
            response => {
                return response.data.blog;
            }
        );
    },
    getAll(page) {
        let token = window.localStorage.getItem("token");

        let config = { headers: { Authorization: `Bearer ${token}` } };
        return Repository.get(`${resource}?page=${page}`, config).then(
            response => {
                return response.data;
            }
        );
    },
    store(blog, type, appThis) {
        let token = window.localStorage.getItem("token");

        let config = { headers: { Authorization: `Bearer ${token}` } };
        return Repository.post(`${resource}`, blog, config)
            .then(response => {
                if (type == "save")
                    appThis.$router.push({
                        name: "BlogEdit",
                        params: {
                            id: response.data.blog.id,
                            isActive: true,
                            type: "add"
                        }
                    });
                else if (type == "save-add") return { status: 200 };
                else
                    appThis.$router.push({
                        name: "BlogIndex",
                        params: { isActive: true, type: "add" }
                    });
            })
            .catch(error => {
                return { status: 422, errors: error.response.data.errors };
            });
    },

    changeActive(updateStatus) {
        let token = window.localStorage.getItem("token");

        let config = { headers: { Authorization: `Bearer ${token}` } };
        return Repository.post(
            `${resource}/changeActive`,
            updateStatus,
            config
        ).then(response => {
            return response.data.update;
        });
    },
    update(id, blog, type, appThis) {
        let token = window.localStorage.getItem("token");

        let config = { headers: { Authorization: `Bearer ${token}` } };
        return Repository.post(`${resource}/${id}`, blog, config)
            .then(response => {
                if (type == "save") return { status: 200 };
                else if (type == "save-add")
                    appThis.$router.push({
                        name: "BlogStore",
                        params: { isActive: true }
                    });
                else
                    appThis.$router.push({
                        name: "BlogIndex",
                        params: { isActive: true, type: "edit" }
                    });
            })
            .catch(error => {
                return { status: 422, errors: error.response.data.errors };
            });
    },

    deleteItem(id) {
        let token = window.localStorage.getItem("token");

        let config = { headers: { Authorization: `Bearer ${token}` } };
        return Repository.delete(`${resource}/${id}`, config)
            .then(response => {
                return response.data;
            })
            .catch(error => {
                return { status: 422, errors: error.response.data.errors };
            });
    }
};
