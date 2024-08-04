<template>
    <Head title="AdminTeam" />
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
                        Tým
                    </span>
                    <h2 class="prevent-select text-[52px] font-bold text-gray-700 opacity-50 uppercase relative z-[1] -translate-y-4">
                        Tým
                    </h2>
                </div>
            </div>
        </div>

        <!-- Main Content Section -->
        <section class="flex-1 bg-black text-white py-8">
            <div class="max-w-5xl mx-auto px-4 mb-[4rem]">
                <h1 class="text-2xl font-bold mb-6 text-center rounded-xl py-1 uppercase fade-in" style="background: -webkit-linear-gradient(0,rgba(50,222,27,.6588235294),rgba(117,255,83,.6666666667)); text-shadow: 2px 2px black">
                    Vedení Projektu
                </h1>
                <div class="flex flex-col items-center gap-4 md:flex-row md:flex-wrap md:justify-center">
                    <div v-for="(owner, index) in owners" :key="owner.uuid" :style="{ animationDelay: `${index * 0.1}s` }" class="fade-in-grow flex flex-col md:flex-row items-center bg-[#0d0d13] rounded-lg p-4 max-w-xs w-full" style="box-shadow: 0 0 25px #000000b4">
                        <img :src="owner.skinUrl" class="w-[80px] mb-4 md:mb-0" alt="Skin hráča" />
                        <div class="flex flex-col items-center md:items-start text-center md:text-left mx-auto">
                            <p class="font-semibold text-white text-[18px] mb-[5px] flex items-center">
                                {{ capitalize(owner.realname) }}
                                <span class="w-3 relative top-[1px] h-3 rounded-full ml-2" :class="owner.isLogged === 1 ? 'bg-green-500' : 'bg-red-500'"></span>
                            </p>
                            <p class="text-base font-[600] mx-auto text-white text-center rounded-[5px] shadow-[2px_2px_rgba(0,0,0,.3137254902)]" style="background: -webkit-linear-gradient(0deg, rgb(255, 0, 0) 0%, rgb(255, 80, 80) 100%); text-shadow: 2px 2px rgba(0,0,0,.3137254902); padding: 2px 20px 2.5px">
                                Majitel
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="max-w-5xl mx-auto px-4 mb-[4rem]">
                <h1 class="text-2xl font-bold mb-6 text-center rounded-xl py-1 uppercase fade-in" style="background: -webkit-linear-gradient(0,rgba(50,222,27,.6588235294),rgba(117,255,83,.6666666667)); text-shadow: 2px 2px black">
                    Developer Team
                </h1>
                <div class="flex flex-col items-center gap-4 md:flex-row md:flex-wrap md:justify-center">
                    <div v-for="(developer, index) in developers" :key="developer.uuid" :style="{ animationDelay: `${index * 0.1}s` }" class="fade-in-grow flex flex-col md:flex-row items-center bg-[#0d0d13] rounded-lg p-4 max-w-xs w-full" style="box-shadow: 0 0 25px #000000b4">
                        <img :src="developer.skinUrl" class="w-[80px] mb-4 md:mb-0" alt="Skin hráča" />
                        <div class="flex flex-col items-center md:items-start text-center md:text-left mx-auto">
                            <p class="font-semibold text-white text-[18px] mb-[5px] flex items-center">
                                {{ capitalize(developer.realname) }}
                                <span class="w-3 relative top-[1px] h-3 rounded-full ml-2" :class="developer.isLogged === 1 ? 'bg-green-500' : 'bg-red-500'"></span>
                            </p>
                            <p class="text-base font-[600] mx-auto text-white text-center rounded-[5px] shadow-[2px_2px_rgba(0,0,0,.3137254902)]" style="background: -webkit-linear-gradient(0deg, rgb(251, 128, 0) 0%, rgb(255, 77, 29) 100%); text-shadow: 2px 2px rgba(0,0,0,.3137254902); padding: 2px 20px 2.5px">
                                {{ capitalize(developer.primary_group )}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="max-w-5xl mx-auto px-4 mb-[4rem]">
                <h1 class="text-2xl font-bold mb-6 text-center rounded-xl py-1 uppercase fade-in" style="background: -webkit-linear-gradient(0,rgba(50,222,27,.6588235294),rgba(117,255,83,.6666666667)); text-shadow: 2px 2px black">
                    Helper Team
                </h1>
                <div class="flex flex-col items-center gap-4 md:flex-row md:flex-wrap md:justify-center">
                    <div v-for="(helper, index) in helpers" :key="helper.uuid" :style="{ animationDelay: `${index * 0.1}s` }" class="fade-in-grow flex flex-col md:flex-row items-center bg-[#0d0d13] rounded-lg p-4 max-w-xs w-full" style="box-shadow: 0 0 25px #000000b4">
                        <img :src="helper.skinUrl" class="w-[80px] mb-4 md:mb-0" alt="Skin hráča" />
                        <div class="flex flex-col items-center md:items-start text-center md:text-left mx-auto">
                            <p class="font-semibold text-white text-[18px] mb-[5px] flex items-center">
                                {{ capitalize(helper.realname) }}
                                <span class="w-3 relative top-[1px] h-3 rounded-full ml-2" :class="helper.isLogged === 1 ? 'bg-green-500' : 'bg-red-500'"></span>
                            </p>
                            <p class="text-base font-[600] mx-auto text-white text-center rounded-[5px] shadow-[2px_2px_rgba(0,0,0,.3137254902)]" style="background: -webkit-linear-gradient(0deg, rgb(0, 110, 255) 0%, rgb(3, 192, 211) 100%); text-shadow: 2px 2px rgba(0,0,0,.3137254902); padding: 2px 20px 2.5px">
                                {{ capitalize(helper.primary_group )}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="max-w-5xl mx-auto px-4 mb-[4rem]">
                <h1 class="text-2xl font-bold mb-6 text-center rounded-xl py-1 uppercase fade-in" style="background: -webkit-linear-gradient(0,rgba(50,222,27,.6588235294),rgba(117,255,83,.6666666667)); text-shadow: 2px 2px black">
                    Builder Team
                </h1>
                <div class="flex flex-col items-center gap-4 md:flex-row md:flex-wrap md:justify-center">
                    <div v-for="(builder, index) in builders" :key="builder.uuid" :style="{ animationDelay: `${index * 0.1}s` }" class="fade-in-grow flex flex-col md:flex-row items-center bg-[#0d0d13] rounded-lg p-4 max-w-xs w-full" style="box-shadow: 0 0 25px #000000b4">
                        <img :src="builder.skinUrl" class="w-[80px] mb-4 md:mb-0" alt="Skin hráča" />
                        <div class="flex flex-col items-center md:items-start text-center md:text-left mx-auto">
                            <p class="font-semibold text-white text-[18px] mb-[5px] flex items-center">
                                {{ capitalize(builder.realname) }}
                                <span class="w-3 relative top-[1px] h-3 rounded-full ml-2" :class="builder.isLogged === 1 ? 'bg-green-500' : 'bg-red-500'"></span>
                            </p>
                            <p class="text-base font-[600] mx-auto text-white text-center rounded-[5px] shadow-[2px_2px_rgba(0,0,0,.3137254902)]" style="background: -webkit-linear-gradient(0deg, rgb(0, 109, 21) 0%, rgb(0, 190, 48) 100%); text-shadow: 2px 2px rgba(0,0,0,.3137254902); padding: 2px 20px 2.5px">
                                {{ capitalize(builder.primary_group )}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="max-w-5xl mx-auto px-4 mb-[4rem]">
                <h1 class="text-2xl font-bold mb-6 text-center rounded-xl py-1 uppercase fade-in" style="background: -webkit-linear-gradient(0,rgba(50,222,27,.6588235294),rgba(117,255,83,.6666666667)); text-shadow: 2px 2px black">
                    Youtuber Team
                </h1>
                <div class="flex flex-col items-center gap-4 md:flex-row md:flex-wrap md:justify-center">
                    <div v-for="(youtuber, index) in youtubers" :key="youtuber.uuid" :style="{ animationDelay: `${index * 0.1}s` }" class="fade-in-grow flex flex-col md:flex-row items-center bg-[#0d0d13] rounded-lg p-4 max-w-xs w-full" style="box-shadow: 0 0 25px #000000b4">
                        <img :src="youtuber.skinUrl" class="w-[80px] mb-4 md:mb-0" alt="Skin hráča" />
                        <div class="flex flex-col items-center md:items-start text-center md:text-left mx-auto">
                            <p class="font-semibold text-white text-[18px] mb-[5px] flex items-center">
                                {{ capitalize(youtuber.realname) }}
                                <span class="w-3 relative top-[1px] h-3 rounded-full ml-2" :class="youtuber.isLogged === 1 ? 'bg-green-500' : 'bg-red-500'"></span>
                            </p>
                            <p class="text-base font-[600] mx-auto text-white text-center rounded-[5px] shadow-[2px_2px_rgba(0,0,0,.3137254902)]" style="background: -webkit-linear-gradient(0deg, rgb(218, 0, 0) 0%, rgb(253, 253, 253) 100%); text-shadow: 2px 2px rgba(0,0,0,.3137254902); padding: 2px 20px 2.5px">
                                {{ capitalize(youtuber.primary_group )}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

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

const props = defineProps<{
    owners: Array<{ uuid: string, skinUrl: string, realname: string, username: string, isLogged: number }>,
    developers: Array<{ uuid: string, skinUrl: string, realname: string, username: string, primary_group: string, isLogged: number }>,
    helpers: Array<{ uuid: string, skinUrl: string, realname: string, username: string, primary_group: string, isLogged: number }>,
    builders: Array<{ uuid: string, skinUrl: string, realname: string, username: string, primary_group: string, isLogged: number }>,
    youtubers: Array<{ uuid: string, skinUrl: string, realname: string, username: string, primary_group: string, isLogged: number }>,
}>();

const capitalize = (str: string) => {
    if (!str) return '';
    return str.charAt(0).toUpperCase() + str.slice(1);
};

onMounted(() => {
    setTimeout(() => {
        isLoading.value = false;
    }, 1000);
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
