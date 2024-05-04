<script setup lang="ts">
import { OutfitOfTheDay, Product, StyleGuide } from '@/Interfaces';
import { toast } from '@/Components/ui/toast';
import { useForm } from '@inertiajs/vue3';
import { TextArea, TextField } from '@/Components/Form';
import { Button } from '@/Components/ui/button';
import { Input } from '@/Components/ui/input';
import { Label } from '@/Components/ui/label';
import InputError from '@/Components/InputError.vue';
import ProductMultiselect from '@/Components/ProductMultiselect.vue';
import OutfitOfTheDayMultiselect from '@/Components/StyleGuide/Form/OutfitOfTheDayMultiselect.vue';

const { styleGuide, isEdit } = defineProps<{
  products: Product[];
  outfitsOfTheDay: OutfitOfTheDay[];
  styleGuide?: StyleGuide;
  isEdit?: boolean;
}>();

const form = useForm({
  name: styleGuide?.name || '',
  description: styleGuide?.description || '',
  image: null,
  products: styleGuide?.products.map(({ id }) => id.toString()) || [],
  outfitsOfTheDay: styleGuide?.outfitsOfTheDay.map(({ id }) => id.toString()) || [],
});

const emit = defineEmits(['success']);

const submit = () => {
  if (styleGuide) {
    form.post(route('style-guides.update', styleGuide.id), {
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

  form.post(route('style-guides.create'), {
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
    title: isEdit ? 'Style Guide zaktualizowany' : 'Style Guide dodany pomyślnie',
    description: isEdit ? `Style Guide ${form.name} został zaktualizowany.` : `Style Guide ${form.name} został dodany.`,
  });
  emit('success');
};

const handleError = () => {
  toast({
    title: 'Błąd',
    description: 'Wystąpił błąd podczas dodawania Style Guide.',
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
      placeholder="Style Guide..."
      is-required
    />

    <TextArea
      v-model="form.description"
      field-name="description"
      label="Opis"
      :field-error="form.errors.description"
      placeholder="Opis..."
      is-required
    />

    <div class="space-y-2">
      <Label> Zdjęcie </Label>

      <p v-if="isEdit" class="text-xs text-red-400 font-medium">Przy edycji, gdy dodasz nowe zdjęcie, stare zostanie usunięte.</p>

      <Input type="file" @input="form.image = $event.target.files[0]" name="image" />

      <InputError :message="form.errors.image" />
    </div>

    <ProductMultiselect :form="form" :product-options="products" />

    <OutfitOfTheDayMultiselect :form="form" :outfits-options="outfitsOfTheDay" />

    <Button type="submit">{{ isEdit ? 'Zaktualizuj' : 'Dodaj' }}</Button>
  </form>
</template>

<style scoped></style>
