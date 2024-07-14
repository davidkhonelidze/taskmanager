<script setup>
import {Link} from "@inertiajs/vue3";

defineProps({
    pagination: Object,
    only: Array,
})

</script>

<template>
    <nav class="flex">
        <Link :href="link.url ?? ''"
              v-for="link in pagination.links"
              :class="['px-2',  'rounded-xl',  'font-normal', { 'bg-blue-700 text-white font-bold': link.active }]"
              :key="link.label"
              :only="only">
            <span v-html="link.label"
                  :class="['block' , 'py-1.5', 'px-1.5', { 'font-bold': link.active }]"></span>
        </Link>
    </nav>

</template>
