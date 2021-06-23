<template>
    <div>
        <MyBreadcrumb :home="home" :items="items" />
        <div class="p-grid">
            <div class="p-col-12 p-mt-2">
                <div class="card p-fluid">
                    <h5>List</h5>
                    <hr />
                    <Toolbar class="p-mb-2">
                        <template #left>
                            <div class="p-fluid p-grid p-formgrid">
                                <div class="p-field p-col-12 p-md-10">
                                    <label for="basic"><small>Quick Search description</small></label>
                                    <InputText class="p-shadow-1 p-inputtext-sm" v-model="search" placeholder="Search . . ." />
                                </div>
                                <div class="p-field p-col-12 p-md-2">
                                    <label>&nbsp;</label>
                                    <Button class="p-button-sm" label="Go!" @click="filterHospitals({page: 0})" />
                                </div>
                            </div>
                        </template>
                    </Toolbar>
                    <DataTable :value="hospitals" dataKey="id">
                        <Column field="description" header="Description"></Column>
                        <Column field="slots" header="Slots"></Column>
                        <Column field="cbcr_id" header="Bakuna Center CBCR ID"></Column>
                        <Column field="id" header="Actions">
                            <template #body="slotProps">
                                <router-link :to="`/hospitals/hospital/${slotProps.data.id}`"><Button icon="pi pi-fw pi-pencil" class="p-button-rounded p-button-success p-mr-2" /></router-link>
                                <Button icon="pi pi-trash" class="p-button-rounded p-button-danger" @click="deleteHospital(slotProps.data.id)" />
                            </template>
                        </Column>
                    </DataTable>
                    <Paginator :rows="pagination.per_page" :totalRecords="pagination.total" @page="fetchHospitals($event)"></Paginator>
                </div>
            </div>
        </div>
        <ConfirmDialog group="confirmDelete"></ConfirmDialog>
    </div>
</template>

<script>
import MyBreadcrumb from '../../components/MyBreadcrumb.vue';
import DataTable from 'primevue/datatable/sfc';
import Column from 'primevue/column/sfc';
import Button from 'primevue/button/sfc';
import ConfirmDialog from 'primevue/confirmdialog/sfc';
import Paginator from 'primevue/paginator/sfc';
import InputText from 'primevue/inputtext/sfc';
import Toolbar from 'primevue/toolbar/sfc';

export default {
    setup() {

    },
    components: {
        MyBreadcrumb,
        DataTable,
        Paginator,
        Column,
        Button,
        ConfirmDialog,
        InputText,
        Toolbar
    },
    data() {
        return {
            home: {icon: 'pi pi-home', to: '/hospitals'},
            items: [],
            search: ''
        }
    },
    computed: {
        hospitals(){
            return this.$store.state.hospitals.hospitals
        },
        pagination(){
            return this.$store.state.hospitals.pagination
        }
    },
    methods: {
        filterHospitals() {
            this.fetchHospitals({ page: 0 })
        },
        fetchHospitals(event) {
            // event.page: New page number
            // event.first: Index of first record
            // event.rows: Number of rows to display in new page
            // event.pageCount: Total number of pages
            const { page } = event
            this.$store.dispatch('hospitals/GET_HOSPITALS', { page, search: this.search })
        },
        deleteHospital(id) {
            this.$confirm.require({
                key: 'confirmDelete',
                message: 'Are you sure you want to delete this hospital information?',
                header: 'Confirmation',
                icon: 'pi pi-exclamation-triangle',
                accept: () => {
                    this.$store.dispatch('hospitals/DELETE_HOSPITAL', {id})
                },
                reject: () => {
                    //callback to execute when hospital rejects the action
                }
            });
        }
    },
    mounted() {
        this.fetchHospitals({ page: 0 })
    }
}
</script>