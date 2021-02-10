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
                        <div class="p-lg-4 p-sm-12 p-xs-12">
                            <div class="p-field">
                                <label>Last Name</label>
                                <InputText class="p-shadow-1" type="text" v-model="last_name" disabled />
                            </div>
                        </div>
                        <div class="p-lg-3 p-sm-12 p-xs-12">
                            <div class="p-field">
                                <label>Middle Name</label>
                                <InputText class="p-shadow-1" type="text" v-model="middle_name" disabled />
                            </div>
                        </div>
                        <div class="p-lg-2 p-sm-12 p-xs-12">
                            <div class="p-field">
                                <label>Suffix</label>
                                <Dropdown class="p-shadow-1" optionLabel="name" :options="suffix_value" v-model="suffix" optionValue="id" placeholder="Select a Suffix" :class="{'p-invalid': suffixError}" />
                            </div>
                        </div>
                    </div>
                    <div class="p-grid">
                        <div class="p-lg-3 p-sm-12 p-xs-12">
                            <div class="p-field">
                                <label>Birthdate</label>
                                <InputText class="p-shadow-1" type="date" v-model="birth_date" disabled />
                            </div>
                        </div>
                        <div class="p-lg-3 p-sm-12 p-xs-12">
                            <div class="p-field">
                                <label>Sex</label>
                                <InputText class="p-shadow-1" type="text" v-model="sex" disabled />
                            </div>
                        </div>
                        <div class="p-lg-3 p-sm-12 p-xs-12">
                            <div class="p-field">
                                <label><i class="p-error">*</i> Civil Status</label>
                                <Dropdown class="p-shadow-1" optionLabel="name" :options="civil_status_value" optionValue="id" v-model="civil_status" placeholder="Select a Civil Status" :class="{'p-invalid': civil_statusError}" />
                                <small class="p-error">{{ civil_statusError }}</small>
                            </div>
                        </div>
                        <div class="p-lg-3 p-sm-12 p-xs-12">
                            <div class="p-field">
                                <label>Contact No.:</label>
                                <InputText class="p-shadow-1" type="text" v-model="contact_no" disabled />
                            </div>
                        </div>
                    </div>
                    <div class="p-grid">
                        <div class="p-lg-4 p-sm-12 p-xs-12">
                            <div class="p-field">
                                <label>Region</label>
                                <InputText class="p-shadow-1" type="text" v-model="region" disabled />
                            </div>
                        </div>
                        <div class="p-lg-4 p-sm-12 p-xs-12">
                            <div class="p-field">
                                <label>Province</label>
                                <InputText class="p-shadow-1" type="text" v-model="province" disabled />
                            </div>
                        </div>
                        <div class="p-lg-4 p-sm-12 p-xs-12">
                            <div class="p-field">
                                <label>Municipality</label>
                                <InputText class="p-shadow-1" type="text" v-model="town_city" disabled />
                            </div>
                        </div>
                    </div>
                    <div class="p-grid">
                        <div class="p-lg-8 p-sm-12 p-xs-12">
                            <div class="p-field">
                                <label>Unit/Building/Street/House No.</label>
                                <InputText class="p-shadow-1" type="text" v-model="address" disabled />
                            </div>
                        </div>
                        <div class="p-lg-4 p-sm-12 p-xs-12">
                            <div class="p-field">
                                <label>Barangay</label>
                                <InputText class="p-shadow-1" type="text" v-model="barangay" disabled />
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
                        <div class="p-lg-4 p-sm-12 p-xs-12">
                            <div class="p-field">
                                <label> PWD ID No.</label>
                                <InputText class="p-shadow-1" type="text" v-model="pwd_id" />
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
                                <label>Employer Name</label>
                                <InputText class="p-shadow-1" type="text" v-model="employer_name" />
                            </div>
                        </div>
                        <div class="p-lg-4 p-sm-12 p-xs-12">
                            <div class="p-field">
                                <label>Municipality</label>
                                <Dropdown class="p-shadow-1" optionLabel="name" :options="employer_municipality_value" v-model="employer_municipality" optionValue="id" placeholder="Select a Employment Municipality"/>
                            </div>
                        </div>
                    </div>

                    <div class="p-grid">
                        <div class="p-lg-8 p-sm-12 p-xs-12">
                            <div class="p-field">
                                <label>Employer Address</label>
                                <InputText class="p-shadow-1" type="text" v-model="employer_address" />
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
                        <div class="p-lg-3 p-sm-12 p-xs-12">
                            <div class="p-field">
                                <label><i class="p-error">*</i> Directly in interaction with Covid Patient:</label>
                                <h6 class="p-error">{{ direct_interactionError }}</h6>
                            </div>
                        </div>
                        <div class="p-lg-1 p-sm-12 p-xs-12">
                            <div class="p-field-radiobutton">
                                <RadioButton id="yes_direct_interaction" name="direct_interaction" v-model="direct_interaction" value="01_Yes" />
                                <label for="yes_direct_interaction">Yes</label>
                            </div>
                        </div>
                        <div class="p-lg-2 p-sm-12 p-xs-12">
                            <div class="p-field-radiobutton">
                                <RadioButton id="no_direct_interaction" name="direct_interaction" v-model="direct_interaction" value="02_No" />
                                <label for="no_direct_interaction">No</label>
                            </div>
                        </div>
                    </div>
                    <hr />
                    <div class="p-grid">
                        <div class="p-lg-3 p-sm-12 p-xs-12">
                            <div class="p-field">
                                <label><i class="p-error">*</i> Prenancy Status:</label>
                                <h6 class="p-error">{{ pregnancy_statusError }}</h6>
                            </div>
                        </div>
                        <div class="p-lg-1 p-sm-12 p-xs-12">
                            <div class="p-field-radiobutton">
                                <RadioButton id="pregnant" name="pregnancy_status" v-model="pregnancy_status" value="01_Pregnant" />
                                <label for="pregnant">Pregnant</label>
                            </div>
                        </div>
                        <div class="p-lg-2 p-sm-12 p-xs-12">
                            <div class="p-field-radiobutton">
                                <RadioButton id="not_pregnant" name="pregnancy_status" v-model="pregnancy_status" value="02_Not_Pregnant" />
                                <label for="not_pregnant">Not Pregnant</label>
                            </div>
                        </div>
                    </div>
                    <hr />
                    <div class="p-grid">
                        <div class="p-lg-3 p-sm-12 p-xs-12">
                            <div class="p-field">
                                <label><i class="p-error">*</i> With Allergy:</label>
                                <h6 class="p-error">{{ with_allergyError }}</h6>
                            </div>
                        </div>
                        <div class="p-lg-1 p-sm-12 p-xs-12">
                            <div class="p-field-radiobutton">
                                <RadioButton id="yes_allergy" name="with_allergy" v-model="with_allergy" value="01_Yes" v-on:click="with_allergy_hide = true" />
                                <label for="yes_allergy">Yes</label>
                            </div>
                        </div>
                        <div class="p-lg-1 p-sm-12 p-xs-12">
                            <div class="p-field-radiobutton">
                                <RadioButton id="none_allergy" name="with_allergy" v-model="with_allergy" value="02_None"  v-on:click="with_allergy_hide = false" />
                                <label for="none_allergy">None</label>
                            </div>
                        </div>
                        <div class="p-lg-2 p-sm-12 p-xs-12" v-if="with_allergy_hide">
                            <div class="p-field">
                                <h5>Allergies</h5>
                                <div class="p-field-checkbox">
                                    <Checkbox id="drug" name="drug" value="01_Yes" v-model="drug_allergy" />
                                    <label for="drug">Drug</label>
                                </div>
                                <div class="p-field-checkbox">
                                    <Checkbox id="food" name="food" value="01_Yes" v-model="food_allergy" />
                                    <label for="food">Food</label>
                                </div>
                                <div class="p-field-checkbox">
                                    <Checkbox id="insect" name="insect" value="01_Yes" v-model="insect_allergy" />
                                    <label for="insect">Insect</label>
                                </div>
                                <div class="p-field-checkbox">
                                    <Checkbox id="latex" name="latex" value="01_Yes" v-model="latex_allergy" />
                                    <label for="latex">Latex</label>
                                </div>
                                <div class="p-field-checkbox">
                                    <Checkbox id="mold" name="mold" value="01_Yes" v-model="mold_allergy" />
                                    <label for="mold">Mold</label>
                                </div>
                                <div class="p-field-checkbox">
                                    <Checkbox id="pet" name="pet" value="01_Yes" v-model="pet_allergy" />
                                    <label for="pet">Pet</label>
                                </div>
                                <div class="p-field-checkbox">
                                    <Checkbox id="pollen" name="pollen" value="01_Yes" v-model="pollen_allergy" />
                                    <label for="pollen">Pollen</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr />
                    <div class="p-grid">
                        <div class="p-lg-3 p-sm-12 p-xs-12">
                            <div class="p-field">
                                <label><i class="p-error">*</i> With Comorbidities: </label>
                                <h6 class="p-error">{{ with_comorbidityError }}</h6>
                            </div>
                        </div>
                        <div class="p-lg-1 p-sm-12 p-xs-12">
                            <div class="p-field-radiobutton">
                                <RadioButton id="yes_comorbidity" name="with_comorbidity" v-model="with_comorbidity" value="01_Yes" v-on:click="with_comorbidity_hide = true" />
                                <label for="yes_comorbidity">Yes</label>
                            </div>
                        </div>
                        <div class="p-lg-1 p-sm-12 p-xs-12">
                            <div class="p-field-radiobutton">
                                <RadioButton id="none_comorbidity" name="with_comorbidity" v-model="with_comorbidity" value="02_None" v-on:click="with_comorbidity_hide = false" />
                                <label for="none_comorbidity">None</label>
                            </div>
                        </div>
                        <div class="p-lg-2 p-sm-12 p-xs-12" v-if="with_comorbidity_hide">
                            <div class="p-field">
                                <h5>Comorbidities</h5>
                                <div class="p-field-checkbox">
                                    <Checkbox id="drug" name="drug" value="01_Yes" v-model="hypertension" />
                                    <label for="drug">Hypertension</label>
                                </div>
                                <div class="p-field-checkbox">
                                    <Checkbox id="food" name="food" value="01_Yes" v-model="heart_disease" />
                                    <label for="food">Heart disease</label>
                                </div>
                                <div class="p-field-checkbox">
                                    <Checkbox id="insect" name="insect" value="01_Yes" v-model="kidney_disease" />
                                    <label for="insect">Kidney disease</label>
                                </div>
                                <div class="p-field-checkbox">
                                    <Checkbox id="latex" name="latex" value="01_Yes" v-model="diabetes_mellitus" />
                                    <label for="latex">Diabetes mellitus</label>
                                </div>
                                <div class="p-field-checkbox">
                                    <Checkbox id="mold" name="mold" value="01_Yes" v-model="bronchial_asthma" />
                                    <label for="mold">Bronchial Asthma</label>
                                </div>
                                <div class="p-field-checkbox">
                                    <Checkbox id="pet" name="pet" value="01_Yes" v-model="immuno_deficiency_status" />
                                    <label for="pet">Immunodeficiency Status</label>
                                </div>
                                <div class="p-field-checkbox">
                                    <Checkbox id="pollen" name="pollen" value="01_Yes" v-model="cancer" />
                                    <label for="pollen">Cancer</label>
                                </div>
                                <div class="p-field-checkbox">
                                    <Checkbox id="comorbidity_others" name="comorbidity_others" value="01_Yes" v-model="comorbidity_others" v-on:click="comorbidity_others_hide = !comorbidity_others_hide" />
                                    <label for="comorbidity_others">Others</label>
                                </div>
                            </div>
                        </div>
                        <div class="p-lg-5 p-sm-12 p-xs-12" v-if="comorbidity_others_hide">
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
                                    <RadioButton id="yes_diagnosed" name="diagnosed" v-model="diagnosed" value="01_Yes"  v-on:click="diagnosed_hide = true" />
                                    <label for="yes_diagnosed">Yes</label>
                                </div>
                            </div>
                            <div class="p-lg-1 p-sm-12 p-xs-12">
                                <div class="p-field-radiobutton">
                                    <RadioButton id="no_diagnosed" name="diagnosed" v-model="diagnosed" value="02_No" v-on:click="diagnosed_hide = false" />
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
                                <RadioButton id="yes_vaccination" name="vaccination" v-model="consent_vaccination" value="01_Yes" />
                                <label for="yes_vaccination">Yes</label>
                            </div>
                        </div>
                        <div class="p-lg-1 p-sm-12 p-xs-12">
                            <div class="p-field-radiobutton">
                                <RadioButton id="no_vaccination" name="vaccination" v-model="consent_vaccination" value="02_No" />
                                <label for="no_vaccination">No</label>
                            </div>
                        </div>
                        <div class="p-lg-1 p-sm-12 p-xs-12">
                            <div class="p-field-radiobutton">
                                <RadioButton id="Unknown_vaccination" name="vaccination" v-model="consent_vaccination" value="03_Unknown" />
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
import Checkbox from 'primevue/checkbox/sfc';

