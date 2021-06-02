import axios from 'axios'
import route from '../library/route'

import Swal from 'sweetalert2'

import { api_url } from '../url.js'

const GET_REGISTRATIONS = `${api_url}/api/summary/registrations`
const getRegistrations = (payload) => {
    const { town_city, start_date, end_date } = payload
    return axios.get(GET_REGISTRATIONS, { params: { town_city, start_date, end_date} })
}

const SELECTIONS_ROUTE = `${api_url}/api/doh/selections`
const getSelections = () => {
    return axios.get(SELECTIONS_ROUTE)
}

const registered = {
    total_registered: 0,
    total_vaccinated: 0,
    priority_group: {
        health_workers: 0,
        senior_citizen: 0,
        adult_with_comorbidity: 0,
        frontline_personnel_essential_sector: 0,
        poor_population: 0,
        teacher: 0,
        other_government_workers: 0,
        other_essential_workers: 0,
        socio_demographic_groups: 0,
        ofw: 0,
        other_remaining_workforce: 0,
        rest_of_the_population: 0
    },
    dosages: {
        first_dosage: 0,
        second_dosage: 0,
        third_dosage: 0
    },
    complete_immunization: 0,
    waiting: 0,
    individual_eligible: 0,
    immunized_vs_eligible: 0,
    total_doses: [],
    total_vaccines_used: []
}

const addresses = [];

const selections = {
    addresses,
}

const state = () => {
    return {
        registered,
        selections
    }
}

const mutations = {
    SUMMARY(state, payload) {
        state.registered = {...payload}
    },
    SELECTIONS(state, payload) {
        state.selections = {...payload}
    },
    LOADING(){
        Swal.fire({
            title: 'Loading...',
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
    },
    async GET_SELECTIONS({commit}) {
        commit('LOADING')
        try {
            const { data: { data } } = await getSelections()
            commit('SELECTIONS', data)
            Swal.close()
        } catch (error) {
            const { response } = error
            console.log(response)
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