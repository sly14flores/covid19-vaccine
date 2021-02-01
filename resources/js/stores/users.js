import route from '../library/route'

import { api_url } from '../url.js'

/**
 * API urls
 */
const CREATE_ROUTE = `${api_url}/api/user`
const UPDATE_ROUTE = `${api_url}/api/user`
const GET_ROUTE = `${api_url}/api/user/:id`
const ALL_ROUTE = `${api_url}/api/users`
const DELETE_ROUTE = `${api_url}/api/user/:id`

const user = {
    firstname: null,
    middlename: null,
    lastname: null,
    email: null,
    username: null,
    password: null
}

const users = []

const state = () => {
    return {
        user,
        users,
    }
}

const mutations = {
    INIT(state) {
        state.user = user
        state.users = users
    },
    USER(state, payload) {
        state.user = payload
    },
    USERS(state, payload) {
        state.users = payload
    },    
}

const actions = {
    USER({commit}, payload) {
        commit('USER', payload)
    },
    async CREATE({commit}, payload) {
        try {
            const create = await axios.post(CREATE_ROUTE, payload)
            commit('USER', payload)
        } catch(error) {

        }
    },
    async UPDATE({commit}, payload) {
        try {
            const url =  route(UPDATE_ROUTE, { id })
            const response = await axios.put(url)
            commit('USER', payload)
        } catch(error) {

        }
    },
    async GET({commit}, {id}) {
        try {
            const url =  route(GET_ROUTE, { id })
            const response = await axios.get(url)
            commit('USER',response.data)
        } catch(error) {

        }
    },
    async ALL({commit}) {
        try {
            const response = await axios.get(ALL_ROUTE, {params: {page: 1}})
            commit('USERS', response.data.data)
        } catch(error) {

        }
    },
    async DELETE({commit}, {id}) {
        try {
            const url =  route(DELETE_ROUTE, { id })
            const del = await axios.get(url)     
        } catch(error) {
            
        }
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