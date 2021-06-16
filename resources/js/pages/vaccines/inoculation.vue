<template>
    <div>
        <MyBreadcrumb :home="home" :items="items" />
        <Toolbar class="header-bg">
            <template #left>
                <div class="p-grid p-col-12">
                    <h4 class="p-text-bold">INOCULATION</h4>
                </div>
            </template>

            <template #right>
                <Button label="Save" class="p-button-primary p-mr-2" />
                <Button label="Discard" class="p-button-danger" @click="discard" />
            </template>
        </Toolbar>
        <div class="p-grid">
            <div class="p-col-12 p-mt-2">
                <form>
                    <div class="card p-fluid">
                        <div class="p-fluid p-formgrid p-grid">
                            <div class="p-field p-col-10 p-md-11">
                                <h2 class="p-text-bold p-ml-4 name-size"> [263001] DELA CRUZ, JUAN LUNA JR. </h2>
                            </div>
                        </div>
                        <div class="p-fluid p-formgrid p-grid">
                            <div class="p-field p-col-6 p-md-1">
                                <p class="p-text-bold p-ml-4">Age</p>
                                <p class="p-text-bold p-ml-4">Gender</p>
                            </div>
                            <div class="p-field p-col-10 p-md-1 hide-div">
                                <div class="vertical-line"></div>
                            </div>
                            <div class="p-field p-col-6 p-md-1">
                                <p class="p-text-bold">24</p>
                                <p class="p-text-bold">Female</p>
                            </div>

                            <div class="p-field p-col-10 p-md-3 hide-div"></div>

                            <div class="p-field p-col-6 p-md-2">
                                <p class="p-text-bold p-ml-4">Date of Birth</p>
                                <p class="p-text-bold p-ml-4">Contact Number</p>
                            </div>
                            <div class="p-field p-col-10 p-md-1 hide-div">
                                <div class="vertical-line"></div>
                            </div>
                            <div class="p-field p-col-6 p-md-1">
                                <p class="p-text-bold">01-01-1990</p>
                                <p class="p-text-bold">09123456789</p>
                            </div>
                        </div>
                        <hr />
                        <TabView>
                            <TabPanel header="Inoculation">
                                <div class="p-fluid p-formgrid p-grid">
                                    <div class="p-field p-col-12 p-md-4">
                                        <label>Vaccine </label>
                                        <Dropdown class="p-shadow-1 p-inputtext-sm" />
                                    </div>
                                    <div class="p-field p-col-12 p-md-4">
                                        <label>Date Inoculated </label>
                                        <Calendar :manualInput="false" class="p-shadow-1 p-inputtext-sm" />
                                    </div>
                                    <div class="p-field p-col-12 p-md-4">
                                        <label>Time Inoculated</label>
                                        <Calendar :manualInput="false" class="p-shadow-1 p-inputtext-sm" :timeOnly="true" hourFormat="12" />
                                    </div>
                                </div>
                                <div class="p-fluid p-formgrid p-grid">
                                    <div class="p-field p-col-12 p-md-4">
                                        <label>Injection Site </label>
                                        <Dropdown class="p-shadow-1 p-inputtext-sm" />
                                    </div>
                                    <div class="p-field p-col-12 p-md-4">
                                        <label>Lot No. </label>
                                        <InputText class="p-shadow-1 p-inputtext-sm" type="text" />
                                    </div>
                                    <div class="p-field p-col-12 p-md-4">
                                        <label>Batch No.</label>
                                        <InputText class="p-shadow-1 p-inputtext-sm" type="text" />
                                    </div>
                                </div>
                                <div class="p-fluid p-formgrid p-grid">
                                    <div class="p-field p-col-12 p-md-4">
                                        <label>Bakuna Center (CBCR ID) </label>
                                        <Dropdown class="p-shadow-1 p-inputtext-sm" />
                                    </div>
                                    <div class="p-field p-col-12 p-md-4">
                                        <label>Vaccinator </label>
                                        <Dropdown class="p-shadow-1 p-inputtext-sm" />
                                    </div>
                                    <div class="p-field p-col-12 p-md-4">
                                        <label>Encoder</label>
                                        <Dropdown class="p-shadow-1 p-inputtext-sm" />
                                    </div>
                                </div>
                            </TabPanel>
                            <TabPanel header="Vital Signs">
                                Vital Signs
                            </TabPanel>
                        </TabView>
                        <hr />
                        <h4 class="header-blue p-text-bold">DILUENT</h4>
                        <div class="p-fluid p-formgrid p-grid">
                            <div class="p-field p-col-12 p-md-4">
                                <label>Diluent</label>
                                <Dropdown class="p-shadow-1 p-inputtext-sm" />
                            </div>
                            <div class="p-field p-col-12 p-md-4">
                                <label>Date of Reconstitution </label>
                                <Calendar :manualInput="false" class="p-shadow-1 p-inputtext-sm" />
                            </div>
                            <div class="p-field p-col-12 p-md-4">
                                <label>Time of Reconstitution</label>
                                <Calendar :manualInput="false" class="p-shadow-1 p-inputtext-sm" :timeOnly="true" hourFormat="12" />
                            </div>
                        </div>
                        <div class="p-fluid p-formgrid p-grid">
                            <div class="p-field p-col-12 p-md-4"></div>
                            <div class="p-field p-col-12 p-md-4">
                                <label>Diluent Lot No. </label>
                                <InputText class="p-shadow-1 p-inputtext-sm" type="text" />
                            </div>
                            <div class="p-field p-col-12 p-md-4">
                                <label>Diluent Batch No.</label>
                                <InputText class="p-shadow-1 p-inputtext-sm" type="text" />
                            </div>
                        </div>
                        <hr />
                        <h4 class="header-blue p-text-bold">Next Vaccination Schedule</h4>
                        <div class="p-fluid p-formgrid p-grid">
                            <div class="p-field p-col-12 p-md-4">
                                <label>Next Vaccination Schedule </label>
                                <Calendar :manualInput="false" class="p-shadow-1 p-inputtext-sm" />
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
import TabView from 'primevue/tabview/sfc';
import TabPanel from 'primevue/tabpanel/sfc';

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
        Card,
        TabView,
        TabPanel
    },
    data() {
        return {
            home: {icon: 'pi pi-search', to: '/vaccines/list/inoculation'},
            items: [{label: 'Inoculation', to: `${this.$route.fullPath}`}]
        }
    },
    methods: {
        discard(){

            this.$router.push('/vaccines/list/inoculation')
            
        }
    }
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
@media only screen and (max-width: 600px) {
    .hide-div {
        display: none;
    }
    .name-size{
        font-size: 20px;
        text-align: center;
    }
}

</style>