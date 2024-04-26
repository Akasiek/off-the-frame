<script setup lang="ts">
import DeleteModal from '@/Components/DeleteModal.vue';
import { router } from '@inertiajs/vue3';
import { toast } from '@/Components/ui/toast';

defineProps<{
  modelId: number;
}>();

const handleDelete = (id: number) => {
  router.delete(route('outfits-of-the-day.delete', id), {
    onSuccess: () => {
      toast({
        title: 'Outfit of the Day został pomyślnie usunięty',
      });
    },
  });
};
</script>

<template>
  <DeleteModal :handle-delete="() => handleDelete(modelId)" />
</template>
