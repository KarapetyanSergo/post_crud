<template>
    <div>
        <div v-if="error">
            <b-alert show variant="danger">Error</b-alert>
        </div>
        <b-form v-if="loading" id="form">
            <b-form-input
                id="title"
                v-model="form.title"
                class="form"
                type="text"
                placeholder="Title"
            ></b-form-input>

            <b-form-textarea
                id="textarea"
                class="form"
                v-model="form.description"
                placeholder="Enter something..."
                rows="3"
                max-rows="6"
            ></b-form-textarea>

            <b-form-file v-model="form.image" accept="image/png, image/gif, image/jpeg" class="mt-3 form"
                         plain></b-form-file>

            <div class="form">
                <b-button @click="update" variant="success" v-if="cu==='update'">Save</b-button>
                <b-button @click="store" variant="success" v-else-if="cu==='create'">Create</b-button>
            </div>

        </b-form>
    </div>

</template>

<script>
import Axios from "axios";
import post from "../views/Post";

export default {
    props: {
        cu: {
            type: String,
        }
    },
    data() {
        return {
            updateData: {},
            loading: true,
            image: null,
            text: '',
            form: {
                title: '',
                description: '',
                image: null
            },
            error: false
        }
    },
    mounted() {
        this.checkMethod()
    },
    methods: {
        checkMethod() {
            if (this.cu === 'update') {
                Axios.get('/api/posts/' + this.$route.params.id)
                    .then(res => {
                        this.form.title = res.data.post.title;
                        this.form.description = res.data.post.description;
                    })
            }
        },
        store() {
            if (!this.form.image) {
                this.error = true;
                return false;
            }

            Axios.post('/api/posts/', {
                'title': this.form.title,
                'description': this.form.description,
                'image': this.form.image.name
            }, {
                headers: {
                    'Content-type': 'application/json'
                }
            })
                .then(res => {
                    alert('Post was created successfully');
                    this.$router.push('/post/' + res.data.id);
                })
        },
        update() {
            if (this.form.image) {
                this.form.image = this.form.image.name
            } else {
                delete this.form.image;
            }

            Axios.put('/api/posts/' + this.$route.params.id, this.form
                , {
                    headers: {
                        'Content-type': 'application/json'
                    }
                })
                .then(res => {
                    this.$router.push('/post/' + res.data.id);
                })
        }
    }
}
</script>

<style scoped>
#form {
    width: 90%;
    margin: 0 auto;
}

.form {
    margin-top: 10px;
}
</style>
