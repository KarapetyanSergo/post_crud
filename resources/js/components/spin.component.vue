<template>
    <div class="text-center">
        <b-spinner variant="primary"></b-spinner>
    </div>
</template>

<script>
export default {
    name: "Spin.vue"
}
</script>

<style scoped>
    .spinner{
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
    }
</style>
