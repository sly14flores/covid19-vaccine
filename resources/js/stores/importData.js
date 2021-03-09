import route from '../library/route'
import { api_url } from '../url.js'

/**
 * APIs
 */
const CHECK_DATA = `${api_url}/api/doh/excel/data/structure`
const checkData = (payload) => {
    return axios.post(CHECK_DATA, payload)
}

const excel = null
const data = []
const checking = false
const infoMessage = null
const importLogs = []
const errorLogs = []

const state = () => {
    return {
        excel,
        data,
        checking,
        infoMessage,
        importLogs,
        errorLogs
    }
}

const mutations = {
    INIT(state) {
        state.excel = excel
        state.data = data
        state.checking = checking
        state.importLogs = importLogs
        state.errorLogs = errorLogs
    },    
    EXCEL(state,payload) {
        state.excel = payload
    },
    CHECKING(state,payload) {
        state.checking = payload
    },
    DATA(state,payload) {
        state.data = payload
    },    
    IMPORT_LOGS(state,payload) {
        state.importLogs.push(payload)
    },
    ERROR_LOGS(state,payload) {
        state.errorLogs = payload
    },
    INFO(state,payload) {
        state.infoMessage = payload
    }
}

const actions = {
    INIT({commit}) {
        commit('INIT')
    },
    EXCEL({commit},payload) {
        commit('EXCEL',payload)
    }, 
    IMPORT_LOGS({commit},payload) {
        commit('IMPORT_LOGS',payload)
    },
    ERROR_LOGS({commit},payload) {
        commit('ERROR_LOGS',payload)
    },    
    async CHECK_DATA({commit, state, dispatch}) {
        commit('CHECKING',true)
        commit('INFO',"Analyzing data to be imported...")
        try {
            const { data: { data } } = await checkData({ excel:  state.excel})
            dispatch('CHECK_DATA_SUCCESS', data)
        } catch(error) {
            const { response } = error
            dispatch('CHECK_DATAL_ERROR', response)
        }
    },
    CHECK_DATA_SUCCESS({commit},payload) {
        commit('CHECKING',false)
        commit('INFO',null)        
        const { message, rows } = payload        
        commit('DATA',rows)
    },
    CHECK_DATAL_ERROR({commit},payload) {
        commit('CHECKING',false)
        commit('INFO',null)
        const { data: { data } } = payload
        console.log(data)
        commit('ERROR_LOGS', data)
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