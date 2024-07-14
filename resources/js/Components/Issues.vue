<script setup>
import {onMounted} from 'vue';
import {initFlowbite} from "flowbite";

const props = defineProps({
    issues: Object,
    deleteIssue: {}
})

onMounted(() => {
    initFlowbite();
})
</script>
<template>



    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3">
                    ID
                </th>
                <th scope="col" class="px-6 py-3">
                    Tracker
                </th>
                <th scope="col" class="px-6 py-3">
                    Status
                </th>
                <th scope="col" class="px-6 py-3">
                    Priority
                </th>
                <th scope="col" class="px-6 py-3">
                    Subject
                </th>
                <th scope="col" class="px-6 py-3">
                    Actions
                </th>
            </tr>
            </thead>
            <tbody>

            <tr
                v-for="issue in props.issues.data"
                class="bg-white border-b hover:bg-gray-50">

                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    {{issue.id}}
                </th>
                <td class="px-6 py-4">
                    {{issue.tracker.name}}
                </td>
                <td class="px-6 py-4">
                    {{issue.status.name}}
                </td>
                <td class="px-6 py-4">
                    {{issue.priority.name}}
                </td>
                <td class="px-6 py-4">
                    {{issue.subject}}
                </td>
                <td class="px-6 py-4">
                    <button type="button"
                            @click="deleteIssue(issue.id)"
                            data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                            class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">Delete</button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>

</template>
