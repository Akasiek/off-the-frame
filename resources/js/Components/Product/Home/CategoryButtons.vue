<script setup lang="ts">
import { ProductCategory } from '@/Interfaces';
import { router } from '@inertiajs/vue3';

const { categories } = defineProps<{
  categories: ProductCategory[];
}>();

const getCurrentSelectedCategory = () => {
  const params = new URLSearchParams(window.location.search);

  return params.get('category');
};

const getSubCategories = () => {
  const params = new URLSearchParams(window.location.search);
  const category = params.get('category');

  if (!category) {
    return [];
  }

  const selectedCategory = categories.find((c) => c.slug === category);
  if (!selectedCategory) {
    return [];
  }

  // If the selected category is a parent (has no parent_id), return its children
  if (!selectedCategory.parent_id) {
    return categories.filter((c) => c.parent_id === selectedCategory.id);
  }

  // If the selected category is a child, return its siblings
  return categories.filter((c) => c.parent_id === selectedCategory.parent_id);
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

const parentCategories = categories.filter((c) => !c.parent_id);
const subCategories = getSubCategories();
</script>

<template>
  <div class="flex flex-wrap justify-center lg:gap-4 gap-2">
    <template v-for="category in parentCategories">
      <button
        class="lg:px-5 md:px-4 px-3.5 lg:py-2 md:py-1.5 py-1 border rounded-full shadow-[0_2px_12px_#00000010] transition-all active:scale-95 lg:text-base md:text-sm text-xs font-semibold"
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

  <div class="flex flex-wrap justify-center mt-10 lg:gap-x-8 lg:gap-y-4 gap-x-4 gap-y-2">
    <template v-for="category in subCategories">
      <button
        class="font-serif transition-all active:scale-95 lg:text-xl md:text-lg sm:text-base xs:text-sm font-semibold text-black"
        :class="{
          underline: category.slug === getCurrentSelectedCategory(),
          // '': category.slug !== getCurrentSelectedCategory(),
        }"
        @click="handleCategory(category)"
      >
        {{ category.name }}
      </button>
    </template>
  </div>
</template>
