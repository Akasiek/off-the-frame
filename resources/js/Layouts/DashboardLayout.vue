<script setup lang="ts">
import SidebarNav from '@/Components/DashboardNav.vue';
import { Separator } from '@/Components/ui/separator';

defineProps<{
  headerTitle: string;
  headerSubtext?: string;
}>();
</script>

<template>
  <div class="space-y-6 p-4 md:p-10 pb-16">
    <div class="space-y-0.5">
      <h2 class="text-2xl font-bold tracking-tight">Dashboard</h2>
      <p class="text-muted-foreground">Panel administracyjny zawierający wszystkie funkcje i ustawienia.</p>
    </div>
    <Separator class="my-6" />
    <div class="flex flex-col space-y-8 lg:flex-row lg:space-x-12 lg:space-y-0">
      <aside class="-mx-4 lg:w-1/5">
        <SidebarNav />
      </aside>
      <div class="flex-1">
        <div class="space-y-6">
          <div>
            <h3 class="text-lg font-medium">
              {{ headerTitle }}
            </h3>
            <p class="text-sm text-muted-foreground" v-if="headerSubtext">
              {{ headerSubtext }}
            </p>
          </div>

          <Separator />

          <slot />
        </div>
      </div>
    </div>
  </div>
</template>
