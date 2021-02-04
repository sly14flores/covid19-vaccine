import axios from 'axios'
import route from '../library/route'

import { api_url } from '../url.js'

const SELECTIONS_ROUTE = `${api_url}/api/doh/selections`
const CREATE_ROUTE = `${api_url}/api/doh/registration`

const registration = {
    id: 0,
    qr_pass_id : null,
    first_name: null,
    middle_name: null,
    last_name: null,
    suffix: null,
    birthdate: null,
    gender: null,
    address: null,
    barangay: null,
    town_city: null,
    province: null,
    contact_no: null,
    civil_status: null,
    category: null,
    category_id: null,
    category_id_no: null,
    employment_status: null,
    profession: null,
    philhealth: null,
    employer_name: null,
    employer_address: null,
    employer_lgu: null,
    employer_contact_no: null,
    pregnancy_status: null,
    with_allergy: null,
    allergy: null,
    with_allergy_others: null,
    with_comorbidity: null,
    comorbidity: null,
    with_comorbidity_others: null,
    diagnosed: null,
    covid_classification: null,
    diagnosed_date: null,
    consent_vaccination: null,
}

const civil_status_value = [];
const category_value = [];
const category_id_value = [];
const employment_status_value = [];
const profession_value = [];
const allergy_value = [];
const comorbidity_value = [];
const covid_classification_value = [];

const selections = {
    civil_status_value,
    category_value,
    category_id_value,
    employment_status_value,
    profession_value,
    allergy_value,
    comorbidity_value,
    covid_classification_value
};

const state = () => {
    return {
        registration,
        selections,
    }
}

const mutations = {
    SELECTIONS(state, payload) {
        state.selections = {...payload}
    }
}

const actions = {
    async GET_SELECTIONS({commit}) {
        try {
            const response = await axios.get(SELECTIONS_ROUTE)
            commit('SELECTIONS', response.data.data)
        } catch (error) {
            console.log(error)
        }
    },
    async CREATE({}, payload) {
        try {
            const create = await axios.post(CREATE_ROUTE, payload)
        } catch(error) {

        }
    },
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