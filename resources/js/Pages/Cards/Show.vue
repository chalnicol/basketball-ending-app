
<template>
    <Head title="Show Card"  />

   <AuthenticatedLayout>
       
       <!-- <template #header>
           <h2 class="font-semibold text-xl text-gray-800 leading-tight">Show Card</h2>
       </template> -->

       <div class="max-w-7xl mx-auto mt-2 bg-white px-3 pb-3">

            <div class="lg:flex px-3 py-5">

                <div class="lg:w-1/4 lg:mr-5 flex flex-col md:flex-row lg:flex-col items-start md:items-end lg:items-start  mb-0 md:mb-6 lg:mb-0">

                    <div class="lg:mb-6 mr-0 md:mr-8 lg:mr-0">
                        <div class="mb-4">
                            <span class="font-bold text-xl"> Reference ID :</span> <br>
                            <span class="text-md text-gray-500">{{ card.reference_id }}</span>
                        </div>

                        <CardDetails :card="card"/>
                    </div>

                    <div>

                        
                        <div class="mb-4 leading-relaxed">                
                            
                            Current Slots Owned : <strong>{{ slotsOwned }}</strong><br>

                            Current Slots Picked : <strong>{{ currentSlotsPicked }}</strong><br>

                        
                            Amount Total  : <strong>&#8369;{{  totalAmountOfCurrentSlotsPicked }}. 00 *</strong><br>
                            <span class="text-xs text-rose-500">* to be deducted to your cash balance</span>
                            
                        </div>

                        <div class="mb-2 text-gray-500 text-sm">Please pick slots and when done hit the save button.</div>

                        <button class="border font-bold py-2 text-lg md:text-md rounded-md w-full custom-button" @click="updateCard" :disabled="!hasSlotsPicked" >SAVE</button>
                    
                    </div>

                </div>

                <CardSlots :slots="card.slots" class="grow mt-4 md:mt-0" @emit-data="handleData"/>
                
                
            </div>

       </div>

        <!-- <Modal :show="isShown" :closeable="true" >
            <div class="p-3">
                <p>Are you sure to own the slots below?</p>
                <div></div>
            </div>
        </Modal> -->

   </AuthenticatedLayout>

</template>

<script setup>

   import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
   import { Head } from '@inertiajs/vue3';
   import { ref, defineProps, computed } from 'vue';
   import CardSlots from '@/Components/CardSlots.vue';
   import Modal from '@/Components/Modal.vue';

   import CardDetails from '@/Components/CardDetails.vue';

   import { router } from '@inertiajs/vue3'


    //..
    const props = defineProps ({
        card: {
            type: Object,
            required: true
        },
        user_id : Number,
    });

    // const isShown = ref(false);

    const slotsOwned = computed(() => {
        return props.card.slots.filter (slot => slot.owner_id === props.user_id ).length;
    });

    const currentSlotsPicked = computed(() => {
        return selectedSlots.value.length;
    });

    const totalAmountOfCurrentSlotsPicked = computed(() => {
        return selectedSlots.value.length * props.card.price_per_slot;
    });


    const selectedSlots = ref([]);
    
    const hasSlotsPicked = computed(() => {
        return selectedSlots.value.length > 0;
    });

    const toPass = ref([]);

    const updateCard = () => {

        selectedSlots.value.forEach(slot => {
            toPass.value.push(slot.id);
        });

        // console.log('this is clicked', toPass.value);

        router.visit ('/slots', {
            method: 'patch',
            data : {
                toPass : toPass.value
            },
            preserveScroll : true,
            onSuccess : () => {
                console.log ('this is done');
            }
        }); 
    };

    const handleData = (data) => {
        // console.log ('asdf', data);
        selectedSlots.value = data;
    };

   
</script>

<style scoped>
    .custom-button {
        background-color: black;
        color: white;
        padding: 10px;
    }
    .custom-button:disabled {
        background-color: #4e4e4e;
        opacity: 0.5;
    }
    .custom-button:hover:not(:disabled) {
        background-color: #2e2e2e;
        cursor: pointer;
    }

</style>