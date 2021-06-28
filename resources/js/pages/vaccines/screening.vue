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
                        <hr />
                        <div class="p-fluid p-formgrid p-grid">
                            <div class="p-field p-col-12 p-md-12">
                                <div class="p-grid">
                                    <div class="p-field p-col-12 p-md-6">
                                        <Card>
                                            <template #content>
                                                <label>Dose</label>
                                                <Dropdown class="p-shadow-1 p-inputtext-sm p-mt-2" v-model="dose" optionLabel="name" optionValue="id" :options="doses" placeholder="Select a dose" @change="doseSelected" />
                                            </template>
                                        </Card>
                                    </div>
                                    <div class="p-field p-col-12 p-md-6">
                                        <Card>
                                            <template #content>
                                                <div class="p-grid">
                                                    <div class="p-field p-col-12 p-md-12">
                                                        <label>Screened</label>
                                                    </div>
                                                    <div class="p-field p-col-12 p-md-12">
                                                        <Checkbox :binary="true" v-model="vv.screened.$model" />
                                                    </div>
                                                </div>
                                            </template>
                                        </Card>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr />
                        <div class="p-fluid p-formgrid p-grid">
                            <div class="p-field p-col-12 p-md-6">
                                <Card>
                                    <template #content>
                                        <div class="p-grid">
                                            <div class="p-field p-col-12 p-md-4">
                                                <p class="p-text-sm">Consent Received</p>
                                                <small class="p-error" v-if="vv.consent.$error">Consent is required</small>
                                            </div>
                                            <div class="p-field p-col-12 p-md-3">
                                                <div class="p-field-radiobutton">
                                                    <RadioButton id="yes_consent" name="consent" value="01_Yes" v-model="vv.consent.$model" :class="{ 'p-invalid': vv.consent.$error }" />
                                                    <label for="yes_consent">Yes</label>
                                                </div>
                                            </div>
                                            <div class="p-field p-col-12 p-md-3">
                                                <div class="p-field-radiobutton">
                                                    <RadioButton id="no_consent" name="consent" value="02_No" v-model="vv.consent.$model" :class="{ 'p-invalid': vv.consent.$error }" />
                                                    <label for="no_consent">No</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="p-grid">
                                            <div class="p-field p-col-12 p-md-12">
                                                <label>Consent Received By</label>
                                                <Dropdown class="p-shadow-1 p-inputtext-sm" v-model="vv.user_id.$model" optionLabel="name" optionValue="id" :options="vaccinators" :disabled="vv.consent.$model == '02_No'" :class="{ 'p-invalid': vv.user_id.$error }" />
                                            </div>
                                            <small class="p-error" v-if="vv.user_id.$error">Please specify who is receiving the consent</small>
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
                                                <small class="p-error" v-if="vv.defer.$error">Please choose Yes or No</small>
                                            </div>
                                            <div class="p-field p-col-12 p-md-3">
                                                <div class="p-field-radiobutton">
                                                    <RadioButton id="yes_defer" name="defer" value="01_Yes" v-model="vv.defer.$model" :class="{ 'p-invalid': vv.defer.$error }" />
                                                    <label for="yes_defer">Yes</label>
                                                </div>
                                            </div>
                                            <div class="p-field p-col-12 p-md-3">
                                                <div class="p-field-radiobutton">
                                                    <RadioButton id="no_defer" name="defer" value="02_No" v-model="vv.defer.$model" :class="{ 'p-invalid': vv.defer.$error }" />
                                                    <label for="no_defer">No</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="p-grid">
                                           <div class="p-field p-col-12 p-md-12">
                                                <label>Reason for Deferral</label>
                                                <Dropdown class="p-shadow-1 p-inputtext-sm" optionLabel="name" optionValue="id" :options="selections.deferral_value" v-model="vv.reason.$model" :disabled="(vv.defer.$model=='02_No') || (vv.defer.$model==null)" :class="{ 'p-invalid': vv.reason.$error }" />
                                                <small class="p-error" v-if="vv.reason.$error">Please specify reason</small>
                                            </div>
                                        </div>
                                    </template>
                                </Card>
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
                                <h4 class="header-blue p-text-bold">HEALTH DECLARATION SCREENING FORM</h4>
                            </template>
                        </Toolbar>
                        <DataTable v-if="vv.consent.$model == '01_Yes'" :value="healthDeclaration.assessments" class="p-datatable-sm" dataKey="key">
                            <Column field="value" header="Yes  /  No" headerStyle="width: 15%">
                                <template #body="slotProps">
                                    <RadioButton :value="true" v-model="slotProps.data['value']" />
                                    <RadioButton class="p-ml-4" :value="false" v-model="slotProps.data['value']" />
                                </template>
                            </Column>
                            <Column field="description" header="Description"></Column>
                        </DataTable>
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

import { reactive, computed, toRefs, toRef, ref, watch } from 'vue'
import { useRoute } from 'vue-router'

import useValidate, { useVuelidate } from '@vuelidate/core'
import { required, requiredIf } from '@vuelidate/validators'

import Swal from 'sweetalert2'

