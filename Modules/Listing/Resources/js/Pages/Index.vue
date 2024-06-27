<template>
    <Filters :filters="filters"/>
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
        <Box v-for="listing in listings.data" :key="listing.id">
            <div>
                <Link :href="route('listings.show', listing.id)">
                    <span class="block text-3xl font-bold">{{ listing.headline }}</span>
                    <Price :price="listing.price" class="text-2xl font-bold" />
                    <span class="text-xs p-2">
                        <Price :price="computePayment(listing.price)" />
                        /Monthly
                    </span>
                    <ListingSpace :listing="listing" class="text-lg" />
                    <span class="text-gray-500">{{ listing.city }}, {{ listing.neighbourhood }}</span>
                </Link>
            </div>
            <div>
                <Link :href="route('listings.edit', listing.id)">Edit</Link>
            </div>
        </Box>
    </div>
    <div v-if="listings.data.length" class="w-full flex justify-center mt-4 mb-4">
        <Pagination :links="listings.links" />        
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/inertia-vue3';
import Filters from '@Components/Filters.vue';
import Box from '@Components/UI/Box.vue';
import ListingSpace from '@Components/ListingSpace.vue';
import Price from '@Components/Price.vue';
import Pagination from '@Components/UI/Pagination.vue';

const props = defineProps({
    listings: Object,
    filters: Object
});

// Function to compute monthly payment
const computePayment = (price) => {
    const monthlyInterestRate = 2.5 / 100 / 12;
    const numberOfPayments = 25 * 12;
    return (
        (price * monthlyInterestRate * Math.pow(1 + monthlyInterestRate, numberOfPayments)) /
        (Math.pow(1 + monthlyInterestRate, numberOfPayments) - 1)
    ).toFixed(2);
};
</script>
