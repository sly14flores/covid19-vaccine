<template>
    <div>
        <Dialog header="Dosage" v-model:visible="displayDosage" :closable="false" :closeOnEscape="true" :style="{width: '80vw'}" :maximizable="true" position="top" :modal="true">   
            <hr />
            <form>
                <div class="p-fluid p-formgrid p-grid">
                    <div class="p-field p-col-12 p-md-4">
                        <label>Vaccinator </label>
                        <Dropdown class="p-shadow-1 p-inputtext-sm" :class="{'p-invalid': vv.user_id.$error}" id="user_id" optionLabel="name" :options="users" v-model="vv.user_id.$model" optionValue="id" placeholder="Select a vaccinator" />
                    </div>
                    <div class="p-field p-col-12 p-md-4">
                        <label>Vaccine Manufacturer Name </label>
                        <Dropdown class="p-shadow-1 p-inputtext-sm" id="brand_name" optionLabel="name" :options="brands" v-model="dosage.brand_name" optionValue="id" placeholder="Select a manufacturer name" />
                    </div>
                    <div class="p-field p-col-12 p-md-4">
                        <label>Vaccine Name </label>
                        <InputText class="p-shadow-1 p-inputtext-sm" type="text" id="vaccine_name" v-model="dosage.vaccine_name" />
                    </div>
                </div>
                <div class="p-fluid p-formgrid p-grid">
                    <div class="p-field p-col-12 p-md-4">
                        <label>Dose </label>
                        <Dropdown class="p-shadow-1 p-inputtext-sm" id="dose" optionLabel="name" :options="doses" v-model="dosage.dose" optionValue="id" placeholder="Select a dose" />
                    </div>
                    <div class="p-field p-col-12 p-md-2">
                        <label>Site of Injection</label>
                        <Dropdown class="p-shadow-1 p-inputtext-sm" id="site_of_injection" optionLabel="name" :options="sites" v-model="dosage.site_of_injection" optionValue="id" placeholder="Select a Site of Injection" />
                    </div>
                    <div class="p-field p-col-12 p-md-2">
                        <label>Expiry Date</label>
                        <Calendar class="p-shadow-1 p-inputtext-sm" v-model="dosage.expiry_date" name="expiry_date" />
                    </div>
                    <div class="p-field p-col-12 p-md-2">
                        <label>Batch Number</label>
                        <InputText class="p-shadow-1 p-inputtext-sm" type="text" id="batch_number" v-model="dosage.batch_number" />
                    </div>
                    <div class="p-field p-col-12 p-md-2">
                        <label>Lot Number</label>
                        <InputText class="p-shadow-1 p-inputtext-sm" type="text" id="lot_number" v-model="dosage.lot_number" />
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
                        <DataTable class="p-datatable-sm" :value="dosage.pre_assessment.assessments" dataKey="key">
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
                    <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati
                            cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.
                            Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus.</p>
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
import { reactive, ref, toRef } from 'vue';

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

        const rules = {
            user_id: { required }
        }

        const vv = useVuelidate(rules, {
            user_id: toRef(dosage, 'user_id'),
        })

        const closeDosage = () => {
            store.dispatch('vaccines/TOGGLE_DOSAGE_FORM',false)
        }

        const addDosage  = () => {
            vv.value.$touch();
            if (vv.value.$invalid) return

            store.dispatch('vaccines/ADD_DOSAGE',dosage)
            closeDosage()
        }

        return {
            editMode,
            dosage,
            addDosage,
            vv,
            closeDosage
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
        users() {

            return this.$store.state.vaccines.users

        },
        brands() {

            return this.$store.state.vaccines.brands

        },
        sites() {

            return this.$store.state.vaccines.sites

        },
        doses() {

            return this.$store.state.vaccines.doses

        },
        displayDosage() {

            return this.$store.state.vaccines.displayDosage
            
        },
    } 
}
</script>