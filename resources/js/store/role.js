const state = {
    roles: [],
}

const getters = {
    getRoles: state => state.roles,
};

const actions = {
    setRoles({commit}) {
        return axios.get('/api/roles')
            .then((response) => {
                commit('setRoles', response.data.data);

                toast.fire({
                    icon: 'success',
                    type: 'success',
                    title: 'Roles fetched!'
                })
            })
            .catch(function (error) {
                console.log(error);
            })
    },
};

const mutations = {
    setRoles: (state, roles) => {
        state.roles = roles;
    },
};

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations,
}
