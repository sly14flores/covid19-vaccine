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
            <DataTable class="p-mt-4" :value="registrations" responsiveLayout="scroll">
                <Column field="qr_pass_id" header="Napanam ID No" :sortable="true"></Column>
                <Column field="first_name" header="First Name" :sortable="true"></Column>
                <Column field="middle_name" header="Middle Name" :sortable="true"></Column>
                <Column field="last_name" header="Last Name" :sortable="true"></Column>
                <Column field="townCity" header="Municipality/City" :sortable="true"></Column>
                <!-- <Column field="" header="Priority Group" :sortable="true"></Column> -->
                <Column field="id" header="Actions">
                    <!-- <template #body="slotProps"> -->
                        <!-- <router-link :to="`/registrations/registration/${slotProps.data.id}`"><Button icon="pi pi-fw pi-pencil" class="p-button-rounded p-button-success p-mr-2" /></router-link> -->
                        <!-- <Button icon="pi pi-trash" class="p-button-rounded p-button-danger" @click="deleteRegistration(slotProps.data.id)" /> -->
                    <!-- </template> -->
                </Column>
            </DataTable>
            <Paginator :rows="pagination.per_page" :totalRecords="pagination.total" @page="fetchRegistrations($event)"></Paginator>
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

import { reactive, ref, toRefs } from 'vue'
import { useRoute } from 'vue-router'
import { getRegistrationsList } from '../../api/vaccination'

export default {
    name: 'VaccinationList',
    components: {
        MyBreadcrumb,
        Panel,
        DataTable,
        Paginator,
        Column,
        Button,
        InputText,
    },
    setup() {

        const route = useRoute()
        const { params } = route

        const { phase } = params || null

        const search = ref('')
        const state = reactive({
            registrations: [],
            pagination: {}
        })

        const fetchRegistrations = (event) => {

            const { page } = event

            getRegistrationsList({page: page+1, search: search.value}).then(res => {
                const { data: { data: { data, pagination } } } = res
                Object.assign(state, {registrations: data, pagination})
            }).catch(err => {

            })

        }

        return {
            search,
            ...toRefs(state),
            fetchRegistrations,
        }
        
    },
    data() {
        return {
            home: {icon: 'pi pi-home', to: '/description/list'},
            items: [],
        }
    },
    mounted() {
        this.fetchRegistrations({ page: 0 })
    }
}
</script>