const state = {
    paymentMethods: [],
}

const getters = {
    getPaymentMethods: state => state.paymentMethods,
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
    }
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
    }
};

export default {
    namespaced: true,
    state, 
    getters,
    actions,
    mutations,
}