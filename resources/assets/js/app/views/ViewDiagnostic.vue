<template>
  <div>
    <main class="main__container main__container--medium">

      <!--Question-->
      <transition name="fade">
        <h1 class="main__title"
            v-if="getQuestions.length && showContent"
            v-text="getQuestions[getCurrentQuestion].name">
        </h1>
      </transition>

      <!--Answers-->
      <div v-if="getQuestions.length">
        <div class="form__group">
          <transition name="fade" mode="out-in">

            <!--Type Dropdown-->
            <div v-if="typeDropdown">
              <AppDiagnosticSelect :options="selectOptions"
                                   :value="selectedOptionLabel"
                                   @selectedOption="addAnswer"/>
            </div>

            <!--Type Multiple-->
            <div v-if="typeMultiple">
              <ul class="options__list">
                <li class="options__list-item"
                    v-for="option in getQuestions[getCurrentQuestion].options"
                    :class="{ 'options__list-item--active': answerExistsInStore(option) }"
                    v-text="option.name"
                    @click="addAnswer({ label: option.name, value: option.id })">
                </li>
              </ul>
            </div>

            <!--Type Multiple Inline-->
            <div v-if="typeMultipleInline">
              <ul class="options__list-inline">
                <li class="options__list-inline-item"
                    v-for="option in getQuestions[getCurrentQuestion].options"
                    :class="{ 'options__list-inline-item--active': answerExistsInStore(option) }"
                    v-text="option.name"
                    @click="addAnswer({ label: option.name, value: option.id })">
                </li>
              </ul>
            </div>

            <!--Type Infos-->
            <div v-if="typeInfos">
              Infos
            </div>
          </transition>
        </div>
      </div>

      <!--Button Continue-->
      <AppContinue label="Continue"
                   :disabled="buttonDisabled"
                   @nextQuestion="nextQuestion"/>
    </main>

    <!--Paginator-->
    <AppPaginator/>
  </div>
</template>

<script>
  import AppPaginator from '../components/UI/AppPaginator'
  import AppContinue from '../components/buttons/AppContinue'
  import AppDiagnosticSelect from '../components/forms/AppDiagnosticSelect'
  import { mapGetters } from 'vuex'

  export default {
    components: {
      AppPaginator,
      AppContinue,
      AppDiagnosticSelect
    },
    data() {
      return {
        showContent: true,
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
        'getOptions'
      ]),

      /**
       * Filter questions of type 'dropdown'.
       */
      typeDropdown() {
        return this.getQuestions[this.getCurrentQuestion].type === 'dropdown'
          && this.showContent
      },

      /**
       * Filter questions of type 'multiple'.
       */
      typeMultiple() {
        return this.getQuestions[this.getCurrentQuestion].type === 'multiple'
          && this.showContent
      },

      /**
       * Filter questions of type 'multiple-inline'.
       */
      typeMultipleInline() {
        return this.getQuestions[this.getCurrentQuestion].type === 'multiple-inline'
          && this.showContent
      },

      /**
       * Filter questions of type 'infos'.
       */
      typeInfos() {
        return this.getQuestions[this.getCurrentQuestion].type === 'infos'
          && this.showContent
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
          this.showContent = false
          this.$store.dispatch('incrementCurrentQuestion')
          setTimeout(() => {
            this.showContent = true
          }, 5)
          this.$router.push({ query: { question: this.getCurrentQuestion } })
        }
      }
    }
  }
</script>