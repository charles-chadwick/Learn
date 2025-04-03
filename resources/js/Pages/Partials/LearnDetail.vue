<script setup>

import { ArrowRightCircleIcon } from "@heroicons/vue/20/solid/index.js";

defineProps({
  title : String,
  description : String,
  goToHref : String
})

</script>

<template>

  <div class="flex w-full items-center justify-between space-x-6 p-6">
    <div class="flex-1 truncate">
      <div class="flex items-center space-x-3">
        <h3 class="truncate text-sm font-medium text-stone-900">
          <slot name="header"></slot>
        </h3>
      </div>
      <p class="mt-1 truncate text-sm text-stone-500">{{ description }}</p>
    </div>
  </div>

  <div>
    <div class="-mt-px flex divide-x divide-stone-200">
      <div class="flex w-0 flex-1">
        <slot name="button"></slot>
      </div>
    </div>
  </div>
  
</template>