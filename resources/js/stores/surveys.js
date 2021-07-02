import axios from 'axios'
import route from '../library/route'

import Swal from 'sweetalert2'

import { api_url } from '../url.js'

const GET_SURVEYS = `${api_url}/api/summary/surveys`
const getSurveys = (payload) => {
    const { start_date_chart, end_date_chart, start_date, end_date } = payload
    return axios.get(GET_SURVEYS, { params: {start_date_chart, end_date_chart, start_date, end_date} })
}

const surveys = {
    total_responses_line_chart: {
        labels: 0,
        responses: 0,
        total_interested: 0,
        total_not_interested: 0
    },
    total_responses: 0,
    male: 0,
    female: 0,
    population_group: [],
    municipality: [],
    comorbidity: [],
    current_pregnancy: [],
    planning_pregnant: [],
    interested: [],
    reason: []
}

const state = () => {
    return {
        surveys
    }
}

const mutations = {
    SUMMARY(state, payload) {
        state.surveys = {...payload}
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
    async GET_SURVEYS({dispatch,commit}, payload) {
        
        try {
            commit('LOADING');

            const { data: { data } } = await getSurveys(payload)
            dispatch('GET_SURVEYS_SUCCESS', data)
            Swal.close()

        } catch (error) {
            const { response } = error
            dispatch('GET_SURVEYS_ERROR', response)
            Swal.close()
        }
    },
    GET_SURVEYS_SUCCESS({commit}, payload) {
        commit('SUMMARY',payload)
        Swal.close()
    },
    GET_SURVEYS_ERROR({commit}, payload) {
        console.log(payload)
    }
}


const getters = {

}

const surveyStore = {
	namespaced: true,    
    state,
    mutations,
    actions,
    getters
}

export { surveyStore };