<script setup lang="ts">
import { computed, type HTMLAttributes } from 'vue';
import { PaginationEllipsis, type PaginationEllipsisProps } from 'radix-vue';
import { MoreHorizontal } from 'lucide-vue-next';
import { cn } from '@/lib/utils';

const props = defineProps<PaginationEllipsisProps & { class?: HTMLAttributes['class'] }>();

const delegatedProps = computed(() => {
  const { class: _, ...delegated } = props;

  return delegated;
});
</script>

<template>
  <PaginationEllipsis
    v-bind="delegatedProps"
    :class="cn('lg:w-9 md:w-6 w-4 lg:h-9 md:h-6 h-4 flex items-center justify-center', props.class)"
  >
    <slot>
      <MoreHorizontal />
    </slot>
  </PaginationEllipsis>
</template>
