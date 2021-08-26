<template>
    <div>
      <div class="row">
        <div class="column-100">
          <div class="row hidden">
            <Button icon="pi pi-fw pi-times" class="btn-right p-button-sm p-button-danger p-mr-2" label="Cancel" @click="cancel()" />
            <Button icon="pi pi-fw pi-print" class="btn-right p-button-sm p-button-primary p-mr-2" label="Print" @click="print()" />
          </div>
          <br class="hidden"/>
          <div class="card">

            <!-- Header  -->
            <div class="row hidden">
              <div class="column-100">
                <div class="row line-6">
                  <h1 class="p-text-bold">
                    CoViD-19 VACCINATION CARD
                    <img class="logos" src="img/card/logos/logo.png" alt="logo">
                    <img class="logos" src="img/card/logos/launion-logo.png" alt="logo">
                    <img class="logos" src="img/card/logos/doh.png" alt="logo">
                    <img class="logos" src="img/card/logos/iatf.png" alt="logo">
                    <img class="logos" src="img/card/logos/ntf.png" alt="logo">
                  </h1>
                </div>
              </div>
            </div>

            <!-- Patient  -->
            <div class="row">
              <div class="column-25">
                  <div class="text-center qr-frame">
                    <img class="qr-image qr-body" v-bind:src="qrcode" />
                  </div>
                  <span class="scan-me">Scan QR Code</span>
              </div>
              <div class="column-75">
                  <div class="row p-mb-2">
                      <div class="patient-name column-100">
                        <label class="p-text-uppercase">{{personalInfo.first_name}} {{personalInfo.middle_name}} {{personalInfo.last_name}} {{personalInfo.suffix}}</label>
                      </div>
                  </div>
                  <div class="row p-mb-2">
                      <div class="column-15">
                        <label class="patient-label">Address </label> &nbsp;
                      </div>
                      <div class="column-85">
                        <label class="patient-info">: {{personalInfo.barangay}}, {{personalInfo.townCity}} {{personalInfo.province}}</label>
                      </div>
                  </div>
                  <div class="row p-mb-2">
                      <div class="column-15">
                        <label class="patient-label">Birthdate</label> &nbsp;
                      </div>
                      <div class="column-85">
                        <label class="patient-info">: {{personalInfo.birthdate}}</label>
                      </div>
                  </div>
                  <div class="row p-mb-2">
                      <div class="column-15">
                        <label class="patient-label">Contact No. </label> &nbsp;
                      </div>
                      <div class="column-85">
                        <label class="patient-info">: {{personalInfo.contact_no}}</label>
                      </div>
                  </div>
                  <div class="row p-mb-2">
                      <div class="column-15">
                        <label class="patient-label">Philhealth </label> &nbsp;
                      </div>
                      <div class="column-85">
                        <label class="patient-info">: {{personalInfo.philhealth}}</label>
                      </div>
                  </div>
                  <div class="row p-mb-2">
                      <div class="column-15">
                        <label class="patient-label">Category </label> &nbsp;
                      </div>
                      <div class="column-85">
                        <label class="patient-info">: {{personalInfo.priority_group}}</label>
                      </div>
                  </div>
              </div>
            </div>

            <!-- Body/Table -->
            <div class="row p-mt-4 vaccine-table">
              <table id="table">
                <tr>
                  <th>Dosage Seq.</th>
                  <th>Date</th>
                  <th>Vaccine <br /> Manufacturer</th>
                  <th>Batch No.</th>
                  <th>Lot No.</th>
                </tr>
                <tr>
                  <td class="text-center text-bold" rowspan="2">{{first_dose}}</td>
                  <td class="text-center text-bold">{{first_dosage.date_of_vaccination}}&nbsp;</td>
                  <td class="text-center text-bold" :class="vaccine_color">{{first_dosage.brand_description}}&nbsp;</td>
                  <td class="text-center text-bold">{{first_dosage.batch_number}}&nbsp;</td>
                  <td class="text-center text-bold">{{first_dosage.lot_number}}&nbsp;</td>
                </tr>
                <tr>
                  <td colspan="2"><small>Vaccinator Name: </small><br /><p class="text-center"><span class="text-bold p-text-uppercase">{{first_dosage.vaccinator}}&nbsp;</span></p></td>
                  <td><small>License No.: </small><br /><p class="text-center"><span class="text-bold">{{first_license}}&nbsp;</span></p></td>
                  <td><small>Signature: <br /> &nbsp; </small></td>
                </tr>
                <tr>
                  <td class="text-center text-bold" rowspan="2">{{second_dose}}</td>
                  <td class="text-center text-bold">{{second_dosage.date_of_vaccination}}&nbsp;</td>
                  <td class="text-center text-bold" :class="vaccine_color">{{second_dosage.brand_description}}&nbsp;</td>
                  <td class="text-center text-bold">{{second_dosage.batch_number}}&nbsp;</td>
                  <td class="text-center text-bold">{{second_dosage.lot_number}}&nbsp;</td>
                </tr>
                <tr>
                  <td colspan="2"><small>Vaccinator Name: </small><br /><p class="text-center"><span class="text-bold p-text-uppercase">{{second_dosage.vaccinator}}&nbsp;</span></p></td>
                  <td><small>License No.: </small><br /><p class="text-center"><span class="text-bold">{{second_license}}&nbsp;</span></p></td>
                  <td><small>Signature: <br /> &nbsp;  </small></td>
                </tr>
              </table>
            </div>
            <br />
            <div class="row footer-hide">
              <div class="column-66">
                <label class="patient-label">Health Facility Name: </label> <label class="text-bold text-underline text-footer">{{first_facility}}</label>
              </div>
              <div class="column-33">
                <label class="patient-label">Contact No. </label> <label class="text-bold text-underline text-footer">(072) 607-2633</label>
              </div>
            </div>
            <br class="hidden" />
            <div class="row footer">
              <div class="column-66">
                <label class="patient-label">Health Facility Name: </label> <label class="text-bold text-underline text-footer">{{first_facility}}</label>
              </div>
              <div class="column-33">
                <label class="patient-label">Contact No. </label> <label class="text-bold text-underline text-footer">(072) 607-2633</label>
              </div>
            </div>
          </div>
          
        </div>
        <!-- <span class="vertical-line hidden"><img src="img/card/fb.png" alt="image" class="icon" /> OfficialDOHgov <img src="img/card/twitter.png" alt="image" class="icon" /> DOHgovph <img src="img/card/web.png" alt="image" class="icon" /> doh.gov.ph <img src="img/card/phone.png" alt="image" class="icon" /> (632) 8561 - 7800 loc. 1936 <img src="img/card/email.png" alt="image" class="icon" /> covid19ceir@doh.gov.ph</span> -->
        <span class="vertical-line hidden">Please keep this card, which includes medical information about the vaccines you have received</span>
      </div>
    </div>
