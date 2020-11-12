const state = {
    cartItems: [],
    totalPremium: '',
}

const getters = {
    getOrders: state => state.cartItems,
    getTotalPremium:  state => state.totalPremium
};

const actions = {
    setOrders({commit}) {
        return axios.get('/api/cart-items')
            .then((response) => {
                commit('setOrders', response.data.data); 
            })
            .catch(function (error) {
        })
    },
    setTotalPremium({commit}) {
        commit('setTotalPremium');
    },
};

const mutations = {
    setOrders: (state, orders) => {
        state.cartItems = orders;
    },
    setTotalPremium: (state) => {
        let total = 0;

        state.cartItems.forEach(ci => {
            total += ci.quantity * ci.relationships.product.data.price
        })
        
        state.totalPremium = total;
    }
};

export default {
    namespaced: true,
    state, 
    getters,
    actions,
    mutations,
}