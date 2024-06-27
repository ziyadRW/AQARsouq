<template>
    <form @submit.prevent="create">
        <div class="grid grid-cols-6 gap-4">
            <div class="col-span-6">
                <label class="label">Headline</label>
                <input class="input" v-model.number="form.headline" type="text" />
                <div class="input-error" v-if="form.errors.headline">
                    {{ form.errors.headline }}
                </div>
            </div>
            <div class="col-span-2">
                <label class="label">Beds</label>
                <input class="input" v-model.number="form.beds" type="text" />
                <div class="input-error" v-if="form.errors.beds">
                    {{ form.errors.beds }}
                </div>
            </div>
            <div class="col-span-2">
                <label class="label">Baths</label>
                <input class="input" v-model.number="form.baths" type="text" />
                <div class="input-error" v-if="form.errors.baths">
                    {{ form.errors.baths }}
                </div>
            </div>
            <div class="col-span-2">
                <label class="label">Area</label>
                <input class="input" v-model.number="form.area" type="text" />
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
                <textarea class="input" v-model.number="form.description" type="text"></textarea>
                <div class="input-error" v-if="form.errors.description">
                    {{ form.errors.description }}
                </div>
            </div>
            <div class="col-span-6">
                <label class="label">Price</label>
                <input class="input" v-model.number="form.price" type="text" />
                <div class="input-error" v-if="form.errors.price">
                    {{ form.errors.price }}
                </div>
            </div>
            <div class="col-span-6">
                <button class="main-btn mt-1 block w-full" type="submit">Create</button>
            </div>
        </div>
    </form>
</template>

<script setup>
import { useForm, usePage } from '@inertiajs/inertia-vue3';
import { ref, watch } from 'vue';

const { props } = usePage();

const loadFormData = () => {
    const data = localStorage.getItem('formData');
    return data ? JSON.parse(data) : {};
};

const initialForm = loadFormData();

const form = useForm({
    headline: initialForm.headline ?? props.headline ?? '',
    beds: initialForm.beds ?? props.beds ?? 0,
    baths: initialForm.baths ?? props.baths ?? 0,
    area: initialForm.area ?? props.area ?? 0,
    city: initialForm.city ?? props.city ?? '',
    street: initialForm.street ?? props.street ?? '',
    neighbourhood: initialForm.neighbourhood ?? props.neighbourhood ?? '',
    code: initialForm.code ?? props.code ?? '',
    description: initialForm.description ?? props.description ?? '',
    price: initialForm.price ?? props.price ?? 0,
});

watch(form, (newForm) => {
    localStorage.setItem('formData', JSON.stringify(newForm));
}, { deep: true });

const create = () => {
    form.post(route('listings.store'), {
        onFinish: () => {
            localStorage.removeItem('formData');
        },
    });
};
</script>
