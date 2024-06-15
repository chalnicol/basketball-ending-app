
<template>
     <Head title="About Us" />

    <AuthenticatedLayout>
        
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">About Us</h2>
        </template>

        <h1 class="text-xl">
            <strong>This is the about page..</strong>
        </h1>
       
    </AuthenticatedLayout>

</template>

<script setup>

    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import { Head } from '@inertiajs/vue3';
    // import CardParent from '@/Components/CardFull.vue';

   //..

</script>