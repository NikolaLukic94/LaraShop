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
        console.log('request', request.firstName)
        return axios.post('/user-addresses/create', {
                firstName: request.firstName,
                lastName: request.lastName,
                addressLineOne: request.addressLineOne,
                addressLineTwo: request.addressLineTwo,
                phoneNumber: request.phone_number,
                city: request.city,
                county: request.county,
                zip: request.zip,
                country: request.country
            }
        )
        .then(function (response) {
            commit('storeUserAddresses', response.data.createdInvoice)
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