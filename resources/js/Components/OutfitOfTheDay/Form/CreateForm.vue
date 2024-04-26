<script setup lang="ts">
import { Product } from '@/Interfaces';
import ModalContainer from '@/Components/ModalContainer.vue';
import BaseForm from '@/Components/OutfitOfTheDay/Form/BaseForm.vue';
import { Button } from '@/Components/ui/button';
import { PlusIcon } from 'lucide-vue-next';

defineProps<{
  products: Product[];
}>();
</script>

<template>
  <ModalContainer modal-title="Dodaj Outfit of the Day">
    <template #trigger>
      <Button variant="outline">
        <PlusIcon class="h-4 mr-1" />
        Dodaj Outfit of the Day
      </Button>
    </template>

    <template v-slot="{ handleClose }">
      <BaseForm @success="handleClose" :products="products" />
    </template>
  </ModalContainer>
</template>
