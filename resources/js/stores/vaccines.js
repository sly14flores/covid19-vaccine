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

const vaccine = {}

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

const dosages = [
    {id: 1, name: 'First'},
    {id: 2, name: 'Second'},
    {id: 3, name: 'Third'}
]

const professions = [
    {id: 1, name: 'Doctor'},
    {id: 2, name: 'Nurse'},
    {id: 3, name: 'Midwife'},
    {id: 4, name: 'Pharmacies'}
]

const state = () => {
    return {
        fetched: false,
        saving: false,
        selections,
        vaccine,
        dosages,
        professions
    }
}

const mutations = {
    VACCINE(state,payload) {
        state.vaccine
    },
    SELECTIONS(state, payload) {
        state.selections = {...payload}
    },
    FETCH(state, payload) {
        state.fetched = payload
    },
    NAPANAM(state, payload) {
        state.vaccine.qr_pass_id = payload.qr_pass_id
        state.vaccine.first_name = payload.first_name
        state.vaccine.middle_name = payload.middle_name
        state.vaccine.last_name = payload.last_name
        state.vaccine.birthdate = payload.birthdate
        state.vaccine.suffix = payload.suffix
        state.vaccine.gender = payload.gender
        state.vaccine.civil_status = payload.civil_status
        state.vaccine.contact_no = payload.contact_no
        state.vaccine.region = payload.region
        state.vaccine.province = payload.province
        state.vaccine.town_city = payload.town_city
        state.vaccine.barangay = payload.barangay
        state.vaccine.address = payload.address // street
        state.vaccine.category = payload.category
        state.vaccine.category_id = payload.category_id
        state.vaccine.category_id_no = payload.category_id_no
        state.vaccine.profession = payload.profession
        state.vaccine.philhealth = payload.philhealth
        state.vaccine.pwd_id = payload.pwd_id
        state.vaccine.employment_status = payload.employment_status
        state.vaccine.employer_name = payload.employer_name
        state.vaccine.employer_municipality = payload.employer_municipality
        state.vaccine.employer_address = payload.employer_address
        state.vaccine.employer_contact_no = payload.employer_contact_no
    },
    SAVING(state, payload) {
        state.saving = payload
    },
    TOGGLE_WRITE(state,payload) {
        state.writeOn = payload
    }
}

const actions = {
    TOGGLE_WRITE({commit}, payload) {
        commit('TOGGLE_WRITE', payload)
    },
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
        // console.log(payload)
    },
    GET_SELECTIONS_ERROR({commit}, payload) {
        // console.log(payload)
    },
    async GET_BY_QR({dispatch, commit},payload) {
        commit('FETCH', false)
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
        // console.log(payload)
        // commit('VACCINE',payload)
        commit('NAPANAM', payload)
        commit('FETCH', true)
        commit('TOGGLE_WRITE', true)
    },
    GET_BY_QR_ERROR({commit},payload) {
        commit('FETCH', false)
        commit('TOGGLE_WRITE', false)
        // const { data: { message } } = payload
        Swal.fire({
            text: 'The Napanam ID No. you entered does not exist. Please register first to proceed.',
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