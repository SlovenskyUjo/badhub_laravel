<template>
    <div class="fixed inset-0 flex items-center justify-center z-50">
        <div class="w-16 h-16 border-4 border-t-4 border-[#32de1b] border-t-transparent rounded-full animate-spin"></div>
    </div>
</template>

<script setup lang="ts">
// Additional logic can go here if needed
</script>

<style scoped>
@keyframes spin {
    to {
        transform: rotate(360deg);
    }
}

.animate-spin {
    animation: spin 1s linear infinite;
}
</style>
