<script setup lang="ts">
import { PencilIcon } from 'lucide-vue-next';
import { OutfitOfTheDay, Product, StyleGuide } from '@/Interfaces';
import BaseForm from '@/Components/StyleGuide/Form/BaseForm.vue';
import ModalContainer from '@/Components/ModalContainer.vue';

defineProps<{
  styleGuide: StyleGuide;
  outfitsOfTheDay: OutfitOfTheDay[];
  products: Product[];
}>();
</script>

<template>
  <ModalContainer modal-title="Zaktualizuj Style Guide">
    <template #trigger>
      <PencilIcon class="h-5 text-zinc-600 hover:text-zinc-800 dark:hover:text-zinc-400 transition" />
    </template>

    <template v-slot="{ handleClose }">
      <BaseForm
        :products="products"
        :outfits-of-the-day="outfitsOfTheDay"
        :style-guide="styleGuide"
        @success="handleClose"
        :is-edit="true"
      />
    </template>
  </ModalContainer>
</template>

<style scoped></style>
