import axios from 'axios'
import route from '../library/route'

import Swal from 'sweetalert2'

import { api_url } from '../url.js'

const GET_REGISTRATIONS = `${api_url}/api/reports/registrations`
const getRegistrations = (payload) => {
    const { page, search } = payload
    const pageNo = page + 1
    return axios.get(GET_REGISTRATIONS, {params: { page: pageNo, search } })
}

const GET_REGISTRATION = `${api_url}/api/reports/registration/:id`
const getRegistration = (payload) => {
    const { id } = payload
    const url =  route(GET_REGISTRATION, { id })
    return axios.get(url)
}

const registration = {}
const registrations = []
const pagination = {}
const first_dosage = {}
const second_dosage = {}
const first_facility = {}
const second_facility = {}

const first_dose = "1st Dose"
const second_dose = "2nd Dose"

const state = () => {
    return {
        registration,
        registrations,
        pagination,
        first_dosage,
        second_dosage,
        first_facility,
        second_facility,
        first_dose,
        second_dose
    }
}

const mutations = {
    INIT(state) {
        state.registration = registration
        state.registrations = registrations
    },
    REGISTRATION(state, payload) {
        state.registration = {...payload}

        state.first_dosage = {...payload.dosages[0]}
        state.first_facility = {...payload.dosages[0].user.user_hospital}
        
        state.second_dosage = {...payload.dosages[1]}
        state.second_facility = {...payload.dosages[1].user.user_hospital}
    },
    REGISTRATIONS(state, payload) {
        state.registrations = payload
    },
    PAGINATION(state, payload) {
        state.pagination = payload
    }
}

const actions = {
    INIT({commit}) {
        commit('INIT')
    },
    async GET_REGISTRATIONS({dispatch}, payload) {
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
        Swal.close();
    },
    GET_REGISTRATIONS_ERROR({commit}, payload) {
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
    async GET_REGISTRATION({dispatch,state}, payload) {
        const { id } = payload
        try {
            const { data: { data } } = await getRegistration({id})
            
            if(data.gender=='02_Male'){
                data.gender = 'Male'
            } else{
                data.gender = 'Female'
            }
            
            const province = data.province;
            const barangay = data.barangay;

            const provinceStr = province.replace(/_/g, " ");
            const brgyStr = barangay.replace(/_/g, " ");

            data.province = provinceStr.replace(/[0-9]/g, '');
            data.barangay = brgyStr.replace(/[0-9]/g, '');

            data.first_name = data.first_name.toUpperCase();
            data.last_name = data.last_name.toUpperCase();

            if(data.dosages.length == 0) {

                Swal.fire({
                    // title: '<p>Oops...</p>',
                    icon: 'warning',
                    html: '<h5 style="font-size: 18px;">Not vaccinated yet</h5>',
                    showCancelButton: false,
                    focusConfirm: true,
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    allowEnterKey: false,
                    confirmButtonText: 'Back',
                }).then((result) => {
                    if (result.value) {
                        window.location = `${api_url}/admin#/reports/list/certificate`;
                    }
                })
                
                return
            }

            const first = new Date(data.dosages[0].date_of_vaccination);
            const day = `${first.toLocaleString('default', { month: 'long' })+' '+first.getDate()+', '+first.getFullYear()}`
            data.dosages[0].date_of_vaccination = day;

            // const second = new Date(data.dosages[1].date_of_vaccination);
            // const day2 = `${second.toLocaleString('default', { month: 'long' })+' '+second.getDate()+', '+second.getFullYear()}`
            // data.dosages[1].date_of_vaccination = day2;

            // if(data.dosages[1].vaccine_description != null) {
            //     data.dosages[1].date_of_vaccination = "";
            //     state.second_dose = "";
            // }

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
}

const getters = {

}

const certificateStore = {
	namespaced: true,    
    state,
    mutations,
    actions,
    getters
}

export { registration, certificateStore };