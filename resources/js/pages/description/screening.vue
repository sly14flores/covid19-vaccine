<template>
    <div>
        <MyBreadcrumb :home="home" :items="items" />
        <Toolbar class="header-bg">
            <template #left>
                <div class="p-grid p-col-12">
                    <h4 class="p-text-bold">SCREENING</h4>
                </div>
            </template>

            <template #right>
                <Button label="Save" class="p-button-primary p-mr-2" />
                <Button label="Discard" class="p-button-danger" />
            </template>
        </Toolbar>
        <div class="p-grid">
            <div class="p-col-12 p-mt-2">
                <form>
                    <div class="card p-fluid">
                        <div class="p-fluid p-formgrid p-grid">
                            <div class="p-field p-col-10 p-md-11">
                                <h2 class="p-text-bold p-ml-4"> [263001] DELA CRUZ, JUAN LUNA JR. </h2>
                            </div>
                        </div>
                        <div class="p-fluid p-formgrid p-grid">
                            <div class="p-field p-col-10 p-md-1">
                                <p class="p-text-bold p-ml-4">Age</p>
                                <p class="p-text-bold p-ml-4">Gender</p>
                            </div>
                            <div class="p-field p-col-10 p-md-1">
                                <div class="vertical-line"></div>
                            </div>
                            <div class="p-field p-col-10 p-md-1">
                                <p class="p-text-bold">24</p>
                                <p class="p-text-bold">Female</p>
                            </div>

                            <div class="p-field p-col-10 p-md-3"></div>

                            <div class="p-field p-col-10 p-md-2">
                                <p class="p-text-bold">Date of Birth</p>
                                <p class="p-text-bold">Contact Number</p>
                            </div>
                            <div class="p-field p-col-10 p-md-1">
                                <div class="vertical-line"></div>
                            </div>
                            <div class="p-field p-col-10 p-md-1">
                                <p class="p-text-bold">01-01-1990</p>
                                <p class="p-text-bold">09123456789</p>
                            </div>
                        </div>
                        <hr />
                        <h4 class="header-blue p-text-bold">VITAL SIGNS</h4>
                        <div class="p-fluid p-formgrid p-grid">
                            <div class="p-field p-col-12 p-md-4">
                                <label>Date Collected </label>
                                <Calendar :manualInput="false" class="p-shadow-1 p-inputtext-sm" />
                            </div>
                            <div class="p-field p-col-12 p-md-4">
                                <label>Time Collected </label>
                                <Calendar :manualInput="false" class="p-shadow-1 p-inputtext-sm" :timeOnly="true" hourFormat="12" />
                            </div>
                            <div class="p-field p-col-12 p-md-4">
                                <label>Temperature (Celsius) </label>
                                <InputText class="p-shadow-1 p-inputtext-sm" type="text" />
                            </div>
                        </div>
                        <div class="p-fluid p-formgrid p-grid">
                            <div class="p-field p-col-12 p-md-4">
                                <label>By: Systolic </label>
                                <InputText class="p-shadow-1 p-inputtext-sm" type="text" />
                            </div>
                            <div class="p-field p-col-12 p-md-4">
                                <label>Pulse Rate </label>
                                <InputText class="p-shadow-1 p-inputtext-sm" type="text" />
                            </div>
                            <div class="p-field p-col-12 p-md-4">
                                <label>O2 Sat</label>
                                <InputText class="p-shadow-1 p-inputtext-sm" type="text" />
                            </div>
                        </div>
                        <div class="p-fluid p-formgrid p-grid">
                            <div class="p-field p-col-12 p-md-4">
                                <label>BP: Diastolic </label>
                                <InputText class="p-shadow-1 p-inputtext-sm" type="text" />
                            </div>
                            <div class="p-field p-col-12 p-md-4">
                                <label>Respiratory Rate </label>
                                <InputText class="p-shadow-1 p-inputtext-sm" type="text" />
                            </div>
                            <div class="p-field p-col-12 p-md-4">
                                <label>Pain Score</label>
                                <InputText class="p-shadow-1 p-inputtext-sm" type="text" />
                            </div>
                        </div>
                        <hr />
                        <h4 class="header-blue p-text-bold">HEALTH DECLARTION FORM</h4>
                        <DataTable class="p-datatable-sm">
                            <Column field="value" header="Yes  /  No" headerStyle="width: 15%">
                                <template>
                                    <RadioButton :value="true" />
                                    <RadioButton class="p-ml-4" :value="false" />
                                </template>
                            </Column>
                            <Column field="description" header="Description"></Column>
                        </DataTable>
                        <div class="p-fluid p-formgrid p-grid">
                            <div class="p-field p-col-12 p-md-6">
                                <Card>
                                    <template #content>
                                        <div class="p-grid">
                                            <div class="p-field p-col-12 p-md-4">
                                                <p class="p-text-sm">Consent Received</p>
                                            </div>
                                            <div class="p-field p-col-12 p-md-3">
                                                <div class="p-field-radiobutton">
                                                    <RadioButton id="yes_consent" name="consent" />
                                                    <label for="yes_consent">Yes</label>
                                                </div>
                                            </div>
                                            <div class="p-field p-col-12 p-md-3">
                                                <div class="p-field-radiobutton">
                                                    <RadioButton id="no_consent" name="consent" />
                                                    <label for="no_consent">No</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="p-grid">
                                           <div class="p-field p-col-12 p-md-12">
                                                <label>Consent Received By</label>
                                                <Dropdown class="p-shadow-1 p-inputtext-sm"/>
                                            </div>
                                        </div>
                                    </template>
                                </Card>
                            </div>
                            <div class="p-field p-col-12 p-md-6">
                                <Card>
                                    <template #content>
                                        <div class="p-grid">
                                            <div class="p-field p-col-12 p-md-4">
                                                <p class="p-text-sm">Defer</p>
                                            </div>
                                            <div class="p-field p-col-12 p-md-3">
                                                <div class="p-field-radiobutton">
                                                    <RadioButton id="yes_defer" name="defer" />
                                                    <label for="yes_defer">Yes</label>
                                                </div>
                                            </div>
                                            <div class="p-field p-col-12 p-md-3">
                                                <div class="p-field-radiobutton">
                                                    <RadioButton id="no_defer" name="defer" />
                                                    <label for="no_defer">No</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="p-grid">
                                           <div class="p-field p-col-12 p-md-12">
                                                <label>Reason for Deferral</label>
                                                <Dropdown class="p-shadow-1 p-inputtext-sm"/>
                                            </div>
                                        </div>
                                    </template>
                                </Card>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import MyBreadcrumb from '../../components/MyBreadcrumb.vue';
