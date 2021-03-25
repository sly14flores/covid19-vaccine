import axios from 'axios'
import route from '../library/route'

import Swal from 'sweetalert2'

import { api_url } from '../url.js'

const SELECTIONS_ROUTE = `${api_url}/api/doh/selections`
const getSelections = () => {
    return axios.get(SELECTIONS_ROUTE)
}

const CREATE_ROUTE = `${api_url}/api/doh/registration`
const createRegistration = (payload) => {
  return axios.post(CREATE_ROUTE, payload)
}

const UPDATE_REGISTRATION = `${api_url}/api/doh/registration/:id`
const updateRegistration = (payload) => {
    const { id } = payload
    const url =  route(UPDATE_REGISTRATION, { id })
    return axios.put(url, payload)
}

const GET_NAPANAM_ROUTE = `${api_url}/api/napanam/check/registration/:id/:birthdate`
const getNapanam = (payload) => {
    const { id, birthdate } = payload
    const url =  route(GET_NAPANAM_ROUTE, { id, birthdate })
    return axios.get(url)    
}

const GET_NAPANAM_ID = `${api_url}/api/napanam/check/registrationID/:id`
const getNapanamID = (payload) => {
    const { id } = payload
    const url =  route(GET_NAPANAM_ID, { id })
    return axios.get(url)    
}

const GET_REGISTRATIONS = `${api_url}/api/doh/registrations`
const getRegistrations = (payload) => {
    const { page } = payload
    const pageNo = page + 1
    return axios.get(GET_REGISTRATIONS, {params: { page: pageNo } })
}

const GET_REGISTRATION = `${api_url}/api/doh/registration/:id`
const getRegistration = (payload) => {
    const { id } = payload
    const url =  route(GET_REGISTRATION, { id })
    return axios.get(url)
}

const CREATE_REGISTRATION = `${api_url}/api/doh/registration`
const storeRegistration = (payload) => {
    return axios.post(CREATE_REGISTRATION, payload)
}

const DELETE_REGISTRATION = `${api_url}/api/doh/registration/:id`
const deleteRegistration = (payload) => {
    const { id } = payload
    const url =  route(DELETE_REGISTRATION, { id })
    return axios.delete(url)
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
    drug_allergy: false,
    food_allergy: false,
    insect_allergy: false,
    latex_allergy: false,
    mold_allergy: false,
    pet_allergy: false,
    pollen_allergy: false,

    // Comorbidities
    with_comorbidity: null,
    hypertension: false,
    heart_disease: false,
    kidney_disease: false,
    diabetes_mellitus: false,
    bronchial_asthma: false,
    immuno_deficiency_status: false,
    cancer: false,
    comorbidity_others: false,
    
    diagnosed: null,
    covid_classification: null,
    diagnosed_date: null,

    consent_vaccination: null
}

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

const registrations = []
const pagination = {}

const state = () => {
    return {
        fetched: false,
        saving: false,
        registration,
        registrations,
        selections,
        pagination
    }
}

