const state = {
    orderItems: [],
    totalPremium: 0,
    allAreDigital: true,
    getSidebarToogleValue: null
}

const getters = {
    getOrderItems: state => state.orderItems,
    getTotalPremium: state => state.totalPremium
};

const actions = {
    setOrderItems({commit}) {
        return axios.get('/api/order-items')
            .then((response) => {
                commit('setOrderItems', response.data.data);
                // commit('setAllAreDigital', response.data.data);
                // commit('setTotalPremium')
            })
            .catch(function (error) {
                console.log(error)
            })
    },
    setTotalPremium({commit, id}) {
        commit('setTotalPremium')
    },
    deleteOrderItem({commit}, id) {
        return axios.delete('/api/order-items/' + id)
            .then((response) => {
                commit('deleteOrderItem', id);
                commit('setTotalPremium')

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
    updateOrderItem({commit}, {item, value}) {
        let newValue = value === 'increase' ? item.quantity++ : item.quantity--;

        return axios.post('/api/order-items/' + item.id + '/edit', {
            quantity: newValue
        })
            .then((response) => {
                commit('updateOrderItem', response.data.orderItem);
                commit('setTotalPremium')

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
    storeOrderItem: ({commit}, productId) => {
        if (document.head.querySelector('meta[name="auth-token"]').getAttribute('content') === 'not-authenticated') {
            toast.fire({
                icon: 'error',
                type: 'error',
                title: 'Please log in first!'
            })
            return;
        }

        return axios.post('/api/order-items', {
            productId: productId,
        })
            .then((response) => {
                commit('storeOrderItem', response.data.data);
                // commit('setTotalPremium')

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
};

const mutations = {
    setOrderItems: (state, orderItems) => {
        state.orderItems = orderItems;
    },
    updateOrderItem: (state, orderItem) => {
        let theItem = state.orderItems.find(p => p.id === orderItem.id);

        theItem.quantity = orderItem.quantity;
        theItem.price = orderItem.price;
    },
    deleteOrderItem: (state, id) => {
        state.orderItems = state.orderItems.filter(c => c.id !== id);
    },
    storeOrderItem: (state, orderItems) => {
        state.orderItems.push(orderItems);
    },
    setAllAreDigital: (state, data) => {
        let nonDigital = Object.keys(data)
            .filter(key => data[key].relationships.product.data.relationships.productType.data.name !== 'digital');

        if (nonDigital.length) {
            state.allAreDigital = false;
        }
    },
    setTotalPremium: (state) => {
        let total = 0;

        state.orderItems.forEach(ci => {
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
