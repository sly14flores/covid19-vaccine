<template>
    <div>
        <MyBreadcrumb :home="home" :items="items" />
        <div class="card p-mt-2">
            <div class="p-grid p-col-12">
                <div class="p-sm-12 p-md-9 p-lg-10">
                    <label class="summary p-ml-2">SUMMARY RESPONSE</label><br />
                    <label class="as-of p-ml-2"> AS OF {{currentDate()}}</label>
                </div>
                <div class="p-sm-12 p-md-3 p-lg-2">
                    <button  type="button" class="p-mr-2 p-mb-2 p-button p-button-secondary p-component p-button-icon-only" @click="refresh">
                        <i class="pi pi-refresh icon-size"></i>
                    </button>
                    <button  type="button" class="p-mr-2 p-mb-2 p-button p-component p-button-success">
                            Export to Excel
                    </button> 
                </div>
            </div>
        </div>
        <div class="card p-mt-1">
            <div class="card">
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
            <div class="p-grid p-fluid dashboard">
                <div class="p-col-12 p-lg-4">
                    <div class="card summary p-shadow-1">
                        <span class="title">Registered</span>
                        <span class="detail"><h4><b>100</b></h4></span>
                        <span class="count revenue"><i class="pi pi-users" style="fontSize: 3rem"></i></span>
                    </div>
                </div>
                <div class="p-col-12 p-lg-4">
                    <div class="card summary p-shadow-1">
                        <span class="title">Male</span>
                        <span class="detail"><h4><b>124</b></h4></span>
                        <span class="count visitors"><i class="pi pi-check-circle" style="fontSize: 3rem"></i></span>
                    </div>
                </div>
                <div class="p-col-12 p-lg-4">
                    <div class="card summary p-shadow-1">
                        <span class="title">Female</span>
                        <span class="detail"><h4><b>123</b></h4></span>
                        <span class="count purchases"><i class="pi pi-times-circle" style="fontSize: 3rem"></i></span>
                    </div>
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
import Chart from 'primevue/chart/sfc';
import Calendar from 'primevue/calendar/sfc';

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
        Calendar
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