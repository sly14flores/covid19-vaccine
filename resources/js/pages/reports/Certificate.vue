<template>
    <div>
        <MyBreadcrumb :home="home" :items="items" class="hidden"/>
        <div class="row">
            <div class="column">
                <div class="card">
                  <div class="row">
                    <Button icon="pi pi-fw pi-times" class="btn-right hidden p-button-sm p-button-danger p-mr-2" label="Cancel" @click="cancel()" />
                    <Button icon="pi pi-fw pi-print" class="btn-right hidden p-button-sm p-button-primary p-mr-2" label="Print" @click="print()" />
                  </div>
                  <div>

                  </div>
                  <div class="main">
                    <img class="banner-header" src="img/header.png" />
                    <h3 class="text-center text-underline text-bold">CoViD-19 VACCINATION <br /> CERTIFICATE</h3> <br />
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This serves as proof that the vaccine whose made name and details appear herein has been vaccinated against of CoViD-19. For any clarification, you may reach us thru email, pglupho.vax@gmail.com or telephone number (072) 242-5580 local 258</p>
                    <br />
                  </div>
                  

                  <br class="hidden" />
                  <div class="text-body">
                    <div class="title">Vaccinee Details</div>
                    <div class="row">
                        <div class="column-25">
                          <p>Status: {{status}}</p>
                        </div>
                        <div class="column-50">
                        <p label class="text-bold">{{fullname}}</p>
                        <p label class="text-bold">{{personalInfo.birthdate}}</p>
                        <p label class="text-bold">{{personalInfo.gender}}</p>
                        <p label class="text-bold">{{personalInfo.barangay}}, {{personalInfo.townCity}}{{personalInfo.province}}</p>
                        </div>
                        <div class="column-20">
                          <p>Name: </p>
                          <p>Birthdate: </p>
                          <p>Sex:</p>
                          <p>Address: </p>
                        </div>
                    </div>
                  </div>
                <br />
                <br />
                <div class="text-body">
                    <div class="title">Vaccination Details</div>
                    <div class="row">
                        <div class="column-25"></div>
                        <div class="column-50">
                          <p class="text-bold">&nbsp;{{first_dosage.brand_description}}</p>
                          <p class="text-bold">&nbsp;{{first_dose}}</p>
                          <p class="text-bold">&nbsp;{{first_dosage.date_of_vaccination}}</p>
                          <p class="text-bold">&nbsp;{{first_facility}}</p>
                          <p class="text-bold">&nbsp;{{first_dosage.lot_number}}</p>
                        </div>
                        <div class="column-20">
                          <p>Vaccine Manufacturer:</p>
                          <p>Dose: </p>
                          <p>Vaccination Date: </p>
                          <p>Vaccination Site:</p>
                          <p>Lot Number: </p>
                        </div>
                    </div>
                    <hr>
                    <div class="row" v-if="toggle_second_dose">
                        <div class="column-25"></div>
                        <div class="column-50">
                        <p class="text-bold">&nbsp;{{second_dose}}</p>
                        <p class="text-bold">&nbsp;{{second_dosage.date_of_vaccination}}</p>
                        <p class="text-bold">&nbsp;{{second_facility}}</p>
                        <p class="text-bold">&nbsp;{{second_dosage.lot_number}}</p>
                        </div>
                        <div class="column-20">
                          <p>Dose: </p>
                          <p>Vaccination Date: </p>
                          <p>Vaccination Site:</p>
                          <p>Lot Number: </p>
                        </div>
                    </div>
                </div>
                <br />
                  <div class="row">
                      <div class="qr-code">
                        <p>&nbsp;</p>
                        <!-- <p>Scan QR Code to validate authenticity</p>
                        <p>The QR Code should be directed to https://vaccines.launion.gov.ph/profile.</p> -->
                      </div>
                      <div class="qr-code-img">
                            <!-- <img src="img/qr-profile.png" class="qr-image" /> -->
                            <h1 class="qr-frame">
                              <img class="qr-image qr-body" v-bind:src="qrcode" />
                            </h1>
                      </div>
                  </div>
                    <div class="row">
                        <div class="column">
                          <p class="text-center">This computer-generated document is issued by the Provincial Government of La Union, <br />through the Provincial Health Office. All data made available through <br /> https://vaccines.launion.gov.ph is verified and encrypted</p> <br/>
                          <p class="text-center">Powered by Provincial Government of La Union - Information Communications and Technology Unit</p>
                        </div>
                    </div>
                    <div class="footer">
                      <img class="banner-header" src="img/footer.png" />
                    </div>
                </div>
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

