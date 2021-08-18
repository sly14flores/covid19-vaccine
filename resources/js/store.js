import { createStore } from 'vuex'
import { state, mutations, actions, getters } from './stores/root'
import { usersStore } from './stores/users.js'
import { registrationsStore } from './stores/registrations.js'
import { surveyStore } from './stores/surveys.js'
import { registeredStore } from './stores/summary-registrations'
import { vaccinationStore } from './stores/summary-vaccination'
import { certificateStore } from './stores/vaccination-certificate'
import { hospitalsStore } from './stores/hospitals.js'
import importData from './stores/importData.js'
import { vaccinesStore } from './stores/vaccines.js'
import password from './stores/password.js'
import { profilesStore } from './stores/profiles.js'

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
        profiles: profilesStore,
        surveys: surveyStore,
        registered: registeredStore,
        vaccination: vaccinationStore,
        certificates: certificateStore,
        hospitals: hospitalsStore,
        importData,
        vaccines: vaccinesStore,
        password
    },
    state,
    mutations,
    actions,
    getters,
    plugins: [vuexLocal.plugin]    
})