const state = {
    userAddresses: [],
    newAddress: [
        // firstName = '',
        // lastName = '',
        // addressLineOne = '',
        // addressLineTwo = '',
        // phoneNumber = '',
        // city = '',
        // county = '',
        // zip = '',
        // country = '',
    ],
    nn: {
        firstName: '',
        lastName: '',
        addressLineOne: '',
        addressLineTwo: '',
        phoneNumber: '',
        city: '',
        county: '',
        zip: '',
        country: '',
    },
    errors: []
}

const getters = {
    getUserAddresses: state => state.userAddresses,
    getNewAddress: state => state.nn,
    getErrors: state => state.errors
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
    updateNewAddressField({commit}, attrName) {
        state.newAddress[attrName.fieldName] = attrName.fieldValue;
    },
    validateField({commit}, input) {
        let name = input.errorName.replace("Error", "");

        if (!state.nn.name) {
            state.errors.push([input.errorName, input.errorMessage]);
        } else {
            state.errors = state.errors.filter(e => e[0] !== input.errorName)
        }
    },
    validateData({commit}) {
        commit('validateData', {errorName:'firstNameError', errorMessage: '* First Name is required'});
        commit('validateData', {errorName:'lastNameError', errorMessage: '* Last Name is required'});
        commit('validateData', {errorName:'phoneNumberError', errorMessage: '* Phone Number is required'});
        commit('validateData', {errorName:'addressLineOneError', errorMessage: '* Address Line 1 is required'});
        commit('validateData', {errorName:'addressLineTwoError', errorMessage: '* Address Line 2 is required'});
        commit('validateData', {errorName:'cityError', errorMessage: '* City is required'});
        commit('validateData', {errorName:'countyError', errorMessage: '* County is required'});
        commit('validateData', {errorName:'zipError', errorMessage: '* ZIP is required'});
        commit('validateData', {errorName:'countryError', errorMessage: '* Country is required'});
    },
};

const mutations = {
    setUserAddresses: (state, userAddresses) => {
        state.userAddresses = userAddresses;
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
