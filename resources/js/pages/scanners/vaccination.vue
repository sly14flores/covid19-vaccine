<template>
    <div class="p-fluid">
        <Panel header="Vaccine Administration">
            <form>
                <div class="p-fluid p-formgrid p-grid">
                    <div class="p-field p-col-12 p-md-12 p-mt-2">
                        <span class="p-float-label">
                            <Dropdown id="dropdown" class="p-shadow-1 p-inputtext-sm" optionLabel="name" :options="sessions" optionValue="id" v-model="ss.vaccination_session.$model" :class="{'p-invalid': ss.vaccination_session.$error, 'disabled': !writeOn}" :disabled="!writeOn" />
                            <label for="dropdown">Select a Session</label>
                        </span>
                        <small v-if="ss.vaccination_session.$error" class="p-error">This field is required</small>
                    </div>
                </div>
            </form>
            <hr />
            <Toolbar>
                <template #left>
                    <h6>Dosages</h6>
                </template>
                <template #right>
                    <Button label="Add" class="p-button-success p-button-sm" @click="openDosage" v-if="writeOn" />
                </template>
            </Toolbar>
            <DataTable :value="dosages" dataKey="id">
                <Column field="dose" header="Dosage"></Column>
                <Column field="brand_description" header="Vaccine Manufacturer Name"></Column>
                <Column field="vaccinator" header="Administered by"></Column>
                <Column field="id" header="Actions">
                    <template #body="slotProps">
                        <Button icon="pi pi-fw pi-pencil" class="p-button-rounded p-button-success p-button-sm p-mr-2" @click="showDosage(slotProps.data)" />
                        <Button icon="pi pi-trash" class="p-button-rounded p-button-danger p-button-sm" @click="removeDosage(slotProps.data)" />
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
import { reactive, watch, toRef } from 'vue';

import { useVuelidate } from "@vuelidate/core";
import { required } from "@vuelidate/validators";

export default {
    props: ['editOn'],    
    setup(props) {

        const { editOn } = props
        const editMode = eval(editOn)
        const store = useStore()
        const { state, dispatch } = store

        
        store.dispatch('vaccines/GET_SELECTION_BRANDS')

        const vaccination = reactive({
            ...state.vaccines.vaccination,
        })

        watch(
            () => state.vaccines.vaccination,
            (data, prevData) => {
                console.log('Watch vaccination triggered')
                // Object.assign(vaccination, state.vaccines.vaccination)
                const vaccination_session = vaccination.vaccination_session
                Object.assign(vaccination, {...data, vaccination_session})
            },
            {deep: true}
        )

        const rules = {
            vaccination_session: { required }
        }

        const ss = useVuelidate(rules, vaccination)        

        const updateVaccination = () => {
            
            ss.value.vaccination_session.$touch();
            if (ss.value.vaccination_session.$error) return
            
            store.dispatch('vaccines/UPDATE_VACCINATION',{ vaccination })

        }

        return {
            vaccination,
            updateVaccination,
            ss,
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
            console.log('openDosage')
            this.$store.dispatch('vaccines/TOGGLE_DOSAGE_FORM',true)
            this.$store.dispatch('vaccines/GET_VACCINATORS')
            this.$store.dispatch('vaccines/GET_REASONS')
            this.$store.dispatch('vaccines/GET_PRES')
            this.$store.dispatch('vaccines/GET_POST')
        },
        showDosage(data) {
            this.$store.dispatch('vaccines/TOGGLE_DOSAGE_FORM',true)
            this.$store.dispatch('vaccines/GET_VACCINATORS')
            this.$store.dispatch('vaccines/GET_REASONS')
            console.log('showDosage')
            // const { id } = data
            this.$store.dispatch('vaccines/SHOW_DOSAGE', data)
            // if (id>0) this.$store.dispatch('vaccines/GET_DOSAGE', {id})
            // if (id===0) this.$store.dispatch('vaccines/SHOW_DOSAGE', data)
        },
        removeDosage(data) {
            this.$store.dispatch('vaccines/DELETE_DOSAGE',{data})
        },  
    }
}

</script>

<style scoped>
    .disabled {
        background: rgb(219, 219, 219);
        border-bottom: 1px solid black;
        cursor: not-allowed; 
    }
</style>
