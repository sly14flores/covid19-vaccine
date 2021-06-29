<template>
    <div>
    <Toast class="p-mt-6" position="top-right" />
        <MyBreadcrumb :home="home" :items="items" />
        <Toolbar class="header-bg">
            <template #left>
                <div class="p-grid p-col-12">
                    <h4 class="p-text-bold">INOCULATION</h4>
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
                            <div class="p-field p-col-10 p-md-12">
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
                        <TabView>
                            <TabPanel header="Dose">
                                <div class="p-fluid p-formgrid p-grid">
                                    <div class="p-field p-col-12 p-md-4">
                                        <Dropdown class="p-shadow-1 p-inputtext-sm p-mt-2" v-model="dose" optionLabel="name" optionValue="id" :options="doses" placeholder="Select a dose" @change="doseSelected" />
                                    </div>
                                </div>
                            </TabPanel>
                        </TabView>
                        <hr />
                        <TabView>
                            <TabPanel header="Inoculation">
                                <div class="p-fluid p-formgrid p-grid">
                                    <div class="p-field p-col-12 p-md-4">
                                        <label>Vaccine Name <i class="p-error">*</i></label>
                                        <Dropdown class="p-shadow-1 p-inputtext-sm" optionLabel="name" optionValue="id" :options="selections.vaccines_value" v-model="vv.brand_name.$model" :class="{ 'p-invalid': vv.brand_name.$error }" />
                                        <small class="p-error" v-if="vv.brand_name.$error">This field is required</small>
                                    </div>
                                    <div class="p-field p-col-12 p-md-4">
                                        <label>Date Inoculated <i class="p-error">*</i></label>
                                        <Calendar :manualInput="false" class="p-shadow-1 p-inputtext-sm" v-model="vv.date_of_vaccination.$model" :class="{ 'p-invalid': vv.date_of_vaccination.$error }" :touchUI="true" />
                                        <small class="p-error" v-if="vv.date_of_vaccination.$error">This field is required</small>
                                    </div>
                                    <div class="p-field p-col-12 p-md-4">
                                        <label>Time Inoculated <i class="p-error">*</i></label>
                                        <Calendar :manualInput="false" class="p-shadow-1 p-inputtext-sm" :timeOnly="true" hourFormat="12" v-model="vv.time_of_vaccination.$model" :class="{ 'p-invalid': vv.time_of_vaccination.$error }" />
                                        <small class="p-error" v-if="vv.time_of_vaccination.$error">This field is required</small>
                                    </div>
                                </div>
                                <div class="p-fluid p-formgrid p-grid">
                                    <div class="p-field p-col-12 p-md-4">
                                        <label>Injection Site <i class="p-error">*</i></label>
                                        <Dropdown class="p-shadow-1 p-inputtext-sm" optionLabel="name" optionValue="id" :options="sites" v-model="vv.site_of_injection.$model" :class="{ 'p-invalid': vv.site_of_injection.$error }" />
                                        <small class="p-error" v-if="vv.site_of_injection.$error">This field is required</small>
                                    </div>
                                    <div class="p-field p-col-12 p-md-4">
                                        <label>Lot No. <i class="p-error">*</i></label>
                                        <InputText class="p-shadow-1 p-inputtext-sm" type="text" v-model="vv.lot_number.$model" :class="{ 'p-invalid': vv.lot_number.$error }" />
                                        <small class="p-error" v-if="vv.lot_number.$error">This field is required</small>
                                    </div>
                                    <div class="p-field p-col-12 p-md-4">
                                        <label>Batch No. <i class="p-error">*</i></label>
                                        <InputText class="p-shadow-1 p-inputtext-sm" type="text" v-model="vv.batch_number.$model" :class="{ 'p-invalid': vv.batch_number.$error }" />
                                        <small class="p-error" v-if="vv.batch_number.$error">This field is required</small>
                                    </div>
                                </div>
                                <div class="p-fluid p-formgrid p-grid">
                                    <div class="p-field p-col-12 p-md-4">
                                        <label>Bakuna Center (CBCR ID) <i class="p-error">*</i></label>
                                        <Dropdown class="p-shadow-1 p-inputtext-sm" optionLabel="cbcr_id" optionValue="id" :options="hospitals" v-model="vv.vaccination_facility.$model" :class="{ 'p-invalid': vv.vaccination_facility.$error }">
                                        <template #option="slotProps">
                                            <div class="country-item">
                                                <div>{{slotProps.option.cbcr_id}} - {{slotProps.option.description}}</div>
                                            </div>
                                        </template>
                                        </Dropdown>
                                        <small class="p-error" v-if="vv.vaccination_facility.$error">This field is required</small>
                                    </div>
                                    <div class="p-field p-col-12 p-md-4">
                                        <label>Vaccinator <i class="p-error">*</i></label>
                                        <Dropdown class="p-shadow-1 p-inputtext-sm" optionLabel="name" optionValue="id" :options="vaccinators" v-model="vv.user_id.$model" :class="{ 'p-invalid': vv.user_id.$error }" />
                                        <small class="p-error" v-if="vv.user_id.$error">This field is required</small>
                                    </div>
                                    <div class="p-field p-col-12 p-md-4">
                                        <label>Encoder <i class="p-error">*</i></label>
                                        <Dropdown class="p-shadow-1 p-inputtext-sm" optionLabel="name" optionValue="id" :options="users" v-model="vv.encoder_user_id.$model" :class="{ 'p-invalid': vv.encoder_user_id.$error }" />
                                        <small class="p-error" v-if="vv.encoder_user_id.$error">This field is required</small>
                                    </div>
                                </div>
                            </TabPanel>
                            <TabPanel header="Vital Signs">
                               <DataTable :value="vitalSigns" class="p-datatable-sm">
                                    <Column field="date_collected" header="Date Collected" headerStyle="width: 15%"></Column>
                                    <Column field="time_collected" header="Time Collected"></Column>
                                    <Column field="systolic" header="BP: Systolic"></Column>
                                    <Column field="diastolic" header="BP: Diastolic"></Column>
                                    <Column field="pulse_rate" header="Pulse Rate"></Column>
                                    <Column field="respiratory_rate" header="Respiratory Rate"></Column>
                                    <Column field="temperature" header="Temp. (Celsius)"></Column>
                                    <Column field="oxygen" header="O2 Sat"></Column>
                                    <Column field="pain_score" header="Pain Score"></Column>
                                </DataTable>
                            </TabPanel>
                        </TabView>
                        <hr />
                        <h4 class="header-blue p-text-bold">DILUENT</h4>
                        <div class="p-fluid p-formgrid p-grid">
                            <div class="p-field p-col-12 p-md-4">
                                <label>Diluent</label>
                                <InputText class="p-shadow-1 p-inputtext-sm" type="text" v-model="vv.diluent.$model" />
                            </div>
                            <div class="p-field p-col-12 p-md-4">
                                <label>Date of Reconstitution </label>
                                <Calendar :manualInput="false" class="p-shadow-1 p-inputtext-sm" v-model="vv.date_of_reconstitution.$model"/>
                            </div>
                            <div class="p-field p-col-12 p-md-4">
                                <label>Time of Reconstitution</label>
                                <Calendar :manualInput="false" class="p-shadow-1 p-inputtext-sm" :timeOnly="true" hourFormat="12" v-model="vv.time_of_reconstitution.$model" />
                            </div>
                        </div>
                        <div class="p-fluid p-formgrid p-grid">
                            <div class="p-field p-col-12 p-md-4"></div>
                            <div class="p-field p-col-12 p-md-4">
                                <label>Diluent Lot No. </label>
                                <InputText class="p-shadow-1 p-inputtext-sm" type="text" v-model="vv.diluent_lot_number.$model" />
                            </div>
                            <div class="p-field p-col-12 p-md-4">
                                <label>Diluent Batch No.</label>
                                <InputText class="p-shadow-1 p-inputtext-sm" type="text" v-model="vv.diluent_batch_number.$model" />
                            </div>
                        </div>
                        <hr />
                        <h4 class="header-blue p-text-bold">Next Vaccination Schedule</h4>
                        <div class="p-fluid p-formgrid p-grid">
                            <div class="p-field p-col-12 p-md-4">
                                <label>Next Vaccination Schedule <i class="p-error">*</i></label>
                                <Calendar :manualInput="false" class="p-shadow-1 p-inputtext-sm" v-model="vv.next_vaccination.$model" :class="{ 'p-invalid': vv.next_vaccination.$error }" />
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

