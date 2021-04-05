<template>
    <div>
        <div class="card">
            <h5>Vaccination </h5>
            <TabView>
                <TabPanel header="QR Code Scanning">
                    <div class="p-grid">
                        <div class="p-lg-4 p-sm-12 p-xs-12">
                            <div class=" p-fluid p-shadow-2">
                                <Button icon="pi pi-refresh float-right" @click="reset" />
                                <div class="p-grid p-jc-center">
                                    <div class="p-lg-2 p-md-2 p-xs-5">
                                        <img alt="logo" src="img/qr-code.png" class="qr-code" />
                                    </div>
                                </div>
                                <div class="p-grid p-jc-center p-mt-2">
                                    <h2 class="p-label-blue">QR Code Scanning</h2>
                                </div>
                                <div class="p-grid">
                                    <div class="p-field p-col-11 p-md-12">
                                        <div class="center stream">
                                            <qr-stream :camera="camera" @decode="onDecode" class="mb p-shadow-3">
                                                <div class="frame"></div>
                                            </qr-stream>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="p-lg-8 p-sm-12 p-xs-12">
                            <div class="p-fluid p-shadow-2">
                                <form @submit="onSubmit">
                                    <div class="card p-shadow-2">
                                        <div class="p-fluid p-formgrid p-grid">
                                            <div class="p-field p-col-10 p-md-11">
                                                <h6><i class="pi pi-user"></i> Personal Information</h6>
                                            </div>
                                            <div class="p-field p-col-2 p-md-1">
                                                <ToggleButton v-model="writeOn" onIcon="pi pi-ban" offIcon="pi pi-pencil" change="toggleWrite" />
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="p-fluid p-formgrid p-grid">
                                            <div class="p-field p-col-12 p-md-6">
                                                <label for="qr_pass_id">Napanam ID No.: <i class="p-error">*</i></label>
                                                <div class="p-inputgroup">
                                                    <InputText class="p-shadow-1 p-inputtext-sm" id="qr_pass_id " type="number" placeholder="Enter Napanam ID No." v-model="qr_pass_id" :class="{'p-invalid': qr_pass_idError}" />
                                                    <Button label="Fetch" class="p-button-sm p-shadow-1 p-button-primary" @click="getNapanam" />
                                                </div>
                                                <small class="p-error">{{ first_nameError }}</small>
                                            </div>
                                        </div>
                                        <div class="p-fluid p-formgrid p-grid">
                                            <div class="p-field p-col-12 p-md-3">
                                                <label for="first_name">First Name <i class="p-error">*</i></label>
                                                <InputText class="p-shadow-1 p-inputtext-sm" id="first_name " type="text" v-model="first_name" :class="{'p-invalid': first_nameError}" :disabled="!writeOn" />
                                                <small class="p-error">{{ first_nameError }}</small>
                                            </div>
                                            <div class="p-field p-col-12 p-md-3">
                                                <label for="last_name">Last Name <i class="p-error">*</i></label>
                                                <InputText class="p-shadow-1 p-inputtext-sm" id="last_name " type="text" v-model="last_name" :class="{'p-invalid': last_nameError}" :disabled="!writeOn" />
                                                <small class="p-error">{{ last_nameError }}</small>
                                            </div>
                                            <div class="p-field p-col-12 p-md-3">
                                                <label for="middle_name">Middle Name </label>
                                                <InputText class="p-shadow-1 p-inputtext-sm" id="middle_name " type="text" v-model="middle_name" :disabled="!writeOn" />
                                            </div>
                                            <div class="p-field p-col-12 p-md-3">
                                                <label>Suffix/Extension Name <i class="p-error">*</i></label>
                                                <Dropdown class="p-shadow-1 p-inputtext-sm" optionLabel="name" :options="suffix_value" optionValue="id" v-model="suffix" placeholder="Select a Suffix" :class="{'p-invalid': suffixError, 'disabled': !writeOn}" :disabled="!writeOn" />
                                                <small class="p-error">{{ suffixError }}</small>    
                                            </div>
                                        </div>
                                        <div class="p-fluid p-formgrid p-grid">
                                            <div class="p-field p-col-12 p-md-4">
                                                <label>Birthdate <i class="p-error">*</i></label>
                                                <InputText class="p-shadow-1 p-inputtext-sm" type="date" v-model="birthdate" :class="{disabled: !writeOn}" :disabled="!writeOn" />
                                            </div>
                                            <div class="p-field p-col-12 p-md-4">
                                                <label>Sex <i class="p-error">*</i></label>
                                                <Dropdown class="p-shadow-1 p-inputtext-sm" optionLabel="name" :options="gender_value" optionValue="id" v-model="gender" placeholder="Select a Gender" :class="{disabled: !writeOn}" :disabled="!writeOn" />
                                            </div>
                                            <div class="p-field p-col-12 p-md-4">
                                                <label>Contact No.: <i class="p-error">*</i></label>
                                                <InputText class="p-shadow-1 p-inputtext-sm" type="text" v-model="contact_no" :disabled="!writeOn" />
                                            </div>
                                        </div>
                                        <div class="p-fluid p-formgrid p-grid">
                                            <div class="p-field p-col-12 p-md-4">
                                                <label>Region <i class="p-error">*</i></label>
                                                <InputText class="p-shadow-1 p-inputtext-sm" type="text" v-model="region" :disabled="!writeOn" />
                                            </div>
                                            <div class="p-field p-col-12 p-md-4">
                                                <label>Province <i class="p-error">*</i></label>
                                                <Dropdown class="p-shadow-1 p-inputtext-sm" optionLabel="name" :options="provinces" optionValue="id" v-model="province" placeholder="Select a province" :class="{'p-invalid': provinceError, 'disabled': !writeOn}" :disabled="!writeOn" />
                                            </div>
                                            <div class="p-field p-col-12 p-md-4">
                                                <label>Municipality <i class="p-error">*</i></label>
                                                <Dropdown class="p-shadow-1" optionLabel="name" :options="municipalities" optionValue="id" v-model="town_city" :class="{'p-invalid': town_cityError, 'disabled': !writeOn}" placeholder="Select a municipality" :disabled="!writeOn" />
                                            </div>
                                        </div>
                                        <div class="p-fluid p-formgrid p-grid">
                                            <div class="p-field p-col-12 p-md-4">
                                                <label>Barangay <i class="p-error">*</i></label>
                                                <Dropdown class="p-shadow-1" optionLabel="name" :options="barangays" optionValue="id" v-model="barangay" :class="{'p-invalid': barangayError, 'disabled': !writeOn}" placeholder="Select a barangay" :disabled="!writeOn" />
                                            </div>
                                            <div class="p-field p-col-12 p-md-4">
                                                <label>Unit/Building/Street/House No. <i class="p-error">*</i></label>
                                                <InputText class="p-shadow-1 p-inputtext-sm" type="text" v-model="address" :disabled="!writeOn" />
                                            </div>
                                            <div class="p-field p-col-12 p-md-4">
                                                <label>Occupation</label>
                                                <InputText class="p-shadow-1" type="text" v-model="occupation" :disabled="!writeOn" />
                                            </div>
                                        </div>
                                        <div class="p-fluid">
                                            <div class="p-fluid p-formgrid p-grid p-mt-2">
                                                <div class="p-field p-col-12 p-md-10"></div>
                                                <div class="p-field p-col-12 p-md-2">
                                                    <Button label="Update" type="submit" class="p-button-primary p-button-sm" :disabled="!writeOn"></Button>
                                                </div>
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="p-fluid">
                                            <Panel header="Vaccine Administration">
                                                <div class="p-field p-col-12 p-md-6 p-mt-2">
                                                    <span class="p-float-label">
                                                        <Dropdown id="dropdown" class="p-shadow-1 p-inputtext-sm" optionLabel="name" :options="sessions" optionValue="id" v-model="vaccination_session" :class="{'p-invalid': vaccination_sessionError, 'disabled': !writeOn}" :disabled="!writeOn" />
                                                        <label for="dropdown">Select a Session</label>
                                                    </span>
                                                    <small class="p-error">{{ vaccination_sessionError }}</small>
                                                </div>
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
                                                    <Column field="vaccine_name" header="Vaccine Name"></Column>
                                                    <Column field="dose" header="Dosage"></Column>
                                                    <Column field="vaccinator" header="Administered by"></Column>
                                                    <Column field="date" header="Date"></Column>
                                                    <Column field="id" header="Actions">
                                                        <template #body="slotProps">
                                                            <div class="tooltip"><Button icon="pi pi-fw pi-pencil" class="p-button-rounded p-button-success p-button-sm p-mr-2" @click="showVaccine(slotProps.data.id)" />
                                                                <span class="tooltiptext">Edit</span>
                                                            </div>
                                                            <div class="tooltip"><Button icon="pi pi-trash" class="p-button-rounded p-button-danger p-button-sm" @click="deleteDosage(slotProps.data.id)" />
                                                                <span class="tooltiptext">Delete</span>
                                                            </div>
                                                        </template>
                                                    </Column>
                                                </DataTable>
                                                <ConfirmDialog group="confirmDelete"></ConfirmDialog>
                                            </Panel>
                                        </div>
                                        
                                        <Dialog header="Dosage" v-model:visible="displayDosage" :closeOnEscape="true" :style="{width: '80vw'}" :maximizable="true" position="top" :modal="true">
                                            <hr />
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
                                            <br />
                                            <template #footer>
                                                <Button label="Close" icon="pi pi-times" @click="closeDosage" class="p-button-text"/>
                                                <Button :label="textLabel" icon="pi pi-check" @click="saveVaccine" autofocus />
                                            </template>
                                        </Dialog>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </TabPanel>
            </TabView>
        </div>   
       <ScrollTop />
    </div>
