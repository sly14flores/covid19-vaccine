<template>
    <div>
        <Menubar class="menu-bar">
            <template #start>
                <div class="p-grid p-mt-2">
                    <img alt="logo" src="img/launion-logo.png" height="40" class="p-ml-2">
                    <label class="p-label-white p-mt-2 p-ml-2 p-mr-3"><h6>La Union CoViD-19 Vaccination Survey</h6></label>
                </div>
            </template>
            <template #end>
            </template>
        </Menubar>
        <div class="p-grid p-jc-center p-mt-2">
            <div class="p-lg-11 p-sm-12 p-xs-12">
                <div class="card p-fluid">
                    <h5 class="p-mt-2">Form</h5> <hr />
                    <div class="p-grid">
                        <div class="p-lg-3 p-sm-12 p-xs-12">
                            <div class="p-field">
                                <label>NAPANAM ID</label>
                                <InputText class="p-shadow-1" type="text" disabled />
                            </div>
                        </div>
                    </div>
                    <div class="p-grid">
                        <div class="p-lg-3 p-sm-12 p-xs-12">
                            <div class="p-field">
                                <label>Complete Name</label>
                                <InputText class="p-shadow-1" type="text" disabled />
                            </div>
                        </div>
                        <div class="p-lg-1 p-sm-12 p-xs-12">
                            <div class="p-field">
                                <label>Suffix</label>
                                <InputText class="p-shadow-1" type="text" />
                            </div>
                        </div>
                        <div class="p-lg-4 p-sm-12 p-xs-12">
                            <div class="p-field">
                                <label>Birthdate</label>
                                <InputText class="p-shadow-1" type="text" disabled />
                            </div>
                        </div>
                        <div class="p-lg-4 p-sm-12 p-xs-12">
                            <div class="p-field">
                                <label>Sex</label>
                                <InputText class="p-shadow-1" type="text" disabled />
                            </div>
                        </div>
                    </div>
                    <div class="p-grid">
                        <div class="p-lg-4 p-sm-12 p-xs-12">
                            <div class="p-field">
                                <label>Address</label>
                                <InputText class="p-shadow-1" type="text" disabled />
                            </div>
                        </div>
                        <div class="p-lg-4 p-sm-12 p-xs-12">
                            <div class="p-field">
                                <label>Contact No.:</label>
                                <InputText class="p-shadow-1" type="text" disabled />
                            </div>
                        </div>
                        <div class="p-lg-4 p-sm-12 p-xs-12">
                            <div class="p-field">
                                <label>Civil Status</label>
                                <Dropdown class="p-shadow-1" optionLabel="name" :options="civil_status_value" v-model="civil_status" placeholder="Select a Civil Status" />
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
                                <label>Category</label>
                                <Dropdown class="p-shadow-1" optionLabel="name" :options="category_value" v-model="category" placeholder="Select a Category"/>
                            </div>
                        </div>
                        <div class="p-lg-4 p-sm-12 p-xs-12">
                            <div class="p-field">
                                <label>Category ID</label>
                                <Dropdown class="p-shadow-1" optionLabel="name" :options="category_id_value" v-model="civil_status" placeholder="Select a Category ID"/>
                            </div>
                        </div>
                        <div class="p-lg-4 p-sm-12 p-xs-12">
                            <div class="p-field">
                                <label>Category ID No.</label>
                                <InputText class="p-shadow-1" />
                            </div>
                        </div>
                    </div>
                    <div class="p-grid">
                        <div class="p-lg-4 p-sm-12 p-xs-12">
                            <div class="p-field">
                                <label>Employment Status</label>
                                <Dropdown class="p-shadow-1" optionLabel="name" :options="employment_status_value" v-model="employment_status" placeholder="Select a Employment Status"/>
                            </div>
                        </div>
                        <div class="p-lg-4 p-sm-12 p-xs-12">
                            <div class="p-field">
                                <label>Profession</label>
                                <Dropdown class="p-shadow-1" optionLabel="name" :options="profession_value" v-model="profession" placeholder="Select a Profession"/>
                            </div>
                        </div>
                        <div class="p-lg-4 p-sm-12 p-xs-12">
                            <div class="p-field">
                                <label>PhilHealth ID</label>
                                <InputText class="p-shadow-1" type="text" placeholder="00-000000000-0" />
                            </div>
                        </div>
                    </div>
                    <div class="p-grid">
                        <div class="p-lg-12 p-sm-12 p-xs-12">
                            <div class="p-field">
                                <label>Employer Name</label>
                                <InputText class="p-shadow-1" type="text" />
                            </div>
                        </div>
                    </div>
                    <div class="p-grid">
                        <div class="p-lg-4 p-sm-12 p-xs-12">
                            <div class="p-field">
                                <label>Employer Address</label>
                                <InputText class="p-shadow-1" type="text" />
                            </div>
                        </div>
                        <div class="p-lg-4 p-sm-12 p-xs-12">
                            <div class="p-field">
                                <label>LGU</label>
                                <Dropdown class="p-shadow-1" optionLabel="name" placeholder="Select a LGU"/>
                            </div>
                        </div>
                        <div class="p-lg-4 p-sm-12 p-xs-12">
                            <div class="p-field">
                                <label>Employer Contact No.</label>
                                <InputText class="p-shadow-1" type="text" />
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
                                <label>Prenancy Status:</label>
                            </div>
                        </div>
                        <div class="p-lg-1 p-sm-12 p-xs-12">
                            <div class="p-field-radiobutton">
                                <RadioButton id="pregnant" name="pregnancy_test" />
                                <label for="pregnant">Pregnant</label>
                            </div>
                        </div>
                        <div class="p-lg-2 p-sm-12 p-xs-12">
                            <div class="p-field-radiobutton">
                                <RadioButton id="not_pregnant" name="pregnancy_test" />
                                <label for="not_pregnant">Not Pregnant</label>
                            </div>
                        </div>
                    </div>
                    <hr />
                    <div class="p-grid">
                        <div class="p-lg-2 p-sm-12 p-xs-12">
                            <div class="p-field">
                                <label>With Allergy:</label>
                            </div>
                        </div>
                        <div class="p-lg-1 p-sm-12 p-xs-12">
                            <div class="p-field-radiobutton">
                                <RadioButton id="yes_allergy" name="allergy" />
                                <label for="yes_allergy">Yes</label>
                            </div>
                        </div>
                        <div class="p-lg-1 p-sm-12 p-xs-12">
                            <div class="p-field-radiobutton">
                                <RadioButton id="none_allergy" name="allergy" />
                                <label for="none_allergy">None</label>
                            </div>
                        </div>
                        <div class="p-lg-4 p-sm-12 p-xs-12">
                            <div class="p-field">
                                <Dropdown class="p-shadow-1" :options="allergy_value" v-model="allergy" optionLabel="name" placeholder="Select a Allergy"/>
                            </div>
                        </div>
                        <div class="p-lg-4 p-sm-12 p-xs-12">
                            <div class="p-field">
                                <InputText class="p-shadow-1" optionLabel="name" placeholder="Others" />
                            </div>
                        </div>
                    </div>
                    <hr />
                    <div class="p-grid">
                        <div class="p-lg-2 p-sm-12 p-xs-12">
                            <div class="p-field">
                                <label>With Comorbidities:</label>
                            </div>
                        </div>
                        <div class="p-lg-1 p-sm-12 p-xs-12">
                            <div class="p-field-radiobutton">
                                <RadioButton id="yes_comorbidities" name="comorbidities" />
                                <label for="yes_comorbidities">Yes</label>
                            </div>
                        </div>
                        <div class="p-lg-1 p-sm-12 p-xs-12">
                            <div class="p-field-radiobutton">
                                <RadioButton id="none_comorbidities" name="comorbidities" />
                                <label for="none_comorbidities">None</label>
                            </div>
                        </div>
                        <div class="p-lg-4 p-sm-12 p-xs-12">
                            <div class="p-field">
                                <Dropdown class="p-shadow-1" :options="comorbidity_value" v-model="comorbidity" optionLabel="name" placeholder="Select a Comorbidities"/>
                            </div>
                        </div>
                        <div class="p-lg-4 p-sm-12 p-xs-12">
                            <div class="p-field">
                                <InputText class="p-shadow-1" optionLabel="name" placeholder="Others" />
                            </div>
                        </div>
                    </div>
                    <div class="card p-fluid p-border">
                        <h5><center><b>Covid History</b></center></h5> <hr />
                        <div class="p-grid">
                            <div class="p-lg-2 p-sm-12 p-xs-12">
                                <div class="p-field">
                                    <label>Diagnosed with Covid-19</label>
                                </div>
                            </div>
                            <div class="p-lg-1 p-sm-12 p-xs-12">
                                <div class="p-field-radiobutton">
                                    <RadioButton id="yes_diagnosed" name="diagnosed" />
                                    <label for="yes_diagnosed">Yes</label>
                                </div>
                            </div>
                            <div class="p-lg-1 p-sm-12 p-xs-12">
                                <div class="p-field-radiobutton">
                                    <RadioButton id="no_diagnosed" name="diagnosed" />
                                    <label for="no_diagnosed">No</label>
                                </div>
                            </div>
                            <div class="p-lg-4 p-sm-12 p-xs-12">
                                <div class="p-field">
                                    <label>Covid Classification</label>
                                    <Dropdown optionLabel="name" :options="covid_classification_value" v-model="covid_classification" placeholder="Select a Covid Classification"/>
                                </div>
                            </div>
                            <div class="p-lg-4 p-sm-12 p-xs-12">
                                <div class="p-field">
                                    <label>Date</label>
                                    <InputText class="p-shadow-1" type="date" />
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
                                <label>Provided electronic informed consent for vaccination?</label>
                            </div>
                        </div>
                        <div class="p-lg-1 p-sm-12 p-xs-12">
                            <div class="p-field-radiobutton">
                                <RadioButton id="yes_vaccination" name="vaccination" />
                                <label for="yes_vaccination">Yes</label>
                            </div>
                        </div>
                        <div class="p-lg-1 p-sm-12 p-xs-12">
                            <div class="p-field-radiobutton">
                                <RadioButton id="no_vaccination" name="vaccination" />
                                <label for="no_vaccination">No</label>
                            </div>
                        </div>
                        <div class="p-lg-1 p-sm-12 p-xs-12">
                            <div class="p-field-radiobutton">
                                <RadioButton id="Unknown_vaccination" name="vaccination" />
                                <label for="Unknown_vaccination">Unknown</label>
                            </div>
                        </div>
                    </div>
                    <div class="p-grid p-jc-center p-mt-2">
                        <div class="p-lg-2 p-sm-12 p-xs-12">
                            <Button label="Cancel" class="button-cancel" />
                        </div>
                        <div class="p-lg-2 p-sm-12 p-xs-12">
                            <Button label="Submit" class="button-success" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

