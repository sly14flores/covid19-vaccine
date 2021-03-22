<template>
    <div>
        <div class="card">
            <h5>Vaccines </h5>
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
                                                <div style="color: #fe664f;" class="frame"></div>
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
                                        <h5><i class="pi pi-user"></i> Personal Information <ToggleButton class="float-right" v-model="writeOn" onIcon="pi pi-ban" offIcon="pi pi-pencil" change="toggleWrite" /></h5>
                                        <hr />
                                        <div class="p-fluid p-formgrid p-grid">
                                            <div class="p-field p-col-12 p-md-6">
                                                <label for="qr_pass_id">Napanam ID No.: <i class="p-error">*</i></label>
                                                <div class="p-inputgroup">
                                                    <InputText class="p-shadow-1" id="qr_pass_id " type="text" placeholder="Enter Napanam ID No." v-model="qr_pass_id" :class="{'p-invalid': qr_pass_idError}" />
                                                    <Button label="Fetch" class="p-shadow-1 p-button-primary" @click="getNapanam" />
                                                </div>
                                                <small class="p-error">{{ first_nameError }}</small>
                                            </div>
                                        </div>
                                        <div class="p-fluid p-formgrid p-grid">
                                            <div class="p-field p-col-12 p-md-3">
                                                <label for="first_name">First Name <i class="p-error">*</i></label>
                                                <InputText class="p-shadow-1" id="first_name " type="text" v-model="first_name" :class="{'p-invalid': first_nameError}" :disabled="!writeOn" />
                                                <small class="p-error">{{ first_nameError }}</small>
                                            </div>
                                            <div class="p-field p-col-12 p-md-3">
                                                <label for="last_name">Last Name <i class="p-error">*</i></label>
                                                <InputText class="p-shadow-1" id="last_name " type="text" v-model="last_name" :class="{'p-invalid': last_nameError}" :disabled="!writeOn" />
                                                <small class="p-error">{{ last_nameError }}</small>
                                            </div>
                                            <div class="p-field p-col-12 p-md-3">
                                                <label for="middle_name">Middle Name </label>
                                                <InputText class="p-shadow-1" id="middle_name " type="text" v-model="middle_name" :disabled="!writeOn" />
                                            </div>
                                            <div class="p-field p-col-12 p-md-3">
                                                <label>Suffix/Extension Name <i class="p-error">*</i></label>
                                                <Dropdown class="p-shadow-1" optionLabel="name" :options="suffix_value" optionValue="id" v-model="suffix" placeholder="Select a Suffix" :class="{'p-invalid': suffixError, 'disabled': !writeOn}" :disabled="!writeOn" />
                                                <small class="p-error">{{ suffixError }}</small>    
                                            </div>
                                        </div>
                                        <div class="p-fluid p-formgrid p-grid">
                                            <div class="p-field p-col-12 p-md-3">
                                                <label>Birthdate <i class="p-error">*</i></label>
                                                <InputText class="p-shadow-1" type="date" v-model="birthdate" :class="{disabled: !writeOn}" :disabled="!writeOn" />
                                            </div>
                                            <div class="p-field p-col-12 p-md-3">
                                                <label>Sex <i class="p-error">*</i></label>
                                                <Dropdown class="p-shadow-1" optionLabel="name" :options="gender_value" optionValue="id" v-model="gender" placeholder="Select a Gender" :class="{disabled: !writeOn}" :disabled="!writeOn" />
                                            </div>
                                            <div class="p-field p-col-12 p-md-3">
                                                <label>Civil Status <i class="p-error">*</i></label>
                                                <Dropdown class="p-shadow-1" optionLabel="name" :options="civil_status_value" optionValue="id" v-model="civil_status" placeholder="Select a Civil Status" :class="{'p-invalid': civil_statusError, 'disabled': !writeOn}" :disabled="!writeOn" />
                                                <small class="p-error">{{ civil_statusError }}</small>
                                            </div>
                                            <div class="p-field p-col-12 p-md-3">
                                                <label>Contact No.: <i class="p-error">*</i></label>
                                                <InputText class="p-shadow-1" type="text" v-model="contact_no" :disabled="!writeOn" />
                                            </div>
                                        </div>
                                        <div class="p-fluid p-formgrid p-grid">
                                            <div class="p-field p-col-12 p-md-4">
                                                <label>Region <i class="p-error">*</i></label>
                                                <InputText class="p-shadow-1" type="text" v-model="region" :disabled="!writeOn" />
                                            </div>
                                            <div class="p-field p-col-12 p-md-4">
                                                <label>Province <i class="p-error">*</i></label>
                                                <InputText class="p-shadow-1" type="text" v-model="province" :disabled="!writeOn" />
                                            </div>
                                            <div class="p-field p-col-12 p-md-4">
                                                <label>Municipality <i class="p-error">*</i></label>
                                                <InputText class="p-shadow-1" type="text" v-model="town_city" :disabled="!writeOn" />
                                            </div>
                                        </div>
                                        <div class="p-fluid p-formgrid p-grid">
                                            <div class="p-field p-col-12 p-md-8">
                                                <label>Unit/Building/Street/House No. <i class="p-error">*</i></label>
                                                <InputText class="p-shadow-1" type="text" v-model="address" :disabled="!writeOn" />
                                            </div>
                                            <div class="p-field p-col-12 p-md-4">
                                                <label>Barangay <i class="p-error">*</i></label>
                                                <InputText class="p-shadow-1" type="text" v-model="barangay" :disabled="!writeOn" />
                                            </div>
                                        </div>
                                        
                                        <div class="p-fluid">
                                            <h5><i class="pi pi-user"></i> Employment Status</h5><hr />
                                            <div class="p-fluid p-formgrid p-grid">
                                                <div class="p-field p-col-12 p-md-4">
                                                    <label>Category <i class="p-error">*</i></label>
                                                    <Dropdown class="p-shadow-1" optionLabel="name" :options="category_value" v-model="category" optionValue="id" placeholder="Select a Category" :class="{'p-invalid': categoryError, 'disabled': !writeOn}" :disabled="!writeOn" />
                                                    <small class="p-error">{{ categoryError }}</small>
                                                </div>
                                                <div class="p-field p-col-12 p-md-4">
                                                    <label>Category ID <i class="p-error">*</i></label>
                                                    <Dropdown class="p-shadow-1" optionLabel="name" :options="category_id_value" v-model="category_id" optionValue="id" placeholder="Select a Category ID" :class="{'p-invalid': category_idError, 'disabled': !writeOn}" :disabled="!writeOn" />
                                                    <small class="p-error">{{ category_idError }}</small>
                                                </div>
                                                <div class="p-field p-col-12 p-md-4">
                                                    <label>Category ID No. <i class="p-error">*</i></label>
                                                    <InputText class="p-shadow-1" v-model="category_id_no" :class="{'p-invalid': category_id_noError, 'disabled': !writeOn}" :disabled="!writeOn" />
                                                    <small class="p-error">{{ category_id_noError }}</small>
                                                </div>
                                            </div>

                                            <div class="p-fluid p-formgrid p-grid">
                                                <div class="p-field p-col-12 p-md-4">
                                                    <label>Profession <i class="p-error">*</i></label>
                                                    <Dropdown class="p-shadow-1" optionLabel="name" :options="profession_value" v-model="profession" optionValue="id" placeholder="Select a Profession" :class="{'p-invalid': professionError, 'disabled': !writeOn}" :disabled="!writeOn" />
                                                    <small class="p-error">{{ professionError }}</small>
                                                </div>
                                                <div class="p-field p-col-12 p-md-4">
                                                    <label>PhilHealth ID <i class="p-error">*</i></label>
                                                    <InputText class="p-shadow-1" type="text" placeholder="00-000000000-0" v-model="philhealth" :class="{'p-invalid': philhealthError, 'disabled': !writeOn}" :disabled="!writeOn" />
                                                    <small class="p-error">{{ philhealthError }}</small>
                                                </div>
                                                <div class="p-field p-col-12 p-md-4">
                                                    <label> PWD ID No.</label>
                                                    <InputText class="p-shadow-1" type="text" name="pwd_id" v-model="pwd_id" :disabled="!writeOn" />
                                                </div>
                                            </div>

                                            <div class="p-fluid p-formgrid p-grid">
                                                <div class="p-field p-col-12 p-md-4">
                                                    <label>Employment Status <i class="p-error">*</i></label>
                                                    <Dropdown class="p-shadow-1" optionLabel="name" :options="employment_status_value" v-model="employment_status" optionValue="id" placeholder="Select a Employment Status" :class="{'p-invalid': employment_statusError, 'disabled': !writeOn}" :disabled="!writeOn" />
                                                    <small class="p-error">{{ employment_statusError }}</small>
                                                </div>
                                                <div class="p-field p-col-12 p-md-4">
                                                    <label>Employer Name <i class="p-error">*</i></label>
                                                    <InputText class="p-shadow-1" type="text" v-model="employer_name" :class="{'p-invalid': employer_nameError}" :disabled="!writeOn" />
                                                    <small class="p-error">{{ employer_nameError }}</small>
                                                </div>
                                                <div class="p-field p-col-12 p-md-4">
                                                    <label>Municipality <i class="p-error">*</i></label>
                                                    <Dropdown class="p-shadow-1" optionLabel="name" :options="employer_municipality_value" v-model="employer_municipality" optionValue="id" placeholder="Select a Employment Municipality" :class="{'p-invalid': employer_municipalityError, 'disabled': !writeOn}" :disabled="!writeOn" />
                                                    <small class="p-error">{{ employer_municipalityError }}</small>
                                                </div>
                                            </div>

                                            <div class="p-fluid p-formgrid p-grid">
                                                <div class="p-field p-col-12 p-md-8">
                                                    <label>Employer Address <i class="p-error">*</i></label>
                                                    <InputText class="p-shadow-1" type="text" v-model="employer_address" :class="{'p-invalid': employer_addressError}" :disabled="!writeOn" />
                                                    <small class="p-error">{{ employer_addressError }}</small>
                                                </div>
                                                <div class="p-field p-col-12 p-md-4">
                                                    <label>Employer Contact No. <i class="p-error">*</i></label>
                                                    <InputText class="p-shadow-1" type="text" v-model="employer_contact_no" :class="{'p-invalid': employer_contact_noError}" :disabled="!writeOn" />
                                                    <small class="p-error">{{ employer_contact_noError }}</small>
                                                </div>
                                            </div>

                                            <hr />
                                            <div class="p-fluid p-formgrid p-grid">
                                                <div class="p-field p-col-12 p-md-10"></div>
                                                <div class="p-field p-col-12 p-md-2">
                                                    <Button type="submit" class="p-button-primary" :disabled="!writeOn"><i v-if="saving" class="pi pi-spin pi-spinner"></i>&nbsp;Save</Button>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </TabPanel>
            </TabView>
        </div>   
       
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

