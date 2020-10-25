const state = {
    shipmentStatuses: [],
}
// todo: rename from index to invoice
const getters = {
    getShipmentStatuses: state => state.shipmentStatuses,
};

const actions = {
    setShipmentStatuses({commit}) {
        return axios.get('/shupment-statuses')
        .then((response) => {
            commit('setShipmentStatuses', response.data.data); 
        })
        .catch(function (error) {})
    },
    createShipmentStatus({commit}, name) {
        return axios.post('/shupment-statuses/create', {
            name: name
        })
        .then(function (response) {
            commit('createShipmentStatus', response.data.createdShipmentStatus)
            toast.fire({
                icon: response.data.status,
                type: response.data.status,
                title: response.data.message
            })
        })
        .catch(err => console.log(err))
    },
    deleteShipmentStatus({commit}, id) {
        return axios.post('/shupment-statuses/delete/' + id)
            .then((reponse) => {
                commit('deleteShipmentStatus', id)
                toast.fire({
                    icon: response.data.status,
                    type: response.data.status,
                    title: response.data.message
                })
            })
            .catch(err => console.log(err))
    },
    updateShipmentStatus({commit}, {id, name}) {
        return axios.post('/shupment-statuses/edit/' + id, {
            name: name
        })
        .then((response) => {
            commit('updateInvoiceStatusCode', {id, name})
            toast.fire({
                icon: response.data.status,
                type: response.data.status,
                title: response.data.message
            })
        })
        .catch(err => console.log(err))
    }
};

const mutations = {
    setShipmentStatuses: (state, shipmentStatuses) => {
        state.shipmentStatuses = shipmentStatuses;
    },
    createShipmentStatus: (state, shipmentStatus) => {
        state.shipmentStatuses.push(shipmentStatus);
    },
    deleteShipmentStatus: (state, id) => {
        state.shipmentStatuses = state.shipmentStatuses.filter(s => s.id !== id)
    },
    updateShipmentStatus: (state, {id, name}) => {
        let shipmentStatuses = state.shipmentStatuses.find(s => s.id === id);
        s.name = name;
    }
};

export default {
    namespaced: true,
    state, 
    getters,
    actions,
    mutations,
}