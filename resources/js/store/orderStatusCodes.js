const state = {
    orderStatusCodes: [],
}

const getters = {
    getOrderStatusCodes: state => state.orderStatusCodes,
};

const actions = {
    setOrderStatusCodes({commit}) {
        return axios.get('/order-status-codes')
              .then((response) => {
                commit('setOrderStatusCodes', response.data.data); 
                toast.fire({
                    icon: response.data.status,
                    type: response.data.status,
                    title: response.data.message
                })
              })
              .catch(function (error) {
                console.log(error);
              })
    },
    createOrderStatusCode({commit}, name) {
        return axios.post('/order-status-codes/create', {
                name: name
            })
            .then(function (response) {
                commit('createOrderStatusCode', response.data.createdOrderStatusCode)
                toast.fire({
                    icon: response.data.status,
                    type: response.data.status,
                    title: response.data.message
                })
            })
            .catch(err => console.log(err))
    },
    deleteOrderStatusCodes({commit}, id) {
        return axios.post('/order-status-codes/delete/' + id)
            .then((reponse) => {
                commit('deleteOrderStatusCodes', id)
                toast.fire({
                    icon: response.data.status,
                    type: response.data.status,
                    title: response.data.message
                })
            })
            .catch(err => console.log(err))
    },
    updateOrderStatusCode({commit}, inputParams) {
        return axios.post('/order-status-codes/edit/' + inputParams.id, {
            name: inputParams.name
        })
        .then((response) => {
            commit('updateOrderStatusCode', inputParams)
            toast.fire({
                icon: response.data.status,
                type: response.data.status,
                title: response.data.message
            })
            .catch(err => console.log(err))
        })
    }
};

const mutations = {
    setOrderStatusCodes: (state, orderStatusCodes) => {
        state.orderStatusCodes = orderStatusCodes;
    },
    createOrderStatusCode: (state, createdOrderStatusCode) => {
        state.orderStatusCodes.push(createdOrderStatusCode);
    },
    deleteOrderStatusCodes: (state, id) => {
        state.orderStatusCodes = state.orderStatusCodes.filter(inv => inv.id !== id)
    },
    updateOrderStatusCode: (state, inputParams) => {
        let updatedOrderStatusCode = state.orderStatusCodes.find(inv => inv.id === inputParams.id);
        updatedOrderStatusCode.name = inputParams.name;
    }
};

export default {
    namespaced: true,
    state, 
    getters,
    actions,
    mutations,
}