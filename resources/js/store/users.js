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
};

const mutations = {
    setUsers: (state, users) => {
        state.users = users;
    },
};

export default {
    namespaced: true,
    state, 
    getters,
    actions,
    mutations,
}