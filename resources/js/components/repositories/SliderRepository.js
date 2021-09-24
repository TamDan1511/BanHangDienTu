import Repository from './Repository.js';

const resource = '/api/admin/slider';
export default {
 
    
    find(id) {
        let token = window.localStorage.getItem('token');

        let config = { headers: { "Authorization": `Bearer ${token}` } };

        return Repository.get(`${resource}/${id}`, config)
            .then(response => {
                return response.data.slider
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

    store(slider, type, appThis) {
        let token = window.localStorage.getItem('token');
        let formData = new FormData();
        formData.append('picture', slider.picture);
        formData.append('url', slider.url);
        formData.append('content', slider.content);
        formData.append('title', slider.title);
        formData.append('status', slider.status);
        let config = { headers: { "Authorization": `Bearer ${token}` } };
        return Repository.post(`${resource}`, formData, config)
            .then(response => {
                if (type == 'save')
                    appThis.$router.push({ name: 'SliderEdit', query: { 'slider': response.data.slider.id }, params: { isActive: true, type: 'add' } });
                else if (type == 'save-add')
                    return { status: 200 };
                else
                    appThis.$router.push({ name: 'SliderItem', params: { isActive: true, type: 'add' } });

            })
            .catch(error => {
                return { status: 422, errors: error.response.data.errors };
            })
    },
    update(slider, type, appThis) {
        let token = window.localStorage.getItem('token');
        let formData = new FormData();
        formData.append('picture', slider.picture);
        formData.append('url', slider.url);
        formData.append('content', slider.content);
        formData.append('title', slider.title);
        formData.append('status', slider.status);
        formData.append('_method', slider._method);
        let config = { headers: { "Authorization": `Bearer ${token}` } };
        return Repository.post(`${resource}/${slider.id}`, formData, config)
            .then(response => {
                if (type == 'save')
                    return { status: 200, affected: response.data.affected};
                else if (type == 'save-add')
                    appThis.$router.push({ name: 'SliderStore', params: { isActive: true } });
                else
                    appThis.$router.push({ name: 'SliderItem', params: { isActive: true, type: 'edit' } });

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