import {
    getScreeningPersonalInfo,
    postScreeningInfo,
    getSelections,
    getVaccinators
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
    },
    data() {
        return {
            home: {icon: 'pi pi-search', to: '/vaccines/list/screening'},
            items: [{label: 'Screening', to: `${this.$route.fullPath}`}]
        }
    },
    setup() {

        const route = useRoute()
        const { params } = route || {}
        const { qr } = params || null

        const state = reactive({
            personalInfo: {},
            vitalSigns: [],
            healthDeclaration: {
                assessments: []
            },
            dels: [],
            selections: [],
            pres: [],
            vaccinators: [],
            doses: [
                {id: 1, name: 'First'},
                {id: 2, name: 'Second'}
            ],
            defer: null,
        })

        const dose = ref(1);

        const doseSelected = () => {
            getScreeningPersonalInfo({ id: qr, dose: dose.value }).then(res => {
                const { data: { data } } = res
                const { pre_assessment, vitals, dels } = data

                Object.assign(state, {
                    ...state,
                    personalInfo: data,
                    vitalSigns: vitals,
                    healthDeclaration: pre_assessment,
                    dels,
                    defer: (pre_assessment.reason != null)?'01_Yes':null
                })

            }).catch(err => {
               
            })
        }

        if (qr!=null) {
            doseSelected()
        }
        
        // const loadingSwal = Swal.fire({
        //     title: 'Please wait...',
        //     willOpen () {
        //         Swal.showLoading ()
        //     },
        //     didClose () {
        //         Swal.hideLoading()
        //     },
        //     showConfirmButton: false,
        //     allowOutsideClick: false,
        //     allowEscapeKey: false,
        //     allowEnterKey: false
        // })

        getSelections().then(res => {
            const { data: { data } } = res
            Object.assign(state, {...state, selections: data})
        }).catch(err => {
            console.log(err)
        })

        getVaccinators().then(res => {
            const { data: { data } } = res
            Object.assign(state, {...state, vaccinators: data})
        }).catch(err => {
            console.log(err)
        })

        /**
         * Validations
         */
        const propsToValidate = {
            screened: toRef(state.healthDeclaration, 'screened'),
            consent: toRef(state.healthDeclaration, 'consent'),
            user_id: toRef(state.healthDeclaration, 'user_id'),
            defer: toRef(state, 'defer'),
            reason: toRef(state.healthDeclaration, 'reason'),
        }

        const rules = computed(() => {
            return {
                screened: { required },
                consent: { required },
                user_id: { required: requiredIf(function() {
                    return propsToValidate.consent.value == '01_Yes'
                }) },
                defer: { required },
                reason: { required: requiredIf(function() {
                    return propsToValidate.defer.value == '01_Yes'
                }) },
            }
        })

        const vv = useVuelidate(rules, propsToValidate)

        const addRow = () => {

            const row = reactive({
                id: 0,
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

        const save = () => {

            vv.value.$touch();       

            if (vv.value.$invalid) {
                // Swal here
                return
            }

            Object.keys(propsToValidate).forEach(function(key) {
                state.healthDeclaration[key] = propsToValidate[key].value
            });

            const payload = {
                id: qr,
                dosage_id: state.personalInfo.dosage_id,
                dose: dose.value,
                vitals: state.vitalSigns,
                pre_assessment: state.healthDeclaration,
                dels: state.dels
            }

            postScreeningInfo(payload).then(res => {
                const { data: { data } } = res
                const { pre_assessment, vitals, dels } = data
                Object.assign(state, {
                    ...state,
                    personalInfo: data,
                    vitalSigns: vitals,
                    healthDeclaration: pre_assessment,
                    dels,
                })

                Swal.fire({
                    title: '<p class="text-success" style="font-size: 25px;">Successfully saved!</p>',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 1500,
                })

            }).catch(err => {
                
            })
        }

        /**
         * Update consent / consent received by
         */
        watch(
            () => state.healthDeclaration.consent,
            (value, prevValue) => {
                propsToValidate.consent.value = value
                if (value!=null) {
                    propsToValidate.user_id.value = state.healthDeclaration.user_id
                }
            }
        )

        /**
         * Update defer / reason
         */
        watch(
            () => state.healthDeclaration.reason,
            (value, prevValue) => {
                propsToValidate.reason.value = value
                if (value!=null) {
                    propsToValidate.defer.value = "01_Yes"
                } else {
                    propsToValidate.defer.value = "02_No"
                }
            }
        )

        watch(
            () => state.healthDeclaration.screened,
            (value, prevValue) => {
                propsToValidate.screened.value = value
            }
        )        

        watch(
            () => propsToValidate.defer.value,
            (value, prevValue) => {
                if (value == '02_No') {
                    propsToValidate.reason.value = null
                }
            }
        )

        watch(
            () => propsToValidate.consent.value,
            (value, prevValue) => {
                if (value == '02_No') {
                    propsToValidate.user_id.value = null
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
            vv
        }

    },
    methods: {
        discard() {

            this.$router.push('/vaccines/list/screening')
            
        },
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
.disabled {
    background: rgb(219, 219, 219);
    border-bottom: 1px solid black;
    cursor: not-allowed; 
}
</style>