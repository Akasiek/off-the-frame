<script setup lang="ts">
import { ProductCategory } from '@/Interfaces';
import { toast } from '@/Components/ui/toast';
import { useForm } from '@inertiajs/vue3';
import { TextField } from '@/Components/Form';
import { Button } from '@/Components/ui/button';
import NumberField from '@/Components/Form/NumberField.vue';

const emit = defineEmits(['success']);
const { category, isEdit } = defineProps<{
  category?: ProductCategory;
  isEdit?: boolean;
}>();

const form = useForm({
  name: category?.name ?? '',
  order_position: category?.order_position ?? 0,
});

const submit = () => {
  if (category) {
    form.put(route('product-categories.update', category.id), {
      onSuccess: () => {
        handleSuccess();
      },
      onError: () => {
        handleError();
      },
    });
    return;
  }

  form.post(route('product-categories.create'), {
    onSuccess: () => {
      handleSuccess();
    },
    onError: () => {
      handleError();
    },
  });
};

const handleSuccess = (isEdit = false) => {
  toast({
    title: isEdit ? 'Kategoria produktu zaktualizowana' : 'Kategoria produktu dodana pomyślnie',
    description: isEdit ? `Kategoria produktu ${form.name} została zaktualizowana.` : `Kategoria produktu ${form.name} została dodana.`,
  });
  emit('success');
};

const handleError = () => {
  toast({
    title: 'Błąd',
    description: 'Wystąpił błąd podczas dodawania kategorii produktu.',
    variant: 'destructive',
  });
};
</script>

<template>
  <form class="space-y-6" @submit.prevent="submit">
    <TextField v-model="form.name" field-name="name" label="Nazwa" :field-error="form.errors.name" placeholder="T-shirts..." autofocus />

    <NumberField
      v-model="form.order_position"
      field-name="order_position"
      label="Pozycja"
      :field-error="form.errors.order_position"
      placeholder="1..."
      type="number"
      :min="0"
    />

    <Button type="submit">{{ isEdit ? 'Zaktualizuj' : 'Dodaj' }}</Button>
  </form>
</template>
