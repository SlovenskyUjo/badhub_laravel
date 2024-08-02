<template>
    <div class="flex flex-col min-h-screen">
        <!-- Banner -->
        <Banner />

        <!-- Navbar -->
        <Navbar />

        <!-- Loader -->
        <div v-if="isLoading" class="fixed inset-0 flex items-center justify-center z-50 bg-blur">
            <div class="w-16 h-16 border-4 border-t-4 border-[#32de1b] border-t-transparent rounded-full animate-spin"></div>
        </div>

        <!-- Main Content -->
        <main v-else class="flex-1">
            <!-- Home Section -->
            <section id="home" class="py-24 grid place-items-center relative overflow-hidden mb-0">
                <div class="flex flex-col md:flex-row items-center justify-around w-full md:max-w-6xl md:mt-2 mx-auto px-4">
                    <!-- Text Section -->
                    <div class="text-center md:text-left md:w-1/2 flex flex-col gap-2 items-center justify-center">
                        <h1 class="relative text-4xl md:text-6xl font-extrabold text-white mb-3 animate-fade-in" style="text-shadow: 2px 2px black">Co jsme?</h1>
                        <hr class="border-0 rounded w-12 border-b-[1px] border-t-2 border-[#32de1b]" />
                        <p class="text-white text-lg md:text-base mt-4 md:mt-6 leading-relaxed animate-fade-in">
                            Server BadHub.cz byl založen v roce 2023 třemi přáteli za účelem poskytnutí nezapomenutelného zážitku ze hry, který zatím nikde jinde nenajdete. Rádi bychom vám BadHub k něčemu přirovnali, ale zatím neexistuje žádná alternativní forma, kterou by to bylo možné. Pojďte se sami přesvědčit a zažít si nový pohled na starou hru na mc.badhub.cz.
                        </p>
                        <!-- Button Container -->
                        <div class="flex gap-4 mb-4">
                            <button
                                class="inline-flex items-center px-4 py-2 bg-[#32de1b] border border-transparent rounded-md font-bold text-sm text-[#125808] uppercase tracking-widest hover:bg-[#32e81a] transition ease-in-out duration-150"
                                style="box-shadow: 0 3px #125808;"
                            >
                                <i class="fa-solid fa-globe"></i>
                                <span class="ml-2">Online hráču: {{ onlinePlayers }}</span>
                            </button>
                            <a href="https://discord.com/invite/9vhUGpzrwt" target="_blank">
                                <button
                                    class="inline-flex items-center px-4 py-2 bg-[#7289da] border border-transparent rounded-md font-bold text-sm text-[#0d1d55] uppercase tracking-widest hover:bg-[#6880d4] transition ease-in-out duration-150"
                                    style="box-shadow:  0 3px #0d1d55;"
                                >
                                    <i class="fa-solid fa-users"></i>
                                    <span class="ml-2">Hráči online: {{ inviteData.approximate_presence_count }}</span>
                                </button>
                            </a>
                        </div>
                        <PrimaryButton class="bg-white text-black">
                            <i class="fa-regular fa-clipboard"></i>
                            <span class="ml-2">Zkopírovat IP</span>
                        </PrimaryButton>
                    </div>
                    <!-- Logo Section -->
                    <div class="mt-12 md:mt-0 md:w-1/2 flex justify-center items-center">
                        <img src="/storage/logo.png" class="max-w-xs md:max-w-md h-auto animate-fadeInUp" />
                    </div>
                </div>
            </section>

            <section class="bg-black min-h-screen">
                <!-- ďalší obsah -->
            </section>
        </main>

        <!-- Footer -->
        <Footer :class="{'hidden': isLoading, 'absolute bottom-0 left-0 right-0': !isLoading}" />
    </div>
</template>

<script setup lang="ts">
import Navbar from "@/Components/Navbar.vue";
import Banner from "@/Components/Banner.vue";
import Footer from "@/Components/Footer.vue";
import { ref, onMounted } from "vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import axios from "axios";

const isLoading = ref(true);
const onlinePlayers = ref(0);
const inviteData = ref({
    approximate_presence_count: 0
});

onMounted(() => {
    setTimeout(() => {
        isLoading.value = false;
    }, 1000);
});

const fetchOnlinePlayers = async () => {
    try {
        const response = await axios.get('/api/players/online');
        onlinePlayers.value = response.data.onlinePlayers;
    } catch (error) {
        console.error('Error fetching online players:', error);
    }
};

const fetchInviteData = async () => {
    try {
        const response = await axios.get('/invite-data');
        inviteData.value = response.data;
    } catch (error) {
        console.error('Error fetching invite data:', error);
    }
}

fetchOnlinePlayers();
fetchInviteData();
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

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes fadeInUp {
    from {
        transform: translateY(20px);
        opacity: 0;
    }
    to {
        transform: translateY(0);
        opacity: 1;
    }
}

.animate-fade-in {
    animation: fadeIn 1s ease-out forwards;
}

.animate-fadeInUp {
    animation: fadeInUp 1s ease-out forwards;
}

/* Skrytý footer počas načítania */
.hidden {
    display: none;
}

.bg-blur {
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    background-color: rgba(0, 0, 0, 0.5); /* Optional: To add a slight color tint */
}
</style>
