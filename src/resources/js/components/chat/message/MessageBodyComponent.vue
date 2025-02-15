<script setup>
const props = defineProps([
    'message',
])
</script>

<template>
    <div class="card-body p-2">
        <p class="mb-0">
            {{ message }}
        </p>
        <div
            class="d-flex align-items-center justify-content-end text-sm opacity-6">
            <i class="material-symbols-rounded text-sm me-1">done_all</i>
            <small>4:42pm</small>
        </div>
    </div>
</template>

<style scoped>

</style>
