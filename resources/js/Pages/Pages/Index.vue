<script setup>
import Layout from "../Layout.vue";
import LessonNav from "../Partials/LessonNav.vue";

defineProps({
  page    : Object,
  lesson  : Object,
  chapter : Object,
})

</script>
<template>

  <Layout>
    <LessonNav
        :lesson="lesson"
        :chapter="chapter" />
    <h1 class="font-bold mt-4">Page {{ page.number }}</h1>
    <div v-html="page.content"></div>
  </Layout>

</template>