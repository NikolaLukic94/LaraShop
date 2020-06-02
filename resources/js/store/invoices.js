const state = {
    invoices: [],
}

const getters = {
    getInvoices: state => state.invoices,
};

const actions = {
    setInvoices({commit}) {
        return axios.get('/invoices')
              .then((response) => {
                commit('setInvoices', response.data.data); 
              })
              .catch(function (error) {
                console.log(error);
              })
    },
};

const mutations = {
    setInvoices: (state, invoices) => {
        state.invoices = invoices;
    },
};

export default {
    namespaced: true,
    state, 
    getters,
    actions,
    mutations,
}