<template>
    <div>
        <MyBreadcrumb :home="home" :items="items" />
        <Panel class="p-mt-2 p-mb-2" header="Upload" :toggleable="true" :collapsed="true">
            <FileUpload name="excel" :url="uploadUrl" :multiple="false" :withCredentials="true" @before-send="setBeforeSend" @upload="uploadComplete" @error="uploadError" :maxFileSize="24000000">
                <template #empty>
                    <div class="p-d-flex p-p-3" v-if="showTerminal">
                        <Button type="Button" label="Start Import" class="p-button-danger p-ml-auto" :disabled="checking" @click="checkData" />
                    </div>
                </template>
            </FileUpload>
            <div id="terminal" class="terminal">
                <p v-for="(c, i) in consoles" :key="i" :class="c.class">{{c.text}}</p>
            </div>
        </Panel>
        <Toolbar class="p-mb-2">
            <template #left>
                <div class=" p-fluid p-grid p-formgrid">
                    <div class="p-field p-col-12 p-md-4">
                        <label for="basic"><small>Napanam ID No, first name or last name</small></label>
                        <InputText class="p-shadow-1 p-inputtext-sm" v-model="search" placeholder="Search . . ." />
                    </div>
                    <div class="p-field p-col-12 p-md-3">
                        <label for="basic"><small>Start Date:</small></label>
                        <Calendar class="p-shadow-1 p-inputtext-sm" id="start_date" v-model="start_date" />
                    </div>
                    <div class="p-field p-col-12 p-md-3">
                        <label for="basic"><small>End Date:</small></label>
                        <Calendar class="p-shadow-1 p-inputtext-sm" id="end_date" v-model="end_date" />
                    </div>
                    <div class="p-field p-col-12 p-md-2">
                        <label for="basic">&nbsp;</label>
                        <Button class="p-button-sm" label="Go!" @click="fetchDosages({page: 0})" />
                    </div>
                </div>
            </template>
            <template #right>
                <div class="p-fluid p-grid p-formgrid">
                    <div class="p-field p-col-12 p-md-12">
                        <Button class="p-button-sm p-mt-2 p-button-success" icon="pi pi-upload" label="Export to Excel" @click="exportToExcel" />
                    </div>
                </div>
            </template>
        </Toolbar>
        <Panel header="List">
            <DataTable class="p-datatable-sm" :value="registrations" responsiveLayout="scroll">
                <Column field="qr_pass_id" header="Napanam ID No"></Column>
                <Column field="first_name" header="First Name"></Column>
                <Column field="last_name" header="Last Name"></Column>
                <Column field="brand_name" header="Brand Name"></Column>
                <Column field="vaccinator" header="Vaccinator"></Column>
            </DataTable>
            <Paginator :rows="pagination.per_page" :totalRecords="pagination.total" @page="fetchDosages($event)"></Paginator>
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

import { reactive, ref, toRefs } from 'vue'
import { useStore } from 'vuex'
import { getDosages } from '../../api/vaccination'

import { api_url } from '../../url.js'

const uploadUrl = `${api_url}/api/doh/vaccines/inoculation/upload`

const checkVASData = (payload) => {
    return axios.post(`${api_url}/api/doh/vaccines/inoculation/check`,{...payload})
}

import Swal from 'sweetalert2'

export default {
    components: {
        MyBreadcrumb,
        Panel,
        DataTable,
        Paginator,
        Column,
        Button,
        FileUpload,
        Toolbar,
        InputText,
        Dropdown,
        Calendar
    },
    setup() {

        const store = useStore()
        const downloadUrl = `${api_url}/home/reports/vas`

        const consoles = reactive([])

        const publicChannel = window.Echo.channel(
            `vaccines.import.inoculation.${store.state.profile.id}`
        );

        publicChannel.listen('.monitor', event => {
            // console.log(event)
            const { payload } = event
            consoles.push({class: payload.class, text: payload.text})
            const t = document.querySelector('#terminal')
            t.scrollTo(0, t.scrollHeight)
        });
        
        const search = ref('')
        
        const date = new Date()
        date.setDate(1)

        const state = reactive({
            registrations: [],
            pagination: {},
            start_date: date,
            end_date: new Date()
        })

        const fetchDosages = (event) => {

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

            getDosages({page: page+1, search: search.value, start_date: state.start_date, end_date: state.end_date}).then(res => {

                const { data: { data: { data, pagination } } } = res
                data.map(item => {
                   item.first_name = item.first_name.toUpperCase();
                   item.middle_name = item.middle_name.toUpperCase();
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

        console.log(state)

        return {
            search,
            ...toRefs(state),
            downloadUrl,
            fetchDosages,
            uploadUrl,
            consoles,
        }

    },
    data() {
        return {
            home: {icon: 'pi pi-file', to: `${this.$route.fullPath}`},
            items: [],
            checking: false,
            import: {
                excel: null,
                path: null
            },
        }
    },
    mounted() {
        this.fetchDosages({ page: 0 });
    },
    computed: {
        showTerminal() {
            return this.import.excel !== null
        }
    },
    methods: {
        exportToExcel() {

            const user_id = this.$store.state.profile.id

            window.open(`${this.downloadUrl}?date=${this.start_date.toLocaleDateString()}&start_date=${this.start_date.toLocaleDateString()}&end_date=${this.end_date.toLocaleDateString()}&user_id=${user_id}`)
           
        },
        setBeforeSend(e) {
            
            e.xhr.setRequestHeader('Accept', 'application/json')
            e.xhr.setRequestHeader('Authorization', `Bearer ${this.$store.state.profile.token}`)

        },
        uploadComplete(e) {

            Object.assign(this, 'consoles', [])
            // this.consoles = []

            const { xhr: { response } } = e

            const data = JSON.parse(response)

            const { data: { filename, path } } = data

            this.import.excel = filename
            this.import.path = path
            this.checking = false

            this.consoles.push({class: 'info', text: "Excel uploaded, click 'START IMPORT' to begin"})

        },
        uploadError(e) {
            
            const { xhr: { response } } = e

            const data = JSON.parse(response)

            const { message } = data

            this.checking = false

            this.consoles.push({class: 'error', text: "Something went wrong, please try again"})

        },
        checkData() {

            this.checking = true
            // this.consoles.push({class: 'info', text: "Analyzing data structures..."})

            checkVASData(this.import).then(res => {
                this.checking = false              
            }).catch(e => {
                this.checking = false
                this.consoles.push({class: 'error', text: "Something went wrong, please try again"})
            })

        },
    }
}
</script>