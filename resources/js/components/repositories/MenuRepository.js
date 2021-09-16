import Repository from './Repository.js';

const resource = '/api/admin/menu';
export default {
 
    changeOrder(moveObj, page) {
        let token = window.localStorage.getItem('token');

        let config = { headers: { "Authorization": `Bearer ${token}` } };

        return Repository.post(`${resource}/changeOrder?page=${page}`, moveObj, config)
            .then(response => {
                return response.data;
            });
    },
    find(id) {
        let token = window.localStorage.getItem('token');

        let config = { headers: { "Authorization": `Bearer ${token}` } };

        return Repository.get(`${resource}/${id}`, config)
            .then(response => {
                return response.data.menu
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

    store(menu, type, appThis) {
        let token = window.localStorage.getItem('token');
      
        let config = { headers: { "Authorization": `Bearer ${token}` } };
        return Repository.post(`${resource}`, menu, config)
            .then(response => {
                if (type == 'save')
                    appThis.$router.push({ name: 'MenuEdit', query: { 'menu': response.data.menu.id }, params: { isActive: true, type: 'add' } });
                else if (type == 'save-add')
                    return { status: 200 };
                else
                    appThis.$router.push({ name: 'MenuItem', params: { isActive: true, type: 'add' } });

            })
            .catch(error => {
                return { status: 422, errors: error.response.data.errors };
            })
    },
    update(menu, type, appThis) {
        let token = window.localStorage.getItem('token');

        let config = { headers: { "Authorization": `Bearer ${token}` } };
        return Repository.post(`${resource}/${menu.id}`, menu, config)
            .then(response => {
                if (type == 'save')
                    return { status: 200, affected: response.data.affected};
                else if (type == 'save-add')
                    appThis.$router.push({ name: 'MenuStore', params: { isActive: true } });
                else
                    appThis.$router.push({ name: 'MenuItem', params: { isActive: true, type: 'edit' } });

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