<script setup>
import {Link} from "@inertiajs/vue3";
import Header from "./Header.vue";

const props = defineProps({
    title: String,
})

</script>
<template>


    <div class="content">
        <Header></Header>

        <main class="container mx-auto max-w-[1280px] px-5">
            <slot></slot>
        </main>
    </div>
    <footer class="container mx-auto max-w-[1280px] px-5 relative bottom-0 mt-10 pt-5">
        <div class="flex items-center justify-center gap-2 mb-5 text-gray-500 font-square text-sm">
        </div>
        <div class="flex items-center justify-center mb-2 text-gray-500 text-sm">
            <span>Tech Assignment</span>
        </div>
    </footer>
</template>
