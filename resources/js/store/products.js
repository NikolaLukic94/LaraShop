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
        console.log('productsproducts', filteredProducts)
        console.log(state.filteredProducts)
        state.filteredProducts = filteredProducts;
        console.log(state.filteredProducts)
    },
};

export default {
    namespaced: true,
    state, 
    getters,
    actions,
    mutations,
}