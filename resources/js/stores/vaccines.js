import axios from 'axios'
import route from '../library/route'

import Swal from 'sweetalert2'

import { api_url } from '../url.js'

const GET_BY_QR = `${api_url}/api/doh/vaccines/qr/:id`
const getByQr = (payload) => {
    const { id } = payload
    const url =  route(GET_BY_QR, { id })
    return axios.get(url)
}

const registration = {}

const state = () => {
    return {
        registration
    }
}

const mutations = {
    REGISTRATION(state,payload) {
        state.registration
    }
}

const actions = {
    async GET_BY_QR({dispatch},payload) {
        const { id } = payload
        try {
            const { data: { data } } = await getByQr({ id })
            dispatch('GET_BY_QR_SUCCESS',data)
        } catch (error) {
            const { response } = error
            dispatch('GET_BY_QR_ERROR',response)
        }
    },
    GET_BY_QR_SUCCESS({commit},payload) {
        console.log(payload)
        commit('REGISTRATION',payload)
    },
    GET_BY_QR_ERROR({commit},payload) {
        const { data: { message } } = payload
        Swal.fire({
            text: message,
            icon: 'error',
            confirmButtonText: 'Ok'
        })
    }
}

const getters = {}

export default {
    namespaced: true,
    state,
    mutations,
    actions,
    getters,
}