import axios from 'axios'
import route from '../library/route'

import Swal from 'sweetalert2'

import { api_url } from '../url.js'

const SELECTIONS_ROUTE = `${api_url}/api/doh/selections`
const getSelections = () => {
    return axios.get(SELECTIONS_ROUTE)
}

const SELECTION_SESSIONS = `${api_url}/api/doh/selections/vaccination/sessions`
const getSelectionSessions = () => {
    return axios.get(SELECTION_SESSIONS)
}

const SELECTION_BRANDS = `${api_url}/api/doh/selections/brands`
const getSelectionBrands = () => {
    return axios.get(SELECTION_BRANDS)
}

const SELECTION_REASONS = `${api_url}/api/doh/selections/vaccine/refusals`
const getSelectionReasons = () => {
    return axios.get(SELECTION_REASONS)
}

const SELECTION_DEFERRALS = `${api_url}/api/doh/selections/vaccine/deferrals`
const getSelectionDeferrals = () => {
    return axios.get(SELECTION_DEFERRALS)
}

const GET_VACCINATORS = `${api_url}/api/general/selections/vaccinators`
const getVaccinators = () => {
    return axios.get(GET_VACCINATORS)
}

const GET_PRES = `${api_url}/api/doh/structure/assessments/pre`
const getPres = () => {
    return axios.get(GET_PRES)
}

const GET_POST = `${api_url}/api/doh/structure/assessments/post`
const getPost = () => {
    return axios.get(GET_POST)
}

const GET_DEFAULT_ID = `${api_url}/api/doh/vaccines/default/vaccinator`
const getDefaultId = () => {
    return axios.get(GET_DEFAULT_ID)
}

const GET_BY_QR = `${api_url}/api/doh/vaccines/qr/:id`
const getByQr = (payload) => {
    const { id } = payload
    const url =  route(GET_BY_QR, { id })
    return axios.get(url)
}

const GET_VACCINATION = `${api_url}/api/doh/vaccine/:id`
const getVaccination = (payload) => {
    const { id } = payload
    const url =  route(GET_VACCINATION, { id })
    return axios.get(url)
}

const UPDATE_VACCINATION = `${api_url}/api/doh/vaccine/:id`
const updateVaccination = (payload) => {
    const { id, vaccination } = payload
    const url =  route(UPDATE_VACCINATION, { id })
    return axios.put(url, vaccination)
}

const vaccination = {
    id: 0,
    qr_pass_id: null,
    vaccination_session: null,
    dosages: []
}

const dosage = {
    id: 0,
    user_id: null,
    brand_name: null,
    qr_pass_id: null,
    vaccine_name: null,
    site_of_injection: null,
    expiry_date: null,
    batch_number: null,
    lot_number: null,
    dose: null,
    diluent: null,
    date_of_reconstitution: null,
    time_of_reconstitution: null,
    diluent_batch_number: null,
    diluent_lot_number: null,
    pre_assessment: {
        id: 0,
        qr_pass_id: null, //
        dose: null, //
        consent: false,
        reason: null,
        assessments: []        
    },
    post_assessment: {
        id: 0,
        qr_pass_id: null, //
        dose: null, //
        assessments: []
    }
}

const deferrals = [];
const pagination = {};

const vaccine = {};

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
const addresses = [];

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
    day_value,
    addresses
};

const sessions = [];
const brands = [];

const vaccinators = [];
const pres = [];
const post = [];
const reasons = [];

const default_id = {};

const sites = [
    {id: 'Left', name: 'Left'},
    {id: 'Right', name: 'Right'}
]

const doses = [
    {id: 1, name: 'First'},
    {id: 2, name: 'Second'},
    {id: 3, name: 'Third'}
]

const state = () => {
    return {
        displayDosage: false,
        fetched: false,
        saving: false,
        selections,
        sessions,
        brands,
        vaccine,
        vaccination,
        dosage,
        pagination,
        default_id,
        reasons,
        vaccinators,
        pres,
        post,
        deferrals,
        doses,
        sites
    }
}

