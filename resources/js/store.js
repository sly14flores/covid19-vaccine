import { createStore } from 'vuex'
import user from './stores/user.js'

export default createStore({
    modules: {
        user,
    }
})