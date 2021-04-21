<template>
    <div>
        <Dialog header="Dosage" v-model:visible="displayDosage" :closable="false" :style="{width: '80vw'}" :maximizable="true" position="top" :modal="true">   
            <hr />
            <form autocomplete="off">
                <div class="p-fluid p-formgrid p-grid">
                    <div class="p-field p-col-12 p-md-4">
                        <label>Vaccinator <i class="p-error">*</i></label>
                        <Dropdown class="p-shadow-1 p-inputtext-sm" :class="{'p-invalid': vv.user_id.$error}" id="user_id" optionLabel="name" :options="vaccinators" v-model="vv.user_id.$model" optionValue="id" placeholder="Select a vaccinator" />
                        <small v-if="vv.user_id.$error" class="p-error">This field is required</small>
                    </div>
                    <div class="p-field p-col-12 p-md-4">
                        <label>Vaccine Manufacturer Name <i class="p-error">*</i></label>
                        <Dropdown class="p-shadow-1 p-inputtext-sm" :class="{'p-invalid': vv.brand_name.$error}" id="brand_name" optionLabel="name" :options="brands" v-model="vv.brand_name.$model" optionValue="id" placeholder="Select a manufacturer name" />
                        <small v-if="vv.brand_name.$error" class="p-error">This field is required</small>
                    </div>
                    <div class="p-field p-col-12 p-md-4">
                        <label>Vaccine Name <i class="p-error">*</i></label>
                        <Dropdown class="p-shadow-1 p-inputtext-sm" :class="{'p-invalid': vv.vaccine_name.$error}" id="vaccine_name" optionLabel="name" :options="vaccines" v-model="vv.vaccine_name.$model" optionValue="id" placeholder="Select a vaccine name" />
                        <small v-if="vv.vaccine_name.$error" class="p-error">This field is required</small>
                    </div>
                </div>
                <div class="p-fluid p-formgrid p-grid">
                    <div class="p-field p-col-12 p-md-4">
                        <label>Dose <i class="p-error">*</i></label>
                        <Dropdown class="p-shadow-1 p-inputtext-sm" :class="{'p-invalid': vv.dose.$error}" id="dose" optionLabel="name" :options="doses" v-model="vv.dose.$model" optionValue="id" placeholder="Select a dose" />
                        <small v-if="vv.dose.$error" class="p-error">This field is required</small>
                    </div>
                    <div class="p-field p-col-12 p-md-2">
                        <label>Site of Injection <i class="p-error">*</i></label>
                        <Dropdown class="p-shadow-1 p-inputtext-sm" :class="{'p-invalid': vv.site_of_injection.$error}" id="site_of_injection" optionLabel="name" :options="sites" v-model="vv.site_of_injection.$model" optionValue="id" placeholder="Select a Site of Injection" />
                        <small v-if="vv.site_of_injection.$error" class="p-error">This field is required</small>
                    </div>
                    <div class="p-field p-col-12 p-md-2">
                        <label>Expiry Date <i class="p-error">*</i></label>
                        <Calendar class="p-shadow-1 p-inputtext-sm" :class="{'p-invalid': vv.expiry_date.$error}" v-model="vv.expiry_date.$model" name="expiry_date" />
                        <small v-if="vv.expiry_date.$error" class="p-error">This field is required</small>
                    </div>
                    <div class="p-field p-col-12 p-md-2">
                        <label>Batch Number <i class="p-error">*</i></label>
                        <InputText class="p-shadow-1 p-inputtext-sm" :class="{'p-invalid': vv.batch_number.$error}" type="text" id="batch_number" v-model="vv.batch_number.$model" />
                        <small v-if="vv.batch_number.$error" class="p-error">This field is required</small>
                    </div>
                    <div class="p-field p-col-12 p-md-2">
                        <label>Lot Number <i class="p-error">*</i></label>
                        <InputText class="p-shadow-1 p-inputtext-sm" :class="{'p-invalid': vv.lot_number.$error}" type="text" id="lot_number" v-model="vv.lot_number.$model" />
                        <small v-if="vv.lot_number.$error" class="p-error">This field is required</small>
                    </div>
                </div>
                <hr />
                <div class="p-fluid p-formgrid p-grid">
                    <div class="p-field p-col-12 p-md-4">
                        <label>Diluent </label>
                        <InputText id="diluent" class="p-shadow-1 p-inputtext-sm" type="text" v-model="dosage.diluent" />
                    </div>
                    <div class="p-field p-col-12 p-md-2">
                        <label>Date of Reconstitution</label>
                        <Calendar id="date_of_reconstitution" class="p-shadow-1 p-inputtext-sm" v-model="dosage.date_of_reconstitution" name="date_of_reconstitution" />
                    </div>
                    <div class="p-field p-col-12 p-md-2">
                        <label>Time of Reconstitution</label>
                        <Calendar id="time_of_reconstitution" class="p-shadow-1 p-inputtext-sm" v-model="dosage.time_of_reconstitution" :timeOnly="true" hourFormat="12" />
                    </div>
                    <div class="p-field p-col-12 p-md-2">
                        <label>Diluent Batch Number</label>
                        <InputText class="p-shadow-1 p-inputtext-sm" type="text" id="diluent_batch_number" v-model="dosage.diluent_batch_number" />
                    </div>
                    <div class="p-field p-col-12 p-md-2">
                        <label>Diluent Lot Number</label>
                        <InputText class="p-shadow-1 p-inputtext-sm" type="text" id="diluent_lot_number" v-model="dosage.diluent_lot_number" />
                    </div>             
                </div>
                <hr />
                <TabView class="tabview-custom" ref="tabview4">
                    <TabPanel>
                        <template #header>
                            <i class="pi pi-check-circle p-mr-2"></i>
                            <span>Pre-Assessment</span>
                        </template>
                        <div class="p-fluid">
                            <div class="p-fluid p-formgrid p-grid p-mt-2">
                                <div class="p-field p-col-12 p-md-2">
                                    <p class="p-text-sm">Consent</p>
                                </div>
                                <div class="p-field p-col-12 p-md-1">
                                    <div class="p-field-radiobutton">
                                        <RadioButton id="yes_consent" name="consent" value="01_Yes" v-model="vv.consent.$model" @click="displayPres" />
                                        <label for="yes_consent">Yes</label>
                                    </div>
                                </div>
                                <div class="p-field p-col-12 p-md-1">
                                    <div class="p-field-radiobutton">
                                        <RadioButton id="no_consent" name="consent" value="02_No" v-model="vv.consent.$model" @click="displayReason" />
                                        <label for="no_consent">No</label>
                                    </div>
                                </div>
                                 <div class="p-field p-col-12 p-md-1" v-if="displayReasonForm">
                                    <p class="p-text-sm">Reason</p>
                                </div>
                                <div class="p-field p-col-12 p-md-7" v-if="displayReasonForm">
                                    <Dropdown class="p-shadow-1 p-inputtext-sm" id="reason" optionLabel="name" :options="reasons" v-model="vv.reason.$model" optionValue="id" placeholder="Select a Reason" />
                                </div>
                            </div>
                        </div>
                        <DataTable class="p-datatable-sm" :value="dosage.pre_assessment.assessments" dataKey="key" v-if="displayPresTable">
                            <Column field="description" header="Description"></Column>
                            <Column field="value" header="Yes  /  No" headerStyle="width: 15%">
                                <template #body="slotProps">
                                    <RadioButton :value="true" v-model="slotProps.data['value']" />
                                    <RadioButton class="p-ml-4" :value="false" v-model="slotProps.data['value']" />
                                </template>
                            </Column>
                        </DataTable>
                    </TabPanel>

                    <TabPanel>
                        <template #header>
                            <i class="pi pi-desktop p-mr-2"></i>
                            <span> Post Monitoring </span>
                        </template>
                        <DataTable class="p-datatable-sm" :value="dosage.post_assessment.assessments" dataKey="key">
                            <Column field="description" header="Description"></Column>
                            <Column field="value" header="Yes  /  No" headerStyle="width: 15%">
                                <template #body="slotProps">
                                    <RadioButton :value="true" v-model="slotProps.data['value']" />
                                    <RadioButton class="p-ml-4" :value="false" v-model="slotProps.data['value']" />
                                </template>
                            </Column>
                        </DataTable>
                    </TabPanel>
                    <TabPanel>
                        <template #header>
                            <i class="pi pi-search p-mr-2"></i>
                            <span>AEFI</span>
                        </template>
                        <p>ON PROCESS</p>
                    </TabPanel>
                </TabView>
                <br />
                <div class="p-fluid p-formgrid p-grid">
                    <div class="p-field p-col-12 p-md-10"></div>
                    <div class="p-field p-col-12 p-md-1">
                        <Button type="button" label="Ok" autofocus @click="addDosage" />
                    </div>
                    <div class="p-field p-col-12 p-md-1">
                        <Button label="Cancel" @click="closeDosage" class="p-button-text"/>
                    </div>
                </div>
            </form>
        </Dialog>
    </div>
