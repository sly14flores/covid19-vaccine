<template>
    <div>
        <MyBreadcrumb :home="home" :items="items" />
        <div class="p-grid p-mt-1">
            <div class="p-lg-12 p-md-12 p-sm-12">
                <Panel header="Upload">
                    <FileUpload name="demo[]" url="./upload.php" @upload="onUpload" :multiple="true" accept="image/*" :maxFileSize="1000000">
                        <template #empty>
                            <p>Drag and drop files to here to upload.</p>
                        </template>
                    </FileUpload>
                </Panel>
            </div>
        </div>
        
        <div class="p-grid">
            <div class="p-col-12 p-mt-2">
                <div class="p-grid p-col-12">
                    <Panel header="List">
                        <div class="p-grid">
                            <div class="p-sm-12 p-md-9 p-lg-10"></div>
                            <div class="p-sm-12 p-md-3 p-lg-2">
                                <button  type="button" class="p-mr-2 p-mb-2 p-button p-component p-button-success" @click="exportToExcel">
                                        Export to Excel
                                </button>   
                            </div>
                        </div>
                        <DataTable :value="registrations">
                            <Column field="qr_pass_id" header="Napanam ID No" sortable="true"></Column>
                            <Column field="first_name" header="First Name" sortable="true"></Column>
                            <Column field="last_name" header="Last Name" sortable="true"></Column>
                        </DataTable>
                        <Paginator :rows="pagination.per_page" :totalRecords="pagination.total" @page="fetchRegistrations($event)"></Paginator>
                    </Panel>
                    
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import MyBreadcrumb from '../../components/MyBreadcrumb.vue';
import DataTable from 'primevue/datatable/sfc';
import Column from 'primevue/column/sfc';
import FileUpload from 'primevue/fileupload/sfc';
import Paginator from 'primevue/paginator/sfc';
import Panel from 'primevue/panel/sfc';

import store from '../../store.js'

export default {
    setup() {

        const { dispatch } = store

        dispatch('AUTHENTICATE')

    },    
    components: {
        MyBreadcrumb,
        DataTable,
        Column,
        FileUpload,
        Paginator,
        Panel
    },
    data() {
        return {
            home: {icon: 'pi pi-home', to: '/registrations'},
            items: [{label: 'Registrations', to: '/registrations'}],
        }
    },
    computed: {
        registrations() {
            return this.$store.state.registrations.registrations
        },
        pagination(){
            return this.$store.state.registrations.pagination
        }
    },
    methods: {
        fetchRegistrations(event) {
            // event.page: New page number
            // event.first: Index of first record
            // event.rows: Number of rows to display in new page
            // event.pageCount: Total number of pages
            const { page } = event
            this.$store.dispatch('registrations/GET_REGISTRATIONS', { page })
        },
    },
    mounted() {
        this.fetchRegistrations({ page: 0 })
    }
}
</script>

<style scoped>
.icon-size{
    height: 18px;
}
</style>