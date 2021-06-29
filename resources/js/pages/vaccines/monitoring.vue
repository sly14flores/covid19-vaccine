<template>
    <div>
        <Toast class="p-mt-6" position="top-right" />
        <MyBreadcrumb :home="home" :items="items" />
        <Toolbar class="header-bg">
            <template #left>
                <div class="p-grid p-col-12">
                    <h4 class="p-text-bold">MONITORING</h4>
                    <p><i> Note: Field marked with an asterisk ( <i class="p-error">*</i> ) are required.</i></p>
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
                                <Dropdown class="p-shadow-1 p-inputtext-sm" :options="doses" optionLabel="name" optionValue="id" />
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
                        <TabView>
                            <TabPanel header="Post Monitoring">
                                <div class="p-fluid p-formgrid p-grid">
                                    <div class="p-field p-col-12 p-md-4">
                                        <label class="p-text-normal">Vaccine Name:</label>
                                        <p class="text-value">Pfizer</p>
                                    </div>
                                    <div class="p-field p-col-12 p-md-4">
                                        <label class="p-text-normal">Date Inoculated: </label>
                                        <p class="text-value">June 26, 2021</p>
                                    </div>
                                    <div class="p-field p-col-12 p-md-4">
                                        <label class="p-text-normal">Time: </label>
                                        <p class="text-value">05:00 Am</p>
                                    </div>
                                </div>
                                <div class="p-fluid p-formgrid p-grid">
                                    <div class="p-field p-col-12 p-md-4">
                                        <label class="p-text-normal">Injection Site:</label>
                                        <p class="text-value">Right</p>
                                    </div>
                                    <div class="p-field p-col-12 p-md-4">
                                        <label class="p-text-normal">Lot No.:</label>
                                        <p class="text-value">CMTV0123</p>
                                    </div>
                                    <div class="p-field p-col-12 p-md-4">
                                        <label class="p-text-normal">Batch No.:</label>
                                        <p class="text-value">CMTV0123</p>
                                    </div>
                                </div>
                                <div class="p-fluid p-formgrid p-grid">
                                    <div class="p-field p-col-12 p-md-4">
                                        <label class="p-text-normal">Vaccinator:</label>
                                        <p class="text-value">John Paul Balanon</p>
                                    </div>
                                    <div class="p-field p-col-12 p-md-4">
                                        <label class="p-text-normal">Next Vaccination Schedule:</label>
                                        <p class="text-value">June 30, 2021</p>
                                    </div>
                                </div>
                            </TabPanel>
                            <TabPanel header="Personal Information">
                                <div class="p-fluid p-formgrid p-grid">
                                    <div class="p-field p-col-12 p-md-4">
                                        <label class="p-text-normal">Region:</label>
                                        <p class="text-value">Ilocos</p>
                                    </div>
                                </div>
                                <div class="p-fluid p-formgrid p-grid">
                                    <div class="p-field p-col-12 p-md-4">
                                        <label class="p-text-normal">Province:</label>
                                        <p class="text-value">La Union</p>
                                    </div>
                                    <div class="p-field p-col-12 p-md-4">
                                        <label class="p-text-normal">City/Municipality:</label>
                                        <p class="text-value">San Fernando City</p>
                                    </div>
                                    <div class="p-field p-col-12 p-md-4">
                                        <label class="p-text-normal">Barangay:</label>
                                        <p class="text-value">Sevilla Norte</p>
                                    </div>
                                </div>
                                <div class="p-fluid p-formgrid p-grid">
                                    <div class="p-field p-col-12 p-md-4">
                                        <label class="p-text-normal">Street:</label>
                                        <p class="text-value">san eugenio aringay la union</p>
                                    </div>
                                    <div class="p-field p-col-12 p-md-4">
                                        <label class="p-text-normal">Occupation:</label>
                                        <p class="text-value">Government Employee</p>
                                    </div>
                                    <div class="p-field p-col-12 p-md-4">
                                        <label class="p-text-normal">Philhealth:</label>
                                        <p class="text-value">123123123</p>
                                    </div>
                                </div>
                            </TabPanel>
                        </TabView>
                        <TabView>
                            <TabPanel header="Diluent">
                                <div class="p-fluid p-formgrid p-grid">
                                    <div class="p-field p-col-12 p-md-4">
                                        <label class="p-text-normal">Diluent:</label>
                                        <p class="text-value">John Paul Balanon</p>
                                    </div>
                                    <div class="p-field p-col-12 p-md-4">
                                        <label class="p-text-normal">Date of Reconstitution:</label>
                                        <p class="text-value">June 02, 2021</p>
                                    </div>
                                    <div class="p-field p-col-12 p-md-4">
                                        <label class="p-text-normal">Time of Reconstitution:</label>
                                        <p class="text-value">June 02, 2021</p>
                                    </div>
                                </div>
                                <div class="p-fluid p-formgrid p-grid">
                                    <div class="p-field p-col-12 p-md-4">
                                        <label class="p-text-normal">Diluent Lot No.:</label>
                                        <p class="text-value">CMTV0123</p>
                                    </div>
                                    <div class="p-field p-col-12 p-md-4">
                                        <label class="p-text-normal">Diluent Batch No.:</label>
                                        <p class="text-value">CMTV0123</p>
                                    </div>
                                </div>
                            </TabPanel>
                        </TabView>
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
                                    <label><small>BP: Systolic </small></label>
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
                        <Toolbar>
                            <template #left>
                                <h4 class="header-blue p-text-bold">ADVERSED EVENTS</h4>
                            </template>
                        </Toolbar>
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
                                                <Dropdown :options="events" optionLabel="name" optionValue="id" class="p-shadow-1 p-inputtext-sm"/>
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

import { reactive, computed, toRefs, toRef, ref, watch } from 'vue'
import { useRoute } from 'vue-router'

import useValidate, { useVuelidate } from '@vuelidate/core'
import { required, requiredIf } from '@vuelidate/validators'

import Toast from 'primevue/toast';
import { useToast } from "primevue/usetoast"

import Swal from 'sweetalert2'

import {
    getAdverseEvents
} from '../../api/vaccination'

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
        Textarea,
        Toast
    },
    data() {
        return {
            home: {icon: 'pi pi-search', to: '/vaccines/list/monitoring'},
            items: [{label: 'Monitoring', to: `${this.$route.fullPath}`}],
            rows: []
        }
    },
    setup() {

        const toast = useToast()
        const route = useRoute()
        const { params } = route || {}
        const { qr } = params || null

        const state = reactive({
            events: [],
             doses: [
                {id: 1, name: 'First'},
                {id: 2, name: 'Second'}
            ],
        })

        getAdverseEvents().then(res => {
            const { data: { data } } = res
            Object.assign(state, {...state, events: data})
        }).catch(err => {
            console.log(err)
        })

        return {
            ...toRefs(state)
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
.text-value {
    font-size: 18px;
    color: #235c7d;
    font-family: "Times New Roman", Times, serif, bold;
}
.text-label {
    font-size: 15px;
    font-family: "Times New Roman", Times, serif, bold;
}
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