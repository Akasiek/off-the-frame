<script setup lang="ts">
import Nav from '@/Components/Nav.vue';
import Footer from '@/Components/Footer.vue';
import WrapperLayout from '@/Layouts/WrapperLayout.vue';
</script>

<template>
  <WrapperLayout>
    <Nav />

    <main class="min-h-svh">
      <slot />
    </main>

    <Footer />
  </WrapperLayout>
</template>
