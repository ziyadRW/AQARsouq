<template>
    <h1 class="text-3xl mb-4">Your AQARs </h1>
    <section class="mb-4">
        <RealtorFilters />
    </section>
    <section class="grid grid-cols-1 lg:grid-cols-2 gap-2">
        <Box v-for="listing in listings" :key="listing.id">
            <div class="flex flex-col md:flex-row gap-2 md:items-center justify-between">
                <Link :href="route('listings.show', listing.id)">
                    <span class="block text-3xl font-bold">{{ listing.headline }}</span>
                    <div class="xl:flex items-center gap-2">
                        <Price :price="listing.price" class="text-2xl font-bold" />
                        <ListingSpace :listing="listing" class="text-lg" />
                    </div>
                    <span class="text-gray-500">{{ listing.city }}, {{ listing.neighbourhood }}</span>
                </Link>
                <div class="flex items-center gap-2 text-gray-600 dark:text-gray-300">
                    <div>
                        <Link class=" btn-outline text-sm font-meduim" :href="route('listings.edit', listing.id)">Edit</Link>
                    </div>
                    <div>
                        <Link class=" btn-outline text-sm font-meduim" method="delete" as="button" :href="route('realtor.listings.destroy', { listing: listing.id})">Delete</Link>
                    </div>
                </div>
            </div>
        </Box>
    </section>
</template>

<script setup>
import Box from '@Components/UI/Box.vue';
import Price from '@Components/Price.vue';
import ListingSpace from '@Components/ListingSpace.vue';
import {Link} from '@inertiajs/inertia-vue3';
import RealtorFilters from '../Listing/Components/RealtorFilters.vue';

defineProps({
    listings: Array
})
</script>

