<template>
    <nav class="bg-black px-6 py-4 relative">
        <div class="flex justify-between items-center">
            <!-- Logo Section -->
            <div class="flex items-center">
                <div class="rounded-full w-12 h-12 text-2xl flex items-center justify-center">
                    <a :href="route('home')">
                        <ApplicationLogo class="w-10 h-10" />
                    </a>
                </div>
            </div>

            <!-- Desktop Navigation Links -->
            <div class="hidden md:flex flex-1 justify-center">
                <ul class="flex gap-8 text-xl text-white font-semibold transition duration-200">
                    <li>
                        <NavLink
                            :href="route('home')"
                            :active="route().current('home')"
                            class="hover:text-green-400"
                        >
                            Domů
                        </NavLink>
                    </li>
                    <li>
                        <NavLink
                            :href="route('team.show')"
                            :active="route().current('team.show')"
                            class="hover:text-green-400"
                        >
                            Tým
                        </NavLink>
                    </li>
                    <li>
                        <NavLink
                            :href="route('rules.show')"
                            :active="route().current('rules.show')"
                            class="hover:text-green-400"
                        >
                            Pravidla
                        </NavLink>
                    </li>
                    <li>
                        <a
                            href="https://vip.vagonbrei.eu/link/LAkWETe4mc"
                            target="_blank"
                            class="inline-flex items-center px-2 py-2 text-lg text-white uppercase font-bold leading-6 bg-[#32de1b] hover:bg-[#32e81a] transition duration-200 ease-in-out rounded-lg"
                            style="text-shadow: 2px 2px black"
                        >
                            Obchod
                        </a>
                    </li>
                    <li>
                        <NavLink
                            :href="route('map.show')"
                            :active="route().current('map.show')"
                            class="hover:text-green-400"
                        >
                            Mapa
                        </NavLink>
                    </li>
                    <li>
                        <NavLink
                            :href="route('vote.show')"
                            :active="route().current('vote.show')"
                            class="hover:text-green-400"
                        >
                            Hlasování
                        </NavLink>
                    </li>
                    <li>
                        <a
                            href="https://wiki.badhub.cz/"
                            target="_blank"
                            class="inline-flex items-center px-2 py-2 text-lg text-white font-bold leading-6 hover:text-white hover:bg-[rgba(50,222,27,.2470588235)] transition duration-200 ease-in-out rounded-lg"
                            style="text-shadow: 2px 2px black"
                        >
                            Wiki
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Mobile Menu Button -->
            <div class="flex md:hidden z-30">
                <button
                    @click="toggleMenu"
                    class="text-white focus:outline-none"
                >
                    <svg
                        v-if="!menuOpen"
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-8 w-8"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6h16M4 12h16m-7 6h7"
                        />
                    </svg>
                    <svg
                        v-else
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-8 w-8"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M6 18L18 6M6 6l12 12"
                        />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Navigation Menu -->
        <transition name="fade">
            <div
                v-if="menuOpen"
                class="md:hidden fixed inset-0 bg-black bg-opacity-60 backdrop-blur-sm z-20 flex justify-center items-center"
            >
                <ul class="text-2xl text-white font-semibold space-y-4 z-30 relative">
                    <li>
                        <NavLink
                            :href="route('home')"
                            :active="route().current('home')"
                            class="hover:text-green-400"
                            @click="toggleMenu"
                        >
                            Domů
                        </NavLink>
                    </li>
                    <li>
                        <NavLink
                            :href="route('team.show')"
                            :active="route().current('team.show')"
                            class="hover:text-green-400"
                            @click="toggleMenu"
                        >
                            Tým
                        </NavLink>
                    </li>
                    <li>
                        <NavLink
                            :href="route('rules.show')"
                            :active="route().current('rules.show')"
                            class="hover:text-green-400"
                            @click="toggleMenu"
                        >
                            Pravidla
                        </NavLink>
                    </li>
                    <li>
                        <a
                            href="https://vip.vagonbrei.eu/link/LAkWETe4mc"
                            class="inline-flex items-center px-2 py-2 text-lg text-white font-semibold leading-6 bg-[#32de1b] focus:outline-none focus:border-green-500 transition duration-200 ease-in-out rounded-lg"
                            style="text-shadow: 2px 2px black"
                            @click="toggleMenu"
                        >
                            Obchod
                        </a>
                    </li>
                    <li>
                        <NavLink
                            :href="route('map.show')"
                            :active="route().current('map.show')"
                            class="hover:text-green-400"
                            @click="toggleMenu"
                        >
                            Mapa
                        </NavLink>
                    </li>
                    <li>
                        <NavLink
                            :href="route('vote.show')"
                            :active="route().current('vote.show')"
                            class="hover:text-green-400"
                            @click="toggleMenu"
                        >
                            Hlasování
                        </NavLink>
                    </li>
                    <li>
                        <a
                            href="https://wiki.badhub.cz/"
                            target="_blank"
                            class="inline-flex items-center px-2 py-2 text-lg text-white font-semibold leading-6 focus:outline-none hover:text-white hover:bg-[rgba(50,222,27,.2470588235)] focus:border-green-500 transition duration-200 ease-in-out rounded-lg"
                            style="text-shadow: 2px 2px black"
                            @click="toggleMenu"
                        >
                            Wiki
                        </a>
                    </li>
                </ul>
            </div>
        </transition>
    </nav>
</template>

<script setup lang="ts">
import { ref } from 'vue';
import NavLink from "@/Components/NavLink.vue";
import ApplicationLogo from "@/Components/ApplicationLogo.vue";

// State for mobile menu
const menuOpen = ref(false);

// Function to toggle menu
const toggleMenu = () => {
    menuOpen.value = !menuOpen.value;
};
</script>

<style scoped>
nav {
    position: sticky;
    top: 0;
    z-index: 100;
}

/* Transition for the mobile menu */
.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.5s ease-in-out, transform 0.5s ease-in-out;
}
.fade-enter, .fade-leave-to /* .fade-leave-active in <2.1.8 */ {
    opacity: 0;
    transform: scale(0.95);
}
</style>
