import axios from 'axios';
import route from '../library/route'

import { api_url } from '../url.js'

const SELECTIONS_ROUTE = `${api_url}/api/doh/selections`

const registration = {
    id: 0,
    qr_pass_id : null,
    last_name: null,
    first_name: null,
    middle_name: null,
    suffix: null,
    birthdate: null,
    gender: null,
    province: null,
    town_city: null,
    barangay: null,
    civil_status: null,
}

const civil_status_value = [];
const category_value = [];
const category_id_value = [];
const employment_status_value = [];
const profession_value = [];
const allergy_value = [];
const comorbidity_value = [];
const covid_classification_value = [];
const employer_lgu_value = [];

const selections = {
    civil_status_value,
    category_value,
    category_id_value,
    employment_status_value,
    profession_value,
    allergy_value,
    comorbidity_value,
    covid_classification_value,
    employer_lgu_value
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

        }
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