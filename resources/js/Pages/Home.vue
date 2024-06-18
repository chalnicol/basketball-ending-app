

<template>
    <Head title="Home" />

    <AuthenticatedLayout>
        <!-- <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Home</h2>
        </template>
        -->

        <div class="max-w-7xl mx-auto mt-2">

            <div class="p-6 border border-dark-300 mt-1 max-w-full bg-white">

                <h1 class="font-bold text-1xl mb-2">Cards</h1>
                <hr>

                <div v-if="cards.length > 0" class="my-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3">
                        <CardThumbnail v-for="(card, index) in cards" :key="index" :card="card" />
                    </div>
                </div>
                <template v-else>
                    <div class="my-3 px-1">
                        <span>Nothing to display.</span>
                    </div>
                </template>
               

                
            </div>

           

        </div>

       
    </AuthenticatedLayout>
</template>

<script setup>

    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import CardThumbnail from '@/Components/CardThumbnail.vue';
    import { Head, usePage } from '@inertiajs/vue3';

    import { ref } from 'vue'
    
    const { user, cards } = usePage().props;

    const currentTable = ref('active');



    // Separate cards into active and pending arrays
    const activeCards = ref([]);
    const pendingCards = ref([]);

    cards.forEach(card => {
        if (card.status === 'active') {
            activeCards.value.push(card);
        } else if (card.status === 'pending') {
            pendingCards.value.push(card);
        }
    });

    const isCurrrentTab = ( tab ) => {
        return currentTable.value === tab;
    }

    console.log(isCurrrentTab('active'));

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