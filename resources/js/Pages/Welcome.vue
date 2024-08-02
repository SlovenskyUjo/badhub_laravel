<template>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <body>
    <Head title="Domů" />
    <div class="flex flex-col min-h-screen bg-image">
        <!-- Navbar -->
        <Navbar class="fixed top-0 left-0 right-0 z-10" />

        <!-- Loader -->
        <div v-if="isLoading" class="fixed inset-0 flex items-center justify-center z-50 bg-blur">
            <div class="w-16 h-16 border-4 border-t-4 border-[#32de1b] border-t-transparent rounded-full animate-spin"></div>
        </div>

        <!-- Main Content -->
        <main v-else class="flex-1 pt-16"> <!-- Add padding-top to avoid overlap with fixed navbar -->
            <!-- Home Section -->
            <section id="home" class="relative bg-cover min-h-screen" style="background-image: url('/storage/background.png');">
                <div class="flex flex-col md:flex-row items-center justify-center w-full md:max-w-6xl mx-auto px-4 py-12 md:py-24">
                    <!-- Text Section -->
                    <div class="text-center md:text-left md:w-1/2 flex flex-col gap-4 items-center md:items-start justify-center">
                        <h1 class="relative text-3xl md:text-5xl font-extrabold text-white mb-4 md:mb-6 animate-fade-in" style="text-shadow: 2px 2px black">Co jsme?</h1>
                        <hr class="border-0 rounded w-12 border-b-[1px] border-t-2 border-[#32de1b]" />
                        <p class="text-white text-base md:text-lg mt-4 md:mt-6 leading-relaxed animate-fade-in">
                            Server BadHub.cz byl založen v roce 2023 třemi přáteli za účelem poskytnutí nezapomenutelného zážitku ze hry, který zatím nikde jinde nenajdete. Rádi bychom vám BadHub k něčemu přirovnali, ale zatím neexistuje žádná alternativní forma, kterou by to bylo možné. Pojďte se sami přesvědčit a zažít si nový pohled na starou hru na mc.badhub.cz.
                        </p>
                        <!-- Button Container -->
                        <div class="flex flex-col sm:flex-row gap-4 mb-4">
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
                                    <i class="fab fa-discord"></i>
                                    <span class="ml-2">Hráči online: {{ inviteData.approximate_presence_count }}</span>
                                </button>
                            </a>
                        </div>
                        <button
                            class="inline-flex items-center px-4 py-2 bg-white border border-transparent rounded-md font-bold text-sm text-[#6b6b6b] uppercase tracking-widest hover:bg-[#e6e3e3] transition ease-in-out duration-200"
                            style="box-shadow: 0 3px #6b6b6b;"
                            @click="copyIP"
                        >
                            <i class="fa-regular fa-clipboard"></i>
                            <span class="ml-2">Zkopírovat IP</span>
                        </button>
                    </div>
                    <!-- Logo Section -->
                    <div class="md:w-1/2 md:flex hidden justify-center items-center mt-12 md:mt-0">
                        <img src="/storage/logo.png" class="max-w-xs md:max-w-md h-auto animate-fadeInUp" />
                    </div>
                </div>
            </section>

            <!-- Discord Invitation Section -->
            <section id="discord" class="w-full bg-[#0d0d13] text-white py-8">
                <div class="flex flex-col items-center justify-center max-w-4xl mx-auto px-4">
                    <h2 class="text-2xl md:text-4xl font-bold mb-4">Přidejte se k nám na Discordu!</h2>
                    <p class="text-lg mb-6 text-center">Spojte se s komunitou a buďte vždy v obraze ohledně novinek, eventů a dalších zajímavostí!</p>
                    <a href="https://discord.com/invite/9vhUGpzrwt" target="_blank" class="inline-flex items-center px-6 py-3 bg-white text-[#7289da] border border-transparent rounded-md font-semibold text-lg uppercase hover:bg-gray-200 transition ease-in-out duration-200">
                        <i class="fab fa-discord mr-2"></i>
                        Připojit se
                    </a>
                </div>
            </section>
        </main>

        <footer class="bg-black text-white py-3 px-6 flex items-center justify-between w-full">
            <p class="md:text-[17px] text-xs md:ml-[3rem] break-words m-0 text-white">&copy; BadHub.cz &bull; 2024 | Vytvořil <span class="text-[#32de1b]">SlovenskyUjo</span></p>

            <div class="flex space-x-4">
                <a href="#" class="text-gray-400 hover:text-gray-300">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" class="text-gray-400 hover:text-gray-300">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#" class="text-gray-400 hover:text-gray-300">
                    <i class="fab fa-instagram"></i>
                </a>
            </div>
        </footer>
    </div>
    </body>
    </html>
</template>

<script setup lang="ts">
import Navbar from "@/Components/Navbar.vue";
import { ref, onMounted } from "vue";
import axios from "axios";
import { Head } from "@inertiajs/vue3";
import { toast } from "vue3-toastify";
import "vue3-toastify/dist/index.css";

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
};

const copyIP = () => {
    const ipAddress = 'mc.badhub.cz';
    if (navigator.clipboard && navigator.clipboard.writeText) {
        navigator.clipboard.writeText(ipAddress).then(() => {
            toast.success('IP address copied to clipboard!', {
                position: "top-center",
                autoClose: 3000,
                hideProgressBar: false,
                closeOnClick: true,
                pauseOnHover: true,
                progress: undefined,
            });
        }).catch(err => {
            toast.error('Failed to copy IP address: ' + err.message, {
                position: "top-center",
                autoClose: 3000,
                hideProgressBar: false,
                closeOnClick: true,
                pauseOnHover: true,
                progress: undefined,
            });
        });
    } else {
        const textArea = document.createElement('textarea');
        textArea.value = ipAddress;
        textArea.style.position = 'fixed';
        textArea.style.opacity = '0';
        textArea.style.left = '-9999px';

        document.body.appendChild(textArea);
        textArea.focus();
        textArea.select();

        try {
            const successful = document.execCommand('copy');
            if (successful) {
                toast.success('IP address copied to clipboard!', {
                    position: "top-right",
                    autoClose: 3000,
                    hideProgressBar: false,
                    closeOnClick: true,
                    pauseOnHover: true,
                    progress: undefined,
                });
            } else {
                toast.error('Fallback: Could not copy IP address.', {
                    position: "top-right",
                    autoClose: 3000,
                    hideProgressBar: false,
                    closeOnClick: true,
                    pauseOnHover: true,
                    progress: undefined,
                });
            }
        } catch (error) {
            toast.error('Fallback: Failed to copy IP address', {
                position: "top-center",
                autoClose: 3000,
                hideProgressBar: false,
                closeOnClick: true,
                pauseOnHover: true,
                progress: undefined,
            });
        }

        document.body.removeChild(textArea);
    }
};

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

.bg-blur {
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    background-color: rgba(0, 0, 0, 0.5);
}

.bg-image {
    background-image: url('/storage/background.png');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    height: 100vh;
}

footer {
    margin-top: auto;
}

body {
    margin: 0;
    padding: 0;
}

main {
    margin: 0;
    padding: 0;
}

@media (max-width: 768px) {
    .text-center {
        text-align: center;
    }
    .px-4 {
        padding-left: 1rem;
        padding-right: 1rem;
    }
    .py-12 {
        padding-top: 3rem;
        padding-bottom: 3rem;
    }
}
</style>
