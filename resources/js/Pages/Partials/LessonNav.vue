<script>
import { HomeIcon } from "@heroicons/vue/20/solid/index.js";

export default {
  components : {
    HomeIcon,
  },
  props      : {
    lesson  : {
      type     : Object,
      required : false
    },
    chapter : {
      type     : Object,
      required : false
    }
  },
  data() {

    const navigation = [
      {
        id      : "home",
        name    : 'Home',
        href    : '/',
        current : false
      },
      {
        id      : this.lesson.id,
        name    : this.lesson.title,
        href    : route('lessons.chapters', { lesson_id : this.lesson.id }),
        current : false
      }
    ];

    if ( this.chapter !== undefined ) {
      navigation.push({
        id      : this.chapter.id,
        name    : `Chapter ${this.chapter.number}: ${this.chapter.title}`,
        href    : route('lessons.chapter', {
          lesson_id      : this.lesson.id,
          chapter_id : this.chapter.id
        }),
        current : false
      });
    }

    return {
      navigation
    }
  }
}

</script>

<template>
  <nav
      class="flex border-b border-stone-200 bg-white"
      aria-label="Breadcrumb">
    <ol
        role="list"
        class="mx-auto flex w-full max-w-screen-xl space-x-4 px-4 sm:px-6 lg:px-8">
      <li class="flex">
        <div class="flex items-center">
          <a
              href="#"
              class="text-stone-400 hover:text-stone-500">
            <HomeIcon
                class="size-5 shrink-0"
                aria-hidden="true" />
            <span class="sr-only">Home</span>
          </a>
        </div>
      </li>
      <li
          class="flex"
          v-for="nav in navigation"
          :key="nav.id">
        <div class="flex items-center">
          <svg
              class="h-full w-6 shrink-0 text-stone-200"
              viewBox="0 0 24 44"
              preserveAspectRatio="none"
              fill="currentColor"
              aria-hidden="true">
            <path d="M.293 0l22 22-22 22h1.414l22-22-22-22H.293z" />
          </svg>
          <a
              :href="nav.href"
              class="ml-4 text-sm font-medium text-stone-500 hover:text-stone-700"
              :aria-current="nav.current ? 'page' : undefined">{{ nav.name }}</a>
        </div>
      </li>

    </ol>
  </nav>
</template>