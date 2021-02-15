<template>
    <div>
        <MyBreadcrumb :home="home" :items="items" />
         <div class="p-grid p-fluid dashboard p-mt-2">
            <div class="p-lg-10 p-md-12 p-sm-12">
                <label class="summary p-ml-2">SUMMARY RESPONSE</label><br />
                <label class="as-of p-ml-2"> AS OF FEBRUARY 14, 2021</label>
            </div>
            <div class="p-lg-2 p-md-12 p-sm-12">
                <Button label="Export File" class="p-button-raised p-button-success" />
            </div>
        </div>
        <div class="p-grid p-fluid dashboard p-mt-2">

            <div class="p-col-12 p-lg-4">
                <div class="card summary">
                    <span class="title">Total Response</span>
                    <span class="detail"><h4><b>{{total_responses}}</b></h4></span>
                    <span class="count visitors"><i class="pi pi-comment" style="fontSize: 3rem"></i></span>
                </div>
            </div>
            <div class="p-col-12 p-lg-4">
                <div class="card summary">
                    <span class="title">Male</span>
                    <span class="detail"><h4><b>{{male}}</b></h4></span>
                    <span class="count revenue"><i class="pi pi-user" style="fontSize: 3rem"></i></span>
                </div>
            </div>
            <div class="p-col-12 p-lg-4">
                <div class="card summary">
                    <span class="title">Female</span>
                    <span class="detail"><h4><b>{{female}}</b></h4></span>
                    <span class="count purchases"><i class="pi pi-user" style="fontSize: 3rem"></i></span>
                </div>
            </div>

            <div class="p-grid">
                <div class="p-lg-8 p-md-12 p-sm-12">
                    <div class="p-lg-12">
                        <Panel header="Population Group">
                            <DataTable :value="population_group" dataKey="id">
                                <Column field="value" header="Total" sortable="true"></Column>
                                <Column field="description" header="Description" sortable="true"></Column>
                            </DataTable>
                        </Panel>
                    </div>
                    <div class="p-lg-12">
                        <Panel header="Comorbidities">
                            <DataTable :value="comorbidity" dataKey="id">
                                <Column field="value" header="Total" sortable="true"></Column>
                                <Column field="description" header="Description" sortable="true"></Column>
                            </DataTable>
                        </Panel>
                    </div>
                </div>

                 <div class="p-lg-4 p-md-12 p-sm-12">
                    <DataTable :value="municipality" dataKey="id">
                        <Column field="value" header="City & Municipality" sortable="true"></Column>
                        <Column field="description" header="Total" sortable="true"></Column>
                    </DataTable>
                 </div>
            </div>

            <div class="p-grid p-lg-8 p-md-12 p-sm-12">
                <div class="p-lg-6 p-md-12 p-sm-12">
                    <Panel header="Pregnancy Status">
                        <DataTable>
                            <Column field="code" header="Pregnant"></Column>
                            <Column field="name" header="Not Pregnant"></Column>
                            <Column field="name" header="Not Sure"></Column>
                        </DataTable>
                    </Panel>
                </div>
                <div class="p-lg-6 p-md-12 p-sm-12">
                    <Panel header="Planning to get pregnant?">
                        <DataTable>
                            <Column field="code" header="Yes"></Column>
                            <Column field="name" header="Not Pregnant"></Column>
                        </DataTable>
                    </Panel>
                </div>
            </div>
           
            <div class="p-grid p-lg-8 p-md-12 p-sm-12">
                <div class="p-lg-12">
                    <Panel header="Interested To Be Vaccinated">
                        <DataTable>
                            <Column field="code" header="Interested"></Column>
                            <Column field="name" header="Not Interested"></Column>
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
</template>

<script>
import MyBreadcrumb from '../../components/MyBreadcrumb.vue';
import DataTable from 'primevue/datatable/sfc';
import Column from 'primevue/column/sfc';
import ColumnGroup from 'primevue/columngroup/sfc';
import Panel from 'primevue/panel/sfc';
import Button from 'primevue/button/sfc';
import Paginator from 'primevue/paginator/sfc';

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
        ColumnGroup,
        Panel,
        Button,
        Paginator
    },
    data() {
        return {
            home: {icon: 'pi pi-home', to: '/summary/surveys'},
            items: [{label: 'Survey', to: '/summary/surveys'}],
        }
    },
    computed: {
        total_responses() {
            return this.$store.state.surveys.surveys.total_responses
        },
        male() {
            return this.$store.state.surveys.surveys.male
        },
        female() {
            return this.$store.state.surveys.surveys.female
        },
        yes_vaccine() {
            return this.$store.state.surveys.surveys.interested.yes_vaccine
        },
        no_vaccine() {
            return this.$store.state.surveys.surveys.interested.no_vaccine
        },
        yes_currently_pregnant() {
            return this.$store.state.surveys.surveys.current_pregnancy.yes_currently_pregnant
        },
        no_currently_pregnant() {
            return this.$store.state.surveys.surveys.current_pregnancy.no_currently_pregnant
        },
        not_sure_currently_pregnant() {
            return this.$store.state.surveys.surveys.current_pregnancy.not_sure_currently_pregnant
        },
        yes_pregnant_baby() {
            return this.$store.state.surveys.surveys.planning_pregnant.yes_pregnant_baby
        },
        no_pregnant_baby() {
            return this.$store.state.surveys.surveys.planning_pregnant.no_pregnant_baby
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
    },
    created() {

        this.$store.dispatch('surveys/GET_SURVEYS')

    },
}
</script>

<style scoped>
.summary {
    color: #215266;
    font-weight: bold;
    font-size: 20px;
}
.as-of {
    color: #926C2F;
    font-weight: bold;
    font-size: 15px;
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
</style>