<template>
    <main>
        <div class="bg-[#0d0d13] py-4 flex flex-col items-center justify-center max-w-full sm:max-w-6xl flex-1 mx-auto rounded-[5px] px-4">
            <h1 class="text-xl sm:text-2xl uppercase font-bold">Hlasování</h1>
            <p class="text-base sm:text-[1.25rem] mt-2">Děkujeme všem, kteří pro nás hlasují a podporují tím náš server.</p>
            <div class="w-full max-w-md mt-4">
                <input
                    v-model="nickname"
                    id="nickname"
                    type="text"
                    placeholder="Zde napiš svuj nickname"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm placeholder-gray-400 focus:text-[#495057] focus:outline-none focus:ring-2 focus:ring-[#32de1b] focus:border-transparent transition duration-200"
                />
            </div>
            <h2 class="mt-5 text-base sm:text-[20px]">Hlasovat můžeš na těchto stránkách!</h2>
            <div class="flex flex-col sm:flex-row gap-4 sm:gap-5 mt-4">
                <button
                    type="button"
                    class="transition-all-custom bg-[#32de1b] secret hover:bg-[#75ff53] py-2 px-4 sm:py-3 sm:px-6 text-white border-0 rounded-lg text-center font-semibold flex items-center justify-center"
                    @click="redirectToCraftList"
                >
                    CraftList.org
                </button>

                <button
                    type="button"
                    class="transition-all-custom bg-[#32de1b] secret hover:bg-[#75ff53] py-2 px-4 sm:py-3 sm:px-6 text-white border-0 rounded-lg text-center font-semibold flex items-center justify-center"
                    @click="redirectToMinecraftServery"
                >
                    MinecraftServery.eu
                </button>
            </div>
        </div>
    </main>
</template>

<script setup lang="ts">
import { ref } from "vue";

const nickname = ref('');

function redirectToCraftList() {
    const trimmedNickname = nickname.value.trim();
    if (trimmedNickname) {
        const url = `https://craftlist.org/badhub?nickname=${encodeURIComponent(trimmedNickname)}`;
        window.open(url, '_blank');
    } else {
        alert('Prosím, zadajte svoj nickname.');
    }
}

function redirectToMinecraftServery() {
    const trimmedNickname = nickname.value.trim();
    if (trimmedNickname) {
        const popupUrl = `https://minecraftservery.eu/server/badhubcz/vote/${encodeURIComponent(trimmedNickname)}`;

        // Otevření nové stránky
        window.open(popupUrl, '_blank');
    } else {
        alert('Prosím, zadajte svoj nickname.');
    }
}


</script>

<style scoped>
.transition-all-custom {
    transition: all 0.55s ease-in-out;
}

.secret {
    text-shadow: 2px 2px rgba(0,0,0,.3137254902);
    box-shadow: inset 0 -3px #00000070;
}
</style>
