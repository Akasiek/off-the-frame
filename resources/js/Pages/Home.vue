<script setup lang="ts">
import PrimaryLayout from '@/Layouts/PrimaryLayout.vue';

import oftd from '@/Assets/oftd.webp';
import prod1 from '@/Assets/prod_1.webp';
import prod2 from '@/Assets/prod_2.webp';
import prod3 from '@/Assets/prod_3.webp';
import prod4 from '@/Assets/prod_4.webp';
import style1 from '@/Assets/style_1.webp';
import style2 from '@/Assets/style_2.webp';
</script>

<template>
  <PrimaryLayout title="Welcome">
    <div class="max-w-4xl mx-auto my-16 grid sm:grid-cols-2 gap-8 px-8">
      <a class="block sm:col-span-2" :href="route('outfits-of-the-day.index')">
        <div class="rounded-2xl bg-white-0 border h-[26rem] overflow-hidden flex">
          <div class="w-full h-full relative md:block hidden">
            <img :src="prod2" alt="Product 2" class="absolute top-4 left-4 w-48 h-48" />
            <img :src="prod3" alt="Product 3" class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-48 h-48" />
            <img :src="prod4" alt="Product 4" class="absolute bottom-4 right-4 w-48 h-48" />
          </div>
          <div class="p-6 w-full">
            <img :src="oftd" alt="Outfit of the day" class="rounded-2xl h-full w-full md:w-96 object-cover object-top" />
          </div>
        </div>
        <h2 class="lg:text-2xl text-xl text-center text-gray-800 p-4 uppercase font-serif tracking-wider">Outfit of the day</h2>
      </a>

      <a class="block" :href="route('products.index')">
        <div class="rounded-2xl bg-white-0 border h-[26rem] sm:h-[32rem] overflow-hidden flex">
          <div class="w-full h-full relative">
            <img :src="prod1" alt="Product 1" class="absolute top-4 right-4 w-48 h-48" />
            <img :src="prod3" alt="Product 3" class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-48 h-48" />
            <img :src="prod4" alt="Product 4" class="absolute bottom-4 left-4 w-48 h-48" />
          </div>
        </div>
        <h2 class="lg:text-2xl text-xl text-center text-gray-800 p-4 uppercase font-serif tracking-wider">Products by Category</h2>
      </a>

      <a class="block" :href="route('style-guides.index')">
        <div class="rounded-2xl bg-white-0 border h-[26rem] sm:h-[32rem] overflow-hidden flex">
          <div class="w-full h-full grid grid-rows-2">
            <img :src="style1" alt="Style 1" />
            <img :src="style2" alt="Style 2" />
          </div>
        </div>
        <h2 class="lg:text-2xl text-xl text-center text-gray-800 p-4 uppercase font-serif tracking-wider">Style Guide</h2>
      </a>
    </div>
  </PrimaryLayout>
</template>
