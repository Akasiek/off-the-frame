<script setup lang="ts">
import ModalContainer from '@/Components/ModalContainer.vue';
import BaseForm from '@/Components/ProductCategory/Form/BaseForm.vue';
import { Button } from '@/Components/ui/button';
import { PlusIcon } from 'lucide-vue-next';
</script>

<template>
  <ModalContainer modal-title="Dodaj kategorie produktu">
    <template #trigger>
      <Button variant="outline">
        <PlusIcon class="h-4 mr-1" />
        Dodaj kategorie
      </Button>
    </template>

    <template v-slot="{ handleClose }">
      <BaseForm @success="handleClose" />
    </template>
  </ModalContainer>
</template>
