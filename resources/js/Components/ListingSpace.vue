<template>
    <div class="">
        <span class="font-bold">{{ listing.beds }} bds </span>
        <span class="text-gray-400"> | </span>
        <span class="font-bold">{{ listing.baths }} bth </span>
        <span class="text-gray-400"> | </span>
        <span class="font-bold">{{ listing.area }}m&sup2;</span> 
    </div>
</template>

<script setup>
defineProps({
    listing: Object,
})
</script>