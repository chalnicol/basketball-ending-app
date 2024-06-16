<template>

    <div>
        Game : <strong>{{ card.game }}</strong><br>
        Winning Prize : <strong>&#8369;{{ formatNumber(card.winning_prize, 'en-US') }}.00</strong><br>
        Price Per Slot : <strong>&#8369;{{ card.price_per_slot }}</strong><br>
        Game Date : <strong>{{ formatDate(card.game_date) }}</strong><br>
        Available Slots : <strong>{{ availableSlots }}</strong><br>
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
        return moment(date).format('MMMM D, YYYY - dddd');
    };

    const availableSlots = computed(() => {
        return props.card.slots.filter(slot => !slot.owner_id).length;
    });

</script>

