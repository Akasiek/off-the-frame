<script setup lang="ts">
import { Product, ProductCategory } from '@/Interfaces';
import { toast } from '@/Components/ui/toast';
import { useForm } from '@inertiajs/vue3';
import { TextField } from '@/Components/Form';
import { Select } from '@/Components/Form';
import { Button } from '@/Components/ui/button';

const { product } = defineProps<{
  product?: Product;
  categories: ProductCategory[];
}>();

const form = useForm({
  brand: product?.brand || '',
  model: product?.model || '',
  product_category_id: product?.product_category_id?.toString() || '',
  links: product?.links || [{ url: '', price: '', store: '' }],
});

const emit = defineEmits(['success']);

const submit = () => {
  if (product) {
    form.patch(route('products.update', product.id), {
      onSuccess: () => {
        handleSuccess();
      },
      onError: () => {
        handleError();
      },
    });
    return;
  }

  form.post(route('products.store'), {
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
    title: isEdit ? 'Produkt zaktualizowany' : 'Produkt dodany pomyślnie',
    description: isEdit
      ? `Produkt ${form.brand} ${form.model} został zaktualizowany.`
      : `Produkt ${form.brand} ${form.model} został dodany.`,
  });
  emit('success');
};

const handleError = () => {
  toast({
    title: 'Błąd',
    description: 'Wystąpił błąd podczas dodawania produktu.',
    variant: 'destructive',
  });
};
</script>

<template>
  <form class="space-y-6" @submit.prevent="submit">
    <TextField v-model="form.brand" field-name="brand" label="Marka" :field-error="form.errors.brand" placeholder="Nike..." />

    <TextField v-model="form.model" field-name="model" label="Model" :field-error="form.errors.model" placeholder="Air Max..." />

    <Select
      v-model="form.product_category_id"
      field-name="product_category_id"
      :field-error="form.errors.product_category_id"
      :options="
        categories.map((obj) => ({
          id: obj.id,
          text: obj.name,
        }))
      "
      label="Kategoria produktu"
      is-required
      placeholder="Wybierz kategorię..."
    />

    <Button type="submit">Dodaj</Button>
  </form>
</template>

<style scoped></style>
