<template>
    <div>
        <div class="p-grid p-jc-center p-mt-6">
            <div class="p-lg-4 p-sm-12 p-xs-12">
                <div class="card p-fluid">
                    <div class="p-grid p-jc-center">
                        <div class="p-lg-5 p-sm-5 p-xs-5">
                            <img alt="logo" src="img/Rugian.png" class="rugian">
                        </div>
                    </div>
                    <h5 class="p-mt-2"><center>Sign in to start your session</center></h5> <hr />
                    <div class="p-field">
                        <label for="username">Username</label>
                        <span class="p-input-icon-right">
                            <i class="pi pi-user" />
                            <InputText type="text" />
                        </span>
                    </div>

                    <div class="p-field">
                        <label for="password">Password</label>
                        <span class="p-input-icon-right">
                            <i class="pi pi-lock" />
                            <InputText type="password" />
                        </span>
                    </div>
                    <div class="p-grid p-jc-center">
                        <div class="p-lg-4 p-sm-12 p-xs-12">
                            <Button label="Sign In" class="p-button-raised p-button-primary" />
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

export default {
     components: {
        Button,
        InputText
    },  
}
</script>

<style scoped>
.rugian {
    width: 200px;
}
.card {
    border-top: 3px solid #0b7ad1;
}
</style>