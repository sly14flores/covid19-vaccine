<template>
    <div>
        <div class="navbar">
            <a href=""><img alt="logo" src="img/launion-logo.png" class="lu-logo" /></a>
            <h5 class="p-mt-3 p-label-white">La Union CoViD-19 Vaccination Survey</h5>
        </div>
        <form @submit="onSubmit">
        <div class="p-grid p-jc-center p-mt-4">
            <div class="p-lg-11 p-sm-12 p-xs-12">
                <div class="card p-fluid">
                    <h5 class="p-mt-2">Form</h5> <hr />
                    <div class="p-grid">
                        <div class="p-lg-3 p-sm-12 p-xs-12">
                            <div class="p-field">
                                <label>NAPANAM ID</label>
                                <InputText class="p-shadow-1" type="text" v-model="qr_pass_id" disabled />
                            </div>
                        </div>
                    </div>
                    <div class="p-grid">
                        <div class="p-lg-3 p-sm-12 p-xs-12">
                            <div class="p-field">
                                <label>First Name</label>
                                <InputText class="p-shadow-1" type="text" v-model="first_name" disabled />
                            </div>
                        </div>
                        <div class="p-lg-3 p-sm-12 p-xs-12">
                            <div class="p-field">
                                <label>Middle Name</label>
                                <InputText class="p-shadow-1" type="text" v-model="middle_name" disabled />
                            </div>
                        </div>
                        <div class="p-lg-4 p-sm-12 p-xs-12">
                            <div class="p-field">
                                <label>Last Name</label>
                                <InputText class="p-shadow-1" type="text" v-model="last_name" disabled />
                            </div>
                        </div>
                        <div class="p-lg-2 p-sm-12 p-xs-12">
                            <div class="p-field">
                                <label>Suffix</label>
                                <InputText class="p-shadow-1" type="text" v-model="suffix"/>
                            </div>
                        </div>
                    </div>
                    <div class="p-grid">
                        <div class="p-lg-6 p-sm-12 p-xs-12">
                            <div class="p-field">
                                <label>Birthdate</label>
                                <InputText class="p-shadow-1" type="date" v-model="birth_date" disabled />
                            </div>
                        </div>
                        <div class="p-lg-6 p-sm-12 p-xs-12">
                            <div class="p-field">
                                <label>Sex</label>
                                <InputText class="p-shadow-1" type="text" v-model="sex" disabled />
                            </div>
                        </div>
                    </div>
                    <div class="p-grid">
                        <div class="p-lg-4 p-sm-12 p-xs-12">
                            <div class="p-field">
                                <label>Address</label>
                                <InputText class="p-shadow-1" type="text" v-model="address" disabled />
                            </div>
                        </div>
                        <div class="p-lg-4 p-sm-12 p-xs-12">
                            <div class="p-field">
                                <label>Contact No.:</label>
                                <InputText class="p-shadow-1" type="text" v-model="contact_no" disabled />
                            </div>
                        </div>
                        <div class="p-lg-4 p-sm-12 p-xs-12">
                            <div class="p-field">
                                <label><i class="p-error">*</i> Civil Status</label>
                                <Dropdown class="p-shadow-1" optionLabel="name" :options="civil_status_value" optionValue="id" v-model="civil_status" placeholder="Select a Civil Status" :class="{'p-invalid': civil_statusError}" />
                                <small class="p-error">{{ civil_statusError }}</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="p-grid p-jc-center p-mt-2">
            <div class="p-lg-11 p-sm-12 p-xs-12">
                <div class="card p-fluid p-border-left">
                    <h4 class="p-mt-2"><b>Employment Status</b></h4> <hr />
                    <div class="p-grid">
                        <div class="p-lg-4 p-sm-12 p-xs-12">
                            <div class="p-field">
                                <label><i class="p-error">*</i> Category</label>
                                <Dropdown class="p-shadow-1" optionLabel="name" :options="category_value" v-model="category" optionValue="id" placeholder="Select a Category" :class="{'p-invalid': categoryError}" />
                                <small class="p-error">{{ categoryError }}</small>
                            </div>
                        </div>
                        <div class="p-lg-4 p-sm-12 p-xs-12">
                            <div class="p-field">
                                <label><i class="p-error">*</i> Category ID</label>
                                <Dropdown class="p-shadow-1" optionLabel="name" :options="category_id_value" v-model="category_id" optionValue="id" placeholder="Select a Category ID" :class="{'p-invalid': category_idError}" />
                                <small class="p-error">{{ category_idError }}</small>
                            </div>
                        </div>
                        <div class="p-lg-4 p-sm-12 p-xs-12">
                            <div class="p-field">
                                <label>Category ID No.</label>
                                <InputText class="p-shadow-1" v-model="category_id_no" />
                            </div>
                        </div>
                    </div>
                    <div class="p-grid">
                        <div class="p-lg-4 p-sm-12 p-xs-12">
                            <div class="p-field">
                                <label>Employment Status</label>
                                <Dropdown class="p-shadow-1" optionLabel="name" :options="employment_status_value" v-model="employment_status" optionValue="id" placeholder="Select a Employment Status"/>
                            </div>
                        </div>
                        <div class="p-lg-4 p-sm-12 p-xs-12">
                            <div class="p-field">
                                <label>Profession</label>
                                <Dropdown class="p-shadow-1" optionLabel="name" :options="profession_value" v-model="profession" optionValue="id" placeholder="Select a Profession"/>
                            </div>
                        </div>
                        <div class="p-lg-4 p-sm-12 p-xs-12">
                            <div class="p-field">
                                <label><i class="p-error">*</i> PhilHealth ID</label>
                                <InputText class="p-shadow-1" type="text" placeholder="00-000000000-0" v-model="philhealth" :class="{'p-invalid': philhealthError}" />
                                <small class="p-error">{{ philhealthError }}</small>
                            </div>
                        </div>
                    </div>
                    <div class="p-grid">
                        <div class="p-lg-12 p-sm-12 p-xs-12">
                            <div class="p-field">
                                <label>Employer Name</label>
                                <InputText class="p-shadow-1" type="text" v-model="employer_name" />
                            </div>
                        </div>
                    </div>
                    <div class="p-grid">
                        <div class="p-lg-4 p-sm-12 p-xs-12">
                            <div class="p-field">
                                <label>Employer Address</label>
                                <InputText class="p-shadow-1" type="text" v-model="employer_address" />
                            </div>
                        </div>
                        <div class="p-lg-4 p-sm-12 p-xs-12">
                            <div class="p-field">
                                <label>Employer LGU</label>
                                <InputText class="p-shadow-1" optionLabel="name" v-model="employer_lgu"/>
                            </div>
                        </div>
                        <div class="p-lg-4 p-sm-12 p-xs-12">
                            <div class="p-field">
                                <label>Employer Contact No.</label>
                                <InputText class="p-shadow-1" type="text" v-model="employer_contact_no" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="p-grid p-jc-center p-mt-2">
            <div class="p-lg-11 p-sm-12 p-xs-12">
                <div class="card p-fluid p-border-left">
                    <h4 class="p-mt-2"><b>Health Status</b></h4> <hr />
                    <div class="p-grid">
                        <div class="p-lg-2 p-sm-12 p-xs-12">
                            <div class="p-field">
                                <label><i class="p-error">*</i> Prenancy Status:</label>
                                <h6 class="p-error">{{ pregnancy_statusError }}</h6>
                            </div>
                        </div>
                        <div class="p-lg-1 p-sm-12 p-xs-12">
                            <div class="p-field-radiobutton">
                                <RadioButton id="pregnant" name="pregnancy_status" v-model="pregnancy_status" value="true" />
                                <label for="pregnant">Pregnant</label>
                            </div>
                        </div>
                        <div class="p-lg-2 p-sm-12 p-xs-12">
                            <div class="p-field-radiobutton">
                                <RadioButton id="not_pregnant" name="pregnancy_status" v-model="pregnancy_status" value="false" />
                                <label for="not_pregnant">Not Pregnant</label>
                            </div>
                        </div>
                    </div>
                    <hr />
                    <div class="p-grid">
                        <div class="p-lg-2 p-sm-12 p-xs-12">
                            <div class="p-field">
                                <label><i class="p-error">*</i> With Allergy:</label>
                                <h6 class="p-error">{{ with_allergyError }}</h6>
                            </div>
                        </div>
                        <div class="p-lg-1 p-sm-12 p-xs-12">
                            <div class="p-field-radiobutton">
                                <RadioButton id="yes_allergy" name="with_allergy" v-model="with_allergy" value="true" v-on:click="with_allergy_hide = true" />
                                <label for="yes_allergy">Yes</label>
                            </div>
                        </div>
                        <div class="p-lg-1 p-sm-12 p-xs-12">
                            <div class="p-field-radiobutton">
                                <RadioButton id="none_allergy" name="with_allergy" v-model="with_allergy" value="false"  v-on:click="with_allergy_hide = false" />
                                <label for="none_allergy">None</label>
                            </div>
                        </div>
                        <div class="p-lg-4 p-sm-12 p-xs-12" v-if="with_allergy_hide">
                            <div class="p-field">
                                <Dropdown class="p-shadow-1" :options="allergy_value" v-model="allergy" optionValue="id" optionLabel="name" placeholder="Select a Allergy"/>
                            </div>
                        </div>
                        <div class="p-lg-4 p-sm-12 p-xs-12" v-if="with_allergy_hide">
                            <div class="p-field">
                                <InputText class="p-shadow-1" optionLabel="name" placeholder="Others" v-model="with_allergy_others" />
                            </div>
                        </div>
                    </div>
                    <hr />
                    <div class="p-grid">
                        <div class="p-lg-2 p-sm-12 p-xs-12">
                            <div class="p-field">
                                <label><i class="p-error">*</i> With Comorbidities: </label>
                                <h6 class="p-error">{{ with_comorbidityError }}</h6>
                            </div>
                        </div>
                        <div class="p-lg-1 p-sm-12 p-xs-12">
                            <div class="p-field-radiobutton">
                                <RadioButton id="yes_comorbidity" name="with_comorbidity" v-model="with_comorbidity" value="true" v-on:click="with_comorbidity_hide = true" />
                                <label for="yes_comorbidity">Yes</label>
                            </div>
                        </div>
                        <div class="p-lg-1 p-sm-12 p-xs-12">
                            <div class="p-field-radiobutton">
                                <RadioButton id="none_comorbidity" name="with_comorbidity" v-model="with_comorbidity" value="false" v-on:click="with_comorbidity_hide = false" />
                                <label for="none_comorbidity">None</label>
                            </div>
                        </div>
                        <div class="p-lg-4 p-sm-12 p-xs-12" v-if="with_comorbidity_hide">
                            <div class="p-field">
                                <Dropdown class="p-shadow-1" :options="comorbidity_value" v-model="comorbidity" optionValue="id" optionLabel="name" placeholder="Select a Comorbidities"/>
                            </div>
                        </div>
                        <div class="p-lg-4 p-sm-12 p-xs-12"  v-if="with_comorbidity_hide">
                            <div class="p-field">
                                <InputText class="p-shadow-1" optionLabel="name" placeholder="Others" v-model="with_comorbidity_others" />
                            </div>
                        </div>
                    </div>
                    <div class="card p-fluid p-border">
                        <h5><b>Covid History</b></h5> <hr />
                        <div class="p-grid">
                            <div class="p-lg-2 p-sm-12 p-xs-12">
                                <div class="p-field">
                                    <label><i class="p-error">*</i> Diagnosed with Covid-19</label>
                                    <h6 class="p-error">{{ diagnosedError }}</h6>
                                </div>
                            </div>
                            <div class="p-lg-1 p-sm-12 p-xs-12">
                                <div class="p-field-radiobutton">
                                    <RadioButton id="yes_diagnosed" name="diagnosed" v-model="diagnosed" value="true"  v-on:click="diagnosed_hide = true" />
                                    <label for="yes_diagnosed">Yes</label>
                                </div>
                            </div>
                            <div class="p-lg-1 p-sm-12 p-xs-12">
                                <div class="p-field-radiobutton">
                                    <RadioButton id="no_diagnosed" name="diagnosed" v-model="diagnosed" value="false" v-on:click="diagnosed_hide = false" />
                                    <label for="no_diagnosed">No</label>
                                </div>
                            </div>
                            <div class="p-lg-4 p-sm-12 p-xs-12" v-if="diagnosed_hide">
                                <div class="p-field">
                                    <label>Covid Classification</label>
                                    <Dropdown optionLabel="name" :options="covid_classification_value" v-model="covid_classification" optionValue="id" placeholder="Select a Covid Classification" />
                                </div>
                            </div>
                            <div class="p-lg-4 p-sm-12 p-xs-12" v-if="diagnosed_hide">
                                <div class="p-field">
                                    <label>Date</label>
                                    <InputText class="p-shadow-1" type="date" v-model="diagnosed_date" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="p-grid p-jc-center p-mt-2">
            <div class="p-lg-11 p-sm-12 p-xs-12">
                <div class="card p-fluid p-border-left">
                    <h4 class="p-mt-2"><b>Others</b></h4> <hr />
                    <div class="p-grid">
                        <div class="p-lg-4 p-sm-12 p-xs-12">
                            <div class="p-field">
                                <label><i class="p-error">*</i> Provided electronic informed consent for vaccination?</label>
                                <h6 class="p-error">{{ consent_vaccinationError }}</h6>
                            </div>
                        </div>
                        <div class="p-lg-1 p-sm-12 p-xs-12">
                            <div class="p-field-radiobutton">
                                <RadioButton id="yes_vaccination" name="vaccination" v-model="consent_vaccination" value="true" />
                                <label for="yes_vaccination">Yes</label>
                            </div>
                        </div>
                        <div class="p-lg-1 p-sm-12 p-xs-12">
                            <div class="p-field-radiobutton">
                                <RadioButton id="no_vaccination" name="vaccination" v-model="consent_vaccination" value="false" />
                                <label for="no_vaccination">No</label>
                            </div>
                        </div>
                        <div class="p-lg-1 p-sm-12 p-xs-12">
                            <div class="p-field-radiobutton">
                                <RadioButton id="Unknown_vaccination" name="vaccination" v-model="consent_vaccination" value="null" />
                                <label for="Unknown_vaccination">Unknown</label>
                            </div>
                        </div>
                    </div>
                    <div class="p-grid p-jc-center p-mt-2">
                        <div class="p-lg-2 p-sm-12 p-xs-12">
                            <Button label="Cancel" class="button-cancel" />
                        </div>
                        <div class="p-lg-2 p-sm-12 p-xs-12">
                            <Button label="Submit" type="submit" class="button-success" />
                        </div>
                    </div>

                    <Dialog header="Confirmation" v-model:visible="displayConfirmation" :style="{width: '350px'}" :modal="true">
                        <div class="confirmation-content">
                            <i class="pi pi-check p-mr-3" style="font-size: 1rem" />
                            <span>Are you sure you want to save your changes?</span>
                        </div>
                        <template #footer>
                            <Button label="No" @click="closeConfirmation" class="p-button-warning"/>
                            <Button label="Yes" @click="closeConfirmation" class="p-button-success" autofocus />
                        </template>
                    </Dialog>

                </div>
            </div>
        </div>
        </form>
    </div>
