import Repository from './Repository.js';

const resource = '/api/admin/banner';
export default {
 
    
    find(id) {
        let token = window.localStorage.getItem('token');

        let config = { headers: { "Authorization": `Bearer ${token}` } };

        return Repository.get(`${resource}/${id}`, config)
            .then(response => {
                return response.data.banner
            });
    },
    getAll(page) {
        let token = window.localStorage.getItem('token');
        if(page == 'undefined')
            page = 1;
        
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

    store(banner, type, appThis) {
        let token = window.localStorage.getItem('token');
        let formData = new FormData();
        formData.append('picture', banner.picture);
        formData.append('url', banner.url);
        formData.append('position', banner.position);
        formData.append('description', banner.description);
        formData.append('status', banner.status);
        let config = { headers: { "Authorization": `Bearer ${token}` } };
        return Repository.post(`${resource}`, formData, config)
            .then(response => {
                if (type == 'save')
                    appThis.$router.push({ name: 'BannerEdit', query: { 'banner': response.data.banner.id }, params: { isActive: true, type: 'add' } });
                else if (type == 'save-add')
                    return { status: 200 };
                else
                    appThis.$router.push({ name: 'BannerItem', params: { isActive: true, type: 'add' } });

            })
            .catch(error => {
                return { status: 422, errors: error.response.data.errors };
            })
    },
    update(banner, type, appThis) {
        let token = window.localStorage.getItem('token');
        let formData = new FormData();
        formData.append('picture', banner.picture);
        formData.append('url', banner.url);
        formData.append('position', banner.position);
        formData.append('description', banner.description);
        formData.append('status', banner.status);
        formData.append('_method', banner._method);
        let config = { headers: { "Authorization": `Bearer ${token}` } };
        return Repository.post(`${resource}/${banner.id}`, formData, config)
            .then(response => {
                if (type == 'save')
                    return { status: 200, affected: response.data.affected};
                else if (type == 'save-add')
                    appThis.$router.push({ name: 'BannerStore', params: { isActive: true } });
                else
                    appThis.$router.push({ name: 'BannerItem', params: { isActive: true, type: 'edit' } });

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
            
    }
}