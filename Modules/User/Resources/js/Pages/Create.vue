<template>
    <form @submit.prevent="signUp">
        <div class="w-1/2 mx-auto">
            <div class="mt-9">
                <label for="name" class="label">Name</label>
                <input v-model="form.name" type="text" class="input" id="name">
                <div class="input-error" v-if="form.errors.name">{{form.errors.name}}</div>
            </div>
            <div>
                <label for="email" class="label mt-4">E-mail</label>
                <input v-model="form.email" type="email" class="input" id="email">
                <div class="input-error" v-if="form.errors.email">{{form.errors.email}}</div>
            </div>
            <div>
                <label for="password" class="label mt-4">Password</label>
                <input v-model="form.password" type="password" class="input" id="password">
                <div class="input-error" v-if="form.errors.password">{{form.errors.password}}</div>
            </div>
            <div>
                <label for="password_confirmation" class="label mt-4">Confirm Password</label>
                <input v-model="form.password_confirmation" type="password" class="input" id="password_confirmation">
                <div class="input-error" v-if="form.errors.password_confirmation">{{form.errors.password_confirmation}}</div>
            </div>
            <div>
                <button class="main-btn w-full mt-7" type="submit">
                    Create Account
                </button>
            </div>
            <div class="link">
                    <Link :href="route('login')">Already have an Account ?</Link>
            </div>
        </div>
    </form>
</template>

<script setup>
import { useForm, Link } from '@inertiajs/inertia-vue3';

const form = useForm({
    name: null,
    email: null,
    password: null,
    password_confirmation: null,
});

const signUp = () => {
    form.post(route('user.store'));
};
</script>
