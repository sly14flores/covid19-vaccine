<template>
    <div>
        <div class="navbar">
            <a href=""><img alt="logo" src="img/launion-logo.png" class="lu-logo" /></a>
            <h5 class="p-mt-3 p-label-white">La Union CoViD-19 Vaccination</h5>
        </div>
        <form @submit="onSubmit">
            <div class="p-grid p-jc-center p-mt-4">
                <div class="p-lg-11 p-sm-12 p-xs-12">
                    <div class="card p-border-left">
                        <h5 class="p-mt-2">Form</h5> <hr />
                        <div class="p-fluid p-formgrid p-grid">
                            <div class="p-field p-col-12 p-md-3">
                                <label>NAPANAM ID <i class="p-error">*</i></label>
                                <InputText class="p-shadow-1" type="text" name="qr_pass_id" v-model="qr_pass_id" disabled />
                            </div>
                        </div>
                        <div class="p-fluid p-formgrid p-grid">
                            <div class="p-field p-col-12 p-md-3">
                                <label>First Name <small><i>(Pangalan)</i></small> <i class="p-error">*</i></label>
                                <InputText class="p-shadow-1" type="text" v-model="first_name" disabled />
                            </div>
                            <div class="p-field p-col-12 p-md-3">
                                <label>Last Name <small><i>(Apelyido)</i></small> <i class="p-error">*</i></label>
                                <InputText class="p-shadow-1" type="text" v-model="last_name" disabled />
                            </div>
                            <div class="p-field p-col-12 p-md-3">
                                <label>Middle Name <small><i>(Gitnang Apelyido)</i></small> <i class="p-error">*</i></label>
                                <InputText class="p-shadow-1" type="text" v-model="middle_name" disabled />
                            </div>
                            <div class="p-field p-col-12 p-md-3">
                                <label>Suffix/Extension Name <small><i>(Karugtong na Pangalan)</i></small> <i class="p-error">*</i></label>
                                <Dropdown class="p-shadow-1" optionLabel="name" :options="suffix_value" optionValue="id" v-model="suffix" placeholder="Select a Suffix" :class="{'p-invalid': suffixError}" />
                                <small class="p-error">{{ suffixError }}</small>    
                            </div>
                        </div>

                        <div class="p-fluid p-formgrid p-grid">
                            <div class="p-field p-col-12 p-md-4">
                                <label>Birthdate <small><i>(Araw ng Kapanganakan)</i></small> <i class="p-error">*</i></label>
                                <InputText class="p-shadow-1" type="date" v-model="birthdate" disabled />
                            </div>
                            <div class="p-field p-col-12 p-md-4">
                                <label>Sex <small><i>(Kasarian)</i></small> <i class="p-error">*</i></label>
                                <Dropdown class="p-shadow-1 disabled" optionLabel="name" :options="gender_value" optionValue="id" v-model="gender" placeholder="Select a Gender" disabled />
                            </div>
                            <div class="p-field p-col-12 p-md-4">
                                <label>Contact No. <small><i>(Telepono)</i></small> <i class="p-error">*</i></label>
                                <InputText class="p-shadow-1" type="text" v-model="contact_no" disabled />  
                            </div>
                        </div>

                        <div class="p-fluid p-formgrid p-grid">
                            <div class="p-field p-col-12 p-md-4">
                                    <label>Region <small><i>(Rehiyon)</i></small> <i class="p-error">*</i></label>
                                    <InputText class="p-shadow-1 disabled" type="text" v-model="region" disabled />
                                </div>
                                <div class="p-field p-col-12 p-md-4">
                                    <label>Province <small><i>(Probinsya)</i></small> <i class="p-error">*</i></label>
                                    <Dropdown class="p-shadow-1 disabled" optionLabel="name" :options="provinces" optionValue="id" v-model="province" disabled />
                                </div>
                                <div class="p-field p-col-12 p-md-4">
                                    <label>Municipality <small><i>(Munisipyo)</i></small> <i class="p-error">*</i></label>
                                    <Dropdown class="p-shadow-1 disabled" optionLabel="name" :options="municipalities" optionValue="id" v-model="town_city" disabled />
                                </div>
                        </div>

                        <div class="p-fluid p-formgrid p-grid">
                            <div class="p-field p-col-12 p-md-4">
                                <label>Barangay <small><i>(Barangay)</i></small> <i class="p-error">*</i></label>
                                <Dropdown class="p-shadow-1 disabled" optionLabel="name" :options="barangays" optionValue="id" v-model="barangay" disabled />
                            </div>
                            <div class="p-field p-col-12 p-md-8">
                                <label>Unit/Building/Street/House No. <small><i>(Gusali/Numero ng Tahanan)</i></small> <i class="p-error">*</i></label>
                                <InputText class="p-shadow-1 disabled" type="text" v-model="address" disabled />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="p-grid p-jc-center p-mt-1">
                <div class="p-lg-11 p-sm-12 p-xs-12">
                    <div class="card p-fluid p-border-left">
                        <h4 class="p-mt-2"><b>Others</b></h4> <hr />
                        <div class="p-fluid p-formgrid p-grid">
                            <div class="p-field p-col-12 p-md-12">
                                <label>Priority Group <small><i>(Grupong Prayoridad)</i></small> <i class="p-error">*</i></label>
                                <Dropdown class="p-shadow-1" optionLabel="description" :options="priority_group_value" optionValue="id" v-model="priority_group" :class="{'p-invalid': priority_groupError}" placeholder="Select a priority group" />
                                <small class="p-error">{{ priority_groupError }}</small>
                            </div>
                            <div class="p-field p-col-12 p-md-12">
                                <label>Sub-Priority Group</label>
                                <Dropdown class="p-shadow-1" optionLabel="description" :options="subs" optionValue="id" v-model="sub_priority_group" placeholder="Select a sub priority group" />
                            </div>
                            <div class="p-field p-col-12 p-md-12">
                                <label>Occupation <small><i>(Trabaho)</i></small></label>
                                <InputText class="p-shadow-1" type="text" v-model="occupation" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="p-grid p-jc-center p-mt-1">
                <div class="p-lg-11 p-sm-12 p-xs-12">
                    <div class="card p-fluid p-border-left">
                        <h4 class="p-mt-2"><b>Health Status</b></h4> <hr />
                        <div class="p-fluid p-formgrid p-grid">
                            <div class="p-field p-col-12 p-md-6">
                                <div class="p-field p-col-12 p-md-8">
                                    <label>Are you Allergic of Vaccines or any of its components? <small><i>(May allergy ka ba sa bakuna o sa mga sangkap nito?)</i></small> <i class="p-error">*</i></label>
                                    <p class="p-error"><small>{{ with_allergyError }}</small></p>
                                </div>
                                <div class="p-fluid p-formgrid p-grid">
                                    <div class="p-field p-col-12 p-md-2">
                                        <RadioButton class="p-mb-2" id="yes_with_allergy" name="with_allergy" v-model="with_allergy" value="01_Yes" />
                                        <label for="yes_with_allergy" class="p-ml-1">Yes</label>
                                    </div>
                                    <div class="p-field p-col-12 p-md-2">
                                        <RadioButton class="p-mb-2" id="no_with_allergy" name="with_allergy" v-model="with_allergy" value="02_No" />
                                        <label for="no_with_allergy" class="p-ml-1">No</label>
                                    </div>
                                </div>
                            </div>
                            <div class="p-field p-col-12 p-md-6">
                                <div class="p-field p-col-12 p-md-8">
                                    <label>Do you have other illnesses? <small><i>(Mayroon ka bang ibang mga karamdaman?)</i></small> <i class="p-error">*</i> </label>
                                    <p class="p-error"><small>{{ with_comorbidityError }}</small></p>
                                </div>
                                <div class="p-fluid p-formgrid p-grid">
                                    <div class="p-field p-col-12 p-md-2">
                                        <RadioButton class="p-mb-2" id="yes_comorbidity" name="with_comorbidity" v-model="with_comorbidity" value="01_Yes" />
                                        <label for="yes_comorbidity" class="p-ml-1">Yes</label>
                                    </div>
                                    <div class="p-field p-col-12 p-md-2">
                                        <RadioButton class="p-mb-2" id="none_comorbidity" name="with_comorbidity" v-model="with_comorbidity" value="02_None" />
                                        <label for="none_comorbidity" class="p-ml-1">None</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="p-fluid p-formgrid p-grid">
                            <div class="p-field p-col-12 p-md-12">
                                <div class="p-field p-col-12 p-md-12">
                                    <label>Did you already register through your barangay or Municipality/ City before this online registration? <small><i>(Nakapagregister ka na ba sa iyong Barangay o Munisipyo/ City bago ang online registration na ito?)</i></small> <i class="p-error">*</i> </label>
                                    <p class="p-error"><small>{{ is_registeredError }}</small></p>
                                </div>
                                <div class="p-fluid p-formgrid p-grid">
                                    <div class="p-field p-col-12 p-md-6">
                                        <RadioButton class="p-mb-2" id="yes_is_registered" name="is_registered" v-model="is_registered" value="01_Yes" />
                                        <label for="yes_is_registered" class="p-ml-1">Yes, I already registered. (Oo, nakapagregister na ako)</label>
                                    </div>
                                    <div class="p-field p-col-12 p-md-6">
                                        <RadioButton class="p-mb-2" id="none_is_registered" name="is_registered" v-model="is_registered" value="02_No" />
                                        <label for="none_is_registered" class="p-ml-1">No, this is my first time to register. (Hindi, unang beses ko pa lang magregister.)</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr />
                    <div class="p-fluid p-formgrid p-grid">
                        <div class="p-field p-col-12 p-md-4"></div>
                        <div class="p-field p-col-12 p-md-2">
                            <router-link to="/verify">
                                <Button class="p-button-danger" label="Cancel"></Button>
                            </router-link>
                        </div>
                        <div class="p-field p-col-12 p-md-2">
                            <Button class="p-button-success" type="submit" icon="{{saving}}" label="Submit" />
                        </div>
                    </div>
                </div>
            </div>
            <ConfirmDialog></ConfirmDialog>
        </form>
    </div>
