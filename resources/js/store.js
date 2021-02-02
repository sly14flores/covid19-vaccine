import { createStore } from 'vuex'
import { usersStore } from './stores/users.js'

export default createStore({
    modules: {
        users: usersStore,
    }
})