import Button from 'primevue/button/sfc';
import InputText from 'primevue/inputtext/sfc';
import Dropdown from 'primevue/dropdown/sfc';
import RadioButton from 'primevue/radiobutton/sfc';
import Menubar from 'primevue/menubar/sfc';

export default {
     components: {
        Button,
        InputText,
        Dropdown,
        RadioButton,
        Menubar
    },
    data() {
        return {
            civil_status: null,
            category: null,
            category_id: null,
            employment_status: null,
            profession: null,
            civil_status_value: [
                {name: 'Single', id: '01'},
                {name: 'Married', id: '02'},
                {name: 'Widow/Widower', id: '03'},
                {name: 'Separated/Annulled', id: '04'},
                {name: 'Living with Partner', id: '05'}
            ],
            category_value: [
                {name: 'Health Care Worker', id: '01'},
                {name: 'Senior Citizen', id: '02'},
                {name: 'Indigent', id: '03'},
                {name: 'Uniformed Personnel', id: '04'},
                {name: 'Essential Worker', id: '05'},
                {name: 'Other', id: '06'}
            ],
            category_id_value: [
                {name: 'PRC number', id: '01'},
                {name: 'OSCA number', id: '02'},
                {name: 'Facility ID number', id: '03'},
                {name: 'PWD ID', id: '04'},
                {name: 'Other ID', id: '05'}
            ],
            employment_status_value: [
                {name: 'Government Employed', id: '01'},
                {name: 'Private Employed', id: '02'},
                {name: 'Self-employed', id: '03'},
                {name: 'Private', id: '04'}
            ],
            profession_value: [
                {name: 'Dental Hygienist', id: '01'},
                {name: 'Private Employed', id: '02'},
                {name: 'Dentist', id: '03'},
                {name: 'Medical Technologist', id: '04'},
                {name: 'Midwife', id: '05'},
                {name: 'Nurse', id: '06'},
                {name: 'Nutritionist-Dietician', id: '07'},
                {name: 'Occupational Therapist', id: '08'},
                {name: 'Optometrist', id: '09'},
                {name: 'Pharmacist', id: '10'},
                {name: 'Physical Therapist', id: '11'},
                {name: 'Physician', id: '12'},
                {name: 'Radiologic Technologist', id: '13'},
                {name: 'Respiratory Therapist', id: '14'},
                {name: 'X-ray Technologist', id: '15'},
                {name: 'Barangay Health Worker', id: '16'},
            ],
            allergy_value: [
                {name: 'Drug', id: '01'},
                {name: 'Food', id: '02'},
                {name: 'Insect', id: '03'},
                {name: 'Latex', id: '04'},
                {name: 'Mold', id: '05'},
                {name: 'Pet', id: '06'},
                {name: 'Pollen', id: '07'},
            ],
            comorbidity_value: [
                {name: 'Hypertension', id: '01'},
                {name: 'Heart disease', id: '02'},
                {name: 'Kidney disease', id: '03'},
                {name: 'Diabetes mellitus', id: '04'},
                {name: 'Bronchial Asthma', id: '05'},
                {name: 'Immunodeficiency state', id: '06'},
                {name: 'Cancer', id: '07'},
            ],
            covid_classification_value: [
                {name: 'Asymptomatic', id: '01'},
                {name: 'Mild', id: '02'},
                {name: 'Moderate', id: '03'},
                {name: 'Severe', id: '04'},
                {name: 'Critical', id: '05'},
            ],
        }
    }
}
</script>

<style scoped>
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
}
.button-success {
    background-color: #68bca4;
}
.button-cancel {
    background-color: #ffab5d;
}
</style>