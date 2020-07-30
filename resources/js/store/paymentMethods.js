const state = {
    paymentMethods: [],
    newPaymentMethod: {
        owner: '',
        ccv: '',
        cardNumber: '',
        expiration: '',
        year: '',
        cardType: '',
    }
}

const getters = {
    getPaymentMethods: state => state.paymentMethods,
    getNewPaymentMethod: state => state.newPaymentMethod
};

const actions = {
    setPaymentMethods({commit}) {
        return axios.get('/payment-methods')
            .then((response) => {
                commit('setPaymentMethods', response.data.data);
            })
            .catch(function (error) {
                console.log(error);
            })
        },
    createPaymentMethod({commit}, name) {
        return axios.post('/payment-methods/create', {
            name: name
        })
        .then((response) => {
            commit('createPaymentMethod', response.data.createdPaymentMethod)
        })
        .catch(err => console.log(err))
    },
    deletePaymentMethods({commit}, id) {
        return axios.post('/payment-methods/delete/' + id)
            .then((reponse) => {
                commit('deletePaymentMethod', id)
            })
            .catch(err => console.log(err))
    },
    updatePaymentMethod({commit}, {id, name}) {
        return axios.post('/payment-methods/edit/' + id, {
            name: name
        })
        .then((response) => {
            commit('updatePaymentMethod', {id, name})
        })
    },
    updateNewPaymentMethod({commit}, attrName) {
        state.newPaymentMethod[attrName.fieldName] = attrName.fieldValue;
    },
    validateField({commit}, input) {
        let name = input.errorName.replace("Error", "");

        if (!state.nn.name) {
            state.errors.push([input.errorName, input.errorMessage]);
        } else {
            state.errors = state.errors.filter(e => e[0] !== input.errorName)
        }
    },
    validatePaymentData({commit}) {
        commit('validateData', {errorName:'ownerError', errorMessage: '* Owner is required'});
        commit('validateData', {errorName:'ccvError', errorMessage: '* Card Number is required'});
        commit('validateData', {errorName:'cardNumberError', errorMessage: '* Card Number is required'});
        commit('validateData', {errorName:'expirationError', errorMessage: '* Expiration date is required'});
        commit('validateData', {errorName:'yearError', errorMessage: '* Year is required'});
        commit('validateData', {errorName:'cardTypeError', errorMessage: '* Card Type is required'});
    },
};

const mutations = {
    setPaymentMethods: (state, paymentMethods) => {
        state.paymentMethods = paymentMethods;
    },
    createPaymentMethod: (state, createdPaymentMethod) => {
        state.paymentMethods.push(createdPaymentMethod);
    },
    deletePaymentMethod: (state, id) => {
        state.paymentMethods = state.paymentMethods.filter(p => p.id !== id)
    },
    updatePaymentMethod: (state, {id, name}) => {
        let updatedPaymentMethod = state.paymentMethods.find(p => p.id === id);
        updatedPaymentMethod.name = name;
    },
    validateData: (state, input) => {
        let name = input.errorName.replace("Error", "");

        if (!state.nn.name) {
            state.errors.push([input.errorName, input.errorMessage]);
        } else {
            state.errors = state.errors.filter(e => e[0] !== input.errorName)
        }
    }
};

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations,
}
