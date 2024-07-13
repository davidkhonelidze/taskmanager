<script setup>

import Layout from "../../Components/Layout.vue";
import PageTitle from "../../Components/PageTitle.vue";

const props = defineProps({
    title: String,
})
</script>
<template>
    <Layout>
        <PageTitle :title="props.title"></PageTitle>
    </Layout>
</template>
