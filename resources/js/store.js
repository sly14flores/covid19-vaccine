import { createStore } from 'vuex'
import { state, mutations, actions, getters } from './stores/root'
import { usersStore } from './stores/users.js'
import { registrationsStore } from './stores/registrations.js'
import { surveyStore } from './stores/surveys.js'
import { hospitalsStore } from './stores/hospitals.js'
import importData from './stores/importData.js'
import vaccines from './stores/vaccines.js'

import VuexPersistence from 'vuex-persist'
const vuexLocal = new VuexPersistence({
    storage: window.localStorage,
    key: 'pgluVaccines',
    reducer: (state) => ({
        profile: state.profile
    })
})

export default createStore({
    modules: {
        users: usersStore,
        registrations: registrationsStore,
        surveys: surveyStore,
        hospitals: hospitalsStore,
        importData,
        vaccines,
    },
    state,
    mutations,
    actions,
    getters,
    plugins: [vuexLocal.plugin]    
})