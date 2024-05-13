<script setup lang="ts">
import { computed, type HTMLAttributes } from 'vue';
import { PaginationLast, type PaginationLastProps } from 'radix-vue';
import { ChevronsRight } from 'lucide-vue-next';
import { Button } from '@/Components/ui/button';
import { cn } from '@/lib/utils';

const props = withDefaults(defineProps<PaginationLastProps & { class?: HTMLAttributes['class'] }>(), {
  asChild: true,
});

const delegatedProps = computed(() => {
  const { class: _, ...delegated } = props;

  return delegated;
});
</script>

<template>
  <PaginationLast v-bind="delegatedProps">
    <Button :class="cn('lg:w-10 md:w-8 w-6 lg:h-10 md:h-8 h-6 p-0 rounded-full', props.class)" variant="outline">
      <slot>
        <ChevronsRight class="lg:w-4 md:w-3.5 w-3" />
      </slot>
    </Button>
  </PaginationLast>
</template>
