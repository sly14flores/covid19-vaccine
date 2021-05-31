<template>
    <div>
        <MyBreadcrumb :home="home" :items="items" />
        <div class="p-grid">
            <div class="p-col-12 p-mt-2">
                <form @submit="onSubmit">
                    <div class="card p-fluid">
                        <div class="p-fluid p-formgrid p-grid">
                            <div class="p-field p-col-10 p-md-11">
                                <h6><i class="pi pi-user"></i> Personal Information </h6>
                            </div>
                            <div class="p-field p-col-2 p-md-1">
                                <ToggleButton class="p-ml-3" v-if="editMode" v-model="writeOn" onIcon="pi pi-ban" offIcon="pi pi-pencil" change="toggleWrite" />
                            </div>
                        </div>
                        <hr />
                        <div class="p-fluid p-formgrid p-grid">
                            <div class="p-field p-col-12 p-md-3">
                                <label for="qr_pass_id">Napanam ID No.: <i class="p-error">*</i></label>
                                <div class="p-inputgroup">
                                    <InputText class="p-shadow-1" id="qr_pass_id " type="text" placeholder="Enter Napanam ID No." v-model="qr_pass_id" :class="{'p-invalid': qr_pass_idError}" :disabled="editMode && !writeOn"/>
                                    <Button label="Fetch" v-if="!editMode" @click="getNapanam" class="p-button-primary" />
                                </div>
                                <small class="p-error">{{ qr_pass_idError }}</small>
                            </div>
                        </div>
                        <div class="p-fluid p-formgrid p-grid">
                            <div class="p-field p-col-12 p-md-3">
                                <label for="first_name">First Name <small><i>(Pangalan)</i></small> <i class="p-error">*</i></label>
                                <InputText class="p-shadow-1" id="first_name " type="text" placeholder="Enter First Name" v-model="first_name" :class="{'p-invalid': first_nameError}" :disabled="editMode && !writeOn" />
                                <small class="p-error">{{ first_nameError }}</small>
                            </div>
                            <div class="p-field p-col-12 p-md-3">
                                <label for="last_name">Last Name <small><i>(Apelyido)</i></small> <i class="p-error">*</i></label>
                                <InputText class="p-shadow-1" id="last_name" type="text" placeholder="Enter Last Name" v-model="last_name" :class="{'p-invalid': last_nameError}" :disabled="editMode && !writeOn" />
                                <small class="p-error">{{ last_nameError }}</small>
                            </div>
                            <div class="p-field p-col-12 p-md-3">
                                <label for="middle_name">Middle Name <small><i>(Gitnang Apelyido)</i></small> </label>
                                <InputText class="p-shadow-1" id="middle_name" type="text" placeholder="Enter Middle Name" v-model="middle_name" :disabled="editMode && !writeOn" />
                            </div>
                            <div class="p-field p-col-12 p-md-3">
                                <label>Suffix/Extension Name <small><i>(Karugtong na Pangalan)</i></small> <i class="p-error">*</i></label>
                                <Dropdown class="p-shadow-1" optionLabel="name" :options="suffix_value" optionValue="id" v-model="suffix" placeholder="Select a Suffix" :class="{'p-invalid': suffixError, 'disabled': editMode && !writeOn}" :disabled="editMode && !writeOn" />
                                <small class="p-error">{{ suffixError }}</small>    
                            </div>
                        </div>
                        <div class="p-fluid p-formgrid p-grid">
                            <div class="p-field p-col-12 p-md-4">
                                <label>Birthdate <small><i>(Araw ng Kapanganakan)</i></small> <i class="p-error">*</i></label>
                                <InputText class="p-shadow-1" type="date" v-model="birthdate" :class="{'disabled': editMode && !writeOn}" :disabled="editMode && !writeOn" />
                            </div>
                            <div class="p-field p-col-12 p-md-4">
                                <label>Sex <small><i>(Kasarian)</i></small> <i class="p-error">*</i></label>
                                <Dropdown class="p-shadow-1" optionLabel="name" :options="gender_value" optionValue="id" v-model="gender" :class="{'p-invalid': genderError, 'disabled': editMode && !writeOn}" placeholder="Select a Gender" :disabled="editMode && !writeOn" />
                                <small class="p-error">{{ genderError }}</small>
                            </div>
                            <div class="p-field p-col-12 p-md-4">
                                <label>Contact No. <small><i>(Telepono)</i></small> <i class="p-error">*</i></label>
                                <InputText class="p-shadow-1" type="text" v-model="contact_no" :disabled="editMode && !writeOn" />
                            </div>
                        </div>
                        <div class="p-fluid p-formgrid p-grid">
                            <div class="p-field p-col-12 p-md-4">
                                <label>Region <small><i>(Rehiyon)</i></small> <i class="p-error">*</i></label>
                                <InputText class="p-shadow-1" type="text" v-model="region" :disabled="editMode && !writeOn" />
                            </div>
                            <div class="p-field p-col-12 p-md-4">
                                <label>Province <small><i>(Probinsya)</i></small> <i class="p-error">*</i></label>
                                <Dropdown class="p-shadow-1" optionLabel="name" :options="provinces" optionValue="id" v-model="province" :class="{'p-invalid': provinceError, 'disabled': editMode && !writeOn}" placeholder="Select a province" :disabled="editMode && !writeOn" />
                                <small class="p-error">{{ provinceError }}</small>
                            </div>
                            <div class="p-field p-col-12 p-md-4">
                                <label>Municipality <small><i>(Munisipyo)</i></small> <i class="p-error">*</i></label>
                                <Dropdown class="p-shadow-1" optionLabel="name" :options="municipalities" optionValue="id" v-model="town_city" :class="{'p-invalid': town_cityError, 'disabled': editMode && !writeOn}" placeholder="Select a municipality" :disabled="editMode && !writeOn" />
                            </div>
                        </div>
                        <div class="p-fluid p-formgrid p-grid">
                            <div class="p-field p-col-12 p-md-8">
                                <label>Barangay <small><i>(Barangay)</i></small> <i class="p-error">*</i></label>
                                <Dropdown class="p-shadow-1" optionLabel="name" :options="barangays" optionValue="id" v-model="barangay" :class="{'p-invalid': barangayError, 'disabled': editMode && !writeOn}" placeholder="Select a barangay" :disabled="editMode && !writeOn" />
                            </div>
                            <div class="p-field p-col-12 p-md-4">
                                <label>Unit/Building/Street/House No. <small><i>(Gusali/Numero ng Tahanan)</i></small> <i class="p-error">*</i></label>
                                <InputText class="p-shadow-1" type="text" v-model="address" :disabled="editMode && !writeOn" />
                            </div>
                        </div>
                    </div>
                    <div class="card p-fluid">
                        <h5><i class="pi pi-sitemap"></i> Others</h5><hr />
                        <!-- <div class="p-fluid p-formgrid p-grid">
                            <div class="p-field p-col-12 p-md-4">
                                <label>Category </label>
                                <Dropdown class="p-shadow-1" optionLabel="name" :options="barangays" optionValue="id" v-model="category" :class="{'p-invalid': barangayError, 'disabled': editMode && !writeOn}" placeholder="Select a barangay" :disabled="editMode && !writeOn" />
                            </div>
                            <div class="p-field p-col-12 p-md-4">
                                <label>Category ID</label>
                                <InputText class="p-shadow-1" type="text" v-model="category_id" :disabled="editMode && !writeOn" />
                            </div>
                            <div class="p-field p-col-12 p-md-4">
                                <label>Category ID No. </label>
                                <InputText class="p-shadow-1" type="text" v-model="category_id_no" :disabled="editMode && !writeOn" />
                            </div>
                        </div>
                        <div class="p-fluid p-formgrid p-grid">
                            <div class="p-field p-col-12 p-md-6">
                                <label>Philhealth No. </label>
                                <InputText class="p-shadow-1" type="text" v-model="philhealth" :disabled="editMode && !writeOn" />
                            </div>
                            <div class="p-field p-col-12 p-md-6">
                                <label>PWD ID</label>
                                <InputText class="p-shadow-1" type="text" v-model="pwd" :disabled="editMode && !writeOn" />
                            </div>
                        </div> -->
                        <div class="p-fluid p-formgrid p-grid">
                            <div class="p-field p-col-12 p-md-12">
                                <label>Priority Group <small><i>(Grupong Prayoridad)</i></small> <i class="p-error">*</i></label>
                                <Dropdown class="p-shadow-1" optionLabel="description" :options="priority_group_value" optionValue="id" v-model="priority_group" placeholder="Select a priority group" :class="{'p-invalid': priority_groupError, 'disabled': editMode && !writeOn}" :disabled="editMode && !writeOn" />
                                <small class="p-error">{{ priority_groupError }}</small>
                            </div>
                            <div class="p-field p-col-12 p-md-12">
                                <label>Sub-Priority Group</label>
                                <Dropdown class="p-shadow-1" optionLabel="description" :options="subs" optionValue="id" v-model="sub_priority_group" placeholder="Select a sub priority group" :class="{'disabled': editMode && !writeOn}" :disabled="editMode && !writeOn" />
                            </div>
                            <div class="p-field p-col-12 p-md-12">
                                <label>Occupation <small><i>(Trabaho)</i></small></label>
                                <InputText class="p-shadow-1" type="text" v-model="occupation" :disabled="editMode && !writeOn" />
                            </div>
                        </div>
                    </div>

                    <div class="card p-fluid">
                        <h5><i class="pi pi-user"></i> Health Status</h5><hr />
                        <div class="p-fluid p-formgrid p-grid">
                            <div class="p-field p-col-12 p-md-6">
                                <div class="p-field p-col-12 p-md-8">
                                    <label>Are you Allergic of Vaccines or any of its components? <small><i>(May allergy ka ba sa bakuna o sa mga sangkap nito?)</i></small> <i class="p-error">*</i></label>
                                    <p class="p-error"><small>{{ allergic_to_vaccinesError }}</small></p>
                                </div>
                                <div class="p-fluid p-formgrid p-grid">
                                    <div class="p-field p-col-12 p-md-2">
                                        <RadioButton class="p-mb-2" id="yes_allergic_to_vaccines" name="allergic_to_vaccines" v-model="allergic_to_vaccines" value="01_Yes" :disabled="editMode && !writeOn" />
                                        <label for="yes_allergic_to_vaccines" class="p-ml-1">Yes</label>
                                    </div>
                                    <div class="p-field p-col-12 p-md-2">
                                        <RadioButton class="p-mb-2" id="no_allergic_to_vaccines" name="allergic_to_vaccines" v-model="allergic_to_vaccines" value="02_No" :disabled="editMode && !writeOn" />
                                        <label for="no_allergic_to_vaccines" class="p-ml-1">No</label>
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
                                        <RadioButton class="p-mb-2" id="yes_comorbidity" name="with_comorbidity" v-model="with_comorbidity" value="01_Yes" :disabled="editMode && !writeOn" />
                                        <label for="yes_comorbidity" class="p-ml-1">Yes</label>
                                    </div>
                                    <div class="p-field p-col-12 p-md-2">
                                        <RadioButton class="p-mb-2" id="none_comorbidity" name="with_comorbidity" v-model="with_comorbidity" value="02_None" :disabled="editMode && !writeOn" />
                                        <label for="none_comorbidity" class="p-ml-1">None</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card p-fluid">
                        <div class="p-fluid p-formgrid p-grid">
                            <div class="p-field p-col-12 p-md-12">
                                <div class="p-field p-col-12 p-md-12">
                                    <label>Did you already register through your barangay or Municipality/ City before this online registration? <small><i>(Nakapagregister ka na ba sa iyong Barangay o Munisipyo/ City bago ang online registration na ito?)</i></small> <i class="p-error">*</i> </label>
                                    <p class="p-error"><small>{{ is_registeredError }}</small></p>
                                </div>
                                <div class="p-fluid p-formgrid p-grid">
                                    <div class="p-field p-col-12 p-md-6">
                                        <RadioButton class="p-mb-2" id="yes_is_registered" name="is_registered" v-model="is_registered" value="01_Yes" :disabled="editMode && !writeOn" />
                                        <label for="yes_is_registered" class="p-ml-1">Yes, I already registered. (Oo, nakapagregister na ako)</label>
                                    </div>
                                    <div class="p-field p-col-12 p-md-6">
                                        <RadioButton class="p-mb-2" id="none_is_registered" name="is_registered" v-model="is_registered" value="02_No" :disabled="editMode && !writeOn" />
                                        <label for="none_is_registered" class="p-ml-1">No, this is my first time to register. (Hindi, unang beses ko pa lang magregister.)</label>
                                    </div>
                                </div>
                            </div>
                        </div><hr />
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

        store.dispatch('registrations/GET_SELECTIONS')

        const init = {
            initialValues: {
                registration: {...registration}
            }
        }

        const { setValues, handleSubmit, resetForm } = useForm(init);

        if (editMode) { // Edit
            watch(
                () => state.registrations.registration,
                (data, prevData) => {
                    setValues({
                        registration: {...store.state.registrations.registration}
                    })
                }
            )
        } else { // New
            watch(
                () => store.state.registrations.fetched,
                (data, prevData) => {
                    if(data){
                        setValues({
                            registration: {...store.state.registrations.registration}
                        })
                    }
                }
            )
        }
        
        if (editMode) { // Edit
            dispatch('registrations/GET_REGISTRATION', { id: registrationId })
        } else { // New
            resetForm();
        }

        const getNapanam = () => {
            store.dispatch('registrations/GET_NAPANAM_ID', { id: qr_pass_id.value })
        }

        const onSubmit = handleSubmit((values, actions) => {

            const { resetForm } = actions
            const { registration } = values

            confirm.require({
                message: (editMode)?"Are you sure you want to update this registration's info?":'Are you sure you want to add this new registration?',
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
        const { value: gender, errorMessage: genderError } = useField('registration.gender',validateField);
        const { value: region } = useField('registration.region',validField);
        const { value: province, errorMessage: provinceError } = useField('registration.province',validateField);
        const { value: town_city, errorMessage: town_cityError } = useField('registration.town_city',validateField);
        const { value: barangay, errorMessage: barangayError } = useField('registration.barangay',validateField);
        const { value: address } = useField('registration.address',validField);
        const { value: contact_no } = useField('registration.contact_no',validField);
        const { value: occupation } = useField('registration.occupation',validField);
        const { value: priority_group, errorMessage: priority_groupError } = useField('registration.priority_group',validateField);
        const { value: sub_priority_group } = useField('registration.sub_priority_group',validField);
        const { value: allergic_to_vaccines, errorMessage: allergic_to_vaccinesError } = useField('registration.allergic_to_vaccines',validateRadio);
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
            allergic_to_vaccines,
            with_comorbidity,
            is_registered,
            qr_pass_idError,
            first_nameError,
            last_nameError,
            suffixError,
            genderError,
            provinceError,
            town_cityError,
            barangayError,
            priority_groupError,
            allergic_to_vaccinesError,
            with_comorbidityError,
            is_registeredError,
            onSubmit,
            editMode,
            getNapanam
        }

    },
    data() {
        return {
            displayConfirmation: false,
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

    }
}
</script>

<style scoped>
    .card {
        border-top: 5px solid #215266;
    }
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
    .disabled {
        background: rgb(219, 219, 219);
        border-bottom: 1px solid black;
        cursor: not-allowed; 
    }
    .p-border {
        border: 1px solid #215266;
    }
</style>