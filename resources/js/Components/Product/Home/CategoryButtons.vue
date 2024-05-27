<script setup lang="ts">
import { ProductCategory } from '@/Interfaces';
import { router } from '@inertiajs/vue3';

defineProps<{
  categories: ProductCategory[];
}>();

const getCurrentSelectedCategory = () => {
  const params = new URLSearchParams(window.location.search);

  return params.get('category');
};

const handleCategory = (category: ProductCategory) => {
  const params = new URLSearchParams(window.location.search);

  if (category.slug === getCurrentSelectedCategory()) {
    params.delete('category');
  } else {
    params.set('category', category.slug);
  }

  if (params.get('page')) {
    params.set('page', '1');
  }

  router.visit(window.location.pathname + '?' + params.toString());
};
</script>

<template>
  <div class="flex flex-wrap justify-center lg:gap-4 gap-2">
    <template v-for="category in categories">
      <button
        class="px-5 py-2 border rounded-full shadow-[0_2px_12px_#00000010] transition-all active:scale-95 lg:text-base md:text-sm text-xs font-semibold"
        :class="{
          'bg-black text-white hover:bg-zinc-600 hover:text-white': category.slug === getCurrentSelectedCategory(),
          'bg-white-0 text-black hover:bg-zinc-100 hover:text-black': category.slug !== getCurrentSelectedCategory(),
        }"
        @click="handleCategory(category)"
      >
        {{ category.name }}
      </button>
    </template>
  </div>
</template>
