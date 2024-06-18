<template>

    <div>
        <div class="mb-2">
            Game : <strong>{{ card.game }}</strong><br>
            Winning Prize : <strong>&#8369;{{ formatNumber(card.winning_prize, 'en-US') }}.00</strong><br>
            Price Per Slot : <strong>&#8369;{{ card.price_per_slot }}</strong><br>
            Game Date : <strong>{{ formatDate(card.game_date) }}</strong><br>
            Available Slots : <strong>{{ availableSlots }}</strong><br>
        </div>
        <hr class="border-t border-b-0 border-zinc-400">
        <div class="flex items-center border-gray-300 mt-2">
            <div class="me-3">Status : <span :class="['font-bold', card.status === 'active' ? 'text-green-800' : 'text-orange-500']"> {{ capitalize(card.status) }} </span> </div>
        </div>
    </div>

</template>


<script setup>

    import moment from 'moment';
    import { defineProps, computed } from 'vue';

    const props = defineProps({
        card: {
            type: Object,
            required: true
        }
    });

    
    const formatNumber = (number, locale = 'en-US') => {
        return new Intl.NumberFormat(locale).format(number);
    };

    const formatDate = (date) => {
        return moment(date).format('dddd, MMMM D, YYYY');
    };

    const availableSlots = computed(() => {
        return props.card.slots.filter(slot => !slot.owner_id).length;
    });
    
    const capitalize = ( word ) => {
        return word.charAt(0).toUpperCase() + word.slice(1);
    }

</script>