</template>

<script>
import Button from 'primevue/button/sfc';
import Menubar from 'primevue/menubar/sfc';

import { useStore } from 'vuex'
import { useRoute } from 'vue-router'
import { reactive, toRefs } from 'vue'

import { api_url } from '../../url.js'

import Swal from 'sweetalert2'

import { getRegistrationCertificate } from '../../api/vaccination'

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
            first_license: "",
            second_license: "",
            status: "",
            toggle_second_dose: true,
            qrcode: null,
            url: `${api_url}/profile?/pr/`,
            vaccine_color: null,
        })

        getRegistrationCertificate({ id: registrationId }).then(res => {
            const { data: { data } } = res
            const { dosages } = data

            const pushQrCode = `${"https://api.qrserver.com/v1/create-qr-code/?size=200x200&data="+state.url}`

            dosages.sort((a, b) => (a.dose > b.dose) ? 1 : -1);

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

            if(data.suffix=="NA") data.suffix = "";

            if(dosages[0].brand_description=="Pfizer/BioNTech") state.vaccine_color = "pfizer";
            if(dosages[0].brand_description=="Sinovac") state.vaccine_color = "sinovac";
            if(dosages[0].brand_description=="Moderna") state.vaccine_color = "moderna";
            if(dosages[0].brand_description=="Oxford/AstraZeneca") state.vaccine_color = "astrazeneca";
            if(dosages[0].brand_description=="Janssen (Johnson & Johnson)") state.vaccine_color = "janzen";

            
            if(dosages.length >= 1) {
              
              // First Dose
              if(dosages[0].brand_description!="") {
                  const first = new Date(dosages[0].date_of_vaccination);

                  const add_zero = first.getMonth() < 9 ? '0': '';
                  const month = first.getMonth()+1;
                  const first_date_vaccination = `${add_zero+month+'/'+first.getDate()+'/'+first.getFullYear()}`;
                  dosages[0].date_of_vaccination = first_date_vaccination;
              } else { 
                dosages[0].date_of_vaccination = ""
              }
              
              if(dosages[0].user!=null) {
                  state.first_facility = dosages[0].user.user_hospital.description
                  state.first_license = dosages[0].user.prc_number
              }

            }

            // Second Dose
            if(dosages.length==2 && dosages[1].brand_description!="") {

                if(dosages[1].brand_description=="Janssen (Johnson & Johnson)") state.vaccine_color = "janzen";

                state.status = "Fully Vaccinated";
                state.toggle_second_dose = true;

                const second = new Date(dosages[1].date_of_vaccination);
                const add_zero = second.getMonth() < 9 ? '0': '';
                const month = second.getMonth()+1;
                const second_date_vaccination = `${add_zero+month+'/'+second.getDate()+'/'+second.getFullYear()}`;
                dosages[1].date_of_vaccination = second_date_vaccination;

                state.second_dosage = dosages[1];

                if(dosages[1].user!=null) {
                    state.second_facility = dosages[1].user.user_hospital.description
                    state.second_license = dosages[1].user.prc_number
                }

            }

            if(data.middle_name!=null) {
              const middle_initial = data.middle_name;
              data.middle_name = `${middle_initial.charAt(0)+"."}`
            }

            Object.assign(state, {
                ...state,
                personalInfo: data,
                dosages: dosages,
                first_dosage: dosages[0],
                first_facility: state.first_facility,
                second_dosage: state.second_dosage,
                second_facility: state.second_facility,
                toggle_second_dose: state.toggle_second_dose,
                qrcode: `${pushQrCode+data.qr_pass_id+'/'}`
            })

        }).catch(err => {

            console.log(err)
            
        })

        return {
            ...toRefs(state),
        }

    },
    data() {
        return {
            home: {icon: 'pi pi-home', to: '/list/certificate'},
            items: [{label: 'Certificate', to: `${this.$route.fullPath}`}]
        }
    },
    components: {
        Button,
        Menubar
    },
    methods: {
        print() {

          window.print();

        },
        cancel() {

          this.$router.push('/reports/list/card')
          
        }
    },
}
</script>

