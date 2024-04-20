<script setup lang="ts">
import {
  AlertDialog,
  AlertDialogAction,
  AlertDialogCancel,
  AlertDialogContent,
  AlertDialogDescription,
  AlertDialogFooter,
  AlertDialogHeader,
  AlertDialogTitle,
  AlertDialogTrigger,
} from "@/Components/ui/alert-dialog";
import { Trash2Icon } from "lucide-vue-next";

defineProps<{
  className?: string;
  handleDelete: () => void;
}>();
</script>

<template>
  <AlertDialog>
    <AlertDialogTrigger
      ><Trash2Icon
        :class="
          'h-5 text-zinc-600 hover:text-zinc-800 dark:hover:text-zinc-400 transition' ||
          className
        "
    /></AlertDialogTrigger>
    <AlertDialogContent>
      <AlertDialogHeader>
        <AlertDialogTitle>Czy jesteś absolutnie pewien?</AlertDialogTitle>
        <AlertDialogDescription>
          Działania tego nie można cofnąć. Spowoduje to trwałe usunięcie danych.
        </AlertDialogDescription>
      </AlertDialogHeader>
      <AlertDialogFooter>
        <AlertDialogCancel>Anuluj</AlertDialogCancel>
        <AlertDialogAction
          @click="handleDelete"
          class="bg-red-500 hover:bg-red-600"
        >
          Kontynuuj
        </AlertDialogAction>
      </AlertDialogFooter>
    </AlertDialogContent>
  </AlertDialog>
</template>
