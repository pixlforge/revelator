<template>
  <div>
    <main class="main__container">
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
            Dropdown
          </div>

          <!--Multiple-->
          <div v-if="typeMultiple">
            Multiple
          </div>

          <!--Infos-->
          <div v-if="typeInfos">
            Infos
          </div>
        </transition>

      </div>
    </main>
    <AppContinue label="Continue"
                 @nextQuestion="nextQuestion"/>
  </div>
</template>

<script>
  import AppContinue from '../components/buttons/AppContinue'
  import AppSelect from '../components/forms/AppSelect'
  import { mapGetters } from 'vuex'

  export default {
    components: {
      AppContinue,
      AppSelect
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

      typeInfos() {
        return this.getQuestions[this.currentQuestion].type === 'infos'
          && this.showContent
      },
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
      nextQuestion() {
        if (this.currentQuestion < this.getQuestions.length - 1) {
          this.showContent = false
          this.currentQuestion++
          setTimeout(() => {
            this.showContent = true
          }, 5)
        }
      }
    }
  }
</script>