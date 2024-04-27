<script setup lang="ts">
import { OutfitOfTheDay } from '@/Interfaces';
import { Multiselect } from '@/Components/Form';

defineProps<{
  outfitsOptions: OutfitOfTheDay[];
  form: any;
}>();
</script>

<template>
  <Multiselect
    v-model="form.outfitsOfTheDay"
    field-name="outfitsOfTheDay"
    :field-error="form.errors.outfitsOfTheDay"
    label="Outfit of the Day"
    placeholder="Wybierz Outfit of the Day"
    :isRequired="true"
    :options="outfitsOptions.map(({ id, name }) => ({ value: id.toString(), label: name }))"
  />
</template>
