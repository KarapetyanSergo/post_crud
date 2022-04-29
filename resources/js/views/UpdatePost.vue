<template>
    <postForm
        :cu="method"
        :post-desc="post.description"
        :post-title="post.title"
    ></postForm>
</template>

<script>
import postForm from "../components/postForm.component";
import Axios from "axios";
export default {
    name: "UpdatePost",
    data() {
        return {
            method: 'update',
            post: []
        }
    },
    components: {
        postForm
    }
}
</script>

<style scoped>

</style>
