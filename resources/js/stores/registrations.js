import route from '../library/route'

import { api_url } from '../url.js'

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

const state = () => {
    return {
        registration,
        civil_status_value,
    }
}

const mutations = {

}

const actions = {

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