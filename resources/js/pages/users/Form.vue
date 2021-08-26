<template>
    <div>
        <Toast class="p-mt-6" position="top-right" />
        <MyBreadcrumb :home="home" :items="items" />
        <div class="p-grid">
            <div class="p-col-12 p-mt-2">
            <form @submit="onSubmit">
                <div class="card p-fluid">
                    <div class="p-fluid p-formgrid p-grid">
                        <div class="p-field p-col-10 p-md-11">
                            <h6><i class="pi pi-user"></i> User Information </h6>
                        </div>
                        <div class="p-field p-col-2 p-md-1">
                            <ToggleButton class="p-ml-3" v-if="editMode" v-model="writeOn" onIcon="pi pi-ban" offIcon="pi pi-pencil" change="toggleWrite" />
                        </div>
                    </div>
                    <hr />
                    <div class="p-fluid p-formgrid p-grid">
                        <div class="p-field p-col-12 p-md-4">
                            <label for="firstname">First Name <i class="p-error">*</i></label>
                            <InputText class="p-shadow-1" id="firstname" type="text" placeholder="Enter First Name" v-model="firstname" :class="{'p-invalid': firstnameError}" :disabled="editMode && !writeOn" />
                            <small class="p-error">{{ firstnameError }}</small> 
                        </div>
                        <div class="p-field p-col-12 p-md-4">
                            <label for="middlename">Middle Name <small>(Optional)</small></label>
                            <InputText class="p-shadow-1" id="middlename" type="text" placeholder="Enter Middle Name" v-model="middlename" :disabled="editMode && !writeOn" />
                        </div>
                        <div class="p-field p-col-12 p-md-4">
                            <label for="lastname">Last Name <i class="p-error">*</i></label>
                            <InputText class="p-shadow-1" id="lastname" type="text" placeholder="Enter Last Name" v-model="lastname" :class="{'p-invalid': lastnameError}" :disabled="editMode && !writeOn" />
                            <small class="p-error">{{ lastnameError }}</small>                        
                        </div>
                    </div>
                    <div class="p-fluid p-formgrid p-grid">
                        <div class="p-field p-col-12 p-md-4">
                            <label>Facility</label>
                            <Dropdown class="p-shadow-1" :options="hospitals" optionLabel="description" optionValue="id" v-model="hospital" placeholder="Select a Facility" :class="{'disabled': editMode && !writeOn}" :disabled="editMode && !writeOn" />
                        </div>
                        <div class="p-field p-col-12 p-md-4">
                            <label>Group</label>
                            <Dropdown class="p-shadow-1" :options="groups" optionLabel="name" optionValue="id" v-model="group_id" placeholder="Select a Group" :class="{'p-invalid': group_idError, 'disabled': editMode && !writeOn}" :disabled="editMode && !writeOn" />
                            <small class="p-error">{{ group_idError }}</small>   
                        </div>
                        <div class="p-field p-col-12 p-md-4">
                            <label>Profession</label>
                            <Dropdown class="p-shadow-1" :options="professions" optionLabel="name" optionValue="id" v-model="profession" placeholder="Select a Profession" :class="{'disabled': editMode && !writeOn}" :disabled="editMode && !writeOn" />
                        </div>
                        <div class="p-field p-col-12 p-md-4">
                            <label>License No.</label>
                            <InputText class="p-shadow-1" id="prc_number" type="text" placeholder="Enter License No" v-model="prc_number" :class="{'disabled': editMode && !writeOn}" :disabled="editMode && !writeOn" />
                        </div>
                    </div>

                    <h5><i class="pi pi-lock"></i> Login Credentials</h5>
                    <hr />
                    <div class="p-grid">
                        <div class="p-field p-lg-6 p-md-12">
                            <label for="username">Username <i class="p-error">*</i></label>
                            <InputText class="p-shadow-1" id="username" type="text" placeholder="Enter Username" v-model="username" :class="{'p-invalid': usernameError}" :disabled="editMode && !writeOn" />
                            <small class="p-error">{{ usernameError }}</small>                     
                        </div>
                        <div class="p-field p-lg-6 p-md-12">
                            <label for="password">Password <i class="p-error">*</i></label>
                            <InputText class="p-shadow-1" id="password" type="password" placeholder="Enter Password" v-model="password" :class="{'p-invalid': passwordError}" :disabled="editMode" />
                            <small class="p-error">{{ passwordError }}</small>                        
                        </div>
                    </div>
                    <hr />
                    <div class="p-fluid p-formgrid p-grid">
                        <div class="p-field p-col-12 p-md-10"></div>
                        <div class="p-field p-col-12 p-md-1">
                            <Button type="submit" class="p-button-primary" :disabled="!writeOn && editMode"><i v-if="saving" class="pi pi-spin pi-spinner"></i>&nbsp;{{(editMode)?'Update':'Save'}}</Button>
                        </div>
                        <div class="p-field p-col-12 p-md-1">
                            <Button type="button" :label="(editMode)?'Close':'Cancel'" class="p-button-danger p-ml-2" @click="close" />
                        </div>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</template>

