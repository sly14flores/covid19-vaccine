<template>
    <div>
      <div class="row">
        <div class="column-100">
          <div class="row btn-hide">
            <Button icon="pi pi-fw pi-times" class="btn-right p-button-sm p-button-danger p-mr-2" label="Cancel" @click="cancel()" />
            <Button icon="pi pi-fw pi-print" class="btn-right p-button-sm p-button-primary p-mr-2" label="Print" @click="print()" />
          </div>
          <br class="btn-hide"/>
          <div class="card">
            <div class="row">

                <div class="column-75 hidden">
                    <div class="row line-4">
                      <h2 class="p-text-bold covid-header">CoViD-19 Vaccination Card</h2>
                    </div>
                    <div class="row">
                      <div class=" column-85">
                        <div class="covid-logos">
                          <img class="logos" src="img/card/logos/ntf.png" alt="logo">
                          <img class="logos" src="img/card/logos/iatf.png" alt="logo">
                          <img class="logos" src="img/card/logos/doh.png" alt="logo">
                          <img class="logos" src="img/card/logos/launion-logo.png" alt="logo">
                          <img class="logos" src="img/card/logos/logo.png" alt="logo">
                        </div>
                      </div>
                    </div>
                </div>

                <div class="column-25">
                    <span class="scan-me">Scan Me!</span>
                   <h1 class="text-center qr-frame">
                      <img class="qr-image qr-body" v-bind:src="qrcode" />
                    </h1>
                </div>
            </div>

            <br />
            <br />
            <br />
            <div class="row names">
              <div class="column-33">
                <label class="text-bold p-text-uppercase text-font-size">{{personalInfo.last_name}}</label>
              </div>
              <div class="column-51">
                <label class="text-bold p-text-uppercase text-font-size"> {{personalInfo.first_name}}</label>
              </div>
              <div class="column-3">
                <label class="text-bold p-text-uppercase text-font-size">{{personalInfo.middle_name}}</label>
              </div>
              <div class="column-right-10">
                <label class="text-bold p-text-uppercase text-font-size">{{personalInfo.suffix}}</label>
              </div>
            </div>

            <div class="row line-2 hidden">
              <div class="column-33">
                Surname
              </div>
              <div class="column-51">
                First Name
              </div>
              <div class="column-3">
                M.I
              </div>
              <div class="column-right-10">
                Suffix
              </div>
            </div>

            <br>
            <div class="row">
              <div class="column-50">
                <label class="hidden">Address: </label><label class="text-bold text-underline">{{personalInfo.barangay}}, {{personalInfo.townCity}} {{personalInfo.province}}</label>
              </div>
              <div class="column-50">
                <label class="hidden">Contact No.: </label><label class="text-bold text-underline">{{personalInfo.contact_no}}</label>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="column-25">
                <label class="hidden">Date Of Birth: </label><label class="text-bold text-underline">{{personalInfo.birthdate}}</label>
              </div>
              <div class="column-25">
                <label class="hidden">PhilHealth No.: </label><label class="text-bold text-underline">{{personalInfo.philhealth}}</label>
              </div>
              <div class="column-50">
                <label class="hidden">Category: </label><label class="text-bold text-underline">{{personalInfo.priority_group}}</label>
              </div>
            </div>

            <br>
            <div class="row hidden">
              <table id="table">
                <tr>
                  <th>Dosage Seq.</th>
                  <th>Date <br/><small>(mm/dd/yyyy)</small></th>
                  <th>Vaccine Manufacturer</th>
                  <th>Batch No.</th>
                  <th>Lot No.</th>
                </tr>
                <tr>
                  <td class="text-center text-bold" rowspan="2" >{{first_dose}}</td>
                  <td class="text-center text-bold">{{first_dosage.date_of_vaccination}}</td>
                  <td class="text-center text-bold">{{first_dosage.brand_description}}</td>
                  <td class="text-center text-bold">{{first_dosage.batch_number}}</td>
                  <td class="text-center text-bold">{{first_dosage.lot_number}}</td>
                </tr>
                <tr>
                  <td colspan="2"><small>Vaccinator Name: </small><br /><p class="text-center"><span class="text-bold">{{first_dosage.vaccinator}}</span></p></td>
                  <td><small>License No.: </small><br /><p class="text-center"><span class="text-bold">123123123</span></p></td>
                  <td><small>Signature: <br /> &nbsp; </small></td>
                </tr>
                <tr>
                  <td class="text-center text-bold" rowspan="2">{{second_dose}} <br/><small>(Schedule {{second_dosage.date_of_vaccination}})</small></td>
                  <td class="text-center text-bold">{{second_dosage.date_of_vaccination}}</td>
                  <td class="text-center text-bold">{{second_dosage.brand_description}}</td>
                  <td class="text-center text-bold">{{second_dosage.batch_number}}</td>
                  <td class="text-center text-bold">{{second_dosage.lot_number}}</td>
                </tr>
                <tr>
                  <td colspan="2"><small>Vaccinator Name: </small><br /><p class="text-center"><span class="text-bold">{{second_dosage.vaccinator}}</span></p></td>
                  <td><small>License No.: </small><br /><p class="text-center"><span class="text-bold">123123123</span></p></td>
                  <td><small>Signature: <br /> &nbsp;  </small></td>
                </tr>
              </table>
            </div>
            <br>
            <div class="row">
              <div class="column-66">
                <label class="hidden">Health Facility Name: </label> <label class="text-bold text-underline">{{first_facility}}</label>
              </div>
              <div class="column-33">
                <label class="hidden">Contact No. </label> <label class="text-bold text-underline">(072) 607-2633</label>
              </div>
            </div>
            <br/>
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
            status: "",
            toggle_second_dose: true,
            qrcode: null,
            url: `${api_url}/profile?/pr/`
        })

        getRegistrationCertificate({ id: registrationId }).then(res => {
            const { data: { data } } = res
            const { dosages } = data

            dosages.sort((a, b) => (a.dose > b.dose) ? 1 : -1)

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

            // First Dose
            const first = new Date(dosages[0].date_of_vaccination);

            const add_zero = first.getMonth() < 9 ? '0': '';
            const month = first.getMonth()+1;
            const first_date_vaccination = `${add_zero+month+'/'+first.getDate()+'/'+first.getFullYear()}`;
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
                const add_zero = second.getMonth() < 9 ? '0': '';
                const month = second.getMonth()+1;
                const second_date_vaccination = `${add_zero+month+'/'+second.getDate()+'/'+second.getFullYear()}`;
                dosages[1].date_of_vaccination = second_date_vaccination;

                state.second_dosage = dosages[1];

                if(dosages[1].user!=null) {
                    state.second_facility = dosages[1].user.user_hospital.description
                }

            }
            
            const pushQrCode = `${"https://api.qrserver.com/v1/create-qr-code/?size=200x200&data="+state.url}`

            const middle_initial = data.middle_name;
            data.middle_name = middle_initial.charAt(0);

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

        console.log(state)

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
.scan-me {
  font-weight: bold;
  font-size: 16px;
  margin-left: 23%;
}
.qr-frame {
  border: 0.25em solid;
  position: absolute;
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
.line-4 {
  border-bottom: 4px solid rgb(45, 45, 45);
}
.line-3 {
  border-bottom: 3px solid rgb(45, 45, 45);
}
.line-2 {
  border-top: 2px solid rgb(45, 45, 45);
  width: 75%;
}
.line-1 {
  border-bottom: 1px solid rgb(45, 45, 45);
}
.row:after {
  content: "";
  display: table;
  clear: both;
}
/* Columns */
.column-right-10 {
  width: 10%;
  float: right;
}
.column-3 {
  width: 3%;
  float: left;
}
.column-12 {
  width: 12%;
  float: left;
}
.column-13 {
  width: 13%;
  float: left;
}
.column-15 {
  width: 15%;
  float: right;
}
.column-20 {
  width: 20%;
  float: right;
}
.column-25 {
  float: left;
  width: 25%;
}
.column-30 {
  float: right;
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
}
.names {
  width: 75%;
}

/* Table */
#table {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
  border-radius: 10px;
}
#table td, #customers th {
  border: .1px solid rgb(108, 108, 108);
  padding: 8px;
}
#table tr:nth-child(even){background-color: #ffffff;}
#table tr:hover {background-color: rgb(255, 255, 255);}
#table th {
  padding-top: 12px;
  padding-bottom: 12px;
  background-color: #1d1d1d;
  color: rgb(255, 255, 255);
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
  font-size: 11.8px;
  margin-left: -2.9%!important;
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
  float: left; 
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
.text-font-size {
  font-size: 16px;
}
.covid-header {
  font-size: 33px;
  margin-left: 30%;
}
.covid-logos {
  margin-left: 45%;
}

/* On print */
@media print
{    
  .btn-hide, .btn-hide *
  {
      display: none !important;
  }
  .scan-me {
    margin-left: 28%;
    font-size: 20px;
  }
  .qr-frame {
    margin-left: 10px;
    margin-top: 9px;
  }
  .covid-header {
    margin-left: 18%;
  }
  .covid-logos {
    margin-left: 35%;
  }
  /* .hidden, .hidden *
  {
      display: none !important;
  }
  .card, .card *
  { 
      box-shadow: 0 0px 0px 0 rgba(255, 255, 255);
      border-right: .1px;
      border-top-right-radius: 15px;
      border-bottom-right-radius: 15px; 
  }*/

  /* .qr-frame {
    margin-top: -50px;
    margin-left: 100px;
  } */

}
</style>