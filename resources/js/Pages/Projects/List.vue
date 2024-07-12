<script setup>
import Layout from "../../Components/Layout.vue";
import PageTitle from "../../Components/PageTitle.vue";
import Card from "../../Components/Card.vue";

const props = defineProps({
    projects: Object,
    title: String,
})
</script>
<template>
    <Layout>
        <PageTitle :title="props.title"></PageTitle>

        <div class="grid grid-cols-1 md:grid-cols-3 justify-between gap-2">
            <Card v-for="project in props.projects"
                class=""></Card>
        </div>
    </Layout>
</template>
