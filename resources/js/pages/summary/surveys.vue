<template>
    <div>
        <MyBreadcrumb :home="home" :items="items" />
        <div class="card p-mt-2">
            <div class="p-grid p-col-12">
                <div class="p-sm-12 p-md-9 p-lg-9">
                    <label class="summary p-ml-2">SUMMARY RESPONSE</label><br />
                    <label class="as-of p-ml-2"> AS OF {{currentDate()}}</label>
                </div>
                <div class="p-sm-12 p-md-3 p-lg-3">
                    <button  type="button" class="p-mr-2 p-mb-2 p-button p-component btn-red" @click="refresh">
                        <i class="pi pi-refresh"></i> &nbsp; Refresh
                    </button>
                    <button  type="button" class="p-mr-2 p-mb-2 p-button p-component p-button-success" @click="exportToExcel">
                        <i class="pi pi-upload"></i>&nbsp; Export to Excel
                    </button> 
                </div>
            </div>
        </div>

        <div class="card p-mt-2">
            <div class=" p-fluid p-grid p-formgrid">
                <div class="p-field p-col-12 p-md-4">
                    <label for="basic">Start Date:</label>
                    <Calendar class="p-shadow-1" id="start_date_chart" v-model="start_date_chart" />
                </div>
                <div class="p-field p-col-12 p-md-4">
                    <label for="basic">End Date:</label>
                    <Calendar class="p-shadow-1" id="end_date_chart" v-model="end_date_chart" />
                </div>
                <div class="p-field p-col-12 p-md-1">
                    <label for="basic">&nbsp;</label>
                    <Button label="Go!" @click="fetchSurveysChart" />
                </div>
            </div>
            <Chart type="line" :data="basicData" />
        </div>

        <div class="card p-mt-2">
            <div class="card p-mt-2">
                <div class=" p-fluid p-grid p-formgrid">
                    <div class="p-field p-col-12 p-md-4">
                        <label for="basic">Start Date:</label>
                        <Calendar class="p-shadow-1" id="start_date" v-model="start_date" />
                    </div>
                    <div class="p-field p-col-12 p-md-4">
                        <label for="basic">End Date:</label>
                        <Calendar class="p-shadow-1" id="end_date" v-model="end_date" />
                    </div>
                    <div class="p-field p-col-12 p-md-1">
                        <label for="basic">&nbsp;</label>
                        <Button label="Go!" @click="fetchSurveys" />
                    </div>
                </div>
            </div>
            <div class="p-grid p-fluid dashboard p-mt-1">
                <div class="p-col-12 p-lg-4">
                    <div class="card summary p-shadow-1">
                        <span class="title">Total Response</span>
                        <span class="detail"><h4><b>{{total_responses}}</b></h4></span>
                        <span class="count revenue"><i class="pi pi-comment" style="fontSize: 3rem"></i></span>
                    </div>
                </div>
                <div class="p-col-12 p-lg-4">
                    <div class="card summary p-shadow-1">
                        <span class="title">Interested</span>
                        <span class="detail"><h4><b>{{yes_vaccine}}</b></h4></span>
                        <span class="count visitors"><i class="pi pi-check-circle" style="fontSize: 3rem"></i></span>
                    </div>
                </div>
                <div class="p-col-12 p-lg-4">
                    <div class="card summary p-shadow-1">
                        <span class="title">Not Interested</span>
                        <span class="detail"><h4><b>{{no_vaccine}}</b></h4></span>
                        <span class="count purchases"><i class="pi pi-times-circle" style="fontSize: 3rem"></i></span>
                    </div>
                </div>

                <div class="p-grid">
                    <div class="p-lg-8 p-md-12 p-sm-12">
                        <div class="p-lg-12">
                            <Panel header="Population Group">
                                <div class="p-grid">
                                    <div class="p-lg-7 p-md-7 p-sm-7"></div>
                                    <div class="p-lg-5 p-md-5 p-sm-5">
                                        <h6>(Interested to be vaccinated)</h6>
                                    </div>
                                </div>
                                <DataTable :value="population_group" dataKey="id">
                                    <Column field="description" header="Description" sortable="true"></Column>
                                    <Column field="value" header="Total" sortable="true"></Column>
                                    <Column field="yes" header="Yes" sortable="true"></Column>
                                    <Column field="no" header="No" sortable="true"></Column>
                                </DataTable>
                            </Panel>
                        </div>
                        <div class="p-lg-12">
                            <Panel header="Comorbidities">
                                <DataTable :value="comorbidity" dataKey="id">
                                    <Column field="description" header="Description" sortable="true"></Column>
                                    <Column field="value" header="Total" sortable="true"></Column>
                                </DataTable>
                            </Panel>
                        </div>
                    </div>

                    <div class="p-lg-4 p-md-12 p-sm-12 p-mt-2">
                        <Panel header="Gender">
                            <DataTable :value="gender" dataKey="id">
                                <Column field="male" header="Male"></Column>
                                <Column field="female" header="Female"></Column>
                            </DataTable>   
                        </Panel>
                        <DataTable :value="municipality" dataKey="id" class="p-mt-2">
                            <Column field="description" header="City & Municipality" sortable="true"></Column>
                            <Column field="value" header="Total" sortable="true"></Column>
                        </DataTable>
                    </div>
                </div>

                <div class="p-grid p-lg-8 p-md-12 p-sm-12">
                    <div class="p-lg-6 p-md-12 p-sm-12">
                        <Panel header="Pregnancy Status">
                            <DataTable :value="current_pregnancy" dataKey="id">
                                <Column field="yes_currently_pregnant" header="Pregnant"></Column>
                                <Column field="no_currently_pregnant" header="Not Pregnant"></Column>
                                <Column field="not_sure_currently_pregnant" header="Not Sure"></Column>
                            </DataTable>
                        </Panel>
                    </div>
                    <div class="p-lg-6 p-md-12 p-sm-12">
                        <Panel header="Planning to get pregnant?">
                            <DataTable :value="planning_pregnant" dataKey="id">
                                <Column field="yes_pregnant_baby" header="Yes"></Column>
                                <Column field="no_pregnant_baby" header="Not Pregnant"></Column>
                            </DataTable>
                        </Panel>
                    </div>
                </div>
            
                <div class="p-grid p-lg-8 p-md-12 p-sm-12">
                    <div class="p-lg-12">
                        <Panel header="Reason">
                            <DataTable :value="reason" dataKey="id">
                                <Column field="value" header="Total" sortable="true"></Column>
                                <Column field="description" header="Description" sortable="true"></Column>
                            </DataTable>   
                        </Panel>
                    </div>
                </div>
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
import ScrollTop from 'primevue/scrolltop/sfc';

