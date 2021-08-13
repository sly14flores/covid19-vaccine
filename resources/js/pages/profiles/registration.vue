<template>
    <Toast class="p-mt-6" position="top-right" />
    <div class="remove-x-bar">
        <div class="navbar">
            <a href=""><img alt="logo" src="img/launion-logo.png" class="lu-logo" /></a>
            <h5 class="p-mt-3 p-label-white">La Union CoViD-19 Vaccination</h5>
        </div>
        <form>
          <div class="p-grid p-jc-center p-mt-4">
              <div class="p-lg-10 p-sm-12 p-xs-12">
                  <div class="card p-fluid p-border-top">
                      <h4> Vaccinee Details</h4>
                      <hr />
                      <div class="p-grid">
                          <div class="p-field p-col-6 p-md-3">
                              <label for="description">Napanam QR ID </label>
                              <p class="p-text-bold">{{registration.qr_pass_id}}</p>
                          </div>
                      </div>
                      <div class="p-grid">
                          <div class="p-field p-col-6 p-md-3">
                              <label for="description">Surname </label>
                              <p class="p-text-bold p-text-uppercase">{{registration.last_name}}</p>
                          </div>
                          <div class="p-field p-col-6 p-md-3">
                              <label for="description">First Name </label>
                              <p class="p-text-bold p-text-uppercase">{{registration.first_name}}</p>
                          </div>
                          <div class="p-field p-col-6 p-md-3">
                              <label for="description">Middle Name </label>
                              <p class="p-text-bold p-text-uppercase">{{registration.middle_name}}</p>
                          </div>
                          <div class="p-field p-col-6 p-md-3">
                              <label for="description">Suffix</label>
                              <p class="p-text-bold p-text-uppercase">{{registration.suffix}}</p>
                          </div>
                      </div>

                      <div class="p-grid">
                          <div class="p-field p-col-6 p-md-3">
                              <label for="description">Date of Birth </label>
                              <p class="p-text-bold">{{registration.birthdate}}</p>
                          </div>
                          <div class="p-field p-col-6 p-md-3">
                              <label for="description">Philhealth </label>
                              <p class="p-text-bold">{{registration.philhealth}}</p>
                          </div>
                          <div class="p-field p-col-6 p-md-3">
                              <label for="description">Category </label>
                              <p class="p-text-bold">{{registration.priority_group}}</p>
                          </div>
                          <div class="p-field p-col-6 p-md-3">
                              <label for="description">Contact No. </label>
                              <p class="p-text-bold">{{registration.contact_no}}</p>
                          </div>
                      </div>
                      <div class="p-grid">
                          <div class="p-field p-col-12 p-md-9">
                              <label for="description">Address <small>(Barangay/Municipality/Province</small></label>
                              <p class="p-text-bold p-text-uppercase">{{registration.barangay}} {{registration.townCity}},{{registration.province}}</p>
                          </div>
                          <div class="p-field p-col-6 p-md-3">
                              <label for="description">Status</label>
                              <p class="p-text-bold"><i class="pi pi-check-circle p-text-success" v-if="toggle_second_dose"></i> {{status}}</p>
                          </div>
                      </div>
                  </div>
                
                  <div class="card p-fluid p-border-top">
                    <h4>Vaccination</h4> <hr />
                    <div class="row">
                      <div class="col-md-12">
                        <div id="content" class="content content-full-width">
                            <div class="profile-content">
                              <div class="tab-content p-0">
                                <div class="tab-pane fade active show" id="profile-post">
                                  <ul class="timeline">
                                    
                                    <!-- 1st dose  -->
                                    <li>
                                      <div class="timeline-time">
                                          <span class="date">{{first_dosage.date_of_vaccination}}</span>
                                          <span class="time">{{first_dosage.time_of_vaccination}}</span>
                                      </div>
                                      <div class="timeline-icon">
                                          <a href="javascript:;">&nbsp;</a>
                                      </div>
                                      <div class="timeline-body">
                                        <div class="timeline-header">
                                          <span class="userimage"><img src="img/icons/check-icon.png" alt=""></span>
                                          <span class="username"><a href="javascript:;">1st Dose</a> <small></small></span>
                                        </div>
                                        <div class="timeline-content">
                                          <div class="p-grid">
                                              <div class="p-field p-col-12 p-md-4">
                                                  <label>Vaccine Manufacturer </label>
                                                  <p class="p-text-value p-text-bold">{{first_dosage.brand_name}}</p>
                                              </div>
                                              <div class="p-field p-col-6 p-md-4">
                                                  <label>Vaccine Name </label>
                                                  <p class="p-text-value p-text-bold">{{first_dosage.vaccine_name}}</p>
                                              </div>
                                              <div class="p-field p-col-6 p-md-4">
                                                  <label>Facility</label>
                                                  <p class="p-text-value p-text-bold">{{registration.first_facility}}</p>
                                              </div>
                                          </div>
                                          <div class="p-grid">
                                              <div class="p-field p-col-6 p-md-4">
                                                  <label>Batch Number </label>
                                                  <p class="p-text-value p-text-bold">{{first_dosage.batch_number}}</p>
                                              </div>
                                              <div class="p-field p-col-6 p-md-4">
                                                  <label>Lot Number </label>
                                                  <p class="p-text-value p-text-bold">{{first_dosage.lot_number}}</p>
                                              </div>
                                              <div class="p-field p-col-6 p-md-4">
                                                  <label>Vaccinator </label>
                                                  <p class="p-text-value p-text-bold">{{first_dosage.vaccinator}}</p>
                                              </div>
                                          </div>
                                        </div>
                                      </div>
                                    </li>

                                    <!-- 2nd dose -->
                                    <li v-if="toggle_second_dose">
                                      <div class="timeline-time">
                                          <span class="date">{{second_dosage.date_of_vaccination}}</span>
                                          <span class="time">{{second_dosage.time_of_vaccination}}</span>
                                      </div>
                                      <div class="timeline-icon">
                                          <a href="javascript:;">&nbsp;</a>
                                      </div>
                                      <div class="timeline-body">
                                        <div class="timeline-header">
                                          <span class="userimage"><img src="img/icons/check.png" alt=""></span>
                                          <span class="username">2nd Dose</span>
                                        </div>
                                        <div class="timeline-content">
                                          <div class="p-grid">
                                              <div class="p-field p-col-12 p-md-4">
                                                  <label>Vaccine Manufacturer </label>
                                                  <p class="p-text-value p-text-bold">{{second_dosage.brand_name}}</p>
                                              </div>
                                              <div class="p-field p-col-6 p-md-4">
                                                  <label>Vaccine Name </label>
                                                  <p class="p-text-value p-text-bold">{{second_dosage.vaccine_name}}</p>
                                              </div>
                                              <div class="p-field p-col-6 p-md-4">
                                                  <label>Facility</label>
                                                  <p class="p-text-value p-text-bold">{{registration.second_facility}}</p>
                                              </div>
                                          </div>
                                          <div class="p-grid">
                                              <div class="p-field p-col-6 p-md-4">
                                                  <label>Batch Number </label>
                                                  <p class="p-text-value p-text-bold">{{second_dosage.batch_number}}</p>
                                              </div>
                                              <div class="p-field p-col-6 p-md-4">
                                                  <label>Lot Number </label>
                                                  <p class="p-text-value p-text-bold">{{second_dosage.lot_number}}</p>
                                              </div>
                                              <div class="p-field p-col-6 p-md-4">
                                                  <label>Vaccinator </label>
                                                  <p class="p-text-value p-text-bold">{{second_dosage.vaccinator}}</p>
                                              </div>
                                          </div>
                                        </div>
                                      </div>
                                    </li>

                                  </ul>
                                </div>
                              </div>
                            </div>
                        </div>
                      </div>
                    </div> <!-- row -->
                    <div class="row">
                        <div class="p-grid p-jc-center">
                          <div class="p-lg-3 p-sm-12 p-xs-12">
                            <Button label="Close" class="p-button-secondary" @click="closeProfile" />
                          </div>
                      </div>
                    </div>
                </div>
              </div>
          </div>
        </form>
    </div>
</template>

<script>

import Button from 'primevue/button/sfc';
import Menubar from 'primevue/menubar/sfc';
import Card from 'primevue/card';

import { useStore } from 'vuex'
import { useRouter } from 'vue-router'

import Toast from 'primevue/toast';
import { useToast } from "primevue/usetoast"

export default {
    setup() {

        const store = useStore()
        const toast = useToast()
        /**
         * Redirection logic using store
         */
        const router = useRouter()

        if (store.state.profiles.registration.qr_pass_id == null) {
            router.push('/verify')
        }

        const init = {
            initialValues: {
                registration: {...store.state.profiles.registration}
            }
        }

        const closeProfile = () =>{

           location.reload();

        }

        return {
          closeProfile
        }

    },
    components: {
        Menubar,
        Button,
        Card,
        Toast
    },
    data() {
        return {
           
        }
    },
    computed: {
        registration() {
            return this.$store.state.profiles.registration
        },
        first_dosage() {
            return this.$store.state.profiles.registration.first_dosage
        },
        second_dosage() {
            return this.$store.state.profiles.registration.second_dosage
        },
        toggle_second_dose() {
            return this.$store.state.profiles.toggle_second_dose
        },
        status() {
            return this.$store.state.profiles.status
        }
    },
    methods: {
        fetchSelections() {
            this.$store.dispatch('profiles/GET_SELECTIONS')
        }
    },
    mounted() {
        // this.fetchSelections()
    }
}
</script>

<style scoped>
  .p-text-success {
    color: #3fd161;
  }
  .remove-x-bar {
    overflow-x: hidden;
  }
  .pull-right {
    float: right;
  }
  .navbar {
      overflow: hidden;
      background-color: #92c1bd;
      position: relative;
      top: 0;
      height: 55px;
      width: 100%;
  }
  .navbar a {
      float: left;
      display: block;
      color: #f2f2f2;
      text-align: center;
      padding: 1px 4px;
      text-decoration: none;
      font-size: 19px;
  }
  .lu-logo {
      height: 50px;
  }
  .rugian {
      width: 200px;
  }
  .p-border-top {
      border-top: 4px solid #92c1bd;
      margin-left: 10px;
      margin-right: 10px;
  }
  .p-border-left {
      border-left: 5px solid #92c1bd;
  }
  .p-border {
      border: 1px solid #92c1bd;
  }
  .menu-bar{
      background-color: #92c1bd;
  }
  .p-label-white {
      color: white;
  }
  input[type="text"]:disabled {
      background: rgb(219, 219, 219);
      border-bottom: 1px solid black;
      cursor: not-allowed; 
  }
  input[type="date"]:disabled, .disabled {
      background: rgb(219, 219, 219);
      border-bottom: 1px solid black;
      cursor: not-allowed; 
  }
  .disabled {
      background: rgb(219, 219, 219);
      border-bottom: 1px solid black;
      cursor: not-allowed; 
  }
  .button-success {
      background-color: #68bca4;
  }
  .button-cancel {
      background-color: #ffab5d;
  }
  .text-gray {
      color: rgb(102, 102, 102);
      font-size: 12px;
  }
  .p-text-value {
    font-size: 14px;
  }

  /* Begin */
  .timeline {
    list-style-type: none;
    margin: 0;
    padding: 0;
    position: relative
  }

  .timeline:before {
    content: '';
    position: absolute;
    top: 5px;
    bottom: 5px;
    width: 5px;
    background: #68bca4;
    left: 20%;
    margin-left: -2.5px
  }

  .timeline>li {
    position: relative;
    min-height: 50px;
    padding: 20px 0
  }

  .timeline .timeline-time {
    position: absolute;
    left: 0;
    width: 18%;
    text-align: right;
    top: 30px
  }

  .timeline .timeline-time .date,
  .timeline .timeline-time .time {
    display: block;
    font-weight: 600
  }

  .timeline .timeline-time .date {
    line-height: 16px;
    font-size: 12px
  }

  .timeline .timeline-time .time {
    line-height: 24px;
    font-size: 20px;
    color: #242a30
  }

  .timeline .timeline-icon {
    left: 15%;
    position: absolute;
    width: 10%;
    text-align: center;
    top: 40px
  }

  .timeline .timeline-icon a {
    text-decoration: none;
    width: 20px;
    height: 20px;
    display: inline-block;
    border-radius: 20px;
    background: #d9e0e7;
    line-height: 10px;
    color: #fff;
    font-size: 14px;
    border: 5px solid #549885;
    transition: border-color .2s linear
  }

  .timeline .timeline-body {
    margin-left: 23%;
    margin-right: 17%;
    background: rgb(245, 245, 245);
    position: relative;
    padding: 20px 25px;
    border-radius: 6px
  }

  @media only screen and (max-width: 600px) {
    .timeline .timeline-body {
      margin-right: 5%;
      margin-left: 26%;
    }
  }

  .timeline .timeline-body:before {
    content: '';
    display: block;
    position: absolute;
    border: 10px solid transparent;
    border-right-color: rgb(245, 245, 245);
    left: -20px;
    top: 20px
  }

  .timeline .timeline-body>div+div {
    margin-top: 15px
  }

  .timeline .timeline-body>div+div:last-child {
    margin-bottom: -20px;
    padding-bottom: 20px;
    border-radius: 0 0 6px 6px
  }

  .timeline-header {
    padding-bottom: 10px;
    border-bottom: 1px solid #e2e7eb;
    line-height: 30px
  }

  .timeline-header .userimage {
    float: left;
    width: 34px;
    height: 34px;
    border-radius: 40px;
    overflow: hidden;
    margin: -2px 10px -2px 0
  }

  .timeline-header .username {
    font-size: 16px;
    font-weight: 600
  }

  .timeline-header .username,
  .timeline-header .username a {
    color: #2d353c
  }

  .timeline img {
    max-width: 100%;
    display: block
  }

  .timeline-content {
    letter-spacing: .25px;
    line-height: 18px;
    font-size: 13px
  }

  .timeline-content:after,
  .timeline-content:before {
    content: '';
    display: table;
    clear: both
  }

  .timeline-title {
    margin-top: 0
  }

  .timeline-footer {
    background: #fff;
    border-top: 1px solid #e2e7ec;
    padding-top: 15px
  }

  .timeline-footer a:not(.btn) {
    color: #575d63
  }

  .timeline-footer a:not(.btn):focus,
  .timeline-footer a:not(.btn):hover {
    color: #2d353c
  }

  .text-danger, .text-red {
    color: #ff5b57!important;
  }
</style>