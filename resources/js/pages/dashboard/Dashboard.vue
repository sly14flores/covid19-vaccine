<template>
    <div>
        <Breadcrumb :home="home" :model="items" />
    </div>
</template>

<script>
import Breadcrumb from 'primevue/breadcrumb/sfc';

export default {
    components: {
        Breadcrumb
    },
    data() {
        return {
            home: {icon: 'pi pi-home', to: '/'},
            items: [],            
        }
    }
}
</script>

<style scoped>

</style>