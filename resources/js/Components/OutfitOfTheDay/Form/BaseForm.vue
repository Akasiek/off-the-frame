<script setup lang="ts">
import { OutfitOfTheDay, Product } from '@/Interfaces';
import { toast } from '@/Components/ui/toast';
import { useForm } from '@inertiajs/vue3';
import { TextField } from '@/Components/Form';
import { Button } from '@/Components/ui/button';
import { Input } from '@/Components/ui/input';
import { Label } from '@/Components/ui/label';
import InputError from '@/Components/InputError.vue';
import ProductMultiselect from '@/Components/ProductMultiselect.vue';

const { outfitOfTheDay, isEdit } = defineProps<{
  products: Product[];
  outfitOfTheDay?: OutfitOfTheDay;
  isEdit?: boolean;
}>();

const form = useForm({
  name: outfitOfTheDay?.name || '',
  image_source_url: outfitOfTheDay?.image_source_url || '',
  image: '',
  products: outfitOfTheDay?.products.map(({ id }) => id.toString()) || [],
});

const emit = defineEmits(['success']);

const submit = () => {
  if (outfitOfTheDay) {
    form.post(route('outfits-of-the-day.update', outfitOfTheDay.id), {
      // Inertia multipart limitation
      method: 'put',
      onSuccess: () => {
        handleSuccess();
      },
      onError: () => {
        handleError();
      },
    });
    return;
  }

  form.post(route('outfits-of-the-day.create'), {
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
    title: isEdit ? 'Outfit of the Day zaktualizowany' : 'Outfit of the Day dodany pomyślnie',
    description: isEdit ? `Outfit of the Day ${form.name} został zaktualizowany.` : `Outfit of the Day ${form.name} został dodany.`,
  });
  emit('success');
};

const handleError = () => {
  toast({
    title: 'Błąd',
    description: 'Wystąpił błąd podczas dodawania Outfit of the Day.',
    variant: 'destructive',
  });
};
</script>

<template>
  <form class="space-y-6" @submit.prevent="submit">
    <TextField
      v-model="form.name"
      field-name="name"
      label="Nazwa"
      :field-error="form.errors.name"
      placeholder="Outfit of the Day..."
      is-required
    />

    <TextField
      v-model="form.image_source_url"
      field-name="image_source_url"
      label="Źródło zdjęcia"
      :field-error="form.errors.image_source_url"
      placeholder="Źródło zdjęcia..."
      is-required
    />

    <div class="space-y-2">
      <Label> Zdjęcie </Label>

      <p v-if="isEdit" class="text-xs text-red-400 font-medium">Przy edycji, gdy dodasz nowe zdjęcie, stare zostanie usunięte.</p>

      <Input type="file" @input="form.image = $event.target.files[0]" name="image" />

      <InputError :message="form.errors.image" />
    </div>

    <ProductMultiselect :form="form" :product-options="products" />

    <Button type="submit">{{ isEdit ? 'Zaktualizuj' : 'Dodaj' }}</Button>
  </form>
</template>

<style scoped></style>
