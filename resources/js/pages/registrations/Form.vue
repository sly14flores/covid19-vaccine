<template>
    <div>
        <MyBreadcrumb :home="home" :items="items" />
        <div class="p-grid">
            <div class="p-col-12 p-mt-2">
                <form @submit="onSubmit">
                    <div class="card p-fluid">
                        <h5><i class="pi pi-user"></i> Personal Information <ToggleButton class="float-right" v-if="editMode" v-model="writeOn" onIcon="pi pi-ban" offIcon="pi pi-pencil" change="toggleWrite" /></h5>
                        <hr />
                        <div class="p-fluid p-formgrid p-grid">
                            <div class="p-field p-col-12 p-md-3">
                                <label for="qr_pass_id">Napanam ID No.: <i class="p-error">*</i></label>
                                <div class="p-inputgroup">
                                    <InputText class="p-shadow-1" id="qr_pass_id " type="text" placeholder="Enter Napanam ID No." v-model="qr_pass_id" :class="{'p-invalid': qr_pass_idError}"/>
                                    <Button label="Fetch" v-on:click="getNapanam" class="p-button-primary" />
                                </div>
                                <small class="p-error">{{ qr_pass_idError }}</small>
                            </div>
                        </div>
                        <div class="p-fluid p-formgrid p-grid">
                            <div class="p-field p-col-12 p-md-3">
                                <label for="first_name">First Name <i class="p-error">*</i></label>
                                <InputText class="p-shadow-1" id="first_name " type="text" placeholder="Enter First Name" v-model="first_name" :class="{'p-invalid': first_nameError}" :disabled="editMode && !writeOn" />
                                <small class="p-error">{{ first_nameError }}</small>
                            </div>
                            <div class="p-field p-col-12 p-md-3">
                                <label for="last_name">Last Name <i class="p-error">*</i></label>
                                <InputText class="p-shadow-1" id="last_name " type="text" placeholder="Enter Last Name" v-model="last_name" :class="{'p-invalid': last_nameError}" :disabled="editMode && !writeOn" />
                                <small class="p-error">{{ last_nameError }}</small>
                            </div>
                            <div class="p-field p-col-12 p-md-3">
                                <label for="middle_name">Middle Name <i class="p-error">*</i></label>
                                <InputText class="p-shadow-1" id="middle_name " type="text" placeholder="Enter Middle Name" v-model="middle_name" :disabled="editMode && !writeOn" />
                            </div>
                            <div class="p-field p-col-12 p-md-3">
                                <label>Suffix/Extension Name <i class="p-error">*</i></label>
                                <Dropdown class="p-shadow-1" optionLabel="name" :options="suffix_value" optionValue="id" v-model="suffix" placeholder="Select a Suffix" :class="{'p-invalid': suffixError}" />
                                <small class="p-error">{{ suffixError }}</small>    
                            </div>
                        </div>
                        <div class="p-fluid p-formgrid p-grid">
                            <div class="p-field p-col-12 p-md-3">
                                <label>Birthdate <i class="p-error">*</i></label>
                                <InputText class="p-shadow-1" type="date" v-model="birthdate" />
                            </div>
                            <div class="p-field p-col-12 p-md-3">
                                <label>Sex <i class="p-error">*</i></label>
                                <Dropdown class="p-shadow-1" optionLabel="name" :options="gender_value" optionValue="id" v-model="gender" placeholder="Select a Gender" />
                            </div>
                            <div class="p-field p-col-12 p-md-3">
                                <label>Civil Status <i class="p-error">*</i></label>
                                <Dropdown class="p-shadow-1" optionLabel="name" :options="civil_status_value" optionValue="id" v-model="civil_status" placeholder="Select a Civil Status" :class="{'p-invalid': civil_statusError}" />
                                <small class="p-error">{{ civil_statusError }}</small>
                            </div>
                            <div class="p-field p-col-12 p-md-3">
                                <label>Contact No.: <i class="p-error">*</i></label>
                                <InputText class="p-shadow-1" type="text" v-model="contact_no" />
                            </div>
                        </div>
                        <div class="p-fluid p-formgrid p-grid">
                            <div class="p-field p-col-12 p-md-4">
                                <label>Region <i class="p-error">*</i></label>
                                <InputText class="p-shadow-1" type="text" v-model="region" />
                            </div>
                            <div class="p-field p-col-12 p-md-4">
                                <label>Province <i class="p-error">*</i></label>
                                <InputText class="p-shadow-1" type="text" v-model="province" />
                            </div>
                            <div class="p-field p-col-12 p-md-4">
                                <label>Municipality <i class="p-error">*</i></label>
                                <InputText class="p-shadow-1" type="text" v-model="town_city" />
                            </div>
                        </div>
                        <div class="p-fluid p-formgrid p-grid">
                            <div class="p-field p-col-12 p-md-8">
                                <label>Unit/Building/Street/House No. <i class="p-error">*</i></label>
                                <InputText class="p-shadow-1" type="text" v-model="address" />
                            </div>
                            <div class="p-field p-col-12 p-md-4">
                                <label>Barangay <i class="p-error">*</i></label>
                                <InputText class="p-shadow-1" type="text" v-model="barangay" />
                            </div>
                        </div>
                    </div>

                    <div class="card p-fluid">
                        <h5><i class="pi pi-user"></i> Employment Status</h5><hr />
                        <div class="p-fluid p-formgrid p-grid">
                            <div class="p-field p-col-12 p-md-4">
                                <label>Category <i class="p-error">*</i></label>
                                <Dropdown class="p-shadow-1" optionLabel="name" :options="category_value" v-model="category" optionValue="id" placeholder="Select a Category" :class="{'p-invalid': categoryError}" />
                                <small class="p-error">{{ categoryError }}</small>
                            </div>
                            <div class="p-field p-col-12 p-md-4">
                                <label>Category ID <i class="p-error">*</i></label>
                                <Dropdown class="p-shadow-1" optionLabel="name" :options="category_id_value" v-model="category_id" optionValue="id" placeholder="Select a Category ID" :class="{'p-invalid': category_idError}" />
                                <small class="p-error">{{ category_idError }}</small>
                            </div>
                            <div class="p-field p-col-12 p-md-4">
                                <label>Category ID No. <i class="p-error">*</i></label>
                                <InputText class="p-shadow-1" v-model="category_id_no" :class="{'p-invalid': category_id_noError}" />
                                <small class="p-error">{{ category_id_noError }}</small>
                            </div>
                        </div>

                        <div class="p-fluid p-formgrid p-grid">
                            <div class="p-field p-col-12 p-md-4">
                                <label>Profession <i class="p-error">*</i></label>
                                <Dropdown class="p-shadow-1" optionLabel="name" :options="profession_value" v-model="profession" optionValue="id" placeholder="Select a Profession" :class="{'p-invalid': professionError}" />
                                <small class="p-error">{{ professionError }}</small>
                            </div>
                            <div class="p-field p-col-12 p-md-4">
                                <label>PhilHealth ID <i class="p-error">*</i></label>
                                <InputText class="p-shadow-1" type="text" placeholder="00-000000000-0" v-model="philhealth" :class="{'p-invalid': philhealthError}" />
                                <small class="p-error">{{ philhealthError }}</small>
                            </div>
                            <div class="p-field p-col-12 p-md-4">
                                <label> PWD ID No.</label>
                                <InputText class="p-shadow-1" type="text" name="pwd_id" v-model="pwd_id" />
                            </div>
                        </div>

                        <div class="p-fluid p-formgrid p-grid">
                            <div class="p-field p-col-12 p-md-4">
                                <label>Employment Status <i class="p-error">*</i></label>
                                <Dropdown class="p-shadow-1" optionLabel="name" :options="employment_status_value" v-model="employment_status" optionValue="id" placeholder="Select a Employment Status" :class="{'p-invalid': employment_statusError}" />
                                <small class="p-error">{{ employment_statusError }}</small>
                            </div>
                            <div class="p-field p-col-12 p-md-4">
                                <label>Employer Name <i class="p-error">*</i></label>
                                <InputText class="p-shadow-1" type="text" v-model="employer_name" :class="{'p-invalid': employer_nameError}" />
                                <small class="p-error">{{ employer_nameError }}</small>
                            </div>
                            <div class="p-field p-col-12 p-md-4">
                                <label>Municipality <i class="p-error">*</i></label>
                                <Dropdown class="p-shadow-1" optionLabel="name" :options="employer_municipality_value" v-model="employer_municipality" optionValue="id" placeholder="Select a Employment Municipality" :class="{'p-invalid': employer_municipalityError}" />
                                <small class="p-error">{{ employer_municipalityError }}</small>
                            </div>
                        </div>

                        <div class="p-fluid p-formgrid p-grid">
                            <div class="p-field p-col-12 p-md-8">
                                <label>Employer Address <i class="p-error">*</i></label>
                                <InputText class="p-shadow-1" type="text" v-model="employer_address" :class="{'p-invalid': employer_addressError}" />
                                <small class="p-error">{{ employer_addressError }}</small>
                            </div>
                            <div class="p-field p-col-12 p-md-4">
                                <label>Employer Contact No. <i class="p-error">*</i></label>
                                <InputText class="p-shadow-1" type="text" v-model="employer_contact_no" :class="{'p-invalid': employer_contact_noError}" />
                                <small class="p-error">{{ employer_contact_noError }}</small>
                            </div>
                        </div>
                    </div>

                     <div class="card p-fluid">
                        <h5><i class="pi pi-user"></i> Health Status</h5><hr />
                        <div class="p-fluid p-formgrid p-grid">
                            <div class="p-field p-col-12 p-md-3">
                                <label>Directly in interaction with Covid Patient: <i class="p-error">*</i></label>
                                <p class="p-error"><small>{{ direct_interactionError }}</small></p>
                            </div>
                            <div class="p-field p-col-12 p-md-1">
                                <RadioButton class="p-mb-2" id="yes_direct_interaction" name="direct_interaction" v-model="direct_interaction" value="01_Yes" />
                                <label for="yes_direct_interaction" class="p-ml-1">Yes</label>
                            </div>
                            <div class="p-field p-col-12 p-md-1">
                                <RadioButton class="p-mb-2" id="no_direct_interaction" name="direct_interaction" v-model="direct_interaction" value="02_No" />
                                <label for="no_direct_interaction" class="p-ml-1">No</label>
                            </div>
                        </div>
                        <hr />
                        <div class="p-fluid p-formgrid p-grid">
                            <div class="p-field p-col-12 p-md-3">
                                <label>Prenancy Status: <i class="p-error">*</i></label>
                                <p class="p-error"><small>{{ pregnancy_statusError }}</small></p>
                            </div>
                            <div class="p-field p-col-12 p-md-1">
                                <RadioButton class="p-mb-2" id="pregnant" name="pregnancy_status" v-model="pregnancy_status" value="01_Pregnant" />
                                <label for="pregnant" class="p-ml-1">Pregnant</label>
                            </div>
                            <div class="p-field p-col-12 p-md-8">
                                <RadioButton class="p-mb-2" id="not_pregnant" name="pregnancy_status" v-model="pregnancy_status" value="02_Not_Pregnant" />
                                <label for="not_pregnant" class="p-ml-1">Not Pregnant</label>
                            </div>
                        </div>
                        <hr />
                        <div class="p-fluid p-formgrid p-grid">
                            <div class="p-field p-col-12 p-md-3">
                                <label>With Allergy: <i class="p-error">*</i></label>
                                <p class="p-error"><small>{{ with_allergyError }}</small></p>
                            </div>
                            <div class="p-field p-col-12 p-md-1">
                                <RadioButton class="p-mb-2" id="yes_allergy" name="with_allergy" v-model="with_allergy" value="01_Yes" v-on:click="with_allergy_hide = true" />
                                <label for="yes_allergy" class="p-ml-1">Yes</label>
                            </div>
                            <div class="p-field p-col-12 p-md-1">
                            <RadioButton class="p-mb-2" id="none_allergy" name="with_allergy" v-model="with_allergy" value="02_None"  v-on:click="with_allergy_hide = false" />
                                <label for="none_allergy" class="p-ml-1">None</label>
                            </div>
                            <div class="p-field p-col-12 p-md-4" v-if="with_allergy_hide">
                                <h5>Allergies</h5>
                                <div class="p-field-checkbox">
                                    <Checkbox id="drug" name="drug" value="true" v-model="drug_allergy" :binary="true" />
                                    <label for="drug">Drug</label>
                                </div>
                                <div class="p-field-checkbox">
                                    <Checkbox id="food" name="food" value="true" v-model="food_allergy" :binary="true" />
                                    <label for="food">Food</label>
                                </div>
                                <div class="p-field-checkbox">
                                    <Checkbox id="insect" name="insect" value="true" v-model="insect_allergy" :binary="true" />
                                    <label for="insect">Insect</label>
                                </div>
                                <div class="p-field-checkbox">
                                    <Checkbox id="latex" name="latex" value="true" v-model="latex_allergy" :binary="true" />
                                    <label for="latex">Latex</label>
                                </div>
                                <div class="p-field-checkbox">
                                    <Checkbox id="mold" name="mold" value="true" v-model="mold_allergy" :binary="true" />
                                    <label for="mold">Mold</label>
                                </div>
                                <div class="p-field-checkbox">
                                    <Checkbox id="pet" name="pet" value="true" v-model="pet_allergy" :binary="true" />
                                    <label for="pet">Pet</label>
                                </div>
                                <div class="p-field-checkbox">
                                    <Checkbox id="pollen" name="pollen" value="true" v-model="pollen_allergy" :binary="true" />
                                    <label for="pollen">Pollen</label>
                                </div>
                            </div>
                        </div>
                        <hr />
                        <div class="p-grid">
                            <div class="p-field p-col-12 p-md-3">
                                <label>With Comorbidities: <i class="p-error">*</i> </label>
                                <p class="p-error"><small>{{ with_comorbidityError }}</small></p>
                            </div>
                            <div class="p-field p-col-12 p-md-1">
                                <RadioButton class="p-mb-2" id="yes_comorbidity" name="with_comorbidity" v-model="with_comorbidity" value="01_Yes" v-on:click="with_comorbidity_hide = true" />
                                <label for="yes_comorbidity" class="p-ml-1">Yes</label>
                            </div>
                            <div class="p-field p-col-12 p-md-1">
                                <RadioButton class="p-mb-2" id="none_comorbidity" name="with_comorbidity" v-model="with_comorbidity" value="02_None" v-on:click="with_comorbidity_hide = false" />
                                <label for="none_comorbidity" class="p-ml-1">None</label>
                            </div>
                            <div class="p-field p-col-12 p-md-3" v-if="with_comorbidity_hide">
                                <h5>Comorbidities</h5>
                                <div class="p-field-checkbox">
                                    <Checkbox id="drug" name="drug" value="true" v-model="hypertension" :binary="true" />
                                    <label for="drug">Hypertension</label>
                                </div>
                                <div class="p-field-checkbox">
                                    <Checkbox id="food" name="food" value="true" v-model="heart_disease" :binary="true" />
                                    <label for="food">Heart disease</label>
                                </div>
                                <div class="p-field-checkbox">
                                    <Checkbox id="insect" name="insect" value="true" v-model="kidney_disease" :binary="true" />
                                    <label for="insect">Kidney disease</label>
                                </div>
                                <div class="p-field-checkbox">
                                    <Checkbox id="latex" name="latex" value="true" v-model="diabetes_mellitus" :binary="true" />
                                    <label for="latex">Diabetes mellitus</label>
                                </div>
                                <div class="p-field-checkbox">
                                    <Checkbox id="mold" name="mold" value="true" v-model="bronchial_asthma" :binary="true" />
                                    <label for="mold">Bronchial Asthma</label>
                                </div>
                                <div class="p-field-checkbox">
                                    <Checkbox id="pet" name="pet" value="true" v-model="immuno_deficiency_status" :binary="true" />
                                    <label for="pet">Immunodeficiency Status</label>
                                </div>
                                <div class="p-field-checkbox">
                                    <Checkbox id="cancer" name="cancer" value="true" v-model="cancer" :binary="true" />
                                    <label for="cancer">Cancer</label>
                                </div>
                                <div class="p-field-checkbox">
                                    <Checkbox id="comorbidity_others" name="comorbidity_others" value="true" :binary="true" v-model="comorbidity_others" v-on:click="comorbidity_others_hide = !comorbidity_others_hide" />
                                    <label for="comorbidity_others">Others</label>
                                </div>
                            </div>
                            <div class="p-field p-col-12 p-md-4" v-if="comorbidity_others_hide">
                                <InputText class="p-shadow-1" optionLabel="name" placeholder="Others" v-model="with_comorbidity_others" />
                            </div>
                        </div>
                        <hr />
                        <div class="card p-fluid p-formgrid p-grid p-border">
                            <div class="p-field p-col-12 p-md-12">
                                <h5><b>Covid History</b></h5>
                            </div>
                            <div class="p-field p-col-12 p-md-3">
                                <label>Diagnosed with Covid-19: <i class="p-error">*</i> </label>
                                <p class="p-error"><small>{{ diagnosedError }}</small></p>
                            </div>
                            <div class="p-field p-col-12 p-md-1">
                                <RadioButton class="p-mb-2" id="yes_diagnosed" name="diagnosed" v-model="diagnosed" value="01_Yes"  v-on:click="diagnosed_hide = true" />
                                <label for="yes_diagnosed" class="p-ml-1">Yes</label>
                            </div>
                            <div class="p-field p-col-12 p-md-1">
                                <RadioButton class="p-mb-2" id="no_diagnosed" name="diagnosed" v-model="diagnosed" value="02_No" v-on:click="diagnosed_hide = false" />
                                <label for="no_diagnosed" class="p-ml-1">No</label>
                            </div>
                            <div class="p-field p-col-12 p-md-3" v-if="diagnosed_hide">
                                <label>Covid Classification</label>
                                <Dropdown class="p-shadow-1" optionLabel="name" :options="covid_classification_value" v-model="covid_classification" optionValue="id" placeholder="Select a Covid Classification" />
                            </div>
                            <div class="p-field p-col-12 p-md-3" v-if="diagnosed_hide">
                                <label>Date</label>
                                <InputText class="p-shadow-1" type="date" v-model="diagnosed_date" />
                            </div>
                        </div>
                    </div>

                    <div class="card p-fluid">
                        <h5><i class="pi pi-user"></i> Others</h5><hr />
                        <div class="p-fluid p-formgrid p-grid">
                            <div class="p-field p-col-12 p-md-3">
                                <label>Are you willing to be vaccinated? <i class="p-error">*</i> </label>
                                <p class="p-error"><small>{{ consent_vaccinationError }}</small></p>
                            </div>
                            <div class="p-field p-col-12 p-md-1">
                                <RadioButton class="p-mb-2" id="yes_vaccination" name="vaccination" v-model="consent_vaccination" value="01_Yes" />
                                <label for="yes_vaccination" class="p-ml-1">Yes</label>
                            </div>
                            <div class="p-field p-col-12 p-md-1">
                                <RadioButton class="p-mb-2" id="no_vaccination" name="vaccination" v-model="consent_vaccination" value="02_No" />
                                <label for="no_vaccination" class="p-ml-1">No</label>
                            </div>
                            <div class="p-field p-col-12 p-md-3">
                                <RadioButton class="p-mb-2" id="Unknown_vaccination" name="vaccination" v-model="consent_vaccination" value="03_Unknown" />
                                <label for="Unknown_vaccination" class="p-ml-1">Unknown</label>
                            </div>
                        </div>
                        <hr />
                        <div class="p-fluid p-formgrid p-grid">
                            <div class="p-field p-col-12 p-md-10"></div>
                            <div class="p-field p-col-12 p-md-1">
                                <Button type="submit" class="p-button-primary" :disabled="!writeOn && editMode"><i v-if="saving" class="pi pi-spin pi-spinner"></i>&nbsp;{{(editMode)?'Update':'Save'}}</Button>
                            </div>
                            <div class="p-field p-col-12 p-md-1">
                                <Button type="button" :label="(editMode)?'Close':'Cancel'" class="p-button-danger p-ml-2" @click="close" />                            
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import MyBreadcrumb from '../../components/MyBreadcrumb.vue';
import InputText from 'primevue/inputtext/sfc';
import Dropdown from 'primevue/dropdown/sfc';
import Button from 'primevue/button/sfc';
import Divider from 'primevue/divider/sfc';
import ToggleButton from 'primevue/togglebutton/sfc';
import RadioButton from 'primevue/radiobutton/sfc';
import Menubar from 'primevue/menubar/sfc';
import ConfirmDialog from 'primevue/confirmdialog/sfc';
import Checkbox from 'primevue/checkbox/sfc';

