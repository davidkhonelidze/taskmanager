<script setup>

import Layout from "../../Components/Layout.vue";
import PageTitle from "../../Components/PageTitle.vue";
import Issues from "../../Components/Issues.vue";

const props = defineProps({
    title: String,
    issues: Object,
})
</script>
<template>
    <Layout>
        <PageTitle :title="props.title"></PageTitle>

        <Issues :issues="props.issues"></Issues>
    </Layout>
</template>
