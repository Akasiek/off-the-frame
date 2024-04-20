<script setup lang="ts">
import InputError from '@/Components/InputError.vue';
import { FormControl, FormField, FormItem, FormLabel } from '@/Components/ui/form';
import { Input } from '@/Components/ui/input';

defineProps<{
  modelValue: string;
  fieldName: string;
  fieldError?: string | undefined;
  label?: string;
  placeholder?: string;
  isRequired?: boolean;
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
          type="text"
          :placeholder="placeholder || null"
          v-bind="componentField"
          :model-value="modelValue"
          @update:model-value="$emit('update:modelValue', $event)"
        />
      </FormControl>
      <InputError :message="fieldError" />
    </FormItem>
  </FormField>
</template>
