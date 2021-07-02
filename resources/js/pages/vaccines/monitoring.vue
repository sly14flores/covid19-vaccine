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
                <Button label="Save" class="p-button-primary p-mr-2" @click="save" />
                <Button label="Discard" class="p-button-danger" @click="discard" />
            </template>
        </Toolbar>
        <div class="p-grid">
            <div class="p-col-12 p-mt-2">
                <form>
                    <div class="card p-fluid">
                        <div class="p-fluid p-formgrid p-grid">
                            <div class="p-field p-col-10 p-md-11">
                                <h2 class="p-text-bold p-ml-4 name-size"> {{personalInfo.name}} </h2>
                            </div>
                        </div>
                        <div class="p-fluid p-formgrid p-grid">
                            <div class="p-field p-col-12 p-md-2 p-ml-4">
                                <label class="p-text-bold">Currently administering: </label>
                            </div>
                            <div class="p-field p-col-12 p-md-3">
                                <Dropdown class="p-shadow-1 p-inputtext-sm p-mt-2" v-model="dose" optionLabel="name" optionValue="id" :options="doses" placeholder="Select a dose" @change="doseSelected" />
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
                                <p class="p-text-bold">{{personalInfo.age}}</p>
                                <p class="p-text-bold">{{personalInfo.gender}}</p>
                            </div>

                            <div class="p-field p-col-10 p-md-3 hide-div"></div>

                            <div class="p-field p-col-6 p-md-2">
                                <p class="p-text-bold p-ml-4">Date of Birth</p>
                                <p class="p-text-bold p-ml-4">Contact Number</p>
                            </div>
                            <div class="p-field p-col-10 p-md-1 hide-div">
                                <div class="vertical-line"></div>
                            </div>
                            <div class="p-field p-col-6 p-md-2">
                                <p class="p-text-bold">{{personalInfo.birthdate}}</p>
                                <p class="p-text-bold">{{personalInfo.contact_no}}</p>
                            </div>
                        </div>
                        <TabView>
                            <TabPanel header="Post Monitoring">
                                <div class="p-fluid p-formgrid p-grid">
                                    <div class="p-field p-col-12 p-md-4">
                                        <label class="p-text-normal">Vaccine Name:</label>
                                        <p class="text-value">{{dosageData.name_of_vaccine}}</p>
                                    </div>
                                    <div class="p-field p-col-12 p-md-4">
                                        <label class="p-text-normal">Date Inoculated: </label>
                                        <p class="text-value">{{dosageData.vaccination_date}}</p>
                                    </div>
                                    <div class="p-field p-col-12 p-md-4">
                                        <label class="p-text-normal">Time: </label>
                                        <p class="text-value">{{dosageData.time_of_vaccination}}</p>
                                    </div>
                                </div>
                                <div class="p-fluid p-formgrid p-grid">
                                    <div class="p-field p-col-12 p-md-4">
                                        <label class="p-text-normal">Injection Site:</label>
                                        <p class="text-value">{{dosageData.site_of_injection}}</p>
                                    </div>
                                    <div class="p-field p-col-12 p-md-4">
                                        <label class="p-text-normal">Lot No.:</label>
                                        <p class="text-value">{{dosageData.lot_number}}</p>
                                    </div>
                                    <div class="p-field p-col-12 p-md-4">
                                        <label class="p-text-normal">Batch No.:</label>
                                        <p class="text-value">{{dosageData.batch_number}}</p>
                                    </div>
                                </div>
                                <div class="p-fluid p-formgrid p-grid">
                                    <div class="p-field p-col-12 p-md-4">
                                        <label class="p-text-normal">Vaccinator:</label>
                                        <p class="text-value">{{dosageData.name_of_vaccinator}}</p>
                                    </div>
                                    <div class="p-field p-col-12 p-md-4">
                                        <label class="p-text-normal">Next Vaccination Schedule:</label>
                                        <p class="text-value">{{dosageData.vaccination_next}}</p>
                                    </div>
                                </div>
                            </TabPanel>
                            <TabPanel header="Additional Information">
                                <div class="p-fluid p-formgrid p-grid">
                                    <div class="p-field p-col-12 p-md-4">
                                        <label class="p-text-normal">Region:</label>
                                        <p class="text-value">{{personalInfo.region}}</p>
                                    </div>
                                </div>
                                <div class="p-fluid p-formgrid p-grid">
                                    <div class="p-field p-col-12 p-md-4">
                                        <label class="p-text-normal">Province:</label>
                                        <p class="text-value">{{personalInfo.province}}</p>
                                    </div>
                                    <div class="p-field p-col-12 p-md-4">
                                        <label class="p-text-normal">City/Municipality:</label>
                                        <p class="text-value">{{personalInfo.town_city}}</p>
                                    </div>
                                    <div class="p-field p-col-12 p-md-4">
                                        <label class="p-text-normal">Barangay:</label>
                                        <p class="text-value">{{personalInfo.barangay}}</p>
                                    </div>
                                </div>
                                <div class="p-fluid p-formgrid p-grid">
                                    <div class="p-field p-col-12 p-md-4">
                                        <label class="p-text-normal">Occupation:</label>
                                        <p class="text-value">{{personalInfo.occupation}}</p>
                                    </div>
                                    <div class="p-field p-col-12 p-md-4">
                                        <label class="p-text-normal">Philhealth:</label>
                                        <p class="text-value">{{personalInfo.philhealth}}</p>
                                    </div>
                                </div>
                            </TabPanel>
                        </TabView>
                        <TabView>
                            <TabPanel header="Diluent">
                                <div class="p-fluid p-formgrid p-grid">
                                    <div class="p-field p-col-12 p-md-4">
                                        <label class="p-text-normal">Diluent:</label>
                                        <p class="text-value">{{dosageData.diluent}}</p>
                                    </div>
                                    <div class="p-field p-col-12 p-md-4">
                                        <label class="p-text-normal">Date of Reconstitution:</label>
                                        <p class="text-value">{{dosageData.reconstitution_date}}</p>
                                    </div>
                                    <div class="p-field p-col-12 p-md-4">
                                        <label class="p-text-normal">Time of Reconstitution:</label>
                                        <p class="text-value">{{dosageData.time_of_reconstitution}}</p>
                                    </div>
                                </div>
                                <div class="p-fluid p-formgrid p-grid">
                                    <div class="p-field p-col-12 p-md-4">
                                        <label class="p-text-normal">Diluent Lot No.:</label>
                                        <p class="text-value">{{dosageData.diluent_lot_number}}</p>
                                    </div>
                                    <div class="p-field p-col-12 p-md-4">
                                        <label class="p-text-normal">Diluent Batch No.:</label>
                                        <p class="text-value">{{dosageData.diluent_batch_number}}</p>
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
                        <div v-for="(row, i) in vitalSigns" :key="row">
                            <hr />
                            <div class="p-fluid p-formgrid p-grid">
                                <div class="p-field p-col-12 p-md-2">
                                    <label><small>Date Collected </small></label>
                                    <Calendar v-model="row.date_collected" :ref="`date_collected-${i}`" :manualInput="false" class="p-shadow-1 p-inputtext-sm" />
                                </div>
                                <div class="p-field p-col-12 p-md-2">
                                    <label><small>Time Collected </small> </label>
                                    <Calendar v-model="row.time_collected" :ref="`time_collected-${i}`" :manualInput="false" class="p-shadow-1 p-inputtext-sm" :timeOnly="true" hourFormat="12" />
                                </div>
                                <div class="p-field p-col-12 p-md-1">
                                    <label><small>BP: Systolic </small></label>
                                    <InputText v-model="row.systolic" :ref="`systolic-${i}`" class="p-shadow-1 p-inputtext-sm" type="text" />
                                </div>
                                <div class="p-field p-col-12 p-md-1">
                                    <label><small>BP: Diastolic</small></label>
                                    <InputText v-model="row.diastolic" :ref="`diastolic-${i}`" class="p-shadow-1 p-inputtext-sm" type="text" />
                                </div>
                                <div class="p-field p-col-12 p-md-1">
                                    <label><small>Pulse Rate </small></label>
                                    <InputText v-model="row.pulse_rate" :ref="`pulse_rate-${i}`" class="p-shadow-1 p-inputtext-sm" type="text" />
                                </div>
                                <div class="p-field p-col-12 p-md-1">
                                    <label><small>Temp. (Celsius) </small></label>
                                    <InputText v-model="row.temperature" :ref="`temperature-${i}`" class="p-shadow-1 p-inputtext-sm" type="text" />
                                </div>
                                <div class="p-field p-col-12 p-md-1">
                                    <label><small>Respiratory Rate</small></label>
                                    <InputText v-model="row.respiratory_rate" :ref="`respiratory_rate-${i}`" class="p-shadow-1 p-inputtext-sm" type="text" />
                                </div>
                                <div class="p-field p-col-12 p-md-1">
                                    <label><small>O2 Sat</small></label>
                                    <InputText v-model="row.oxygen" :ref="`oxygen-${i}`" class="p-shadow-1 p-inputtext-sm" type="text" />
                                </div>
                                <div class="p-field p-col-12 p-md-1">
                                    <label><small>Pain Score</small></label>
                                    <InputText v-model="row.pain_score" :ref="`pain_score-${i}`" class="p-shadow-1 p-inputtext-sm" type="text" />
                                </div>
                                <div class="p-field p-col-12 p-md-1">
                                    <Button type="button" @click="removeRow(i)" icon="pi pi-trash" class="p-button-sm p-button-danger p-mt-4" />
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
                                                    <RadioButton id="yes_adverse" name="has_adverse_event" :value="true" v-model="vv.has_adverse_event.$model" />
                                                    <label for="yes_adverse">Yes</label>
                                                </div>
                                            </div>
                                            <div class="p-field p-col-12 p-md-3">
                                                <div class="p-field-radiobutton">
                                                    <RadioButton id="no_adverse" name="has_adverse_event" :value="false" v-model="vv.has_adverse_event.$model" />
                                                    <label for="no_adverse">No</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="p-grid">
                                           <div class="p-field p-col-12 p-md-12">
                                                <label>Adverse Event Condition</label>
                                                <Dropdown :options="events" optionLabel="name" optionValue="id" v-model="vv.adverse_event_condition.$model" :disabled="vv.has_adverse_event.$model==false" :class="{'disabled': vv.has_adverse_event.$model == false}" class="p-shadow-1 p-inputtext-sm"/>
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
                                                <Textarea class="p-shadow-1" v-model="vv.other_adverse_event_condition.$model" rows="3" cols="30" :disabled="vv.has_adverse_event.$model==false" :class="{'disabled': vv.has_adverse_event.$model == false}" />
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
    getAdverseEvents,
    getMonitoringPersonalInfo,
    postMonitoringInfo
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
            personalInfo: {},
            dosageData: {},
            aefiData: {},
            vitalSigns: [],
            events: [],
            doses: [
                {id: 1, name: 'First'},
                {id: 2, name: 'Second'}
            ],
            dels: []
        })
        
        /**
         * Validations
         */
        const propsToValidate = {
            has_adverse_event: toRef(state.aefiData, 'has_adverse_event'),
            adverse_event_condition: toRef(state.aefiData, 'adverse_event_condition'),
            other_adverse_event_condition: toRef(state.aefiData, 'other_adverse_event_condition')
        }

        const dose = ref(1);

        const doseSelected = () => {
            getMonitoringPersonalInfo({ id: qr, dose: dose.value }).then(res => {

                const { data: { data } } = res
                const { vitals, dosage } = data
                const { aefi } = dosage

                Object.assign(state, {
                    ...state,
                    personalInfo: data,
                    vitalSigns: vitals,
                    dosageData: dosage,
                    aefiData: aefi
                })

                Object.keys(propsToValidate).forEach(function(key) {
                    propsToValidate[key].value = aefi[key]
                });

            }).catch(err => {

                if(err?.response?.status === 406){
                    Swal.fire({
                        title: '<p>Oops...</p>',
                        icon: 'error',
                        html: '<p style="font-size: 16px;">Patient has not been vaccinated yet. ',
                        showCancelButton: false,
                        focusConfirm: true,
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        allowEnterKey: false,
                        confirmButtonText: 'Ok',
                    }).then((result) => {
                        if (result.value) {
                            window.location.href = 'admin#/vaccines/list/monitoring';
                        }
                    })
                }

                if(err?.response?.status === 500){
                    Swal.fire({
                        title: '<p>Oops...</p>',
                        icon: 'error',
                        html: '<p style="font-size: 18px;">Check your internet connection and try again. ',
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

        if (qr!=null) {
            doseSelected()
        }

        getAdverseEvents().then(res => {
            const { data: { data } } = res
            Object.assign(state, {...state, events: data})
        }).catch(err => {
            console.log(err)
        })

        const addRow = () => {

            const row = reactive({
                id: 0,
                dosage_id: state.dosageData.id,
                date_collected: null,
                time_collected: null,
                systolic: null,
                diastolic: null,
                pulse_rate: null,
                temperature: null,
                respiratory_rate: null,
                oxygen: null,
                pain_score: null,
            });

            state.vitalSigns.push(row);

        }

        const removeRow = (index) => {

            const vital = {...state.vitalSigns[index]}
            const { id } = vital
            if (id) state.dels.push(id)
            state.vitalSigns.splice(index, 1)

        }

        const rules = computed(() => {
            return {
                has_adverse_event: { },
                adverse_event_condition: { },
                other_adverse_event_condition: { },
            }
        })

        const vv = useVuelidate(rules, propsToValidate)

        const save = () => {

            vv.value.$touch();       

            if (vv.value.$invalid) {
                toast.add({severity:'error', summary: 'Some fields are required.', detail:'Monitoring Information', life: 3000});
                return
            }

            Object.keys(propsToValidate).forEach(function(key) {
                state.dosageData.aefi[key] = propsToValidate[key].value
            })

            const payload = {
                id: qr,
                dosage_id: state.dosageData.id,
                dose: dose.value,
                aefi: state.aefiData,
                vitals: state.vitalSigns,
                dels: state.dels
            }

            postMonitoringInfo(payload).then(res => {

                const { data: { data } } = res
                const { vitals, aefi, dels } = data

                Object.assign(state, {
                    ...state,
                    personalInfo: data,
                    aefiData: aefi,
                    vitalSigns: vitals,
                    dels,
                })

                Object.keys(propsToValidate).forEach(function(key) {
                    propsToValidate[key].value = aefi[key]
                });

                toast.add({severity:'success', summary: 'Successfully Saved!', detail:'Monitoring Information', life: 3000});

            }).catch(err => {

            })

        }

        watch(
            () => propsToValidate.has_adverse_event.value,
            (value, prevValue) => {
                if (value == false) {
                    propsToValidate.adverse_event_condition.value = null
                    propsToValidate.other_adverse_event_condition.value = null
                }
            }
        )

        return {
            ...toRefs(state),
            dose,
            addRow,
            removeRow,
            save,
            doseSelected,
            Toast,
            vv
        }
        
    },
    methods: {
        discard(){

            this.$router.push('/vaccines/list/monitoring')
            
        },
    }
}
</script>

<style scoped>
.text-value {
    font-size: 16px;
    color: #235c7d;
    font-weight: bold;
    font-family: Arial, Helvetica, sans-serif;
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
.disabled {
    background: rgb(219, 219, 219);
    border-bottom: 1px solid black;
    cursor: not-allowed; 
}

</style>