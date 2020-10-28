const state = {
    stores: [],
}

const getters = {
    getStores: state => state.stores,
};

const actions = {
    setStores({commit}) {
        return axios.get('/api/stores')
            .then((response) => {
                commit('setStores', response.data); 
            })
            .catch(function (error) {
                console.log(error);
            })
    },
};

const mutations = {
    setStores: (state, stores) => {
        state.stores = stores;
    },
};

export default {
    namespaced: true,
    state, 
    getters,
    actions,
    mutations,
}