</template>

<script>

import Button from 'primevue/button/sfc';
import InputText from 'primevue/inputtext/sfc';
import Dropdown from 'primevue/dropdown/sfc';
import Menubar from 'primevue/menubar/sfc';
import TabView from 'primevue/tabview';
import TabPanel from 'primevue/tabpanel';
import Checkbox from 'primevue/checkbox/sfc';
import ToggleButton from 'primevue/togglebutton/sfc';
import RadioButton from 'primevue/radiobutton/sfc';
import ConfirmDialog from 'primevue/confirmdialog/sfc';
import DataTable from 'primevue/datatable/sfc';
import Column from 'primevue/column/sfc';
import Paginator from 'primevue/paginator/sfc';
import Dialog from 'primevue/dialog/sfc';
import Calendar from 'primevue/calendar/sfc';
import ScrollTop from 'primevue/scrolltop/sfc';
import Panel from 'primevue/panel/sfc';
import Toolbar from 'primevue/toolbar/sfc';

import { QrStream, QrCapture, QrDropzone } from 'vue3-qr-reader';
import { useStore } from 'vuex'
import { useForm, useField } from 'vee-validate'
import { useRoute } from 'vue-router'
import { watch, computed } from 'vue'
import { useConfirm } from "primevue/useconfirm"

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

        store.dispatch('vaccines/GET_SELECTIONS')
        
        function onDecode(data) {
            const str = data.split('r')
            const qr = str[1]
            store.dispatch('vaccines/GET_BY_QR',{ id: qr })
            store.dispatch('vaccines/GET_VACCINATION', { id: qr })
            store.dispatch('vaccines/GET_SELECTION_SESSIONS')
        }

        const init = {
            initialValues: {
                vaccine: {...store.state.vaccines.vaccine}
            }
        }

        const { setValues, handleSubmit, resetForm } = useForm(init);

        watch( // For Registration Data
            () => store.state.vaccines.fetched,
            (data, prevData) => {
                if (data) {
                    setValues({
                        vaccine: {...store.state.vaccines.vaccine}
                    })
                }
            }
        )

        watch( // For Vaccine Data
            () => store.state.vaccines.vaccination,
            (data, prevData) => {
                setValues({
                    vaccination: {...data}
                })
            }
        )

        const getNapanam = () => {
            store.dispatch('vaccines/GET_BY_QR', { id: qr_pass_id.value })
            store.dispatch('vaccines/GET_VACCINATION', { id: qr_pass_id.value })
            store.dispatch('vaccines/GET_SELECTION_SESSIONS')
        }

        const dosages = computed(() => {

            return store.state.vaccines.dosages

        });

        const saveVaccine = handleSubmit((values) => {

            const { vaccination } = values || {}
            const { id } = vaccination || {}
            
            if(id){
                dispatch('vaccines/UPDATE_VACCINATION', vaccination)
            } else {
                dispatch('vaccines/CREATE_VACCINATION', vaccination)
            }
            
        });

        const onSubmit = handleSubmit((values, actions) => {

            const { resetForm } = actions
            const { vaccine } = values

            confirm.require({
                message: "Are you sure you want to add this registration's info?",
                header: 'Confirmation',
                icon: 'pi pi-exclamation-triangle',
                accept: () => {
                    dispatch('vaccines/CREATE_REGISTRATION', vaccine)
                },
                reject: () => {
                    //callback to execute when registration rejects the action
                }
            });

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

        // Personal
        const { value: id } = useField('vaccine.id',validField);
        const { value: qr_pass_id, errorMessage: qr_pass_idError } = useField('vaccine.qr_pass_id',validateField);
        const { value: first_name, errorMessage: first_nameError } = useField('vaccine.first_name',validateField);
        const { value: middle_name } = useField('vaccine.middle_name',validField);
        const { value: last_name, errorMessage: last_nameError } = useField('vaccine.last_name',validateField);
        const { value: suffix, errorMessage: suffixError } = useField('vaccine.suffix',validateField);
        const { value: birthdate } = useField('vaccine.birthdate',validField);
        const { value: gender, errorMessage: genderError } = useField('vaccine.gender',validateField);
        const { value: region } = useField('vaccine.region',validField);
        const { value: province, errorMessage: provinceError } = useField('vaccine.province',validateField);
        const { value: town_city, errorMessage: town_cityError } = useField('vaccine.town_city',validateField);
        const { value: barangay, errorMessage: barangayError } = useField('vaccine.barangay',validateField);
        const { value: address } = useField('vaccine.address',validField);
        const { value: contact_no } = useField('vaccine.contact_no',validField);
        const { value: occupation } = useField('vaccine.occupation',validField);

        // Vaccine Administered
        const { value: vaccination_id } = useField('vaccination.id',validField);
        const { value: vaccination_session, errorMessage: vaccination_sessionError } = useField('vaccination.vaccination_session',validateField);

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
            id, // Start Personal
            vaccination_id,
            qr_pass_id,
            first_name,
            middle_name,
            last_name,
            suffix,
            birthdate,
            gender,
            region,
            province,
            town_city,
            address, // street
            barangay,
            contact_no,
            occupation, // End Personal

            vaccination_session, // Vaccine

            dosage_id, // Dosage
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
            diluent_lot_number, // End Dosage

            qr_pass_idError, // Error
            first_nameError,
            last_nameError,
            suffixError,
            genderError,
            provinceError,
            town_cityError,
            barangayError,
            vaccination_sessionError,

            // Others
            onSubmit,
            editMode,
            onDecode,
            getNapanam,
            saveVaccine,
            dosages
        }

    },
    data() {
      return {
          camera: 'auto',
          displayDosage: false,
          consent_hide: false,
          datatable_hide: false
      }
    },
    components: {
        Button,
        InputText,
        Dropdown,
        Menubar,
        QrStream,
        QrCapture,
        QrDropzone,
        TabView,
        TabPanel,
        Checkbox,
        RadioButton,
        ConfirmDialog,
        ToggleButton,
        DataTable,
        Column,
        Paginator,
        Dialog,
        Calendar,
        ScrollTop,
        Panel,
        Toolbar
    },
    computed: {
        suffix_value() {

            return this.$store.state.vaccines.selections.suffix_value

        },
        gender_value() {

            return this.$store.state.vaccines.selections.gender_value

        },
        civil_status_value() {

            return this.$store.state.vaccines.selections.civil_status_value

        },
        category_value() {

            return this.$store.state.vaccines.selections.category_value

        },
        category_id_value() {

            return this.$store.state.vaccines.selections.category_id_value

        },
        employment_status_value() {

            return this.$store.state.vaccines.selections.employment_status_value

        },
        profession_value() {

            return this.$store.state.vaccines.selections.profession_value

        },
        allergy_value() {

            return this.$store.state.vaccines.selections.allergy_value

        },
        comorbidity_value() {

            return this.$store.state.vaccines.selections.comorbidity_value

        },
        covid_classification_value() {

            return this.$store.state.vaccines.selections.covid_classification_value

        },
        region_value() {

            return this.$store.state.vaccines.selections.region_value

        },
        employer_municipality_value() {

            return this.$store.state.vaccines.selections.employer_municipality_value

        },
        sessions() {

            return this.$store.state.vaccines.sessions

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
        default_id() {

            return this.$store.state.vaccines.default_id

        },
        users() {

            return this.$store.state.vaccines.users

        },
        provinces() {

            return this.$store.state.vaccines.selections.addresses.province_value

        },
        municipalities() {

            if (!this.provinces) return []

            const province = this.provinces.filter(province => {
                return province.id == this.province
            })

            if (province.length==0) return []

            const municipalities = province[0].municipalities

            return municipalities


        },
        barangays() {

            if (!this.municipalities) return []

            const municipality = this.municipalities.filter(mun => {
                return mun.id == this.town_city
            })

            if (municipality.length==0) return []

            const barangays = municipality[0].barangays
            
            return barangays

        },
        manufactures() {
            return this.$store.state.vaccines.manufactures
        },
        saving() {
            return this.$store.state.vaccines.saving
        },
        writeOn: {
            set(value) {
                this.$store.dispatch('vaccines/TOGGLE_WRITE', value)
            },
            get() {
                return this.$store.state.vaccines.writeOn
            }
        }
    },
    methods: {
        deleteDosage(id) {
            this.$confirm.require({
                key: 'confirmDelete',
                message: 'Are you sure you want to delete this vaccine information?',
                header: 'Confirmation',
                icon: 'pi pi-exclamation-triangle',
                accept: () => {
                    this.$store.dispatch('vaccines/DELETE_VACCINATION', {id})
                },
                reject: () => {
                    //callback to execute when vaccine rejects the action
                }
            });
        },
        openDosage() {
            this.displayDosage = true;
            this.textLabel = "Save"
            this.$store.dispatch('vaccines/GET_SELECTION_BRANDS')
            this.$store.dispatch('vaccines/GET_USERS')
            // this.$store.dispatch('vaccines/RESET_DOSAGE')
            // this.$store.state.vaccines.vaccination.user_id = this.$store.state.vaccines.default_id.id;
        },
        showDosage(id) {
            this.displayDosage = true;
            this.textLabel = "Update"
            this.$store.dispatch('vaccines/GET_SELECTION_BRANDS')
            this.$store.dispatch('vaccines/GET_USERS')
            // this.$store.dispatch('vaccines/GET_VACCINATION', {id})
        },
        closeDosage() {
            this.displayDosage = false;
        },
        async onInit (promise) {
            try {
                await promise
            } catch (e) {
                console.error(e)
            } finally {
            }
        },        
        async onDecode(data) {
            const str = data.split('r')
            const qr = str[1]
            this.$store.dispatch('vaccines/GET_BY_QR',{ id: qr })
            // reset
            // this.pause()
            // await this.timeout(500)
            // this.unpause()
            //
        },
        async reset() {
            this.pause()
            await this.timeout(500)
            this.unpause()
        },
        unpause () {
            this.camera = 'auto'
        },
        pause () {
            this.camera = 'off'
        },
        timeout (ms) {
            return new Promise(resolve => {
                window.setTimeout(resolve, ms)
            })
        },
        toggleWrite() {
            this.writeOn = !this.writeOn
        },
    },
    mounted() {

    }
}
</script>

