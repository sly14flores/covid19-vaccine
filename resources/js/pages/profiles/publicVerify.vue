<template>
    <div>
        <div class="navbar">
            <a href=""><img alt="logo" src="img/launion-logo.png" class="lu-logo" /></a>
            <h5 class="p-mt-3 p-label-white">La Union CoViD-19 Vaccination</h5>
        </div>
        <form @submit="onSubmit">
            <div class="p-grid p-jc-center p-mt-4">
                <div class="p-lg-4 p-sm-12 p-xs-12">
                    <Card class="p-border-top">
                        <template #header>
                            <img alt="user header" src="img/napanam-logo-sm.png">
                        </template>
                        <template #content>
                            <div class="p-grid p-jc-center p-mt-2">
                                <h6 class="p-text-center">For verification, please complete the form below.</h6>
                            </div>
                            <hr />
                            <div class="p-fluid p-formgrid p-grid">
                                <div class="p-field p-col-12 p-md-12">
                                    <label for="napanam_id">Napanam ID No.: <i class="p-error">*</i></label>
                                    <span class="p-input-icon-right">
                                        <i class="pi pi-id-card" />
                                        <InputText class="p-shadow-1" type="number" placeholder="Enter your Napanam ID No." v-model="id" :class="{'p-invalid': idError}" />
                                    </span>
                                    <small class="p-error">{{ idError }}</small>
                                </div>
                            </div>
                            <h6>Birthdate: <small><i class="text-gray">(Araw ng Kapanganakan)</i></small> <i class="p-error">*</i></h6>
                            <div class="p-fluid p-formgrid p-grid">
                                <div class="p-field p-col-12 p-md-4">
                                    <label for="month"><small>Month <i class="text-gray"> (Buwan)</i></small></label>
                                    <Dropdown class="p-shadow-1" optionLabel="name" :options="month_value" optionValue="id" v-model="month" placeholder="Select a month" :class="{'p-invalid': monthError}" />
                                    <small class="p-error">{{ monthError }}</small>
                                </div>
                                <div class="p-field p-col-12 p-md-4">
                                    <label for="day"><small>Day <i class="text-gray"> (Petsa)</i></small></label>
                                    <Dropdown class="p-shadow-1" optionLabel="name" :options="day_value" optionValue="id" v-model="day" placeholder="DD" :class="{'p-invalid': dayError}" />
                                    <small class="p-error">{{ dayError }}</small>
                                </div>
                                <div class="p-field p-col-12 p-md-4">
                                    <label for="year"><small>Year <i class="text-gray"> (Taon)</i></small></label>
                                    <InputText class="p-shadow-1" type="number" placeholder="YYYY" v-model="year" :class="{'p-invalid': yearError}" />
                                    <small class="p-error">{{ yearError }}</small>
                                </div>
                            </div>
                            <hr />
                            <div class="p-grid p-jc-center">
                                <div class="p-lg-3 p-sm-12 p-xs-12">
                                    <Button label="Proceed" type="submit" class="p-button-raised p-button-primary" />
                                </div>
                            </div>
                        </template>
                    </Card>
                </div>
            </div>
        </form>
    </div>
</template>

<script>

import Button from 'primevue/button/sfc';
import InputText from 'primevue/inputtext/sfc';
import Dropdown from 'primevue/dropdown/sfc';
import Menubar from 'primevue/menubar/sfc';
import Card from 'primevue/card/sfc';

import { useStore } from 'vuex'
import { useForm, useField } from 'vee-validate'
import { watch } from 'vue'
import { useRouter } from 'vue-router'

const verification = {
    id: null,
    month: null,
    day: null,
    year: null
}

export default {
    setup() {
        
        const router = useRouter()
        const store = useStore()

        store.dispatch('profiles/INIT_REGISTRATION')

        const init = {
            initialValues: {
                verification
            }
        }

        const { handleSubmit } = useForm(init);

        const onSubmit = handleSubmit((values) => {
            const birthdate = `${values.registration.year}-${values.registration.month}-${values.registration.day}`
            store.dispatch('profiles/GET_REGISTRATION', { id: values.registration.id, birthdate })
        });

        watch(
            () => store.state.profiles.registration.qr_pass_id,
            (data, prevData) => {                
                if (data) {
                    router.push('/')
                }
            }
        )
        
        function validateField(value) {
            if (!value) {
                return "This field is required";
            }
            return true;
        }

        console.log("here")

        const { value: id, errorMessage: idError } = useField('registration.id',validateField);
        const { value: year, errorMessage: yearError } = useField('registration.year',validateField);
        const { value: month, errorMessage: monthError } = useField('registration.month',validateField);
        const { value: day, errorMessage: dayError } = useField('registration.day',validateField);

        return {
            id,
            year,
            month,
            day,
            idError,
            yearError,
            monthError,
            dayError,
            onSubmit,
        }

    },

    computed:{
        month_value() {

            return this.$store.state.profiles.selections.month_value

        },
        day_value() {

            return this.$store.state.profiles.selections.day_value

        },
    },
    methods: {
        fetchSelections() {
            this.$store.dispatch('profiles/GET_SELECTIONS')
        },
        openConfirmation() {
            this.displayConfirmation = true;
        },
        closeConfirmation() {
            this.displayConfirmation = false;
        },
    },
    mounted() {
        this.fetchSelections()
    },
    components: {
        Button,
        InputText,
        Dropdown,
        Menubar,
        Card
    },  
}
</script>

<style scoped>
    .navbar {
        overflow: hidden;
        background-color: #92c1bd;
        position: relative;
        top: 0;
        height: 55px;
        width: 100%;
    }
    .navbar a {
        float: left;
        display: block;
        color: #f2f2f2;
        text-align: center;
        padding: 1px 4px;
        text-decoration: none;
        font-size: 19px;
    }
    .lu-logo {
        height: 50px;
    }
    @media screen and (max-width: 400px) {
        .napanam {
            height: 80px;
        }
    }
    .p-border-top {
        border-top: 4px solid #215266;
        margin-left: 10px;
        margin-right: 10px;
    }
    .menu-bar{
        background-color: #215266;
    }
    .p-label-white {
        color: white;
    }
    .text-gray {
        color: rgb(102, 102, 102);
    }
    /* Remove arrow for input="number"*/
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
    -webkit-appearance: none;
        margin: 0;
    }

    /* Firefox */
    input[type=number] {
        -moz-appearance: textfield;
    }
</style>