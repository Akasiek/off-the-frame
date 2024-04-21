<script setup lang="ts">
import DeleteModal from '@/Components/DeleteModal.vue';
import { router } from '@inertiajs/vue3';
import { toast } from '@/Components/ui/toast';

const { routeName, toastMessage } = defineProps<{
  id: number;
  toastMessage: string;
  routeName: string;
}>();

const handleDelete = (id: number) => {
  router.delete(route(routeName, id), {
    onSuccess: () => {
      toast({
        title: toastMessage,
      });
    },
    onError: (error) => {
      toast({
        title: 'Wystąpił błąd podczas usuwania.',
        variant: 'destructive',
        description: error.message || 'Spróbuj ponownie później.',
      });
    },
  });
};
</script>

<template>
  <DeleteModal :handle-delete="() => handleDelete(id)" />
</template>
