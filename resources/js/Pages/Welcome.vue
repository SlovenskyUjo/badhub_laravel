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
        <main v-else class="flex-1 pt-16">
            <!-- Home Section -->
            <section id="home" class="relative bg-cover min-h-screen bg-image">
                <div class="absolute inset-0 bg-black/30 backdrop-blur-sm z-0"></div>

                <div class="relative flex flex-col md:flex-row items-center justify-center w-full md:max-w-6xl mx-auto px-4 py-12 md:py-24 z-10">
                    <div class="text-center md:text-left md:w-1/2 flex flex-col gap-4 items-center md:items-start justify-center">
                        <h1 class="relative text-3xl md:text-5xl font-extrabold text-white mb-0 animate-fade-in" style="text-shadow: 2px 2px black">Co jsme?</h1>
                        <hr class="border-0 rounded w-12 border-b-[1px] border-t-2 border-[#32de1b]" />
                        <p class="text-white text-base md:text-lg leading-relaxed animate-fade-in">
                            Server BadHub.cz byl založen v roce 2023 třemi přáteli za účelem poskytnutí nezapomenutelného zážitku ze hry, který zatím nikde jinde nenajdete. Rádi bychom vám BadHub k něčemu přirovnali, ale zatím neexistuje žádná alternativní forma, kterou by to bylo možné. Pojďte se sami přesvědčit a zažít si nový pohled na starou hru na <strong>mc.badhub.cz</strong>.
                        </p>
                        <div class="flex flex-col mx-auto sm:flex-row gap-4 mb-4 mt-5">
                            <button
                                class="inline-flex items-center px-4 py-2 bg-[#32de1b] border border-transparent rounded-md font-bold text-sm text-[#125808] uppercase tracking-widest hover:bg-[#32e81a] transition ease-in-out duration-150"
                                style="box-shadow: 0 3px #125808;"
                                @click="copyIP"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-controller" viewBox="0 0 16 16">
                                    <path d="M11.5 6.027a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0m-1.5 1.5a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1m2.5-.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0m-1.5 1.5a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1m-6.5-3h1v1h1v1h-1v1h-1v-1h-1v-1h1z"/>
                                    <path d="M3.051 3.26a.5.5 0 0 1 .354-.613l1.932-.518a.5.5 0 0 1 .62.39c.655-.079 1.35-.117 2.043-.117.72 0 1.443.041 2.12.126a.5.5 0 0 1 .622-.399l1.932.518a.5.5 0 0 1 .306.729q.211.136.373.297c.408.408.78 1.05 1.095 1.772.32.733.599 1.591.805 2.466s.34 1.78.364 2.606c.024.816-.059 1.602-.328 2.21a1.42 1.42 0 0 1-1.445.83c-.636-.067-1.115-.394-1.513-.773-.245-.232-.496-.526-.739-.808-.126-.148-.25-.292-.368-.423-.728-.804-1.597-1.527-3.224-1.527s-2.496.723-3.224 1.527c-.119.131-.242.275-.368.423-.243.282-.494.575-.739.808-.398.38-.877.706-1.513.773a1.42 1.42 0 0 1-1.445-.83c-.27-.608-.352-1.395-.329-2.21.024-.826.16-1.73.365-2.606.206-.875.486-1.733.805-2.466.315-.722.687-1.364 1.094-1.772a2.3 2.3 0 0 1 .433-.335l-.028-.079zm2.036.412c-.877.185-1.469.443-1.733.708-.276.276-.587.783-.885 1.465a14 14 0 0 0-.748 2.295 12.4 12.4 0 0 0-.339 2.406c-.022.755.062 1.368.243 1.776a.42.42 0 0 0 .426.24c.327-.034.61-.199.929-.502.212-.202.4-.423.615-.674.133-.156.276-.323.44-.504C4.861 9.969 5.978 9.027 8 9.027s3.139.942 3.965 1.855c.164.181.307.348.44.504.214.251.403.472.615.674.318.303.601.468.929.503a.42.42 0 0 0 .426-.241c.18-.408.265-1.02.243-1.776a12.4 12.4 0 0 0-.339-2.406 14 14 0 0 0-.748-2.295c-.298-.682-.61-1.19-.885-1.465-.264-.265-.856-.523-1.733-.708-.85-.179-1.877-.27-2.913-.27s-2.063.091-2.913.27"/>
                                </svg>
                                <span class="ml-2">Online hráču: {{ onlinePlayers }}</span>
                            </button>
                            <a href="https://discord.com/invite/9vhUGpzrwt" target="_blank">
                                <button
                                    class="inline-flex items-center px-4 py-2 bg-[#7289da] border border-transparent rounded-md font-bold text-sm text-[#0d1d55] uppercase tracking-widest hover:bg-[#6880d4] transition ease-in-out duration-150"
                                    style="box-shadow:  0 3px #0d1d55;"
                                >
                                    <i class="fab fa-discord"></i>
                                    <span class="ml-2">Online členů: {{ inviteData.approximate_presence_count }}</span>
                                </button>
                            </a>
                        </div>
                    </div>
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
            <p class="md:text-[17px] text-xs md:ml-[3rem] break-words m-0 text-white">&copy; BadHub.cz &bull; 2024 | Vytvořil <a href="https://github.com/SlovenskyUjo" class="text-[#32de1b] hover:underline" target="_blank">SlovenskyUjo</a> zo ❤️</p>

            <div class="flex space-x-4">
                <a href="https://discord.com/invite/9vhUGpzrwt" target="_blank" class="text-gray-400 hover:text-gray-300">
                    <i class="fab fa-discord"></i>
                </a>
                <a href="https://www.instagram.com/badhub.cz" target="_blank" class="text-gray-400 hover:text-gray-300">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="https://www.tiktok.com/@mc.badhub.cz" target="_blank" class="text-gray-400 hover:text-gray-300">
                    <i class="fab fa-tiktok"></i>
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
            toast.success('IP Adresa zkopírována!', {
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
                toast.success('IP Adresa zkopírována!', {
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
    background-color: transparent; /* Added */
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
