<script setup lang="ts">
import Nav from '@/Components/Nav.vue';
import Footer from '@/Components/Footer.vue';
import WrapperLayout from '@/Layouts/WrapperLayout.vue';

defineProps<{
  title: string;
  description?: string;
}>();
</script>

<template>
  <WrapperLayout :title="title" :description="description">
    <div>
      <Nav />

      <div class="min-h-screen">
        <slot />
      </div>

      <Footer />
    </div>
  </WrapperLayout>
</template>
