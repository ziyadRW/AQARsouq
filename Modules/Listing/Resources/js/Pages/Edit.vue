<template>
    <form @submit.prevent="update">
        <div class="grid grid-cols-6 gap-4">
            <div class="col-span-6">
                <label class="label">Headline</label>
                <input class="input" v-model="form.headline" type="text" />
                <div class="input-error" v-if="form.errors.headline">
                    {{ form.errors.headline }}
                </div>
            </div>
            <div class="col-span-2">
                <label class="label">Beds</label>
                <input class="input" v-model="form.beds" type="number" />
                <div class="input-error" v-if="form.errors.beds">
                    {{ form.errors.beds }}
                </div>
            </div>

            <div class="col-span-2">
                <label class="label">Baths</label>
                <input class="input" v-model="form.baths" type="number" />
                <div class="input-error" v-if="form.errors.baths">
                    {{ form.errors.baths }}
                </div>
            </div>

            <div class="col-span-2">
                <label class="label">Area</label>
                <input class="input" v-model="form.area" type="number" />
                <div class="input-error" v-if="form.errors.area">
                    {{ form.errors.area }}
                </div>
            </div>

            <div class="col-span-4">
                <label class="label">City</label>
                <input class="input" v-model="form.city" type="text" />
                <div class="input-error" v-if="form.errors.city">
                    {{ form.errors.city }}
                </div>
            </div>
            <div class="col-span-2">
                <label class="label">Post Code</label>
                <input class="input" v-model="form.code" type="text" />
                <div class="input-error" v-if="form.errors.code">
                    {{ form.errors.code }}
                </div>
            </div>
            <div class="col-span-4">
                <label class="label">Neighbourhood</label>
                <input class="input" v-model="form.neighbourhood" type="text" />
                <div class="input-error" v-if="form.errors.neighbourhood">
                    {{ form.errors.neighbourhood }}
                </div>
            </div>
            <div class="col-span-2">
                <label class="label">Street</label>
                <input class="input" v-model="form.street" type="text" />
                <div class="input-error" v-if="form.errors.street">
                    {{ form.errors.street }}
                </div>
            </div>
            <div class="col-span-6">
                <label class="label">Description</label>
                <textarea class="input" v-model="form.description"></textarea>
                <div class="input-error" v-if="form.errors.description">
                    {{ form.errors.description }}
                </div>
            </div>
            <div class="col-span-6">
                <label class="label">Price</label>
                <input class="input" v-model="form.price" type="number" />
                <div class="input-error" v-if="form.errors.price">
                    {{ form.errors.price }}
                </div>
            </div>
            <div class="col-span-6">
                <button class="main-btn mt-1 block w-full" type="submit">Update</button>
            </div>
        </div>
    </form>
</template>

<script setup>
import { useForm } from '@inertiajs/inertia-vue3';

const props = defineProps({
    listing: Object
});

const form = useForm({
    headline: props.listing.headline,
    beds: props.listing.beds,
    baths: props.listing.baths,
    area: props.listing.area,
    city: props.listing.city,
    street: props.listing.street,
    neighbourhood: props.listing.neighbourhood,
    code: props.listing.code,
    description: props.listing.description,
    price: props.listing.price
});

const update = () => form.put(route('listings.update', props.listing.id));
</script>

<style scoped>
label {
    margin-right: 2em;
}

div {
    padding: 2px;
}
</style>
