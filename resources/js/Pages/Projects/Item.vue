<script setup>
import Layout from "../../Components/Layout.vue";
import PageTitle from "../../Components/PageTitle.vue";

const props = defineProps({
    project: Object,
    title: String,
})
</script>
<template>
    <Layout>
        <PageTitle :title="props.title"></PageTitle>

        <h1  class="text-2xl">{{props.project.data.name}}</h1>
        <p>{{props.project.data.description}}</p>
    </Layout>
</template>
