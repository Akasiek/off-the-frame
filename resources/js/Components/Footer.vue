<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import Logo from '@/Components/Logo.vue';
import InstagramLogo from '@/Components/InstagramLogo.vue';
import TikTokLogo from '@/Components/TikTokLogo.vue';

const links = [
  {
    route: 'style-guides.index',
    name: 'style guides',
  },
  {
    route: 'products.index',
    name: 'products by category',
    param: {
      category: 'shoes',
    },
  },
  {
    route: 'outfits-of-the-day.index',
    name: 'outfit of the day',
  },
];
</script>

<template>
  <div
    class="bg-white-100 rounded-t-3xl shadow-[0_-4px_16px_0_rgba(0,0,0,0.075)] grid grid-cols-[1fr_auto] px-6 sm:px-12 md:px-16 py-4 sm:py-8 md:py-10"
  >
    <div class="space-y-4">
      <div>
        <Link :href="route('home')" class="font-semibold">
          <Logo class="h-8 sm:h-12 md:h-16 w-8 sm:w-12 md:w-16" />
        </Link>
      </div>

      <div class="flex flex-col gap-y-2">
        <Link
          :href="route(link.route, link.param)"
          v-for="link in links"
          :key="link.route"
          class="font-semibold text-black cool-underline w-fit text-xs sm:text-sm md:text-base"
        >
          {{ link.name }}
        </Link>
      </div>
    </div>
    <div class="p-2 flex md:gap-8 xs:gap-4 gap-2">
      <a href="https://www.tiktok.com/@offtheframeee">
        <TikTokLogo class="h-6 sm:h-8 md:h-10 w-fit min-w-fit" />
      </a>
      <a href="https://www.instagram.com/offtheframee/" target="_blank">
        <InstagramLogo class="h-6 sm:h-8 md:h-10 w-fit min-w-fit" />
      </a>
    </div>
  </div>
</template>
