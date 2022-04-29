<template>
    <div id="postsBlock">
        <spin class="spinner" v-if="loading"></spin>
        <post v-for="post in posts"
              :id = "post.id"
              :title="post.title"
              :image="post.image"
              :description="post.description"
        />
    </div>
</template>

<script>
    import Spin from "../components/spin.component";
    import Post from "../components/post.component";
    import Axios from 'axios';

     export default {
         components: {
             Spin,
             Post
         },
         data: () => ({
             loading: true,
             posts: []
         }),
         mounted() {
             this.getPosts();
         },
         methods: {
             getPosts() {
                 Axios.get('/api/posts')
                     .then(res => {
                         this.posts = res.data;
                         this.loading = false;
                     })
             }
         }
     }
</script>

<style>
    .spinner{
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
</style>
