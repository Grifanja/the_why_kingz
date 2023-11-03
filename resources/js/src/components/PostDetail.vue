<template>
    <div class="post-detail">
        <div v-if="post">
            <div class="container">
                <router-link :to="{ name: 'PostList' }">return to news list</router-link><br>
                <h1>{{ post.title }}</h1>
                <a href="{{ post.url }}">{{ post.url }}</a>
                <p>{{ post.description }}</p>

                <button
                    class="btn btn-primary"
                    :class="button.status"
                    @click="toggleStatus"
                    >
                    {{ button.text }}  news
                </button>
            </div>
        </div>
        <div v-else>
            <p>This news not found</p>
        </div>
    </div>
</template>

<script>
import axios from "axios";
export default {
    name: "PostDetail",
    props: ["id"],
    data() {
        return {
            post: null,
            button: {
                status: true,
                text: "Hidden",
            },
        };
    },
    mounted() {
        axios
            .get("http://localhost:888/api/posts/" + this.id)
            .then((response) => {
                this.post = response.data;
                this.button.status = response.data.active;
                this.button.text = this.button.status ? "Hidden" : "Active" ;
            })
            .catch((error) => {
                console.log(error);
            });
    },
    methods: {
        toggleStatus() {
            const newStatus = !this.button.status;
                axios
                    .put("http://localhost:888/api/posts/" + this.id, {active: newStatus})
                    .then((response) => {
                        // обробляємо відповідь від API
                        console.log(this.button.status);

                        this.button.status = newStatus;
                        this.button.text = newStatus ? "Hidden" : "Active" ;

                        alert(response.data.message);
                    })
                    .catch((error) => {
                        console.log(error);
                        // виводимо меседж про помилку для мембера
                        alert("Помилка при зміні статусу посту. Спробуйте ще раз.");
                    });
        }
    },
}
</script>
