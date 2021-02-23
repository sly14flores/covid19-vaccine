import route from '../library/route'
import { api_url } from '../url.js'

/**
 * APIs
 */
const CREATE_HOSPITAL = `${api_url}/api/hospital`
const createHospital = (payload) => {
    return axios.post(CREATE_HOSPITAL, payload)
}

const UPDATE_HOSPITAL = `${api_url}/api/hospital/:id`
const updateHospital = (payload) => {
    const { id } = payload
    const url =  route(UPDATE_HOSPITAL, { id })
    return axios.put(url, payload)
}

const GET_HOSPITAL = `${api_url}/api/hospital/:id`
const getHospital = (payload) => {
    const { id } = payload
    const url =  route(GET_HOSPITAL, { id })
    return axios.get(url)
}

const GET_HOSPITALS = `${api_url}/api/hospitals`
const getHospitals = (payload) => {
    const { page } = payload
    const pageNo = page + 1
    return axios.get(GET_HOSPITALS, {params: { page: pageNo } })
}

const DELETE_HOSPITAL = `${api_url}/api/hospital/:id`
const deleteHospital = (payload) => {
    const { id } = payload
    const url =  route(DELETE_HOSPITAL, { id })
    return axios.delete(url)
}

const hospital = {
    id: 0,
    description: null,
    slots: null
}

const saving = false
const hospitals = []
const pagination = {}

const state = () => {
    return {
        saving,
        writeOn: false,
        hospital,
        hospitals,
        pagination
    }
}

const mutations = {
    INIT(state) {
        state.hospital = hospital
        state.hospitals = hospitals
    },
    HOSPITAL(state, payload) {
        state.hospital = payload
    },
    HOSPITALS(state, payload) {
        state.hospitals = payload
    },
    PAGINATION(state, payload) {
        state.pagination = {...payload}
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
    async CREATE_HOSPITAL({commit, dispatch}, payload) {
        commit('SAVING',true)        
        try {
            const { data: { data } } = await createHospital(payload)
            dispatch('CREATE_HOSPITAL_SUCCESS', data)
            return true
        } catch(error) {
            const { response } = error
            dispatch('CREATE_HOSPITAL_ERROR', response)
            return false
        }
    },
    CREATE_HOSPITAL_SUCCESS({commit}, payload) {
        commit('SAVING',false)        
        console.log(payload)
    },
    CREATE_HOSPITAL_ERROR({commit}, payload) {
        commit('SAVING',false) 
        console.log(payload)
    },
    async UPDATE_HOSPITAL({commit,dispatch}, payload) {
        commit('SAVING',true)
        commit('TOGGLE_WRITE', true)
        try {
            const { data: { data } } = await updateHospital(payload)
            dispatch('UPDATE_HOSPITAL_SUCCESS', data)
            return true
        } catch (error) {
            const { response } = error
            dispatch('UPDATE_HOSPITAL_ERROR', response)
            return false
        }
    },
    UPDATE_HOSPITAL_SUCCESS({commit}, payload) {
        commit('SAVING',false)
        commit('TOGGLE_WRITE', false)
    },
    UPDATE_HOSPITAL_ERROR({commit}, payload) {
        commit('SAVING',false)
        commit('TOGGLE_WRITE', false)
        console.log(payload)
    },
    async DELETE_HOSPITAL({dispatch}, payload) {
        const { id } = payload
        try {
            const { data: { data } } = await deleteHospital({id})
            dispatch('DELETE_HOSPITAL_SUCCESS', data)
        } catch (error) {
            const { response } = error
            dispatch('DELETE_HOSPITAL_ERROR', response)
        }
    },
    DELETE_HOSPITAL_SUCCESS({commit, dispatch}, payload) {
        console.log(payload)
        dispatch('GET_HOSPITALS', { page: 0 })
    },
    DELETE_HOSPITAL_ERROR({commit}, payload) {
        console.log(payload)
    },
    async GET_HOSPITAL({dispatch}, payload) {
        const { id } = payload
        try {
            const { data: { data } } = await getHospital({id})
            dispatch('GET_HOSPITAL_SUCCESS', data)
        } catch (error) {
            const { response } = error
            dispatch('GET_HOSPITAL_ERROR', response)
        }
    },
    GET_HOSPITAL_SUCCESS({commit}, payload) {
        commit('HOSPITAL', payload)
    },
    GET_HOSPITAL_ERROR({commit}, payload) {
        console.log(payload)
    },
    async GET_HOSPITALS({dispatch}, payload) {
        try {
            const { page } = payload
            const { data: { data: { data, pagination } } } = await getHospitals({ page })
            dispatch('GET_HOSPITALS_SUCCESS', { data, pagination })
        } catch (error) {
            const { response } = error
            dispatch('GET_HOSPITALS_ERROR', response)
        }
    },
    GET_HOSPITALS_SUCCESS({commit}, payload) {
        const { data, pagination } = payload
        commit('HOSPITALS',data)
        commit('PAGINATION',pagination)
    },
    GET_HOSPITALS_ERROR({commit}, payload) {
        console.log(payload)
    }
}

const getters = {

}

const hospitalsStore = {
	namespaced: true,    
    state,
    mutations,
    actions,
    getters
}

export { hospital, hospitalsStore };