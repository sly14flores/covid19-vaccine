<template>
    <div>
        <div class="navbar">
            <a href=""><img alt="logo" src="img/launion-logo.png" class="lu-logo" /></a>
            <h5 class="p-mt-3 p-label-white">La Union CoViD-19 Vaccination</h5>
        </div>
        <div class="p-grid p-jc-center p-mt-4">
            <div class="p-lg-6 p-md-12 p-xs-12">
                <div class="card p-fluid">
                    <div class="p-grid p-jc-center">
                        <div class="p-lg-2 p-md-2 p-xs-1">
                            <img alt="logo" src="img/schedule.png" class="calendar" />
                        </div>
                    </div>
                    <div class="p-grid p-jc-center p-mt-2">
                        <h1 class="p-label-red">SCHEDULE AN APPOINTMENT</h1>
                    </div>
                    <div class="p-grid">
                        <div class="p-field p-col-12 p-md-12">
                            <h5>Site <i class="p-error">*</i></h5>
                            <span class="p-input">
                                <Dropdown class="p-shadow-1" optionLabel="name" placeholder="Select a Site"/>
                            </span>
                        </div>
                    </div>
                    <h5>Date <i class="p-error">*</i></h5>
                    <div class="p-grid">
                        <div class="p-field p-col-12 p-md-6">
                            <label>Month</label>
                            <span class="p-input">
                                <Dropdown class="p-shadow-1" optionLabel="name" placeholder="Select a month"/>
                            </span>
                        </div>
                        <div class="p-field p-col-12 p-md-3">
                            <label>Day</label>
                            <span class="p-input">
                                <InputText class="p-shadow-1" type="number" placeholder="DD" />
                            </span>
                        </div>
                        <div class="p-field p-col-12 p-md-3">
                            <label>Year</label>
                            <span class="p-input">
                                <InputText class="p-shadow-1" type="number" placeholder="YYYY" />
                            </span>
                        </div>
                    </div>
                    <h5><i class="p-error">*</i> Time</h5>
                    <SelectButton v-model="value1" :options="options"/>
                    <SelectButton v-model="value1" :options="options1"/>
                    <br />
                    <div class="p-grid p-jc-center">
                        <div class="p-lg-4 p-sm-12 p-xs-12">
                            <Button label="Submit" class="p-button-raised p-button-success" />
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
import RadioButton from 'primevue/radiobutton/sfc';
import SelectButton from 'primevue/selectbutton/sfc';

export default {
    data() {
        return {
            value1: null,
            options: ['8:00 - 9:00 AM (18 slots)', '9:00 - 10:00 AM (18 slots)','10:00 - 11:00 AM (18 slots)', '11:00 - 12:00 PM (18 slots)'],
            options1: ['1:00 - 2:00 PM (18 slots)', '2:00 - 3:00 PM (18 slots)','3:00 - 4:00 PM (18 slots)', '4:00 - 5:00 PM (18 slots)'],
        }
    },
     components: {
        Button,
        InputText,
        Dropdown,
        Menubar,
        RadioButton,
        SelectButton
    },  
}
</script>

<style scoped>
    .text-center {
        text-align: center;
    }
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
    .calendar {
        height: 100px;
    }
    .card {
        border-top: 5px solid #215266;
    }
    .menu-bar{
        background-color: #215266;
    }
    .p-label-white {
        color: white;
    }
    .p-label-red {
        color: #A2452F;
        font-weight: bold;
        font-family: Arial, Helvetica, sans-serif;
    }
    @media screen and (max-width: 800px) {
        .calendar {
            height: 80px;
        }
        .p-label-red {
            font-size: 20px;
        }
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