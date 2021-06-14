<template>
    <div>
        <MyBreadcrumb :home="home" :items="items" />
        <div class="p-grid p-mt-1">
            <div class="p-lg-12 p-md-12 p-sm-12">
                <Panel header="Upload" :toggleable="true" :collapsed="true">
                    <FileUpload name="excel" :url="uploadUrl" :multiple="false" withCredentials="true" @before-send="setBeforeSend" @upload="uploadComplete" @error="uploadError" :maxFileSize="24000000">
                        <template #empty>
                            <div v-if="showTerminal">
                                <div class="p-d-flex p-p-3">
                                    <Button type="Button" class="p-button-warning p-mr-2" :disabled="checking" @click="closeTerminal">Close</Button>
                                    <Button type="Button" label="Start Import" class="p-button-danger p-ml-auto" :disabled="checking" @click="checkData" />
                                </div>                     
                                <div class="terminal">
                                    <div class=fakeMenu>
                                        <div class="fakeButtons fakeClose"></div>
                                        <div class="fakeButtons fakeMinimize"></div>
                                        <div class="fakeButtons fakeZoom"></div>
                                    </div>
                                    <div class="fakeScreen">
                                        <p class="info" v-if="infoMessage!=null">{{ infoMessage }}</p>
                                        <p class="success" v-if="successMessage!=null">{{ successMessage }}</p>
                                        <p class="success" v-for="(importLog,i) in importLogs" :key="i">{{importLog}}</p>
                                        <div class="parent-error" v-for="errorLog in errorLogs" :key="errorLog.index">
                                            {{ errorLog.for }}                                            
                                            <p class="child-error" v-for="(log,i) in errorLog.invalid" :key="i">{{ log }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </FileUpload>
                </Panel>
            </div>
        </div>

        <Toolbar class="p-mb-2">
            <template #left>
                <div class=" p-fluid p-grid p-formgrid">
                    <div class="p-field p-col-12 p-md-4">
                        <label for="basic">City/Municipality</label>
                        <Dropdown class="p-shadow-1" optionLabel="name" :options="municipalities" v-model="town_city" optionValue="id" :disabled="!isAdmin" />
                    </div>
                    <div class="p-field p-col-12 p-md-3">
                        <label for="basic">Start Date:</label>
                        <Calendar class="p-shadow-1" id="start_date" v-model="start_date" />
                    </div>
                    <div class="p-field p-col-12 p-md-3">
                        <label for="basic">End Date:</label>
                        <Calendar class="p-shadow-1" id="end_date" v-model="end_date" />
                    </div>
                    <div class="p-field p-col-12 p-md-2">
                        <label for="basic">&nbsp;</label>
                        <Button label="Go!" @click="filterRegistrations" />
                    </div>
                </div>
            </template>
            <template #right>
                <div class="p-fluid p-grid p-formgrid">
                    <div class="p-field p-col-12 p-md-12">
                       <button  type="button" class="p-mr-2 p-mb-2 p-mt-4 p-button p-component p-button-success" @click="exportToExcel">
                            <i class="pi pi-upload"></i>&nbsp; Export to Excel
                        </button>
                    </div>
                </div>
            </template>
        </Toolbar>
        
        <Panel header="List">
            <div class="p-grid">
                <div class="p-sm-12 p-md-6 p-lg-4">
                    <div class="p-inputgroup">
                        <span class="p-inputgroup-addon">
                            <i class="pi pi-search"></i>
                        </span>
                        <InputText v-model="search" placeholder="Quick search QR, first name, or last name" />
                    </div>
                </div>
            </div>
            <DataTable :value="registrations" responsiveLayout="scroll">
                <Column field="qr_pass_id" header="Napanam ID No" sortable="true"></Column>
                <Column field="first_name" header="First Name" sortable="true"></Column>
                <Column field="middle_name" header="Middle Name" sortable="true"></Column>
                <Column field="last_name" header="Last Name" sortable="true"></Column>
                <Column field="townCity" header="Municipality/City" sortable="true"></Column>
                <!-- <Column field="" header="Priority Group" sortable="true"></Column> -->
                <Column field="id" header="Actions">
                    <template #body="slotProps">
                        <router-link :to="`/registrations/registration/${slotProps.data.id}`"><Button icon="pi pi-fw pi-pencil" class="p-button-rounded p-button-success p-mr-2" /></router-link>
                        <Button icon="pi pi-trash" class="p-button-rounded p-button-danger" @click="deleteRegistration(slotProps.data.id)" />
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

import { useStore } from 'vuex'
import { watch } from 'vue'

import { api_url } from '../../url.js'
const uploadUrl = `${api_url}/api/doh/upload/excel`

export default {
    setup() {

        const store = useStore()
        const { state, dispatch } = store

        const downloadUrl = `${api_url}/home/reports/registrations`        
        
        dispatch('registrations/GET_SELECTIONS')

        watch(
            () => state.importData.excel,
            (data, prevData) => {
                if (data==null) {
                    dispatch('registrations/GET_REGISTRATIONS', { page: 0 })
                }
            }
        )

        return {
            uploadUrl,
            downloadUrl
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
        Dropdown
    },
    data() {
        return {
            home: {icon: 'pi pi-home', to: '/registrations'},
            items: [{label: 'Registrations', to: '/registrations'}],
            search: '',
            start_date: null,
            end_date: new Date(),
            province: "_0133_LA_UNION",
            town_city: 'all'
        }
    },
    computed: {
        registrations() {
            return this.$store.state.registrations.registrations.filter(registration => {
                return registration.qr_pass_id.toLowerCase().includes(this.search.toLowerCase()) ||
                    registration.first_name.toLowerCase().includes(this.search.toLowerCase()) ||
                    registration.last_name.toLowerCase().includes(this.search.toLowerCase())
            })
        },
        pagination() {
            return this.$store.state.registrations.pagination
        },
        showTerminal() {
            return this.$store.state.importData.excel != null
        },
        errorLogs() {
            return this.$store.state.importData.errorLogs
        },
        checking() {
            return this.$store.state.importData.checking
        },
        infoMessage() {
            return this.$store.state.importData.infoMessage
        },
        successMessage() {
            return this.$store.state.importData.successMessage
        },
        data() {
            return this.$store.state.importData.data
        },
        importLogs() {
            return this.$store.state.importData.importLogs
        },
        provinces(){
            return this.$store.state.registrations.selections.addresses.province_value
        },
        municipalities() {

            if (!this.provinces) return []

            const province = this.provinces.filter(province => {
                return province.id == this.province
            })

            if (province.length==0) return []

            const municipalities = [
                {
                    id: 'all',
                    code: 0,
                    name: "All",
                    provCode: '',
                    provId: '',
                    barangays: [],
                },                
                ...province[0].municipalities
            ]

            return municipalities

        },
        isAdmin() {
            return this.$store.state.profile.is_admin
        }           
    },
    methods: {
        currentDate() {
            
            const month_names = ["JANUARY", "FEBRUARY", "MARCH", "APRIL", "MAY", "JUNE",
            "JULY", "AUGUST", "SEPTEMBER", "OCTOBER", "NOVEMBER", "DECEMBER"
            ];

            const current = new Date();

            const date = month_names[current.getMonth()]+' '+current.getDate()+', '+current.getFullYear();
            const dateNow = date;
            
            return dateNow;
        },
        filterRegistrations() {
            this.fetchRegistrations({ page: 0 })
        },
        fetchRegistrations(event) {
            // event.page: New page number
            // event.first: Index of first record
            // event.rows: Number of rows to display in new page
            // event.pageCount: Total number of pages
            const { page } = event
            this.$store.dispatch('registrations/GET_REGISTRATIONS', { page, town_city: this.town_city, start_date: this.start_date.toLocaleDateString(), end_date: this.end_date.toLocaleDateString() })
        },
        deleteRegistration(id) {
            this.$confirm.require({
                key: 'confirmDelete',
                message: 'Are you sure you want to delete this record?',
                header: 'Confirmation',
                icon: 'pi pi-exclamation-triangle',
                accept: () => {
                    this.$store.dispatch('registrations/DELETE_REGISTRATION', {id})
                },
                reject: () => {
                    //callback to execute when hospital rejects the action
                }
            });
        },
        setBeforeSend(e) {
            
            e.xhr.setRequestHeader('Accept', 'application/json')
            e.xhr.setRequestHeader('Authorization', `Bearer ${this.$store.state.profile.token}`)

        },
        uploadComplete(e) {

            const { xhr: { response } } = e

            const data = JSON.parse(response)

            const { data: { filename, path } } = data

            this.$store.dispatch('importData/EXCEL',{ excel: filename, path })
            this.$store.dispatch('importData/INFO',"Excel uploaded, click 'START IMPORT' to begin")

        },
        uploadError(e) {
            
            const { xhr: { response } } = e

            const data = JSON.parse(response)

            const { message } = data

        },
        checkData() {

            this.$store.dispatch('importData/CHECK_DATA')

        },
        closeTerminal() {

            this.$store.dispatch('importData/INIT')

        },
        exportToExcel() {

            window.open(`${this.downloadUrl}?town_city=${this.town_city}&start_date=${this.start_date.toLocaleDateString()}&end_date=${this.end_date.toLocaleDateString()}`)

        }
    },
    created() {
        
        const date = new Date()
        date.setDate(1)

        this.start_date = date

        if (!this.$store.state.profile.is_admin) {
            this.town_city = this.$store.state.profile.town_city_doh
        } else {
            this.town_city = 'all'
        }

    },
    mounted() {
        this.fetchRegistrations({ page: 0 })
    },
    
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