const state = {
    orderItemStatusCodes: [],
}

const getters = {
    getOrderItemStatusCodes: state => state.orderItemStatusCodes,
};

const actions = {
    setOrderItemStatusCodes({commit}) {
        return axios.get('/order-item-status-codes')
              .then((response) => {
                console.log(response)
                commit('setOrderItemStatusCodes', response.data.data); 
              })
              .catch(function (error) {
                console.log(error);
              })
        },
        createOrderItemStatusCode({commit}, name) {
            return axios.post('/order-item-status-codes/create', {
                name: name
            })
                .then(function (response) {
                    commit('createOrderItemStatusCode', response.data.createdOrderItemStatusCode)
                })
                .catch(err => console.log(err))
        },
    deleteOrderItemStatusCodes({commit}, id) {
        return axios.post('/order-item-status-codes/delete/' + id)
            .then((reponse) => {
                commit('deleteOrderItemStatusCodes', id)
            })
            .catch(err => console.log(err))
    },
    updateOrderItemStatusCode({commit}, inputParams) {
        return axios.post('/order-item-status-codes/edit/' + inputParams.id, {
            name: inputParams.name
        })
        .then((response) => {
            commit('updateOrderItemStatusCode', {inputParams})
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