<template>


    <div class="mt-1 border border-gray-700 w-full bg-white p-1 shadow-md" style="max-width: 400px">
        <div class="border border-gray-500 p-2 min-h-32 bg-white">
            <h1>Card ID : 0091-0991-111abcdef</h1>
        </div>
        <div class="mt-1 grid grid-cols-5 gap-x-2 gap-y-3 bg-white" style="min-height: 550px;">
             <div v-for="outerIndex in outerBoxes" :key="outerIndex" class="grid grid-rows-10 gap-0.5">
                <div v-for="innerIndex in innerBoxes" :key="innerIndex" class="border border-gray-500 flex items-center bg-yellow-100" style="font-size: 0.65rem;">
                    
                    <div class="border border-gray-300 w-1/3 h-full bg-gray-300 me-2 "></div>
                    <div class="m-0">{{ outerIndex - 1 }} - {{ innerIndex - 1 }}</div>
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

