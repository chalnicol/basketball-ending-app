<script setup>
import { Head, Link } from '@inertiajs/vue3';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});

// function handleImageError() {
//     document.getElementById('screenshot-container')?.classList.add('!hidden');
//     document.getElementById('docs-card')?.classList.add('!row-span-1');
//     document.getElementById('docs-card-content')?.classList.add('!flex-row');
//     document.getElementById('background')?.classList.add('!hidden');
// }

</script>

<template>
    <Head title="Welcome" />
     

    <div class="h-screen bg-gray-300 flex justify-center items-center">

        <div class="w-11/12 md:w-1/2 lg:w-1/3 bg-white border border-gray-300 rounded-md p-3 shadow-lg flex flex-col justify-center items-center" style="max-width: 550px;">
            

          

            <ApplicationLogo class="w-20"/>
            
            <h1 class="text-3xl font-bold">BasketBall Ending</h1>
            <p class="text-sm text-orange-500 my-1">Gambling House of Chalnicol @2024</p>

            <hr class="border border-red-500">
            <div class="w-11/12 my-4">

                <nav v-if="canLogin" class="grid grid-cols-2 gap-2">
                    <Link
                        :href="route('login')"
                        class="font-bold text-center border border-gray-500 rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]"
                    >
                        LOG IN
                    </Link>

                    <Link
                        v-if="canRegister"
                        :href="route('register')"
                        class="font-bold text-center border border-gray-500 rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]"
                    >
                        REGISTER
                    </Link>
                </nav>

            </div>

            <!-- <div class="text-xs text-orange-500 py-1">
                Laravel v{{ laravelVersion }} (PHP v{{ phpVersion }}) 
            </div> -->

        
        </div>

     
        
    </div>

</template>
