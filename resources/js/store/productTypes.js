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
        return axios.post('/product-types/create', {
                name: name
            })
            .then((response) => {
                commit('createProductType', response.data.createdProductType)
                toast.fire({
                    icon: response.data.status,
                    type: response.data.status,
                    title: response.data.message
                })
            })
            .catch(err => console.log(err))
    },
    deleteProductType({commit}, id) {
        return axios.post('/product-types/delete/' + id)
            .then((reponse) => {
                commit('deleteProductType', id)
                toast.fire({
                    icon: response.data.status,
                    type: response.data.status,
                    title: response.data.message
                })
            })
            .catch(err => console.log(err))
    },
    updateProductType({commit}, inputParams) {
        return axios.post('/product-types/edit/' + inputParams.id, {
            name: inputParams.name
        })
        .then((response) => {
            commit('updateProductType', inputParams)
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
    setProductTypes: (state, productTypes) => {
        state.productTypes = productTypes;
    },
    createProductType: (state, createdProductTypes) => {
        state.productTypes.push(createdProductTypes);
    },
    deleteProductType: (state, id) => {
        state.productTypes = state.productTypes.filter(inv => inv.id !== id)
    },
    updateProductType: (state, inputParams) => {
        let updatedProductType = state.productTypes.find(pt => pt.id === inputParams.id);
        updatedProductType.name = inputParams.name;
    }
};

export default {
    namespaced: true,
    state, 
    getters,
    actions,
    mutations,
}