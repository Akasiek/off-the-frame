<script setup lang="ts">
import { PencilIcon } from 'lucide-vue-next';
import { ParentProductCategory, ProductCategory } from '@/Interfaces';
import BaseForm from '@/Components/ProductCategory/Form/BaseForm.vue';
import ModalContainer from '@/Components/ModalContainer.vue';

defineProps<{
  parentCategories: ParentProductCategory[];
  category: ProductCategory;
}>();
</script>

<template>
  <ModalContainer modal-title="Zaktualizuj kategorie">
    <template #trigger>
      <PencilIcon class="h-5 text-zinc-600 hover:text-zinc-800 dark:hover:text-zinc-400 transition" />
    </template>

    <template v-slot="{ handleClose }">
      <BaseForm :category="category" :parentCategories="parentCategories" @success="handleClose" :is-edit="true" />
    </template>
  </ModalContainer>
</template>

<style scoped></style>
