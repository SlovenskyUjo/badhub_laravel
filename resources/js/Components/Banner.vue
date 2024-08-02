<template>
    <div class="w-full h-full">
        <img
            src="/storage/background.png"
            alt="Background Image"
            class="absolute top-0 left-0 w-full h-full object-cover z-[-1] blur-effect"
            draggable="false"
        />
    </div>
</template>

<style scoped>
.blur-effect {
    filter: blur(8px) brightness(0.7); /* Adjust blur and brightness as needed */
}
</style>
<script setup lang="ts">
</script>