import { registration } from '../stores/registrations.js'
import store from '../store.js'
import { useForm, useField } from 'vee-validate'
import { watch } from 'vue'

export default {
    setup() {

        /**
         * Redirection logic using store
         *
         */

        if (store.state.registrations.registration.qr_pass_id == null) {
                window.open('home#/verify','_self');
        }

        const init = {
            initialValues: {
                registration: {...registration}
            }
        }

        console.log(init)

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
            if (typeof eval(value) === "object") {
                return true;
            }
            if (typeof eval(value) !== "boolean") {
                return "This field is required";
            }
            return true;
        }
        // Personal
        const { value: id } = useField('registration.id',validField);
        const { value: qr_pass_id } = useField('registration.qr_pass_id',validField);
        const { value: first_name } = useField('registration.first_name',validField);
        const { value: middle_name } = useField('registration.middle_name',validField);
        const { value: last_name } = useField('registration.last_name',validField);
        const { value: suffix, errorMessage: suffixError } = useField('registration.suffix',validateField);
        const { value: birth_date } = useField('registration.birth_date',validField);
        const { value: sex } = useField('registration.sex',validField);
        const { value: region } = useField('registration.region',validField);
        const { value: province } = useField('registration.province',validField);
        const { value: town_city } = useField('registration.town_city',validField);
        const { value: address } = useField('registration.address',validField);
        const { value: barangay } = useField('registration.barangay',validField);
        const { value: contact_no } = useField('registration.contact_no',validField);
        const { value: civil_status, errorMessage: civil_statusError } = useField('registration.civil_status',validateField);
        // Employment Status
        const { value: category, errorMessage: categoryError } = useField('registration.category',validateField);
        const { value: category_id, errorMessage: category_idError } = useField('registration.category_id',validateField);
        const { value: category_id_no } = useField('registration.category_id_no',validField);
        const { value: employment_status, errorMessage: employment_statusError } = useField('registration.employment_status',validateField);
        const { value: profession } = useField('registration.profession',validField);
        const { value: philhealth, errorMessage: philhealthError } = useField('registration.philhealth',validateField);
        const { value: pwd_id } = useField('registration.pwd',validField);
        const { value: employer_name } = useField('registration.employer_name',validField);
        const { value: employer_municipality } = useField('registration.employer_city',validField);
        const { value: employer_address } = useField('registration.employer_address',validField);
        const { value: employer_contact_no } = useField('registration.employer_contact_no',validField);
        // Health Status
        const { value: pregnancy_status, errorMessage: pregnancy_statusError } = useField('registration.pregnancy_status',validateRadio);
        const { value: direct_interaction, errorMessage: direct_interactionError } = useField('registration.direct_interaction',validateRadio);
        // Allergies
        const { value: with_allergy, errorMessage: with_allergyError } = useField('registration.with_allergy',validateRadio);
        const { value: drug_allergy} = useField('registration.drug_allergy',validField);
        const { value: food_allergy} = useField('registration.food_allergy',validField);
        const { value: insect_allergy} = useField('registration.insect_allergy',validField);
        const { value: latex_allergy} = useField('registration.latex_allergy',validField);
        const { value: mold_allergy} = useField('registration.mold_allergy',validField);
        const { value: pet_allergy} = useField('registration.pet_allergy',validField);
        const { value: pollen_allergy} = useField('registration.pollen_allergy',validField);
        const { value: with_allergy_others } = useField('registration.with_allergy_others',validField);
        // Comorbidities
        const { value: with_comorbidity, errorMessage: with_comorbidityError } = useField('registration.with_comorbidity',validateRadio);
        const { value: hypertension } = useField('registration.hypertension',validField);
        const { value: heart_disease } = useField('registration.heart_disease',validField);
        const { value: kidney_disease } = useField('registration.kidney_disease',validField);
        const { value: diabetes_mellitus } = useField('registration.diabetes_mellitus',validField);
        const { value: bronchial_asthma } = useField('registration.bronchial_asthma',validField);
        const { value: immuno_deficiency_status } = useField('registration.immuno_deficiency_status',validField);
        const { value: cancer } = useField('registration.cancer',validField);
        const { value: comorbidity_others } = useField('registration.comorbidity_others',validField);
        const { value: with_comorbidity_others } = useField('registration.with_comorbidity_others',validField);
        const { value: diagnosed, errorMessage: diagnosedError } = useField('registration.diagnosed',validateField);
        const { value: covid_classification } = useField('registration.covid_classification',validField);
        const { value: diagnosed_date } = useField('registration.diagnosed_date',validField);
        
        const { value: consent_vaccination, errorMessage: consent_vaccinationError } = useField('registration.consent_vaccination',validateRadio);
        
        return {
            id, // Personal
            qr_pass_id,
            first_name,
            middle_name,
            last_name,
            suffix,
            birth_date,
            sex,
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
            
            direct_interaction, // Health Status
            pregnancy_status,
            with_allergy,
            drug_allergy,
            food_allergy,
            insect_allergy,
            latex_allergy,
            mold_allergy,
            pet_allergy,
            pollen_allergy,
            with_allergy_others,

            with_comorbidity,
            hypertension,
            heart_disease,
            kidney_disease,
            diabetes_mellitus,
            bronchial_asthma,
            immuno_deficiency_status,
            cancer,
            comorbidity_others,
            with_comorbidity_others,
            diagnosed,
            covid_classification, 
            diagnosed_date,  // End Health Status

            consent_vaccination,

            suffixError,
            employment_statusError,
            philhealthError,
            category_idError,
            categoryError,
            civil_statusError,
            direct_interactionError,
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
        Dialog,
        Checkbox
    },
    data() {
        return {
           displayConfirmation: false,
           with_allergy_hide: false,
           with_comorbidity_hide: false,
           comorbidity_others_hide: false,
           diagnosed_hide: false
        }
    },
    computed: {
        suffix_value() {

            return this.$store.state.registrations.selections.suffix_value

        },
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
        region_value() {

            return this.$store.state.registrations.selections.region_value

        },
        employer_municipality_value() {

            return this.$store.state.registrations.selections.employer_municipality_value

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