import { reactive, computed, toRefs, toRef, ref, watch } from 'vue'
import { useRoute } from 'vue-router'

import useValidate, { useVuelidate } from '@vuelidate/core'
import { required, requiredIf } from '@vuelidate/validators'

import Toast from 'primevue/toast';
import { useToast } from "primevue/usetoast"

import Swal from 'sweetalert2'

import {
    getInoculationPersonalInfo,
    postInoculationInfo,
    getSelections,
    getVaccinators,
    getUsers,
    getHospitals
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
        Toast
    },
    data() {
        return {
            home: {icon: 'pi pi-search', to: '/vaccines/list/inoculation'},
            items: [{label: 'Inoculation', to: `${this.$route.fullPath}`}]
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
            vitalSigns: [],
            selections: [],
            vaccinators: [],
            vaccines: [],
            users: [],
            hospitals: [],
            doses: [
                {id: 1, name: 'First'},
                {id: 2, name: 'Second'}
            ],
            sites: [
                {id: 'Left', name: 'Left'},
                {id: 'Right', name: 'Right'}
            ]
        })

        const propsToValidate = {
            brand_name: toRef(state.dosageData, 'brand_name'),
            date_of_vaccination: toRef(state.dosageData, 'date_of_vaccination'),
            time_of_vaccination: toRef(state.dosageData, 'time_of_vaccination'),
            site_of_injection: toRef(state.dosageData, 'site_of_injection'),
            lot_number: toRef(state.dosageData, 'lot_number'),
            batch_number: toRef(state.dosageData, 'batch_number'),
            user_id: toRef(state.dosageData, 'user_id'),
            encoder_user_id: toRef(state.dosageData, 'encoder_user_id'),
            diluent: toRef(state.dosageData, 'diluent'),
            vaccination_facility: toRef(state.dosageData, 'vaccination_facility'),
            date_of_reconstitution: toRef(state.dosageData, 'date_of_reconstitution'),
            time_of_reconstitution: toRef(state.dosageData, 'time_of_reconstitution'),
            diluent_lot_number: toRef(state.dosageData, 'diluent_lot_number'),
            diluent_batch_number: toRef(state.dosageData, 'diluent_batch_number'),
            next_vaccination: toRef(state.dosageData, 'next_vaccination')
        }        

        const dose = ref(1);

        const doseSelected = () => {
            getInoculationPersonalInfo({ id: qr, dose: dose.value }).then(res => {
                const { data: { data } } = res
                const { vitals, dosage } = data

                Object.assign(state, {
                    ...state,
                    personalInfo: data,
                    vitalSigns: vitals,
                    dosageData: dosage
                })

                Object.keys(propsToValidate).forEach(function(key) {
                    propsToValidate[key].value = dosage[key]
                });

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

        getUsers().then(res => {
            const { data: { data } } = res
            Object.assign(state, {...state, users: data})
        }).catch(err => {
            console.log(err)
        })

        getHospitals().then(res => {
            const { data: { data } } = res
            Object.assign(state, {...state, hospitals: data})
        }).catch(err => {
            console.log(err)
        })

         /**
         * Validations
         */

        const rules = computed(() => {
            return {
                brand_name: { required },
                date_of_vaccination: { required },
                time_of_vaccination: { required },
                site_of_injection: { required },
                lot_number: { required },
                batch_number: { required },
                vaccination_facility  : { required },
                user_id: { required },
                encoder_user_id: { required },
                diluent: { },
                date_of_reconstitution: { },
                time_of_reconstitution: { },
                diluent_lot_number: { },
                diluent_batch_number: { },
                next_vaccination: { required }
            }
        })

        const vv = useVuelidate(rules, propsToValidate)

        const save = () => {

            vv.value.$touch();

            if (vv.value.$invalid) {
                // Swal here
                return
            }

            Object.keys(propsToValidate).forEach(function(key) {
                state.dosageData[key] = propsToValidate[key].value
            })

            const payload = {
                ...state.dosageData
            }

            postInoculationInfo(payload).then(res => {

                const { data: { data } } = res
                const { vitals, dosage } = data

                Object.assign(state, {
                    ...state,
                    personalInfo: data,
                    vitalSigns: vitals,
                    dosageData: dosage
                })

                Object.keys(propsToValidate).forEach(function(key) {
                    propsToValidate[key].value = dosage[key]
                });               

                toast.add({severity:'success', summary: 'Successfully Saved!', detail:'Inoculation Information', life: 3000});

            }).catch(err => {

                console.log(payload)

            })
        }

        return {
            ...toRefs(state),
            doseSelected,
            dose,
            save,
            vv
        }

    },
    methods: {
        discard() {

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