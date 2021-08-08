import axios from 'axios'
import route from '../library/route'

import Swal from 'sweetalert2'

import { api_url } from '../url.js'

const SELECTIONS_ROUTE = `${api_url}/api/doh/selections`
const getSelections = () => {
    return axios.get(SELECTIONS_ROUTE)
}

const SELECTION_ADDRESSES = `${api_url}/api/doh/selections/addresses`
const getAddresses = () => {
    return axios.get(SELECTION_ADDRESSES)
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
    const { page, start_date, end_date, town_city, search, origin } = payload
    const pageNo = page + 1
    return axios.get(GET_REGISTRATIONS, {params: { page: pageNo, town_city, start_date, end_date, search, origin } })
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
    id: 0,
    qr_pass_id : null,
    first_name: null,
    middle_name: null,
    last_name: null,
    suffix: null,
    birthdate: null,
    gender: null,
    address: null,
    region: "Ilocos",
    province: null,
    town_city: null,
    barangay: null,
    indigenous_member: null,
    contact_no: null,
    category: null,
    category_id: null,
    category_id_no: null,
    philhealth: null,
    pwd_id: null,
    priority_group: null,
    sub_priority_group: null,
    occupation: null,
    with_allergy: null,
    with_comorbidity: null,
    is_registered: null,
    origin: null,
    employer_name: null,
    employer_address: "_0133_LA_UNION",
    employer_lgu: null
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
const addresses = [];
const priority_group_value = [];
const indigenous_value = [];
const contact_value = [];

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
    addresses,
    priority_group_value,
    indigenous_value,
    contact_value
};

const registrations = []
const pagination = {}

const state = () => {
    return {
        fetched: false,
        saving: "",
        registration,
        registrations,
        selections,
        pagination,
        contact_lgu: ""
    }
}

