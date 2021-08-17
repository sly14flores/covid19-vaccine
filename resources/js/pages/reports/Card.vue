<template>
    <div>
      <div class="row">
        <div class="column-100">
          <div class="row">
            <Button icon="pi pi-fw pi-times" class="btn-right hidden p-button-sm p-button-danger p-mr-2" label="Cancel" @click="cancel()" />
            <Button icon="pi pi-fw pi-print" class="btn-right hidden p-button-sm p-button-primary p-mr-2" label="Print" @click="print()" />
          </div>
          <br />
          <div class="card">
            <h2 style="margin-top: 5px;">
                COVID-19 Vaccination Card
                <img class="logos" src="img/card/logos/logo.png" alt="logo">
                <img class="logos" src="img/card/logos/launion-logo.png" alt="logo">
                <img class="logos" src="img/card/logos/doh.png" alt="logo">
                <img class="logos" src="img/card/logos/iatf.png" alt="logo">
                <img class="logos" src="img/card/logos/ntf.png" alt="logo">
            </h2>
            <br/>
            <div class="line-4"></div>
            <div class="row line-3">
              <div class="column-70">
                <p>Please keep this card, which includes medical <br> information about the vaccines you have received</p>
              </div>
              <div class="column-30">
                <h4></h4>
              </div>
            </div>

            <br>
            <div class="line-2 row">
              <div class="column-25">
                <label class="text-bold p-text-uppercase">{{personalInfo.last_name}}</label>
              </div>
              <div class="column-25">
                <label class="text-bold p-text-uppercase"> {{personalInfo.first_name}}</label>
              </div>
              <div class="column-25">
                <label class="text-bold p-text-uppercase">{{personalInfo.middle_name}}</label>
              </div>
              <div class="column-25">
                <label class="text-bold p-text-uppercase">{{personalInfo.suffix}}</label>
              </div>
            </div>

            <div class="row">
              <div class="column-25">
                Surname
              </div>
              <div class="column-25">
                First Name
              </div>
              <div class="column-25">
                Middle Name
              </div>
              <div class="column-25">
                Suffix
              </div>
            </div>

            <br>
            <div class="row">
              <div class="column-66">
                Address: <label class="text-bold text-underline">{{personalInfo.barangay}}, {{personalInfo.townCity}} {{personalInfo.province}}</label>
              </div>
              <div class="column-33">
                Contact No.: <label class="text-bold text-underline">{{personalInfo.contact_no}}</label>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="column-33">
                Date Of Birth: <label class="text-bold text-underline">{{personalInfo.birthdate}}</label>
              </div>
              <div class="column-33">
                PhilHealth No.: <label class="text-bold text-underline">{{personalInfo.philhealth}}</label>
              </div>
              <div class="column-33">
                Category: <label class="text-bold text-underline">{{personalInfo.priority_group}}</label>
              </div>
            </div>

            <br>
            <div class="row">
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
                  <td colspan="2">Vaccinator Name: <span class="text-bold">{{first_dosage.vaccinator}}</span></td>
                  <td colspan="2">Signature: </td>
                </tr>
                <tr>
                  <td class="text-center text-bold" rowspan="2">{{first_dose}} <br/><small>(Schedule {{second_dosage.date_of_vaccination}})</small></td>
                  <td class="text-center text-bold">{{second_dosage.date_of_vaccination}}</td>
                  <td class="text-center text-bold">{{second_dosage.brand_description}}</td>
                  <td class="text-center text-bold">{{second_dosage.batch_number}}</td>
                  <td class="text-center text-bold">{{second_dosage.lot_number}}</td>
                </tr>
                <tr>
                  <td colspan="2">Vaccinator Name: <span class="text-bold">{{second_dosage.vaccinator}}</span></td>
                  <td colspan="2">Signature: </td>
                </tr>
              </table>
            </div>
            <br>
            <div class="row">
              <div class="column-66">
                Health Facility Name: <label class="text-bold text-underline">{{first_facility}}</label>
              </div>
              <div class="column-33">
                Contact No. <label class="text-bold text-underline">(072) 607-2633</label>
              </div>
            </div>
            <br/>
          </div>
          
        </div>
        <span class="vertical-line"><img src="img/card/fb.png" alt="image" class="icon" /> OfficialDOHgov <img src="img/card/twitter.png" alt="image" class="icon" /> DOHgovph <img src="img/card/web.png" alt="image" class="icon" /> doh.gov.ph <img src="img/card/phone.png" alt="image" class="icon" /> (632) 8561 - 7800 loc. 1936 <img src="img/card/email.png" alt="image" class="icon" /> covid19ceir@doh.gov.ph</span>
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
            toggle_second_dose: true
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

            Object.assign(state, {
                ...state,
                personalInfo: data,
                dosages: dosages,
                first_dosage: dosages[0],
                first_facility: state.first_facility,
                second_dosage: state.second_dosage,
                second_facility: state.second_facility,
                toggle_second_dose: state.toggle_second_dose
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
/* Card */
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  padding: 16px;
  font-family: Arial, Helvetica, sans-serif;
  background-color: #f1f1f1;
  float: left;
  width: 100%;
  padding: 0 10px;
  border-right: 35px solid rgb(61, 61, 61);
  border-top-right-radius: 15px;
  border-bottom-right-radius: 15px;
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
.row:after {
  content: "";
  display: table;
  clear: both;
}
/* Columns */
.column-30 {
  float: right;
  width: 30%;
}
.column-25 {
  float: left;
  width: 25%;
}
.column-33 {
  float: left;
  width: 33%;
}
.column-66 {
  float: left;
  width: 66%;
}
.column-70 {
  float: left;
  width: 70%;
}
.column-80 {
  width: 80%;
}

.column-100 {
  width: 100%;
}

/* Table */
#table {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
  border-radius: 10px;
}
#table td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}
#table tr:nth-child(even){background-color: #f2f2f2;}
#table tr:hover {background-color: #ddd;}
#table th {
  padding-top: 12px;
  padding-bottom: 12px;
  background-color: #2c2c2c;
  color: white;
  text-align: center;
}

/* Others */
.vertical-line {
  writing-mode: vertical-rl;
  transform: rotate(180deg);
  color: white;
  font-size: 9.5px;
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
  float: right; 
  margin-right: 5px;
}
.btn-right {
  float: right;
}
.text-underline {
  text-decoration: underline;
}

/* On print */
@media print
{    
  .hidden, .hidden *
  {
      display: none !important;
  }
}
</style>