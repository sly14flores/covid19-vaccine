<template>
    <div>
        <MyBreadcrumb :home="home" :items="items" />
        <div class="card p-mt-2">
            <div class="p-grid p-col-12">
                <div class="p-sm-12 p-md-9 p-lg-9">
                    <label class="summary p-ml-2">COVID-19 VACCINATION DASHBOARD</label><br />
                    <label class="as-of p-ml-2"> AS OF {{currentDate()}}</label>
                </div>
                <div class="p-sm-12 p-md-3 p-lg-3">
                    <button  type="button" class="p-mr-2 p-mb-2 p-button p-component p-button-secondary" @click="refresh">
                        <i class="pi pi-refresh icon-size"></i>&nbsp; Refresh
                    </button>
                    <button  type="button" class="p-mr-2 p-mb-2 p-button p-component p-button-success">
                        <i class="pi pi-upload"></i>&nbsp; Export to Excel
                    </button> 
                </div>
            </div>
        </div>
        <div class="card p-mt-1">
            <div class="card">
                <div class=" p-fluid p-grid p-formgrid">
                    <div class="p-field p-col-12 p-md-3">
                        <label for="basic">City/Municipality</label>
                        <Dropdown class="p-shadow-1" :options="groups" optionLabel="name" optionValue="id" />
                    </div>
                    <div class="p-field p-col-12 p-md-3">
                        <label for="basic">Facility Name</label>
                        <Dropdown class="p-shadow-1" :options="groups" optionLabel="name" optionValue="id" />
                    </div>
                    <div class="p-field p-col-12 p-md-6">
                        <label for="basic">Priority Group</label>
                        <Dropdown class="p-shadow-1" :options="groups" optionLabel="name" optionValue="id" />
                    </div>
                    <div class="p-field p-col-12 p-md-3">
                        <label for="basic">Start Date:</label>
                        <Calendar class="p-shadow-1 p-inputtext-sm" id="start_date" v-model="start_date" />
                    </div>
                    <div class="p-field p-col-12 p-md-3">
                        <label for="basic">End Date:</label>
                        <Calendar class="p-shadow-1 p-inputtext-sm" id="end_date" v-model="end_date" />
                    </div>
                    <div class="p-field p-col-12 p-md-1">
                        <label for="basic">&nbsp;</label>
                        <Button label="Go!" @click="fetchSurveys" />
                    </div>
                </div>
            </div>
        </div>

        <div class="card p-mt-1">
            <div class="card">
                <div class="p-fluid p-grid">
                    <div class="p-col-12 p-md-3">
                        <div class="card card-bg-pg p-shadow-2">
                            <div class="p-grid">
                                <div class="p-col-12 p-md-4">
                                    <img src="img/dashboard-icons/total_vaccinated.png" width="100%"/>
                                </div>
                                <div class="p-col-12 p-md-8">
                                    <h6 class="card-text-gray">Total No. Vaccinated</h6>
                                    <h6 class="card-text-red">54,082</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-col-12 p-md-3">
                        <div class="card card-bg-pg p-shadow-2">
                            <div class="p-grid">
                                <div class="p-col-12 p-md-4">
                                    <img src="img/dashboard-icons/vaccinated_dose_1.png" width="100%"/>
                                </div>
                                <div class="p-col-12 p-md-8">
                                    <h6 class="card-text-gray">Vaccinated (DOSE 1)</h6>
                                    <h6 class="card-text-red">54,082</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-col-12 p-md-3">
                        <div class="card card-bg-pg p-shadow-2">
                            <div class="p-grid">
                                <div class="p-col-12 p-md-4">
                                    <img src="img/dashboard-icons/vaccinated_dose_1.png" width="100%"/>
                                </div>
                                <div class="p-col-12 p-md-8">
                                    <h6 class="card-text-gray">Vaccinated (DOSE 2)</h6>
                                    <h6 class="card-text-red">54,082</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-col-12 p-md-3">
                        <div class="card card-bg-pg p-shadow-2">
                            <div class="p-grid">
                                <div class="p-col-12 p-md-4">
                                    <img src="img/dashboard-icons/complete_immunization.png" width="100%"/>
                                </div>
                                <div class="p-col-12 p-md-8">
                                    <h6 class="card-text-gray">Complete Immunization</h6>
                                    <h6 class="card-text-red">54,082</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="p-fluid p-grid">
                    <div class="p-col-12 p-md-4">
                        <div class="card">
                            <div class="p-grid">
                                <div class="p-col-12 p-md-4">
                                    <img src="img/dashboard-icons/health_workers.png" width="60%"/>
                                </div>
                                <div class="p-col-12 p-md-8">
                                    <h6 class="card-text-gray">Health Workers</h6>
                                    <h6 class="card-text-brown">54,082</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-col-12 p-md-4">
                        <div class="card">
                            <div class="p-grid">
                                <div class="p-col-12 p-md-4">
                                    <img src="img/dashboard-icons/poor_population.png" width="60%"/>
                                </div>
                                <div class="p-col-12 p-md-8">
                                    <h6 class="card-text-gray">Poor Population</h6>
                                    <h6 class="card-text-brown">54,082</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-col-12 p-md-4">
                        <div class="card">
                            <div class="p-grid">
                                <div class="p-col-12 p-md-4">
                                    <img src="img/dashboard-icons/socio_demographic_group.png" width="60%"/>
                                </div>
                                <div class="p-col-12 p-md-8">
                                    <h6 class="card-text-gray">Socio-Demographic Groups</h6>
                                    <h6 class="card-text-brown">54,082</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="p-fluid p-grid">
                    <div class="p-col-12 p-md-4">
                        <div class="card">
                            <div class="p-grid">
                                <div class="p-col-12 p-md-4">
                                    <img src="img/dashboard-icons/senior_citizen.png" width="60%"/>
                                </div>
                                <div class="p-col-12 p-md-8">
                                    <h6 class="card-text-gray">Senior Citizen</h6>
                                    <h6 class="card-text-brown">54,082</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-col-12 p-md-4">
                        <div class="card">
                            <div class="p-grid">
                                <div class="p-col-12 p-md-4">
                                    <img src="img/dashboard-icons/teacher.png" width="60%"/>
                                </div>
                                <div class="p-col-12 p-md-8">
                                    <h6 class="card-text-gray">Teacher</h6>
                                    <h6 class="card-text-brown">54,082</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-col-12 p-md-4">
                        <div class="card">
                            <div class="p-grid">
                                <div class="p-col-12 p-md-4">
                                    <img src="img/dashboard-icons/ofw.png" width="60%"/>
                                </div>
                                <div class="p-col-12 p-md-8">
                                    <h6 class="card-text-gray">Socio-Demographic Groups</h6>
                                    <h6 class="card-text-brown">54,082</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="p-fluid p-grid">
                    <div class="p-col-12 p-md-4">
                        <div class="card">
                            <div class="p-grid">
                                <div class="p-col-12 p-md-4">
                                    <img src="img/dashboard-icons/adult_with_comorbidity.png" width="60%"/>
                                </div>
                                <div class="p-col-12 p-md-8">
                                    <h6 class="card-text-gray">Adult With Comorbidity</h6>
                                    <h6 class="card-text-brown">54,082</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-col-12 p-md-4">
                        <div class="card">
                            <div class="p-grid">
                                <div class="p-col-12 p-md-4">
                                    <img src="img/dashboard-icons/government.png" width="60%"/>
                                </div>
                                <div class="p-col-12 p-md-8">
                                    <h6 class="card-text-gray">Other Government Workers</h6>
                                    <h6 class="card-text-brown">54,082</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-col-12 p-md-4">
                        <div class="card">
                            <div class="p-grid">
                                <div class="p-col-12 p-md-4">
                                    <img src="img/dashboard-icons/other_remaining_workforce.png" width="60%"/>
                                </div>
                                <div class="p-col-12 p-md-8">
                                    <h6 class="card-text-gray">Other Remaining Workforce</h6>
                                    <h6 class="card-text-brown">54,082</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="p-fluid p-grid">
                    <div class="p-col-12 p-md-4">
                        <div class="card">
                            <div class="p-grid">
                                <div class="p-col-12 p-md-4">
                                    <img src="img/dashboard-icons/frontliner_personnel.png" width="60%"/>
                                </div>
                                <div class="p-col-12 p-md-8">
                                    <h6 class="card-text-gray">Frontline Personnel in Essential Sector</h6>
                                    <h6 class="card-text-brown">54,082</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-col-12 p-md-4">
                        <div class="card">
                            <div class="p-grid">
                                <div class="p-col-12 p-md-4">
                                    <img src="img/dashboard-icons/other_essential_workers.png" width="60%"/>
                                </div>
                                <div class="p-col-12 p-md-8">
                                    <h6 class="card-text-gray">Other Essential Workers</h6>
                                    <h6 class="card-text-brown">54,082</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-col-12 p-md-4">
                        <div class="card">
                            <div class="p-grid">
                                <div class="p-col-12 p-md-4">
                                    <img src="img/dashboard-icons/rest_of_the_population.png" width="60%"/>
                                </div>
                                <div class="p-col-12 p-md-8">
                                    <h6 class="card-text-gray">Rest of the Population</h6>
                                    <h6 class="card-text-brown">54,082</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="p-fluid p-grid">
                    <div class="p-col-12 p-md-4">
                        <div class="card card-bg-pg p-shadow-2">
                            <div class="p-grid">
                                <div class="p-col-12 p-md-4">
                                    <img src="img/dashboard-icons/eligible.png" width="70%"/>
                                </div>
                                <div class="p-col-12 p-md-8">
                                    <h6 class="card-text-gray">Number of Individual (Eligible) </h6>
                                    <h6 class="card-text-brown">54,082</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-col-12 p-md-4">
                        <div class="card card-bg-pg p-shadow-2">
                            <div class="p-grid">
                                <div class="p-col-12 p-md-4">
                                    <img src="img/dashboard-icons/waiting_list.png" width="70%"/>
                                </div>
                                <div class="p-col-12 p-md-8">
                                    <h6 class="card-text-gray">Waiting List (Willing to be Vaccinated)</h6>
                                    <h6 class="card-text-brown">54,082</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-col-12 p-md-4">
                        <div class="card card-bg-pg p-shadow-2">
                            <div class="p-grid">
                                <div class="p-col-12 p-md-4">
                                    <img src="img/dashboard-icons/percentage.png" width="70%"/>
                                </div>
                                <div class="p-col-12 p-md-8">
                                    <h6 class="card-text-gray">Percentage (Immunized/Total Eligible)</h6>
                                    <h6 class="card-text-brown">54,082</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="p-grid header-text">
                    <div class="p-col-12 p-md-2"></div>
                    <div class="p-col-12 p-md-8">
                        COVID-19 VACCINE ADMINISTERED
                    </div>
                    <div class="p-col-12 p-md-2"></div>
                </div>
                <Panel header="Total Doses (by vaccination site)">
                    <div class="p-grid">
                        <div class="p-col-12 p-md-12">
                            <DataTable :value="registrations">
                                <Column field="facility_name" header="Facility Name" sortable="true"></Column>
                                <Column field="first_name" header="Health Workers (A1)" sortable="true"></Column>
                                <Column field="" header="Health Workers (A2)" sortable="true"></Column>
                                <Column field="" header="Adult with Comorbidity (A3)" sortable="true"></Column>
                                <Column field="" header="Frontliner Personnel in Essential Sector (A4)" sortable="true"></Column>
                            </DataTable>
                        </div>
                    </div>
                </Panel>

                <Panel header="Total Number of Vaccine Used (per vaccine type)">
                    <div class="p-grid">
                        <div class="p-col-12 p-md-12">
                            <DataTable :value="registrations">
                                <Column field="facility_name" header="Facility Name"></Column>
                                <Column field="first_name" header="Oxford Astrazenica"></Column>
                                <Column field="" header="Pfizer-BioNTech"></Column>
                                <Column field="" header="Sinovac CoronaVac"></Column>
                                <Column field="" header="Novavax"></Column>
                                <Column field="" header="Moderna"></Column>
                                <Column field="" header="Janssen"></Column>
                                <Column field="" header="Gamaleya Sputnik V"></Column>
                                <Column field="" header="Bharat BioTech"></Column>
                                <Column field="" header="Total # of Vaccine Used"></Column>
                            </DataTable>
                        </div>
                    </div>
                </Panel>
                
            </div>
        </div>

    </div>
