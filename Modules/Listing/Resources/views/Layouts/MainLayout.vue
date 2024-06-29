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
          <div v-if="user" class="flex items-center gap-4 text-lg font-medium">
            <div class="hidden sm:block text-sm text-gray-500">
              <Link class="hover:text-gray-800 dark:hover:text-gray-300" :href="route('listings.manage')">
                {{ user.name }}'s Account
              </Link>
            </div>
            <div>
              <Link class="main-btn" :href="route('listings.create')">+ New listing</Link> &nbsp;
            </div>
            <div>
              <Link method="post" as="button" :href="route('logout')">Logout</Link>
            </div>
          </div>
          <div v-else class="flex items-center gap-3">
            <Link :href="route('login')">Login</Link>
            <Link :href="route('user.create')">Signup</Link>
          </div>
        </nav>
      </div>
    </header>
  
    <main class="container mx-auto p-4 w-full">
      <div v-if="page.props.flash.success" class="mb-4 border rounded-md p-2 shadow-sm border-green-200 dark:border-green-800 bg-green-100 dark:bg-green-900">
        {{ page.props.flash.success }}
      </div>
      <slot></slot>
    </main>
  </template>
  
  <script setup>
  import { Link, usePage } from '@inertiajs/inertia-vue3';
  
  const page = usePage();
  const user = page.props.auth.user;
  </script>
  