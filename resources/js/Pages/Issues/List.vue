<script setup>
import Layout from "../../Components/Layout.vue";
import PageTitle from "../../Components/PageTitle.vue";
import Issues from "../../Components/Issues.vue";
import {Link} from "@inertiajs/vue3";

const props = defineProps({
    issues: Object,
    title: String,
})
</script>
<template>
    <Layout>
        <PageTitle :title="props.title"></PageTitle>


        <div class="flex mb-5">
            <div class="min-w-20">
                <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option value="t">filter</option>
                </select>
            </div>

            <div class="min-w-20 ml-auto">
                <Link href="/issues/create">
                    <button type="button" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">New issue</button>
                </Link>
            </div>
        </div>

        <Issues :issues="props.issues"></Issues>
    </Layout>
</template>
