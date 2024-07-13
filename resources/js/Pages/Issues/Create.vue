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


        <form class="max-w-md">

            <div class="mb-5">
                <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900">Subject</label>
                <input type="text" id="base-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
            </div>

            <div class="mb-5">
                <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 ">Tracker</label>
                <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">

                    <option>United States</option>
                    <option>Canada</option>
                    <option>France</option>
                    <option>Germany</option>
                </select>
            </div>

            <div class="mb-5">
                <label for="message" class="block mb-2 text-sm font-medium text-gray-900">Description</label>
                <textarea id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Leave a comment..."></textarea>
            </div>

            <div class="mb-5">
                <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 ">Status</label>
                <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">

                    <option>United States</option>
                    <option>Canada</option>
                    <option>France</option>
                    <option>Germany</option>
                </select>
            </div>

            <div class="mb-5">
                <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 ">Priority</label>
                <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">

                    <option>United States</option>
                    <option>Canada</option>
                    <option>France</option>
                    <option>Germany</option>
                </select>
            </div>

            <div class="mb-5">
                <button type="button" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Create</button>

            </div>
        </form>

    </Layout>
</template>
