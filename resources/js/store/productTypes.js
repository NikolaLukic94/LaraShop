const state = {
    productTypes: [],
}

const getters = {
    getProductTypesCodes: state => state.productTypes,
};

const actions = {
    setProductTypesCodes({commit}) {
        return axios.get('/product-types')
              .then((response) => {
                commit('setProductTypesCodes', response.data.data); 
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
                    commit('createProductTypeCode', response)
                })
                .catch(err => console.log(err))
        },
    deleteProductType({commit}, id) {
        return axios.post('/product-types/delete/' + id)
            .then((reponse) => {
                commit('deleteProductTypeCodes', id)
            })
            .catch(err => console.log(err))
    },
    updateProductTypeCode({commit}, {id, name}) {
        return axios.post('/product-type/edit/' + id, {
            name: name
        })
        .then((response) => {
            commit('updateProductTypeCode', {id, name})
        })
    }
};

const mutations = {
    setProductTypesCodes: (state, productTypes) => {
        state.productTypesCodes = productTypes;
    },
    createProductTypeCode: (state, createdProductTypes) => {
        state.productTypesCodes.push(createdProductTypesCode);
    },
    deleteProductTypesCodes: (state, id) => {
        state.productTypesCodes = state.productTypesCodes.find(inv => inv.id !== id)
    },
    updateProductTypesCode: (state, {id, name}) => {
        let updatedProductTypeCode = state.productTypesCodes.find(inv => inv.id === id);
        updatedProductTypeCode.name = name;
    }
};

export default {
    namespaced: true,
    state, 
    getters,
    actions,
    mutations,
}