<script setup lang="ts">
import Nav from '@/Components/Nav.vue';
import Footer from '@/Components/Footer.vue';

import '@/Style/base.css';
</script>

<template>
  <Nav />

  <main class="min-h-svh">
    <slot />
  </main>

  <Footer />
</template>
