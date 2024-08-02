<template>
    <Head title="Hlasování" />
    <div class="min-h-screen flex flex-col">
        <Navbar />
        <!-- Loader -->
        <div v-if="isLoading" class="fixed inset-0 flex items-center justify-center z-50 bg-blur">
            <Loader />
        </div>
            <div class="relative w-full h-48 md:h-[32vh] overflow-hidden">
                <img src="/storage/background.png" alt="Background Image" class="absolute top-0 left-0 w-full h-full object-cover z-[-1]" />
                <div class="absolute inset-0 flex flex-col justify-center items-center text-center py-4 md:py-8">
                    <div class="relative">
                        <span class="prevent-select absolute inset-0 flex justify-center items-center text-gray-100 text-xl md:text-3xl font-bold uppercase z-[2] fade-in-text">
                            Hlasování
                        </span>
                        <h2 class="prevent-select text-lg md:text-2xl font-bold text-gray-700 opacity-50 uppercase relative z-[1] -translate-y-2 md:-translate-y-4">
                            Hlasování
                        </h2>
                    </div>
                </div>
            </div>

            <section class="flex-1 bg-black text-white py-4 md:py-8 px-4 md:px-8">
                <article class="mb-4 md:mb-5">
                    <Hint />
                </article>
                <VoteModal />
            </section>
        </div>

    <footer>
        <Footer />
    </footer>
</template>



<script setup lang="ts">
import {ref, onMounted } from 'vue';
import Navbar from "@/Components/Navbar.vue";
import Loader from "@/Components/Loader.vue";
import Footer from "@/Components/Footer.vue";
import {Head} from "@inertiajs/vue3";
import Hint from "@/Components/Hint.vue";
import VoteModal from "@/Components/modals/VoteModal.vue";

const isLoading = ref(true);

// Simulácia načítania údajov
onMounted(() => {
    // Simulácia oneskorenia na 2 sekundy
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

