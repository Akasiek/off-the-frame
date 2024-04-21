<script setup lang="ts">
import { MinusIcon } from 'lucide-vue-next';
import { TextField } from '@/Components/Form';
import { Button } from '@/Components/ui/button';
import { Label } from '@/Components/ui/label';
import { Separator } from '@/Components/ui/separator';

defineProps<{
  links: { url: string; price: string; store: string }[];
}>();
</script>

<template>
  <div class="py-2 space-y-5">
    <Label>Linki</Label>

    <div v-for="(link, index) in links" :key="index">
      <div class="grid grid-cols-[1fr_1fr_auto] gap-4">
        <div class="col-span-3">
          <TextField v-model="link.url" placeholder="https://example.com" :isRequired="true" :field-name="`links[${index}][url]`" />
        </div>
        <TextField v-model="link.price" placeholder="1000$" :isRequired="true" :field-name="`links[${index}][price]`" />
        <TextField v-model="link.store" placeholder="Media Expert" :isRequired="true" :field-name="`links[${index}][store]`" />
        <Button type="button" @click="links.splice(index, 1)" variant="outline" class="flex items-center justify-center">
          <MinusIcon class="w-4 h-4" />
        </Button>
      </div>

      <Separator v-if="index !== links.length - 1" class="my-4" />
    </div>

    <Button type="button" @click="links.push({ url: '', price: '', store: '' })" variant="outline"> Dodaj link </Button>
  </div>
</template>

<style scoped></style>