import { QrStream, QrCapture, QrDropzone } from 'vue3-qr-reader';
import { useStore } from 'vuex'
import { useForm, useField } from 'vee-validate'
import { useRoute } from 'vue-router'
import { watch } from 'vue'
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

        function onDecode(data) {
            const str = data.split('r')
            const qr = str[1]
            store.dispatch('vaccines/GET_BY_QR',{ id: qr })
        }

        const init = {
            initialValues: {
                vaccine: {...store.state.vaccines.vaccine}
            }
        }

        const { setValues, handleSubmit, resetForm } = useForm(init);

        watch(
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
        const { value: province } = useField('vaccine.province',validField);
        const { value: town_city } = useField('vaccine.town_city',validField);
        const { value: address } = useField('vaccine.address',validField);
        const { value: barangay } = useField('vaccine.barangay',validField);
        const { value: contact_no } = useField('vaccine.contact_no',validField);
        const { value: civil_status, errorMessage: civil_statusError } = useField('vaccine.civil_status',validateField);
        // Employment Status
        const { value: category, errorMessage: categoryError } = useField('vaccine.category',validateField);
        const { value: category_id, errorMessage: category_idError } = useField('vaccine.category_id',validateField);
        const { value: category_id_no, errorMessage: category_id_noError } = useField('vaccine.category_id_no',validateField);
        const { value: employment_status, errorMessage: employment_statusError } = useField('vaccine.employment_status',validateField);
        const { value: profession, errorMessage: professionError } = useField('vaccine.profession',validateField);
        const { value: philhealth, errorMessage: philhealthError } = useField('vaccine.philhealth',validateField);
        const { value: pwd_id } = useField('vaccine.pwd_id',validField);
        const { value: employer_name, errorMessage: employer_nameError } = useField('vaccine.employer_name',validateField);
        const { value: employer_municipality, errorMessage: employer_municipalityError } = useField('vaccine.employer_municipality',validateField);
        const { value: employer_address, errorMessage: employer_addressError } = useField('vaccine.employer_address',validateField);
        const { value: employer_contact_no, errorMessage: employer_contact_noError } = useField('vaccine.employer_contact_no',validateField);
        
        return {
            id, // Personal
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
            civil_status, //  End Personal
            category, // Employment Status
            category_id,
            category_id_no,
            employment_status,
            profession,
            philhealth,
            pwd_id,
            employer_name,
            employer_municipality,
            employer_address,
            employer_contact_no, // End Employment Status
            qr_pass_idError,
            first_nameError,
            last_nameError,
            suffixError,
            genderError,
            employment_statusError,
            employer_nameError,
            employer_municipalityError,
            employer_addressError,
            employer_contact_noError,
            professionError,
            philhealthError,
            category_idError,
            category_id_noError,
            categoryError,
            civil_statusError,
            onSubmit,
            editMode,
            onDecode,
            getNapanam
        }

    },
    data() {
      return {
          camera: 'auto'
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
        ToggleButton
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
        fetchSelections() {
            this.$store.dispatch('vaccines/GET_SELECTIONS')
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
        this.fetchSelections()
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
        border-style: solid;
        border-width: 2px;
        border-color: #fe664f;
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
</style>