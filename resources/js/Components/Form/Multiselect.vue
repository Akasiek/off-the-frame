<script setup lang="ts">
import Multiselect from '@vueform/multiselect';
import { FormField, FormItem, FormLabel } from '@/Components/ui/form';
import InputError from '@/Components/InputError.vue';

defineProps<{
  modelValue: string;
  fieldName: string;
  fieldError: string | undefined;
  label: string;
  placeholder?: string;
  isRequired?: boolean;
  options: {
    value: string;
    label: string;
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

      <Multiselect
        v-bind="componentField"
        :options="options"
        :placeholder="placeholder"
        mode="tags"
        :close-on-select="false"
        :searchable="true"
        :model-value="modelValue"
        @update:model-value="$emit('update:modelValue', $event)"
        :classes="{
          container:
            'relative mx-auto w-full flex items-center justify-end box-border cursor-pointer border border-gray-300 dark:border-zinc-800 rounded-lg bg-white dark:bg-zinc-950 text-base leading-snug outline-none py-1.5 px-1',
          containerOpen: 'rounded-b-none',
          containerOpenTop: 'rounded-t-none',
          wrapper: 'relative mx-auto w-full flex items-center justify-end box-border cursor-pointer outline-none dark:bg-zinc-950',

          tagsSearch:
            'absolute inset-0 border-0 outline-none focus:ring-0 appearance-none p-0 text-sm font-sans box-border w-full dark:bg-zinc-950 dark:text-white',
          tagsSearchCopy: 'invisible whitespace-pre-wrap inline-block h-px',
          placeholder:
            'flex items-center h-full absolute left-0 top-0 text-sm pointer-events-none bg-transparent leading-snug pl-3.5 text-zinc-400 rtl:left-auto rtl:right-0 rtl:pl-0 rtl:pr-3.5',

          multipleLabel:
            'flex items-center h-full absolute left-0 top-0 pointer-events-none bg-transparent leading-snug pl-3.5 rtl:left-auto rtl:right-0 rtl:pl-0 rtl:pr-3.5',

          tags: 'flex-grow flex-shrink flex flex-wrap items-center mt-1 pl-2 min-w-0 rtl:pl-0 rtl:pr-2 dark:bg-zinc-950',
          tag: 'bg-green-500 dark:bg-zinc-800 text-white text-sm font-medium py-0.5 pl-2 rounded-lg mr-1 mb-1 flex items-center whitespace-nowrap min-w-0 rtl:pl-0 rtl:pr-2 rtl:mr-0 rtl:ml-1',

          options: 'flex flex-col p-0 m-0 list-none dark:bg-zinc-950 rounded-lg',
          option: 'flex items-center justify-start box-border text-left cursor-pointer text-sm leading-snug py-2 px-3',
          optionPointed: 'text-gray-800 bg-gray-100 dark:text-white dark:bg-zinc-800 rounded-lg',

          dropdown:
            'max-h-60 absolute -left-px -right-px bottom-0 transform translate-y-full border border-gray-300 -mt-px overflow-y-auto z-50 bg-white flex flex-col rounded-b-lg overflow-hidden p-2 dark:bg-zinc-950 dark:border-zinc-800',
          dropdownTop: '-translate-y-full top-px bottom-auto rounded-b-none rounded-t',
          dropdownHidden: 'hidden',

          noOptions: 'py-2 px-3 text-gray-600 bg-white text-left rtl:text-right dark:bg-zinc-950 dark:text-zinc-400',
          noResults: 'py-2 px-3 text-gray-600 bg-white text-left rtl:text-right dark:bg-zinc-950 dark:text-zinc-400',
        }"
      />

      <InputError :message="fieldError" />
    </FormItem>
  </FormField>
</template>

<style src="@vueform/multiselect/themes/default.css" />
