<template>
    <div>
        <MyBreadcrumb :home="home" :items="items" />  
         <FileUpload name="demo[]" url="./upload.php" @upload="onUpload" :multiple="true" accept="image/*" :maxFileSize="1000000">
            <template #empty>
                <p>Drag and drop files to here to upload.</p>
            </template>
        </FileUpload>
        <div class="p-grid">
            <div class="p-col-12 p-mt-2">
                <div class="card">
                    <div class="p-grid p-col-12">
                        <div class="p-sm-12 p-md-9 p-lg-10">
                            <h5 class="summary p-ml-2">List</h5>
                        </div>
                        <div class="p-sm-12 p-md-3 p-lg-2">
                            <button  type="button" class="p-mr-2 p-mb-2 p-button p-component p-button-icon-only" @click="refresh">
                                <i class="pi pi-refresh icon-size"></i>
                            </button>
                            <button  type="button" class="p-mr-2 p-mb-2 p-button p-component p-button-success" @click="exportToExcel">
                                    Export to Excel
                            </button>   
                        </div>
                    </div>
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
import FileUpload from 'primevue/fileupload/sfc';

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
        FileUpload
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

    },
    mounted() {

    }
}
</script>

<style scoped>
.icon-size{
    height: 18px;
}
</style>