<style scoped>
/* Manufacturer Color */
  .pfizer {
    color: #183986;
  }
  .sinovac {
    color: rgb(204, 133, 0);
  }
  .moderna {
    color: red;
  }
  .astrazeneca {
    color: purple;
  }
  .janzen {
    color: #305280;
  }

/* Patient  */
  .patient-name {
    font-size: 30px;
    font-weight: bold;
    margin-top: 10px;
  }
  .patient-label {
    font-size: 18px;
  }
  .patient-info {
    font-weight: bold;
    font-size: 21px;
  }
  .scan-me {
    font-weight: bold;
    font-size: 16px;
    margin-left: 20%;
  }

/* QR Code  */
  .qr-frame {
    border: 0.25em solid;
    position: relative;
    width: 195px;
    margin-left: 20px;
    margin-top: 13px;
  }
  .qr-frame::before {
    top: -0.3em;
    bottom: -0.3em;
    left: 1em;
    right: 1em;
  }
  .qr-frame::after{
    left: -0.3em;
    right: -0.3em;
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
    width: 173px;
    margin-left: 2px;
    margin-top: 7px;
    margin-right: 7px;
  }

  /* Card */
  .card {
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    padding: 16px;
    font-family: Arial, Helvetica, sans-serif;
    float: left;
    width: 100%;
    padding: 0 10px;
    border-right: 35px solid #1d1d1d;
    border-top-right-radius: 15px;
    border-bottom-right-radius: 15px;
    top: 0px;
  }
  .line-6 {
    border-bottom: 6px solid rgb(45, 45, 45);
  }
  .row:after {
    content: "";
    display: table;
    clear: both;
  }