const mutations = {
    INIT(state) {
        state.registration = registration
        state.registrations = registrations
    },
    INIT_REGISTRATION(state) {
        state.registration = registration
    },
    SELECTIONS(state, payload) {
        state.selections = {...payload}
    },
    ADDRESSES(state, payload) {
        state.addresses = {...payload}
    },
    NAPANAM(state, payload) {
        state.registration.qr_pass_id = String(payload.id)
        state.registration.first_name = payload.firstname
        state.registration.middle_name = payload.middlename
        state.registration.last_name = payload.lastname
        state.registration.birthdate = payload.dob
        state.registration.gender = payload.gender
        state.registration.contact_no = payload.contact_no
        state.registration.province = payload.province
        state.registration.town_city = payload.cityMun
        state.registration.barangay = payload.barangay
        state.registration.address = payload.address
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
    },
    LOADING(){
        Swal.fire({
            title: 'Please wait...',
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
    INIT_REGISTRATION({commit}) {
        commit('INIT_REGISTRATION')
    },
    TOGGLE_WRITE({commit}, payload) {
        commit('TOGGLE_WRITE', payload)
    },
    async CREATE_REGISTRATION({commit, dispatch}, payload) {
        commit('SAVING',true)
        try {
            payload.origin = "Manual"
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
    },
    CREATE_REGISTRATION_ERROR({commit}, payload) {
        commit('SAVING',false)
        // console.log(payload)

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
    async GET_REGISTRATIONS({dispatch, commit}, payload) {
        commit('LOADING')
        try {
            const { page, town_city, start_date, end_date, search, origin } = payload
            const { data: { data: { data, pagination } } } = await getRegistrations({ page, town_city, start_date, end_date, search, origin })
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
        // console.log(payload)
    },
    async GET_SELECTIONS({dispatch}) {
        Swal.fire({
            title: 'Please wait...',
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
        Swal.close();
        // console.log(payload)
    },
    GET_SELECTIONS_ERROR({commit}, payload) {
        // console.log(payload)
        if(payload.status==500){
            Swal.fire({
                title: '<p>Oops...</p>',
                icon: 'error',
                html: '<h5 style="font-size: 18px;">Check your internet connection and try again</h5>',
                showCancelButton: false,
                focusConfirm: true,
                allowOutsideClick: false,
                allowEscapeKey: false,
                allowEnterKey: false,
                confirmButtonText: 'Refresh this page',
            }).then((result) => {
                if (result.value) {
                    location.reload();
                }
            })	
        }
    },
    async GET_ADDRESSES({dispatch}) {
        Swal.fire({
            title: 'Please wait...',
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
            const { data: { data } } = await getAddresses()
            dispatch('GET_ADDRESSES_SUCCESS', data)
        } catch (error) {
            const { response } = error
            dispatch('GET_ADDRESSES_ERROR', response)
        }
    },
    GET_ADDRESSES_SUCCESS({commit}, payload) {
        commit('SELECTION_ADDRESSES', payload)
        // console.log(payload)
        Swal.close();
    },
    GET_ADDRESSES_ERROR({commit}, payload) {
        // console.log(payload)
    },
    async CREATE({commit, dispatch,state}, payload) {
        commit('SAVING', 'pi pi-spin pi-spinner')
        
        try {

            payload.origin = "Online"

            console.log(payload)

            state.selections.contact_value.map((contact,i) => {

                if(contact.id==payload.town_city){
                    state.contact_lgu = contact
                }
                
            })
            
            console.log(state.contact_lgu)

            const { data: { data } } = await createRegistration(payload)

            Swal.fire({
                position: 'top',
                title: '<p class="text-success" style="font-size: 23px;">Registration completed successfully</p>',
                icon: 'success',
                html: 
                    '<b style="font-size: 18px;">Agyamankami Kaprobinsiaan!</b> <br>' +
                    '<b style="font-size: 13px;"><i> For inquiries, please contact the following COVID-19 Vaccination Hotlines:</i> </b> <br>' +
                    '<div class="p-fluid p-formgrid p-grid"> <div class="p-field p-col-12 p-md-6"> <hr><b>'+state.contact_lgu.name+''+'</b> <hr>'+state.contact_lgu.contact.number+''+'</div> <div class="p-field p-col-12 p-md-6"> <hr><b>PROVINCIAL HOTLINES</b> <hr> <b>Mobile No.</b><br> 0998 961 1519 <br><b>Tel. No.</b> <br> (072) 607-2633 <br> (072) 607-8723 <br> (072) 242-5550 <br> Local 299 & 258</div></div>',
                    // '<b style="font-size: 13px;">'+state.contact_lgu.contact.number+''+'</b>',
                    // '<b class="text-danger" style="font-size: 15px;"><i>Tel. No. (072) 242-5550 loc. 299</i></b>',
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

        } catch(error) {
            const { response } = error
            dispatch('CREATE_ERROR', response)
        }
    },

    CREATE_ERROR({commit}, payload) {
        commit('SAVING', '')
        // console.log(payload)
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
    },
    UPDATE_REGISTRATION_ERROR({commit}, payload) {
        commit('SAVING',false)
        commit('TOGGLE_WRITE', false)
        // console.log(payload)
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
        // console.log(payload)
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
        // console.log(payload)
        dispatch('GET_REGISTRATIONS', { page: 0 })
        Swal.fire({
            title: '<p class="text-success" style="font-size: 25px;">Successfully deleted!</p>',
            icon: 'success',
            showConfirmButton: false,
            timer: 1500,
        })
    },
    DELETE_REGISTRATION_ERROR({commit}, payload) {
        // console.log(payload)
    },
    async GET_NAPANAM_ID({dispatch, commit}, { id }) {
        commit('LOADING')
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
        // console.log(payload)
        commit('NAPANAM', payload)
        commit('FETCH', true)
        Swal.close();
        // window.open('home#/registration','_self')
    },
    GET_NAPANAM_ID_ERROR({commit}, payload) {
        // console.log(payload)
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
        // console.log(payload)
        commit('NAPANAM', payload)
        commit('FETCH', true)
    },
    GET_NAPANAM_ERROR({commit}, payload) {
        // console.log(payload)
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
                // title: "<p>Error</p>",
                icon: 'warning',
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