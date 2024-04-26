<script setup lang="ts">
import { Product } from '@/Interfaces';
import { Multiselect } from '@/Components/Form';

defineProps<{
  productOptions: Product[];
  form: any;
}>();
</script>

<template>
  <Multiselect
    v-model="form.products"
    field-name="products"
    :field-error="form.errors.products"
    label="Produkty"
    placeholder="Wybierz produkty"
    :isRequired="true"
    :options="productOptions.map(({ id, brand, model }) => ({ value: id.toString(), label: `${brand} - ${model}` }))"
  />
</template>
