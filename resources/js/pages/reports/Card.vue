<template>
    <div>
      <div class="row">
        <div class="column-100">
          <div class="card">
            <div class="row">
              <Button icon="pi pi-fw pi-times" class="btn-right hidden p-button-sm p-button-danger p-mr-2" label="Cancel" @click="cancel()" />
              <Button icon="pi pi-fw pi-print" class="btn-right hidden p-button-sm p-button-primary p-mr-2" label="Print" @click="print()" />
            </div>
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
              <div class="column-33">
                <label class="text-bold">{{registration.last_name}}</label>
              </div>
              <div class="column-33">
                <label class="text-bold"> {{registration.first_name}}</label>
              </div>
              <div class="column-33">
                <label class="text-bold">{{registration.middle_name}}</label>
              </div>
            </div>

            <div class="row">
              <div class="column-33">
                Surname
              </div>
              <div class="column-33">
                First Name
              </div>
              <div class="column-33">
                Last Name
              </div>
            </div>

            <br>
            <div class="row">
              <div class="column-66">
                Address: <label class="text-bold">{{registration.barangay}}, {{registration.townCity}} {{registration.province}}</label>
              </div>
              <div class="column-33">
                Contact No.: <label class="text-bold">{{registration.contact_no}}</label>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="column-33">
                Date Of Birth: <label class="text-bold">{{registration.birthdate}}</label>
              </div>
              <div class="column-33">
                PhilHealth No.: <label class="text-bold">{{registration.philhealth}}</label>
              </div>
              <div class="column-33">
                Category: <label class="text-bold">{{registration.priority_group}}</label>
              </div>
            </div>

            <br>
            <div class="row">
              <table id="table">
                <tr>
                  <th>Dosage Seq.</th>
                  <th>Date</th>
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
                  <td class="text-center text-bold" rowspan="2">{{second_dose}}</td>
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
                Health Facility Name: ____________________________________________________
              </div>
              <div class="column-33">
                Contact No. _________________________
              </div>
            </div>
          </div>
          
        </div>
        <span class="vertical-line"><img src="img/card/fb.png" alt="image" class="icon" /> OfficialDOHgov <img src="img/card/twitter.png" alt="image" class="icon" /> DOHgovph <img src="img/card/web.png" alt="image" class="icon" /> doh.gov.ph <img src="img/card/phone.png" alt="image" class="icon" /> (632) 8561 - 7800 loc. 1936 <img src="img/card/email.png" alt="image" class="icon" /> covid19ceir@doh.gov.ph</span>
      </div>
    </div>
</template>

<script>
import Menubar from 'primevue/menubar/sfc';
import Button from 'primevue/button/sfc';

import { registration } from '../../stores/registrations.js'
import { useStore } from 'vuex'
import { useForm } from 'vee-validate'
import { useRoute } from 'vue-router'
import { watch } from 'vue'

export default {
    setup() {

        const route = useRoute()
        const { params } = route
        const registrationId = params.qr || null
        const store = useStore()
        const { state, dispatch } = store

        const init = {
            initialValues: {
                registration: {...registration}
            }
        }

        const { setValues } = useForm(init);

        watch(
            () => state.certificates.registration,
            (data, prevData) => {
                setValues({
                    registration: {...data}
                })
            }
        )

       dispatch('certificates/GET_REGISTRATION', { id: registrationId })

    },
    data() {
        return {
            home: {icon: 'pi pi-home', to: '/list/certificate'},
            items: [{label: 'Certificate', to: `${this.$route.fullPath}`}]
        }
    },
    components: {
        Menubar,
        Button
    },
    computed: {
        registration() {
            return this.$store.state.certificates.registration
        },
        first_dosage() {
            return this.$store.state.certificates.first_dosage
        },
        second_dosage() {
            return this.$store.state.certificates.second_dosage
        },
        first_facility( ){
            return this.$store.state.certificates.first_facility
        },
        second_facility() {
            return this.$store.state.certificates.second_facility
        },
        first_dose() {
            return this.$store.state.certificates.first_dose
        },
        second_dose() {
            return this.$store.state.certificates.second_dose
        }
    },
    methods: {
        print() {

          window.print();

        },
        cancel() {

          this.$router.push('/reports/list/card')
            
        }
    },
    mounted() {

    }
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
  font-size: 16px;
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

/* On print */
@media print
{    
  .hidden, .hidden *
  {
      display: none !important;
  }
}
</style>