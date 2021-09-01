import Repository from './Repository.js';

const resource = '/api/admin/user';
export default {
    login(user) {
        return Repository.post(`${resource}/login`, user)
            .then(response => {
                if (response.data.user.hasOwnProperty('token'))
                    window.localStorage.setItem('token', response.data.user.token);

                return { status: response.status };

            })
            .catch(error => {
                return { status: 422, errors: error.response.data.errors };
            })
    },
    find(id){
        let token = window.localStorage.getItem('token');

        let config = { headers: { "Authorization": `Bearer ${token}` } };
        if(token == null) mainThis.$router.push({name: 'Login'});
        
        return Repository.get(`${resource}/${id}`, config)
            .then(response => {
                  return  response.data.user
            })
            .catch(error => {
                mainThis.$router.push({name: 'Login'});
            })
    },
    checkLogin(mainThis){
        let token = window.localStorage.getItem('token');

        let config = { headers: { "Authorization": `Bearer ${token}` } };
        if(token == null) mainThis.$router.push({name: 'Login'});
        return Repository.get(`${resource}/getUser`, config)
            .then(response => {
                  return {user: response.data.user}
            })
            .catch(error => {
                mainThis.$router.push({name: 'Login'});
            })
    },
    logout(mainThis,config){
        Repository.get(`${resource}/logout`, config)
            .catch(error => {
                window.localStorage.removeItem('token');
                mainThis.$router.push({name: 'Login'});
            })
    },

    getAll(page){
        let token = window.localStorage.getItem('token');

        let config = { headers: { "Authorization": `Bearer ${token}` } };
        if(token == null) mainThis.$router.push({name: 'Login'});
        return Repository.get(`${resource}?page=${page}`, config)
            .then(response => {
                  return {users: response.data.users, count: response.data.count, active: response.data.active}
            })
            .catch(error => {
                mainThis.$router.push({name: 'Login'});
            })
        
    },

    changeActive(updateStatus){
        let token = window.localStorage.getItem('token');

        let config = { headers: { "Authorization": `Bearer ${token}` } };
        return Repository.post(`${resource}/changeActive`, updateStatus, config)
            .then(response => {
                return response.data.update;

            })
            .catch(error => {
                return { status: 422, errors: error.response.data.errors };
            })
    },

    store(user, type, appThis){
        let token = window.localStorage.getItem('token');

        let config = { headers: { "Authorization": `Bearer ${token}` } };
        return Repository.post(`${resource}`, user, config)
            .then(response => {
                if(type == 'save')
                    appThis.$router.push({name: 'UserEdit', params: {id: response.data.user.id, isActive: true, type: 'add'}});
                else if(type == 'save-add')
                    return {status: 200};
                else
                    appThis.$router.push({name: 'UserIndex', params: {isActive: true, type: 'add'}});

            })
            .catch(error => {
                return { status: 422, errors: error.response.data.errors };
            })
    },
    update(user, type, appThis){
        let token = window.localStorage.getItem('token');

        let config = { headers: { "Authorization": `Bearer ${token}` } };
        return Repository.post(`${resource}/${user.id}`, user, config)
            .then(response => {
                if(type == 'save')
                    return {status: 200};
                else if(type == 'save-add')
                    appThis.$router.push({name: 'UserStore', params: {isActive: true}});
                else
                    appThis.$router.push({name: 'UserIndex', params: {isActive: true, type: 'edit'}});

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
