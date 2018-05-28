<template>
  <div class="paginator__container">
    <AppPaginatorElement
      v-for="(element, index) in getQuestions"
      :key="element.id"
      :style="elementWidth"
      :element="element"
      :index="index"
      :should-style-element="shouldStyleElement(element)"
      class="paginator__element"/>
  </div>
</template>

<script>
import AppPaginatorElement from "./AppPaginatorElement";
import { mapGetters } from "vuex";

export default {
  components: {
    AppPaginatorElement
  },
  computed: {
    ...mapGetters(["getCurrentQuestion", "getQuestions", "getAnswers"]),
    elementWidth() {
      return "width: " + 100 / this.total + "%;";
    },
    total() {
      return this.getQuestions.length;
    }
  },
  methods: {
    shouldStyleElement(element) {
      return element.id == this.getCurrentQuestion + 1 ||
        this.questionHasAnAnswer(element)
        ? true
        : false;
    },
    questionHasAnAnswer(element) {
      return this.getAnswers.find(answer => {
        return answer.question_id === element.id;
      });
    }
  }
};
</script>