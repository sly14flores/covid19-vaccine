<template>
    <div>
        <MyBreadcrumb :home="home" :items="items" />
        <Toolbar class="p-mt-2">
            <template #left>
                <div class=" p-fluid p-grid p-formgrid">
                    <div class="p-field p-col-12 p-md-3">
                        <label for="basic"><small>Napanam ID No, first name or last name</small></label>
                        <InputText class="p-shadow-1 p-inputtext-sm" v-model="search" placeholder="Search . . ." />
                    </div>
                    <div class="p-field p-col-12 p-md-2">
                        <label for="basic"><small>City/Municipality</small></label>
                        <Dropdown class="p-shadow-1 p-inputtext-sm" optionLabel="name" :options="municipalities" v-model="town_city" optionValue="id" :disabled="!isAdmin" />
                    </div>
                    <div class="p-field p-col-12 p-md-2">
                        <label for="basic"><small>Start Date:</small></label>
                        <Calendar class="p-shadow-1 p-inputtext-sm" id="start_date" v-model="start_date" />
                    </div>
                    <div class="p-field p-col-12 p-md-2">
                        <label for="basic"><small>End Date:</small></label>
                        <Calendar class="p-shadow-1 p-inputtext-sm" id="end_date" v-model="end_date" />
                    </div>
                    <div class="p-field p-col-12 p-md-1">
                        <label for="basic">&nbsp;</label>
                        <Button class="p-button-sm" label="Go!" />
                    </div>
                </div>
            </template>
            <template #right>
                <div class="p-fluid p-grid p-formgrid">
                    <div class="p-field p-col-12 p-md-12">
                        <Button class="p-button-sm p-mt-2 p-button-success" icon="pi pi-upload" label="Export to Excel" />
                    </div>
                </div>
            </template>
        </Toolbar>
        <Panel header="List" class="p-mt-2">
            <BlockUI :blocked="blocked">
                <DataTable class="p-datatable-sm" responsiveLayout="scroll">
                    <Column field="" header="Napanam ID No" :sortable="true"></Column>
                    <Column field="" header="First Name" :sortable="true"></Column>
                    <Column field="" header="Middle Name" :sortable="true"></Column>
                    <Column field="" header="Last Name" :sortable="true"></Column>
                    <Column field="" header="Date of Deferral" :sortable="true"></Column>
                    <Column field="" header="Reason" :sortable="true"></Column>
                    <Column field="" header="Last Name" :sortable="true"></Column>
                    <Column field="" header="City/Municipality" :sortable="true"></Column>
                </DataTable>
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
import BlockUI from 'primevue/blockui/sfc';
import FileUpload from 'primevue/fileupload/sfc';
import Toolbar from 'primevue/toolbar/sfc';
import Dropdown from 'primevue/dropdown/sfc';
import InputText from 'primevue/inputtext/sfc';
import Calendar from 'primevue/calendar/sfc';

export default {
    components: {
        MyBreadcrumb,
        Panel,
        DataTable,
        Paginator,
        Column,
        Button,
        BlockUI,
        FileUpload,
        Toolbar,
        InputText,
        Dropdown,
        Calendar
    },
    setup() {

    },
    data() {
        return {
            home: {icon: 'pi pi-file', to: `${this.$route.fullPath}`},
            items: [],
            start_date: new Date(),
            end_date: new Date(),
        }
    },
}
</script>