const state = {
    users: [],
}

const getters = {
    getUsers: state => state.users,
};

const actions = {
    setUsers({commit}) {
        return axios.get('/api/users')
            .then((response) => {
                commit('setUsers', response.data.data); 
            })
            .catch(function (error) {
                console.log(error);
            })
    },
    deleteUser({commit}, id) {
        return axios.delete('/users/' + id)
            .then(function (response) {
                commit('delete', id)
                toast.fire({
                    icon: response.data.status,
                    type: response.data.status,
                    title: response.data.message
                })
            })
            .catch(err => console.log(err))
    },
    storeUser({commit}, userParams) {
        return axios.post('/users', {
                name: userParams.name,
                password: userParams.password,
                email: userParams.email
            })
            .then((response) => {
                commit('setUser', response.data.user); 
                toast.fire({
                    icon: response.data.status,
                    type: response.data.status,
                    title: response.data.message
                })
            })
            .catch(function (error) {
        })
    },
};

const mutations = {
    setUsers: (state, users) => {
        state.users = users;
    },
    delete: (state, id) => {
        state.users = state.users.filter(usr => usr.id !== id)
    },
    setUser: (state, user) => {
        state.users.push(user)
    }
};

export default {
    namespaced: true,
    state, 
    getters,
    actions,
    mutations,
}