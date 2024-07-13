<script setup>
import Layout from "../../Components/Layout.vue";
import PageTitle from "../../Components/PageTitle.vue";
import Issues from "../../Components/Issues.vue";

const props = defineProps({
    issues: Object,
    title: String,
})
</script>
<template>
    <Layout>
        <PageTitle :title="props.title"></PageTitle>

        <Issues :issues="props.issues"></Issues>
    </Layout>
</template>
