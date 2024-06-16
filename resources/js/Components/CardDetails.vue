<template>

    <div class="border border-gray-300 shadow-sm rounded-lg text-sm overflow-hidden select-none cursor-pointer hover:shadow-lg" @click="showCard(card.id)">
        <div :class="[ card.status == 'Active' ? 'bg-green-500' : 'bg-orange-400', 'p-3', 'text-white']">
            Ref. ID : <strong>{{ card.reference_id }}</strong>
        </div>
        
        <div class="p-3 mb-2">
           <CardContent :card="card" />
        </div>

    </div>

</template>


<script setup>
    import moment from 'moment';
    import { defineProps } from 'vue';
    import { router } from '@inertiajs/vue3'
    import CardContent from '@/Components/CardContent.vue';

    const props = defineProps({
        card: {
            type: Object,
            required: true
        }
    })

    
    const showCard = (id) => {
        console.log (id)
        router.visit(`/cards/${id}`, { method: 'get' });
    }

    


</script>

