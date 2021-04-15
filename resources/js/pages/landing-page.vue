<template>
    <div>
        <div class="navbar">
            <a href=""><img alt="logo" src="img/launion-logo.png" class="nav-logo" /></a>
            <h5 class="p-mt-3 p-label-white">La Union CoViD-19 Vaccination</h5>
        </div>
        <div class="p-grid">
            <div class="p-lg-4 p-sm-12 remove-background">
                <div class="background">
                    <img alt="logo" src="img/launion-logo.png" class="lu-logo" />
                    <div class="text-content">
                        <p class="p1">COVID-19</p>
                        <p class="p1">VACCINATION</p>
                        <p>PROGRAM</p>
                    </div>
                </div>
            </div>
            <div class="p-lg-2 p-sm-12 remove-background"></div>
            <div class="p-lg-6 p-sm-12">
                <div class="p-lg-9 p-sm-12">
                    <Card>
                        <template #header>
                            <img alt="user header" src="img/Bakuna-muna.png" class="bakuna-logo">
                        </template>
                        <template #content>
                            <div class="text-content-card">
                                <p>THE MUCH-AWAITED ROLL OUT OF THE VACCINATION PROGRAM IN OUR PROVINCE THAT TRULY RADIATES HOPE AND OPTIMISM.</p>
                                <p>SHARE THE LOVE, NOT THE VIRUS</p>
                                <p>REGISTER NOW!</p>
                            </div>
                        </template>
                        <template #footer>
                                <center><button class="button p-ml-2" style="vertical-align:middle"><span>VACCINE REGISTRATION</span></button></center>
                        </template>
                    </Card>
                </div>
                <div class="p-lg-9 p-sm-12">
                    <Card>
                        <template #header>
                            <img alt="user header" src="img/Rugian.png" class="rugian-logo">
                        </template>
                        <template #content>
                            <div class="text-content-card">
                                <p>COVID-19 FREE LA UNION</p>
                                <p>MAKIBAHAGI SA UNANG HAKBANG!</p>
                                <p>SHARE YOUR THOUGHTS ON THE COVID-19 VACCINATION THROUGH THIS SURVEY.</p>
                            </div>
                        </template>
                        <template #footer>
                                <center><button class="button p-ml-2" style="vertical-align:middle"><span>TAKE THE SURVEY </span></button></center>
                        </template>
                    </Card>
                </div>
            </div>
        </div>
        
    </div>
</template>

<script>

import Card from 'primevue/card/sfc';

export default {
    setup() {

    },
    components: {
        Card
    },
    data() {
        return {
           
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

<style scoped>
    .navbar {
        display: none;
    }
    .nav-logo {
        height: 50px;
    }
    .background {
        position: fixed;
        top: 0px;
        left: 0px;
        width: 40%;
        height: 100%;
        background-color: #92c1bd;
        z-index: 1;
    }
    @media only screen and (max-width: 600px) {
        .background, .remove-background {
            display: none;
        }
        .navbar {
            overflow: hidden;
            background-color: #92c1bd;
            position: relative;
            top: 0;
            height: 55px;
            width: 100%;
            display: block;
        }
        .navbar a {
            float: left;
            display: block;
            text-align: center;
            padding: 1px 4px;
            text-decoration: none;
            font-size: 19px;
        }
    }
    .lu-logo{
        width: 20%;
        margin-top: 25%;
        margin-left: 40%;
    }
    .bakuna-logo{
        margin-top: 5%;
        width: 50%;
        margin-left: 28%;
    }
    .rugian-logo{
        margin-top: 5%;
        width: 30%;
        margin-left: 38%;
    }
    .text-content {
        position: relative;
        z-index: 2;
        padding: 10px;
        text-align: center;
        font-size: 40px;
        font-weight: bold;
        font-family: Verdana, sans-serif;
        color: #505050;
    }
    .text-content-card {
        position: relative;
        z-index: 2;
        padding: 10px;
        text-align: center;
        font-size: 11px;
        font-weight: bold;
        font-family: Arial, sans-serif;
        color: #7a7a7a;
    }
    .p1{
        margin-bottom: -10px;
    }
    .button {
        display: inline-block;
        border-radius: 4px;
        background-color: #90bbaf;
        border: none;
        color: #FFFFFF;
        text-align: center;
        font-size: 15px;
        padding: 10px;
        width: auto;
        transition: all 0.5s;
        cursor: pointer;
        margin: 5px;
    }
    .button span {
        cursor: pointer;
        display: inline-block;
        position: relative;
        transition: 0.5s;
    }
    .button span:after {
        content: '\00bb';
        position: absolute;
        opacity: 0;
        top: 0;
        right: -20px;
        transition: 0.5s;
    }
    .button:hover span {
        padding-right: 25px;
    }
    .button:hover span:after {
        opacity: 1;
        right: 0;
    }
</style>