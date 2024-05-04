<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import Logo from '@/Components/Logo.vue';

const links = [
  {
    route: 'style-guides.index',
    name: 'style guides',
  },
  {
    route: 'products.index',
    name: 'products by category',
  },
  {
    route: 'outfits-of-the-day.index',
    name: 'outfit of the day',
  },
];
</script>

<template>
  <nav
    class="sticky top-0 inset-x-0 flex flex-col items-center gap-y-4 py-4 rounded-b-3xl shadow-[0_4px_16px_0_rgba(0,0,0,0.075)] bg-white-100 z-50"
  >
    <div>
      <Link :href="route('home')" class="font-semibold">
        <Logo class="h-16" />
      </Link>
    </div>

    <div class="flex gap-x-6 ml-8">
      <Link :href="route(link.route)" v-for="link in links" :key="link.route" class="font-semibold text-black cool-underline">
        {{ link.name }}
      </Link>
    </div>
    <div class="bg-white-100 hover:bg-zinc-200 transition-colors absolute right-0 w-4 h-4 rounded-full">
      <Link :href="route('products.dashboard')" class="block w-4 h-4" />
    </div>
  </nav>
</template>
