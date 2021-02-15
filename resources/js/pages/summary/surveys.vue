<template>
    <div>
        <MyBreadcrumb :home="home" :items="items" />
        <div class="p-grid p-fluid dashboard p-mt-2">

            <div class="p-col-12 p-lg-4">
                <div class="card summary">
                    <span class="title">Total Response</span>
                    <span class="detail"><h4><b>12,200</b></h4></span>
                    <span class="count visitors"><i class="pi pi-comment" style="fontSize: 3rem"></i></span>
                </div>
            </div>
            <div class="p-col-12 p-lg-4">
                <div class="card summary">
                    <span class="title">Male</span>
                    <span class="detail"><h4><b>9,000</b></h4></span>
                    <span class="count revenue"><i class="pi pi-user" style="fontSize: 3rem"></i></span>
                </div>
            </div>
            <div class="p-col-12 p-lg-4">
                <div class="card summary">
                    <span class="title">Female</span>
                    <span class="detail"><h4><b>3,345</b></h4></span>
                    <span class="count purchases"><i class="pi pi-user" style="fontSize: 3rem"></i></span>
                </div>
            </div>

            <div class="p-grid">
                <div class="p-lg-8 p-md-12 p-sm-12">
                    <Panel header="Population Group">
                        <DataTable>
                            <Column field="code" header="Total" sortable="true"></Column>
                            <Column field="name" header="Description" sortable="true"></Column>
                        </DataTable>
                    </Panel>
                </div>
                <div class="p-lg-4 p-md-12 p-sm-12">
                    <DataTable>
                        <Column field="city" header="City & Municipality" sortable="true"></Column>
                        <Column field="total" header="Total" sortable="true"></Column>
                    </DataTable>
                 </div>
            </div>

            <div class="p-grid">
                <div class="p-lg-8 p-md-12 p-sm-12">
                    <Panel header="Comorbidities">
                        <DataTable>
                            <Column field="code" header="Total" sortable="true"></Column>
                            <Column field="name" header="Description" sortable="true"></Column>
                        </DataTable>
                    </Panel>
                </div>
            </div>
            <div class="p-grid">
                <div class="p-lg-4 p-md-12 p-sm-12">
                    <Panel header="Pregnancy Status">
                        <DataTable>
                            <Column field="code" header="Pregnant" sortable="true"></Column>
                            <Column field="name" header="Not Pregnant" sortable="true"></Column>
                            <Column field="name" header="Not Sure" sortable="true"></Column>
                        </DataTable>   
                    </Panel>
                </div>
                <div class="p-lg-4 p-md-12 p-sm-12">
                    <Panel header="Planning to get pregnant?">
                        <DataTable>
                            <Column field="code" header="Yes" sortable="true"></Column>
                            <Column field="name" header="Not Pregnant" sortable="true"></Column>
                        </DataTable>   
                    </Panel>
                </div>
            </div>

            <div class="p-grid">
                <div class="p-lg-4 p-md-12 p-sm-12">
                    <Panel header="Interested To Be Vaccinated">
                        <DataTable>
                            <Column field="code" header="Interested" sortable="true"></Column>
                            <Column field="name" header="Not Interested" sortable="true"></Column>
                        </DataTable>   
                    </Panel>
                </div>
                <div class="p-lg-4 p-md-12 p-sm-12">
                    <Panel header="Reason">
                        <DataTable>
                            <Column field="code" header="Total" sortable="true"></Column>
                            <Column field="name" header="Description" sortable="true"></Column>
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
        Panel
    },
    data() {
        return {
            home: {icon: 'pi pi-home', to: '/summary/surveys'},
            items: [{label: 'Survey', to: '/summary/surveys'}],
        }
    }
}
</script>

<style scoped>
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