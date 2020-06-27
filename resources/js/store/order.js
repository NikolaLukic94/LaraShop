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
};

const mutations = {
    setOrders: (state, orders) => {
        state.orders = orders;
    },
};

export default {
    namespaced: true,
    state, 
    getters,
    actions,
    mutations,
}