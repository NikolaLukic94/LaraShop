const state = {
    shipments: [],
}

const getters = {
    getShipments: state => state.shipments,
};

const actions = {
    setUser({commit}, id) {
        return axios.get('/shipment/index')
            .then((response) => {
                console.log('asasd', response.data.data)
            commit('setShipments', response); 
            })
            .catch(function (error) {
            console.log(error);
            })
    }
};

const mutations = {
    setShipments: (state, shipments) => {
        state.shipments = shipments;
    },
};

export default {
    namespaced: true,
    state, 
    getters,
    actions,
    mutations,
}