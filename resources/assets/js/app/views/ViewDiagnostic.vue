<template>
  <div>
    <main class="main__container main__container--medium">
      <transition name="fade">
        <h1 class="main__title"
            v-if="getQuestions.length && showContent"
            v-text="getQuestions[currentQuestion].name">
        </h1>
      </transition>

      <div class="form__group"
           v-if="getQuestions.length">
        <transition name="fade" mode="out-in">
          <!--Dropdown-->
          <div v-if="typeDropdown">
            <AppDiagnosticSelect :options="selectOptions"
                                 :value="selectedOptionLabel"
                                 @selectedOption="selectedOption"/>
          </div>

          <!--Multiple-->
          <div v-if="typeMultiple">
            Multiple
          </div>

          <!--Multiple Inline-->
          <div v-if="typeMultipleInline">
            Multiple Inline
          </div>

          <!--Infos-->
          <div v-if="typeInfos">
            Infos
          </div>
        </transition>
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
        currentQuestion: 0,
        answers: []
      }
    },
    computed: {
      ...mapGetters([
        'getQuestions'
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
        if (this.$store.getters.getAnswers[this.currentQuestion]) {
          return {
            label: this.$store.getters.getAnswers[this.currentQuestion].label
          }
        } else {
          return {
            label: 'Select'
          }
        }
      },

      buttonDisabled() {
        return !this.$store.getters.getAnswers[this.currentQuestion]
      }
    },
    created() {
      /**
       * Log out the current user then create a new one and connect it.
       */
      this.$store.dispatch('toggleLoader')

      this.$store.dispatch('logoutDiagnosticUser').then(() => {
        this.$store.dispatch('loginDiagnosticUser').then(() => {
          this.$store.dispatch('fetchDiagnosticQuestions').then(() => {
            this.$store.dispatch('toggleLoader')
            this.$router.push({ query: { question: this.currentQuestion } })
          })
        })
      })
    },
    destroyed() {
      /**
       * Log out the current user when they leave the page.
       */
      this.$store.dispatch('logoutDiagnosticUser')
    },
    methods: {
      selectedOption(data) {
        this.$store.dispatch('addAnswer', {
          user_id: this.$store.getters.getCurrentUser.id,
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