<template>
    <div>
        <div class="card">
            <h5>Vaccines</h5>
            <TabView>
                <TabPanel header="QR Code Scanning">
                     <div class="p-grid p-jc-center p-mt-2">
                        <div class="p-lg-8 p-sm-12 p-xs-12">
                            <Button icon="pi pi-refresh" @click="reset" />
                            <div class="p-mt-4 p-fluid p-shadow-2">
                                <div class="p-grid p-jc-center">
                                    <div class="p-lg-1 p-md-1 p-xs-5">
                                        <img alt="logo" src="img/qr-code.png" class="qr-code" />
                                    </div>
                                </div>
                                <div class="p-grid p-jc-center p-mt-2">
                                    <h2 class="p-label-blue">QR Code Scanning</h2>
                                </div>
                                <div class="p-grid">
                                    <div class="p-field p-col-12 p-md-12">
                                        <div class="center stream">
                                            <qr-stream :camera="camera" @decode="onDecode" class="mb p-shadow-3">
                                                <div style="color: #fe664f;" class="frame"></div>
                                            </qr-stream>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </TabPanel>
                <TabPanel header="Search">
                    <form @submit="onSubmit">
                        <div class="card p-fluid p-shadow-2">
                            <h5><i class="pi pi-user"></i> Personal Information <ToggleButton class="float-right" v-if="editMode" v-model="writeOn" onIcon="pi pi-ban" offIcon="pi pi-pencil" change="toggleWrite" /></h5>
                            <hr />
                            <div class="p-fluid p-formgrid p-grid">
                                <div class="p-field p-col-12 p-md-3">
                                    <label for="qr_pass_id">Napanam ID No.: <i class="p-error">*</i></label>
                                    <div class="p-inputgroup">
                                        <InputText class="p-shadow-1" id="qr_pass_id " type="text" placeholder="Enter Napanam ID No." v-model="qr_pass_id" :class="{'p-invalid': qr_pass_idError}" :disabled="editMode && !writeOn" />
                                        <Button label="Fetch" class="p-button-primary"/>
                                    </div>
                                    <small class="p-error">{{ first_nameError }}</small>
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

                        <div class="card p-fluid p-shadow-2">
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

                        <div class="card p-fluid p-shadow-2">
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

                        <div class="card p-fluid p-shadow-2">
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
import RadioButton from 'primevue/radiobutton/sfc';
import ConfirmDialog from 'primevue/confirmdialog/sfc';

import { QrStream, QrCapture, QrDropzone } from 'vue3-qr-reader';
import { useStore } from 'vuex'

export default {
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
        ConfirmDialog
    },
    setup() {

        const store = useStore()

        async function onInit() {

        }

    },
    methods: {
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
        }        
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
    .card {
        border-top: 5px solid #215266;
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
</style>