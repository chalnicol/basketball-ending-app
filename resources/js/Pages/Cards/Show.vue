
<template>
    <Head title="Show Card"  />

   <AuthenticatedLayout>
       
       <template #header>
           <h2 class="font-semibold text-xl text-gray-800 leading-tight">Show Card</h2>
       </template>

       <div class="max-w-7xl mx-auto mt-2 bg-white px-3">

        <div class="w-full flex justify-between items-center">
            <h1 class="p-2 md:p-6 text-md md:text-2xl font-bold">Reference ID : {{ card.reference_id }}</h1>
            <div class="mx-6 px-3 py-2 bg-gray-200 rounded-lg font-bold">
                {{ card.status }}
            </div>
        </div>

        <hr class="border-b-1 shadow-lg">
        <div class="flex flex-col lg:flex-row gap-5 content-center justify-start p-2 md:p-6">
            <CardContent :card="card" class="lg:w-1/3"/>
            <CardSlots :slots="card.slots" />
        </div>
       </div>

   </AuthenticatedLayout>

</template>

<script setup>

   import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
   import { Head } from '@inertiajs/vue3';
   import { defineProps } from 'vue';
   import CardSlots from '@/Components/CardSlots.vue';
   import CardContent from '@/Components/CardContent.vue';

    //..
    defineProps ({
        card: {
            type: Object,
            required: true
        }
    });

</script>