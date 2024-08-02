<script setup lang="ts">
import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps<{
    href: string;
    active?: boolean;
}>();

const classes = computed(() =>
    props.active
        ? 'inline-flex items-center px-2 py-2 text-lg bg-[rgba(50,222,27,.2470588235)] font-semibold leading-6 text-[#32de1b] focus:outline-none focus:border-green-500 transition duration-200 ease-in-out rounded-lg'
        : 'inline-flex items-center px-2 py-2 text-lg font-semibold leading-6 text-white hover:text-white hover:bg-[rgba(50,222,27,.2470588235)] focus:outline-none focus:text-white focus:border-gray-400 transition duration-200 ease-in-out rounded-lg'
);
</script>

<template>
    <Link :href="href" :class="classes">
        <slot />
    </Link>
</template>