</template>

<script>
import MyBreadcrumb from '../../components/MyBreadcrumb.vue';
import DataTable from 'primevue/datatable/sfc';
import Column from 'primevue/column/sfc';
import ColumnGroup from 'primevue/columngroup/sfc';
import Panel from 'primevue/panel/sfc';
import Button from 'primevue/button/sfc';
import Paginator from 'primevue/paginator/sfc';
import Chart from 'primevue/chart/sfc';
import Calendar from 'primevue/calendar/sfc';
import Dropdown from 'primevue/dropdown/sfc';

import store from '../../store.js'

export default {
    setup() {

        const { dispatch } = store

        dispatch('AUTHENTICATE')

    },    
    components: {
        MyBreadcrumb,
        DataTable,
        Column,
        Paginator,
        ColumnGroup,
        Panel,
        Button,
        Chart,
        Calendar,
        Dropdown
    },
    data() {
        return {
            home: {icon: 'pi pi-home', to: '/summary/registrations'},
            items: [{label: 'Registrations', to: '/summary/registrations'}],
            start_date: null,
            end_date: new Date()
        }
    },
    computed: {
        registrations() {
            return this.$store.state.registrations.registrations
        },
        pagination(){
            return this.$store.state.registrations.pagination
        }
    },
   methods: {
        currentDate() {
            
            const month_names = ["JANUARY", "FEBRUARY", "MARCH", "APRIL", "MAY", "JUNE",
            "JULY", "AUGUST", "SEPTEMBER", "OCTOBER", "NOVEMBER", "DECEMBER"
            ];

            const current = new Date();

            const date = month_names[current.getMonth()]+' '+current.getDate()+', '+current.getFullYear();
            const dateNow = date;
            
            return dateNow;
        },
        refresh() {
            
            this.fetchSurveys()

        },
    },
    created() {
        
        const date = new Date()
        date.setDate(1)

        this.start_date = date

    },
}
</script>

<style scoped>
    .summary {
        color: #215266;
        font-weight: bold;
        font-size: 20px;
    }
    .header-text {
        color: #7c7c7c;
        font-weight: bold;
        font-size: 30px;
        text-align: center;
    }
    .card-bg-pg {
        background-color: #fff4dc;
    }
    .card-text-gray {
        color: #7c7c7c;
        font-weight: bold;
        font-size: 12px;
    }
    .card-text-red {
        color: #92362f;
        font-weight: bold;
        font-size: 17px;
    }
    .card-text-brown {
        color: #926C2F;
        font-weight: bold;
        font-size: 17px;
    }
    .as-of {
        color: #926C2F;
        font-weight: bold;
        font-size: 17px;
    }
    .title {
        color: #215266;
    }
    .detail {
        color: #926C2F!important;
    }
    .total-number {
        color: #b52d2f!important;
        font-weight: bold;
    }
    .border-line {
        border: 1px solid #5c5c5c!important;
    }
    .border-right {
        border-right: 1px solid #5c5c5c!important;
    }
    .icon-size{
        height: 18px;
    }
    .float-right{
        margin-left: 50%;
    }
</style>