import VueRouter from 'vue-router';
import Vue from "vue";
import Posts from "./views/Posts";
import Post from "./views/Post";
import CreatePost from "./views/CreatePost";
import UpdatePost from "./views/UpdatePost";

Vue.use(VueRouter);

const routes = [
    {
        path: '/',
        component: Posts
    },
    {
        path: '/post/:id',
        component: Post
    },
    {
        path: '/create',
        component: CreatePost
    },
    {
        path: '/update/:id',
        component: UpdatePost
    }
]

export default new VueRouter({
    mode: "history",
    routes
})
