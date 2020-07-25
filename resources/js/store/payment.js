const state = {
    payments: [],
}

const getters = {
    getPayments: state => state.payments,
};

const actions = {
    setPayments({commit}) {
        return axios.get('/payments')
            .then((response) => {
                commit('setPayment', response.data.data); 
            })
            .catch(function (error) {
                console.log(error);
            })
        },
        createPayment({commit}, request) {
            return axios.post('/user-payments/create', {
                owner:request.owner,
                ccv:request.ccv,
                cardNumber:request.cardNumber,
                expiration:request.expiration,
                year:request.year,
                cardType:request.cardType,
                paymentMethodId: 1
            })
            .then((response) => {
                commit('createPayment', response.data.createdPaymentMethod)
            })
            .catch(err => console.log(err))
    },
    deletePayment({commit}, id) {
        return axios.post('/payments/delete/' + id)
            .then((reponse) => {
                commit('deletePayment', id)
            })
            .catch(err => console.log(err))
    },
    updatePayment({commit}, {id, name}) {
        return axios.post('/payments/edit/' + id, {
            name: name
        })
        .then((response) => {
            commit('updatePayment', {id, name})
        })
    }
};

const mutations = {
    setPayment: (state, payment) => {
        state.payment = payment;
    },
    createPayment: (state, createdPayment) => {
        state.payment.push(createdPayment);
    },
    deletePayment: (state, id) => {
        state.payment = state.payment.filter(p => p.id !== id)
    },
    updatePayment: (state, {id, name}) => {
        let updatedPayment = state.payment.find(p => p.id === id);
        updatedPayment.name = name;
    }
};

export default {
    namespaced: true,
    state, 
    getters,
    actions,
    mutations,
}