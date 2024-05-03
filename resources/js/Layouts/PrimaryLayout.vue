<script setup lang="ts">
import Nav from '@/Components/Nav.vue';
import Footer from '@/Components/Footer.vue';
import WrapperLayout from '@/Layouts/WrapperLayout.vue';

defineProps<{
  title: string;
}>();
</script>

<template>
  <WrapperLayout :title="title">
    <Nav />

    <main class="text-black">
      <slot />
    </main>

    <Footer />
  </WrapperLayout>
</template>
