import axios from 'axios'
import route from '../library/route'

import Swal from 'sweetalert2'

import { api_url } from '../url.js'

const SELECTIONS_ROUTE = `${api_url}/api/doh/selections`
const getSelections = () => {
    return axios.get(SELECTIONS_ROUTE)
}

const GET_BY_QR = `${api_url}/api/doh/vaccines/qr/:id`
const getByQr = (payload) => {
    const { id } = payload
    const url =  route(GET_BY_QR, { id })
    return axios.get(url)
}

const registration = {}

const suffix_value = [];
const gender_value = [];
const civil_status_value = [];
const category_value = [];
const category_id_value = [];
const employment_status_value = [];
const profession_value = [];
const allergy_value = [];
const comorbidity_value = [];
const covid_classification_value = [];
const region_value = [];
const employer_municipality_value = [];
const month_value = [];
const day_value = [];

const selections = {
    suffix_value,
    gender_value,
    civil_status_value,
    category_value,
    category_id_value,
    employment_status_value,
    profession_value,
    allergy_value,
    comorbidity_value,
    covid_classification_value,
    region_value,
    employer_municipality_value,
    month_value,
    day_value
};

const state = () => {
    return {
        fetched: false,
        saving: false,
        selections,
        registration
    }
}

const mutations = {
    REGISTRATION(state,payload) {
        state.registration
    },
    SELECTIONS(state, payload) {
        state.selections = {...payload}
    },
    FETCH(state, payload) {
        state.fetched = payload
    },
    NAPANAM(state, payload) {
        state.registration.qr_pass_id = payload.qr_pass_id
        state.registration.first_name = payload.first_name
        state.registration.middle_name = payload.middle_name
        state.registration.last_name = payload.last_name
        state.registration.birthdate = payload.birthdate
        state.registration.suffix = payload.suffix
        state.registration.gender = payload.gender
        state.registration.civil_status = payload.civil_status
        state.registration.contact_no = payload.contact_no
        state.registration.region = payload.region
        state.registration.province = payload.province
        state.registration.town_city = payload.town_city
        state.registration.barangay = payload.barangay
        state.registration.address = payload.address // street
        state.registration.category = payload.category
        state.registration.category_id = payload.category_id
        state.registration.category_id_no = payload.category_id_no
        state.registration.profession = payload.profession
        state.registration.philhealth = payload.philhealth
        state.registration.pwd_id = payload.pwd_id
        state.registration.employment_status = payload.employment_status
        state.registration.employer_name = payload.employer_name
        state.registration.employer_municipality = payload.employer_municipality
        state.registration.employer_address = payload.employer_address
        state.registration.employer_contact_no = payload.employer_contact_no
    },
    SAVING(state, payload) {
        state.saving = payload
    },
}

const actions = {
    async GET_SELECTIONS({dispatch}) {
        try {
            const { data: { data } } = await getSelections()
            dispatch('GET_SELECTIONS_SUCCESS', data)
        } catch (error) {
            const { response } = error
            dispatch('GET_SELECTIONS_ERROR', response)
        }
    },
    GET_SELECTIONS_SUCCESS({commit}, payload) {
        commit('SELECTIONS', payload)
        console.log(payload)
    },
    GET_SELECTIONS_ERROR({commit}, payload) {
        console.log(payload)
    },
    async GET_BY_QR({dispatch},payload) {
        const { id } = payload
        try {
            const { data: { data } } = await getByQr({ id })
            dispatch('GET_BY_QR_SUCCESS',data)
        } catch (error) {
            const { response } = error
            dispatch('GET_BY_QR_ERROR',response)
        }
    },
    GET_BY_QR_SUCCESS({commit},payload) {
        console.log(payload)
        // commit('REGISTRATION',payload)
        commit('NAPANAM', payload)
        commit('FETCH', true)
    },
    GET_BY_QR_ERROR({commit},payload) {
        commit('FETCH', false)
        const { data: { message } } = payload
        Swal.fire({
            text: message,
            icon: 'error',
            confirmButtonText: 'Ok'
        })
    }
}

const getters = {}

export default {
    namespaced: true,
    state,
    mutations,
    actions,
    getters,
}