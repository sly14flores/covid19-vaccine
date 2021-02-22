<template>
    <div>
        <router-view />
    </div>
</template>

<script>

import store from '../../store.js'

export default {
    setup() {

        const { dispatch } = store

        dispatch('AUTHENTICATE')

    },     
    components: {

    },
    data() {
        return {

        }
    },
    methods: {
        init() {
            this.$store.dispatch('hospitals/INIT')
        },
    },
    mounted() {
        this.init()
    }    
}
</script>