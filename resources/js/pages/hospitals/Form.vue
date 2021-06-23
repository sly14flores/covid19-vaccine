<template>
    <div>
        <MyBreadcrumb :home="home" :items="items" />
        <div class="p-grid">
            <div class="p-col-12 p-mt-2">
            <form @submit="onSubmit">
                <div class="card p-fluid">
                    <div class="p-fluid p-formgrid p-grid">
                        <div class="p-field p-col-10 p-md-11">
                            <h6><i class="pi pi-user"></i> Hospital Information </h6>
                        </div>
                        <div class="p-field p-col-2 p-md-1">
                            <ToggleButton class="p-ml-3" v-if="editMode" v-model="writeOn" onIcon="pi pi-ban" offIcon="pi pi-pencil" change="toggleWrite" />
                        </div>
                    </div>
                    <hr />
                    <div class="p-fluid p-formgrid p-grid">
                        <div class="p-field p-col-12 p-md-6">
                            <label for="description">Description <i class="p-error">*</i></label>
                            <InputText class="p-shadow-1" id="description" type="text" placeholder="Enter Description" v-model="description" :class="{'p-invalid': descriptionError}" :disabled="editMode && !writeOn" />
                            <small class="p-error">{{ descriptionError }}</small>
                        </div>
                        <div class="p-field p-col-12 p-md-6">
                            <label for="slots">Slots <i class="p-error">*</i></label>
                            <InputText class="p-shadow-1" id="slots" type="number" placeholder="Enter Slots" v-model="slots" :class="{'p-invalid': slotsError}" :disabled="editMode && !writeOn" />
                            <small class="p-error">{{ slotsError }}</small>
                        </div>
                    </div>
                    <div class="p-fluid p-formgrid p-grid">
                        <div class="p-field p-col-12 p-md-6">
                            <label for="cbcr_id">Bakuna Center CBCR ID <i class="p-error">*</i></label>
                            <InputText class="p-shadow-1" id="cbcr_id" type="text" placeholder="Enter Description" v-model="cbcr_id" :class="{'p-invalid': cbcr_idError}" :disabled="editMode && !writeOn" />
                            <small class="p-error">{{ cbcr_idError }}</small>
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

import { hospital } from '../../stores/hospitals.js'
import { useStore } from 'vuex'
import { useForm, useField } from 'vee-validate'
import { useRoute } from 'vue-router'
import { watch } from 'vue'
import { useConfirm } from "primevue/useconfirm"

export default {
    props: ['editOn'],
    setup(props) {

        const { editOn } = props
        const editMode = eval(editOn)
        const route = useRoute()
        const { params } = route
        const hospitalId = params.id || null
        const store = useStore()
        const { state, dispatch } = store
        const confirm = useConfirm()

        const init = {
            initialValues: {
                hospital: {...hospital}
            }
        }

        const { setValues, handleSubmit, resetForm } = useForm(init);

        watch(
            () => state.hospitals.hospital,
            (data, prevData) => {
                setValues({
                    hospital: {...data}
                })
            }
        )

        if (editMode) { // Edit
        console.log(editMode)
            dispatch('hospitals/GET_HOSPITAL', { id: hospitalId })
        } else { // New
        console.log(editMode)
            resetForm();
        }

        const onSubmit = handleSubmit((values, actions) => {

            const { resetForm } = actions
            const { hospital } = values

            confirm.require({
                message: (editMode)?"Are you sure you want to add update this hospital's info?":'Are you sure you want to add this new hospital?',
                header: 'Confirmation',
                icon: 'pi pi-exclamation-triangle',
                accept: () => {
                    if (editMode) {
                        dispatch('hospitals/UPDATE_HOSPITAL', hospital)
                    } else {
                        dispatch('hospitals/CREATE_HOSPITAL', hospital)
                        resetForm();
                    }
                },
                reject: () => {
                    //callback to execute when hospital rejects the action
                }
            });

        });

        function validateField(value) {
            if (!value) {
                return "This field is required";
            }
            return true;
        }

        function validField(value) {
            return true;
        }

        // No need to define rules for fields
        const { value: id } = useField('hospital.id',validField);
        const { value: description, errorMessage: descriptionError } = useField('hospital.description',validateField);
        const { value: cbcr_id, errorMessage: cbcr_idError } = useField('hospital.cbcr_id',validateField);
        const { value: slots, errorMessage: slotsError } = useField('hospital.slots',validateField);

        return {
            id,
            description,
            slots,
            cbcr_id,
            cbcr_idError,
            descriptionError,
            slotsError,
            onSubmit,
            editMode
        }
    },
    data() {
        return {
            home: {icon: 'pi pi-home', to: '/hospitals'},
            items: [{label: (this.editMode)?'Edit Hospital':'New Hospital', to: `${this.$route.fullPath}`}],
        }
    },
    components: {
        MyBreadcrumb,
        InputText,
        Button,
        Divider,
        ToggleButton,
        Dropdown
    },
    computed: {
        saving() {
            return this.$store.state.hospitals.saving
        },
        writeOn: {
            set(value) {
                this.$store.dispatch('hospitals/TOGGLE_WRITE', value)
            },
            get() {
                return this.$store.state.hospitals.writeOn
            }
        }
    },
    methods: {
        close() {
            this.$store.dispatch('hospitals/INIT')
            this.$router.push('/hospitals')
        },
        toggleWrite() {
            this.writeOn = !this.writeOn
        }
    },
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
input[type="number"]:disabled {
    background: rgb(219, 219, 219);
    border-bottom: 1px solid black;
    cursor: not-allowed; 
}

</style>