<template>
    <div>
        <div class="card">
            <h5>Vaccination </h5>
            <TabView>
                <TabPanel header="QR Code Scanning">
                    <div class="p-grid">
                        <div class="p-lg-4 p-sm-12 p-xs-12">
                            <div class="p-fluid p-shadow-2">
                                <div class="p-grid">
                                    <div class="p-col-10">     
                                        <ToggleButton class="p-ml-2" v-model="checked1" @click="switchCamera" onLabel="On" offLabel="Off" style="width: 4em" />
                                      </div>
                                    <div class="p-col-2">     
                                          <Button icon="pi pi-refresh float-right" @click="reset" />
                                    </div>
                                </div>
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
                                            <qr-stream :camera="camera" @decode="onDecode" class="mb p-shadow-3" @init="onInit">
                                                    <div class="frame" v-if="frame"></div>
                                                    <div class="loading-indicator p-mt-6" v-if="loading">
                                                        <div class="p-grid p-jc-center">
                                                            <div class="p-lg-2 p-md-2 p-xs-5">
                                                                <i class="pi pi-spin pi-spinner" style="fontSize: 5rem"></i>
                                                                <p>Loading...</p>
                                                            </div>
                                                        </div>
                                                    </div>
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
                                        <Vaccination :editOn="editMode" />
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
import TabView from 'primevue/tabview/sfc';
import TabPanel from 'primevue/tabpanel/sfc';
import Checkbox from 'primevue/checkbox/sfc';
import ToggleButton from 'primevue/togglebutton/sfc';
import RadioButton from 'primevue/radiobutton/sfc';
import ConfirmDialog from 'primevue/confirmdialog/sfc';
import DataTable from 'primevue/datatable/sfc';
import Column from 'primevue/column/sfc';
import Paginator from 'primevue/paginator/sfc';
import ScrollTop from 'primevue/scrolltop/sfc';
import Panel from 'primevue/panel/sfc';
import Toolbar from 'primevue/toolbar/sfc';
import SelectButton from 'primevue/selectbutton/sfc';
import Vaccination from './vaccination'

import { QrStream, QrCapture, QrDropzone } from 'vue3-qr-reader';
import { useStore } from 'vuex';
import { useForm, useField } from 'vee-validate';
import { watch } from 'vue';
import { useConfirm } from "primevue/useconfirm";

export default {
    props: ['editOn'],
    setup(props) {

        const { editOn } = props
        const editMode = eval(editOn)
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

        const getNapanam = () => {
            store.dispatch('vaccines/GET_BY_QR', { id: qr_pass_id.value })
        }

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
            qr_pass_idError, // Error
            first_nameError,
            last_nameError,
            suffixError,
            genderError,
            provinceError,
            town_cityError,
            barangayError,
            vaccination_sessionError,
            onSubmit,
            editMode,
            onDecode,
            getNapanam
        }

    },
    data() {
      return {
            camera: 'front',
            noRearCamera: false,
            noFrontCamera: false,
            checked1: false,
            loading: false,
            frame: false
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
        ScrollTop,
        Panel,
        SelectButton,
        Toolbar,
        Vaccination,
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
        async onInit (promise) {
            try {
                this.loading = true
                this.frame = false
                await promise
            } catch (e) {
                console.error(e)
            } finally {
                this.loading = false
                this.frame = true
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
        switchCamera () {
            switch (this.camera) {
                case 'front':
                this.camera = 'rear'
                break
                case 'rear':
                this.camera = 'front'
                break
            }
        },
        toggleWrite() {
            this.writeOn = !this.writeOn
        },
    },
    created() {
        this.$store.dispatch('vaccines/GET_PRES')
        this.$store.dispatch('vaccines/GET_POST')
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