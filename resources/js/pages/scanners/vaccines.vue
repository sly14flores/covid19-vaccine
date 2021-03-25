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
                                                <h6><i class="pi pi-user"></i> Personal Information </h6>
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
                                            <div class="p-field p-col-12 p-md-3">
                                                <label>Birthdate <i class="p-error">*</i></label>
                                                <InputText class="p-shadow-1 p-inputtext-sm" type="date" v-model="birthdate" :class="{disabled: !writeOn}" :disabled="!writeOn" />
                                            </div>
                                            <div class="p-field p-col-12 p-md-3">
                                                <label>Sex <i class="p-error">*</i></label>
                                                <Dropdown class="p-shadow-1 p-inputtext-sm" optionLabel="name" :options="gender_value" optionValue="id" v-model="gender" placeholder="Select a Gender" :class="{disabled: !writeOn}" :disabled="!writeOn" />
                                            </div>
                                            <div class="p-field p-col-12 p-md-3">
                                                <label>Civil Status <i class="p-error">*</i></label>
                                                <Dropdown class="p-shadow-1 p-inputtext-sm" optionLabel="name" :options="civil_status_value" optionValue="id" v-model="civil_status" placeholder="Select a Civil Status" :class="{'p-invalid': civil_statusError, 'disabled': !writeOn}" :disabled="!writeOn" />
                                                <small class="p-error">{{ civil_statusError }}</small>
                                            </div>
                                            <div class="p-field p-col-12 p-md-3">
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
                                                <InputText class="p-shadow-1 p-inputtext-sm" type="text" v-model="province" :disabled="!writeOn" />
                                            </div>
                                            <div class="p-field p-col-12 p-md-4">
                                                <label>Municipality <i class="p-error">*</i></label>
                                                <InputText class="p-shadow-1 p-inputtext-sm" type="text" v-model="town_city" :disabled="!writeOn" />
                                            </div>
                                        </div>
                                        <div class="p-fluid p-formgrid p-grid">
                                            <div class="p-field p-col-12 p-md-8">
                                                <label>Unit/Building/Street/House No. <i class="p-error">*</i></label>
                                                <InputText class="p-shadow-1 p-inputtext-sm" type="text" v-model="address" :disabled="!writeOn" />
                                            </div>
                                            <div class="p-field p-col-12 p-md-4">
                                                <label>Barangay <i class="p-error">*</i></label>
                                                <InputText class="p-shadow-1 p-inputtext-sm" type="text" v-model="barangay" :disabled="!writeOn" />
                                            </div>
                                        </div>
                                        <div class="p-fluid">
                                            <div class="p-fluid p-formgrid p-grid p-mt-2">
                                                <div class="p-field p-col-12 p-md-10"></div>
                                                <div class="p-field p-col-12 p-md-2">
                                                    <Button label="Update" type="submit" class="p-button-primary p-button-sm" :disabled="!writeOn"></Button>
                                                </div>
                                            </div>
                                            <TabView>
                                                <TabPanel header="Pre-Assessment" :disabled="!writeOn">
                                                    <div class="p-fluid">
                                                        <div class="p-fluid p-formgrid p-grid p-mt-2">
                                                            <div class="p-field p-col-12 p-md-6">
                                                                <p class="p-text-sm">Consent</p>
                                                            </div>
                                                            <div class="p-field p-col-12 p-md-2">
                                                                <div class="p-field-radiobutton">
                                                                    <RadioButton id="yes_consent" name="consent" value="01_Yes" v-model="consent" />
                                                                    <label for="yes_consent">Yes</label>
                                                                </div>
                                                            </div>
                                                            <div class="p-field p-col-12 p-md-2">
                                                                <div class="p-field-radiobutton">
                                                                    <RadioButton id="no_consent" name="consent" value="02_No" v-model="consent" />
                                                                    <label for="no_consent">No</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="p-fluid p-formgrid p-grid p-mt-2">
                                                            <div class="p-field p-col-12 p-md-6">
                                                                <p class="p-text-sm">* Reason</p>
                                                            </div>
                                                            <div class="p-field p-col-12 p-md-6">
                                                                <Dropdown />
                                                            </div>
                                                        </div>
                                                        <div class="p-fluid p-formgrid p-grid p-mt-2">
                                                            <div class="p-field p-col-12 p-md-6">
                                                                <p class="p-text-sm">Age more than 16 years old?</p>
                                                            </div>
                                                            <div class="p-field p-col-12 p-md-2">
                                                                <div class="p-field-radiobutton">
                                                                    <RadioButton id="yes_consent" name="consent" value="01_Yes" v-model="consent" />
                                                                    <label for="yes_consent">Yes</label>
                                                                </div>
                                                            </div>
                                                            <div class="p-field p-col-12 p-md-2">
                                                                <div class="p-field-radiobutton">
                                                                    <RadioButton id="no_consent" name="consent" value="02_No" v-model="consent" />
                                                                    <label for="no_consent">No</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="p-fluid p-formgrid p-grid p-mt-2">
                                                            <div class="p-field p-col-12 p-md-6">
                                                                <p class="p-text-sm">Has no allergies to PEG or polysorbate?</p>
                                                            </div>
                                                            <div class="p-field p-col-12 p-md-2">
                                                                <div class="p-field-radiobutton">
                                                                    <RadioButton id="yes_consent" name="consent" value="01_Yes" v-model="consent" />
                                                                    <label for="yes_consent">Yes</label>
                                                                </div>
                                                            </div>
                                                            <div class="p-field p-col-12 p-md-2">
                                                                <div class="p-field-radiobutton">
                                                                    <RadioButton id="no_consent" name="consent" value="02_No" v-model="consent" />
                                                                    <label for="no_consent">No</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="p-fluid p-formgrid p-grid p-mt-2">
                                                            <div class="p-field p-col-12 p-md-6">
                                                                <p class="p-text-sm">Has no allergy to food, egg, medicines, and no asthma?</p>
                                                            </div>
                                                            <div class="p-field p-col-12 p-md-2">
                                                                <div class="p-field-radiobutton">
                                                                    <RadioButton id="yes_consent" name="consent" value="01_Yes" v-model="consent" />
                                                                    <label for="yes_consent">Yes</label>
                                                                </div>
                                                            </div>
                                                            <div class="p-field p-col-12 p-md-2">
                                                                <div class="p-field-radiobutton">
                                                                    <RadioButton id="no_consent" name="consent" value="02_No" v-model="consent" />
                                                                    <label for="no_consent">No</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="p-fluid p-formgrid p-grid p-mt-2">
                                                            <div class="p-field p-col-12 p-md-6">
                                                                <p class="p-text-sm">Has no history of bleeding disorders or currently taking anti-coagulants?</p>
                                                            </div>
                                                            <div class="p-field p-col-12 p-md-2">
                                                                <div class="p-field-radiobutton">
                                                                    <RadioButton id="yes_consent" name="consent" value="01_Yes" v-model="consent" />
                                                                    <label for="yes_consent">Yes</label>
                                                                </div>
                                                            </div>
                                                            <div class="p-field p-col-12 p-md-2">
                                                                <div class="p-field-radiobutton">
                                                                    <RadioButton id="no_consent" name="consent" value="02_No" v-model="consent" />
                                                                    <label for="no_consent">No</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="p-fluid p-formgrid p-grid p-mt-2">
                                                            <div class="p-field p-col-12 p-md-6">
                                                                <p class="p-text-sm">* if with bleeding history, is a gauge 23 - 25 syringe available for injection?</p>
                                                            </div>
                                                            <div class="p-field p-col-12 p-md-2">
                                                                <div class="p-field-radiobutton">
                                                                    <RadioButton id="yes_consent" name="consent" value="01_Yes" v-model="consent" />
                                                                    <label for="yes_consent">Yes</label>
                                                                </div>
                                                            </div>
                                                            <div class="p-field p-col-12 p-md-2">
                                                                <div class="p-field-radiobutton">
                                                                    <RadioButton id="no_consent" name="consent" value="02_No" v-model="consent" />
                                                                    <label for="no_consent">No</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="p-fluid p-formgrid p-grid p-mt-2">
                                                            <div class="p-field p-col-12 p-md-6">
                                                                <p class="p-text-sm">Has no history of exposure to a confirmed or suspected COVID-19 case in the past 2 weeks?</p>
                                                            </div>
                                                            <div class="p-field p-col-12 p-md-2">
                                                                <div class="p-field-radiobutton">
                                                                    <RadioButton id="yes_consent" name="consent" value="01_Yes" v-model="consent" />
                                                                    <label for="yes_consent">Yes</label>
                                                                </div>
                                                            </div>
                                                            <div class="p-field p-col-12 p-md-2">
                                                                <div class="p-field-radiobutton">
                                                                    <RadioButton id="no_consent" name="consent" value="02_No" v-model="consent" />
                                                                    <label for="no_consent">No</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="p-fluid p-formgrid p-grid p-mt-2">
                                                            <div class="p-field p-col-12 p-md-6">
                                                                <p class="p-text-sm">Has not been previously treated for COVID-19 in the past 90 days?</p>
                                                            </div>
                                                            <div class="p-field p-col-12 p-md-2">
                                                                <div class="p-field-radiobutton">
                                                                    <RadioButton id="yes_consent" name="consent" value="01_Yes" v-model="consent" />
                                                                    <label for="yes_consent">Yes</label>
                                                                </div>
                                                            </div>
                                                            <div class="p-field p-col-12 p-md-2">
                                                                <div class="p-field-radiobutton">
                                                                    <RadioButton id="no_consent" name="consent" value="02_No" v-model="consent" />
                                                                    <label for="no_consent">No</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="p-fluid p-formgrid p-grid p-mt-2">
                                                            <div class="p-field p-col-12 p-md-6">
                                                                <p class="p-text-sm">Has not received any vaccine in the past 2 weeks?</p>
                                                            </div>
                                                            <div class="p-field p-col-12 p-md-2">
                                                                <div class="p-field-radiobutton">
                                                                    <RadioButton id="yes_consent" name="consent" value="01_Yes" v-model="consent" />
                                                                    <label for="yes_consent">Yes</label>
                                                                </div>
                                                            </div>
                                                            <div class="p-field p-col-12 p-md-2">
                                                                <div class="p-field-radiobutton">
                                                                    <RadioButton id="no_consent" name="consent" value="02_No" v-model="consent" />
                                                                    <label for="no_consent">No</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="p-fluid p-formgrid p-grid p-mt-2">
                                                            <div class="p-field p-col-12 p-md-6">
                                                                <p class="p-text-sm">Has not received convalescent plasma or monoclonal antibodies for COVID-19 in the past 90 days?</p>
                                                            </div>
                                                            <div class="p-field p-col-12 p-md-2">
                                                                <div class="p-field-radiobutton">
                                                                    <RadioButton id="yes_consent" name="consent" value="01_Yes" v-model="consent" />
                                                                    <label for="yes_consent">Yes</label>
                                                                </div>
                                                            </div>
                                                            <div class="p-field p-col-12 p-md-2">
                                                                <div class="p-field-radiobutton">
                                                                    <RadioButton id="no_consent" name="consent" value="02_No" v-model="consent" />
                                                                    <label for="no_consent">No</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="p-fluid p-formgrid p-grid p-mt-2">
                                                            <div class="p-field p-col-12 p-md-6">
                                                                <p class="p-text-sm">Not Pregnant?</p>
                                                            </div>
                                                            <div class="p-field p-col-12 p-md-2">
                                                                <div class="p-field-radiobutton">
                                                                    <RadioButton id="yes_consent" name="consent" value="01_Yes" v-model="consent" />
                                                                    <label for="yes_consent">Yes</label>
                                                                </div>
                                                            </div>
                                                            <div class="p-field p-col-12 p-md-2">
                                                                <div class="p-field-radiobutton">
                                                                    <RadioButton id="no_consent" name="consent" value="02_No" v-model="consent" />
                                                                    <label for="no_consent">No</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="p-fluid p-formgrid p-grid p-mt-2">
                                                            <div class="p-field p-col-12 p-md-6">
                                                                <p class="p-text-sm">* if pregnant, 2nd or 3rd Trimester?</p>
                                                            </div>
                                                            <div class="p-field p-col-12 p-md-2">
                                                                <div class="p-field-radiobutton">
                                                                    <RadioButton id="yes_consent" name="consent" value="01_Yes" v-model="consent" />
                                                                    <label for="yes_consent">Yes</label>
                                                                </div>
                                                            </div>
                                                            <div class="p-field p-col-12 p-md-2">
                                                                <div class="p-field-radiobutton">
                                                                    <RadioButton id="no_consent" name="consent" value="02_No" v-model="consent" />
                                                                    <label for="no_consent">No</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="p-fluid p-formgrid p-grid p-mt-2">
                                                            <div class="p-field p-col-12 p-md-6">
                                                                <p class="p-text-sm">Does not have any of the following: HIV, Cancer/ Malignancy, Underwent Transplant, Under Steroid Medication/ Treatment, Bed Ridden, terminal illness, less than 6 months prognosis</p>
                                                            </div>
                                                            <div class="p-field p-col-12 p-md-2">
                                                                <div class="p-field-radiobutton">
                                                                    <RadioButton id="yes_consent" name="consent" value="01_Yes" v-model="consent" />
                                                                    <label for="yes_consent">Yes</label>
                                                                </div>
                                                            </div>
                                                            <div class="p-field p-col-12 p-md-2">
                                                                <div class="p-field-radiobutton">
                                                                    <RadioButton id="no_consent" name="consent" value="02_No" v-model="consent" />
                                                                    <label for="no_consent">No</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="p-fluid p-formgrid p-grid p-mt-2">
                                                            <div class="p-field p-col-12 p-md-6">
                                                                <p class="p-text-sm">* If with mentioned condition/s, specify.</p>
                                                            </div>
                                                            <div class="p-field p-col-12 p-md-2">
                                                                <div class="p-field-radiobutton">
                                                                    <RadioButton id="yes_consent" name="consent" value="01_Yes" v-model="consent" />
                                                                    <label for="yes_consent">Yes</label>
                                                                </div>
                                                            </div>
                                                            <div class="p-field p-col-12 p-md-2">
                                                                <div class="p-field-radiobutton">
                                                                    <RadioButton id="no_consent" name="consent" value="02_No" v-model="consent" />
                                                                    <label for="no_consent">No</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="p-fluid p-formgrid p-grid p-mt-2">
                                                            <div class="p-field p-col-12 p-md-6">
                                                                <p class="p-text-sm">* If with mentioned condition, has presented medical clearance prior to vaccination day?</p>
                                                            </div>
                                                            <div class="p-field p-col-12 p-md-2">
                                                                <div class="p-field-radiobutton">
                                                                    <RadioButton id="yes_consent" name="consent" value="01_Yes" v-model="consent" />
                                                                    <label for="yes_consent">Yes</label>
                                                                </div>
                                                            </div>
                                                            <div class="p-field p-col-12 p-md-2">
                                                                <div class="p-field-radiobutton">
                                                                    <RadioButton id="no_consent" name="consent" value="02_No" v-model="consent" />
                                                                    <label for="no_consent">No</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="p-fluid p-formgrid p-grid p-mt-2">
                                                            <div class="p-field p-col-12 p-md-6">
                                                                <p class="p-text-sm">Deferral</p>
                                                            </div>
                                                            <div class="p-field p-col-12 p-md-6">
                                                                <Dropdown />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </TabPanel>
                                                <TabPanel header="Post-Assessment Monitoring" :disabled="!writeOn">
                                                    <div class="p-fluid p-formgrid p-grid p-mt-2">
                                                        <div class="p-field p-col-12 p-md-6">
                                                            <p class="p-text-sm">Has no severe allergic reaction after the 1st dose of the vaccine?</p>
                                                        </div>
                                                        <div class="p-field p-col-12 p-md-2">
                                                            <div class="p-field-radiobutton">
                                                                <RadioButton id="yes_consent" name="consent" value="01_Yes" v-model="consent" />
                                                                <label for="yes_consent">Yes</label>
                                                            </div>
                                                        </div>
                                                        <div class="p-field p-col-12 p-md-2">
                                                            <div class="p-field-radiobutton">
                                                                <RadioButton id="no_consent" name="consent" value="02_No" v-model="consent" />
                                                                <label for="no_consent">No</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="p-fluid p-formgrid p-grid p-mt-2">
                                                        <div class="p-field p-col-12 p-md-6">
                                                            <p class="p-text-sm">* If with allergy or asthma, will the vaccinator able to monitor the patient for 30 minutes?</p>
                                                        </div>
                                                        <div class="p-field p-col-12 p-md-2">
                                                            <div class="p-field-radiobutton">
                                                                <RadioButton id="yes_consent" name="consent" value="01_Yes" v-model="consent" />
                                                                <label for="yes_consent">Yes</label>
                                                            </div>
                                                        </div>
                                                        <div class="p-field p-col-12 p-md-2">
                                                            <div class="p-field-radiobutton">
                                                                <RadioButton id="no_consent" name="consent" value="02_No" v-model="consent" />
                                                                <label for="no_consent">No</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="p-fluid p-formgrid p-grid p-mt-2">
                                                        <div class="p-field p-col-12 p-md-6">
                                                            <p class="p-text-sm">Does not manifest any of the following symptoms: Fever/chills, Headache, Cough, Colds, Sore throat, Myalgia, Fatigue, Weakness, Loss of smell/taste, Diarrhea, Shortness of breath/ difficulty in breathing</p>
                                                        </div>
                                                        <div class="p-field p-col-12 p-md-2">
                                                            <div class="p-field-radiobutton">
                                                                <RadioButton id="yes_consent" name="consent" value="01_Yes" v-model="consent" />
                                                                <label for="yes_consent">Yes</label>
                                                            </div>
                                                        </div>
                                                        <div class="p-field p-col-12 p-md-2">
                                                            <div class="p-field-radiobutton">
                                                                <RadioButton id="no_consent" name="consent" value="02_No" v-model="consent" />
                                                                <label for="no_consent">No</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="p-fluid p-formgrid p-grid p-mt-2">
                                                        <div class="p-field p-col-12 p-md-6">
                                                            <p class="p-text-sm">* If manifesting any of the mentioned symptom/s, specify all that apply</p>
                                                        </div>
                                                        <div class="p-field p-col-12 p-md-6">
                                                            <div class="p-field-radiobutton">
                                                                <InputText />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </TabPanel>
                                                <TabPanel header="Vaccine Administration" :disabled="!writeOn">
                                                    <div class="p-fluid">
                                                        <div class="p-d-flex p-jc-between">
                                                            <div></div>
                                                            <div><Button label="Add" class="p-button-success p-button-sm" @click="openVaccine" /></div>
                                                        </div>
                                                        <div class="p-fluid p-formgrid p-grid">
                                                            <DataTable :value="vaccinations" dataKey="id">
                                                                <Column field="vaccine_name" header="Vaccine Name"></Column>
                                                                <Column field="batch_number" header="Batch No."></Column>
                                                                <Column field="lot_number" header="Lot No."></Column>
                                                                <Column field="dose" header="Dosage"></Column>
                                                                <Column field="vaccinator" header="Administered by"></Column>
                                                                <Column field="profession" header="Profession"></Column>
                                                                <Column field="date" header="Date"></Column>
                                                                <Column field="id" header="Actions">
                                                                    <template #body="slotProps">
                                                                        <Button icon="pi pi-fw pi-pencil" class="p-button-rounded p-button-success p-button-sm p-mr-2" @click="showVaccine(slotProps.data.id)" />
                                                                        <Button icon="pi pi-trash" class="p-button-rounded p-button-danger p-button-sm" @click="deleteVaccine(slotProps.data.id)" />
                                                                    </template>
                                                                </Column>
                                                            </DataTable>
                                                            <ConfirmDialog group="confirmDelete"></ConfirmDialog>
                                                        </div>
                                                    </div>
                                                </TabPanel>
                                            </TabView>
                                            
                                            <Dialog header="Vaccine" v-model:visible="displayVaccine" :closeOnEscape="true" :style="{width: '80vw'}" :maximizable="true" position="top" :modal="true">
                                                <hr />
                                                <!-- <div class="p-fluid p-formgrid p-grid">
                                                    <div class="p-field p-col-12 p-md-6">
                                                        <label>Vaccinator </label>
                                                        <Dropdown class="p-shadow-1 p-inputtext-sm" id="vaccinator" optionLabel="name" :options="manufactures" v-model="vaccinator" optionValue="id" placeholder="Select a vaccinator" />
                                                    </div>
                                                </div> -->
                                                <div class="p-fluid p-formgrid p-grid">
                                                    <div class="p-field p-col-12 p-md-6">
                                                        <label>Vaccine Manufacturer Name </label>
                                                        <Dropdown class="p-shadow-1 p-inputtext-sm" id="vaccine_name" optionLabel="name" :options="manufactures" v-model="vaccine_name" optionValue="id" placeholder="Select a manufacturer name" />
                                                    </div>
                                                    <div class="p-field p-col-12 p-md-6">
                                                        <label>Dose </label>
                                                        <Dropdown class="p-shadow-1 p-inputtext-sm" id="dose" optionLabel="name" :options="dosages" v-model="dose" optionValue="id" placeholder="Select a dose" />
                                                    </div>
                                                </div>
                                                <div class="p-fluid p-formgrid p-grid">
                                                    <div class="p-field p-col-12 p-md-6">
                                                        <label>Batch Number</label>
                                                        <InputText class="p-shadow-1 p-inputtext-sm" type="text" id="batch_number" v-model="batch_number" />
                                                    </div>
                                                    <div class="p-field p-col-12 p-md-6">
                                                        <label>Lot Number</label>
                                                        <InputText class="p-shadow-1 p-inputtext-sm" type="text" id="lot_number" v-model="lot_number" />
                                                    </div>
                                                </div><br />
                                                <template #footer>
                                                    <Button label="Close" icon="pi pi-times" @click="closeVaccine" class="p-button-text"/>
                                                    <Button label="Save" icon="pi pi-check" @click="saveVaccine" autofocus />
                                                </template>
                                            </Dialog>
                                        </div>
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

        watch(
            () => store.state.vaccines.vaccination,
            (data, prevData) => {
                setValues({
                    vaccination: {...data}
                })
            }
        )
        
        const getNapanam = () => {
            store.dispatch('vaccines/GET_BY_QR', { id: qr_pass_id.value })
        }

        const vaccinations = computed(() => {

            return store.state.vaccines.vaccinations

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
        
        // Vaccine Administered
        const { value: vaccination_id } = useField('vaccination.id',validField);
        const { value: vaccine_name } = useField('vaccination.vaccine_name',validField);
        const { value: batch_number } = useField('vaccination.batch_number',validField);
        const { value: lot_number } = useField('vaccination.lot_number',validField);
        const { value: dose } = useField('vaccination.dose',validField);

        return {
            id, // Personal
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
            vaccine_name, // Vaccine
            batch_number,
            lot_number,
            dose, // End Vaccine
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
            getNapanam,
            saveVaccine,
            vaccinations
        }

    },
    data() {
      return {
          camera: 'auto',
          displayVaccine: false
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
        ScrollTop
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
        dosages() {
            return this.$store.state.vaccines.dosages
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
        deleteVaccine(id) {
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
        fetchSelections() {
            this.$store.dispatch('vaccines/GET_SELECTIONS')
        },
        openVaccine() {
            this.displayVaccine = true;
            this.$store.dispatch('vaccines/RESET_VACCINE')
        },
        showVaccine(id) {
            this.displayVaccine = true;
            this.$store.dispatch('vaccines/GET_VACCINATION', {id})
        },
        closeVaccine() {
            this.displayVaccine = false;
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
    /* .frame {
        border-style: solid;
        border-width: 2px;
        border-color: #fe664f;
        background-position: left bottom, left bottom, right top, right top, 4px 4px;
        height: 200px;
        width: 200px;
        position: absolute;
        top: 0px;
        bottom: 0px;
        right: 0px;
        left: 0px;
        margin: auto;
    } */
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
</style>