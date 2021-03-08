<template>
    <div>           
        <div class="p-grid p-jc-center p-mt-2">
            <div class="p-lg-6 p-md-12 p-xs-12">
                <div class="card p-fluid">
                    <div class="p-grid p-jc-center">
                        <div class="p-lg-2 p-md-2 p-xs-5">
                            <img alt="logo" src="img/qr-code.png" class="qr-code" />
                        </div>
                    </div>
                    <div class="p-grid p-jc-center p-mt-2">
                        <h1 class="p-label-red">Napanam QR Scanning</h1>
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
    </div>
</template>

<script>

import Button from 'primevue/button/sfc';
import InputText from 'primevue/inputtext/sfc';
import Dropdown from 'primevue/dropdown/sfc';
import Menubar from 'primevue/menubar/sfc';

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
        QrDropzone
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
    .p-label-red {
        color: #215266;
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