import InputText from 'primevue/inputtext/sfc';
import Dropdown from 'primevue/dropdown/sfc';
import Button from 'primevue/button/sfc';
import Divider from 'primevue/divider/sfc';
import ToggleButton from 'primevue/togglebutton/sfc';
import RadioButton from 'primevue/radiobutton/sfc';
import Menubar from 'primevue/menubar/sfc';
import ConfirmDialog from 'primevue/confirmdialog/sfc';
import Checkbox from 'primevue/checkbox/sfc';
import Toolbar from 'primevue/toolbar/sfc';
import Calendar from 'primevue/calendar/sfc';
import DataTable from 'primevue/datatable/sfc';
import Column from 'primevue/column/sfc';
import Card from 'primevue/card/sfc';

export default {

    components: {
        MyBreadcrumb,
        InputText,
        Button,
        Divider,
        ToggleButton,
        Dropdown,
        RadioButton,
        Menubar,
        ConfirmDialog,
        Checkbox,
        Toolbar,
        Calendar,
        DataTable,
        Column,
        Card
    },
    data() {
        return {
            home: {icon: 'pi pi-search', to: '/description/screening'}
        }
    },
}
</script>

<style scoped>
.header-bg {
    background-color: #92c1bd;
}
.header-blue {
    color: #2f6e92;
}
.vertical-line {
    display: inline-block;
    border-left: 1px solid #ccc;
    margin: 0 10px;
    height: 50px;
}

</style>