<template>
    <div>
        <MyBreadcrumb :home="home" :items="items" />        
        <div class="p-grid">
            <div class="p-col-12 p-mt-2">
                <div class="card p-fluid">
                    <h5>List</h5>
                    <hr />
                    <DataTable :value="users">
                        <Column field="firstname" header="First Name"></Column>
                        <Column field="lastname" header="Last Name"></Column>
                        <Column field="username" header="Username"></Column>
                        <Column header="Actions">
                            <template #body="slotProps">
                                <Button icon="pi pi-fw pi-pencil" :class="{'p-button-rounded': true, 'p-button-success': true, 'p-mr-2': true}"></Button>
                                <Button icon="pi pi-trash" class="p-button-rounded p-button-warning" />
                            </template>
                        </Column>
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
            home: {icon: 'pi pi-home', to: '/users'},
            items: []
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