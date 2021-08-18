import axios from 'axios'
import route from '../library/route'

import Swal from 'sweetalert2'

import { api_url } from '../url.js'

const GET_REGISTRATIONS = `${api_url}/api/summary/registrations`
const getRegistrations = (payload) => {
    const { town_city, start_date, end_date } = payload
    return axios.get(GET_REGISTRATIONS, { params: { town_city, start_date, end_date} })
}

// const SELECTIONS_ROUTE = `${api_url}/api/doh/selections`
// const getSelections = () => {
//     return axios.get(SELECTIONS_ROUTE)
// }

const registered = {
    total_registered: 0,
    gender: {
        male: 0,
        female: 0
    },
    origin: {
        total_online: 0,
        total_manual: 0,
        total_import: 0,
    }
}

const addresses = [];

// const selections = {
//     addresses,
// }

const state = () => {
    return {
        registered,
        // selections
    }
}

const mutations = {
    SUMMARY(state, payload) {
        state.registered = {...payload}
    },
    LOADING(){
        Swal.fire({
            title: 'Please wait...',
            willOpen () {
              Swal.showLoading ()
            },
            didClose () {
              Swal.hideLoading()
            },
            showConfirmButton: false,
            allowOutsideClick: false,
            allowEscapeKey: false,
            allowEnterKey: false
        })
    }
}

const actions = {
    async GET_REGISTRATIONS({commit}, payload) {
        try {
            commit('LOADING')
            const { data: { data } } = await getRegistrations(payload)
            commit('SUMMARY', data)
            Swal.close()
        } catch (error) {
            const { response } = error
            console.log(response)
            Swal.close()
        }
    }
}


const getters = {

}

const registeredStore = {
	namespaced: true,    
    state,
    mutations,
    actions,
    getters
}

export { registeredStore };