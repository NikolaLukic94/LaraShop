const state = {
    user: [],
}

const getters = {
    getUser: state => state.user,
};

const actions = {
    setUser({commit}, id) {
        return axios.get('/api/user/show/' + id)
            .then((response) => {
                console.log('asasd', response)
            commit('setUser', response); 
            })
            .catch(function (error) {
            console.log(error);
            })
    },
};

const mutations = {
    setUser: (state, user) => {
        state.user = user;
    },
};

export default {
    namespaced: true,
    state, 
    getters,
    actions,
    mutations,
}