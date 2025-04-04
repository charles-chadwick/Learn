<script setup>
import Layout from "../Layout.vue";
import LessonNav from "../Partials/LessonNav.vue";
import PageNav from "./PageNav.vue";

const props = defineProps({
  page          : Object,
  lesson        : Object,
  chapter       : Object,
  next_page     : Object,
  previous_page : Object
})

</script>
<template>
  <Layout>

    <LessonNav
        :lesson="lesson"
        :chapter="chapter" />

    <PageNav
        :page="page"
        :lesson="lesson"
        :chapter="chapter"
        :next_page="next_page"
        :previous_page="previous_page" />

    <div class="bg-white px-4 py-2 mt-4 shadow mb-4 text-stone-700">
      <h1 class="font-bold my-4">Page {{ page.number }}</h1>
      <div v-html="page.content"></div>
    </div>

    <PageNav
        :page="page"
        :lesson="lesson"
        :chapter="chapter"
        :next_page="next_page"
        :previous_page="previous_page" />

  </Layout>
</template>