const state = {
    userAddresses: [],
}

const getters = {
    getUserAddresses: state => state.userAddresses,
};

const actions = {
    setUserAddresses({commit}) {
        return axios.get('/user-addresses')
            .then((response) => {
                commit('setUserAddresses', response.data.data); 
            })
            .catch(function (error) {
        })
    },
    saveUserAddress({commit}, request) {
        console.log('saving new address')
        return axios.post('/user-addresses/create', 
            // firstName: request.firstName,
            // lastName: request.lastName,
            // addressLineOne: request.addressLineOne,
            // addressLineTwo: request.addressLineTwo,
            // phoneNumber: request.phone_number,
            // city: request.city,
            // county: request.county,
            // zip: request.zip,
            // country: request.country
            request
        )
        .then(function (response) {
            commit('createInvoiceStatusCode', response.data.createdInvoice)
        })
        .catch(err => console.log(err))
    }
};

const mutations = {
    setUserAddresses: (state, userAddresses) => {
        state.userAddresses = userAddresses;
        console.log(state.userAddresses)
    },
    storeUserAddresses: (state, userAddresses) => {
        // state.userAddresses = userAddresses;
    },
};

export default {
    namespaced: true,
    state, 
    getters,
    actions,
    mutations,
}