const state = {
    cartItems: [],
    getTotalPremium: 0
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
        return axios.get('/cart-items/index')
            .then((response) => {
                commit('setCartItems', response.data.data);
            })
            .catch(function (error) {
                console.log(error);
            })
    },
    deleteCartItem({commit}, id) {
        return axios.post('/cart-items/delete/' + id)
            .then((response) => {
                commit('deleteCartItem', id);
            })
            .catch(function (error) {
                console.log(error);
            })
    },
    increaseQuantity({commit}, id) {
        return axios.post('/cart-items/quantity/increase/' + id)
            .then((response) => {
                commit('increaseQuantity', id);
            })
            .catch(function (error) {
                console.log(error);
            })
        // if success, commit
    },
    decreaseQuantity({commit}, id) {
        return axios.post('/cart-items/quantity/decrease/' + id)
            .then((response) => {
                commit('decreaseQuantity', id);
            })
            .catch(function (error) {
                console.log(error);
            })
    },
    changeQuantity({commit}, id, newQuantity) {
        return axios.post('/cart-items/quantity/change/' + id, {
            'quantity': newQuantity
        })
            .then((response) => {
                commit('changeQuantity', id, newQuantity);
            })
            .catch(function (error) {
                console.log(error);
            })
    },
    storeCartItem: ({commit}, productId) => {
        console.log('qq', productId)
        return axios.post('/cart-items/store', {
            productId: productId,
            // quantity: quantity
        })
            .then((response) => {
                commit('storeCartItem', response.data.data);
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
    increaseQuantity: (state, cartId) => {
        let item = state.cartItems.find(c => c.id === cartId);
        item.quantity = item.quantity + 1;
    },
    decreaseQuantity: (state, cartId) => {
        let item = state.cartItems.find(c => c.id === cartId);
        item.quantity = item.quantity - 1;
    },
    changeQuantity: (state, cartId, newQuantity) => {
        let item = state.cartItems.find(c => c.id === cartId);
        item.quantity = newQuantity;
    },
    storeCartItem: (state, cartItem) => {
        state.cartItems.push(cartItem);
    }
};

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations,
}
