

<template>
    <Head title="Home" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Home</h2>
        </template>

       
        <div class="max-w-7xl mx-auto mt-2">

            <!-- <div class="bg-white overflow-hidden my-2 shadow-sm sm:rounded-md bg-green-300">
                <div class="px-5 py-3 text-gray-900">Welcome, {{ user.name }}!</div>
            </div> -->

            <div class="p-6 border border-dark-300 mt-1 max-w-full bg-white">
                <!-- <CardParent/> -->
                 <div class="mb-2">
                    <span class="text-lg"><strong>Active Cards</strong></span>
                 </div>
                 <hr class="border-gray-300 my-3">
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3">
                    <CardDetails v-for="(card, index) in activeCards" :key="index" :card="card" />
                </div>

                <br>

                <div class="mb-2">
                    <span class="text-lg"><strong>Pending Cards</strong></span>
                 </div>
                 <hr class="border-gray-300 my-3">
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3">
                    <CardDetails v-for="(card, index) in pendingCards" :key="index" :card="card" />
                </div>

                <br>
                
            </div>

           

        </div>

       
    </AuthenticatedLayout>
</template>

<script setup>

    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import CardDetails from '@/Components/CardDetails.vue';
    import { Head, usePage } from '@inertiajs/vue3';

    import { ref } from 'vue'
    
    const { user, cards } = usePage().props;

    // Separate cards into active and pending arrays
    const activeCards = ref([]);
    const pendingCards = ref([]);

    cards.forEach(card => {
        if (card.status === 'Active') {
            activeCards.value.push(card);
        } else if (card.status === 'Pending') {
            pendingCards.value.push(card);
        }
    });

    
    // const props = defineProps({
    //     cards: {
    //         type : Array,
    //         required: true,
    //     },
    //     user : {
    //         type: Object,
    //         required: true,
    //     },
    // })

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