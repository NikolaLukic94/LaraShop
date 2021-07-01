import {create} from "lodash";

const state = {
    products: [],
    filteredProducts: [],
    searchResults: [],
    inEditProductId: '',
    inEditMode: '',
    photosOfProductInEdit: []
}

const getters = {
    getProducts: state => state.products,
    getFilteredProducts: state => state.filteredProducts,
    getSearchResults: state => state.searchResults,
    getInEditProductId: state => state.inEditProductId,
    getPhotosOfProductInEdit: state => state.photosOfProductInEdit
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
    filterForProduct({commit}, filterName) {
        return axios.get('/api/products?' + filterName)
            .then(function (response) {
                commit('setFilteredProducts', {data: response.data.data, filter: filterName});
            })
            .catch(err => console.log(err))
    },
    createProduct({commit}, request) {
        return axios.post('/api/products', request)
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
        return axios.patch('/api/products/' + request.id, request)
            .then(function (response) {
                commit('updateProduct', response.data.updatedProduct)
                toast.fire({
                    icon: response.data.status,
                    type: response.data.status,
                    title: response.data.message
                })
            })
            .catch(err => console.log(err))
    },
    deleteProduct({commit}, id) {
        return axios.delete('/api/products/' + id
        ).then(function (response) {
            commit('deleteProduct', id)
            toast.fire({
                icon: response.data.status,
                type: response.data.status,
                title: response.data.message
            })
        })
            .catch(err => console.log(err))
    },
    searchProduct({commit}, stringParam) {
        axios.get('/',
            {params: {searchBy: this.input}}).then(response => {
            commit('setSearchResults', response.data.data);
        });
    },
    setInEdit({commit}, data) {
        commit('setInEdit', data.value)
        commit('setInEditMode', data.type)

        if (data.value.relationships.images.data.length) {
            commit('setPhotosOfProductInEdit', data.value.relationships.images)
        } else {
            commit('setPhotosOfProductInEdit', [])
        }
    },
};

const mutations = {
    setPhotosOfProductInEdit: (state, photos) => {
        state.photosOfProductInEdit = photos;
    },
    setProducts: (state, id) => {
        state.products = id;
    },
    setFilteredProducts: (state, params) => {
        state.filteredProducts.push(params.filter)

        let ee = state.filteredProducts.find(a => params.filter)

        ee[params.data];
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
    setSearchResults: (state, theProducts) => {
        state.searchResults = theProducts;
    },
    setInEdit: (state, id) => {
        state.inEditProductId = id;
    },
    setInEditMode: (state, type) => {
        state.inEditMode = type;
    },
};

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations,
}