</template>

<script>

import Button from 'primevue/button/sfc';
import InputText from 'primevue/inputtext/sfc';
import Dropdown from 'primevue/dropdown/sfc';
import RadioButton from 'primevue/radiobutton/sfc';
import Menubar from 'primevue/menubar/sfc';
import Dialog from 'primevue/dialog/sfc';

import { registration } from '../stores/registrations.js'
import store from '../store.js'
import { useForm, useField } from 'vee-validate'
import { watch } from 'vue'

export default {
    setup() {

        /**
         * Redirection logic using store
         */
        if (store.state.registrations.registration.qr_pass_id == null) {
            window.open('home#/verify','_self');
        }
        
        const init = {
            initialValues: {
                registration: {...registration}
            }
        }

        const { setValues, handleSubmit, resetForm } = useForm(init);

        const onSubmit = handleSubmit((values, actions) => {
            console.log(values.registration)
            store.dispatch('registrations/CREATE', values.registration)
            resetForm();
        });

        resetForm();

        function validateField(value) {
            if (!value) {
                return "This field is required";
            }
            return true;
        }

        function validField(value) {
            return true;
        }

        function validateRadio(value) {
            console.log(value)
            if (typeof eval(value) === "object") {
                return true;
            }
            if (typeof eval(value) !== "boolean") {
                return "This field is required";
            }
            return true;
        }

        const { value: id } = useField('registration.id',validField);
        const { value: qr_pass_id } = useField('registration.qr_pass_id',validField);
        const { value: first_name } = useField('registration.first_name',validField);
        const { value: middle_name } = useField('registration.middle_name',validField);
        const { value: last_name } = useField('registration.last_name',validField);
        const { value: suffix } = useField('registration.suffix',validField);
        const { value: birth_date } = useField('registration.birth_date',validField);
        const { value: sex } = useField('registration.sex',validField);
        const { value: address } = useField('registration.address',validField);
        const { value: contact_no } = useField('registration.contact_no',validField);
        const { value: civil_status, errorMessage: civil_statusError } = useField('registration.civil_status',validateField);
        const { value: category, errorMessage: categoryError } = useField('registration.category',validateField);
        const { value: category_id, errorMessage: category_idError } = useField('registration.category_id',validateField);
        const { value: category_id_no } = useField('registration.category_id_no',validField);
        const { value: employment_status, errorMessage: employment_statusError } = useField('registration.employment_status',validateField);
        const { value: profession } = useField('registration.profession',validField);
        const { value: philhealth, errorMessage: philhealthError } = useField('registration.philhealth',validateField);
        const { value: employer_name } = useField('registration.employer_name',validField);
        const { value: employer_address } = useField('registration.employer_address',validField);
        const { value: employer_lgu } = useField('registration.employer_lgu',validField);
        const { value: employer_contact_no } = useField('registration.employer_contact_no',validField);
        const { value: pregnancy_status, errorMessage: pregnancy_statusError } = useField('registration.pregnancy_status',validateRadio);

        const { value: with_allergy, errorMessage: with_allergyError } = useField('registration.with_allergy',validateRadio);
        const { value: allergy } = useField('registration.allergy',validField);
        const { value: with_allergy_others } = useField('registration.with_allergy_others',validField);
        
        const { value: with_comorbidity, errorMessage: with_comorbidityError } = useField('registration.with_comorbidity',validateRadio);
        const { value: comorbidity } = useField('registration.comorbidity',validField);
        const { value: with_comorbidity_others } = useField('registration.with_comorbidity_others',validField);
       
        const { value: diagnosed, errorMessage: diagnosedError } = useField('registration.diagnosed',validateField);
        const { value: covid_classification } = useField('registration.covid_classification',validField);
        const { value: diagnosed_date } = useField('registration.diagnosed_date',validField);
        const { value: consent_vaccination, errorMessage: consent_vaccinationError } = useField('registration.consent_vaccination',validateRadio);
        
        return {
            id,
            qr_pass_id,
            first_name,
            middle_name,
            last_name,
            suffix,
            birth_date,
            sex,
            address,
            contact_no,
            civil_status,
            category,
            category_id,
            category_id_no,
            employment_status,
            profession,
            philhealth,
            employer_name,
            employer_address,
            employer_lgu,
            employer_contact_no,
            pregnancy_status,
            with_allergy,
            allergy,
            with_allergy_others,
            with_comorbidity,
            comorbidity,
            with_comorbidity_others,
            diagnosed,
            covid_classification,
            diagnosed_date,
            consent_vaccination,
            employment_statusError,
            philhealthError,
            category_idError,
            categoryError,
            civil_statusError,
            pregnancy_statusError,
            with_allergyError,
            with_comorbidityError,
            diagnosedError,
            consent_vaccinationError,
            onSubmit
        }

    },
    components: {
        Button,
        InputText,
        Dropdown,
        RadioButton,
        Menubar,
        Dialog
    },
    data() {
        return {
           displayConfirmation: false,
           with_allergy_hide: false,
           with_comorbidity_hide: false,
           diagnosed_hide: false
        }
    },
    computed: {
        civil_status_value() {

            return this.$store.state.registrations.selections.civil_status_value

        },
        category_value() {

            return this.$store.state.registrations.selections.category_value

        },
        category_id_value() {

            return this.$store.state.registrations.selections.category_id_value

        },
        employment_status_value() {

            return this.$store.state.registrations.selections.employment_status_value

        },
        profession_value() {

            return this.$store.state.registrations.selections.profession_value

        },
        allergy_value() {

            return this.$store.state.registrations.selections.allergy_value

        },
        comorbidity_value() {

            return this.$store.state.registrations.selections.comorbidity_value

        },
        covid_classification_value() {

            return this.$store.state.registrations.selections.covid_classification_value

        },
    },
    methods: {
        fetchSelections() {
            this.$store.dispatch('registrations/GET_SELECTIONS')
        },
        openConfirmation() {
            this.displayConfirmation = true;
        },
        closeConfirmation() {
            this.displayConfirmation = false;
        },
    },
    mounted() {
        // this.fetchSelections()
    }
}
</script>

<style scoped>
    .navbar {
        overflow: hidden;
        background-color: #215266;
        position: relative;
        top: 0;
        height: 55px;
        width: 100%;
    }
        .navbar a {
        float: left;
        display: block;
        color: #f2f2f2;
        text-align: center;
        padding: 1px 4px;
        text-decoration: none;
        font-size: 19px;
    }
    .lu-logo {
        height: 50px;
    }
    .rugian {
        width: 200px;
    }
    .p-border-top {
        border-top: 3px solid #0b7ad1;
    }
    .p-border-left {
        border-left: 5px solid #215266;
    }
    .p-border {
        border: 1px solid #215266;
    }
    .menu-bar{
        background-color: #215266;
    }
    .p-label-white {
        color: white;
    }
    input[type="text"]:disabled {
        background: rgb(219, 219, 219);
        border-bottom: 1px solid black;
        cursor: not-allowed; 
    }
    input[type="date"]:disabled {
        background: rgb(219, 219, 219);
        border-bottom: 1px solid black;
        cursor: not-allowed; 
    }
    .button-success {
        background-color: #68bca4;
    }
    .button-cancel {
        background-color: #ffab5d;
    }

</style>