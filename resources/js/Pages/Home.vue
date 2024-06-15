

<template>
    <Head title="Home" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Home</h2>
        </template>

       
        <div class="max-w-7xl mx-auto py-1">

            <!-- <div class="bg-white overflow-hidden my-2 shadow-sm sm:rounded-md bg-green-300">
                <div class="px-5 py-3 text-gray-900">Welcome, {{ user.name }}!</div>
            </div> -->

            <div class="p-6 border border-dark-300 mt-1 max-w-full bg-white">
                <!-- <CardParent/> -->
                 <div class="mb-2">
                    <span class="text-lg"><strong>Cards</strong></span>
                 </div>
                 <hr class="border-gray-300 my-3">
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-2">
                    <CardDetails v-for="(card, index) in cards" :key="index" :card="card" />
                </div>
                
            </div>

        </div>

       
    </AuthenticatedLayout>
</template>

<script setup>

    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import CardDetails from '@/Components/CardDetails.vue';
    import { Head } from '@inertiajs/vue3';

    import { defineProps } from 'vue'

    const props = defineProps({
        cards: {
            type : Array,
            required: true,
        },
        user : {
            type: Object,
            required: true,
        },
    })
    // import { ref, onMounted } from 'vue';
    // import axios from 'axios'

    // const fetchedData = ref([])

    // onMounted(async () => {
    //     try {
    //         // const response = await axios.get('https://api.example.com/data')
    //         const response = await axios.get('https://fake-json-api.mock.beeceptor.com/users')
    //         fetchedData.value = response.data
    //     } catch (error) {
    //         console.error('Error fetching data:', error)
    //     }
    // });

</script>