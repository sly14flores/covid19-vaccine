import axios from 'axios'
import route from '../library/route'

import { api_url } from '../url.js'

const SELECTIONS_ROUTE = `${api_url}/api/doh/selections`
const getSelections = () => {
    return axios.get(SELECTIONS_ROUTE)
}

const CREATE_ROUTE = `${api_url}/api/doh/registration`
const creteRegistration = (payload) => {
    return axios.post(CREATE_ROUTE, payload)
}

const GET_NAPANAM_ROUTE = `${api_url}/api/napanam/check/registration/:id/:birthdate`
const getNapanam = (payload) => {
    const { id, birthdate } = payload
    const url =  route(GET_NAPANAM_ROUTE, { id, birthdate })
    return axios.get(url)    
}

const registration = {
    // Personal
    id: 0,
    qr_pass_id : null,
    first_name: null,
    middle_name: null,
    last_name: null,
    suffix: null,
    birthdate: null,
    gender: null,
    address: null, // street
    region: "Ilocos",
    province: null,
    town_city: null,
    barangay: null,
    contact_no: null,
    civil_status: null,

    // Employment Status
    category: null,
    category_id: null,
    category_id_no: null,
    employment_status: null,
    profession: null,
    philhealth: null,
    pwd_id: null,
    employer_name: null,
    employer_municipality: null,
    employer_address: null,
    employer_contact_no: null,

    // Health Status
    direct_interaction: null,
    pregnancy_status: null,

    // Allergies
    with_allergy: null,
    drug_allergy: "02_No",
    food_allergy: "02_No",
    insect_allergy: "02_No",
    latex_allergy: "02_No",
    mold_allergy: "02_No",
    pet_allergy: "02_No",
    pollen_allergy: "02_No",

    // Comorbidities
    with_comorbidity: null,
    hypertension: "02_No",
    heart_disease: "02_No",
    kidney_disease: "02_No",
    diabetes_mellitus: "02_No",
    bronchial_asthma: "02_No",
    immuno_deficiency_status: "02_No",
    cancer: "02_No",
    comorbidity_others: "02_No",
    
    diagnosed: null,
    covid_classification: null,
    diagnosed_date: null,

    consent_vaccination: null
}

const suffix_value = [];
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
        registration,
        selections,
    }
}

const mutations = {
    SELECTIONS(state, payload) {
        state.selections = {...payload}
    },
    NAPANAM(state, payload) {
        state.registration.qr_pass_id = payload.id
        state.registration.first_name = payload.firstname
        state.registration.middle_name = payload.middlename
        state.registration.last_name = payload.lastname
        state.registration.birth_date = payload.dob
        state.registration.gender = payload.gender
        state.registration.contact_no = payload.contact_no
        state.registration.province = payload.provinceDesc
        state.registration.town_city = payload.cityMunDesc
        state.registration.barangay = payload.barangayDesc
        state.registration.address = payload.address // street
    },
    FETCH(state, payload) {
        state.fetched = payload
    },
    SAVING(state, payload) {
        state.saving = payload
    }
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
    },
    GET_SELECTIONS_ERROR({commit}, payload) {
        console.log(payload)
    },
    async CREATE({commit, dispatch}, payload) {
        commit('SAVING', true)
        try {
            const { data: { data } } = await creteRegistration(payload)
            dispatch('CREATE_SUCCESS', data)
        } catch(error) {
            const { response } = error
            dispatch('CREATE_ERROR', response)
        }
    },
    CREATE_SUCCESS({commit}, payload) {
        commit('SAVING', false)
        console.log(payload)
    },
    CREATE_ERROR({commit}, payload) {
        commit('SAVING', false)
        console.log(payload)
    },
    async GET_NAPANAM({dispatch}, { id, birthdate }) {
        try {
            const { data: { data } } = await getNapanam({ id, birthdate })
            dispatch('GET_NAPANAM_SUCCESS', data)
        } catch (error) {
            const { response } = error
            dispatch('GET_NAPANAM_ERROR', response)
        }
    },
    GET_NAPANAM_SUCCESS({commit}, payload) {
        console.log(payload)
        commit('NAPANAM', payload)
        commit('FETCH', true)
        // window.open('home#/registration','_self')
    },
    GET_NAPANAM_ERROR({commit}, payload) {
        console.log(payload)
        commit('FETCH', false)        
    }
}

const getters = {

}

const registrationsStore = {
	namespaced: true,    
    state,
    mutations,
    actions,
    getters
}

export { registration, registrationsStore };