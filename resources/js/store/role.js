const state = {
    roles: [],
    inEditRoleId: '',
    inEditMode: '',
}

const getters = {
    getRoles: state => state.roles,
    getInEditRoleId: state => state.inEditRoleId,
};

const actions = {
    setRoles({commit}) {
        return axios.get('/api/roles')
            .then((response) => {
                this.dispatch('permission/setPermissions');

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
    createRole({commit}, name) {
        return axios.post('/api/roles', {name: name})
            .then((response) => {
                commit('createRole', response.data.role);

                toast.fire({
                    icon: 'success',
                    type: 'success',
                    title: 'Role added!'
                })
            })
            .catch(function (error) {
                console.log(error);
            })
    },
    updateRole({commit}, request) {
        return axios.patch('/api/roles/' + request.id, request)
            .then(function (response) {
                commit('updateRole', response.data.updatedRole)

                toast.fire({
                    icon: response.data.status,
                    type: response.data.status,
                    title: response.data.message
                })
            })
            .catch(err => console.log(err))
    },
    setInEdit({commit}, data) {
        commit('setInEdit', data.value)
    },
};

const mutations = {
    setRoles: (state, roles) => {
        state.roles = roles;
    },
    createRole: (state, role) => {
        state.roles.push(role)
    },
    setInEdit: (state, id) => {
        state.inEditRoleId = id;
    },
    updateRole: (state, updatedRole) => {
        let theRole = state.roles.find(p => p.id === updatedRole.id);
        theRole.name = updatedRole.name;
    },
};

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations,
}
