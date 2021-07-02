<template>
    <div>
        <MyBreadcrumb :home="home" :items="items" />        
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
                    <Column  v-show="phase=='screening'" field="screening_for_dose" header="Screening For" :sortable="true"></Column>
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

import { reactive, ref, toRefs } from 'vue'
import { getRegistrationsList } from '../../api/vaccination'

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

            blocked.value = true

            getRegistrationsList({page: page+1, search: search.value, phase}).then(res => {
                const { data: { data: { data, pagination } } } = res
                Object.assign(state, {registrations: data, pagination})
                blocked.value = false
            }).catch(err => {
                blocked.value = false
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