import { useStore } from 'vuex'
import { useRoute } from 'vue-router'
import { reactive, toRefs } from 'vue'

import { api_url } from '../../url.js'

import Swal from 'sweetalert2'

import {
    getRegistrationCertificate
} from '../../api/vaccination'

export default {
    setup() {

        const route = useRoute()
        const { params } = route
        const registrationId = params.qr || null
        const store = useStore()
        const { dispatch } = store

        const state = reactive({
            first_dose: "1st Dose",
            second_dose: "2nd Dose",
            personalInfo: {},
            fullname: "",
            dosages: [],
            first_dosage: {},
            second_dosage: {},
            first_facility: "",
            second_facility: "",
            status: "",
            toggle_second_dose: true,
            qrcode: null,
            url: `${api_url}/profile?/pr/`
        })

        getRegistrationCertificate({ id: registrationId }).then(res => {
            const { data: { data } } = res
            const { dosages } = data

            if(dosages.length == 0) {

                Swal.fire({
                    // title: '<p>Oops...</p>',
                    icon: 'warning',
                    html: '<h5 style="font-size: 18px;">Not vaccinated yet</h5>',
                    showCancelButton: false,
                    focusConfirm: true,
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    allowEnterKey: false,
                    confirmButtonText: 'Back',
                }).then((result) => {
                    if (result.value) {
                        window.location = `${api_url}/admin#/reports/list/certificate`;
                    }
                })
                
                return;
            }

            if(data.gender=='02_Male'){
                data.gender = 'Male'
            } else{
                data.gender = 'Female'
            }

            const province = data.province;
            const barangay = data.barangay;

            const provinceStr = province.replace(/_/g, " ");
            const brgyStr = barangay.replace(/_/g, " ");

            data.province = provinceStr.replace(/[0-9]/g, '');
            data.barangay = brgyStr.replace(/[0-9]/g, '');

            // First Dose
            const first = new Date(dosages[0].date_of_vaccination);

            const first_date_vaccination = `${first.toLocaleString('default', { month: 'long' })+' '+first.getDate()+', '+first.getFullYear()}`
            dosages[0].date_of_vaccination = first_date_vaccination;

            if(dosages.length >= 1) {

              if(dosages[0].user!=null) {
                  state.first_facility = dosages[0].user.user_hospital.description
              }
              state.toggle_second_dose = false;
              state.status = "Partially Vaccinated";

            }

            // Second Dose
            if(dosages.length==2 && dosages[1].brand_description!="") {

                state.status = "Fully Vaccinated";
                state.toggle_second_dose = true;

                const second = new Date(dosages[1].date_of_vaccination);

                const second_date_vaccination = `${second.toLocaleString('default', { month: 'long' })+' '+second.getDate()+', '+second.getFullYear()}`
                dosages[1].date_of_vaccination = second_date_vaccination;

                state.second_dosage = dosages[1];

                if(dosages[1].user!=null) {
                    state.second_facility = dosages[1].user.user_hospital.description
                }
                
            }

            const pushQrCode = `${"https://api.qrserver.com/v1/create-qr-code/?size=200x200&data="+state.url}`


            Object.assign(state, {
                ...state,
                personalInfo: data,
                fullname: `${data.first_name.toUpperCase()+' '+data.last_name.toUpperCase()}`,
                dosages: dosages,
                first_dosage: dosages[0],
                first_facility: state.first_facility,
                second_dosage: state.second_dosage,
                second_facility: state.second_facility,
                toggle_second_dose: state.toggle_second_dose,
                qrcode: `${pushQrCode+data.qr_pass_id+'/'}`
            })

            console.log(state.qrcode)

        }).catch(err => {

            console.log(err)

            if(err.status==500){
            Swal.fire({
                title: '<p>Oops...</p>',
                icon: 'error',
                html: '<h5 style="font-size: 18px;">Check your internet connection and try again</h5>',
                showCancelButton: false,
                focusConfirm: true,
                allowOutsideClick: false,
                allowEscapeKey: false,
                allowEnterKey: false,
                confirmButtonText: 'Refresh this page',
            }).then((result) => {
                if (result.value) {
                    location.reload();
                }
            })	
        }
            
        })

        return {
            ...toRefs(state)
        }

    },
    data() {
        return {
            home: {icon: 'pi pi-home', to: '/list/certificate'},
            items: [{label: 'Certificate', to: `${this.$route.fullPath}`}]
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
        Checkbox
    },
    methods: {
        print() {

          window.print();

        },
        cancel() {

          this.$router.push('/reports/list/certificate')
          
        }
    },
    mounted() {

    }
}
</script>

<style scoped>
.qr-frame {
  border: 0.25em solid;
  position: relative;
  width: 170px;
}
.qr-frame::before {
  top: -0.3em;
  bottom: -0.3em;
  left: 1em;
  right: 1em;
}
.qr-frame::after{
  left: -0.3em;
  right: -0.5em;
  top: 1em;
  bottom: 1em;
}
.qr-frame::before, .qr-frame::after {
  content: '';
  display: block;
  position: absolute;
  background: #fff;
}
.qr-body {
  position: relative;
  z-index: 1;
}
.qr-image{
    width: 140px;
    margin-left: 7px;
    margin-top: 7px;
}

body {
    align-items: center;
    justify-content: center;
    height: 100vh;
    background: #ffffff;
}
* {
  box-sizing: border-box;
}
.row {margin: 0 -5px;}
.row:after {
  content: "";
  display: table;
  clear: both;
}
.column-100 {
  width: 100%;
}
.column-70 {
  float: left;
  width: 70%;
}
.column-20 {
  float: right;
  width: 20%;
}
.column-50 {
  float: right;
  width: 50%;
}
.column-30 {
  float: right;
  width: 30%;
}
.column-33 {
  width: 33%;
  float: right;
}
.column-66 {
  width: 66%;
  float: right;
}
.column-25 {
  width: 25%;
  margin-top: 10px;
  float: right;
}
.column-75 {
  width: 70%;
  float: right;
}
.qr-code {
  width: 41%;
  margin-left: 10px;
  float: left;
}
.qr-code-img {
  width: 20%;
  float: left;
}
.column {
  width: 100%;
  padding: 0 10px;
}
.logo {
  width: 11%;
  float: left;
  position: absolute;
  clear: right;
}
.card {
  padding: 16px;
  font-family: 'Poppins', sans-serif;
  background-color: #ffffff;
}
.container {
  display: flex;
}
.text-bold {
  font-weight: bold;
}

.header {
  width: 10em;
  margin-left: 10%;
}
.banner-header {
  width: 100%;
}
.text-body {
  border: 2px solid;
  padding: 5px;
  border-radius: 10px;
}

.title {
  float: left;
  padding: 0 5px;
  margin: -20px 0 0 30px;
  background: #ffffff;
}

.text-center {
  text-align: center;
}
.line-4 {
  border-bottom: 4px solid rgb(45, 45, 45);
}
.line-3 {
  border-bottom: 3px solid rgb(45, 45, 45);
}
.line-2 {
  border-bottom: 2px solid rgb(45, 45, 45);
}
.line-1 {
  border-bottom: 1px solid rgb(45, 45, 45);
}
.btn-right {
  float: right;
}
.footer {
  position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;
  background-color: red;
  color: white;
  text-align: center;
  display: none;
}
.text-underline {
  text-decoration: underline;
}

@media print
{    
    .hidden, .hidden *
    {
        display: none !important;
    }
    .main, .main *
    {
        margin-top: -20px;
    }
    .footer , .footer * {
        display: inline;
    }
}
</style>