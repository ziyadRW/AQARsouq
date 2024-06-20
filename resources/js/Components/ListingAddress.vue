<template>
    <span>
        {{ listing.city }},
        {{ listing.neighbourhood }}
        {{ listing.street }}
        {{ listing.code }}
    </span>
</template>

<script setup>
defineProps({
listing: Object,
})
</script>