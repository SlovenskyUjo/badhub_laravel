<template>
    <Head title="Mapa" />
    <div class="min-h-screen flex flex-col">
        <Navbar />

        <!-- Loader -->
        <div v-if="isLoading" class="fixed inset-0 flex items-center justify-center z-50 bg-blur">
            <Loader />
        </div>

        <div class="relative w-full h-[32vh] overflow-hidden">
            <!-- Background Image -->
            <img src="/storage/background.png" alt="Background Image" class="absolute top-0 left-0 w-full h-full object-cover z-[-1]" />
            <div class="absolute inset-0 flex flex-col justify-center items-center text-center py-8">
                <div class="relative">
                    <span class="prevent-select absolute inset-0 flex justify-center items-center text-gray-100 text-5xl font-bold uppercase z-[2] fade-in-text">
                        Mapa
                    </span>
                    <h2 class="prevent-select text-[52px] font-bold text-gray-700 opacity-50 uppercase relative z-[1] -translate-y-4">
                        Mapa
                    </h2>
                </div>
            </div>
        </div>

        <!-- Main Content Section -->
        <section class="flex-1 bg-black text-white py-8">
            <article class="bg-[#08080C] max-w-7xl rounded-lg h-[50rem] mx-auto px-[2rem] py-4 pt-[5rem] w-full relative">
                <div class="absolute top-4 right-4">
                    <button class="bg-[#32de1b] text-white px-6 py-4 rounded-lg flex items-center">
                        <a href="https://mapa.badhub.cz/" class="flex items-center text-xl" target="_blank">
                            <i class="fa-solid fa-maximize "></i>
                        </a>
                    </button>
                </div>
                <iframe src="https://mapa.badhub.cz/" frameborder="0" class="w-full h-full"></iframe>
            </article>
        </section>


        <footer>
            <Footer />
        </footer>
    </div>
</template>

<script setup lang="ts">
import { onMounted, ref } from 'vue';
import Navbar from "@/Components/Navbar.vue";
import Loader from "@/Components/Loader.vue";
import Footer from "@/Components/Footer.vue";
import { Head } from "@inertiajs/vue3";

const isLoading = ref(true);

onMounted(() => {
    setTimeout(() => {
        isLoading.value = false;
    }, 1500);
});
</script>

<style scoped>
@keyframes fadeIn {
    0% {
        opacity: 0;
    }
    100% {
        opacity: 1;
    }
}

@keyframes fadeInGrow {
    0% {
        opacity: 0;
        transform: scale(0.9);
    }
    100% {
        opacity: 1;
        transform: scale(1);
    }
}

@keyframes fadeInText {
    0% {
        opacity: 0;
    }
    100% {
        opacity: 1;
    }
}

.fade-in {
    animation: fadeIn 1s ease-out;
    will-change: opacity;
}

.fade-in-grow {
    animation: fadeInGrow 2s ease-out;
    will-change: opacity, transform;
}

.fade-in-text {
    animation: fadeInText 2s ease-out;
    will-change: opacity;
}

.prevent-select {
    -webkit-user-select: none; /* Safari */
    -ms-user-select: none; /* IE 10 and IE 11 */
    user-select: none; /* Standard syntax */
}

.bg-blur {
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    background-color: rgba(0, 0, 0, 0.5); /* Optional: To add a slight color tint */
}
</style>
