<template>

    <div>

        <div class="border border-gray-500 flex items-center rounded-sm md:rounded-md overflow-hidden h-14 lg:h-10 select-none custom-slot" :class="{ 'active' : isActive, 'taken' : isTaken }" @click="handleClick" >

            <div class="border-r border-gray-400 w-1/5 lg:w-1/4 h-full me-2 flex justify-center bg-white items-center">
                
                <img v-if="slot.owner_id" class="w-8" src="/assets/images/user_icon.jpg" alt="person" />

                <template v-else>

                    <span v-if="selected" class="material-symbols-outlined rounded-md">
                        check_box
                    </span>
                    <span v-else class="material-symbols-outlined rounded-md">
                        check_box_outline_blank
                    </span>

                </template>
                

            </div>
            <div class="leading-none">
                <div class="font-bold">{{ formatValue(slot.number) }}</div>

                <span v-if="slot.owner_id !== null" class="text-xs m-0 p-0 text-gray-600 font-bold">{{ slot.owner.name }}</span>

                <span v-else class="text-gray-400 text-xs m-0 p-0">-available-</span>

              
                
            </div>
        </div>
        
    </div>

</template>


<script setup>

    import { ref, computed, defineProps, defineEmits } from 'vue';
    import Checkbox from '@/Components/Checkbox.vue';
   
    const emit = defineEmits(['slot-click']);

    const selected = ref(false);

    const props = defineProps ({
        slot : {
            type : Object,
            required : true,
        }
    });

    const handleClick = () => {

        if ( !props.slot.owner_id ) {
            // console.log ('clicking', props.slot.id )
            selected.value = !selected.value;

            emit('slot-click', {
                selected : selected.value,
                slot : {
                    id : props.slot.id,
                    number : props.slot.number,
                } 

            });

        }

    };

    const isActive = computed (() => {
        return selected.value;
    });

    const isTaken = computed (() => {
        return props.slot.owner_id !== null;
    });



    const formatValue = (n) => {

        const r =  Math.floor ( n / 10 );
        const c = n % 10;

        return `${r} - ${c}`;

    };

    
</script>

<style scoped>

    .custom-slot {
        background-color: #dedede;
    }
    .custom-slot.taken {
        background-color: #B3E2A7;
        pointer-events: none;
    }
    .custom-slot.active {
        background-color : #FFF455;
        cursor: pointer;
    }
    .custom-slot:hover:not(.active) {
        background-color: #efefef;
        cursor: pointer;
    }

</style>