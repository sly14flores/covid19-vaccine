<template>
    <div>
        <MyBreadcrumb :home="home" :items="items" />
        <Panel header="List" class="p-mt-4">
            <div class="p-grid">
                <div class="p-sm-12 p-md-6 p-lg-4">
                    <div class="p-inputgroup">
                        <span class="p-inputgroup-addon">
                            <i class="pi pi-search"></i>
                        </span>
                        <InputText v-model="search" placeholder="QR, First name, Middle name, Last name" />
                    </div>
                </div>
            </div>
        </Panel>
    </div>
</template>

<script>
import MyBreadcrumb from '../../components/MyBreadcrumb.vue';
import Panel from 'primevue/panel/sfc';
import InputText from 'primevue/inputtext/sfc';

export default {
    name: 'VaccinationList',
    components: {
        MyBreadcrumb,
        Panel,
        InputText,
    },
    setup() {
        
    },
    data() {
        return {
            home: {icon: 'pi pi-home', to: '/description/list'},
            items: [],
            search: '',
        }
    },    
}
</script>