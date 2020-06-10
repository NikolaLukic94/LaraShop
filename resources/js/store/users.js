const state = {
    users: [],
}

const getters = {
    getUsers: state => state.users,
};

const actions = {
    setUsers({commit}) {
        return axios.get('/users')
              .then((response) => {
                commit('setUsers', response.data.data); 
              })
              .catch(function (error) {
                console.log(error);
              })
    },
    deleteUser({commit}, id) {
        return axios.post('/users/delete/' + id)
            .then(function (response) {
                commit('delete', id)
            })
            .catch(err => console.log(err))
    },
};

const mutations = {
    setUsers: (state, users) => {
        state.users = users;
    },
    delete: (state, id) => {
        state.users = state.users.filter(usr => usr.id !== id)
    },
};

export default {
    namespaced: true,
    state, 
    getters,
    actions,
    mutations,
}