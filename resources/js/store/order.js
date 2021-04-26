const state = {
    orders: [],
    inOrderId: ''
}

const getters = {
    getOrders: state => state.orders,
    getInEdit: state => state.inOrderId
};

const actions = {
    setOrders({commit}) {
        return axios.get('/api/orders')
            .then((response) => {
                commit('setOrders', response.data.data);
            })
            .catch(function (error) {
                console.log(error);
            })
    },
    createOrder({commit}) {
        return axios.post('/orders')
            .then((response) => {
                commit('createOrder', response.data.data);

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
    setInEdit({commit}, id) {
        commit('setInEdit', id)
    }
};

const mutations = {
    setOrders: (state, orders) => {
        state.orders = orders;
    },
    createOrder: (state, order) => {
        state.orders.push(order)
    },
    setInEdit: (state, id) => {
        state.inOrderId = id;
    },
};

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations,
}
