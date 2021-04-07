<template>
    <div class="p-fluid">
        <Panel header="Vaccine Administration">
            <form>
                <div class="p-fluid p-formgrid p-grid">
                    <div class="p-field p-col-12 p-md-12 p-mt-2">
                        <span class="p-float-label">
                            <Dropdown id="dropdown" class="p-shadow-1 p-inputtext-sm" optionLabel="name" :options="sessions" optionValue="id" v-model="vv.vaccination_session.$model" :class="{'p-invalid': vv.vaccination_session.$error, 'disabled': !writeOn}" :disabled="!writeOn" />
                            <label for="dropdown">Select a Session</label>
                        </span>
                        <small v-if="vv.vaccination_session.$error" class="p-error">This field is required</small>
                    </div>
                </div>
            </form>
            <hr />
            <Toolbar>
                <template #left>
                    <h6>Dosages</h6>
                </template>
                <template #right>
                    <Button label="Add" class="p-button-success p-button-sm" @click="openDosage" />
                </template>
            </Toolbar>
            <DataTable :value="dosages" dataKey="id">
                <Column field="vaccine_name" header="Vaccine Name"></Column>
                <Column field="dose" header="Dosage"></Column>
                <Column field="vaccinator" header="Administered by"></Column>
                <Column field="date" header="Date"></Column>
                <Column field="id" header="Actions">
                    <template #body="slotProps">
                        <Button icon="pi pi-fw pi-pencil" class="p-button-rounded p-button-success p-button-sm p-mr-2" @click="showVaccine(slotProps.data.id)" />
                        <Button icon="pi pi-trash" class="p-button-rounded p-button-danger p-button-sm" @click="removeDosage()" />
                    </template>
                </Column>
            </DataTable>
            <ConfirmDialog group="confirmDelete"></ConfirmDialog>
        </Panel>
    </div>
    
    <VaccineDialogForm :editOn="editMode" />
    
    <div class="p-fluid">
        <div class="p-fluid p-formgrid p-grid p-mt-2">
            <div class="p-field p-col-12 p-md-10"></div>
            <div class="p-field p-col-12 p-md-2">
                <Button label="Update" type="button" class="p-button-primary p-button-sm" :disabled="!writeOn" @click="updateVaccination"></Button>
            </div>
        </div>
    </div>    
</template>

<script>

import Panel from 'primevue/panel/sfc';
import Dropdown from 'primevue/dropdown/sfc';
import Toolbar from 'primevue/toolbar/sfc';
import Button from 'primevue/button/sfc';
import DataTable from 'primevue/datatable/sfc';
import Column from 'primevue/column/sfc';
import ConfirmDialog from 'primevue/confirmdialog/sfc';

import VaccineDialogForm from "./Dosage.vue";

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

        const vaccination = reactive({
            ...state.vaccines.vaccination,
        })

        const rules = {
            vaccination_session: { required }
        }

        const vv = useVuelidate(rules, {
            vaccination_session: toRef(vaccination, 'vaccination_session'),
        })

        const updateVaccination = () => {
            
            // vv.value.$touch();
            // if (vv.value.$invalid) return
            
            store.dispatch('vaccines/UPDATE_VACCINATION', vaccination)

        }

        return {
            vaccination,
            updateVaccination,
            vv,
            editMode
        }
        
    },
    components: {
        Panel,
        Dropdown,
        Toolbar,
        Button,
        DataTable,
        Column,
        ConfirmDialog,
        VaccineDialogForm
    },
    computed: {
        writeOn: {
            set(value) {
                this.$store.dispatch('vaccines/TOGGLE_WRITE', value)
            },
            get() {
                return this.$store.state.vaccines.writeOn
            }
        },
        dosages() {

            return this.$store.state.vaccines.vaccination.dosages

        },  
        sessions() {

            return this.$store.state.vaccines.sessions

        },     
    },
    methods: {
        openDosage() {
            this.$store.dispatch('vaccines/TOGGLE_DOSAGE_FORM',true)
            this.$store.dispatch('vaccines/GET_SELECTION_BRANDS')
            this.$store.dispatch('vaccines/GET_USERS')
            this.$store.dispatch('vaccines/RESET_DOSAGE')
            // this.$store.state.vaccines.vaccination.user_id = this.$store.state.vaccines.default_id.id;
        },
        showDosage(id) {
            this.$store.dispatch('vaccines/TOGGLE_DOSAGE_FORM',true)
            this.$store.dispatch('vaccines/GET_SELECTION_BRANDS')
            this.$store.dispatch('vaccines/GET_USERS')
            // this.$store.dispatch('vaccines/GET_VACCINATION', {id})
        },
         removeDosage(index) {
            this.$store.state.vaccines.vaccination.dosages.splice(index, 1);
        },       
    }
}

</script>
