<template>
    <div>
        <MyBreadcrumb :home="home" :items="items" />        
        <div class="p-grid">
            <div class="p-lg-6 p-md-12 p-sm-12 p-mt-2">
            <form>
                <div class="card p-fluid">
                    <h5><i class="pi pi-lock"></i> Change Password</h5>
                    <hr />
                    <div class="p-fluid p-formgrid p-grid">
                        <div class="p-field p-col-12 p-md-12">
                            <label>Current Password <i class="p-error">*</i></label>
                            <InputText class="p-shadow-1" type="password" placeholder="Enter Current Password" v-model="info.currentPassword" :class="{'p-invalid': validations.currentPassword && validations.currentPassword[0]}" />
                            <small class="p-error">{{ validations.currentPassword && validations.currentPassword[0] }}</small>                        
                        </div>
                        <div class="p-field p-col-12 p-md-12">
                            <label>New Password <i class="p-error">*</i></label>
                            <InputText class="p-shadow-1" type="password" placeholder="Enter New Password" v-model="info.newPassword" :class="{'p-invalid': validations.newPassword && validations.newPassword[0]}" />
                            <small class="p-error">{{ validations.newPassword && validations.newPassword[0] }}</small>
                        </div>
                        <div class="p-field p-col-12 p-md-12">
                            <label>Confirm Password <i class="p-error">*</i></label>
                            <InputText class="p-shadow-1" type="password" placeholder="Confirm Password" v-model="info.confirmNewPassword" :class="{'p-invalid': validations.confirmNewPassword && validations.confirmNewPassword[0]}" />
                            <small class="p-error">{{ validations.confirmNewPassword && validations.confirmNewPassword[0] }}</small>                            
                        </div>
                    </div>
                    <hr />
                    <div class="p-fluid p-formgrid p-grid">
                        <div class="p-d-flex p-p-3 card">
                            <Button label="Update" type="button" class="p-button-primary" @click="update" />
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

import { reactive } from 'vue'

const passwordInfo = {
    currentPassword: null,
    newPassword: null,
    confirmNewPassword: null,    
}

export default {
    setup() {

        const info = reactive({
            ...passwordInfo     
        })

        return {
            info
        }

    },
    components: {
        MyBreadcrumb,
        InputText,
        Button
        
    },
    data() {
        return {
            home: {icon: 'pi pi-home', to: '/change-password'},
            items: [
                {label: 'Change Password', to: `${this.$route.fullPath}`}                
            ]
        }
    },
    computed: {
        updating() {
            return this.$store.state.password.updating
        },
        validations() {
            return this.$store.state.password.validations
        },       
    },
    methods: {
        update() {
            this.$store.dispatch('password/CHANGE_PASSWORD',this.info)
        }      
    },
    mounted() {

    }
}
</script>