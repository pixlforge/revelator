<template>
  <div>
    <main class="main__container main__container--medium">

      <!-- Question -->
      <transition name="fade-longer" mode="out-in">
        <h1 class="main__title"
            v-if="getQuestions.length && getShowContentStatus"
            v-text="getQuestions[getCurrentQuestion].name">
        </h1>
      </transition>

      <!-- Answers -->
      <div v-if="getQuestions.length">
        <div class="form__group">
          <transition name="fade-longer" mode="out-in">

            <!-- Type Dropdown -->
            <div v-if="typeDropdown">
              <AppDiagnosticSelect :options="selectOptions"
                                   :value="selectedOptionLabel"
                                   @selectedOption="addAnswer"/>
            </div>

            <!-- Type Multiple -->
            <div v-if="typeMultiple">
              <ul class="options__list">
                <li class="options__list-item"
                    v-for="option in getQuestions[getCurrentQuestion].options"
                    :key="option.id"
                    :class="{ 'options__list-item--active': answerExistsInStore(option) }"
                    v-text="option.name"
                    @click="addAnswer({ label: option.name, value: option.id })">
                </li>
              </ul>
            </div>

            <!-- Type Multiple Inline -->
            <div v-if="typeMultipleInline">
              <ul class="options__list-inline">
                <li class="options__list-inline-item"
                    v-for="option in getQuestions[getCurrentQuestion].options"
                    :key="option.id"
                    :class="{ 'options__list-inline-item--active': answerExistsInStore(option) }"
                    v-text="option.name"
                    @click="addAnswer({ label: option.name, value: option.id })">
                </li>
              </ul>
            </div>

          </transition>
        </div>
      </div>

      <!-- Button Back -->
      <AppBack label="Back"
               :disabled="getCurrentQuestion <= 0"
               @previousQuestion="previousQuestion"/>

      <!-- Button Continue -->
      <AppContinue label="Continue"
                   :disabled="buttonDisabled"
                   @nextQuestion="nextQuestion"/>
    </main>

    <!-- Paginator -->
    <AppPaginator/>
  </div>
</template>

<script>
  import AppPaginator from '../components/UI/AppPaginator'
  import AppContinue from '../components/buttons/AppContinue'
  import AppBack from '../components/buttons/AppBack'
  import AppDiagnosticSelect from '../components/forms/AppDiagnosticSelect'
  import { mapGetters } from 'vuex'

  export default {
    components: {
      AppPaginator,
      AppContinue,
      AppBack,
      AppDiagnosticSelect
    },
    data() {
      return {
        answers: []
      }
    },
    computed: {
      /**
       * Map the following getters from the store.
       */
      ...mapGetters([
        'getCurrentQuestion',
        'getCurrentUser',
        'getQuestions',
        'getAnswers',
        'getOptions',
        'getShowContentStatus'
      ]),

      /**
       * Filter questions of type 'dropdown'.
       */
      typeDropdown() {
        return this.getQuestions[this.getCurrentQuestion].type === 'dropdown'
          && this.getShowContentStatus
      },

      /**
       * Filter questions of type 'multiple'.
       */
      typeMultiple() {
        return this.getQuestions[this.getCurrentQuestion].type === 'multiple'
          && this.getShowContentStatus
      },

      /**
       * Filter questions of type 'multiple-inline'.
       */
      typeMultipleInline() {
        return this.getQuestions[this.getCurrentQuestion].type === 'multiple-inline'
          && this.getShowContentStatus
      },

      /**
       * Get all questions and format them to be displayed in the select component.
       */
      selectOptions() {
        let options = []
        this.getQuestions[this.getCurrentQuestion].options.forEach(option => {
          options.push({ label: option.name, value: option.id })
        })
        return options
      },

      /**
       * What to display in the select component.
       */
      selectedOptionLabel() {
        if (this.getAnswers[this.getCurrentQuestion]) {
          return {
            label: this.getAnswers[this.getCurrentQuestion].label
          }
        } else {
          return {
            label: 'Select'
          }
        }
      },

      /**
       * Continue button is disabled unless an answer has been selected.
       */
      buttonDisabled() {
        return !this.getAnswers[this.getCurrentQuestion]
      }
    },
    created() {
      this.$store.dispatch('toggleLoader')

      const setCurrentQuestion = this.$store.dispatch('setCurrentQuestion', parseInt(this.$route.query.question))
      const fetchQuestions = this.$store.dispatch('fetchQuestions')
      const fetchOptions = this.$store.dispatch('fetchOptions')
      const fetchExistingAnswers = this.$store.dispatch('fetchExistingAnswers')

      Promise.all([
        setCurrentQuestion,
        fetchQuestions,
        fetchOptions,
        fetchExistingAnswers
      ]).then(() => {
        this.getAnswers.forEach(answer => {
          return answer.label = this.getOptions.find(option => {
            return answer.option_id === option.id
          }).name
        })
      }).then(() => this.$store.dispatch('toggleLoader'))
    },
    methods: {
      /**
       * Check whether an answer to the current question is present in the store.
       */
      answerExistsInStore(option) {
        return this.getAnswers.find(answer => {
          return answer.question_id === this.getQuestions[this.getCurrentQuestion].id
            && answer.option_id === option.id
        })
      },

      /**
       * Add or update an answer.
       */
      addAnswer(data) {
        this.$store.dispatch('addAnswer', {
          user_id: this.getCurrentUser.id,
          question_id: this.getQuestions[this.getCurrentQuestion].id,
          option_id: data.value,
          label: data.label
        })
      },

      /**
       * Continue to the next question.
       */
      nextQuestion() {
        if (this.getCurrentQuestion < this.getQuestions.length - 1) {
          this.$store.dispatch('setShowContentValue', false)
          this.$store.dispatch('incrementCurrentQuestion')
          setTimeout(() => {
            this.$store.dispatch('setShowContentValue', true)
          }, 5)
          this.$router.push({ query: { question: this.getCurrentQuestion } })
        }
      },

      /**
       * Go back to the previous question.
       */
       previousQuestion() {
         if (this.getCurrentQuestion > 0) {
           this.$store.dispatch('setShowContentValue', false)
           this.$store.dispatch('decrementCurrentQuestion')
           setTimeout(() => {
             this.$store.dispatch('setShowContentValue', true)
           }, 5)
           this.$router.push({ query: { question: this.getCurrentQuestion } })
         }
       }
    }
  }
</script>