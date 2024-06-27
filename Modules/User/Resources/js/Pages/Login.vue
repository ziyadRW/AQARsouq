<template>
        <form @submit.prevent="login">
            <div class="w-1/2 mx-auto ">
                <div class="mt-9">
                    <label clsas="" for="email" class="label">E-mail</label>
                    <input v-model="form.email" type="email" class="input" id="email">
                    <div class="input-error" v-if="form.errors.email">{{form.errors.email}}</div>
                </div>
                <div>
                    <label for="password" class="label mt-4">password</label>
                    <input  v-model="form.password" type="password" class="input" id="password">
                    <div class="input-error" v-if="form.errors.password">{{form.errors.password}}</div>
                </div>
                <div>
                    <button class="main-btn w-full mt-7" type="submit">
                        Login
                    </button>
                </div>

                <div class="link">
                    <Link :href="route('user.create')">Don't have an Account ?</Link>
                </div>
            </div>
        </form>        
</template>

<script setup>
import {useForm, Link} from '@inertiajs/inertia-vue3';
const form = useForm({
    email: null,
    password: null
})

const login = () => {
    form.post(route('login.store'));
};
</script>
