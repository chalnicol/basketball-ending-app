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
     

    <div class="h-screen bg-gray-100 flex justify-center items-center">

        <div class="w-11/12 md:w-1/2 lg:w-1/3 bg-white border border-gray-300 rounded-md p-3 shadow-lg flex flex-col justify-center items-center">
            

            <div class="w-full flex justify-end">

                <nav v-if="canLogin">
                    <Link
                        :href="route('login')"
                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]"
                    >
                        Log in
                    </Link>

                    <Link
                        v-if="canRegister"
                        :href="route('register')"
                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]"
                    >
                        Register
                    </Link>
                </nav>
            </div>

            <br>

            <ApplicationLogo class="w-20"/>
            
            <h1 class="text-3xl font-bold">BasketBall Ending</h1>

            
            

            <div class="text-xs text-orange-500 py-1 mb-5">
                Laravel v{{ laravelVersion }} (PHP v{{ phpVersion }}) 
            </div>
            

        </div>

        <!-- <nav v-if="canLogin" class="flex flex-1 justify-end bg-white p-2 border-b-2">
                <Link
                    v-if="$page.props.auth.user"
                    :href="route('home')"
                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]"
                >
                    Home
                </Link>

                <template v-else>
                    <Link
                        :href="route('login')"
                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]"
                    >
                        Log in
                    </Link>

                    <Link
                        v-if="canRegister"
                        :href="route('register')"
                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]"
                    >
                        Register
                    </Link>
                </template>
        </nav>

           -->

        
    </div>

</template>
