<template>
    <div>
        <Toast class="p-mt-6" position="top-right" />
        <MyBreadcrumb :home="home" :items="items" class="hidden"/>
        <div class="row">
            <div class="column">
                <div class="card">
                  <div class="row">
                    <Button icon="pi pi-fw pi-times" class="btn-right hidden p-button-sm p-button-danger p-mr-2" label="Cancel" @click="cancel()" />
                    <Button icon="pi pi-fw pi-print" class="btn-right hidden p-button-sm p-button-primary p-mr-2" label="Print" @click="print()" />
                  </div>
                  <div class="main">
                    <img class="logo" src="https://launion.gov.ph/wp-content/uploads/2017/10/pglu-logo.png" >
                    <h2 class="text-center">Covid-19 Vaccination <br>  Certificate</h2> <br>
                    <p class="text-center">This serves as proof that the vaccine whose made name and <br> details appear herein below has been vaccinated against of Covid-19.</p> <br>
                  </div>
                  <br class="hidden" />
                  <div class="text-body">
                    <div class="title">Vaccinee Details</div>
                    <div class="row">
                        <div class="column-75">
                        <p label class="text-bold">{{registration.first_name}} {{registration.last_name}}</p>
                        <p label class="text-bold">{{registration.birthdate}}</p>
                        <p label class="text-bold">{{registration.gender}}</p>
                        <p label class="text-bold">{{registration.barangay}}, {{registration.townCity}}{{registration.province}}</p>
                        </div>
                        <div class="column-25">
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
                        <div class="column-75">
                        <p class="text-bold">{{first_dosage.vaccine_description}}</p>
                        <p class="text-bold">{{first_dose}}</p>
                        <p class="text-bold">{{first_dosage.date_of_vaccination}}</p>
                        <p class="text-bold">{{first_facility.description}}</p>
                        <p class="text-bold">{{first_dosage.lot_number}}</p>
                        </div>
                        <div class="column-25">
                        <p>Vaccine Brand:</p>
                        <p>Dose: </p>
                        <p>Vaccination Date: </p>
                        <p>Vaccination Site:</p>
                        <p>Lot Number: </p>
                        </div>
                    </div>
                    <!-- <hr>
                    <div class="row">
                        <div class="column-75">
                        <p class="text-bold">{{second_dose}}</p>
                        <p class="text-bold">&nbsp;{{second_dosage.date_of_vaccination}}</p>
                        <p class="text-bold">&nbsp;{{second_facility.description}}</p>
                        <p class="text-bold">&nbsp;{{second_dosage.lot_number}}</p>
                        </div>
                        <div class="column-25">
                        <p>Dose: </p>
                        <p>Vaccination Date: </p>
                        <p>Vaccination Site:</p>
                        <p>Lot Number: </p>
                        </div>
                    </div> -->
                </div>
                <br />
                  <!-- <div class="row">
                      <div class="qr-code">
                        <p>Scan QR Code to validate authenticity</p>
                        <p>The QR Code should be directed to https://vaccines.launion.gov.ph.</p>
                      </div>
                      <div class="qr-code-img">
                        <img src="img/qr.png" className="qr-image" />
                      </div>
                  </div> -->
                    <div class="row">
                        <div class="column">
                          <p class="text-center">This computer-generated document is issued by the Provincial Government of La Union, <br />through the Provincial Health Office. All data made available through <br /> https://vaccines.launion.gov.ph is verified and encrypted</p> <br/>
                          <p class="text-center">Powered by Provincial Government of La Union - Information Communications and Technology Unit</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="column">
                          <p class="text-center">For any clarification, you may reach us thru email, pglupho.vax@gmail.com or <br /> telephone number (072) 242-5580 local 258</p>
                        </div>
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

import { registration } from '../../stores/registrations.js'
import { useStore } from 'vuex'
import { useForm, useField } from 'vee-validate'
import { useRoute } from 'vue-router'
import { watch } from 'vue'
import { useConfirm } from "primevue/useconfirm"

import Toast from 'primevue/toast';
import { useToast } from "primevue/usetoast"

export default {
    props: ['editOn'],
    setup(props) {

        const toast = useToast()
        const { editOn } = props
        const editMode = eval(editOn)
        const route = useRoute()
        const { params } = route
        const registrationId = params.qr || null
        const store = useStore()
        const { state, dispatch } = store
        const confirm = useConfirm()

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
        Toast
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

          this.$router.push('/reports/list/certificate')
            
        }
    },
    mounted() {

    }
}
</script>

<style scoped>
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
  width: 70%;
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
  font-size: 17px;
}

.header {
  width: 10em;
  margin-left: 10%;
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
  
.qr-image{
    width: 150px;
    margin-top: 5px;
}

.btn-right {
  float: right;
}

@media print
{    
    .hidden, .hidden *
    {
        display: none !important;
    }
    .main, .main *
    {
        margin-top: -10px;
    }
}
</style>