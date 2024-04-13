<script setup lang="ts">
import { Select, SelectContent, SelectGroup, SelectItem, SelectTrigger, SelectValue } from '@/Components/ui/select';
import InputError from '@/Components/InputError.vue';
import { FormControl, FormField, FormItem, FormLabel } from '@/Components/ui/form';

defineProps<{
  modelValue: string;
  fieldName: string;
  fieldError: string | undefined;
  label: string;
  placeholder?: string;
  isRequired?: boolean;
  options: {
    id: number;
    text: string;
  }[];
}>();
</script>

<template>
  <FormField
    v-slot="{ componentField }"
    :name="fieldName"
    :model-value="modelValue"
    @update:model-value="$emit('update:modelValue', $event)"
  >
    <FormItem>
      <FormLabel :class="{ 'is-required': isRequired }">
        {{ label }}
      </FormLabel>

      <Select v-bind="componentField">
        <FormControl>
          <SelectTrigger>
            <SelectValue :placeholder="placeholder" />
          </SelectTrigger>
        </FormControl>

        <SelectContent>
          <SelectGroup>
            <template v-for="option in options" :key="option.id">
              <SelectItem :value="option.id.toString()">
                {{ option.text }}
              </SelectItem>
            </template>
          </SelectGroup>
        </SelectContent>
      </Select>
      <InputError :message="fieldError" />
    </FormItem>
  </FormField>
</template>