<script>
import MyBreadcrumb from '../../components/MyBreadcrumb.vue';
import InputText from 'primevue/inputtext/sfc';
import Dropdown from 'primevue/dropdown/sfc';
import Button from 'primevue/button/sfc';
import Divider from 'primevue/divider/sfc';
import ToggleButton from 'primevue/togglebutton/sfc';

import { user } from '../../stores/users.js'
import { useStore } from 'vuex'
import { useForm, useField } from 'vee-validate'
import { useRoute } from 'vue-router'
import { watch } from 'vue'
import { useConfirm } from "primevue/useconfirm"

import Toast from 'primevue/toast';
import { useToast } from "primevue/usetoast"

export default {
    props: ['editOn'],
    setup(props) {

        const toast = useToast()
        const { editOn } = props
        const editMode = eval(editOn)
        const route = useRoute()
        const { params } = route
        const userId = params.id || null
        const store = useStore()
        const { state, dispatch } = store
        const confirm = useConfirm()

        dispatch('users/GET_GROUPS')

        const init = {
            initialValues: {
                user: {...user}
            }
        }

        const { setValues, handleSubmit, resetForm } = useForm(init);

        watch(
            () => state.users.user,
            (data, prevData) => {
                setValues({
                    user: {...data}
                })
            }
        )

        if (editMode) { // Edit
            dispatch('users/GET_USER', { id: userId })
        } else { // New
            resetForm();
        }

        const onSubmit = handleSubmit((values, actions) => {

            const { resetForm } = actions
            const { user } = values

            confirm.require({
                message: (editMode)?"Are you sure you want to add update this user's info?":'Are you sure you want to add this new user?',
                header: 'Confirmation',
                icon: 'pi pi-exclamation-triangle',
                accept: () => {
                    if (editMode) {
                        dispatch('users/UPDATE_USER', user)
                        toast.add({severity:'success', summary: 'Successfully Updated!', detail:'User Information', life: 3000});
                    } else {
                        dispatch('users/CREATE_USER', user)
                        toast.add({severity:'success', summary: 'Successfully Added!', detail:'User Information', life: 3000});
                        resetForm();
                    }
                },
                reject: () => {
                    //callback to execute when user rejects the action
                }
            });

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
        const { value: firstname, errorMessage: firstnameError } = useField('user.firstname',validateField);
        const { value: middlename, errorMessage: middlenameError } = useField('user.middlename',validField);
        const { value: lastname, errorMessage: lastnameError } = useField('user.lastname',validateField);
        const { value: hospital } = useField('user.hospital',validField);
        const { value: group_id, errorMessage: group_idError } = useField('user.group_id',validateField);
        const { value: profession } = useField('user.profession',validField);
        const { value: prc_number } = useField('user.prc_number',validField);
        const { value: username, errorMessage: usernameError } = useField('user.username',validateField);
        const { value: password, errorMessage: passwordError } = useField('user.password',(editMode)?validField:validatePassword);

        return {
            id,
            firstname,
            middlename,
            lastname,
            hospital,
            group_id,
            profession,
            prc_number,
            username,
            password,
            firstnameError,
            middlenameError,
            lastnameError,
            group_idError,
            usernameError,
            passwordError,
            onSubmit,
            editMode,
        }
    },
    data() {
        return {
            // writeOn: false,
            home: {icon: 'pi pi-home', to: '/users'},
            items: [{label: (this.editMode)?'Edit User':'New User', to: `${this.$route.fullPath}`}]
        }
    },
    components: {
        MyBreadcrumb,
        InputText,
        Button,
        Divider,
        ToggleButton,
        Dropdown,
        Toast
    },
    computed: {
        saving() {
            return this.$store.state.users.saving
        },
        writeOn: {
            set(value) {
                this.$store.dispatch('users/TOGGLE_WRITE', value)
            },
            get() {
                return this.$store.state.users.writeOn
            }
        },
        hospitals() {
            return this.$store.state.users.hospitals
        },
        groups() {

            return this.$store.state.users.groups

        },
        professions() {

            if (!this.groups) return []

            const group_id = this.groups.filter(group_id => {
                return group_id.id == this.group_id
            })

            if (group_id.length==0) return []

            const professions = group_id[0].professions

            return professions

        },
    },
    methods: {
        close() {
            this.$store.dispatch('users/INIT')
            this.$router.push('/users')
        },
        toggleWrite() {
            this.writeOn = !this.writeOn
        }
    },
    mounted() {
        this.$store.dispatch('users/GET_HOSPITALS')
    }
}
</script>
<style scoped>

.float-right {
    position: absolute; right: 3%;
}
input[type="text"]:disabled {
    background: rgb(219, 219, 219);
    border-bottom: 1px solid black;
    cursor: not-allowed; 
}
input[type="password"]:disabled, .disabled {
    background: rgb(219, 219, 219);
    border-bottom: 1px solid black;
    cursor: not-allowed; 
}
.disabled {
    background: rgb(219, 219, 219);
    border-bottom: 1px solid black;
    cursor: not-allowed; 
}

</style>