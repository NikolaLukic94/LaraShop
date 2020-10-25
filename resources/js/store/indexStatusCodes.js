const state = {
    invoiceStatusCodes: [],
}
// todo: rename from index to invoice
const getters = {
    getInvoiceStatusCodes: state => state.invoiceStatusCodes,
};

const actions = {
    setInvoiceStatusCodes({commit}) {
        return axios.get('/api/invoice-status-codes')
              .then((response) => {
                commit('setInvoiceStatusCodes', response.data.data);
            })
              .catch(function (error) {
            })
    },
    createInvoiceStatusCode({commit}, name) {
        return axios.post('/invoice-status-codes', {
            name: name
        })
            .then(function (response) {
                commit('createInvoiceStatusCode', response.data.createdInvoice)
                toast.fire({
                    icon: response.data.status,
                    type: response.data.status,
                    title: response.data.message
                })
            })
            .catch(err => console.log(err))
    },
    deleteInvoiceStatusCode({commit}, id) {
        return axios.delete('/invoice-status-codes/' + id)
            .then((reponse) => {
                commit('delete', id)
                toast.fire({
                    icon: response.data.status,
                    type: response.data.status,
                    title: response.data.message
                })
            })
            .catch(err => console.log(err))
    },
    updateInvoiceStatusCode({commit}, inputParams) {
        return axios.put('/invoice-status-codes/' + inputParams.id, {
            name: inputParams.name
        })
        .then((response) => {
            commit('updateInvoiceStatusCode', inputParams)
            toast.fire({
                icon: response.data.status,
                type: response.data.status,
                title: response.data.message
            })
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
        updatedInvoiceStatusCode.name = inputParams.name;
    }
};

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations,
}
