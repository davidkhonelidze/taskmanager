<script setup>
const props = defineProps({
    title: String
})
</script>
<template>
    <div class="py-2">
        <h1 class="font-bold text-2xl">{{props.title}}</h1>
    </div>
</template>
