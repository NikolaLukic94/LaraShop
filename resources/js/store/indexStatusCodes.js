const state = {
    invoiceStatusCodes: [],
}

const getters = {
    getInvoiceStatusCodes: state => state.invoiceStatusCodes,
};

const actions = {

    setInvoiceStatusCodes({commit}) {

        return axios.get('/invoice-status-codes')
              .then((response) => {
                // handle success
                commit('setInvoiceStatusCodes', response.data); 
              })
              .catch(function (error) {
                // handle error
                console.log(error);
              })
        },

};

const mutations = {
    setInvoiceStatusCodes: (state, invoiceStatusCodes) => {
        state.invoiceStatusCodes = invoiceStatusCodes;
    },
};

export default {
    // namespaced: true,
    state, 
    getters,
    actions,
    mutations,
}