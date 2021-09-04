const state = {
    permissions: [],
}

const getters = {
    getPermissions: state => state.permissions,
};

const actions = {
    setPermissions({commit}) {
        return axios.get('/api/permissions-all')
            .then((response) => {
                commit('setPermissions', response.data.data);

                // toast.fire({
                //     icon: 'success',
                //     type: 'success',
                //     title: 'Permissions fetched!'
                // })
            })
            .catch(function (error) {console.log(error);})
    },
};

const mutations = {
    setPermissions: (state, permissions) => {
        state.permissions = permissions;
    },
};

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations,
}
