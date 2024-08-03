<template>
    <Head title="Pravidla" />
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
                        Pravidla
                    </span>
                    <h2 class="prevent-select text-[52px] font-bold text-gray-700 opacity-50 uppercase relative z-[1] -translate-y-4">
                        Pravidla
                    </h2>
                </div>
            </div>
        </div>

        <!-- Main Content Section -->
        <section class="flex-1 bg-black text-white py-8 px-4 sm:px-6 md:px-8">
            <article class="bg-[#0d0d13] h-full max-w-7xl mx-auto py-4 px-4 sm:px-6 md:px-8 lg:px-10 flex flex-col rounded-lg">

                <!-- Minecraft Rules Section -->
                <div class="flex flex-col sm:flex-row items-center gap-4 sm:gap-6 md:gap-8 px-4 sm:px-6 md:px-8">
                    <img src="/storage/MC.png" alt="Minecraft Rules Icon" class="w-16 sm:w-20 md:w-24" draggable="false">
                    <h1 class="font-bold text-xl sm:text-2xl md:text-3xl lg:text-4xl uppercase text-center sm:text-left">
                        Pravidla pro Minecraft server
                    </h1>
                </div>
                <main class="px-4 sm:px-6 md:px-8">
                    <ol class="list-decimal list-inside space-y-3 sm:space-y-1 ml-4 sm:ml-6 md:ml-8 mt-4 sm:mt-6">
                        <li>Respektuj ostatní hráče. Něco jako spamování, vulgarismy, vyhrožování, reklamy, nacismus/rasismus, apod. nikam na server netahej.</li>
                        <li>Nevhodné stavby, skiny, nicky nebo pláště k nám na server také nepatří.</li>
                        <li>Nepoužívej modifikované clienty, či módy zvýhodňující tě před ostatními hráči. (Auto Clicker nebo zatížení myši sem také patří!)</li>
                        <li>Negriefuj ostatní, také by ti to nebylo příjemné.</li>
                        <li>Zveřejňování osobních údajů ostatních hráčů je přísně zakázáno.</li>
                        <li>Zneužívání bugů je občas zábava, ale také je to zakázané. Nejlepší bude když nám to nahlásíš, a my se to pokusíme napravit.</li>
                        <li>Obchodování s reálnou měnou není dobrý nápad, tento přestupek bude trestán permanentním banem.</li>
                        <li>Podvody s herní měnou či itemy zvládneme hravě dohledat, tento bod taktéž nedoporučuji praktikovat.</li>
                        <li>Respektovat jak Helper-Team, tak i vedení...to je snad jasné. Vedení má navíc právo udělit trest bez udání důvodu, či kdykoliv pravidla pozměnit k jejich lepšímu pochopení.</li>
                        <li>Zažít na serveru nezapomenutelný zážitek ze hry je povinností!</li>
                    </ol>
                </main>

                <!-- Discord Rules Section -->
                <div class="flex flex-col sm:flex-row items-center gap-4 sm:gap-6 md:gap-8 mt-12 px-4 sm:px-6 md:px-8">
                    <img src="/storage/DC.png" alt="Discord Rules Icon" class="w-16 sm:w-20 md:w-24" draggable="false">
                    <h1 class="font-bold text-xl sm:text-2xl md:text-3xl lg:text-4xl uppercase text-center sm:text-left">
                        Pravidla pro Discord server
                    </h1>
                </div>
                <main class="px-4 sm:px-6 md:px-8">
                    <ol class="list-decimal list-inside space-y-3 sm:space-y-1 ml-4 sm:ml-6 md:ml-8 mt-4 mb-2">
                        <li>Respektuj všechny členy na serveru!</li>
                        <li>V hlasových i textových kanálech se vyjadřuj slušně!</li>
                        <li>Žádné nenávistné projevy, diskriminace nebo šikana jakéhokoliv druhu.</li>
                        <li>Zákaz spamování, včetně vícenásobného vystavování stejné zprávy.</li>
                        <li>Zákaz posílání odkazů na nelegální/nebezpečné webové stránky nebo služby.</li>
                        <li>Zákaz reklam jakéhokoliv druhu na serveru nebo ve voice chatu s členy.</li>
                        <li>Zákaz vydávání se za člena Admin-Teamu.</li>
                        <li>Zákaz zasílání jakéhokoliv NSFW kontentu či odkazu na obsah NSFW.</li>
                        <li>Zákaz rozesílání interních informací ohledně členů nebo serveru.</li>
                        <li>Zákaz označování členů Admin-Teamu.</li>
                    </ol>
                </main>
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

ol > li::marker {
    font-weight: bold;
}
</style>
