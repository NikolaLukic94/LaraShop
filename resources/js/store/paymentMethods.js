const state = {
    paymentMethods: [],
    newPaymentMethod: [
        ['owner', ''],
        ['ccv', ''],
        ['cardNumber', ''],
        ['expiration', ''],
        ['year', ''],
        ['cardType', ''],
    ],
    errors: []
}

const getters = {
    getPaymentMethods: state => state.paymentMethods,
    getNewPaymentMethod: state => state.newPaymentMethod,
    getPaymentErrors: state => state.errors
};

const actions = {
    setPaymentMethods({commit}) {
        return axios.get('/api/payment-methods')
            .then((response) => {
                commit('setPaymentMethods', response.data.data);
            })
            .catch(function (error) {
                console.log(error);
            })
    },
    createPaymentMethod({commit}, name) {
        return axios.post('/payment-methods', {
                name: name
            })
            .then((response) => {
                commit('createPaymentMethod', response.data.createdPaymentMethod)
                toast.fire({
                    icon: response.data.status,
                    type: response.data.status,
                    title: response.data.message
                })
            })
            .catch(err => console.log(err))
    },
    deletePaymentMethods({commit}, id) {
        return axios.delete('/payment-methods/' + id)
            .then((reponse) => {
                commit('deletePaymentMethod', id)
                toast.fire({
                    icon: response.data.status,
                    type: response.data.status,
                    title: response.data.message
                })
            })
            .catch(err => console.log(err))
    },
    updatePaymentMethod({commit}, inputParams) {
        return axios.put('/payment-methods/' + inputParams.id, {
                name: inputParams.name
            })
            .then((response) => {
                commit('updatePaymentMethod', inputParams)
                toast.fire({
                    icon: response.data.status,
                    type: response.data.status,
                    title: response.data.message
                })
            })
            .catch(err => console.log(err))
    },
    // updateNewPaymentMethod({commit}, attrName) {
    //     commit('updateNewPaymentField', attrName);
    //     toast.fire({
    //         icon: response.data.status,
    //         type: response.data.status,
    //         title: response.data.message
    //     })
    // },
    validatePaymentField({commit}, input) {
        let name = input.errorName.replace("Error", "");

        if (!state.newPaymentMethod.name) {
            let theError = {name: input.errorName, message: input.errorMessage}
            commit('pushError', theError)
        } else {
            commit('removeError', input.errorName)
        }
    },
    validatePaymentData({commit}) {
        commit('validatePaymentData', {errorName: 'ownerError', errorMessage: '* Owner is required'});
        commit('validatePaymentData', {errorName: 'ccvError', errorMessage: '* Card Number is required'});
        commit('validatePaymentData', {errorName: 'cardNumberError', errorMessage: '* Card Number is required'});
        commit('validatePaymentData', {errorName: 'expirationError', errorMessage: '* Expiration date is required'});
        commit('validatePaymentData', {errorName: 'yearError', errorMessage: '* Year is required'});
        commit('validatePaymentData', {errorName: 'cardTypeError', errorMessage: '* Card Type is required'});
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
    updatePaymentMethod: (state, inputParams) => {
        let updatedPaymentMethod = state.paymentMethods.find(p => p.id === inputParams.id);
        updatedPaymentMethod.name = inputParams.name;
    },
    validatePaymentData: (state, input) => {
        let name = input.errorName.replace("Error", "");

        if (!state.newPaymentMethod.name) {
            state.errors.push([input.errorName, input.errorMessage]);
        } else {
            state.errors = state.errors.filter(e => e[0] !== input.errorName)
        }
    },
    updateNewPaymentField: (state, input) => {
        let st = input.fieldName;
        state.newPaymentMethod.st = input.fieldValue;
    },
    pushError: (state, theError) => {
        state.errors.push([theError.name, theError.message]);
    },
    removeError: (state, errorName) => {
        state.errors = state.errors.filter(e => e[0] !== errorName)
    }
};

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations,
}
