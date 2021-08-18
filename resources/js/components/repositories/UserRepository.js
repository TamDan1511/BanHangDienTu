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
                  return {users: response.data.users}
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

    form(user, type, appThis){
        let token = window.localStorage.getItem('token');

        let config = { headers: { "Authorization": `Bearer ${token}` } };
        return Repository.post(`${resource}`, user, config)
            .then(response => {
                if(type == 'save')
                    return {status: response.status, user: response.data.user}

            })
            .catch(error => {
                return { status: 422, errors: error.response.data.errors };
            })
    }
}
