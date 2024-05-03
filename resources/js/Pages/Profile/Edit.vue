<script setup lang="ts">
import DashboardLayout from '@/Layouts/DashboardLayout.vue';
import UpdatePasswordForm from './Partials/UpdatePasswordForm.vue';
import UpdateProfileInformationForm from './Partials/UpdateProfileInformationForm.vue';
import { Head } from '@inertiajs/vue3';

defineProps<{
  mustVerifyEmail?: boolean;
  status?: string;
}>();
</script>

<template>
  <Head title="Profil" />

  <DashboardLayout title="Ustawienia profilu" header-title="Ustawienia profilu" header-subtext="Tutaj możesz zarządzać swoim kontem.">
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white dark:bg-zinc-900 shadow sm:rounded-lg">
          <UpdateProfileInformationForm :must-verify-email="mustVerifyEmail" :status="status" class="max-w-xl" />
        </div>

        <div class="p-4 sm:p-8 bg-white dark:bg-zinc-900 shadow sm:rounded-lg">
          <UpdatePasswordForm class="max-w-xl" />
        </div>
      </div>
    </div>
  </DashboardLayout>
</template>
