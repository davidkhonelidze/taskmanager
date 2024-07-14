<script setup>
import Layout from "../../Components/Layout.vue";
import PageTitle from "../../Components/PageTitle.vue";
import {useForm} from "@inertiajs/vue3";

const props = defineProps({
    title: String,
    trackers: Object,
    issueStatuses: Object,
    issuePriorities: Object,
})

const createIssueForm = useForm({
    subject: '',
    description: '',
    project_id: '',
    status_id: '',
    priority_id: '',
    tracker_id: '',
})

const createIssue = () => {
    //alert(createIssueForm.tracker_id)
    createIssueForm.post('/issues')
}
</script>
<template>
    <Layout>
        <PageTitle :title="props.title"></PageTitle>


        <form class="max-w-md" @submit.prevent="createIssue">

            <div class="mb-5">
                <label for="subject" class="block mb-2 text-sm font-medium text-gray-900">Subject</label>
                <input type="text"
                       id="subject"
                       v-model="createIssueForm.subject"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
            </div>

            <div class="mb-5">
                <label for="tracker" class="block mb-2 text-sm font-medium text-gray-900 ">Tracker</label>
                <select id="tracker"
                        v-model="createIssueForm.tracker_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option v-for="t in props.trackers.data" :value="t.id">{{t.name}}</option>
                </select>
            </div>

            <div class="mb-5">
                <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Description</label>
                <textarea id="description" rows="4"
                          v-model="createIssueForm.description"
                          class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                          placeholder="Issue description..."></textarea>
            </div>

            <div class="mb-5">
                <label for="status" class="block mb-2 text-sm font-medium text-gray-900 ">Status</label>
                <select id="status"
                        v-model="createIssueForm.status_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option v-for="status in props.issueStatuses.data" :value="status.id">{{status.name}}</option>
                </select>
            </div>

            <div class="mb-5">
                <label for="priority" class="block mb-2 text-sm font-medium text-gray-900 ">Priority</label>
                <select id="priority"
                        v-model="createIssueForm.priority_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option v-for="priority in props.issuePriorities.data" :value="priority.id">{{priority.name}}</option>
                </select>
            </div>

            <div class="mb-5">
                <button type="submit"
                        class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Create</button>
            </div>
        </form>

    </Layout>
</template>
