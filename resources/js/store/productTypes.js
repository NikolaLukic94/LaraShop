const state = {
    productTypes: [],
}

const getters = {
    getProductTypes: state => state.productTypes,
};

const actions = {
    setProductTypes({commit}) {
        return axios.get('/product-types')
              .then((response) => {
                commit('setProductTypes', response.data.data); 
              })
              .catch(function (error) {
                console.log(error);
              })
    },
    createProductType({commit}, name) {
        return axios.post('/product-types', {
            name: name
        })
            .then((reponse) => {
                commit('createProductType', response)
            })
            .catch(err => console.log(err))
    },
    deleteProductType({commit}, id) {
        return axios.post('/product-types/delete/' + id)
            .then((reponse) => {
                commit('deleteProductType', id)
            })
            .catch(err => console.log(err))
    },
    updateProductTypeCode({commit}, {id, name}) {
        return axios.post('/product-type/edit/' + id, {
            name: name
        })
        .then((response) => {
            commit('updateProductType', {id, name})
        })
    }
};

const mutations = {
    setProductTypes: (state, productTypes) => {
        state.productTypes = productTypes;
    },
    createProductType: (state, createdProductTypes) => {
        state.productTypes.push(createdProductTypes);
    },
    deleteProductType: (state, id) => {
        state.productTypes = state.productTypes.filter(inv => inv.id !== id)
    },
    updateProductType: (state, {id, name}) => {
        let updatedProductType = state.productTypes.find(inv => inv.id === id);
        updatedProductType.name = name;
    }
};

export default {
    namespaced: true,
    state, 
    getters,
    actions,
    mutations,
}