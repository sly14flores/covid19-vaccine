<template>
    <div>
        <MyBreadcrumb :home="home" :items="items" />
        <Toolbar class="header-bg">
            <template #left>
                <div class="p-grid p-col-12">
                    <h4 class="p-text-bold">MONITORING</h4>
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
                            <div class="p-field p-col-12 p-md-2 p-ml-4">
                                <label class="p-text-bold">Currently administering: </label>
                            </div>
                            <div class="p-field p-col-12 p-md-3">
                                <Dropdown class="p-shadow-1 p-inputtext-sm" />
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
                            <TabPanel header="Post Monitoring">
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
                                        <label>Vaccinator </label>
                                        <Dropdown class="p-shadow-1 p-inputtext-sm" />
                                    </div>
                                    <div class="p-field p-col-12 p-md-4">
                                        <label>Next Vaccination Schedule</label>
                                        <Dropdown class="p-shadow-1 p-inputtext-sm" />
                                    </div>
                                </div>
                            </TabPanel>
                            <TabPanel header="Personal Information">
                                Personal Information
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
                        <Toolbar>
                            <template #left>
                                <h4 class="header-blue p-text-bold">VITAL SIGNS</h4>
                            </template>
                            <template #right>
                                <Button type="button" @click="addRow" icon="pi pi-plus" class="p-button-sm p-button-secondary" />
                            </template>
                        </Toolbar>
                        <div v-for="row in rows" :key="row">
                            <hr />
                            <div class="p-fluid p-formgrid p-grid">
                                <div class="p-field p-col-12 p-md-2">
                                    <label><small>Date Collected </small></label>
                                    <Calendar v-model="row.date_collected" modelValue="{{row.date_collected}}" :manualInput="false" class="p-shadow-1 p-inputtext-sm" />
                                </div>
                                <div class="p-field p-col-12 p-md-2">
                                    <label><small>Time Collected </small> </label>
                                    <Calendar :manualInput="false" class="p-shadow-1 p-inputtext-sm" :timeOnly="true" hourFormat="12" />
                                </div>
                                <div class="p-field p-col-12 p-md-1">
                                    <label><small>By: Systolic </small></label>
                                    <InputText class="p-shadow-1 p-inputtext-sm" type="text" />
                                </div>
                                <div class="p-field p-col-12 p-md-1">
                                    <label><small>BP: Diastolic</small></label>
                                    <InputText class="p-shadow-1 p-inputtext-sm" type="text" />
                                </div>
                                <div class="p-field p-col-12 p-md-1">
                                    <label><small>Pulse Rate </small></label>
                                    <InputText class="p-shadow-1 p-inputtext-sm" type="text" />
                                </div>
                                <div class="p-field p-col-12 p-md-1">
                                    <label><small>Respiratory Rate</small></label>
                                    <InputText class="p-shadow-1 p-inputtext-sm" type="text" />
                                </div>
                                <div class="p-field p-col-12 p-md-1">
                                    <label><small>Temp. (Celsius) </small></label>
                                    <InputText class="p-shadow-1 p-inputtext-sm" type="text" />
                                </div>
                                <div class="p-field p-col-12 p-md-1">
                                    <label><small>O2 Sat</small></label>
                                    <InputText class="p-shadow-1 p-inputtext-sm" type="text" />
                                </div>
                                <div class="p-field p-col-12 p-md-1">
                                    <label><small>Pain Score</small></label>
                                    <InputText class="p-shadow-1 p-inputtext-sm" type="text" />
                                </div>
                                <div class="p-field p-col-12 p-md-1">
                                    <Button type="button" @click="removeRow" icon="pi pi-trash" class="p-button-sm p-button-danger p-mt-4" />
                                </div>
                            </div>
                        </div>
                        <hr />
                        <h4 class="header-blue p-text-bold">ADVERSED EVENTS</h4>
                        <div class="p-fluid p-formgrid p-grid">
                            <div class="p-field p-col-12 p-md-6">
                                <Card>
                                    <template #content>
                                        <div class="p-grid">
                                            <div class="p-field p-col-12 p-md-4">
                                                <p class="p-text-sm">Adverse Event</p>
                                            </div>
                                            <div class="p-field p-col-12 p-md-3">
                                                <div class="p-field-radiobutton">
                                                    <RadioButton id="yes_adverse" name="adverse" />
                                                    <label for="yes_adverse">Yes</label>
                                                </div>
                                            </div>
                                            <div class="p-field p-col-12 p-md-3">
                                                <div class="p-field-radiobutton">
                                                    <RadioButton id="no_adverse" name="adverse" />
                                                    <label for="no_adverse">No</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="p-grid">
                                           <div class="p-field p-col-12 p-md-12">
                                                <label>Adverse Event Condition</label>
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
                                            <div class="p-field p-col-12 p-md-12">
                                                <label>Others: </label>
                                                <Textarea v-model="value" rows="3" cols="30" />
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
import TabView from 'primevue/tabview/sfc';
import TabPanel from 'primevue/tabpanel/sfc';
import Textarea from 'primevue/textarea/sfc';

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
        TabPanel,
        Textarea
    },
    data() {
        return {
            home: {icon: 'pi pi-search', to: '/vaccines/list/monitoring'},
            items: [{label: 'Monitoring', to: `${this.$route.fullPath}`}],
            rows: []
        }
    },
    methods: {
        discard(){

            this.$router.push('/vaccines/list/monitoring')
            
        },
        addRow(){

           this.rows.push({date_collected: ''});

        },
        removeRow(index){
            this. rows.splice(index, 1)
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