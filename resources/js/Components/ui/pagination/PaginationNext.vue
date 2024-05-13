<script setup lang="ts">
import { computed, type HTMLAttributes } from 'vue';
import { PaginationNext, type PaginationNextProps } from 'radix-vue';
import { ChevronRight } from 'lucide-vue-next';
import { Button } from '@/Components/ui/button';
import { cn } from '@/lib/utils';

const props = withDefaults(defineProps<PaginationNextProps & { class?: HTMLAttributes['class'] }>(), {
  asChild: true,
});

const delegatedProps = computed(() => {
  const { class: _, ...delegated } = props;

  return delegated;
});
</script>

<template>
  <PaginationNext v-bind="delegatedProps">
    <Button :class="cn('lg:w-10 md:w-8 w-6 lg:h-10 md:h-8 h-6 p-0 rounded-full', props.class)" variant="outline">
      <slot>
        <ChevronRight class="lg:w-4 md:w-3.5 w-3" />
      </slot>
    </Button>
  </PaginationNext>
</template>
