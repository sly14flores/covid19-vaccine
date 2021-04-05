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

const GET_VACCINATIONS = `${api_url}/api/doh/vaccines/:id`
const getVaccinations = (payload) => {
    const { id } = payload
    const url =  route(GET_VACCINATIONS, { id })
    return axios.get(url)
}

const GET_USERS = `${api_url}/api/general/selections/users`
const getUsers = () => {
    return axios.get(GET_USERS)
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

const CREATE_VACCINATION = `${api_url}/api/doh/vaccine`
const createVaccination = (payload) => {
    return axios.post(CREATE_VACCINATION, payload)
}

const UPDATE_VACCINATION = `${api_url}/api/doh/vaccine/:id`
const updateVaccination = (payload) => {
    const { id } = payload
    const url =  route(UPDATE_VACCINATION, { id })
    return axios.put(url, payload)
}

const DELETE_VACCINATION = `${api_url}/api/doh/vaccine/:id`
const deleteVaccination = (payload) => {
    const { id } = payload
    const url =  route(DELETE_VACCINATION, { id })
    return axios.delete(url)
}

const GET_VACCINATION = `${api_url}/api/doh/vaccine/:id`
const getVaccination = (payload) => {
    const { id } = payload
    const url =  route(GET_VACCINATION, { id })
    return axios.get(url)
}

const GET_PRE = `${api_url}/api/doh/pre/:id`
const getPre = (payload) => {
    const { id } = payload
    const url =  route(GET_PRE, { id })
    return axios.get(url)
}

const UPDATE_PRE = `${api_url}/api/doh/pre/:id`
const updatePre = (payload) => {
    const { id, pre } = payload
    const url =  route(UPDATE_PRE, { id })
    console.log(url)
    return axios.put(url, pre)
}

const GET_POST = `${api_url}/api/doh/post/:id`
const getPost = (payload) => {
    const { id } = payload
    const url =  route(GET_POST, { id })
    return axios.get(url)
}

const UPDATE_POST = `${api_url}/api/doh/post/:id`
const updatePost = (payload) => {
    const { id, post } = payload
    const url =  route(UPDATE_POST, { id })
    console.log(url)
    return axios.put(url, post)
}

const SELECTION_REASONS = `${api_url}/api/doh/selections/vaccine/refusals`
const getReasons = () => {
    return axios.get(SELECTION_REASONS)
}

const vaccination = {
    id: 0,
    qr_pass_id: null,
    vaccination_facility: null,
    facility_others: null,
    vaccination_session: null
}

const dosage = {
    id: 0,
    vaccine_id: null,
    user_id: null,
    qr_pass_id: null,
    brand_name: null,
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
    diluent_lot_number: null
}

const vaccinations = []
const pagination = {}

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

const users = [];

const default_id = {}

const reason_value = [];

const assessments = [];
const pre = {
    assessments,
    consent: false,
    reason: ""
}

const post_assessments = [];

const post = {
    post_assessments
}

const doses = [
    {id: 1, name: 'First'},
    {id: 2, name: 'Second'},
    {id: 3, name: 'Third'}
]

const manufactures = [
    {id: 1, name: 'Pfizer'},
    {id: 2, name: 'Astrazeneca'},
    {id: 3, name: 'Sinovac'}
]

const state = () => {
    return {
        fetched: false,
        saving: false,
        selections,
        sessions,
        dosage,
        vaccine,
        vaccination,
        vaccinations,
        pagination,
        pre,
        post,
        default_id,
        reason_value,
        users,
        doses,
        manufactures
    }
}

const mutations = {
    INIT(state) {
        state.pre = pre
        state.post = post
        state.vaccine = vaccine
        state.vaccination = vaccination
        state.vaccinations = vaccinations
    },
    SELECTIONS(state, payload) {
        state.selections = {...payload}
    },
    SESSIONS(state, payload) {
        state.sessions = [...payload]
    },
    RESET_VACCINE(state) {
        state.vaccination = vaccination
    },
    VACCINATION(state,payload) {
        state.vaccination = payload
    },
    VACCINATIONS(state, payload) {
        state.vaccinations = payload
    },
    DEFAULT_ID(state, payload) {
        state.default_id = {...payload}
    },
    USERS(state, payload) {
        state.users = [...payload]
    },
    REASONS(state, payload) {
        state.reason_value = [...payload]
    },
    PRE(state, payload) {
        state.pre = {...payload}
    },
    POST(state, payload) {
        state.post = {...payload}
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
    },
    SAVING(state, payload) {
        state.saving = payload
    },
    TOGGLE_WRITE(state,payload) {
        state.writeOn = payload
    }
}

const actions = {
    INIT({commit}) {
        commit('INIT')
    },
    TOGGLE_WRITE({commit}, payload) {
        commit('TOGGLE_WRITE', payload)
    },
    async GET_SELECTIONS({dispatch}) {
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
        Swal.close()
        // console.log(payload)
    },
    GET_SELECTIONS_ERROR({commit}, payload) {
        // console.log(payload)
    },
    async GET_SELECTION_SESSIONS({commit}) {
        try {
            const { data: { data } } = await getSelectionSessions()
            commit('SESSIONS', data)
        } catch (error) {
            const { response } = error
            console.log(response)
        }
    },

    async GET_USERS({dispatch}) {
        try {
            const { data: { data } } = await getUsers()
            dispatch('GET_USERS_SUCCESS', data)
        } catch (error) {
            const { response } = error
            dispatch('GET_USERS_ERROR', response)
        }
    },
    GET_USERS_SUCCESS({state,commit}, payload) {
        commit('USERS', payload)
        // console.log(payload)
    },
    GET_USERS_ERROR({commit}, payload) {
        // console.log(payload)
    },
    async GET_DEFAULT_ID({dispatch}) {
        try {
            const { data: { data } } = await getDefaultId()
            dispatch('GET_DEFAULT_ID_SUCCESS', data)
        } catch (error) {
            const { response } = error
            dispatch('GET_DEFAULT_ID_ERROR', response)
        }
    },
    GET_DEFAULT_ID_SUCCESS({commit}, payload) {
        commit('DEFAULT_ID', payload)
        // console.log(state)
    },
    GET_DEFAULT_ID_ERROR({commit}, payload) {
        // console.log(payload)
    },
    async GET_REASONS({dispatch}) {
        try {
            const { data: { data } } = await getReasons()
            dispatch('GET_REASONS_SUCCESS', data)
        } catch (error) {
            const { response } = error
            dispatch('GET_REASONS_ERROR', response)
        }
    },
    GET_REASONS_SUCCESS({commit}, payload) {
        commit('REASONS', payload)
        // console.log(payload)
    },
    GET_REASONS_ERROR({commit}, payload) {
        // console.log(payload)
    },
    async GET_PRE({dispatch, commit},payload) {
        const { id } = payload
        try {
            const { data: { data } } = await getPre({ id })
            dispatch('GET_PRE_SUCCESS', data)
        } catch (error) {
            const { response } = error
            dispatch('GET_PRE_ERROR', response)
        }
    },
    GET_PRE_SUCCESS({commit},payload) {
        commit('PRE', payload)
        console.log(payload)
    },
    GET_PRE_ERROR({commit},payload) {
        console.log(payload)
    },
    async GET_POST({dispatch, commit},payload) {
        const { id } = payload
        try {
            const { data: { data } } = await getPost({ id })
            dispatch('GET_POST_SUCCESS', data)
        } catch (error) {
            const { response } = error
            dispatch('GET_POST_ERROR', response)
        }
    },
    GET_POST_SUCCESS({commit},payload) {
        commit('POST', payload)
        console.log(payload)
    },
    GET_POST_ERROR({commit},payload) {
        //console.log(payload)
    },
    async UPDATE_POST({state,dispatch}, payload) {
        try {
            const { data: { data } } = await updatePost({id: state.vaccine.qr_pass_id, post: payload})
            dispatch('UPDATE_POST_SUCCESS', data)
            return true
        } catch (error) {
            const { response } = error
            dispatch('UPDATE_POST_ERROR', response)
            return false
        }
    },
    UPDATE_POST_SUCCESS({}, payload) {
        console.log(payload)
        Swal.fire({
            title: '<p class="text-success" style="font-size: 25px;">Successfully saved!</p>',
            icon: 'success',
            showConfirmButton: false,
            timer: 1500,
            allowOutsideClick: false,
            allowEscapeKey: false,
            allowEnterKey: false,
        })
    },
    UPDATE_POST_ERROR({commit}, error) {
        const { response } = error || {}
        const { message, status } = response || {}

        if (message) {
            console.log(message)
        }
    },
    async UPDATE_PRE({state,dispatch}, payload) {
        try {
            const { data: { data } } = await updatePre({id: state.vaccine.qr_pass_id, pre: payload})
            dispatch('UPDATE_PRE_SUCCESS', data)
            return true
        } catch (error) {
            const { response } = error
            dispatch('UPDATE_PRE_ERROR', response)
            return false
        }
    },
    UPDATE_PRE_SUCCESS({}, payload) {
        console.log(payload)
        Swal.fire({
            title: '<p class="text-success" style="font-size: 25px;">Successfully saved!</p>',
            icon: 'success',
            showConfirmButton: false,
            timer: 1500,
            allowOutsideClick: false,
            allowEscapeKey: false,
            allowEnterKey: false,
        })
    },
    UPDATE_PRE_ERROR({commit}, error) {
        const { response } = error || {}
        const { message, status } = response || {}

        if (message) {
            console.log(message)
        }
    },
    async GET_BY_QR({dispatch, commit},payload) {
        commit('FETCH', false)
        const { id } = payload
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
        try {
            const { data: { data } } = await getByQr({ id })
            dispatch('GET_BY_QR_SUCCESS',{id, data})
        } catch (error) {
            const { response } = error
            dispatch('GET_BY_QR_ERROR',response)
        }
    },
    GET_BY_QR_SUCCESS({dispatch,commit},payload) {
        const { id, data } = payload
        dispatch('GET_VACCINATIONS', {id})
        commit('NAPANAM', data)
        commit('FETCH', true)
        commit('TOGGLE_WRITE', true)
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
    async GET_VACCINATIONS({dispatch}, payload) {
        try {
            const { id } = payload
            const { data: { data } } = await getVaccinations({ id })
            dispatch('GET_VACCINATIONS_SUCCESS', data)
        } catch (error) {
            const { response } = error
            dispatch('GET_VACCINATIONS_ERROR', response)
        }
    },
    GET_VACCINATIONS_SUCCESS({commit}, payload) {
        commit('VACCINATIONS',payload)
    },
    GET_VACCINATIONS_ERROR({commit}, payload) {
        console.log(payload)
    },
    async CREATE_VACCINATION({state, commit, dispatch}, payload) {
        commit('SAVING',true)        
        try {
            const { data: { data } } = await createVaccination({qr_pass_id: state.vaccine.qr_pass_id, ...payload})
            dispatch('CREATE_VACCINATION_SUCCESS', data)
            return true
        } catch(error) {
            dispatch('CREATE_VACCINATION_ERROR', error)
            return false
        }
    },
    CREATE_VACCINATION_SUCCESS({state,commit,dispatch}, payload) {
        dispatch('GET_VACCINATIONS', { id: state.vaccine.qr_pass_id })
        commit('SAVING',false)
        Swal.fire({
            title: '<p class="text-success" style="font-size: 25px;">Successfully saved!</p>',
            icon: 'success',
            showConfirmButton: false,
            timer: 1500,
            allowOutsideClick: false,
            allowEscapeKey: false,
            allowEnterKey: false,
        })

    },
    CREATE_VACCINATION_ERROR({commit}, error) {
        const { response } = error || {}
        const { message, status } = response || {}
        commit('SAVING',false)
        if (message) {
            console.log(message)
        }
    },
    async UPDATE_VACCINATION({commit,dispatch}, payload) {
        
        commit('SAVING',true)
        commit('TOGGLE_WRITE', true)
        try {
            const { data: { data } } = await updateVaccination(payload)
            dispatch('UPDATE_VACCINATION_SUCCESS', data)
            return true
        } catch (error) {
            const { response } = error
            dispatch('UPDATE_VACCINATION_ERROR', response)
            return false
        }
    },
    UPDATE_VACCINATION_SUCCESS({state,commit,dispatch}, payload) {
        dispatch('GET_VACCINATIONS', {id: state.vaccine.qr_pass_id})
        commit('SAVING',false)
        commit('TOGGLE_WRITE', false)
        Swal.fire({
            title: '<p class="text-success" style="font-size: 25px;">Successfully updated!</p>',
            icon: 'success',
            showConfirmButton: false,
            timer: 1500,
            allowOutsideClick: false,
            allowEscapeKey: false,
            allowEnterKey: false,
        })
    },
    UPDATE_VACCINATION_ERROR({commit}, error) {
        const { response } = error || {}
        const { message, status } = response || {}
        commit('SAVING',false) 
        if (message) {
            console.log(message)
        }
    },
    async DELETE_VACCINATION({state,dispatch}, payload) {
        const { id } = payload
        try {
            const { data: { data } } = await deleteVaccination({id})
            dispatch('DELETE_VACCINATION_SUCCESS', data)
            dispatch('GET_VACCINATIONS', { id: state.vaccine.qr_pass_id })
        } catch (error) {
            const { response } = error
            dispatch('DELETE_VACCINATION_ERROR', response)
        }
    },
    DELETE_VACCINATION_SUCCESS({}, payload) {
        Swal.fire({
            title: '<p class="text-success" style="font-size: 25px;">Successfully deleted!</p>',
            icon: 'success',
            showConfirmButton: false,
            timer: 1500,
        })
    },
    DELETE_VACCINATION_ERROR({commit}, error) {
        const { response } = error || {}
        const { message, status } = response || {}
        commit('SAVING',false) 
        if (message) {
            console.log(message)
        }
    },
    async GET_VACCINATION({dispatch}, payload) {
        const { id } = payload
        try {
            const { data: { data } } = await getVaccination({id})
            dispatch('GET_VACCINATION_SUCCESS', data)
        } catch (error) {
            const { response } = error
            dispatch('GET_VACCINATION_ERROR', response)
        }
    },
    GET_VACCINATION_SUCCESS({commit}, payload) {
        commit('VACCINATION', payload)
    },
    GET_VACCINATION_ERROR({commit}, error) {
        const { response } = error || {}
        const { message, status } = response || {}
        commit('SAVING',false) 
        if (message) {
            console.log(message)
        }
    },
    RESET_VACCINE({commit}) {
        commit('RESET_VACCINE')
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