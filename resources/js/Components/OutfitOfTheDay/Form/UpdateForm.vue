<script setup lang="ts">
import { PencilIcon } from 'lucide-vue-next';
import { OutfitOfTheDay, Product } from '@/Interfaces';
import BaseForm from '@/Components/OutfitOfTheDay/Form/BaseForm.vue';
import ModalContainer from '@/Components/ModalContainer.vue';

defineProps<{
  outfitOfTheDay: OutfitOfTheDay;
  products: Product[];
}>();
</script>

<template>
  <ModalContainer modal-title="Zaktualizuj produkt">
    <template #trigger>
      <PencilIcon class="h-5 text-zinc-600 hover:text-zinc-800 dark:hover:text-zinc-400 transition" />
    </template>

    <template v-slot="{ handleClose }">
      <BaseForm :products="products" :outfit-of-the-day="outfitOfTheDay" @success="handleClose" :is-edit="true" />
    </template>
  </ModalContainer>
</template>

<style scoped></style>