const mutations = {
    INIT(state) {
        state.vaccine = vaccine
        state.vaccination = vaccination
        state.dosage = dosage
    },
    SELECTIONS(state, payload) {
        state.selections = {...payload}
    },
    SESSIONS(state, payload) {
        state.sessions = [...payload]
    },
    BRANDS(state, payload) {
        state.brands = [...payload]
    },
    DEFERRALS(state, payload) {
        state.deferrals = [...payload]
    },
    DOSAGE(state, payload) {
        state.dosage = payload
    },
    DOSAGES(state,payload) {
        state.vaccination.dosages = [...payload]
    },
    VACCINATION(state,payload) {
        state.vaccination = payload
    },
    RESET_DOSAGE(state) {
        state.dosage = dosage
    },
    DEFAULT_ID(state, payload) {
        state.default_id = {...payload}
    },
    VACCINATORS(state, payload) {
        state.vaccinators = [...payload]
    },
    PRES(state, payload) {
        state.pres = [...payload]
        state.dosage.pre_assessment.assessments = [...payload]
    },
    POST(state, payload) {
        state.post = [...payload]
        state.dosage.post_assessment.assessments = [...payload]        
    },
    REASONS(state, payload) {
        state.reasons = [...payload]
    },
    PAGINATION(state, payload) {
        state.pagination = {...payload}
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

        state.dosage.qr_pass_id = payload.qr_pass_id
        state.dosage.pre_assessment.qr_pass_id = payload.qr_pass_id
        state.dosage.post_assessment.qr_pass_id = payload.qr_pass_id

    },
    SAVING(state, payload) {
        state.saving = payload
    },
    TOGGLE_WRITE(state,payload) {
        state.writeOn = payload
    },
    ADD_DOSAGE(state,payload) {
        state.vaccination.dosages.push(payload)
    },
    TOGGLE_DOSAGE_FORM(state,payload) {
        state.displayDosage = payload
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
    INIT({commit}) {
        commit('INIT')
    },
    TOGGLE_WRITE({commit}, payload) {
        commit('TOGGLE_WRITE', payload)
    },
    async GET_BY_QR({dispatch, commit},payload) {
        commit('LOADING');
        commit('FETCH', false)
        const { id } = payload
        try {
            const { data: { data } } = await getByQr({ id })
            dispatch('GET_BY_QR_SUCCESS',{id, data})
        } catch (error) {
            const { response } = error
            dispatch('GET_BY_QR_ERROR',response)
        }
    },
    GET_BY_QR_SUCCESS({state,dispatch,commit},payload) {
        const { id, data } = payload
        commit('NAPANAM', data)
        commit('FETCH', true)
        commit('TOGGLE_WRITE', true)

        dispatch('GET_VACCINATION', { id })
        dispatch('GET_SELECTION_SESSIONS')
        
        Swal.close()
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
    },
    async GET_SELECTIONS({commit,dispatch}) {
        commit('LOADING');
        try {
            const { data: { data } } = await getSelections()
            commit('SELECTIONS', data)
            Swal.close()
        } catch (error) {
            const { response } = error
        }
    },
    async GET_SELECTION_SESSIONS({commit}) {
        try {
            const { data: { data } } = await getSelectionSessions()
            commit('SESSIONS', data)
        } catch (error) {
            const { response } = error
        }
    },
    async GET_SELECTION_BRANDS({commit}) {
        try {
            const { data: { data } } = await getSelectionBrands()
            commit('BRANDS', data)
        } catch (error) {
            const { response } = error
        }
    },
    async GET_SELECTION_DEFERRALS({commit}) {
        try {
            const { data: { data } } = await getSelectionDeferrals()
            commit('DEFERRALS', data)
        } catch (error) {
            const { response } = error
        }
    },
    async GET_VACCINATORS({commit}) {
        try {
            const { data: { data } } = await getVaccinators()
            commit('VACCINATORS', data)
        } catch (error) {
            const { response } = error
        }
    },
    async GET_PRES({commit}) {
        try {
            const { data: { data } } = await getPres()
            commit('PRES', data)
        } catch (error) {
            const { response } = error
        }
    },
    async GET_POST({commit}) {
        try {
            const { data: { data } } = await getPost()
            commit('POST', data)
        } catch (error) {
            const { response } = error
        }
    },
    async GET_DEFAULT_ID({commit}) {
        try {
            const { data: { data } } = await getDefaultId()
            commit('DEFAULT_ID', data)
        } catch (error) {
            const { response } = error
        }
    },
    async GET_REASONS({commit}) {
        try {
            const { data: { data } } = await getSelectionReasons()
            commit('REASONS', data)
        } catch (error) {
            const { response } = error
        }
    },
    async GET_VACCINATION({commit}, payload) {
        try {
            const { id } = payload
            const { data: { data } } = await getVaccination({ id })
            commit('VACCINATION',data)
        } catch (error) {
            const { response } = error
        }
    },
    async UPDATE_VACCINATION({commit,state}, payload) {
        try {
            const { data: { data } } = await updateVaccination({ id: state.vaccine.qr_pass_id, vaccination: payload })
            return true
        } catch (error) {
            const { response } = error
            return false
        }
    },
    RESET_DOSAGE({commit}) {
        commit('RESET_DOSAGE')
    },
    ADD_DOSAGE({state,commit},payload) {

        const d = payload.expiry_date
        const expiry_date = d.setDate(d.getDate() + 1);
        payload.expiry_date = new Date(expiry_date).toISOString().split('T')[0];
        payload.qr_pass_id = state.vaccine.qr_pass_id

        console.log(payload)

        commit('ADD_DOSAGE', payload)
    },
    TOGGLE_DOSAGE_FORM({commit},payload) {
        commit('TOGGLE_DOSAGE_FORM',payload)
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