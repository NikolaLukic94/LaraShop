const state = {
    orderItemStatusCodes: [],
}

const getters = {
    getOrderItemStatusCodes: state => state.orderItemStatusCodes,
};

const actions = {
    setOrderItemStatusCodes({commit}) {
        return axios.get('/api/order-item-status-codes')
              .then((response) => {
                commit('setOrderItemStatusCodes', response.data.data); 
              })
              .catch(function (error) {
                console.log(error);
              })
        },
        createOrderItemStatusCode({commit}, name) {
            return axios.post('/order-items-status-codes', {
                    name: name
                })
                .then(function (response) {
                    commit('createOrderItemStatusCode', response.data.createdOrderItemStatusCode)
                    toast.fire({
                        icon: response.data.status,
                        type: response.data.status,
                        title: response.data.message
                    })
                })
                .catch(err => console.log(err))
        },
    deleteOrderItemStatusCodes({commit}, id) {
        return axios.delete('/order-items-status-codes/' + id)
            .then((response) => {
                commit('deleteOrderItemStatusCodes', id)
                toast.fire({
                    icon: response.data.status,
                    type: response.data.status,
                    title: response.data.message
                })
            })
            .catch(err => console.log(err))
    },
    updateOrderItemStatusCode({commit}, inputParams) {
        return axios.put('/order-items-status-codes/' + inputParams.id, {
            name: inputParams.name
        })
        .then((response) => {
            commit('updateOrderItemStatusCode', {inputParams})
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
    setOrderItemStatusCodes: (state, orderItemStatusCodes) => {
        state.orderItemStatusCodes = orderItemStatusCodes;
    },
    createOrderItemStatusCode: (state, createdOrderItemStatusCode) => {
        state.orderItemStatusCodes.push(createdOrderItemStatusCode);
    },
    deleteOrderItemStatusCodes: (state, id) => {
        state.orderItemStatusCodes = state.orderItemStatusCodes.filter(inv => inv.id !== id)
    },
    updateOrderItemStatusCode: (state, {inputParams}) => {
        let updatedOrderItemStatusCode = state.orderItemStatusCodes.find(inv => inv.id === inputParams.id);
        updatedOrderItemStatusCode.name = inputParams.name;
    }
};

export default {
    namespaced: true,
    state, 
    getters,
    actions,
    mutations,
}