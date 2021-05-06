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
                commit('setAllAreDigital', response.data.data);
                commit('setTotalPremium')
            })
            .catch(function (error) {
                console.log(error);
            })
    },
    deleteOrderItem({commit}, id) {
        return axios.delete('/api/order-items/' + id)
            .then((response) => {
                commit('deleteOrderItem', id);
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
    // changeQuantity({commit}, data) {
    //     let theId = data.id
    //     return axios.post('/api/order-items/' + theId + '/edit', {
    //         value: data.value
    //     })
    //         .then((response) => {
    //             commit('changeQuantity', {id: theId, quantity: response.data.quantity});
    //             toast.fire({
    //                 icon: response.data.status,
    //                 type: response.data.status,
    //                 title: response.data.message
    //             })
    //         })
    //         .catch(function (error) {
    //             console.log(error);
    //         })
    // },
    storeOrderItem: ({commit}, productId) => {
        return axios.post('/api/order-items', {
            productId: productId,
        })
            .then((response) => {
                commit('storeOrderItem', response.data.data);

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
        console.log('oraaaaa', orderItems)
        state.orderItems = orderItems;
    },
    deleteOrderItem: (state, id) => {
        state.orderItems = state.orderItems.filter(c => c.id !== id);
    },
    // changeQuantity: (state, data) => {
    //     let item = state.orderItems.find(c => c.id === data.id);
    //     item.quantity = data.quantity;
    // },
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
