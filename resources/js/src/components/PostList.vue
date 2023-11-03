<template>
    <div class="post-list">
        <h1>List of news</h1>
        <div class="row">
            <div class="col-md-6" v-for="post in posts" :key="post.id">
                <PostItem :post="post"/>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
import PostItem from "@/components/PostItem.vue";
export default {
    name: "PostList",
    components: {PostItem},
    data() {
        return {
            posts: [],
        };
    },
    mounted() {
        axios
            .get("http://localhost:888/api/posts/")
            .then((response) => {
                this.posts = response.data;
            })
            .catch((error) => {
                console.log(error);
            });
    },
};
</script>



