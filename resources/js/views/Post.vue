<template>
    <spin v-if="loading" />
    <div v-else-if="!loading && !notFount" id="post">
        <h1>{{post.title}}</h1>
        <b-img :src="post.image" fluid></b-img>
        <p>{{post.description}}</p>
        <b-list-group id="commentsBlock">
            <b-list-group-item class="comment" v-for="comment in comments">{{ comment.text }}</b-list-group-item>
        </b-list-group>
        <div>
            <b-form-textarea
                id="textarea"
                v-model="text"
                placeholder="Enter something..."
                rows="3"
                max-rows="6"
            ></b-form-textarea>

            <b-button id="addComment" pill variant="outline-primary" @click="addComment(post.id)">Add Comment</b-button>
        </div>
        <b-button pill variant="outline-danger" @click="deletePost(post.id)">Delete Post</b-button>
        <b-button pill variant="outline-secondary" @click="updatePost(post.id)">Update Post</b-button>
    </div>
    <div v-else>
        <b-alert show variant="secondary">Post Not Found</b-alert>
    </div>
</template>

<script>
import Spin from "../components/spin.component";
import Post from "../components/post.component";
import Axios from "axios";

export default {
    components: {
        Spin,
        Post
    },
    data: () => ({
        loading: true,
        post: [],
        comments: [],
        notFount: false,
        text: ''
    }),
    mounted() {
        this.getPost(this.$route.params.id);
    },
    methods: {
        getPost(id) {
            Axios.get('/api/posts/' + id)
                .then(res => {
                    this.post = res.data.post;
                    this.comments = res.data.comments;
                    this.loading = false;
                }).catch(err => {
                    this.notFount = true;
                    this.loading = false;
            })
        },
        deletePost(id) {
            Axios.delete('/api/posts/'+id).then(res => {
                this.$router.push('/');
            })
        },
        updatePost(id) {
            this.$router.push('/update/'+id);
        },
        addComment(id) {
            Axios.post('/api/comments', {
                'text': this.text,
                'post_id': id
            }).then( res=> {
                location.reload();
            });
        }
    }
}
</script>

<style scoped>
    #post {
        width: 80%;
        margin: 0 auto;
        text-align: center
    }

    #commentsBlock {
        width: 100%;
        margin: 10px auto
    }

    #addComment {
        margin: 10px auto
    }
</style>