import { registration } from '../../stores/registrations.js'
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

        const init = {
            initialValues: {
                registration: {...store.state.registrations.registration}
            }
        }

        const { setValues, handleSubmit, resetForm } = useForm(init);

        watch(
            () => state.registrations.registration,
            (data, prevData) => {
                setValues({
                    registration: {...data}
                })
            }
        )

        if (editMode) { // Edit
            dispatch('registrations/GET_REGISTRATION', { id: registrationId })
        } else { // New
            resetForm();
        }

         const getNapanam = () => {
            //console.log(qr_pass_id._value)
            store.dispatch('registrations/GET_NAPANAM', { id: qr_pass_id._value })
        }

        const onSubmit = handleSubmit((values, actions) => {

            const { resetForm } = actions
            const { registration } = values

            confirm.require({
                message: (editMode)?"Are you sure you want to add update this registration's info?":'Are you sure you want to add this new registration?',
                header: 'Confirmation',
                icon: 'pi pi-exclamation-triangle',
                accept: () => {
                    if (editMode) {
                        dispatch('registrations/UPDATE_REGISTRATION', registration)
                    } else {
                        dispatch('registrations/CREATE_REGISTRATION', registration)
                        resetForm();
                    }
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

        function validateRadio(value) {
            if (!value) {
                return "This field is required";
            }
            return true;
        }

        // Personal
        const { value: id } = useField('registration.id',validField);
        const { value: qr_pass_id, errorMessage: qr_pass_idError } = useField('registration.qr_pass_id',validateField);
        const { value: first_name, errorMessage: first_nameError } = useField('registration.first_name',validateField);
        const { value: middle_name } = useField('registration.middle_name',validField);
        const { value: last_name, errorMessage: last_nameError } = useField('registration.last_name',validateField);
        const { value: suffix, errorMessage: suffixError } = useField('registration.suffix',validateField);
        const { value: birthdate } = useField('registration.birthdate',validField);
        const { value: gender } = useField('registration.gender',validField);
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
        const { value: category_id_no, errorMessage: category_id_noError } = useField('registration.category_id_no',validateField);
        
        const { value: employment_status, errorMessage: employment_statusError } = useField('registration.employment_status',validateField);
        const { value: profession, errorMessage: professionError } = useField('registration.profession',validateField);
        const { value: philhealth, errorMessage: philhealthError } = useField('registration.philhealth',validateField);
        const { value: pwd_id } = useField('registration.pwd_id',validField);
        const { value: employer_name, errorMessage: employer_nameError } = useField('registration.employer_name',validateField);
        const { value: employer_municipality, errorMessage: employer_municipalityError } = useField('registration.employer_municipality',validateField);
        const { value: employer_address, errorMessage: employer_addressError } = useField('registration.employer_address',validateField);
        const { value: employer_contact_no, errorMessage: employer_contact_noError } = useField('registration.employer_contact_no',validateField);
        
        // Health Status
        const { value: pregnancy_status, errorMessage: pregnancy_statusError } = useField('registration.pregnancy_status',validateRadio);
        const { value: direct_interaction, errorMessage: direct_interactionError } = useField('registration.direct_interaction',validateRadio);
        // Allergies
        const { value: with_allergy, errorMessage: with_allergyError } = useField('registration.with_allergy',validateRadio);
        const { value: drug_allergy } = useField('registration.drug_allergy',validField);
        const { value: food_allergy } = useField('registration.food_allergy',validField);
        const { value: insect_allergy } = useField('registration.insect_allergy',validField);
        const { value: latex_allergy } = useField('registration.latex_allergy',validField);
        const { value: mold_allergy } = useField('registration.mold_allergy',validField);
        const { value: pet_allergy } = useField('registration.pet_allergy',validField);
        const { value: pollen_allergy } = useField('registration.pollen_allergy',validField);
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
            qr_pass_idError,
            first_nameError,
            last_nameError,
            suffixError,
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
            direct_interactionError,
            pregnancy_statusError,
            with_allergyError,
            with_comorbidityError,
            diagnosedError,
            consent_vaccinationError,
            onSubmit,
            editMode,
            getNapanam
        }

    },
    data() {
        return {
            displayConfirmation: false,
            with_allergy_hide: false,
            with_comorbidity_hide: false,
            comorbidity_others_hide: false,
            diagnosed_hide: false,
            home: {icon: 'pi pi-home', to: '/registrations'},
            items: [{label: (this.editMode)?'Edit Registration':'New Registration', to: `${this.$route.fullPath}`}]
        }
    },
    components: {
        MyBreadcrumb,
        InputText,
        Button,
        Divider,
        ToggleButton,
        Dropdown,
        RadioButton,
        Menubar,
        ConfirmDialog,
        Checkbox,
    },
    computed: {
        suffix_value() {

            return this.$store.state.registrations.selections.suffix_value

        },
        gender_value() {

            return this.$store.state.registrations.selections.gender_value

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
        saving() {
            return this.$store.state.registrations.saving
        },
        writeOn: {
            set(value) {
                this.$store.dispatch('registrations/TOGGLE_WRITE', value)
            },
            get() {
                return this.$store.state.registrations.writeOn
            }
        }
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
        close() {
            this.$store.dispatch('registrations/INIT')
            this.$router.push('/registrations')
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
    .float-right {
        position: absolute; right: 3%;
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
    .p-border {
        border: 1px solid #215266;
    }
</style>