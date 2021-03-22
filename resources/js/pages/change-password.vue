<template>
    <div>
        <MyBreadcrumb :home="home" :items="items" />        
        <div class="p-grid">
            <div class="p-col-12 p-mt-2">
            <form @submit="onSubmit">
                <div class="card p-fluid">
                    <h5><i class="pi pi-lock"></i> Change Password</h5>
                    <hr />
                    <div class="p-fluid p-formgrid p-grid">
                        <div class="p-field p-col-12 p-md-12">
                            <label>Current Password <i class="p-error">*</i></label>
                            <InputText class="p-shadow-1" id="current_password" type="text" placeholder="Enter Current Password" />
                        </div>
                        <div class="p-field p-col-12 p-md-12">
                            <label>New Password <i class="p-error">*</i></label>
                            <InputText class="p-shadow-1" id="new_password" type="text" placeholder="Enter New Password" v-model="new_password" />
                        </div>
                        <div class="p-field p-col-12 p-md-12">
                            <label>Confirm Password <i class="p-error">*</i></label>
                            <InputText class="p-shadow-1" id="confirm_password" type="text" placeholder="Confirm Password" v-model="confirm_password" />                    
                        </div>
                    </div>
                    <hr />
                    <div class="p-fluid p-formgrid p-grid">
                        <div class="p-field p-col-12 p-md-10"></div>
                        <div class="p-field p-col-12 p-md-1">
                            <Button label="Save" type="submit" class="p-button-success" />
                        </div>
                        <div class="p-field p-col-12 p-md-1">
                            <router-link to="/"><Button type="button" label="Close" class="p-button-danger p-ml-2" /></router-link>
                        </div>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</template>

<script>
import MyBreadcrumb from '../components/MyBreadcrumb.vue';
import InputText from 'primevue/inputtext/sfc';
import Button from 'primevue/button/sfc';

export default {
    setup() {

    },
    components: {
        MyBreadcrumb,
        InputText,
        Button
        
    },
    data() {
        return {
            home: {icon: 'pi pi-home', to: '/change-password'},
            items: []
        }
    },
    computed: {
       
    },
    methods: {
      
    },
    mounted() {

    }
}
</script>