<template>
    <div>
        <b-card
            id="postBlock"
            :title="title"
            :img-src="image"
            img-alt="Image"
            img-top
            tag="article"
            style="max-width: 20rem;"
            class="mb-2"
        >
            <b-card-text>
                {{description}}
            </b-card-text>

            <div>
                <b-button pill variant="primary" @click="redirect(id)">Details</b-button>
            </div>
        </b-card>
    </div>
</template>

<script>

export default {
    props: {
        id: {
            default: null
        },

        title: {
            type: String,
            default: null
        },

        image: {
            type: String,
            default: null
        },

        description: {
            type: String,
            default: null
        }
    },
    methods: {
        redirect(id) {
            this.$router.push('/post/'+id)
        }
    }
}
</script>

<style scoped>
    #postBlock {
        margin: 0 auto;
    }
</style>
