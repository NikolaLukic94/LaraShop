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
                // handle success
                console.log(response)
                commit('setOrderItemStatusCodes', response.data.data); 
              })
              .catch(function (error) {
                // handle error
                console.log(error);
              })
        },
        createOrderItemStatusCode({commit}, name) {
            return axios.post('/order-items-status-codes', {
                name: name
            })
                .then((reponse) => {
                    commit('createOrderItemStatusCode', response)
                })
                .catch(err => console.log(err))
        },
    deleteOrderItemStatusCodes({commit}, id) {
        return axios.post('/order-items-status-codes/delete/' + id)
            .then((reponse) => {
                commit('deleteOrderItemStatusCodes', id)
            })
            .catch(err => console.log(err))
    },
    updateOrderItemStatusCode({commit}, {id, name}) {
        return axios.post('/order-items-status-codes/edit/' + id, {
            name: name
        })
        .then((response) => {
            commit('updateInvoiceStatusCode', {id, name})
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
        state.orderItemStatusCodes = state.orderItemStatusCodes.find(inv => inv.id !== id)
    },
    updateOrderItemStatusCode: (state, {id, name}) => {
        let updatedOrderItemStatusCode = state.orderItemStatusCodes.find(inv => inv.id === id);
        updatedOrderItemStatusCode.name = name;
    }
};

export default {
    namespaced: true,
    state, 
    getters,
    actions,
    mutations,
}