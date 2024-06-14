<template>

    <div class="border border-gray-300 shadow-lg rounded-lg text-sm overflow-hidden">
        <div class="bg-blue-200 p-3">
            Card ID : <strong>0000-000{{ item.id }}</strong>
        </div>
        
        <div class="p-3">
            Game : <strong>{{ item.name }}</strong><br>
            Status : <strong>{{ item.company }}</strong><br>
            Winning Prize : <strong>{{ item.email }}</strong><br>
            Price Per Slot : <strong>{{ item.zip }}</strong><br>
            Slots Remaining : <strong>{{ item.state }}</strong>
        </div>
    </div>

</template>


<script setup>
    import { defineProps } from 'vue';
  
    const props = defineProps({
        item: {
            type: Object,
            required: true
        }
    })

</script>

