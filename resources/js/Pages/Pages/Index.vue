<script setup>
import { HomeIcon } from '@heroicons/vue/20/solid'

import Layout from "../Layout.vue";

defineProps({
  page: {
    type: Object
  },
  lesson : { type: Object},
  chapter : { type: Object}
})

</script>
<template>

<Layout>

    <nav class="flex border-b border-stone-200 bg-white" aria-label="Breadcrumb">
      <ol role="list" class="mx-auto flex w-full max-w-screen-xl space-x-4 px-4 sm:px-6 lg:px-8">
        <li class="flex">
          <div class="flex items-center">
            <a href="#" class="text-stone-400 hover:text-stone-500">
              <HomeIcon class="size-5 shrink-0" aria-hidden="true" />
              <span class="sr-only">Home</span>
            </a>
          </div>
        </li>
        <li class="flex">
          <div class="flex items-center">
            <svg class="h-full w-6 shrink-0 text-stone-200" viewBox="0 0 24 44" preserveAspectRatio="none" fill="currentColor" aria-hidden="true">
              <path d="M.293 0l22 22-22 22h1.414l22-22-22-22H.293z" />
            </svg>
            <a :href="route('lessons.chapters', {lesson_id:  lesson.id })" class="ml-4 text-sm font-medium text-stone-500 hover:text-stone-700" :aria-current="page.current ? 'page' : undefined">{{ lesson.title }}</a>
          </div>
        </li>        <li class="flex">
          <div class="flex items-center">
            <svg class="h-full w-6 shrink-0 text-stone-200" viewBox="0 0 24 44" preserveAspectRatio="none" fill="currentColor" aria-hidden="true">
              <path d="M.293 0l22 22-22 22h1.414l22-22-22-22H.293z" />
            </svg>
            <a :href="route('lessons.chapter', {lesson_id:  lesson.id, chapter_number: chapter.number })" class="ml-4 text-sm font-medium text-stone-500 hover:text-stone-700" :aria-current="page.current ? 'page' : undefined">{{ chapter.number}}: {{ chapter.title }}</a>
          </div>
        </li>
      </ol>
    </nav>

<h1 class="font-bold">Page {{ page.number }}</h1>
<div v-html="page.content"></div>

</Layout>

</template>