const mutations = {
    INIT(state) {
        state.registration = registration
        state.registrations = registrations
    },
    SELECTIONS(state, payload) {
        state.selections = {...payload}
    },
    NAPANAM(state, payload) {
        state.registration.qr_pass_id = String(payload.id)
        state.registration.first_name = payload.firstname
        state.registration.middle_name = payload.middlename
        state.registration.last_name = payload.lastname
        state.registration.birthdate = payload.dob
        state.registration.gender = payload.gender
        state.registration.contact_no = payload.contact_no
        state.registration.province = payload.provinceDesc
        state.registration.town_city = payload.cityMunDesc
        state.registration.barangay = payload.barangayDesc
        state.registration.address = payload.address // street
    },
    REGISTRATION(state, payload) {
        state.registration = payload
    },
    REGISTRATIONS(state, payload) {
        state.registrations = payload
    },
    PAGINATION(state, payload) {
        state.pagination = {...payload}
    },
    FETCH(state, payload) {
        state.fetched = payload
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
    async CREATE_REGISTRATION({commit, dispatch}, payload) {
        commit('SAVING',true)
        try {
            payload.drug_allergy = (payload.drug_allergy)?"01_Yes":"02_No"
            payload.food_allergy = (payload.food_allergy)?"01_Yes":"02_No"
            payload.insect_allergy = (payload.insect_allergy)?"01_Yes":"02_No"
            payload.latex_allergy = (payload.latex_allergy)?"01_Yes":"02_No"
            payload.mold_allergy = (payload.mold_allergy)?"01_Yes":"02_No"
            payload.pet_allergy = (payload.pet_allergy)?"01_Yes":"02_No"
            payload.pollen_allergy = (payload.pollen_allergy)?"01_Yes":"02_No"

            payload.hypertension = (payload.hypertension)?"01_Yes":"02_No"
            payload.heart_disease = (payload.heart_disease)?"01_Yes":"02_No"
            payload.kidney_disease = (payload.kidney_disease)?"01_Yes":"02_No"
            payload.diabetes_mellitus = (payload.diabetes_mellitus)?"01_Yes":"02_No"
            payload.bronchial_asthma = (payload.bronchial_asthma)?"01_Yes":"02_No"
            payload.immuno_deficiency_status = (payload.immuno_deficiency_status)?"01_Yes":"02_No"
            payload.cancer = (payload.cancer)?"01_Yes":"02_No"
            payload.comorbidity_others = (payload.comorbidity_others)?"01_Yes":"02_No"

            const { data: { data } } = await storeRegistration(payload)
            dispatch('CREATE_REGISTRATION_SUCCESS', data)
            return true
        } catch(error) {
            const { response } = error
            dispatch('CREATE_REGISTRATION_ERROR', response)
            return false
        }
    },
    CREATE_REGISTRATION_SUCCESS({commit}, payload) {
        commit('SAVING',false)        
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
    CREATE_REGISTRATION_ERROR({commit}, payload) {
        commit('SAVING',false)
        console.log(payload)

        // if Not found
        if(payload.status==500){
            Swal.fire({
                // title: '<p>Error</p>',
                icon: 'error',
                html: '<h5 style="font-size: 18px;">The Napanam ID No. you entered is already registered</h5>',
                showCancelButton: false,
                focusConfirm: true,
                confirmButtonText: 'Ok',
            }).then((result) => {
                if (result.value) {
                // Close
                }
            })	
        }
    },
    async GET_REGISTRATIONS({dispatch}, payload) {
        Swal.fire({
            title: 'Loading...',

            onBeforeOpen () {
              Swal.showLoading ()
            },
            onAfterClose () {
              Swal.hideLoading()
            },
            showConfirmButton: false,
            allowOutsideClick: false,
            allowEscapeKey: false,
            allowEnterKey: false
        })
        try {
            const { page } = payload
            const { data: { data: { data, pagination } } } = await getRegistrations({ page })
            dispatch('GET_REGISTRATIONS_SUCCESS', { data, pagination })
        } catch (error) {
            const { response } = error
            dispatch('GET_REGISTRATIONS_ERROR', response)
        }
    },
    GET_REGISTRATIONS_SUCCESS({commit}, payload) {
        const { data, pagination } = payload
        commit('REGISTRATIONS',data)
        commit('PAGINATION',pagination)
        Swal.close()
    },
    GET_REGISTRATIONS_ERROR({commit}, payload) {
        console.log(payload)
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
        console.log(payload)
    },
    GET_SELECTIONS_ERROR({commit}, payload) {
        console.log(payload)
    },
    async CREATE({commit, dispatch}, payload) {
        commit('SAVING', true)
        try {
            payload.drug_allergy = (payload.drug_allergy)?"01_Yes":"02_No"
            payload.food_allergy = (payload.food_allergy)?"01_Yes":"02_No"
            payload.insect_allergy = (payload.insect_allergy)?"01_Yes":"02_No"
            payload.latex_allergy = (payload.latex_allergy)?"01_Yes":"02_No"
            payload.mold_allergy = (payload.mold_allergy)?"01_Yes":"02_No"
            payload.pet_allergy = (payload.pet_allergy)?"01_Yes":"02_No"
            payload.pollen_allergy = (payload.pollen_allergy)?"01_Yes":"02_No"

            payload.hypertension = (payload.hypertension)?"01_Yes":"02_No"
            payload.heart_disease = (payload.heart_disease)?"01_Yes":"02_No"
            payload.kidney_disease = (payload.kidney_disease)?"01_Yes":"02_No"
            payload.diabetes_mellitus = (payload.diabetes_mellitus)?"01_Yes":"02_No"
            payload.bronchial_asthma = (payload.bronchial_asthma)?"01_Yes":"02_No"
            payload.immuno_deficiency_status = (payload.immuno_deficiency_status)?"01_Yes":"02_No"
            payload.cancer = (payload.cancer)?"01_Yes":"02_No"
            payload.comorbidity_others = (payload.comorbidity_others)?"01_Yes":"02_No"
           
            const { data: { data } } = await createRegistration(payload)
            dispatch('CREATE_SUCCESS', data)
            console.log(data)
        } catch(error) {
            const { response } = error
            dispatch('CREATE_ERROR', response)
        }
    },
    CREATE_SUCCESS({commit}, payload) {
        commit('SAVING', false)
        console.log(payload)

        Swal.fire({
            title: '<p class="text-success" style="font-size: 25px;">Registration completed successfully</p>',
            icon: 'success',
            html: 
              '<b style="font-size: 15px;">For inquiries, please contact us at: </b> <br>' +
              '<b class="text-danger" style="font-size: 15px;">Tel. No. (072) 242-5550 loc. 299</b>',
            showCancelButton: false,
            focusConfirm: false,
            confirmButtonText: 'Ok',
            confirmButtonColor: '#68bca4',
            cancelButtonText: 'Close',
            allowOutsideClick: false,
            allowEscapeKey: false,
            allowEnterKey: false,
        }).then((result) => {
        if (result.value) {
            
            window.location = api_url;
            
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            
            window.location = api_url;
            
        }
        })

    },
    CREATE_ERROR({commit}, payload) {
        commit('SAVING', false)
        console.log(payload)
    },
    async UPDATE_REGISTRATION({commit,dispatch}, payload) {
        commit('SAVING',true)
        commit('TOGGLE_WRITE', true)
        try {
            const { data: { data } } = await updateRegistration(payload)
            dispatch('UPDATE_REGISTRATION_SUCCESS', data)
            return true
        } catch (error) {
            const { response } = error
            dispatch('UPDATE_REGISTRATION_ERROR', response)
            return false
        }
    },
    UPDATE_REGISTRATION_SUCCESS({commit}, payload) {
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
    UPDATE_REGISTRATION_ERROR({commit}, payload) {
        commit('SAVING',false)
        commit('TOGGLE_WRITE', false)
        console.log(payload)
    },
    async GET_REGISTRATION({dispatch}, payload) {
        const { id } = payload
        try {
            const { data: { data } } = await getRegistration({id})
            dispatch('GET_REGISTRATION_SUCCESS', data)
        } catch (error) {
            const { response } = error
            dispatch('GET_REGISTRATION_ERROR', response)
        }
    },
    GET_REGISTRATION_SUCCESS({commit}, payload) {
        commit('REGISTRATION', payload)
    },
    GET_REGISTRATION_ERROR({commit}, payload) {
        console.log(payload)
    },
    async DELETE_REGISTRATION({dispatch}, payload) {
        const { id } = payload
        try {
            const { data: { data } } = await deleteRegistration({id})
            dispatch('DELETE_REGISTRATION_SUCCESS', data)
        } catch (error) {
            const { response } = error
            dispatch('DELETE_REGISTRATION_ERROR', response)
        }
    },
    DELETE_REGISTRATION_SUCCESS({commit, dispatch}, payload) {
        console.log(payload)
        dispatch('GET_REGISTRATIONS', { page: 0 })
        Swal.fire({
            title: '<p class="text-success" style="font-size: 25px;">Successfully deleted!</p>',
            icon: 'success',
            showConfirmButton: false,
            timer: 1500,
        })
    },
    DELETE_REGISTRATION_ERROR({commit}, payload) {
        console.log(payload)
    },
    async GET_NAPANAM_ID({dispatch, commit}, { id }) {
        commit('FETCH', false)
        try {
            const { data: { data } } = await getNapanamID({ id })
            dispatch('GET_NAPANAM_ID_SUCCESS', data)
        } catch (error) {
            const { response } = error
            dispatch('GET_NAPANAM_ID_ERROR', response)
        }
    },
    GET_NAPANAM_ID_SUCCESS({commit}, payload) {
        console.log(payload)
        commit('NAPANAM', payload)
        commit('FETCH', true)
        // window.open('home#/registration','_self')
    },
    GET_NAPANAM_ID_ERROR({commit}, payload) {
        console.log(payload)
        commit('FETCH', false)

        // if Not found
        if(payload.status==404){
            Swal.fire({
                // title: '<p>Error</p>',
                icon: 'error',
                html: '<h5 style="font-size: 18px;">The Napanam ID No. you entered does not exist. Please try again.</h5>',
                showCancelButton: false,
                focusConfirm: true,
                confirmButtonText: 'Ok',
            }).then((result) => {
                if (result.value) {
                // Close
                }
            })	
        }

        // if Exist
        if(payload.status==406){
            Swal.fire({
                // title: "<p>Opss</p>",
                icon: 'warning',
                html: '<h5 style="font-size: 18px;">The Napanam ID No. you entered is already registered</h5>',
                showCancelButton: false,
                focusConfirm: false,
                confirmButtonColor: '#68bca4',
                confirmButtonText: 'Ok',
            }).then((result) => {
                if (result.value) {
    
                   // Close
    
                }
            })
        }
        
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
        
        // Not Found
        if(payload.status==404){
            Swal.fire({
                title: '<p>Error</p>',
                icon: 'error',
                html: '<h5 style="font-size: 18px;">The Napanam ID and Birthdate you entered did not match. Please try again.</h5>',
                showCancelButton: false,
                focusConfirm: true,
                confirmButtonText: 'Ok',
            }).then((result) => {
                if (result.value) {
                // Close
                }
            })	
        }
        
        // if Exist
        if(payload.status==406){
            Swal.fire({
                title: "<p>Error</p>",
                icon: 'error',
                html: '<h5 style="font-size: 18px;">The Napanam ID No. you have entered is already registered</h5>',
                showCancelButton: false,
                focusConfirm: false,
                confirmButtonColor: '#68bca4',
                confirmButtonText: 'Ok',
            }).then((result) => {
                if (result.value) {
    
                   // Close
    
                }
            })
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