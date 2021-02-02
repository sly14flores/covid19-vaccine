<template>
    <div>
        <MyBreadcrumb :home="home" :items="items" />        
        <div class="p-grid">
            <div class="p-col-12 p-mt-2">
                <div class="card p-fluid">
                    <h5>List</h5>
                    <hr />
                    <DataTable :value="users">
                        <Column field="name" header="Name"></Column>
                        <Column field="address" header="Address"></Column>
                        <Column field="schedule" header="Schedule"></Column>
                        <Column header="Actions"></Column>
                    </DataTable>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import MyBreadcrumb from '../../components/MyBreadcrumb.vue';
import DataTable from 'primevue/datatable/sfc';
import Column from 'primevue/column/sfc';

export default {
    components: {
        MyBreadcrumb,
        DataTable,
        Column
    },
    data() {
        return {
            home: {icon: 'pi pi-home', to: '/summary/registrations'},
            items: [{label: 'Registrations', to: '/summary/registrations'}],
        }
    },
    computed: {
        users() {
            return this.$store.state.users.users
        }
    },
    methods: {
        fetchUsers() {
            this.$store.dispatch('users/ALL')
        }
    },
    mounted() {
        this.fetchUsers()
    }
}
</script>

<style scoped>

</style>