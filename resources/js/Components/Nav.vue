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
    args: { category: 'shoes' },
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
    class="sticky top-0 inset-x-0 flex flex-col items-center gap-y-2 sm:gap-y-4 py-2 sm:py-4 rounded-b-3xl shadow-[0_4px_16px_0_rgba(0,0,0,0.075)] bg-white-100 z-50 overflow-hidden w-auto"
  >
    <div>
      <Link :href="route('home')" class="font-semibold">
        <Logo class="h-8 sm:h-12 md:h-16" />
      </Link>
    </div>

    <div class="flex gap-x-2 sm:gap-x-6 md:ml-8 px-4 flex-wrap w-auto justify-center">
      <Link
        :href="route(link.route, link.args)"
        v-for="link in links"
        :key="link.route"
        class="font-semibold text-black cool-underline md:text-base sm:text-sm text-xs"
      >
        {{ link.name }}
      </Link>
    </div>
  </nav>
</template>
