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
        createPaymentMethods({commit}, name) {
            return axios.post('/payment-methods', {
                name: name
            })
                .then((reponse) => {
                    commit('createPaymentMethod', response)
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
        state.paymentMethods = state.paymentMethods.find(p => p.id !== id)
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