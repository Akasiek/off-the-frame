<script setup lang="ts">
import InputError from '@/Components/InputError.vue';
import { FormControl, FormField, FormItem, FormLabel } from '@/Components/ui/form';
import { Input } from '@/Components/ui/input';

defineProps<{
  modelValue: number;
  fieldName: string;
  fieldError?: string | undefined;
  label?: string;
  placeholder?: string;
  isRequired?: boolean;
  min?: number;
  max?: number;
}>();
</script>

<template>
  <FormField :name="fieldName" v-slot="{ componentField }">
    <FormItem>
      <FormLabel :class="{ 'is-required': isRequired }" class="dark:text-white" v-if="label">
        {{ label }}
      </FormLabel>
      <FormControl>
        <Input
          type="number"
          :placeholder="placeholder || null"
          v-bind="componentField"
          :model-value="modelValue"
          :min="min"
          :max="max"
          @update:model-value="$emit('update:modelValue', $event)"
        />
      </FormControl>
      <InputError :message="fieldError" />
    </FormItem>
  </FormField>
</template>
