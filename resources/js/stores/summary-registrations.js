import axios from 'axios'
import route from '../library/route'

import Swal from 'sweetalert2'

import { api_url } from '../url.js'

const GET_REGISTRATIONS = `${api_url}/api/summary/registrations`
const getRegistrations = (payload) => {
    const { start_date, end_date } = payload
    return axios.get(GET_REGISTRATIONS, { params: {start_date, end_date} })
}

const GET_HOSPITALS = `${api_url}/api/general/selections/hospitals`
const getHospitals = () => {
    return axios.get(GET_HOSPITALS)
}

const GET_GROUPS = `${api_url}/api/doh/selections/priority/groups`
const getGroups = () => {
    return axios.get(GET_GROUPS)
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
}

const hospitals = []
const groups = []

const state = () => {
    return {
        registered,
        hospitals,
        groups
    }
}

const mutations = {
    SUMMARY(state, payload) {
        state.registered = {...payload}
    },
    HOSPITALS(state, payload) {
        state.hospitals = payload
    },
    GROUPS(state, payload) {
        state.groups = payload
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
    async GET_HOSPITALS({commit}) {
        try {
            const { data: { data } } = await getHospitals()
            commit('HOSPITALS', data)
        } catch (error) {
            const { response } = error
            console.log(response)
        }
    },
    async GET_GROUPS({commit}) {
        try {
            const { data: { data } } = await getGroups()
            commit('GROUPS', data)
        } catch (error) {
            const { response } = error
            console.log(response)
        }
    },
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