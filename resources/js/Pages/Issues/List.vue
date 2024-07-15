<script setup>
import Layout from "../../Components/Layout.vue";
import PageTitle from "../../Components/PageTitle.vue";
import Issues from "../../Components/Issues.vue";
import {Link, router} from "@inertiajs/vue3";
import Pagination from "../../Components/Pagination.vue";
import {ref} from "vue";

const props = defineProps({
    issues: Object,
    title: String,
})

const deleteIssueDialog = ref(false)
const deleteIssueId = ref(null)

const clickDeleteIsssue = (id) => {
    deleteIssueDialog.value = true;
    deleteIssueId.value = id;
}
const deleteIssue = () => {
    router.delete('/issues/' + deleteIssueId.value)
}
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
                    <button
                        type="button"
                        class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">New issue</button>
                </Link>
            </div>
        </div>

        <div
            class="flex justify-center items-center font-bold text-red-500"
            v-if="!props.issues.data.length">No issues yet.</div>

        <Issues
            v-if="props.issues.data.length"
            :deleteIssue="clickDeleteIsssue"
            :issues="props.issues"></Issues>

        <div class="flex justify-end my-3"
            v-if="props.issues.data.length">
            <Pagination
                :pagination="props.issues.meta"
                :only="['issues']" />
        </div>


        <div id="popup-modal" tabindex="-1"

             :class="[
         'overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full',
         { 'hidden': !deleteIssueDialog }
       ]">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="p-4 md:p-5 text-center">
                        <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                        </svg>
                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this issue?</h3>
                        <button
                            data-modal-hide="popup-modal"
                            type="button"
                            @click="deleteIssue"
                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                            Yes, I'm sure
                        </button>
                        <button data-modal-hide="popup-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No, cancel</button>
                    </div>
                </div>
            </div>
        </div>

    </Layout>
</template>
