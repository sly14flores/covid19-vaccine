<template>
    <div>
        <div class="card">
            <h5>Vaccines</h5>
            <TabView>
                <TabPanel header="QR Code Scanning">
                     <div class="p-grid p-jc-center p-mt-2">
                        <div class="p-lg-8 p-sm-12 p-xs-12">
                            <div class=" p-fluid p-shadow-2">
                                <div class="p-grid p-jc-center">
                                    <div class="p-lg-1 p-md-1 p-xs-5">
                                        <img alt="logo" src="img/qr-code.png" class="qr-code" />
                                    </div>
                                </div>
                                <div class="p-grid p-jc-center p-mt-2">
                                    <h2 class="p-label-blue">QR Code Scanning</h2>
                                </div>
                                <div class="p-grid">
                                    <div class="p-field p-col-12 p-md-12">
                                        <div class="center stream">
                                            <qr-stream @decode="onDecode" class="mb p-shadow-3">
                                                <div style="color: #fe664f;" class="frame"></div>
                                            </qr-stream>
                                        </div>
                                        <div class="center">
                                            Result: {{data}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </TabPanel>
                <TabPanel header="Search">
                    <div class="p-fluid p-formgrid p-grid">
                            <div class="p-field p-col-12 p-md-4">
                                <label for="qr_pass_id">Napanam ID No.: <i class="p-error">*</i></label>
                                <div class="p-inputgroup">
                                    <InputText class="p-shadow-1" id="qr_pass_id " type="text" placeholder="Enter Napanam ID No." />
                                    <Button label="Go!" class="p-button-primary"/>
                                </div>
                                <small class="p-error">Error here</small>
                            </div>
                        </div>
                </TabPanel>
            </TabView>
        </div>   
       
    </div>
</template>

<script>

import Button from 'primevue/button/sfc';
import InputText from 'primevue/inputtext/sfc';
import Dropdown from 'primevue/dropdown/sfc';
import Menubar from 'primevue/menubar/sfc';
import TabView from 'primevue/tabview';
import TabPanel from 'primevue/tabpanel';

import { QrStream, QrCapture, QrDropzone } from 'vue3-qr-reader';
import { reactive, toRefs } from 'vue';
 
export default {
    data() {
      
    },
    components: {
        Button,
        InputText,
        Dropdown,
        Menubar,
        QrStream,
        QrCapture,
        QrDropzone,
        TabView,
        TabPanel
    },
    setup() {
    const state = reactive({
      data: null
    })
    function onDecode(data) {
      state.data = data
    }
    return {
      ...toRefs(state),
      onDecode
    }
  }
}
</script>

<style scoped>
    .text-center {
        text-align: center;
    }
    .qr-code {
        height: 80px;
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
    .p-label-blue {
        color: #215266;
        font-weight: bold;
        font-family: Arial, Helvetica, sans-serif;
    }
    @media screen and (max-width: 800px) {
        .calendar {
            height: 80px;
        }
        .p-label-blue {
            font-size: 20px;
        }
        .qr-code{
            height: 60px;
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
    .stream {
        max-height: 500px;
        max-width: 500px;
        margin: auto;
    }
    .frame {
        border-style: solid;
        border-width: 2px;
        border-color: #fe664f;
        height: 200px;
        width: 200px;
        position: absolute;
        top: 0px;
        bottom: 0px;
        right: 0px;
        left: 0px;
        margin: auto;
    }
</style>