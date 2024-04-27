<script setup lang="ts">
import { OutfitOfTheDay, Product } from '@/Interfaces';
import ModalContainer from '@/Components/ModalContainer.vue';
import BaseForm from '@/Components/StyleGuide/Form/BaseForm.vue';
import { Button } from '@/Components/ui/button';
import { PlusIcon } from 'lucide-vue-next';

defineProps<{
  products: Product[];
  outfitsOfTheDay: OutfitOfTheDay[];
}>();
</script>

<template>
  <ModalContainer modal-title="Dodaj Style Guide">
    <template #trigger>
      <Button variant="outline">
        <PlusIcon class="h-4 mr-1" />
        Dodaj Style Guide
      </Button>
    </template>

    <template v-slot="{ handleClose }">
      <BaseForm @success="handleClose" :products="products" :outfitsOfTheDay="outfitsOfTheDay" />
    </template>
  </ModalContainer>
</template>
