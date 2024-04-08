<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import Logo from '@/Components/Logo.vue';

const links = [
  {
    // route: 'style-guides',
    route: 'home',
    name: 'style guides',
  },
  {
    // route: 'products',
    route: 'home',
    name: 'products by category',
  },
  {
    // route: 'outfit-of-the-day',
    route: 'home',
    name: 'outfit of the day',
  },
];
</script>

<template>
  <div class="bg-white-100 rounded-t-3xl shadow-[0_-4px_16px_0_rgba(0,0,0,0.075)] flex px-16 py-10">
    <div class="flex-1 space-y-4">
      <div>
        <Link :href="route('home')" class="font-semibold">
          <Logo class="h-16 w-fit" />
        </Link>
      </div>

      <div class="flex flex-col gap-y-2">
        <Link :href="route(link.route)" v-for="link in links" :key="link.route" class="font-semibold text-black cool-underline w-fit">
          {{ link.name }}
        </Link>
      </div>
    </div>

    <div class="flex flex-col mt-auto justify-end gap-y-2 items-end text-zinc-400 font-semibold">
      <Link :href="route('home')" class="cool-underline after:bg-zinc-400">Cookie Policy</Link>
      <Link :href="route('home')" class="cool-underline after:bg-zinc-400">Privacy Policy</Link>
    </div>
  </div>
</template>
