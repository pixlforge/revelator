<template>
  <div>
    <main class="main__container main__container--medium">
      <transition name="fade">
        <h1 class="main__title"
            v-if="getQuestions.length && showContent"
            v-text="getQuestions[currentQuestion].name">
        </h1>
      </transition>

      <div v-if="getQuestions.length">
        <div class="form__group">
          <transition name="fade" mode="out-in">
            <!--Dropdown-->
            <div v-if="typeDropdown">
              <AppDiagnosticSelect :options="selectOptions"
                                   :value="selectedOptionLabel"
                                   @selectedOption="selectedOption"/>
            </div>

            <!--Multiple-->
            <div v-if="typeMultiple">
              <ul class="options__list">
                <li class="options__list-item"
                    v-for="option in getQuestions[currentQuestion].options"
                    :class="{ 'options__list-item--active': foundAnswer(option) }"
                    v-text="option.name"
                    @click="selectedOption({ label: option.name, value: option.id })">
                </li>
              </ul>
            </div>

            <!--Multiple Inline-->
            <div v-if="typeMultipleInline">
              <ul class="options__list-inline">
                <li class="options__list-inline-item"
                    v-for="option in getQuestions[currentQuestion].options"
                    :class="{ 'options__list-inline-item--active': foundAnswer(option) }"
                    v-text="option.name"
                    @click="selectedOption({ label: option.name, value: option.id })">
                </li>
              </ul>
            </div>

            <!--Infos-->
            <div v-if="typeInfos">
              Infos
            </div>
          </transition>
        </div>

      </div>

      <transition name="fade" mode="out-in">
        <AppContinue v-if="getQuestions.length && showContent"
                     label="Continue"
                     :disabled="buttonDisabled"
                     @nextQuestion="nextQuestion"/>
      </transition>

    </main>
  </div>
</template>

<script>
  import AppContinue from '../components/buttons/AppContinue'
  import AppDiagnosticSelect from '../components/forms/AppDiagnosticSelect'
  import { mapGetters } from 'vuex'

  export default {
    components: {
      AppContinue,
      AppDiagnosticSelect
    },
    data() {
      return {
        showContent: true,
        currentQuestion: this.$route.query.question,
        answers: []
      }
    },
    computed: {
      ...mapGetters([
        'getCurrentUser',
        'getQuestions',
        'getAnswers'
      ]),

      typeDropdown() {
        return this.getQuestions[this.currentQuestion].type === 'dropdown'
          && this.showContent
      },

      typeMultiple() {
        return this.getQuestions[this.currentQuestion].type === 'multiple'
          && this.showContent
      },

      typeMultipleInline() {
        return this.getQuestions[this.currentQuestion].type === 'multiple-inline'
          && this.showContent
      },

      typeInfos() {
        return this.getQuestions[this.currentQuestion].type === 'infos'
          && this.showContent
      },

      selectOptions() {
        let options = []
        this.getQuestions[this.currentQuestion].options.forEach(option => {
          options.push({
            label: option.name,
            value: option.id
          })
        })
        return options
      },

      selectedOptionLabel() {
        if (this.getAnswers[this.currentQuestion]) {
          return {
            label: this.getAnswers[this.currentQuestion].label
          }
        } else {
          return {
            label: 'Select'
          }
        }
      },

      buttonDisabled() {
        return !this.getAnswers[this.currentQuestion]
      }
    },
    created() {
      /**
       * Get the questions if the store is empty.
       */
      if (!this.getQuestions.length) {
        this.$store.dispatch('toggleLoader')
        this.$store.dispatch('fetchQuestions').then(() => {
          this.$store.dispatch('toggleLoader')
        }).catch(err => {
          console.log(err)
          this.$store.dispatch('toggleLoader')
        })
      }
    },
    methods: {
      foundAnswer(option) {
        return this.getAnswers.find(answer => {
          return answer.question_id === this.getQuestions[this.currentQuestion].id
            && answer.option_id === option.id
        })
      },

      selectedOption(data) {
        console.log(data)

        this.$store.dispatch('addAnswer', {
          user_id: this.getCurrentUser.id,
          question_id: this.getQuestions[this.currentQuestion].id,
          option_id: data.value,
          label: data.label
        })
      },

      nextQuestion() {
        if (this.currentQuestion < this.getQuestions.length - 1) {
          this.showContent = false
          this.currentQuestion++
          setTimeout(() => {
            this.showContent = true
          }, 5)
          this.$router.push({ query: { question: this.currentQuestion } })
        }
      }
    }
  }
</script>