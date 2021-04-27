import route from '../library/route'
import { api_url } from '../url.js'

import Swal from 'sweetalert2'

/**
 * APIs
 */
const CREATE_USER = `${api_url}/api/user`
const createUser = (payload) => {
    return axios.post(CREATE_USER, payload)
}

const UPDATE_USER = `${api_url}/api/user/:id`
const updateUser = (payload) => {
    const { id } = payload
    const url =  route(UPDATE_USER, { id })
    return axios.put(url, payload)
}

const GET_USER = `${api_url}/api/user/:id`
const getUser = (payload) => {
    const { id } = payload
    const url =  route(GET_USER, { id })
    return axios.get(url)
}

const GET_USERS = `${api_url}/api/users`
const getUsers = (payload) => {
    const { page } = payload
    const pageNo = page + 1
    return axios.get(GET_USERS, {params: { page: pageNo } })
}

const DELETE_USER = `${api_url}/api/user/:id`
const deleteUser = (payload) => {
    const { id } = payload
    const url =  route(DELETE_USER, { id })
    return axios.delete(url)
}

const GET_HOSPITALS = `${api_url}/api/general/selections/hospitals`
const getHospitals = () => {
    return axios.get(GET_HOSPITALS)
}

const GET_GROUPS = `${api_url}/api/doh/selections/groups`
const getGroups = () => {
    return axios.get(GET_GROUPS)
}

const user = {
    id: 0,
    firstname: null,
    middlename: null,
    lastname: null,
    email: null,
    username: null,
    password: null
}
const saving = false
const users = []
const hospitals = []
const groups = []
const pagination = {}

const state = () => {
    return {
        saving,
        writeOn: false,
        toggleProfession: false,
        user,
        users,
        hospitals,
        groups,
        pagination
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
    HOSPITALS(state, payload) {
        state.hospitals = payload
    },
    GROUPS(state, payload) {
        state.groups = payload
    },
    PAGINATION(state, payload) {
        state.pagination = {...payload}
    },
    SAVING(state, payload) {
        state.saving = payload
    },
    TOGGLE_WRITE(state,payload) {
        state.writeOn = payload
    },
    DISABLED_PROFESSION(state,payload) {
        state.toggleProfession = payload
    }
}

const actions = {
    INIT({commit}) {
        commit('INIT')
    },
    TOGGLE_WRITE({commit}, payload) {
        commit('TOGGLE_WRITE', payload)
    },
    DISABLED_PROFESSION({commit}, payload) {
        commit('DISABLED_PROFESSION', payload)
    },
    async CREATE_USER({commit, dispatch}, payload) {
        commit('SAVING',true)        
        try {
            const { data: { data } } = await createUser(payload)
            dispatch('CREATE_USER_SUCCESS', data)
            return true
        } catch(error) {
            const { response } = error
            dispatch('CREATE_USER_ERROR', response)
            return false
        }
    },
    CREATE_USER_SUCCESS({commit}, payload) {
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
    CREATE_USER_ERROR({commit}, payload) {
        commit('SAVING',false) 
        console.log(payload)
    },
    async UPDATE_USER({commit,dispatch}, payload) {
        commit('SAVING',true)
        commit('TOGGLE_WRITE', true)
        try {
            const { data: { data } } = await updateUser(payload)
            dispatch('UPDATE_USER_SUCCESS', data)
            return true
        } catch (error) {
            const { response } = error
            dispatch('UPDATE_USER_ERROR', response)
            return false
        }
    },
    UPDATE_USER_SUCCESS({commit}, payload) {
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
    UPDATE_USER_ERROR({commit}, payload) {
        commit('SAVING',false)
        commit('TOGGLE_WRITE', false)
        console.log(payload)
    },
    async DELETE_USER({dispatch}, payload) {
        const { id } = payload
        try {
            const { data: { data } } = await deleteUser({id})
            dispatch('DELETE_USER_SUCCESS', data)
        } catch (error) {
            const { response } = error
            dispatch('DELETE_USER_ERROR', response)
        }
    },
    DELETE_USER_SUCCESS({commit, dispatch}, payload) {
        console.log(payload)
        dispatch('GET_USERS', { page: 0 })
        Swal.fire({
            title: '<p class="text-success" style="font-size: 25px;">Successfully deleted!</p>',
            icon: 'success',
            showConfirmButton: false,
            timer: 1500,
        })
    },
    DELETE_USER_ERROR({commit}, payload) {
        console.log(payload)
    },
    async GET_USER({dispatch}, payload) {
        const { id } = payload
        try {
            const { data: { data } } = await getUser({id})
            dispatch('GET_USER_SUCCESS', data)
        } catch (error) {
            const { response } = error
            dispatch('GET_USER_ERROR', response)
        }
    },
    GET_USER_SUCCESS({commit}, payload) {
        commit('USER', payload)
    },
    GET_USER_ERROR({commit}, payload) {
        console.log(payload)
    },
    async GET_USERS({dispatch}, payload) {
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
            const { data: { data: { data, pagination } } } = await getUsers({ page })
            dispatch('GET_USERS_SUCCESS', { data, pagination })
        } catch (error) {
            const { response } = error
            dispatch('GET_USERS_ERROR', response)
        }
    },
    GET_USERS_SUCCESS({commit}, payload) {
        const { data, pagination } = payload
        commit('USERS',data)
        commit('PAGINATION',pagination)
        Swal.close()
    },
    GET_USERS_ERROR({commit}, payload) {
        console.log(payload)
    },
    async GET_HOSPITALS({dispatch}) {
        try {
            const { data: { data } } = await getHospitals()
            dispatch('GET_HOSPITALS_SUCCESS', data)
        } catch (error) {
            const { response } = error
            dispatch('GET_HOSPITALS_ERROR', response)
        }
    },
    GET_HOSPITALS_SUCCESS({commit}, payload) {
        commit('HOSPITALS', payload)
    },
    GET_HOSPITALS_ERROR({commit}, payload) {
        console.log(payload)
    },
    async GET_GROUPS({commit}) {
        try {
            const { data: { data } } = await getGroups()
            commit('GROUPS', data)
        } catch (error) {
            const { response } = error
            console.log(response)
        }
    }
}

const getters = {

}

const usersStore = {
	namespaced: true,    
    state,
    mutations,
    actions,
    getters
}

export { user, usersStore };