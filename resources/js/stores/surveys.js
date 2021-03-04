import axios from 'axios'
import route from '../library/route'

import { api_url } from '../url.js'

const GET_SURVEYS = `${api_url}/api/summary/surveys`
const getSurveys = (payload) => {
    const { start_date, end_date } = payload
    return axios.get(GET_SURVEYS, { params: {start_date, end_date} })
}

const surveys = {
    total_responses_line_chart: {
        labels: 0,
        responses: 0
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
}

const actions = {
    async GET_SURVEYS({dispatch}, payload) {
        try {
            const { data: { data } } = await getSurveys(payload)
            dispatch('GET_SURVEYS_SUCCESS', data)
        } catch (error) {
            const { response } = error
            dispatch('GET_SURVEYS_ERROR', response)
        }
    },
    GET_SURVEYS_SUCCESS({commit}, payload) {
        commit('SUMMARY',payload)
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