</template>

<script>

import Button from 'primevue/button/sfc';
import InputText from 'primevue/inputtext/sfc';
import Dropdown from 'primevue/dropdown/sfc';
import RadioButton from 'primevue/radiobutton/sfc';
import Menubar from 'primevue/menubar/sfc';
import ConfirmDialog from 'primevue/confirmdialog/sfc';
import Checkbox from 'primevue/checkbox/sfc';

// import { registration } from '../stores/registrations.js'
import { useStore } from 'vuex'
import { useForm, useField } from 'vee-validate'
import { useRouter } from 'vue-router'
import { useConfirm } from "primevue/useconfirm";

export default {
    setup() {

        const store = useStore()
        /**
         * Redirection logic using store
         */
        const router = useRouter()

        if (store.state.registrations.registration.qr_pass_id == null) {
            router.push('/verify')
        }

        const init = {
            initialValues: {
                registration: {...store.state.registrations.registration}
            }
        }

        const { handleSubmit } = useForm(init);
        
        const confirm = useConfirm();
        
        const onSubmit = handleSubmit((values, actions) => {
            
            confirm.require({
                message: 'Are you sure you want to proceed?',
                header: 'Confirmation',
                icon: 'pi pi-exclamation-triangle',
                accept: () => {

                    const { resetForm } = actions
                    console.log(values)
                    const { registration } = values
                    store.dispatch('registrations/CREATE', registration)
                    resetForm();
                    
                },
                reject: () => {
                    //callback to execute when user rejects the action
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
        const { value: qr_pass_id } = useField('registration.qr_pass_id',validField);
        const { value: first_name } = useField('registration.first_name',validField);
        const { value: middle_name } = useField('registration.middle_name',validField);
        const { value: last_name } = useField('registration.last_name',validField);
        const { value: suffix, errorMessage: suffixError } = useField('registration.suffix',validateField);
        const { value: birthdate } = useField('registration.birthdate',validField);
        const { value: gender } = useField('registration.gender',validField);
        const { value: region } = useField('registration.region',validField);
        const { value: province } = useField('registration.province',validField);
        const { value: town_city } = useField('registration.town_city',validField);
        const { value: address } = useField('registration.address',validField);
        const { value: barangay } = useField('registration.barangay',validField);
        const { value: contact_no } = useField('registration.contact_no',validField);
        const { value: occupation } = useField('registration.occupation',validField);
        const { value: priority_group, errorMessage: priority_groupError } = useField('registration.priority_group',validateRadio);
        const { value: sub_priority_group } = useField('registration.sub_priority_group',validField);
        const { value: with_allergy, errorMessage: with_allergyError } = useField('registration.with_allergy',validateRadio);
        const { value: with_comorbidity, errorMessage: with_comorbidityError } = useField('registration.with_comorbidity',validateRadio);
        const { value: is_registered, errorMessage: is_registeredError } = useField('registration.is_registered',validateRadio);
        
        return {
            id,
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
            address,
            barangay,
            contact_no,
            occupation,
            priority_group,
            sub_priority_group,
            with_allergy,
            with_comorbidity,
            is_registered,
            is_registeredError,
            with_allergyError,
            priority_groupError,
            with_comorbidityError,
            suffixError,
            onSubmit
        }

    },
    components: {
        Button,
        InputText,
        Dropdown,
        RadioButton,
        Menubar,
        ConfirmDialog,
        Checkbox,
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
        priority_group_value() {

            return this.$store.state.registrations.selections.priority_group_value

        },
        subs() {

            if (!this.priority_group_value) return []

            const priority_group = this.priority_group_value.filter(priority_group => {
                return priority_group.id == this.priority_group
            })

            if (priority_group.length==0) return []

            const subs = priority_group[0].subs

            return subs

        },
        provinces() {

            return this.$store.state.registrations.selections.addresses.province_value

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

            return this.$store.state.registrations.saving

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
    input[type="date"]:disabled, .disabled {
        background: rgb(219, 219, 219);
        border-bottom: 1px solid black;
        cursor: not-allowed; 
    }
    .disabled {
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
    .text-gray {
        color: rgb(102, 102, 102);
    }
</style>