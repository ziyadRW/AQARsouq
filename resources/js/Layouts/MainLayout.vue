<template>


<header class="border-b border-gray-200 dark:border-gray-700 dark:bg-gray-900 bg-white w-full">
    <div class="container mx-auto">
        <nav class="p-4 flex items-center justify-between">
            <div class="text-lg font-medium">
                <Link :href="route('listings.index')"> All listing</Link> &nbsp;
            </div>
            <div class="text-xl text-indigo-600 dark:text-indigo-300 font-bold text-center">
                <Link :href="route('listings.index')">AQARsouq</Link>
            </div>
            <div class="text-lg font-medium">
                <Link class="main-btn" :href="route('listings.create')">+ New listing</Link> &nbsp;
            </div>
        </nav>
    </div>
</header>

<main class="container mx-auto p-4">
    <div v-if="page.props.value.flash.success" class="mb-4 border rounded-md p-2 shadow-sm border-green-200 dark:border-green-800 bg-green-100 dark:bg-green-900">
        {{ page.props.value.flash.success }}
    </div>
    <slot></slot>
</main>


</template>

<script setup>
import {Link, usePage} from '@inertiajs/inertia-vue3'
import { ref } from 'vue'

const page = usePage()

</script>
