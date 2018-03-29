<template>
  <div>
    <main class="main__container">

      <!--Title-->
      <h1 class="main__title">Your diagnostic</h1>

      <!--Lead-->
      <p class="main__lead">
        Thank you, here are the programs that we selected for you.
      </p>

      <!--Results-->
      <div class="main__results">
        <AppProgram v-for="program in programs"
                    :key="program.id"
                    :program="program"/>
      </div>
    </main>

    <!--Button Group-->
    <div class="main__btn-group">

      <!--Send Me My Results-->
      <div class="btn__big"
           @click="sendMeMyResults">
        <span>Send Me My Results</span>
      </div>

      <!--Start Again-->
      <div class="btn__big"
           @click="startAgain">
        <span>Start Again</span>
      </div>

      <!--Discover La Prairie-->
      <div class="btn__big">
        <a href="https://www.laprairie.ch/"
           target="_blank"
           rel="noopener noreferrer">
          Discover La Prairie
        </a>
      </div>
    </div>
  </div>
</template>

<script>
  import AppProgram from '../components/UI/AppProgram'
  import { mapGetters } from 'vuex'

  export default {
    components: {
      AppProgram
    },
    computed: {
      ...mapGetters([
        'getPrograms',
        'getAnswers',
        'getOptions',
        'getQuestions'
      ])
    },
    data() {
      return {
        programs: []
      }
    },
    created() {
      this.initComponent()
    },
    methods: {
      /**
       * Send the user a mail along with a token used to consult his results.
       */
      sendMeMyResults() {
        //
      },

      /**
       * Log out the user and redirect him to the home page.
       */
      startAgain() {
        this.$store.dispatch('toggleLoader')
        this.$store.dispatch('logoutDiagnosticUser').then(() => {
          this.$store.dispatch('toggleLoader')
          this.$router.push({ name: 'home' })
        }).catch(() => {
          this.$store.dispatch('toggleLoader')
        })
      },

      /**
       * Fetch the programs, options and existing answers.
       */
      initComponent() {
        this.$store.dispatch('toggleLoader')

        const fetchPrograms = this.$store.dispatch('fetchPrograms')
        const fetchExistingAnswers = this.$store.dispatch('fetchExistingAnswers')
        const fetchOptions = this.$store.dispatch('fetchOptions')
        const fetchQuestions = this.$store.dispatch('fetchQuestions')

        Promise.all([
          fetchPrograms,
          fetchExistingAnswers,
          fetchOptions,
          fetchQuestions
        ]).then(() => {
          this.$store.dispatch('toggleLoader')
          this.getResultsByProgram()
        }).catch(err => {
          this.$store.dispatch('toggleLoader')
          console.log(err)
        })
      },

      /**
       * Get the full results for each program.
       */
      getResultsByProgram() {
        this.buildProgramsDataProperties()
        this.attributePoints()
      },

      /**
       * Build the programs data properties.
       */
      buildProgramsDataProperties() {
        this.getPrograms.forEach(program => {
          let currentQuestion = 0
          let max = 0
          let sum = 0

          // For each option associated with the current program.
          program.options.forEach(option => {

            // If the current program's id is the same as the option's associated program id.
            if (program.id === option.pivot.program_id) {

              // Check whether the question has changed.
              if (currentQuestion !== option.question_id) {
                currentQuestion = option.question_id
                sum += max
                max = 0
              }

              // Check for max value and attribute new max if necessary.
              if (max < option.pivot.value) {
                max = option.pivot.value
              }
            }
          })

          // Push the desired properties to the programs data property array.
          this.programs.push({
            id: program.id,
            title: program.title,
            slogan: program.slogan,
            url: program.url,
            points: 0,
            maxPoints: sum,
          })
        })
      },

      /**
       * Attribute points in relation with an option's weighting related to a program.
       */
      attributePoints() {
        this.getAnswers.forEach(answer => {
          answer.option.programs.forEach(program => {
            this.programs.forEach(item => {
              if (item.id === program.id) {
                item.points += program.pivot.value
              }
            })
          })
        })
      }
    }
  }
</script>