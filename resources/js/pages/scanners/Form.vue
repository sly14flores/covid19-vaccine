<template>
    <div>
        <Dialog header="Dosage" v-model:visible="displayDosage" :closeOnEscape="true" :style="{width: '80vw'}" :maximizable="true" position="top" :modal="true">
        <hr />
        <form @submit="onSubmit">
            <div class="p-fluid p-formgrid p-grid">
                <div class="p-field p-col-12 p-md-4">
                    <label>Vaccinator </label>
                    <Dropdown class="p-shadow-1 p-inputtext-sm" id="user_id" optionLabel="name" :options="users" v-model="user_id" optionValue="id" placeholder="Select a vaccinator" />
                </div>
                <div class="p-field p-col-12 p-md-4">
                    <label>Vaccine Manufacturer Name </label>
                    <Dropdown class="p-shadow-1 p-inputtext-sm" id="brand_name" optionLabel="name" :options="brands" v-model="brand_name" optionValue="id" placeholder="Select a manufacturer name" />
                </div>
                <div class="p-field p-col-12 p-md-4">
                    <label>Vaccine Name </label>
                    <InputText class="p-shadow-1 p-inputtext-sm" type="text" id="vaccine_name" v-model="vaccine_name" />
                </div>
            </div>
            <div class="p-fluid p-formgrid p-grid">
                <div class="p-field p-col-12 p-md-4">
                    <label>Dose </label>
                    <Dropdown class="p-shadow-1 p-inputtext-sm" id="dose" optionLabel="name" :options="doses" v-model="dose" optionValue="id" placeholder="Select a dose" />
                </div>
                <div class="p-field p-col-12 p-md-2">
                    <label>Site of Injection</label>
                    <Dropdown class="p-shadow-1 p-inputtext-sm" id="site_of_injection" optionLabel="name" :options="sites" v-model="site_of_injection" optionValue="id" placeholder="Select a Site of Injection" />
                </div>
                <div class="p-field p-col-12 p-md-2">
                    <label>Expiry Date</label>
                    <Calendar class="p-shadow-1 p-inputtext-sm" v-model="expiry_date" name="expiry_date" />
                </div>
                <div class="p-field p-col-12 p-md-2">
                    <label>Batch Number</label>
                    <InputText class="p-shadow-1 p-inputtext-sm" type="text" id="batch_number" v-model="batch_number" />
                </div>
                <div class="p-field p-col-12 p-md-2">
                    <label>Lot Number</label>
                    <InputText class="p-shadow-1 p-inputtext-sm" type="text" id="lot_number" v-model="lot_number" />
                </div>
            </div>
            <hr />
            <div class="p-fluid p-formgrid p-grid">
                <div class="p-field p-col-12 p-md-4">
                    <label>Diluent </label>
                    <InputText id="diluent" class="p-shadow-1 p-inputtext-sm" type="text" v-model="diluent" />
                </div>
                <div class="p-field p-col-12 p-md-2">
                    <label>Date of Reconstitution</label>
                    <Calendar id="date_of_reconstitution" class="p-shadow-1 p-inputtext-sm" v-model="date_of_reconstitution" name="date_of_reconstitution" />
                </div>
                <div class="p-field p-col-12 p-md-2">
                    <label>Time of Reconstitution</label>
                    <Calendar id="time_of_reconstitution" class="p-shadow-1 p-inputtext-sm" v-model="time_of_reconstitution" :timeOnly="true" hourFormat="12" />
                </div>
                <div class="p-field p-col-12 p-md-2">
                    <label>Diluent Batch Number</label>
                    <InputText class="p-shadow-1 p-inputtext-sm" type="text" id="diluent_batch_number" v-model="diluent_batch_number" />
                </div>
                <div class="p-field p-col-12 p-md-2">
                    <label>Diluent Lot Number</label>
                    <InputText class="p-shadow-1 p-inputtext-sm" type="text" id="diluent_lot_number" v-model="diluent_lot_number" />
                </div>
            </div>
            <hr />
            <TabView class="tabview-custom" ref="tabview4">
                <TabPanel>
                    <template #header>
                        <i class="pi pi-check-circle p-mr-2"></i>
                        <span>Pre-Assessment</span>
                    </template>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                        ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                        Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </TabPanel>
                <TabPanel>
                    <template #header>
                        <i class="pi pi-desktop p-mr-2"></i>
                        <span> Post Monitoring </span>
                    </template>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi
                        architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione
                        voluptatem sequi nesciunt. Consectetur, adipisci velit, sed quia non numquam eius modi.</p>
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
            <div class="p-fluid p-formgrid p-grid">
                <div class="p-field p-col-12 p-md-10"></div>
                <div class="p-field p-col-12 p-md-1">
                    <Button label="Close" icon="pi pi-times" @click="closeDosage" class="p-button-text"/>
                </div>
                <div class="p-field p-col-12 p-md-1">
                    <Button type="submit" :label="displayLabel" icon="pi pi-check" autofocus />
                </div>
            </div>
        </form>
        <br />
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
import { useForm, useField } from 'vee-validate';
import { useRoute } from 'vue-router';
import { watch, computed } from 'vue';
import { useConfirm } from "primevue/useconfirm";

