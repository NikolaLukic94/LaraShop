const state = {
    products: [],
}

const getters = {
    getProducts: state => state.products,
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
};

const mutations = {
    setProducts: (state, products) => {
        state.products = products;
    },
};

export default {
    namespaced: true,
    state, 
    getters,
    actions,
    mutations,
}