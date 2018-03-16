<template>
  <div class="paginator__container">
    <AppPaginatorElement class="paginator__element"
                         v-for="(element, index) in getQuestions"
                         :key="element.id"
                         :style="elementWidth"
                         :element="element"
                         :index="index"
                         :shouldStyleElement="shouldStyleElement(element)"/>
  </div>
</template>

<script>
  import AppPaginatorElement from './AppPaginatorElement'
  import { mapGetters } from 'vuex'

  export default {
    components: {
      AppPaginatorElement
    },
    computed: {
      ...mapGetters([
        'getCurrentQuestion',
        'getQuestions',
        'getAnswers'
      ]),

      elementWidth() {
        return 'width: ' + (100 / this.total) + '%;'
      },

      total() {
        return this.getQuestions.length
      }
    },
    methods: {
      /**
       * Determine wheter an element should be styled.
       */
      shouldStyleElement(element) {
        return element.id == this.getCurrentQuestion + 1 || this.questionHasAnAnswer(element) ? true : false
      },

      /**
       * Check whether an answer to the current question is present in the store.
       */
      questionHasAnAnswer(element) {
        return this.getAnswers.find(answer => {
          return answer.question_id === element.id
        })
      },
    }
  }
</script>