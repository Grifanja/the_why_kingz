<template>
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">
                <router-link :to="{ name: 'PostDetail', params: { id: post.id } }">
                    {{ post.title }}
                </router-link>
            </h5>
            <p class="card-text">{{ post.preview }}</p>
        </div>
    </div>
</template>

<script>


export default {
    props: {
        post: {
            type: Object,
            required: true,
        },
    },
};

</script>
