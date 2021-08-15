const state = {
    shipments: [],
}

const getters = {
    getShipments: state => state.shipments,
};

const actions = {
    setShipments({commit}, id) {
        return axios.get('/api/shipments')
            .then((response) => {
                commit('setShipments', response);
            })
            .catch(function (error) {
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
