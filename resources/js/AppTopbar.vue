<template>
	<div class="layout-topbar">
		<button class="p-link layout-menu-button" @click="onMenuToggle">
			<span class="pi pi-bars"></span>
		</button>
        <label class="float-right">SAN FERNANDO CITY</label>
	</div>
</template>

<script>

import InputText from 'primevue/inputtext/sfc'

export default {
	components: {
		InputText
	},
    methods: {
        onMenuToggle(event) {
            this.$emit('menu-toggle', event);
        }
    }
}
</script>

<style scoped>
.layout-topbar {
	position: fixed;
    height: 50px;
    padding: 1em 2em 0em 2em;
    color: #ffffff;
    z-index: 999;
    right: 0;
    background: #000000; 
    background: linear-gradient(to right, #68bca4 0%, #81d6be 100%);
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr=#68bca4, endColorstr=#81d6be,GradientType=1 );
    transition: left 0.2s;
}
.float-right {
    float: right;
}
</style>