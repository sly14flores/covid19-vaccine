import { createStore } from 'vuex'
import users from './stores/users.js'

export default createStore({
    modules: {
        users,
    }
})