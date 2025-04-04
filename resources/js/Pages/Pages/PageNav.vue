<script setup>    import { ChevronLeftIcon, ChevronRightIcon } from '@heroicons/vue/20/solid'

const props = defineProps({
  page          : Object,
  lesson        : Object,
  chapter       : Object,
  next_page     : Object,
  previous_page : Object
})

</script>

<template>


  <nav class="bg-white px-4 py-2 mt-4 shadow mb-4 text-stone-700">
  <span class="isolate inline-flex rounded-md shadow-sm">
    <a
        v-if="previous_page"
        :href="route('lessons.chapter', {
           lesson_id: lesson.id,
           chapter_id: chapter.id,
           page_number: previous_page.number
         })"
        class="relative inline-flex items-center rounded-l-sm bg-lime-600 px-3 py-2 text-sm font-semibold text-white ring-1 ring-stone-300 hover:bg-lime-400 focus:z-10">
      Previous
    </a>
    <a
        v-if="next_page"
        :href="route('lessons.chapter', {
           lesson_id: lesson.id,
           chapter_id: chapter.id,
           page_number: next_page.number
         })"
        class="relative -ml-px inline-flex items-center rounded-r-sm bg-lime-600 px-3 py-2 text-sm font-semibold text-white ring-1 ring-stone-300 hover:bg-lime-400  focus:z-10">
      Next
    </a>
  </span>
  </nav>


</template>