<style scoped>
    .text-center {
        text-align: center;
    }
    .qr-code {
        height: 80px;
    }
    .menu-bar{
        background-color: #215266;
    }
    .p-label-white {
        color: white;
    }
    .p-label-blue {
        color: #215266;
        font-weight: bold;
        font-family: Arial, Helvetica, sans-serif;
    }
    @media screen and (max-width: 800px) {
        .calendar {
            height: 80px;
        }
        .p-label-blue {
            font-size: 20px;
        }
        .qr-code{
            height: 60px;
        }
    }
    /* Remove arrow for input="number"*/
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
    }
    /* Firefox */
    input[type=number] {
        -moz-appearance: textfield;
    }
    .stream {
        max-height: 500px;
        max-width: 500px;
        margin: auto;
    }
    .frame {
        background-image: linear-gradient(#fe664f, #fe664f),
                linear-gradient(#fe664f, #fe664f),
                linear-gradient(#fe664f, #fe664f),
                linear-gradient(#fe664f, #fe664f),
                linear-gradient(#fe664f, #fe664f),
                linear-gradient(#fe664f, #fe664f),
                linear-gradient(#fe664f, #fe664f),
                linear-gradient(#fe664f, #fe664f);
        background-repeat: no-repeat;
        background-size:  4px 30%, 30% 4px, 4px 30%, 30% 4px, 4px 30%, 30% 4px, 4px 30%, 30% 4px, 4px 30%, 30% 4px, calc(100% - 8px) calc(100% - 8px);
        background-position:  left top, left top, left bottom, left bottom, right bottom, right bottom , right top, right top, 4px 4px;
        height: 200px;
        width: 200px;
        position: absolute;
        top: 0px;
        bottom: 0px;
        right: 0px;
        left: 0px;
        margin: auto;
    }
    .p-border {
        border: 1px solid #215266;
    }
    .float-right {
        position: absolute; right: 5%;
    }
    input[type="text"]:disabled {
        background: rgb(219, 219, 219);
        border-bottom: 1px solid black;
        cursor: not-allowed; 
    }
    input[type="number"]:disabled {
        background: rgb(219, 219, 219);
        border-bottom: 1px solid black;
        cursor: not-allowed; 
    }
    .disabled {
        background: rgb(219, 219, 219);
        border-bottom: 1px solid black;
        cursor: not-allowed; 
    }
    .p-text-sm{
        font-size: 13px!important;
    }
    .tooltip {
        position: relative;
        display: inline-block;
    }

    .tooltip .tooltiptext {
        visibility: hidden;
        width: 120px;
        background-color: black;
        color: #fff;
        text-align: center;
        border-radius: 6px;
        padding: 5px 0;

        /* Position the tooltip */
        position: absolute;
        z-index: 1;
        bottom: 100%;
        left: 50%;
        margin-left: -60px;
    }

    .tooltip:hover .tooltiptext {
        visibility: visible;
    }
</style>