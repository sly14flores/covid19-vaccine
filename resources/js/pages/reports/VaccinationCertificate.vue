<template>
    <div>
        <MyBreadcrumb :home="home" :items="items" />
        <Toolbar class="p-mb-2">
            <template #left>
                <div class=" p-fluid p-grid p-formgrid">
                    <div class="p-field p-col-12 p-md-8">
                        <label for="basic"><small>Napanam ID No, first name or last name</small></label>
                        <InputText class="p-shadow-1 p-inputtext-sm" v-model="search" placeholder="Search . . ." />
                    </div>
                    <div class="p-field p-col-12 p-md-2">
                        <label for="basic">&nbsp;</label>
                        <Button class="p-button-sm" label="Go!" @click="fetchRegistrations({page: 0})" />
                    </div>
                </div>
            </template>
        </Toolbar>
        <Panel header="List">
            <DataTable class="p-datatable-sm" :value="registrations" responsiveLayout="scroll">
                <Column field="qr_pass_id" header="Napanam ID No"></Column>
                <Column field="first_name" header="First Name"></Column>
                <Column field="middle_name" header="Middle Name"></Column>
                <Column field="last_name" header="Last Name"></Column>
                <Column field="color" header="Status">
                        <template #body="slotProps">
                            <Tag class="p-mr-2" :severity="slotProps.data.color" :value="slotProps.data.label" rounded></Tag>
                        </template>
                    </Column>
                <Column field="id" header="Action">
                    <template #body="slotProps">
                        <router-link :to="`/reports/certificate/${slotProps.data.id}`"><Button icon="pi pi-fw pi-print" class="p-button-rounded p-button-secondary p-mr-2" /></router-link>
                    </template>
                </Column>
            </DataTable>
            <Paginator :rows="pagination.per_page" :totalRecords="pagination.total" @page="fetchRegistrations($event)"></Paginator>
        </Panel>
    </div>
</template>

<script>

import MyBreadcrumb from '../../components/MyBreadcrumb.vue';
import DataTable from 'primevue/datatable/sfc';
import Column from 'primevue/column/sfc';
import FileUpload from 'primevue/fileupload/sfc';
import Paginator from 'primevue/paginator/sfc';
import Panel from 'primevue/panel/sfc';
import Button from 'primevue/button/sfc';
import InputText from 'primevue/inputtext/sfc';
import Toolbar from 'primevue/toolbar/sfc';
import Calendar from 'primevue/calendar/sfc';
import Dropdown from 'primevue/dropdown/sfc';
import Tag from 'primevue/tag/sfc';

import { reactive, ref, toRefs } from 'vue'
import Swal from 'sweetalert2'

import {  getRegistrationCertificates } from '../../api/vaccination'

export default {
    setup() {

        const search = ref('')
        const state = reactive({
            registrations: [],
            pagination: {}
        })
        
        const fetchRegistrations = (event) => {

            Swal.fire({
                title: 'Please wait...',
                willOpen () {
                Swal.showLoading ()
                },
                didClose () {
                Swal.hideLoading()
                },
                showConfirmButton: false,
                allowOutsideClick: false,
                allowEscapeKey: false,
                allowEnterKey: false
            })

            const { page } = event

            getRegistrationCertificates({page: page+1, search: search.value}).then(res => {

                const { data: { data: { data, pagination } } } = res

                data.map(item => {
                   item.first_name = item.first_name.toUpperCase();
                   if(item.middle_name!=null) item.middle_name = item.middle_name.toUpperCase();
                   item.last_name = item.last_name.toUpperCase();
                })

                Object.assign(state, {
                    registrations: data, 
                    pagination
                })

                Swal.close();

            }).catch(err => {
                
                if(err?.response?.status === 500){
                    Swal.fire({
                        title: '<p>Oops...</p>',
                        icon: 'error',
                        html: '<h5 style="font-size: 18px;">Check your internet connection and try again</h5>',
                        showCancelButton: false,
                        focusConfirm: true,
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        allowEnterKey: false,
                        confirmButtonText: 'Reresh this page',
                    }).then((result) => {
                        if (result.value) {
                            location.reload();
                        }
                    })
                }
            })
        }

        return {
            search,
            ...toRefs(state),
            fetchRegistrations
        }

    },  
    components: {
        MyBreadcrumb,
        DataTable,
        Column,
        FileUpload,
        Paginator,
        Panel,
        Button,
        InputText,
        Toolbar,
        Calendar,
        Dropdown,
        Tag
    },
    data() {
        return {
            home: {icon: 'pi pi-home', to: '/reports/list/certificate'},
            items: [{label: 'Certificates', to: '/reports/list/certificate'}]
        }
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
    
    .terminal {
        background-color: #272727;
        padding: 10px;
    }

    .fakeButtons {
        height: 10px;
        width: 10px;
        border-radius: 50%;
        border: 1px solid #000;
        position: relative;
        top: 6px;
        left: 6px;
        background-color: #ff3b47;
        border-color: #9d252b;
        display: inline-block;
    }

    .fakeMinimize {
        left: 11px;
        background-color: #ffc100;
        border-color: #9d802c;
    }

    .fakeZoom {
        left: 16px;
        background-color: #00d742;
        border-color: #049931;
    }

    .fakeMenu {
        box-sizing: border-box;
        height: 25px;
        background-color: #bbb;
        margin: 0 auto;
        border-top-right-radius: 5px;
        border-top-left-radius: 5px;
    }

    .fakeScreen {
        height: 350px;
        overflow: scroll;
        background-color: #151515;
        box-sizing: border-box;
        margin: 0 auto;
        padding: 20px;
        border-bottom-left-radius: 5px;
        border-bottom-right-radius: 5px;
    }

    .terminal .info {
        color:#1899aa;
        font-size: 1em;
        font-family: monospace;
        white-space: normal;
    }

    .terminal .success {
        color:#0bdb0b;
        font-size: 1em;
        font-family: monospace;
        white-space: normal;
    }    

    .terminal .parent-error {
        color:#db343f;
        font-size: 1em;
        font-family: monospace;
        white-space: normal;
    }

    .terminal .child-error {
        color:#b11018;        
        margin-left: 1.5rem;
        font-size: 1.1em;
        font-family: monospace;
        white-space: normal; 
    }    
</style>