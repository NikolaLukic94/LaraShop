const state = {
    invoiceStatusCodes: [],
}
// todo: rename from index to invoice
const getters = {
    getInvoiceStatusCodes: state => state.invoiceStatusCodes,
};

const actions = {
    setInvoiceStatusCodes({commit}) {
        return axios.get('/invoice-status-codes')
              .then((response) => {
                commit('setInvoiceStatusCodes', response.data.data);
              })
              .catch(function (error) {
              })
        },
    createInvoiceStatusCode({commit}, name) {
        return axios.post('/invoice-status-codes/create', {
            name: name
        })
            .then(function (response) {
                commit('createInvoiceStatusCode', response.data.createdInvoice)
            })
            .catch(err => console.log(err))
    },
    deleteInvoiceStatusCode({commit}, id) {
        return axios.post('/invoice-status-codes/delete/' + id)
            .then((reponse) => {
                commit('delete', id)
            })
            .catch(err => console.log(err))
    },
    updateInvoiceStatusCode({commit}, inputParams) {
        return axios.post('/invoice-status-codes/update/' + inputParams.id, {
            name: inputParams.name
        })
        .then((response) => {
            commit('updateInvoiceStatusCode', inputParams)
        })
    }
};

const mutations = {
    setInvoiceStatusCodes: (state, invoiceStatusCodes) => {
        state.invoiceStatusCodes = invoiceStatusCodes;
    },
    createInvoiceStatusCode: (state, createdInvoice) => {
        state.invoiceStatusCodes.push(createdInvoice);
    },
    delete: (state, id) => {
        state.invoiceStatusCodes = state.invoiceStatusCodes.filter(inv => inv.id !== id)
    },
    updateInvoiceStatusCode: (state, inputParams) => {
        let updatedInvoiceStatusCode = state.invoiceStatusCodes.find(inv => inv.id === inputParams.id);
        updatedInvoiceStatusCode.name = inputParams.input;
    }
};

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations,
}