</template>
<script>

import Button from 'primevue/button/sfc';
import TabView from 'primevue/tabview/sfc';
import TabPanel from 'primevue/tabpanel/sfc';
import InputText from 'primevue/inputtext/sfc';
import Dropdown from 'primevue/dropdown/sfc';
import RadioButton from 'primevue/radiobutton/sfc';
import ConfirmDialog from 'primevue/confirmdialog/sfc';
import DataTable from 'primevue/datatable/sfc';
import Column from 'primevue/column/sfc';
import Dialog from 'primevue/dialog/sfc';
import Calendar from 'primevue/calendar/sfc';
import Panel from 'primevue/panel/sfc';
import Toolbar from 'primevue/toolbar/sfc';

import { useStore } from 'vuex';
import { reactive, ref, toRef, watch } from 'vue';

import { useVuelidate } from "@vuelidate/core";
import { required } from "@vuelidate/validators";

export default {
    props: ['editOn'],
    setup(props) {

        const { editOn } = props
        const editMode = eval(editOn)
        const store = useStore()
        const { state, dispatch } = store

        const dosage = reactive({
            ...state.vaccines.dosage,
        })

        watch(
            () => state.vaccines.dosage.id,
            (data, prevData) => {
                dosage.id = state.vaccines.dosage.id,
                dosage.vaccine_id  = state.vaccines.dosage.vaccine_id ,
                dosage.user_id  = state.vaccines.dosage.user_id,
                dosage.qr_pass_id = state.vaccines.dosage.qr_pass_id,
                dosage.brand_name = state.vaccines.dosage.brand_name,
                dosage.vaccine_name = state.vaccines.dosage.vaccine_name, // VACCINE NAME CHANGE TO INT DB
                dosage.site_of_injection = state.vaccines.dosage.site_of_injection,
                dosage.expiry_date = state.vaccines.dosage.expiry_date,
                dosage.batch_number = state.vaccines.dosage.batch_number,
                dosage.lot_number = state.vaccines.dosage.lot_number,
                dosage.dose = state.vaccines.dosage.dose,
                dosage.diluent = state.vaccines.dosage.diluent,
                dosage.date_of_reconstitution = state.vaccines.dosage.date_of_reconstitution,
                dosage.time_of_reconstitution = state.vaccines.dosage.time_of_reconstitution,
                dosage.diluent_batch_number = state.vaccines.dosage.diluent_batch_number,
                dosage.diluent_lot_number = state.vaccines.dosage.diluent_lot_number
                dosage.pre_assessment.consent = state.vaccines.dosage.pre_assessment.consent
                dosage.pre_assessment.reason = state.vaccines.dosage.pre_assessment.reason
                dosage.pre_assessment.assessments = state.vaccines.dosage.pre_assessment.assessments
                dosage.post_assessment.assessments = state.vaccines.dosage.post_assessment.assessments
            }
        )

        const rules = {
            user_id: { required },
            vaccine_name: { required },
            brand_name: { required },
            dose: { required },
            site_of_injection: { required },
            expiry_date: { required },
            batch_number: { required },
            lot_number: { required },
            diluent: {},
            date_of_reconstitution: {},
            time_of_reconstitution: {},
            diluent_batch_number: {},
            diluent_lot_number: {},
            consent: {},
            reason: {},
            
        }

        const vv = useVuelidate(rules, {
            user_id: toRef(dosage, 'user_id'),
            vaccine_name: toRef(dosage, 'vaccine_name'),
            brand_name: toRef(dosage, 'brand_name'),
            dose: toRef(dosage, 'dose'),
            site_of_injection: toRef(dosage, 'site_of_injection'),
            expiry_date: toRef(dosage, 'expiry_date'),
            batch_number: toRef(dosage, 'batch_number'),
            lot_number: toRef(dosage, 'lot_number'),
            diluent: toRef(dosage, 'diluent'),
            date_of_reconstitution: toRef(dosage, 'date_of_reconstitution'),
            time_of_reconstitution: toRef(dosage, 'time_of_reconstitution'),
            diluent_batch_number: toRef(dosage, 'diluent_batch_number'),
            diluent_lot_number: toRef(dosage, 'diluent_lot_number'),
            consent: toRef(dosage.pre_assessment, 'consent'),
            reason: toRef(dosage.pre_assessment, 'reason')
        })

        const closeDosage = () => {
            store.dispatch('vaccines/TOGGLE_DOSAGE_FORM',false)
            store.dispatch('vaccines/RESET_DOSAGE')
        }

        const displayPres = () => {
            store.dispatch('vaccines/TOGGLE_PRES_FORM',true)
            store.dispatch('vaccines/TOGGLE_REASON_FORM',false)
        }

        const displayReason = () => {
            store.dispatch('vaccines/TOGGLE_REASON_FORM',true)
            store.dispatch('vaccines/TOGGLE_PRES_FORM',false)
        }

        const addDosage  = () => {
            vv.value.$touch();
            if (vv.value.$invalid) return

            if (dosage.id==0) store.dispatch('vaccines/ADD_DOSAGE', dosage)
            else store.dispatch('vaccines/UPDATE_DOSAGE', dosage)

            closeDosage()
        }

        return {
            editMode,
            dosage,
            addDosage,
            vv,
            closeDosage,
            displayPres,
            displayReason
        }
    },
    data(){
        return {
            
        }
    },
    components: {
        Button,
        TabView,
        TabPanel,
        InputText,
        Dropdown,
        RadioButton,
        ConfirmDialog,
        DataTable,
        Column,
        Dialog,
        Calendar,
        Panel,
        Toolbar

    },
    computed:{
        default_id() {

            return this.$store.state.vaccines.default_id

        },
        vaccinators() {

            return this.$store.state.vaccines.vaccinators

        },
        brands() {

            return this.$store.state.vaccines.brands

        },
        vaccines() {

            if (!this.brands) return []

            const brand_name = this.brands.filter(brand_name => {
                return brand_name.id == this.dosage.brand_name
            })

            if (brand_name.length==0) return []

            const vaccines = brand_name[0].vaccines

            return vaccines

        },
        sites() {

            return this.$store.state.vaccines.sites

        },
        doses() {

            return this.$store.state.vaccines.doses

        },
        reasons() {

            return this.$store.state.vaccines.reasons
            
        },
        displayDosage() {

            return this.$store.state.vaccines.displayDosage
            
        },
        displayPresTable() {

            return this.$store.state.vaccines.displayPres
            
        },
        displayReasonForm() {

            return this.$store.state.vaccines.displayReason
            
        },
    } 
}
</script>