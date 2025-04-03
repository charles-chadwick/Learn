<script setup>
import { ArrowRightCircleIcon} from '@heroicons/vue/20/solid';
import Layout from "../Layout.vue";
import LearnDetail from "../Partials/LearnDetail.vue";

defineProps({
  lessons : {
    type : Array
  }
})
</script>

<template>

  <Layout>

  <ul
      role="list"
      class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
    <li
        v-for="lesson in lessons"
        :key="lesson.id"
        class="col-span-1 divide-y divide-stone-200 rounded-lg bg-white shadow">

      <LearnDetail
          :description="lesson.description">

        <template #header>
            <span class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 mr-2 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">
              Lesson
            </span>
          {{ lesson.title }}
        </template>

        <template #button>
          <a
              :href="route('lessons.chapters', {lesson_id:  lesson.id })"
              class="relative -mr-px inline-flex w-0 flex-1 items-center justify-center gap-x-3 rounded-bl-lg border border-transparent py-4 text-sm font-semibold text-stone-900">
            <ArrowRightCircleIcon
                class="size-5 text-stone-400"
                aria-hidden="true" />
            Start
          </a>
        </template>
      </LearnDetail>

    </li>
  </ul>

  </Layout>
</template>