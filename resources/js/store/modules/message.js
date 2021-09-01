
export default {
    namespaced: true,
    state: {
        message:    '',
        isActive:   false,
        flag:       true

    },
    getters: {
        getMessage:     state => state.message,
        getActive:      state => state.isActive,
        getFlag:        state => state.flag
    },
    mutations: {
        setMessage (state, message){
            state.message = message
        },
        setActive (state, isActive){
            state.isActive = isActive
        },
        setFlag (state, flag){
            state.flag = flag
        }
    },

    actions: {
        setMessage({commit}, message){
            commit('setMessage', message)
        },
        setActive({commit}, isActive){
            commit('setActive', isActive)
        },
        setFlag({commit}, flag){
            commit('setFlag', flag)
        }
    }
}