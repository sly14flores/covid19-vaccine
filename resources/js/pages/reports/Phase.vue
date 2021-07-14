<template>
    <component v-bind:is="pageComponent"></component>
</template>

<script>
export default {
    props: ['pageComponent'],
    setup() {
        
    },
}
</script>