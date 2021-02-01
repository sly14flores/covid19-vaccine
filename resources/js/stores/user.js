import axios from 'axios'
import route from '../library/route'

import { api_url } from '../url.js'

/**
 * API urls
 */
const CREATE_ROUTE = '/api/user' 
const GET_ROUTE = '/api/user/:id'
const ALL_ROUTE = '/api/users'
const DELETE_ROUTE = '/api/user/:id'

const user = {
    firstname: null,
    middlename: null,
    lastname: null,
    email: null,
    username: null,
    password: null
}

const state = () => {
    return {
        user,
        users: [],
    }
}

const mutations = {
    INIT_USER(state) {
        state.user = user
    },
    GET_USER(state, payload) {
        state.user = payload
    }
}

const actions = {
    async GET_USER({commit}, {id}) {

    },
    async CREATE_USER({commit}) {

    },
    async ALL_USERS({commit}) {

    },
    async DELETE_USER({commit}) {

    }
}

const getters = {

}

export default {
	namespaced: true,    
    state,
    mutations,
    actions,
    getters
}