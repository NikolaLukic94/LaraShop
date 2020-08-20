const state = {
    userAddresses: [],
    nn: [
            ['firstName', '']
            ['lastName', ''],
            ['addressLineOne', ''],
            ['addressLineTwo', ''],
            ['phoneNumber', ''],
            ['city', ''],
            ['county', ''],
            ['zip', ''],
            ['country', ''],
    ],
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
        console.log(attrName, 'attrName')
        commit('updateNewAddressField', attrName);
    },
    validateField({commit}, input) {
        let name = input.errorName.replace("Error", "");

        if (state.nn.name == null) {
            console.log('abc', state.nn)
            let theError = {name: input.errorName, message: input.errorMessage}
            commit('pushError', theError)
        } else {
            commit('removeError', input.errorName)
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

        if (state.nn.name == null) {
            state.errors.push([input.errorName, input.errorMessage]);
        } else {
            state.errors = state.errors.filter(e => e[0] !== input.errorName)
        }
    },
    updateNewAddressField: (state, input) => {
        let st = input.fieldName;
        state.nn.st = input.fieldValue;
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
