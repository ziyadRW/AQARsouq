<template>
    <span>
        {{formatedPrice}}
    </span>
</template>

<script setup>
import {computed} from 'vue'

    const props = defineProps({
        price: [Number, String],
    })
    const formatedPrice = computed(() => {
        return Number(props.price).toLocaleString('EN-SA', {
            style: 'currency',
            currency: 'SAR',
            maximumFractionDigits:0,
        });
});
</script>
