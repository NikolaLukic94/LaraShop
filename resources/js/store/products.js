import { create } from "lodash";

const state = {
    products: [],
    filteredProducts: [],
    recomended: [],
    mostPopular: []
}

const getters = {
    getProducts: state => state.products,
    getFilteredProducts: state => state.filteredProducts,
    getRecommended: state => state.recomended,
    getMostPopular: state => state.mostPopular
};

const actions = {
    setProducts({commit}) {
        return axios.get('/api/products')
            .then((response) => {
                commit('setProducts', response.data.data); 
            })
            .catch(function (error) {
                console.log(error);
            })
    },
    setFilteredProducts({commit}) {
        return axios.get('/api/products')
            .then((response) => {
                commit('setFilteredProducts', response.data.data); 
            })
            .catch(function (error) {
                console.log(error);
            })
    },
    filterForProduct({commit}, name) {
        let param = typeof name == "object" ? name.type : name;

        return axios.post('/api/products/filter', {
                name: param
            })
            .then(function (response) {
                if (param == 'recommended') {
                    commit('setRecomended', response.data.data)
                } else if (param == 'mostPopular') {
                    commit('setMostPopular', response.data.data)
                } else {
                    commit('filterForProduct', response.data.data)
                }
            })
            .catch(err => console.log(err))
    },
    createProduct({commit}, request) {

        return axios.post('/products/create', {
            id: request.id,
            productTypeId: 1,
            name: request.name,
            author: request.author,
            publisher: request.publisher,
            description: request.description,
            price: request.price,
            quantity: request.quantity,
            color: request.color,
            size: request.size,
            other: request.other,
            genre: request.genre
        })
            .then(function (response) {
                commit('createProduct', response.data.createdProduct)
                toast.fire({
                    icon: response.data.status,
                    type: response.data.status,
                    title: response.data.message
                })
            })
            .catch(err => console.log(err)) 
    },
    updateProduct({commit}, request) {

        return axios.post('/products/create', {
            id: request.id,
            productTypeId: 1,
            name: request.name,
            author: request.author,
            publisher: request.publisher,
            description: request.description,
            price: request.price,
            quantity: request.quantity,
            color: request.color,
            size: request.size,
            other: request.other,
            genre: request.genre
        })
            .then(function (response) {
                commit('updateProduct', response.data.createdProduct)
                toast.fire({
                    icon: response.data.status,
                    type: response.data.status,
                    title: response.data.message
                })
            })
            .catch(err => console.log(err)) 
    },
    deleteProduct({commit}, id) {
        return axios.post('/products/delete/' + id
            ).then(function (response) {
                commit('deleteProduct', id)
                toast.fire({
                    icon: response.data.status,
                    type: response.data.status,
                    title: response.data.message
                })
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
        state.products.unshift(createdProduct);
    },
    updateProduct: (state, createdProduct) => {
        let updatedProduct = state.products.find(p => p.id === createdProduct.id);
        
        updatedProduct.name = createdProduct.name;
        updatedProduct.author = createdProduct.author;
        updatedProduct.description = createdProduct.description;
        updatedProduct.other_product_details = createdProduct.other_product_details;
        updatedProduct.price = createdProduct.price;
        updatedProduct.publisher = createdProduct.publisher;
        updatedProduct.quantity = createdProduct.quantity;
        updatedProduct.size = createdProduct.size;
    },
    deleteProduct: (state, id) => {
        state.products = state.products.filter(p => p.id !== id);
    },
    setRecomended: (state, products) => {
        state.recomended = products;
    },
    setMostPopular: (state, products) => {
        state.mostPopular = products;
    }
};

export default {
    namespaced: true,
    state, 
    getters,
    actions,
    mutations,
}