export default {
    props: ['editOn'],
    setup(props) {

        const { editOn } = props
        const editMode = eval(editOn)
        const route = useRoute()
        const { params } = route
        const registrationId = params.id || null
        const store = useStore()
        const { state, dispatch } = store
        const confirm = useConfirm()
        
        const init = {
            initialValues: {
                dosage: {...store.state.vaccines.dosage}
            }
        }

        console.log(init)

        const { setValues, handleSubmit, resetForm } = useForm(init);

        watch(
            () => state.vaccines.dosage,
            (data, prevData) => {
                setValues({
                    dosage: {...data}
                })
            }
        )

        const onSubmit = handleSubmit((values, actions) => {

            const { resetForm } = actions
            const { dosage } = values
            console.log(dosage)

            store.dispatch('vaccines/ADD_DOSAGE')

        });

        function validateField(value) {
            if (!value) {
                return "This field is required";
            }
            return true;
        }

        function validField(value) {
            return true;
        }

        // Dosage
        const { value: dosage_id } = useField('dosage.id',validField);
        const { value: vaccine_id } = useField('dosage.vaccine_id',validField);
        const { value: user_id } = useField('dosage.user_id',validField);
        const { value: brand_name } = useField('dosage.brand_name',validField);
        const { value: vaccine_name } = useField('dosage.vaccine_name',validField);
        const { value: site_of_injection } = useField('dosage.site_of_injection',validField);
        const { value: expiry_date } = useField('dosage.expiry_date',validField);
        const { value: batch_number } = useField('dosage.batch_number',validField);
        const { value: lot_number } = useField('dosage.lot_number',validField);
        const { value: dose } = useField('dosage.dose',validField);
        const { value: diluent } = useField('dosage.diluent',validField);
        const { value: date_of_reconstitution } = useField('dosage.date_of_reconstitution',validField);
        const { value: time_of_reconstitution } = useField('dosage.time_of_reconstitution',validField);
        const { value: diluent_batch_number } = useField('dosage.diluent_batch_number',validField);
        const { value: diluent_lot_number } = useField('dosage.diluent_lot_number',validField);

        return {

            dosage_id,
            vaccine_id,
            user_id,
            brand_name,
            vaccine_name,
            site_of_injection,
            expiry_date,
            batch_number,
            lot_number,
            dose,
            diluent,
            date_of_reconstitution,
            time_of_reconstitution,
            diluent_batch_number,
            diluent_lot_number,
            onSubmit

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
    data() {
        return {
            
        }
    },
    methods: {
        closeDosage() {

            this.$store.state.vaccines.displayDosage = false;

        },
    },
    mounted() {
       
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
        displayLabel() {

            return this.$store.state.vaccines.displayLabel
            
        },
    } 
}
</script>