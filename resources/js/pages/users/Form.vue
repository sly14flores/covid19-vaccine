<template>
    <UsersBreadcrumb :home="home" :items="items" />
    <div>

    </div>
</template>

<script>
import UsersBreadcrumb from './UsersBreadcrumb.vue';

export default {
    components: {
        UsersBreadcrumb
    },    
    data() {
        return {
            home: {icon: 'pi pi-home', to: '/users'},
            items: [{label: 'New User', to: '/users/new'}],
        }
    }
}
</script>

<style scoped>

</style>