<script setup lang="ts">
import DeleteModal from '@/Components/DeleteModal.vue';
import { router } from '@inertiajs/vue3';
import { toast } from '@/Components/ui/toast';

defineProps<{
  productId: number;
}>();

const handleDelete = (id: number) => {
  router.delete(route('products.delete', id), {
    onSuccess: () => {
      toast({
        title: 'Product został pomyślnie usunięty',
      });
    },
  });
};
</script>

<template>
  <DeleteModal :handle-delete="() => handleDelete(productId)" />
</template>
