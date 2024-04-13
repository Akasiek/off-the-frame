<script setup lang="ts">
import { ProductCategory } from '@/Interfaces';
import ModalContainer from '@/Components/ModalContainer.vue';
import BaseForm from '@/Components/Product/Form/BaseForm.vue';
import { Button } from '@/Components/ui/button';

defineProps<{
  categories: ProductCategory[];
}>();
</script>

<template>
  <ModalContainer modal-title="Dodaj produkt">
    <template #trigger>
      <Button variant="outline">
        <PlusIcon class="h-4 mr-1" />
        Dodaj wykład
      </Button>
    </template>

    <template v-slot="{ handleClose }">
      <BaseForm @success="handleClose" :categories="categories" />
    </template>
  </ModalContainer>
</template>
