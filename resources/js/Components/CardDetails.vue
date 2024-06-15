<template>

    <div class="border border-gray-500 shadow-lg rounded-lg text-sm overflow-hidden">
        <div class="bg-gray-800 text-white p-3">
            Card ID : <strong>{{ card.reference_id }}</strong>
        </div>
        
        <div class="p-3">
            Game : <strong>{{ card.game }}</strong><br>
            Winning Prize : <strong>&#8369;{{ formatNumber(card.winning_prize, 'en-US') }}.00</strong><br>
            Price Per Slot : <strong>&#8369;{{ card.price_per_slot }}</strong><br>
            Game Date : <strong>{{ formatDate(card.game_date) }}</strong><br>
            Slot Remaining: <strong>100</strong><br>
            <hr class="my-2">
            Status : <span :class="[ card.status == 'Active' ? 'bg-green-400' : 'bg-orange-300', 'p-1', 'rounded']"><strong>{{ card.status }}</strong></span><br>
        </div>
    </div>

</template>


<script setup>
    import moment from 'moment';
    import { defineProps } from 'vue';
  
    const props = defineProps({
        card: {
            type: Object,
            required: true
        }
    })

    const formatNumber = (number, locale = 'en-US') => {
        return new Intl.NumberFormat(locale).format(number);
    };

    const formatDate = (date) => {
        return moment(date).format('MMMM D, YYYY - dddd');
    };

</script>

