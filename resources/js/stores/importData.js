import route from '../library/route'
import { api_url } from '../url.js'

import Swal from 'sweetalert2'

/**
 * APIs
 */
const CHECK_DATA = `${api_url}/api/doh/excel/data/structure`
const checkData = (payload) => {
    return axios.post(CHECK_DATA, payload)
}

const IMPORT_DATA = `${api_url}/api/doh/excel/data/import`
const importData = (payload) => {
    return axios.post(IMPORT_DATA, {registrations: payload})
}

const excel = null
const path = null
const data = []
const checking = false
const infoMessage = null
const successMessage = null
const importLogs = []
const errorLogs = []

const state = () => {
    return {
        excel,
        path,
        data,
        checking,
        infoMessage,
        successMessage,
        importLogs,
        errorLogs
    }
}

const mutations = {
    INIT(state) {
        state.excel = excel
        state.data = data
        state.checking = checking
        state.infoMessage = infoMessage
        state.successMessage = successMessage
        state.importLogs = importLogs
        state.errorLogs = errorLogs
    },  
    EXCEL(state,payload) {
        state.excel = payload
    },
    PATH(state,payload) {
        state.path = payload
    },
    CHECKING(state,payload) {
        state.checking = payload
    },
    DATA(state,payload) {
        state.data = payload
    },    
    IMPORT_LOGS(state,payload) {
        state.importLogs = [...payload]
    },
    ERROR_LOGS(state,payload) {
        state.errorLogs = payload
    },
    INFO(state,payload) {
        state.infoMessage = payload
    },
    SUCCESS(state,payload) {
        state.successMessage = payload
    },
}

const actions = {
    INIT({commit}) {
        commit('INIT')
    },
    EXCEL({commit},payload) {
        const { excel, path } = payload
        commit('EXCEL',excel)
        commit('PATH',path)
    }, 
    IMPORT_LOGS({commit},payload) {
        commit('IMPORT_LOGS',payload)
    },
    ERROR_LOGS({commit},payload) {
        commit('ERROR_LOGS',payload)
    },    
    async CHECK_DATA({commit, state, dispatch}) {
        commit('CHECKING',true)
        commit('ERROR_LOGS',[])
        commit('SUCCESS',null)
        commit('INFO',"Analyzing data to be imported...")
        try {
            const { data: { data } } = await checkData({ excel: state.excel, path: state.path})
            dispatch('CHECK_DATA_SUCCESS', data)
        } catch(error) {
            const { response } = error
            dispatch('CHECK_DATAL_ERROR', response)
        }
    },
    CHECK_DATA_SUCCESS({dispatch,commit},payload) {
        commit('CHECKING',false)
        commit('INFO',null)
        const { message, rows } = payload
        commit('SUCCESS',message)
        commit('DATA',rows)
        commit('IMPORT_LOGS',[])        
        dispatch('IMPORT_DATA')
    },
    CHECK_DATAL_ERROR({commit},payload) {
        commit('CHECKING',false)
        commit('INFO',null)
        commit('SUCCESS',null)
        const { data: { data } } = payload
        console.log(data)
        commit('ERROR_LOGS', data)
    },
    async IMPORT_DATA({state,dispatch}) {
        const rows = state.data
        try {
            const { data: { data } } = await importData(rows)
            dispatch('IMPORT_DATA_SUCCESS', data)
        } catch(error) {
            const { response } = error
            dispatch('IMPORT_DATA_ERROR', response)
        }
    },
    IMPORT_DATA_SUCCESS({commit},payload) {
        commit('IMPORT_LOGS',payload)

        Swal.fire({
            title: '<p class="text-success" style="font-size: 25px;">Data imported</p>',
            icon: 'success',
            showConfirmButton: true,
            allowOutsideClick: false,
            allowEscapeKey: false,
            allowEnterKey: false,
        }).then((result) => {
            
            // commit('INIT',null)

        })
    },
    IMPORT_DATA_ERROR({commit},payload) {

    },
    INFO({commit},payload) {
        commit('SUCCESS',null)
        commit('IMPORT_LOGS',[])                
        commit('INFO',payload)
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