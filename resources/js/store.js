import { createStore } from 'vuex'
import { usersStore } from './stores/users.js'
import { registrationsStore } from './stores/registrations.js'

export default createStore({
    modules: {
        users: usersStore,
        registrations: registrationsStore,
    }
})