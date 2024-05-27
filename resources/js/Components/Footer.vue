<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import Logo from '@/Components/Logo.vue';
import InstagramLogo from '@/Components/InstagramLogo.vue';

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
  <div class="bg-white-100 rounded-t-3xl shadow-[0_-4px_16px_0_rgba(0,0,0,0.075)] flex px-6 sm:px-12 md:px-16 py-4 sm:py-8 md:py-10">
    <div class="flex-1 space-y-4">
      <div>
        <Link :href="route('home')" class="font-semibold">
          <Logo class="h-8 sm:h-12 md:h-16 w-fit min-w-fit" />
        </Link>
      </div>

      <div class="flex flex-col gap-y-2">
        <Link
          :href="route(link.route)"
          v-for="link in links"
          :key="link.route"
          class="font-semibold text-black cool-underline w-fit text-xs sm:text-sm md:text-base"
        >
          {{ link.name }}
        </Link>
      </div>
    </div>
    <a href="https://www.instagram.com/offtheframee/" target="_blank" class="p-2 block">
      <InstagramLogo class="h-6 sm:h-8 md:h-10 w-fit min-w-fit" />
    </a>
  </div>
</template>
