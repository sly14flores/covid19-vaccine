<template>
    <UsersBreadcrumb :home="home" :items="items" />
    <div>
        <div class="p-grid">
            <div class="p-col-12 p-mt-2">
                <div class="card p-fluid">
                    <h5>List</h5>
                    <hr />
                    <DataTable :value="products">
                        <Column field="name" header="Name"></Column>
                        <Column field="username" header="Username"></Column>
                        <Column field="actions" header="Actions"></Column>
                    </DataTable>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import UsersBreadcrumb from './UsersBreadcrumb.vue';
import DataTable from 'primevue/datatable/sfc';
import Column from 'primevue/column/sfc';

export default {
    components: {
        UsersBreadcrumb,
        DataTable,
        Column
    },
    data() {
        return {
            home: {icon: 'pi pi-home', to: '/users'},
            items: []
        }
    }
}
</script>

<style scoped>

</style>