import { api_url } from '../../url.js'

export default {
    setup() {

        const downloadUrl = `${api_url}/home/reports/surveys`

        return {
            downloadUrl
        }

    },
    components: {
        MyBreadcrumb,
        DataTable,
        Column,
        ColumnGroup,
        Panel,
        Button,
        Paginator,
        Chart,
        Calendar,
        ScrollTop
    },
    data() {
        return {
            home: {icon: 'pi pi-home', to: '/summary/surveys'},
            items: [{label: 'Survey', to: '/summary/surveys'}],
            start_date_chart: null,
            end_date_chart: new Date(),
            start_date: null,
            end_date: new Date()
        }
    },
    computed: {
        basicData() {
            return {
				labels: this.$store.state.surveys.surveys.total_responses_line_chart.labels,
				datasets: [
					{
						// label: `${this.$store.state.surveys.surveys.total_responses} Total Responses`,
						label: `Total Responses`,
						data: this.$store.state.surveys.surveys.total_responses_line_chart.responses,
						fill: false,
						borderColor: '#42A5F5'
					},
                    {
						label: `Interested to be vaccinated`,
						data: this.$store.state.surveys.surveys.total_responses_line_chart.total_interested,
						fill: false,
						borderColor: '#66BB6A'
					},
                    {
						label: `Not Interested to be vaccinated`,
						data: this.$store.state.surveys.surveys.total_responses_line_chart.total_not_interested,
						fill: true,
						borderColor: '#FFA726',
                        backgroundColor: 'rgba(255,167,38,0.2)'
					},
				]
			}
        },
        total_responses() {
            return this.$store.state.surveys.surveys.total_responses
        },
        yes_vaccine() {
            return this.$store.state.surveys.surveys.yes_vaccine
        },
        no_vaccine() {
            return this.$store.state.surveys.surveys.no_vaccine
        },
        interested() {
            return this.$store.state.surveys.surveys.interested
        },
        current_pregnancy() {
            return this.$store.state.surveys.surveys.current_pregnancy
        },
        planning_pregnant() {
            return this.$store.state.surveys.surveys.planning_pregnant
        },
        municipality() {
            return this.$store.state.surveys.surveys.municipality
        },
        population_group() {
            return this.$store.state.surveys.surveys.population_group
        },
        comorbidity() {
            return this.$store.state.surveys.surveys.comorbidity
        },
        reason() {
            return this.$store.state.surveys.surveys.reason
        },
        gender() {
            return this.$store.state.surveys.surveys.gender
        },
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
        exportToExcel() {

            window.open(`${this.downloadUrl}?start_date=${this.start_date.toLocaleDateString()}&end_date=${this.end_date.toLocaleDateString()}&start_date_chart=${this.start_date_chart.toLocaleDateString()}&end_date_chart=${this.end_date_chart.toLocaleDateString()}`)

        },
        fetchSurveysChart() {

            this.$store.dispatch('surveys/GET_SURVEYS', { start_date_chart: this.start_date_chart.toLocaleDateString(), end_date_chart: this.end_date_chart.toLocaleDateString(),start_date: this.start_date.toLocaleDateString(), end_date: this.end_date.toLocaleDateString() })

        },
         fetchSurveys() {

            this.$store.dispatch('surveys/GET_SURVEYS', { start_date_chart: this.start_date_chart.toLocaleDateString(), end_date_chart: this.end_date_chart.toLocaleDateString(), start_date: this.start_date.toLocaleDateString(), end_date: this.end_date.toLocaleDateString() })

        },
        refresh() {
            
            this.fetchSurveys()

        },
    },
    created() {
        
        const date_chart = new Date()
        date_chart.setDate(1)

        this.start_date_chart = date_chart

        const year = new Date().getFullYear()
        const date = new Date(year, 1, 1)
        date.setDate(5)

        this.start_date = date

    },
    mounted() {

        this.fetchSurveys()

    }
}
</script>

<style scoped>
.btn-red {
    background-color: #CC9471;
}
.summary {
    color: #215266;
    font-weight: bold;
    font-size: 20px;
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