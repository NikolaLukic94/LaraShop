const state = {
    orders: [],
}

const getters = {
    getOrders: state => state.orders,
};

const actions = {
    setOrders({commit}) {
        return axios.get('/orders')
            .then((response) => {
                commit('setOrders', response.data.data);
            })
            .catch(function (error) {
                console.log(error);
            })
    },
    createOrder({commit}) {
        return axios.post('/orders/create')
            .then((response) => {
                console.log(response)
                commit('createOrder', response.data.data);
            })
            .catch(function (error) {
                console.log(error);
            })
    },
};

const mutations = {
    setOrders: (state, orders) => {
        state.orders = orders;
    },
    createOrder: (state, order) => {
        state.orders.push(order)
    },
};

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations,
}
