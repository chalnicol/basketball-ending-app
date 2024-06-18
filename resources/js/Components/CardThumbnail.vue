<template>

    <div class="border border-gray-400 shadow-sm bg-gray-200 rounded-md text-sm overflow-hidden select-none cursor-pointer hover:bg-gray-100" @click="showCard(card.id)">
        <div class="bg-gray-800 px-4 py-3 text-white">
            ID : <strong>{{ card.reference_id }}</strong>
        </div>
        <CardDetails :card="card" class="px-4 py-3"/>

    </div>

</template>


<script setup>

    import moment from 'moment';
    import { defineProps } from 'vue';
    import { router } from '@inertiajs/vue3'
    import CardDetails from '@/Components/CardDetails.vue';

    const props = defineProps({
        card: {
            type: Object,
            required: true
        }
    })

    
    const showCard = (id) => {
        // console.log (id)
        router.visit(`/cards/${id}`, { method: 'get' });
    }

    


</script>

