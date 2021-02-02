<template>
    <div>
        <MyBreadcrumb :home="home" :items="items" />
        <div class="p-grid p-fluid dashboard p-mt-2">
            <div class="p-col-12 p-lg-4">
                <div class="card summary">
                    <span class="title">Total Response</span>
                    <span class="detail"><h4><b>12,200</b></h4></span>
                </div>
            </div>
            <div class="p-col-12 p-lg-4">
                <div class="card summary">
                    <span class="title">Male</span>
                    <span class="detail"><h4><b>9,000</b></h4></span>
                </div>
            </div>
            <div class="p-col-12 p-lg-4">
                <div class="card summary">
                    <span class="title">Female</span>
                    <span class="detail"><h4><b>3,345</b></h4></span>
                </div>
            </div>

            <div class="p-lg-8 p-md-12 p-sm-12">
                <Panel header="Population Group">
                    <div class="p-grid">
                        <div class="p-lg-6 p-sm-12">
                            <ul class="task-list">
                                <li>
                                    <div class="p-grid border-line">
                                        <div class="p-lg-2 p-sm-12 border-right">
                                            <span class="task-name total-number">10,100</span>
                                        </div>
                                        <div class="p-lg-10 p-sm-12">
                                            <span class="task-name">Frontline health workers</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="p-grid border-line">
                                        <div class="p-lg-2 p-sm-12 border-right">
                                            <span class="task-name total-number">213</span>
                                        </div>
                                        <div class="p-lg-10 p-sm-12">
                                            <span class="task-name">Senior Citizens</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="p-grid border-line">
                                        <div class="p-lg-2 p-sm-12 border-right">
                                            <span class="task-name total-number">213</span>
                                        </div>
                                        <div class="p-lg-10 p-sm-12">
                                            <span class="task-name">Uniformed personnel (PNP, AFP, PCG, BFP, BJMP, ETC)</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="p-grid border-line">
                                        <div class="p-lg-2 p-sm-12 border-right">
                                            <span class="task-name total-number">213</span>
                                        </div>
                                        <div class="p-lg-10 p-sm-12">
                                            <span class="task-name">Teachers</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="p-grid border-line">
                                        <div class="p-lg-2 p-sm-12 border-right">
                                            <span class="task-name total-number">12,200</span>
                                        </div>
                                        <div class="p-lg-10 p-sm-12">
                                            <span class="task-name">Social workers</span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <div class="p-lg-6 p-sm-12">
                            <ul class="task-list">
                                <li>
                                    <div class="p-grid  border-line">
                                        <div class="p-lg-2 p-sm-12 border-right">
                                            <span class="task-name total-number">10,100</span>
                                        </div>
                                        <div class="p-lg-10 p-sm-12">
                                            <span class="task-name">Frontline health workers</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="p-grid border-line">
                                        <div class="p-lg-2 p-sm-12 border-right">
                                            <span class="task-name total-number">213</span>
                                        </div>
                                        <div class="p-lg-10 p-sm-12">
                                            <span class="task-name">Senior Citizens</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="p-grid border-line">
                                        <div class="p-lg-2 p-sm-12 border-right">
                                            <span class="task-name total-number">213</span>
                                        </div>
                                        <div class="p-lg-10 p-sm-12">
                                            <span class="task-name">Uniformed personnel (PNP, AFP, PCG, BFP, BJMP, ETC)</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="p-grid border-line">
                                        <div class="p-lg-2 p-sm-12 border-right">
                                            <span class="task-name total-number">213</span>
                                        </div>
                                        <div class="p-lg-10 p-sm-12">
                                            <span class="task-name">Teachers</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="p-grid border-line">
                                        <div class="p-lg-2 p-sm-12 border-right">
                                            <span class="task-name total-number">12,200</span>
                                        </div>
                                        <div class="p-lg-10 p-sm-12">
                                            <span class="task-name">Social workers</span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
               </Panel>
	        </div>

            <div class="p-lg-4 p-md-12 p-sm-12">
                <DataTable :value="products">
                    <Column field="city" header="City & Municipality"></Column>
                    <Column field="total" header="Total"></Column>
                </DataTable>
            </div>

            <div class="p-lg-8 p-md-12 p-sm-12">
                <Panel header="Comorbidities">
                    <div class="p-grid">
                        <div class="p-lg-6 p-sm-12">
                            <ul class="task-list">
                                <li>
                                    <div class="p-grid border-line">
                                        <div class="p-lg-2 p-sm-12 border-right">
                                            <span class="task-name total-number">10,100</span>
                                        </div>
                                        <div class="p-lg-10 p-sm-12">
                                            <span class="task-name">Frontline health workers</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="p-grid border-line">
                                        <div class="p-lg-2 p-sm-12 border-right">
                                            <span class="task-name total-number">213</span>
                                        </div>
                                        <div class="p-lg-10 p-sm-12">
                                            <span class="task-name">Senior Citizens</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="p-grid border-line">
                                        <div class="p-lg-2 p-sm-12 border-right">
                                            <span class="task-name total-number">213</span>
                                        </div>
                                        <div class="p-lg-10 p-sm-12">
                                            <span class="task-name">Uniformed personnel (PNP, AFP, PCG, BFP, BJMP, ETC)</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="p-grid border-line">
                                        <div class="p-lg-2 p-sm-12 border-right">
                                            <span class="task-name total-number">213</span>
                                        </div>
                                        <div class="p-lg-10 p-sm-12">
                                            <span class="task-name">Teachers</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="p-grid border-line">
                                        <div class="p-lg-2 p-sm-12 border-right">
                                            <span class="task-name total-number">12,200</span>
                                        </div>
                                        <div class="p-lg-10 p-sm-12">
                                            <span class="task-name">Social workers</span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <div class="p-lg-6 p-sm-12">
                            <ul class="task-list">
                                <li>
                                    <div class="p-grid  border-line">
                                        <div class="p-lg-2 p-sm-12 border-right">
                                            <span class="task-name total-number">10,100</span>
                                        </div>
                                        <div class="p-lg-10 p-sm-12">
                                            <span class="task-name">Frontline health workers</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="p-grid border-line">
                                        <div class="p-lg-2 p-sm-12 border-right">
                                            <span class="task-name total-number">213</span>
                                        </div>
                                        <div class="p-lg-10 p-sm-12">
                                            <span class="task-name">Senior Citizens</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="p-grid border-line">
                                        <div class="p-lg-2 p-sm-12 border-right">
                                            <span class="task-name total-number">213</span>
                                        </div>
                                        <div class="p-lg-10 p-sm-12">
                                            <span class="task-name">Uniformed personnel (PNP, AFP, PCG, BFP, BJMP, ETC)</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="p-grid border-line">
                                        <div class="p-lg-2 p-sm-12 border-right">
                                            <span class="task-name total-number">213</span>
                                        </div>
                                        <div class="p-lg-10 p-sm-12">
                                            <span class="task-name">Teachers</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="p-grid border-line">
                                        <div class="p-lg-2 p-sm-12 border-right">
                                            <span class="task-name total-number">12,200</span>
                                        </div>
                                        <div class="p-lg-10 p-sm-12">
                                            <span class="task-name">Social workers</span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
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

export default {
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