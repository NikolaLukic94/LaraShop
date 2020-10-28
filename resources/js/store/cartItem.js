const state = {
    cartItems: [],
    getTotalPremium: 0,
    allAreDigital: false
}

const getters = {
    getCartItems: state => state.cartItems,
    getTotalPremium: (state) => {
        let total = 0;

        state.cartItems.forEach(ci => {
            total += ci.quantity * ci.relationships.product.data.price
        })

        return total;
    },
};

const actions = {
    setCartItems({commit}) {
        return axios.get('/api/cart-items')
            .then((response) => {
                console.log(response)
                commit('setAllAreDigital', response.data.data);
                commit('setCartItems', response.data.data);
            })
            .catch(function (error) {
                console.log(error);
            })
    },
    setAllAreDigital() {
        commit('setAllAreDigital', cartItems);
    },
    deleteCartItem({commit}, id) {
        return axios.delete('/cart-items/' + id)
            .then((response) => {
                commit('deleteCartItem', id);
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
    changeQuantity({commit}, data) {
        let theId = data.id
        return axios.post('/cart-items/' + theId, {
                value: data.value
            })
            .then((response) => {
                commit('changeQuantity', {id: theId, quantity: response.data.quantity});
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
    storeCartItem: ({commit}, productId) => {
        return axios.post('/cart-items', {
                productId: productId,
            })
            .then((response) => {
                commit('storeCartItem', response.data.data);
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
    setCartItems: (state, cartItems) => {
        state.cartItems = cartItems;
    },
    deleteCartItem: (state, id) => {
        state.cartItems = state.cartItems.filter(c => c.id !== id);
    },
    changeQuantity: (state, data) => {
        let item = state.cartItems.find(c => c.id === data.id);
        item.quantity = data.quantity;
    },
    storeCartItem: (state, cartItem) => {
        state.cartItems.push(cartItem);
    },
    setAllAreDigital: (state, cartItems) => {
        let allAreDigital = cartItems.find(
            p => p.relationships.product.data.relationships.productType.data.name !== 'digital'
        );

        if (allAreDigital) {
            state.allAreDigital = true;
        }
    }
};

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations,
}
