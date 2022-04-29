<template>
    <createPost :cu="method"></createPost>
</template>

<script>
import createPost from "../components/postForm.component";
export default {
    name: "CreatePost",
    data() {
        return {
            method: 'create'
        }
    },
    components: {
        createPost
    }
}
</script>

<style scoped>

</style>
