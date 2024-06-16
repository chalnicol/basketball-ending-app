<template>


    <div class="w-full">
        <div class="grid md:grid-cols-2 xl:grid-cols-5 gap-x-2 gap-y-4 bg-white">

             <div v-for="outerIndex in outerBoxes" :key="outerIndex" class="grid grid-rows-10 gap-1">
                <div v-for="innerIndex in innerBoxes" :key="innerIndex" class="border border-gray-500 flex items-center bg-white rounded-sm md:rounded-md overflow-hidden h-14 lg:h-10 cursor-pointer hover:bg-gray-100">
                    
                    <!-- <div :class="[ card.owner_id != null ? 'bg-green-500' :'bg-red-500', 'border', 'border-gray-300', 'w-1/5', 'lg:w-1/4', 'h-full','me-2']"></div> -->
                    <div :class="['bg-yellow-300', 'w-10', 'lg:w-1/4', 'h-full','me-2']"></div>

                    <div>
                        <div class="font-bold">{{ outerIndex - 1 }} - {{ innerIndex - 1 }}</div>
                        <div class="text-xs text-gray-500">-no owner-</div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</template>


<script setup>
    import { ref } from 'vue';
   
    // Define the number of outer and inner boxes
    const outerBoxes = ref(10);
    const innerBoxes = ref(10);

</script>

