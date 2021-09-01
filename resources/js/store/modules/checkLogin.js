
export default{
    namespaced: true,
    state: {
        userLogin: null
    },
    getters: {
        getUserLogin: state => state.userLogin
    },
    mutations: {
        setUserLogin(state, userLogin){
            state.userLogin = userLogin;
        }
    },
    actions: {
        async setUserLogin({commit}, userLogin){
            commit('setUserLogin', userLogin)
        }
    }
}