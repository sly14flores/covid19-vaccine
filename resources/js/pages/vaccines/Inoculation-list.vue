<template>
    <div>
        <MyBreadcrumb :home="home" :items="items" />
        <Panel class="p-mt-4" header="Upload" :toggleable="true" :collapsed="true">
            <FileUpload name="excel" :url="uploadUrl" :multiple="false" withCredentials="true" @before-send="setBeforeSend" @upload="uploadComplete" @error="uploadError" :maxFileSize="24000000">
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
        <Panel header="List" class="p-mt-4">
            <div class="p-grid">
                <div class="p-sm-12 p-md-6 p-lg-4">
                    <div class="p-inputgroup">
                        <span class="p-inputgroup-addon">
                            <i class="pi pi-search"></i>
                        </span>
                        <InputText v-model="search" placeholder="QR, First name, Middle name, Last name" />
                    </div>
                </div>
                <div class="p-field p-col-12 p-md-2">
                    <label for="basic">&nbsp;</label>
                    <Button label="Search" @click="fetchRegistrations({page: 0})" />
                </div>                
            </div>
            <BlockUI :blocked="blocked">
                <DataTable class="p-mt-4" :value="registrations" responsiveLayout="scroll">
                    <Column field="qr_pass_id" header="Napanam ID No" :sortable="true"></Column>
                    <Column field="first_name" header="First Name" :sortable="true"></Column>
                    <Column field="middle_name" header="Middle Name" :sortable="true"></Column>
                    <Column field="last_name" header="Last Name" :sortable="true"></Column>
                    <Column field="status" header="Inoculation For" :sortable="true">
                        <template #body="slotProps">
                            <Tag class="p-mr-2" :severity="slotProps.data.status" :value="slotProps.data.inoculation_for_dose" rounded></Tag>
                        </template>
                    </Column>
                    <Column field="townCity" header="Municipality/City" :sortable="true"></Column>
                    <Column field="qr_pass_id" header="Actions">
                        <template #body="slotProps">
                            <router-link :to="`/vaccines/${phase}/${slotProps.data.qr_pass_id}`"><Button icon="pi pi-fw pi-eye" class="p-button-rounded p-button-success p-mr-2" /></router-link>
                        </template>
                    </Column>
                </DataTable>
                <Paginator :rows="pagination.per_page" :totalRecords="pagination.total" @page="fetchRegistrations($event)"></Paginator>
            </BlockUI>
        </Panel>
    </div>
</template>

<script>

import MyBreadcrumb from '../../components/MyBreadcrumb.vue';
import Panel from 'primevue/panel/sfc';
import DataTable from 'primevue/datatable/sfc';
import Paginator from 'primevue/paginator/sfc';
import Column from 'primevue/column/sfc';
import Button from 'primevue/button/sfc';
import InputText from 'primevue/inputtext/sfc';
import BlockUI from 'primevue/blockui/sfc';
import Tag from 'primevue/tag/sfc';
import FileUpload from 'primevue/fileupload/sfc';

import { reactive, ref, toRefs, onMounted, onBeforeUnmount } from 'vue'
import { useStore } from 'vuex'
import { getRegistrationsList } from '../../api/vaccination'

import { api_url } from '../../url.js'
const uploadUrl = `${api_url}/api/doh/vaccines/inoculation/upload`

const checkVASData = (payload) => {
    return axios.post(`${api_url}/api/doh/vaccines/inoculation/check`,{...payload})
}

import Swal from 'sweetalert2'

export default {
    props: ['phase'],
    name: 'VaccinationList',
    components: {
        MyBreadcrumb,
        Panel,
        DataTable,
        Paginator,
        Column,
        Button,
        InputText,
        BlockUI,
        Tag,
        FileUpload,
    },
    setup(props) {

        const store = useStore()

        const consoles = reactive([])

        // consoles.push({class: 'info', text: 'Lorem, Ipsum'})

        /**
         * Subscribe to monitor channel
         */
        // const privateChannel = window.Echo.private(
        //     `vaccines.import.inoculation.${store.state.profile.id}`,
        // );        

        // privateChannel.listen('.monitor', event => {
        //     console.log(event)
        // });

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
        
        //     

        const blocked = ref(false)

        const phase = props?.phase

        const search = ref('')
        const state = reactive({
            registrations: [],
            pagination: {}
        })

        const fetchRegistrations = (event) => {

            const { page } = event

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

            getRegistrationsList({page: page+1, search: search.value, phase}).then(res => {
                const { data: { data: { data, pagination } } } = res
                Object.assign(state, {registrations: data, pagination})
                Swal.close()
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
            fetchRegistrations,
            blocked,
            phase,
            uploadUrl,
            consoles,
        }
        
    },
    data() {
        return {
            home: {icon: 'pi pi-search', to: `${this.$route.fullPath}`},
            items: [],
            checking: false,
            import: {
                excel: null,
                path: null
            }
        }
    },
    computed: {
        showTerminal() {
            return this.import.excel !== null
        }
    },
    methods: {
        setBeforeSend(e) {
            
            e.xhr.setRequestHeader('Accept', 'application/json')
            e.xhr.setRequestHeader('Authorization', `Bearer ${this.$store.state.profile.token}`)

        },
        uploadComplete(e) {

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
            this.consoles.push({class: 'info', text: "Analyzing data structures..."})

            checkVASData(this.import).then(res => {
                this.checking = false              
            }).catch(e => {
                this.checking = false
                this.consoles.push({class: 'error', text: "Something went wrong, please try again"})
            })

        },       
    },
    beforeUpdate() {
        console.log('Update')
    },
    mounted() {
        this.fetchRegistrations({ page: 0 })
    }   
}
</script>

<style>

.terminal {
    height: 300px;
    overflow: scroll;
    font-family: monospace;
    background-color: #212121!important;
    color: #ffffff!important;
    padding: 5px 10px;
}

.terminal p {
    margin: 0!important;
    padding: 0!important;
}

.terminal .success {
    color: #00FF00;
}

.terminal .info {
    color: #00d9ff;
}

.terminal .error {
    color: #ff0000;
}

</style>