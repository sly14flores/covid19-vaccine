<template>
    <div>
        <MyBreadcrumb :home="home" :items="items" />        
        <div class="p-col-12 p-mt-2">
            <div class="card p-fluid">
                <h5><i class="pi pi-user"></i> User Information</h5>
                <hr />
                <div class="p-grid">
                    <div class="p-field p-lg-4 p-md-12">
                        <label for="firstname">First Name</label>
                        <InputText id="firstname" type="text" placeholder="Enter First Name" v-model="user.firstname" />
                    </div>
                    <div class="p-field p-lg-4 p-md-12">
                        <label for="middlename">Middle Name</label>
                        <InputText id="middlename" type="text" placeholder="Enter Middle Name" v-model="user.middlename" />
                    </div>
                    <div class="p-field p-lg-4 p-md-12">
                        <label for="lastname">Last Name</label>
                        <InputText id="lastname" type="text" placeholder="Enter Last Name" v-model="user.lastname" />
                    </div>
                </div>
                <h5><i class="pi pi-lock"></i> Login Credentials</h5>
                <hr />
                <div class="p-grid">
                    <div class="p-field p-lg-6 p-md-12">
                        <label for="username">Username</label>
                        <InputText id="username" type="text" placeholder="Enter Username" v-model="user.username" />
                    </div>
                    <div class="p-field p-lg-6 p-md-12">
                        <label for="password">Password</label>
                        <InputText id="password" type="text" placeholder="Enter Password" v-model="user.password" />
                    </div>
                </div>
            </div>
            <div class="p-d-flex">
                <Button label="Submit" class="p-button-primary" @click="save" />
            </div>
        </div>
    </div>
</template>

<script>
import MyBreadcrumb from '../../components/MyBreadcrumb.vue';
import InputText from 'primevue/inputtext/sfc';
import Button from 'primevue/button/sfc';

export default {
    components: {
        MyBreadcrumb,
        InputText,
        Button
    },    
    data() {
        return {
            home: {icon: 'pi pi-home', to: '/users'},
            items: [{label: 'New User', to: '/users/new'}],
        }
    },
    computed: {
        user() {
            return this.$store.state.users.user
        },
    },
    methods: {
        save() {
            this.$store.dispatch('users/CREATE', this.user)
        }
    },
    mounted() {
        this.$store.dispatch('users/INIT')
    }
}
</script>

<style scoped>

</style>