const state = {
    statusCodes: [],
    inEditStatusId: 'aa'
}

const getters = {
    getStatusCodes: state => state.statusCodes,
    getInEdit: state => state.inEditStatusId
};

const actions = {
    setStatusCodes({commit}) {
        return axios.get('/api/statuses')
            .then((response) => {
                commit('setStatusCodes', response.data.data);
            })
            .catch(function (error) {
                console.log(error);
            })
    },
    createStatusCode({commit}, data) {
        return axios.post('/api/statuses', {
            name: data.name,
            type: data.type
        })
            .then(function (response) {
                commit('createStatusCode', response.data.createdStatus)
                toast.fire({
                    icon: response.data.status,
                    type: response.data.status,
                    title: response.data.message
                })
            })
            .catch(err => console.log(err))
    },
    deleteStatusCodes({commit}, id) {
        return axios.delete('/api/statuses/' + id)
            .then((response) => {
                commit('deleteStatusCodes', id)
                toast.fire({
                    icon: response.data.status,
                    type: response.data.status,
                    title: response.data.message
                })
            })
            .catch(err => console.log(err))
    },
    updateStatusCode({commit}, inputParams) {
        return axios.patch('/api/statuses/' + inputParams.id, {
            name: inputParams.name,
            type: inputParams.type
        })
            .then((response) => {
                commit('updateStatusCode', {inputParams})
                toast.fire({
                    icon: response.data.status,
                    type: response.data.status,
                    title: response.data.message
                })
            })
    },
    setInEdit({commit}, id) {
        commit('setInEdit', id)
    }
};

const mutations = {
    setStatusCodes: (state, statusCodes) => {
        state.statusCodes = statusCodes;
    },
    createStatusCode: (state, createdStatusCode) => {
        state.statusCodes.push(createdStatusCode);
    },
    deleteStatusCodes: (state, id) => {
        state.statusCodes = state.statusCodes.filter(inv => inv.id !== id)
    },
    updateStatusCode: (state, {inputParams}) => {
        let updatedStatusCode = state.statusCodes.find(inv => inv.id === inputParams.id);
        updatedStatusCode.name = inputParams.name;
    },
    setInEdit: (state, id) => {
        state.inEditStatusId = id;
    },
};

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations,
}
