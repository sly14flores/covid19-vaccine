<template>
    <div>
        <div class="navbar">
            <a href=""><img alt="logo" src="img/launion-logo.png" class="lu-logo" /></a>
            <h5 class="p-mt-3 p-label-white">La Union CoViD-19 Vaccination Survey</h5>
        </div>
        <div class="p-grid p-jc-center p-mt-4">
            <div class="p-lg-4 p-sm-12 p-xs-12">
                <div class="card p-fluid">
                    <div class="p-grid p-jc-center">
                        <div class="p-lg-10 p-sm-5 p-xs-5">
                            <img alt="logo" src="img/napanam_logo.png" class="napanam" />
                        </div>
                    </div>
                    <div class="p-grid p-jc-center p-mt-2">
                        <h6>Before your proceed to the registration, please complete the form below.</h6>
                    </div>
                    <hr />
                    <div class="p-field">
                        <label for="napanam_id"><i class="p-error">*</i> Napanam ID No.</label>
                        <span class="p-input-icon-right">
                            <i class="pi pi-id-card" />
                            <InputText class="p-shadow-1" type="number" />
                        </span>
                    </div>
                    <h6><i class="p-error">*</i> Birthdate</h6>
                     <div class="p-grid">
                         <div class="p-field p-col-12 p-md-6">
                            <label for="password">Month</label>
                            <span class="p-input">
                                <Dropdown class="p-shadow-1" optionLabel="name" placeholder="Select a month"/>
                            </span>
                        </div>
                        <div class="p-field p-col-12 p-md-3">
                            <label for="password">Day</label>
                            <span class="p-input">
                                <InputText class="p-shadow-1" type="number" placeholder="DD" />
                            </span>
                        </div>
                         <div class="p-field p-col-12 p-md-3">
                            <label for="password">Year</label>
                            <span class="p-input">
                                <InputText class="p-shadow-1" type="number" placeholder="YYYY" />
                            </span>
                        </div>
                    </div>
                    <div class="p-grid p-jc-center">
                        <div class="p-lg-4 p-sm-12 p-xs-12">
                            <Button label="Proceed" class="p-button-raised p-button-primary" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

import Button from 'primevue/button/sfc';
import InputText from 'primevue/inputtext/sfc';
import Dropdown from 'primevue/dropdown/sfc';
import Menubar from 'primevue/menubar/sfc';

export default {
     components: {
        Button,
        InputText,
        Dropdown,
        Menubar

    },  
}
</script>

<style scoped>
    .navbar {
        overflow: hidden;
        background-color: #215266;
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
    .napanam {
        height: 100px;
    }
    @media screen and (max-width: 400px) {
        .napanam {
        height: 80px;
        }
    }
    .card {
        border-top: 3px solid #0b7ad1;
    }
    .menu-bar{
        background-color: #215266;
    }
    .p-label-white {
        color: white;
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