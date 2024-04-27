<script setup lang="ts">
import DeleteModal from '@/Components/DeleteModal.vue';
import { router } from '@inertiajs/vue3';
import { toast } from '@/Components/ui/toast';

defineProps<{
  modelId: number;
}>();

const handleDelete = (id: number) => {
  router.delete(route('style-guides.delete', id), {
    onSuccess: () => {
      toast({
        title: 'Style Guide został pomyślnie usunięty',
      });
    },
  });
};
</script>

<template>
  <DeleteModal :handle-delete="() => handleDelete(modelId)" />
</template>
