<template>
    <div class="flex flex-col-reverse md:grid md:grid-cols-12 gap-4">
        <Box class="md:col-span-7 flex items-center w-full">
            <div class="w-full text-center font-medium text-gray-500">
                NO images
            </div>
        </Box>
        <div class="md:col-span-5 flex flex-col gap-4">
            <Box>
                <template #header>Information</template>
                <span class="block text-3xl font-bold">{{ listing.headline }}</span>
                <Price :price="listing.price" class="text-2xl font-bold" />
                <ListingSpace :listing="listing" class="text-lg" />
                <ListingAddress :listing="listing" class="text-gray-500" />
                <span class="mt-7 block">{{ listing.description }}</span>
            </Box>
            <Box>
                <template #header>Monthly Payment</template>
                <div>
                    <label for="" class="label">Interest rate ({{ rate }}%)</label>
                    <input v-model.number="rate" type="range" min="0" max="30" step="0.1" class="range">

                    <label for="" class="label">Duration ({{ duration }} years)</label>
                    <input v-model.number="duration" type="range" min="1" max="35" step="1" class="range">
                </div>

                <div class="text-gray-600 dark:text-gray-300 mt-2">
                    <div class="text-gray-400">Your monthly payment</div>
                    <Price :price="payment" class="text-3xl"/>
                </div>
                <div class="mt-2 text-gray-500">
                    <div class="flex justify-between">
                        <div>Total paid</div>
                        <div>
                            <Price :price="total" class="font-medium"/>
                        </div>
                    </div>
                    <div class="flex justify-between">
                        <div>Principal paid</div>
                        <div>
                            <Price :price="listing.price" class="font-medium"/>
                        </div>
                    </div>
                    <div class="flex justify-between">
                        <div>Interest paid</div>
                        <div>
                            <Price :price="totalInterest" class="font-medium"/>
                        </div>
                    </div>
                </div>
            </Box>
        </div>
    </div>
</template>

<script setup>
import Price from '@Components/Price.vue';
import ListingAddress from '@Components/ListingAddress.vue';
import ListingSpace from '@Components/ListingSpace.vue';
import Box from '@Components/UI/Box.vue';

import { ref, computed } from 'vue';

const rate = ref(2.5);
const duration = ref(25);

const props = defineProps({
    listing: Object,
});

const monthlyInterestRate = computed(() => rate.value / 100 / 12);
const numberOfPayments = computed(() => duration.value * 12);

const payment = computed(() => {
    if (monthlyInterestRate.value === 0) {
        return props.listing.price / numberOfPayments.value;
    }
    return (
        (props.listing.price * monthlyInterestRate.value * Math.pow(1 + monthlyInterestRate.value, numberOfPayments.value)) /
        (Math.pow(1 + monthlyInterestRate.value, numberOfPayments.value) - 1)
    ).toFixed(2);
});

const total = computed(() => (payment.value * numberOfPayments.value).toFixed(2));
const totalInterest = computed(() => (total.value - props.listing.price).toFixed(2));
</script>

<style scoped>
.label {
    margin-top: 1em;
}
.range {
    width: 100%;
}
</style>
