<script setup lang="ts">
import { PencilIcon } from 'lucide-vue-next';
import { Product, ProductCategory } from '@/Interfaces';
import BaseForm from '@/Components/Product/Form/BaseForm.vue';
import ModalContainer from '@/Components/ModalContainer.vue';

defineProps<{
  product: Product;
  categories: ProductCategory[];
}>();
</script>

<template>
  <ModalContainer modal-title="Zaktualizuj produkt">
    <template #trigger>
      <PencilIcon class="h-5 text-zinc-600 hover:text-zinc-800 dark:hover:text-zinc-400 transition" />
    </template>

    <template v-slot="{ handleClose }">
      <BaseForm :product="product" :categories="categories" @success="handleClose" />
    </template>
  </ModalContainer>
</template>

<style scoped></style>
