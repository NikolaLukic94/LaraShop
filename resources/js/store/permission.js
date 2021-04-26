const state = {
    permissions: [],
}

const getters = {
    getPermissions: state => state.permissions,
};

const actions = {
    setPermissions({commit}) {
        return axios.get('/api/permissions')
            .then((response) => {
                console.log(reponse)

                commit('setPermissions', response.data.data);
                toast.fire({
                    icon: 'success',
                    type: 'success',
                    title: 'Permissions fetched!'
                })
            })
            .catch(function (error) {
                console.log(error);
            })
    },
};

const mutations = {
    setPermissions: (state, roles) => {
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
