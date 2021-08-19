<template>
    <div>
        <MyBreadcrumb :home="home" :items="items" />        
        <Panel header="List" class="p-mt-2">
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
                <DataTable class="p-mt-2 p-datatable-sm" :value="registrations" responsiveLayout="scroll">
                    <Column field="qr_pass_id" header="Napanam ID No"></Column>
                    <Column field="first_name" header="First Name"></Column>
                    <Column field="middle_name" header="Middle Name"></Column>
                    <Column field="last_name" header="Last Name"></Column>
                    <Column field="monitoring_status" header="Monitoring For">
                        <template #body="slotProps">
                            <Tag class="p-mr-2" :severity="slotProps.data.monitoring_status" :value="slotProps.data.monitoring_for_dose" rounded></Tag>
                        </template>
                    </Column>
                    <Column field="townCity" header="Municipality/City"></Column>
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

import { reactive, ref, toRefs } from 'vue'
import { getRegistrationsList } from '../../api/vaccination'

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
    },
    setup(props) {

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
                data.map(item => {
                   item.first_name = item.first_name.toUpperCase();
                   if(item.middle_name!=null) item.middle_name = item.middle_name.toUpperCase();
                   item.last_name = item.last_name.toUpperCase();
                })

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
            phase
        }
        
    },
    data() {
        return {
            home: {icon: 'pi pi-search', to: `${this.$route.fullPath}`},
            items: [],
        }
    },
    beforeUpdate() {
        console.log('Update')
    },
    mounted() {
        this.fetchRegistrations({ page: 0 })
    }
}
</script>