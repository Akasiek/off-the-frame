<script setup lang="ts">
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import { useForm, usePage } from '@inertiajs/vue3';
import { Button } from '@/Components/ui/button';

defineProps<{
  mustVerifyEmail?: Boolean;
  status?: String;
}>();

const user = usePage().props.auth.user;

const form = useForm({
  name: user.name,
  email: user.email,
});
</script>

<template>
  <section>
    <header>
      <h2 class="text-lg font-medium text-zinc-900 dark:text-zinc-100">Profile Information</h2>

      <p class="mt-1 text-sm text-zinc-600 dark:text-zinc-400">Update your account's profile information and email address.</p>
    </header>

    <form @submit.prevent="form.patch(route('profile.update'))" class="mt-6 space-y-6">
      <div>
        <InputLabel for="name" value="Name" />

        <TextInput id="name" type="text" class="mt-1 block w-full" v-model="form.name" required autofocus autocomplete="name" />

        <InputError class="mt-2" :message="form.errors.name" />
      </div>

      <div>
        <InputLabel for="email" value="Email" />

        <TextInput id="email" type="email" class="mt-1 block w-full" v-model="form.email" required autocomplete="username" />

        <InputError class="mt-2" :message="form.errors.email" />
      </div>

      <div class="flex items-center gap-4">
        <Button type="submit" :disabled="form.processing">Save</Button>

        <Transition
          enter-active-class="transition ease-in-out"
          enter-from-class="opacity-0"
          leave-active-class="transition ease-in-out"
          leave-to-class="opacity-0"
        >
          <p v-if="form.recentlySuccessful" class="text-sm text-zinc-600 dark:text-zinc-400">Saved.</p>
        </Transition>
      </div>
    </form>
  </section>
</template>
