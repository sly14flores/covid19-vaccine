<template>
    <div>
        <router-view />
    </div>
</template>

<script>


export default {
    components: {

    },
    data() {
        return {

        }
    },
    methods: {
        init() {
            this.$store.dispatch('users/INIT')
        },
    },
    mounted() {
        this.init()
    }    
}
</script>