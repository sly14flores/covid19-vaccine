import axios from 'axios'
import route from '../library/route'

import Swal from 'sweetalert2'

import { api_url } from '../url.js'

const SELECTIONS_ROUTE = `${api_url}/api/doh/selections`
const getSelections = () => {
    return axios.get(SELECTIONS_ROUTE)
}

const GET_NAPANAM_ROUTE = `${api_url}/api/check/profile/:id/:birthdate`
const getNapanam = (payload) => {
    const { id, birthdate } = payload
    const url =  route(GET_NAPANAM_ROUTE, { id, birthdate })
    return axios.get(url)    
}

const registration = {
    id: 0,
    qr_pass_id : null,
    first_name: null,
    middle_name: null,
    last_name: null,
    suffix: null,
    birthdate: null,
    contact_no: null,
    philhealth: null,
    province: null,
    townCity: null,
    barangay: null,
    fully_vaccinated: null,
    priority_group: null,
    first_dosage: {},
    second_dosage: {},
    first_facility: null,
    second_facility: null
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

const state = () => {
    return {
        fetched: false,
        saving: "",
        registration,
        selections,
        first_facility: null,
        second_facility: null,
        status: null,
        toggle_second_dose: true,
        color: null,
        icon: null
    }
}

const mutations = {
    INIT(state) {
        state.registration = registration
    },
    INIT_REGISTRATION(state) {
        state.registration = registration
    },
    SELECTIONS(state, payload) {
        state.selections = {...payload}
    },
    REGISTRATION(state, payload) {
        state.registration.qr_pass_id = payload.qr_pass_id
        state.registration.first_name = payload.first_name
        state.registration.middle_name = payload.middle_name
        state.registration.last_name = payload.last_name
        state.registration.suffix = payload.suffix
        state.registration.birthdate = payload.birthdate
        state.registration.contact_no = payload.contact_no
        state.registration.philhealth = payload.philhealth
        state.registration.province = payload.province
        state.registration.townCity = payload.townCity
        state.registration.barangay = payload.barangay
        state.registration.fully_vaccinated = payload.fully_vaccinated
        state.registration.priority_group = payload.priority_group

        state.registration.first_dosage.date_of_vaccination = payload.dosages[0].date_of_vaccination
        state.registration.first_dosage.time_of_vaccination = payload.dosages[0].time_of_vaccination
        state.registration.first_dosage.brand_name = payload.dosages[0].brand_description
        state.registration.first_dosage.vaccine_name = payload.dosages[0].vaccine_description
        state.registration.first_dosage.batch_number = payload.dosages[0].batch_number
        state.registration.first_dosage.lot_number = payload.dosages[0].lot_number
        state.registration.first_dosage.vaccinator = payload.dosages[0].vaccinator

        state.registration.second_dosage.date_of_vaccination = payload.dosages[1].date_of_vaccination
        state.registration.second_dosage.time_of_vaccination = payload.dosages[1].time_of_vaccination
        state.registration.second_dosage.brand_name = payload.dosages[1].brand_description
        state.registration.second_dosage.vaccine_name = payload.dosages[1].vaccine_description
        state.registration.second_dosage.batch_number = payload.dosages[1].batch_number
        state.registration.second_dosage.lot_number = payload.dosages[1].lot_number
        state.registration.second_dosage.vaccinator = payload.dosages[1].vaccinator

        state.registration.first_facility = state.first_facility
        state.registration.second_facility = state.second_facility
        state.registration.toggle_second_dose = state.toggle_second_dose
        
        
    },
    FETCH(state, payload) {
        state.fetched = payload
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
    async GET_SELECTIONS({commit}) {
        commit('LOADING');
        try {
            const { data: { data } } = await getSelections()
            commit('SELECTIONS', data)
            Swal.close();
        } catch (error) {
            const { response } = error
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
        }
    },
    async GET_REGISTRATION({commit,state}, { id, birthdate }) {
        try {

            const { data: { data } } = await getNapanam({ id, birthdate })
            const { dosages } = data

            const province = data.province;
            const barangay = data.barangay;

            const provinceStr = province.replace(/_/g, " ");
            const brgyStr = barangay.replace(/_/g, " ");

            data.province = provinceStr.replace(/[0-9]/g, '');
            data.barangay = brgyStr.replace(/[0-9]/g, '');
            
            // const add_zero = yourDate.getMonth() < 9 ? '0': '';
            // const month = yourDate.getMonth()+1;
            // const date_now = `${yourDate.getFullYear()+'-'+add_zero+month+'-'+yourDate.getDate()}`;
            
            if(dosages[0].brand_description==""){

                dosages[0].date_of_vaccination = ""
                dosages[0].time_of_vaccination = "Data not found"

            } else {

                const dateNow = new Date();
                const getDayToday = dateNow.getDate();
                const getDayYesterday = dateNow.getDate()-1;

                const today = `${dateNow.toLocaleString('default', { month: 'long' })+' '+getDayToday+', '+dateNow.getFullYear()}`;
                const yesterday = `${dateNow.toLocaleString('default', { month: 'long' })+' '+getDayYesterday+', '+dateNow.getFullYear()}`;

                const first = new Date(dosages[0].date_of_vaccination);
                const first_date_vaccination = `${first.toLocaleString('default', { month: 'long' })+' '+first.getDate()+', '+first.getFullYear()}`;
                dosages[0].date_of_vaccination = first_date_vaccination;
                
                if(first_date_vaccination==today) dosages[0].date_of_vaccination = "today";
                if(first_date_vaccination==yesterday) dosages[0].date_of_vaccination = "yesterday";
    
            }

            if(dosages.length >= 1) {

                if(dosages[0].user!=null) {
                    state.first_facility = dosages[0].user.user_hospital.description
                }
                state.toggle_second_dose = false;
                state.icon = "";
                state.color = "warning";
                state.status = "Partially Vaccinated";
                
            }
  
            // Second Dose
            if(dosages.length==2) {

                state.status = "Fully Vaccinated";
                state.icon = "pi pi-check";
                state.color = "success";
                state.toggle_second_dose = true;

                if(dosages[1].brand_description==""){

                    dosages[1].date_of_vaccination = ""
                    dosages[1].time_of_vaccination = "Data not found"
    
                } else {
                    const dateNow = new Date();
                    
                    const getDayToday = dateNow.getDate();
                    const getDayYesterday = dateNow.getDate()-1;
                    
                    const today = `${dateNow.toLocaleString('default', { month: 'long' })+' '+getDayToday+', '+dateNow.getFullYear()}`;
                    const yesterday = `${dateNow.toLocaleString('default', { month: 'long' })+' '+getDayYesterday+', '+dateNow.getFullYear()}`;

                    const second = new Date(dosages[1].date_of_vaccination);
                    const second_date_vaccination = `${second.toLocaleString('default', { month: 'long' })+' '+second.getDate()+', '+second.getFullYear()}`
                    dosages[1].date_of_vaccination = second_date_vaccination;

                    if(second_date_vaccination==today) dosages[1].date_of_vaccination = "today";
                    if(second_date_vaccination==yesterday) dosages[1].date_of_vaccination = "yesterday";

                    if(dosages[1].user!=null) state.second_facility = dosages[1].user.user_hospital.description;
                    
                }
            }

            commit('REGISTRATION', data)
            commit('FETCH', true)

        } catch (error) {
            const { response } = error
            
            if(response==undefined) return;

            // if Not found
            if(response.status==404) {
                Swal.fire({
                    // title: '<p>Error</p>',
                    icon: 'error',
                    html: '<h5 style="font-size: 18px;">The Napanam ID No. you entered does not exist. Please try again.</h5>',
                    showCancelButton: false,
                    focusConfirm: true,
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    allowEnterKey: true,
                    confirmButtonText: 'Ok',
                }).then((result) => {
                    if (result.value) {
                    // Close
                    }
                })	
            }

            // if Not found
            if(response.status==500) {
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

            commit('FETCH', false)
        }
    },
}

const getters = {

}

const profilesStore = {
	namespaced: true,    
    state,
    mutations,
    actions,
    getters
}

export { registration, profilesStore };