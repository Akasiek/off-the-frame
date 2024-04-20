<script setup lang="ts">
import { Product, ProductCategory } from '@/Interfaces';
import { toast } from '@/Components/ui/toast';
import { useForm } from '@inertiajs/vue3';
import { TextField } from '@/Components/Form';
import { Select } from '@/Components/Form';
import { Button } from '@/Components/ui/button';
import { Input } from '@/Components/ui/input';
import { Label } from '@/Components/ui/label';
import { MinusIcon } from 'lucide-vue-next';
import LinkInputs from '@/Components/Product/Form/LinkInputs.vue';

const { product } = defineProps<{
  product?: Product;
  categories: ProductCategory[];
}>();

const form = useForm({
  brand: product?.brand || '',
  model: product?.model || '',
  product_category_id: product?.product_category_id?.toString() || '',
  links: product?.links || [{ url: '', price: '', store: '' }],
  images: product?.images || [{ url: '' }],
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

  form.post(route('products.create'), {
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

const addFileField = () => {
  form.images.push({ url: '' });
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

    <LinkInputs :links="form.links" />

    <div class="space-y-4">
      <Label> Zdjęcia </Label>
      <div v-for="(file, index) in form.images" :key="index" class="grid grid-cols-[1fr_auto] gap-3">
        <Input type="file" @input="form.images[index].url = $event.target.files[0]" />
        <Button type="button" @click="form.images.splice(index, 1)" variant="outline">
          <MinusIcon class="w-4 h-4" />
        </Button>
      </div>

      <Button type="button" @click="addFileField" variant="outline">Dodaj zdjęcie</Button>
    </div>

    <Button type="submit">Dodaj</Button>
  </form>
</template>

<style scoped></style>
