const state = {
    products: [],
    filteredProducts: []
}

const getters = {
    getProducts: state => state.products,
    getFilteredProducts: state => state.filteredProducts
};

const actions = {
    setProducts({commit}) {
        return axios.get('/products')
            .then((response) => {
                commit('setProducts', response.data.data); 
            })
            .catch(function (error) {
                console.log(error);
            })
    },
    setFilteredProducts({commit}) {
        return axios.get('/products')
            .then((response) => {
                commit('setFilteredProducts', response.data.data); 
            })
            .catch(function (error) {
                console.log(error);
            })
    },
    filterForProduct({commit}, name) {
        return axios.post('/products/filter', {
            name: name
        })
            .then(function (response) {
                console.log('response', response.data.data)
                commit('filterForProduct', response.data.data)
            })
            .catch(err => console.log(err))
    },
    createProduct({commit}, request) {

        return axios.post('/products/create', {
            productTypeId: 1,
            name: request.name,
            description: request.description,
            price: request.price,
            quantity: request.quantity,
            color: request.color,
            size: request.size,
            other: request.other,
        })
            .then(function (response) {
                commit('createProduct', response.data.createdProduct)
            })
            .catch(err => console.log(err)) 
    },
    deleteProduct({commit}, id) {
        return axios.post('/products/delete/' + id
            ).then(function (response) {
                commit('deleteProduct', id)
            })
            .catch(err => console.log(err)) 
    }
};

const mutations = {
    setProducts: (state, products) => {
        state.products = products;
    },
    setFilteredProducts: (state, products) => {
        state.filteredProducts = products;
    },
    filterForProduct: (state, filteredProducts) => {
        state.filteredProducts = filteredProducts;
    },
    createProduct: (state, createdProduct) => {
        state.products.push(createdProduct);
    },
    deleteProduct: (state, id) => {
        state.products = state.products.filter(p => p.id !== id);
    }
};

export default {
    namespaced: true,
    state, 
    getters,
    actions,
    mutations,
}