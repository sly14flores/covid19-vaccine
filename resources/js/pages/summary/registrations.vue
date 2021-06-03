<template>
    <div>
        <MyBreadcrumb :home="home" :items="items" />
        <Toolbar class="p-mb-4">
            <template #left>
                <div class="p-grid p-col-12">
                    <label class="summary p-ml-2">SUMMARY RESPONSE</label><br />
                    <label class="as-of p-ml-2"> AS OF {{currentDate()}}</label>
                </div>
            </template>

            <template #right>
                <Button label="Refresh" icon="pi pi-refresh" class="p-button-primary p-mr-2" @click="refresh"  />
            </template>
        </Toolbar>

        <Toolbar class="p-mb-2">
            <template #left>
                <div class="p-fluid p-grid p-formgrid">
                    <div class="p-field p-col-12 p-md-4">
                        <label for="basic">City/Municipality</label>
                        <Dropdown class="p-shadow-1" optionLabel="name" :options="municipalities" v-model="town_city" optionValue="id" :disabled="!isAdmin" />
                    </div>
                    <div class="p-field p-col-12 p-md-3">
                        <label for="basic">Start Date:</label>
                        <Calendar class="p-shadow-1" id="start_date" v-model="start_date" />
                    </div>
                    <div class="p-field p-col-12 p-md-3">
                        <label for="basic">End Date:</label>
                        <Calendar class="p-shadow-1" id="end_date" v-model="end_date" />
                    </div>
                    <div class="p-field p-col-12 p-md-2">
                        <label for="basic">&nbsp;</label>
                        <Button class="p-button-sm" label="Go!" @click="fetchRegistrations" />
                    </div>
                </div>
            </template>
        </Toolbar>

        <div class="card p-mt-1">
            <div class="card">
                <div class="p-fluid p-grid">
                    <div class="p-col-12 p-md-3">
                        <div class="card card-bg-pg p-shadow-2">
                            <div class="p-grid">
                                <div class="p-col-4 p-sm-4 p-md-4">
                                    <img src="img/dashboard-icons/total_vaccinated.png" class="hundred"/>
                                </div>
                                <div class="p-col-8 p-sm-8 p-md-8">
                                    <h6 class="card-text-gray">Total No. Vaccinated</h6>
                                    <h6 class="card-text-red">{{total_vaccinated}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-col-12 p-md-3">
                        <div class="card card-bg-pg p-shadow-2">
                            <div class="p-grid">
                                <div class="p-col-4 p-sm-4 p-md-4">
                                    <img src="img/dashboard-icons/vaccinated_dose_1.png" class="hundred" />
                                </div>
                                <div class="p-col-8 p-sm-8 p-md-8">
                                    <h6 class="card-text-gray">Vaccinated (DOSE 1)</h6>
                                    <h6 class="card-text-red">{{first_dosage}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                        
                    <div class="p-col-12 p-md-3">
                        <div class="card card-bg-pg p-shadow-2">
                            <div class="p-grid">
                                <div class="p-col-4 p-sm-4 p-md-4">
                                    <img src="img/dashboard-icons/vaccinated_dose_1.png" class="hundred" />
                                </div>
                                <div class="p-col-8 p-sm-8 p-md-8">
                                    <h6 class="card-text-gray">Vaccinated (DOSE 2)</h6>
                                    <h6 class="card-text-red">{{second_dosage}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-col-12 p-md-3">
                        <div class="card card-bg-pg p-shadow-2">
                            <div class="p-grid">
                                <div class="p-col-4 p-sm-4 p-md-4">
                                    <img src="img/dashboard-icons/complete_immunization.png" class="hundred" />
                                </div>
                                <div class="p-col-8 p-sm-8 p-md-8">
                                    <h6 class="card-text-gray">Complete Immunization</h6>
                                    <h6 class="card-text-red">{{complete_immunization_value}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="p-fluid p-grid">
                    <div class="p-col-12 p-md-4">
                        <div class="card card-bg-pg p-shadow-2">
                            <div class="p-grid">
                                <div class="p-col-4 p-sm-4 p-md-4">
                                    <img src="img/dashboard-icons/eligible.png" class="sixty" />
                                </div>
                                <div class="p-col-8 p-sm-8 p-md-8">
                                    <h6 class="card-text-gray">Number of Individual (Eligible) </h6>
                                    <h6 class="card-text-brown">{{individual_eligible_value}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-col-12 p-md-4">
                        <div class="card card-bg-pg p-shadow-2">
                            <div class="p-grid">
                                <div class="p-col-4 p-sm-4 p-md-4">
                                    <img src="img/dashboard-icons/waiting_list.png" class="sixty" />
                                </div>
                                <div class="p-col-8 p-sm-8 p-md-8">
                                    <h6 class="card-text-gray">Waiting List (Willing to be Vaccinated)</h6>
                                    <h6 class="card-text-brown">{{waiting_value}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-col-12 p-md-4">
                        <div class="card card-bg-pg p-shadow-2">
                            <div class="p-grid">
                                <div class="p-col-4 p-sm-4 p-md-4">
                                    <img src="img/dashboard-icons/percentage.png" class="sixty" />
                                </div>
                                <div class="p-col-8 p-sm-8 p-md-8">
                                    <h6 class="card-text-gray">Percentage (Immunized/Total Eligible)</h6>
                                    <h6 class="card-text-brown">{{immunized_vs_eligible_value}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="p-fluid p-grid">
                    <div class="p-col-12 p-md-4">
                        <div class="card p-shadow-1">
                            <div class="p-grid">
                                <div class="p-col-4 p-sm-4 p-md-4">
                                    <img src="img/dashboard-icons/health_workers.png" class="sixty" />
                                </div>
                                <div class="p-col-8 p-sm-8 p-md-8">
                                    <h6 class="card-text-gray">Health Workers</h6>
                                    <h6 class="card-text-brown">{{health_workers_value}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-col-12 p-md-4">
                        <div class="card p-shadow-1">
                            <div class="p-grid">
                                <div class="p-col-4 p-md-4">
                                    <img src="img/dashboard-icons/poor_population.png" class="sixty" />
                                </div>
                                <div class="p-col-8 p-md-8">
                                    <h6 class="card-text-gray">Poor Population</h6>
                                    <h6 class="card-text-brown">{{poor_population_value}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-col-12 p-md-4">
                        <div class="card p-shadow-1">
                            <div class="p-grid">
                                <div class="p-col-4 p-sm-4 p-md-4">
                                    <img src="img/dashboard-icons/socio_demographic_group.png" class="sixty" />
                                </div>
                                <div class="p-col-8 p-sm-8 p-md-8">
                                    <h6 class="card-text-gray">Socio-Demographic Groups</h6>
                                    <h6 class="card-text-brown">{{socio_demographic_groups_value}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="p-fluid p-grid">
                    <div class="p-col-12 p-md-4">
                        <div class="card p-shadow-1">
                            <div class="p-grid">
                                <div class="p-col-4 p-sm-4 p-md-4">
                                    <img src="img/dashboard-icons/senior_citizen.png" class="sixty" />
                                </div>
                                <div class="p-col-8 p-sm-8 p-md-8">
                                    <h6 class="card-text-gray">Senior Citizen</h6>
                                    <h6 class="card-text-brown">{{senior_citizen_value}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-col-12 p-md-4">
                        <div class="card p-shadow-1">
                            <div class="p-grid">
                                <div class="p-col-4 p-sm-4 p-md-4">
                                    <img src="img/dashboard-icons/teacher.png" class="sixty" />
                                </div>
                                <div class="p-col-8 p-sm-8 p-md-8">
                                    <h6 class="card-text-gray">Teacher and Social Workers</h6>
                                    <h6 class="card-text-brown">{{teacher_value}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-col-12 p-md-4">
                        <div class="card p-shadow-1">
                            <div class="p-grid">
                                <div class="p-col-4 p-sm-4 p-md-4">
                                    <img src="img/dashboard-icons/ofw.png" class="sixty" />
                                </div>
                                <div class="p-col-8 p-sm-8 p-md-8">
                                    <h6 class="card-text-gray">Overseas Filipino Workers</h6>
                                    <h6 class="card-text-brown">{{ofw_value}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="p-fluid p-grid">
                    <div class="p-col-12 p-md-4">
                        <div class="card p-shadow-1">
                            <div class="p-grid">
                                <div class="p-col-4 p-sm-4 p-md-4">
                                    <img src="img/dashboard-icons/adult_with_comorbidity.png" class="sixty" />
                                </div>
                                <div class="p-col-8 p-sm-8 p-md-8">
                                    <h6 class="card-text-gray">Adult With Comorbidity</h6>
                                    <h6 class="card-text-brown">{{adult_with_comorbidity_value}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-col-12 p-md-4">
                        <div class="card p-shadow-1">
                            <div class="p-grid">
                                <div class="p-col-4 p-sm-4 p-md-4">
                                    <img src="img/dashboard-icons/government.png" class="sixty" />
                                </div>
                                <div class="p-col-8 p-sm-8 p-md-8">
                                    <h6 class="card-text-gray">Other Government Workers</h6>
                                    <h6 class="card-text-brown">{{other_government_workers_value}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-col-12 p-md-4">
                        <div class="card p-shadow-1">
                            <div class="p-grid">
                                <div class="p-col-4 p-sm-4 p-md-4">
                                    <img src="img/dashboard-icons/other_remaining_workforce.png" class="sixty" />
                                </div>
                                <div class="p-col-8 p-sm-8 p-md-8">
                                    <h6 class="card-text-gray">Other Remaining Workforce</h6>
                                    <h6 class="card-text-brown">{{other_remaining_workforce_value}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="p-fluid p-grid">
                    <div class="p-col-12 p-md-4">
                        <div class="card p-shadow-2">
                            <div class="p-grid">
                                <div class="p-col-4 p-sm-4 p-md-4">
                                    <img src="img/dashboard-icons/frontliner_personnel.png" class="sixty" />
                                </div>
                                <div class="p-col-8 p-sm-8 p-md-8">
                                    <h6 class="card-text-gray">Frontline Personnel in Essential Sector</h6>
                                    <h6 class="card-text-brown">{{frontline_personnel_essential_sector_value}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-col-12 p-md-4">
                        <div class="card p-shadow-2">
                            <div class="p-grid">
                                <div class="p-col-4 p-sm-4 p-md-4">
                                    <img src="img/dashboard-icons/other_essential_workers.png" class="sixty" />
                                </div>
                                <div class="p-col-8 p-sm-8 p-md-8">
                                    <h6 class="card-text-gray">Other Essential Workers</h6>
                                    <h6 class="card-text-brown">{{other_essential_workers_value}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-col-12 p-md-4">
                        <div class="card p-shadow-2">
                            <div class="p-grid">
                                <div class="p-col-4 p-sm-4 p-md-4">
                                    <img src="img/dashboard-icons/rest_of_the_population.png" class="sixty" />
                                </div>
                                <div class="p-col-8 p-sm-8 p-md-8">
                                    <h6 class="card-text-gray">Rest of the Population</h6>
                                    <h6 class="card-text-brown">{{rest_of_the_population_value}}</h6>
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
                <Panel header="Total Doses (by vaccination site)" class="p-mb-2">
                    <div class="p-grid">
                        <div class="p-col-12 p-md-12">
                            <DataTable :value="total_doses_value" :paginator="true" :rows="10"
                                paginatorTemplate="CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown"
                                :rowsPerPageOptions="[10,20,50]" responsiveLayout="scroll"
                                currentPageReportTemplate="Showing {first} to {last} of {totalRecords}">
                             <Column field="facility_name" header="Facility Name" headerStyle="width: 20%"></Column>
                                <Column field="health_workers" header="Health Workers (A1)" headerStyle="width: 10%"></Column>
                                <Column field="senior_citizens" header="Senior Citizens (A2)" headerStyle="width: 10%"></Column>
                                <Column field="adults_with_comorbidity" header="Adult with Comorbidity (A3)" headerStyle="width: 10%"></Column>
                                <Column field="frontliners" header="Frontliner Personnel in Essential Sector (A4)" headerStyle="width: 10%"></Column>
                            </DataTable>
                        </div>
                    </div>
                </Panel>

                <Panel class="p-mt-4" header="Total Number of Vaccine Used (per vaccine type)">
                    <div class="p-grid">
                        <div class="p-col-12 p-md-12">
                            <DataTable :value="total_vaccines_used_value" :paginator="true" :rows="10"
                                paginatorTemplate="CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown"
                                :rowsPerPageOptions="[10,20,50]" responsiveLayout="scroll"
                                currentPageReportTemplate="Showing {first} to {last} of {totalRecords}">
                                <Column field="facility_name" header="Facility Name" headerStyle="width: 20%"></Column>
                                <Column field="oxford" header="Oxford Astrazenica" headerStyle="width: 10%"></Column>
                                <Column field="pfizer" header="Pfizer-BioNTech" headerStyle="width: 10%"></Column>
                                <Column field="sinovac" header="Sinovac CoronaVac" headerStyle="width: 10%"></Column>
                                <Column field="novavax" header="Novavax" headerStyle="width: 10%"></Column>
                                <Column field="moderna" header="Moderna" headerStyle="width: 10%"></Column>
                                <Column field="janssen" header="Janssen" headerStyle="width: 10%"></Column>
                                <Column field="gamaleya" header="Gamaleya Sputnik V" headerStyle="width: 10%"></Column>
                                <Column field="bharat" header="Bharat BioTech" headerStyle="width: 10%"></Column>
                                <Column field="total" header="Total # of Vaccine Used" headerStyle="width: 10%"></Column>
                            </DataTable>
                        </div>
                    </div>
                </Panel>
                
            </div>
        </div>
        <ScrollTop />
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
import Toolbar from 'primevue/toolbar/sfc';
import ScrollTop from 'primevue/scrolltop/sfc';

import store from '../../store.js'

export default {
    setup() {

        const { dispatch } = store

        dispatch('AUTHENTICATE')
        dispatch('registered/GET_SELECTIONS')

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
        Dropdown,
        Toolbar,
        ScrollTop
    },
    data() {
        return {
            home: {icon: 'pi pi-home', to: '/summary/registrations'},
            items: [{label: 'Registrations', to: '/summary/registrations'}],
            start_date: null,
            end_date: new Date(),
            province: "_0133_LA_UNION",
            town_city: null
        }
    },
    computed: { 
        total_registered() {
            return this.$store.state.registered.registered.total_registered
        },
        total_vaccinated() {
            return this.$store.state.registered.registered.total_vaccinated
        },
        first_dosage() {
            return this.$store.state.registered.registered.dosages.first_dosage
        },
        second_dosage() {
            return this.$store.state.registered.registered.dosages.second_dosage
        },
        third_dosage() {
            return this.$store.state.registered.registered.dosages.third_dosage
        },
        adult_with_comorbidity_value() {
            return this.$store.state.registered.registered.priority_group.adult_with_comorbidity
        },
        frontline_personnel_essential_sector_value() {
            return this.$store.state.registered.registered.priority_group.frontline_personnel_essential_sector
        },
        health_workers_value() {
            return this.$store.state.registered.registered.priority_group.health_workers
        },
        ofw_value() {
            return this.$store.state.registered.registered.priority_group.ofw
        },
        other_essential_workers_value() {
            return this.$store.state.registered.registered.priority_group.other_essential_workers
        },
        other_government_workers_value() {
            return this.$store.state.registered.registered.priority_group.other_government_workers
        },
        other_remaining_workforce_value() {
            return this.$store.state.registered.registered.priority_group.other_remaining_workforce
        },
        poor_population_value() {
            return this.$store.state.registered.registered.priority_group.poor_population
        },
        rest_of_the_population_value() {
            return this.$store.state.registered.registered.priority_group.rest_of_the_population
        },
        senior_citizen_value() {
            return this.$store.state.registered.registered.priority_group.senior_citizen
        },
        socio_demographic_groups_value() {
            return this.$store.state.registered.registered.priority_group.socio_demographic_groups
        },
        teacher_value() {
            return this.$store.state.registered.registered.priority_group.teacher
        },
        individual_eligible_value(){
            return this.$store.state.registered.registered.individual_eligible
        },
        immunized_vs_eligible_value(){
            return this.$store.state.registered.registered.immunized_vs_eligible
        },
        complete_immunization_value(){
            return this.$store.state.registered.registered.complete_immunization
        },
        waiting_value(){
            return this.$store.state.registered.registered.waiting
        },
        waiting_value(){
            return this.$store.state.registered.registered.waiting
        },
        total_doses_value(){
            return this.$store.state.registered.registered.total_doses
        },
        total_vaccines_used_value(){
            return this.$store.state.registered.registered.total_vaccines_used
        },
        provinces(){
            return this.$store.state.registered.selections.addresses.province_value
        },
        municipalities() {

            if (!this.provinces) return []

            const province = this.provinces.filter(province => {
                return province.id == this.province
            })

            if (province.length==0) return []

            const municipalities = province[0].municipalities

            return municipalities


        },
        isAdmin() {
            return this.$store.state.profile.is_admin
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
            
            this.fetchRegistrations()

        },
        fetchRegistrations() {

            this.$store.dispatch('registered/GET_REGISTRATIONS', { town_city: this.town_city, start_date: this.start_date.toLocaleDateString(), end_date: this.end_date.toLocaleDateString() })

        },
    },
    created() {
        
        const year = new Date().getFullYear()
        const date = new Date(year, 1, 1)
        date.setDate(5)

        this.start_date = date

        if (!this.$store.state.profile.is_admin) {
            this.town_city = this.$store.state.profile.town_city_doh
        }

    },
    mounted(){

        this.fetchRegistrations()

    }
}
</script>

<style scoped>
    .summary {
        color: #215266;
        font-weight: bold;
        font-size: 20px;
    }
    .btn-red {
        background-color: #CC9471;
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
        font-size: 25px;
    }
    .card-text-brown {
        color: #926C2F;
        font-weight: bold;
        font-size: 25px;
    }
    
    .hundred {
        width: 100%!important;
    }
    .sixty {
        width: 60%!important;
    }
    .seventy {
        width: 70%!important;
    }
    @media screen and (max-width: 600px) {
        .header-text {
            color: #7c7c7c;
            font-weight: bold;
            font-size: 15px;
            text-align: center;
        }
        .hundred {
            width: 100%!important;
        }
        .sixty{
            width: 100%!important;
        }
        .card-text-gray {
            color: #7c7c7c;
            font-weight: bold;
            font-size: 15px;
        }
        .card-text-red {
            color: #92362f;
            font-weight: bold;
            font-size: 25px;
        }
        .card-text-brown {
            color: #926C2F;
            font-weight: bold;
            font-size: 25px;
        }
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