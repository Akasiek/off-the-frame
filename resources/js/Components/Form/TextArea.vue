<script setup lang="ts">
import {
  FormControl,
  FormField,
  FormItem,
  FormLabel,
} from "@/Components/ui/form";
import { Textarea } from "@/Components/ui/textarea";
import InputError from "@/Components/InputError.vue";

defineProps<{
  modelValue: string;
  fieldName: string;
  fieldError: string | undefined;
  label: string;
  placeholder?: string;
  isRequired?: boolean;
}>();
</script>

<template>
  <FormField v-slot="{ componentField }" :name="fieldName">
    <FormItem>
      <FormLabel :class="{ 'is-required': isRequired }">{{ label }}</FormLabel>
      <FormControl>
        <Textarea
          :placeholder="placeholder || null"
          class="resize-none"
          v-bind="componentField"
          :model-value="modelValue"
          @update:model-value="$emit('update:modelValue', $event)"
        />
      </FormControl>
      <InputError :message="fieldError" />
    </FormItem>
  </FormField>
</template>
