<template>
    <div>
        <b-navbar type="dark" variant="dark">
            <b-navbar-nav>
                <router-link class="link" to="/">
                    Home
                </router-link>
                <router-link class="link" to="/create">
                    Create post
                </router-link>
            </b-navbar-nav>
        </b-navbar>
    </div>
</template>

<script>
export default {
    name: "Header"
}
</script>

<style scoped>
    .link {
        color: #C5C5C5;
        margin-left: 10px;
        text-decoration: none;
    }
</style>
