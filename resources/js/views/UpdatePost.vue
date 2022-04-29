<template>
    <postForm :cu="method"></postForm>
</template>

<script>
import postForm from "../components/postForm.component";
export default {
    name: "UpdatePost",
    data() {
        return {
            method: 'update'
        }
    },
    components: {
        postForm
    }
}
</script>

<style scoped>

</style>
