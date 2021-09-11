import Repository from './Repository.js';

const resource = '/api/admin/category';
export default {
    getCategoryAll() {
        let token = window.localStorage.getItem('token');

        let config = { headers: { "Authorization": `Bearer ${token}` } };

        return Repository.get(`/api/admin/getCategoryAll`, config)
            .then(response => {
                return response.data;
            });
    },
    move(moveObj, page) {
        let token = window.localStorage.getItem('token');

        let config = { headers: { "Authorization": `Bearer ${token}` } };

        return Repository.post(`${resource}/move?page=${page}`, moveObj, config)
            .then(response => {
                return response.data;
            });
    },
    find(id) {
        let token = window.localStorage.getItem('token');

        let config = { headers: { "Authorization": `Bearer ${token}` } };

        return Repository.get(`${resource}/${id}`, config)
            .then(response => {
                return response.data.category
            });
    },
    getAll(page) {
        let token = window.localStorage.getItem('token');

        let config = { headers: { "Authorization": `Bearer ${token}` } };
        return Repository.get(`${resource}?page=${page}`, config)
            .then(response => {
                return response.data;
            })
    },

    changeActive(updateStatus) {
        let token = window.localStorage.getItem('token');

        let config = { headers: { "Authorization": `Bearer ${token}` } };
        return Repository.post(`${resource}/changeActive`, updateStatus, config)
            .then(response => {
                return response.data.update;

            });
    },

    store(category, type, appThis) {
        let token = window.localStorage.getItem('token');

        let config = { headers: { "Authorization": `Bearer ${token}` } };
        return Repository.post(`${resource}`, category, config)
            .then(response => {
                if (type == 'save')
                    appThis.$router.push({ name: 'CategoryEdit', query: { 'danhmuc': response.data.category.id }, params: { isActive: true, type: 'add' } });
                else if (type == 'save-add')
                    return { status: 200 };
                else
                    appThis.$router.push({ name: 'CategoryItem', params: { isActive: true, type: 'add' } });

            })
            .catch(error => {
                return { status: 422, errors: error.response.data.errors };
            })
    },
    update(category, type, appThis) {
        let token = window.localStorage.getItem('token');

        let config = { headers: { "Authorization": `Bearer ${token}` } };
        return Repository.post(`${resource}/${category.id}`, category, config)
            .then(response => {
                if (type == 'save')
                    return { status: 200 };
                else if (type == 'save-add')
                    appThis.$router.push({ name: 'CategoryStore', params: { isActive: true } });
                else
                    appThis.$router.push({ name: 'CategoryItem', params: { isActive: true, type: 'edit' } });

            })
            .catch(error => {
                return { status: 422, errors: error.response.data.errors };
            })
    },

    deleteItem(id) {
        let token = window.localStorage.getItem('token');

        let config = { headers: { "Authorization": `Bearer ${token}` } };
        return Repository.delete(`${resource}/${id}`, config)
            .then(response => {
                return response.data;

            })
            .catch(error => {
                return { status: 422, errors: error.response.data.errors };
            })
    }
}