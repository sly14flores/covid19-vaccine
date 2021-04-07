<template>
    <div class="p-fluid">
        <Panel header="Vaccine Administration">
            <!-- <div class="p-fluid p-formgrid p-grid">
                <div class="p-field p-col-12 p-md-12 p-mt-2">
                    <div class="p-inputgroup">
                        <span class="p-float-label">
                            <Dropdown id="dropdown" class="p-shadow-1 p-inputtext-sm" optionLabel="name" :options="sessions" optionValue="id" v-model="vaccination_session" :class="{'p-invalid': vaccination_sessionError, 'disabled': !writeOn}" :disabled="!writeOn" />
                            <label for="dropdown">Select a Session</label>
                        </span>
                    </div>
                    <small class="p-error">{{ vaccination_sessionError }}</small>
                </div>
            </div> -->
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
                        <div class="tooltip"><Button icon="pi pi-fw pi-pencil" class="p-button-rounded p-button-success p-button-sm p-mr-2" @click="showVaccine(slotProps.data.id)" />
                            <span class="tooltiptext">Edit</span>
                        </div>
                        <div class="tooltip"><Button icon="pi pi-trash" class="p-button-rounded p-button-danger p-button-sm" @click="removeDosage()" />
                            <span class="tooltiptext">Delete</span>
                        </div>
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
                <Button label="Update" type="submit" class="p-button-primary p-button-sm" :disabled="!writeOn"></Button>
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

import { reactive, ref, toRef } from 'vue';
import { useVuelidate } from "@vuelidate/core";
import { required } from "@vuelidate/validators";

export default {
    props: ['editOn'],    
    setup(props) {

        const { editOn } = props
        const editMode = eval(editOn)

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

            vv.value.$touch();
            if (vv.value.$invalid) return

            // store.dispatch('vaccines/',vaccination)           

        }

        return {
            editMode,
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
    }
}

</script>
