<template>

    <div>
        <div class="w-full">
            <div class="grid md:grid-cols-2 xl:grid-cols-5 gap-x-2 gap-y-4 bg-white">

                <div v-for="(group, groupIndex) in chunkedSlots" :key="groupIndex" class="grid grid-rows-10 gap-1">
                    
                    <CardSlot v-for="(slot, slotIndex) in group" :key="slotIndex" :slot="slot" @slot-click="handleSlotData" />

                </div>
            </div>
        </div>
    </div>

</template>


<script setup>

    import { ref, computed, defineEmits } from 'vue';
    
    import CardSlot from '@/Components/CardSlot.vue';

    const emit = defineEmits(['emit-data']);


    const props = defineProps ({
        slots : {
            type : Array,
            required : true
        }
    });

    const selected = ref([]);

    const handleSlotData = (data) => {
        
        if ( data.selected ) {  
            selected.value.push(data.slot);
        }else {
            const index = selected.value.findIndex( slot => slot.id === data.slot.id );
            if (index !== -1) {
                selected.value.splice(index, 1);
            }
        }
        emit('emit-data', selected.value);

    };



   

    const chunkArray = (array, chunkSize) => {
        const chunks = [];
        for (let i = 0; i < array.length; i += chunkSize) {
            chunks.push(array.slice(i, i + chunkSize));
        }
        return chunks;
    };

    // Compute the chunked slots once
    const chunkedSlots = computed(() => {
        return chunkArray(props.slots, 10);
    });

    


</script>