/* Columns */
  .column-15 {
    width: 15%;
    float: left;
  }
  .column-20 {
    width: 20%;
    float: left;
  }
  .column-25 {
    float: left;
    width: 25%;
  }
  .column-30 {
    float: left;
    width: 30%;
  }
  .column-33 {
    float: left;
    width: 33%;
  }
  .column-35 {
    float: left;
    width: 35%;
  }
  .column-50 {
    float: left;
    width: 50%;
  }
  .column-51 {
    float: left;
    width: 51%;
  }
  .column-66 {
    float: left;
    width: 66%;
  }
  .column-70 {
    float: left;
    width: 70%;
  }
  .column-75 {
    float: left;
    width: 75%;
  }
  .column-80 {
    width: 80%;
    float: left;
  }
  .column-85 {
    width: 85%;
    float: left;
  }
  .column-100 {
    width: 100%;
    float: left;
  }

/* Table */
  #table {
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
    border-radius: 10px;
    font-size: 17.1px;
  }
  #table td, th {
    border: .1px solid rgb(108, 108, 108);
    padding: 8px;
  }
  #table tr:nth-child(even){background-color: #ffffff;}
  #table tr:hover {background-color: rgb(255, 255, 255);}
  #table th {
    padding-top: 12px;
    padding-bottom: 12px;
    background-color: #ffffff;
    color: rgb(0, 0, 0);
    text-align: center;
    border: .1px solid rgb(108, 108, 108);
  }

/* Others */
  .vertical-line {
    writing-mode: vertical-rl;
    transform: rotate(180deg);
    color: rgb(255, 255, 255);
    /* font-size: 9.5px; */
    text-align: center;
    font-size: 12px;
    margin-left: -2%!important;
    margin-top: 6%;
    z-index: -1;
    white-space: nowrap;
  }
  .text-center {
    text-align: center;
  }
  .text-bold {
    font-weight: bold;
  }
  .icon {
    width: 15px;
  }
  .logos {
    height: 50px; 
    float: right; 
    margin-top: 2px;
    margin-bottom: 2px;
    margin-right: 5px;
  }
  .btn-right {
    float: right;
  }
  .text-right {
    float: right;
  }
  .text-underline {
    text-decoration: underline;
  }
  .text-footer {
    font-size: 21px;
  }
  .footer {
    margin-bottom: 30px;
    margin-left: -80px;
    position: fixed;
    bottom: 0;
    width: 100%;
    color: rgb(15, 15, 15);
    text-align: center;
    display: none;
  }

/* On print */
  @media print
  {
    .hidden, .hidden *
    {
        display: none !important;
    }
    .scan-me {
      margin-left: 18%;
      font-size: 15px;
    }
  
    .qr-frame {
      width: 195px;
      margin-left: -10px!important;
      margin-top: 13px;
    }
    .qr-image{
      width: 173px;
      margin-left: 2px;
      margin-top: 7px;
      margin-right: 7px;
    }
    .card
    { 
      box-shadow: 0 0px 0px 0 rgba(255, 255, 255);
      border-right: 0px solid #ffffff;
      border-top-right-radius: 0px;
      border-bottom-right-radius: 0px; 
    }
    .patient-info {
      font-weight: bold;
      font-size: 20px;
      margin-top: 5px!important;
    }
    .column-15 {
      width: 18%;
    }
    .column-85 {
      width: 82%;
    }

    #table {
      margin-left: -10px!important;
    }
    .footer {
      margin-bottom: 30px;
      margin-left: -80px;
      position: fixed;
      bottom: 0;
      width: 100%;
      color: rgb(15, 15, 15);
      text-align: center;
      display: inline;
    }
    .footer-hide {
      display: none;
    }
  }
</style>