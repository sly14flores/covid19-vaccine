import axios from 'axios'
import route from '../library/route'

import { api_url } from '../url.js'

const surveys = []

const state = () => {
    return {
        surveys
    }
}

const mutations = {
  
}

const actions = {
   
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