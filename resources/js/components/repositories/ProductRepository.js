import Repository from './Repository.js';

const resource = '/api/admin/product';
export default {
    find(id){
        let token = window.localStorage.getItem('token');

        let config = { headers: { "Authorization": `Bearer ${token}` } };
        
        return Repository.get(`${resource}/${id}`, config)
            .then(response => {
                  return  response.data.product
            }) ;
    },
    getAll(page){
        let token = window.localStorage.getItem('token');

        let config = { headers: { "Authorization": `Bearer ${token}` } };
        return Repository.get(`${resource}?page=${page}`, config)
            .then(response => {
                  return response.data;
            })
    },

    changeActive(updateStatus){
        let token = window.localStorage.getItem('token');

        let config = { headers: { "Authorization": `Bearer ${token}` } };
        return Repository.post(`${resource}/changeActive`, updateStatus, config)
            .then(response => {
                return response.data.update;

            });  
    },

    store(product, type, appThis){
        let token = window.localStorage.getItem('token');

        let config = { headers: { "Authorization": `Bearer ${token}` } };
        return Repository.post(`${resource}`, product, config)
            .then(response => {
                if(type == 'save')
                    appThis.$router.push({name: 'CategoryEdit', params: {id: response.data.product.id, isActive: true, type: 'add'}});
                else if(type == 'save-add')
                    return {status: 200};
                else
                    appThis.$router.push({name: 'CategoryItem', params: {isActive: true, type: 'add'}});

            })
            .catch(error => {
                return { status: 422, errors: error.response.data.errors };
            })
    },
    update(product, type, appThis){
        let token = window.localStorage.getItem('token');

        let config = { headers: { "Authorization": `Bearer ${token}` } };
        return Repository.post(`${resource}/${category.id}`, product, config)
            .then(response => {
                if(type == 'save')
                    return {status: 200};
                else if(type == 'save-add')
                    appThis.$router.push({name: 'CategoryStore', params: {isActive: true}});
                else
                    appThis.$router.push({name: 'CategoryItem', params: {isActive: true, type: 'edit'}});

            })
            .catch(error => {
                return { status: 422, errors: error.response.data.errors };
            })
    },

    deleteItem(id){
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
