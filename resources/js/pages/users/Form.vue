<template>
    <div>
        <MyBreadcrumb :home="home" :items="items" />
     
            <div class="p-col-12 p-mt-2">
            <form @submit="onSubmit">
                <div class="card p-fluid">
                    <h5><i class="pi pi-user"></i> User Information</h5>
                    <hr />
                    <div class="p-grid">
                        <div class="p-field p-lg-4 p-md-12">
                            <label for="firstname">First Name</label>
                            <InputText id="firstname" type="text" placeholder="Enter First Name" v-model="firstname" :class="{'p-invalid': firstnameError && !firstnameMeta.valid}" />
                            <small class="p-error">{{ firstnameError }}</small>                       
                        </div>
                        <div class="p-field p-lg-4 p-md-12">
                            <label for="middlename">Middle Name</label>
                            <InputText id="middlename" type="text" placeholder="Enter Middle Name" v-model="middlename" />
                        </div>
                        <div class="p-field p-lg-4 p-md-12">
                            <label for="lastname">Last Name</label>
                            <InputText id="lastname" type="text" placeholder="Enter Last Name" v-model="lastname" :class="{'p-invalid': lastnameError && !lastnameMeta.valid}" />
                            <small class="p-error">{{ lastnameError }}</small>                        
                        </div>
                    </div>
                    <h5><i class="pi pi-lock"></i> Login Credentials</h5>
                    <hr />
                    <div class="p-grid">
                        <div class="p-field p-lg-6 p-md-12">
                            <label for="username">Username</label>
                            <InputText id="username" type="text" placeholder="Enter Username" v-model="username" :class="{'p-invalid': usernameError && !usernameMeta.valid}" />
                            <small class="p-error">{{ usernameError }}</small>                        
                        </div>
                        <div class="p-field p-lg-6 p-md-12">
                            <label for="password">Password</label>
                            <InputText id="password" type="password" placeholder="Enter Password" v-model="password" :class="{'p-invalid': passwordError && !passwordMeta.valid}" />
                            <small class="p-error">{{ passwordError }}</small>                        
                        </div>
                    </div>
                </div>
                <div class="p-d-flex">
                    <Button label="Submit" type="submit" class="p-button-primary" />
                </div>
            </form>
            </div>
    </div>
</template>

<script>
import MyBreadcrumb from '../../components/MyBreadcrumb.vue';
import InputText from 'primevue/inputtext/sfc';
import Button from 'primevue/button/sfc';

import { user } from '../../stores/users.js'
import store from '../../store.js'
import { useForm, useField } from 'vee-validate';

export default {
    data() {
        return {
            home: {icon: 'pi pi-home', to: '/users'},
            items: [{label: 'New User', to: '/users/new'}],
        }
    },    
    setup() {

        const init = {
            initialValues: {
                user: {...user}
            }
        }

        const { setValues, handleSubmit } = useForm(init);

        const onSubmit = handleSubmit((values, actions) => {
            console.log(values);
            if (values.user.id == 0) {
                store.dispatch('users/CREATE', values.user)
                actions.resetForm();
            } else {

            }
        });

        function validateField(value) {
            if (!value) {
                return "This field is required";
            }
            return true;
        }

        function validatePassword(value) {
            if (!value) {
                return "Password is required";
            }

            if (value.length < 8) {
                return "Password must contain at least 8 characters";
            }

            return true;            
        }

        function validField(value) {
            return true;
        }        

        // No need to define rules for fields
        const { value: id } = useField('user.id',validField);
        const { value: firstname, errorMessage: firstnameError, meta: firstnameMeta } = useField('user.firstname',validateField);
        const { value: middlename, errorMessage: middlenameError } = useField('user.middlename',validField);
        const { value: lastname, errorMessage: lastnameError, meta: lastnameMeta } = useField('user.lastname',validateField);
        const { value: username, errorMessage: usernameError, meta: usernameMeta } = useField('user.username',validateField);
        const { value: password, errorMessage: passwordError, meta: passwordMeta } = useField('user.password',validatePassword);

        return {
            id,
            firstname,
            middlename,
            lastname,
            username,
            password,
            firstnameError,
            middlenameError,
            lastnameError,
            usernameError,
            passwordError,
            firstnameMeta,
            lastnameMeta,
            usernameMeta,
            passwordMeta,
            onSubmit,
            setValues,
        }
    },
    components: {
        MyBreadcrumb,
        InputText,
        Button,
    },
    computed: {
        user() {
            return this.$store.state.users.user
        },
    },
    methods: {
        init() {
            this.$store.dispatch('users/INIT')
        },
    },
    mounted() {
        this.init()
        // this.setValues({
        //     user: {...this.user}
        // })    
    }
}
</script>

<style scoped>

</style>