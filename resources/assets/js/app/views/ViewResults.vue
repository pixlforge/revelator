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
           v-if="userConsents"
           @click="sendMeMyResults">
        <span class="sm-hidden">Send Me My Results</span>
        <span class="md-hidden"><i class="fas fa-envelope"></i></span>
      </div>

      <!--Start Again-->
      <div class="btn__big"
           :class="shouldSetElementWidth"
           @click="startAgain">
        <span class="sm-hidden">Start Again</span>
        <span class="md-hidden"><i class="fas fa-undo"></i></span>
      </div>

      <!--Discover La Prairie-->
      <div class="btn__big"
           :class="shouldSetElementWidth">
        <a class="sm-hidden"
           href="https://www.laprairie.ch/"
           target="_blank"
           rel="noopener noreferrer">
          Discover La Prairie
        </a>
        <a class="md-hidden"
           href="https://www.laprairie.ch/"
           target="_blank"
           rel="noopener noreferrer">
          <i class="fas fa-home"></i>
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
        'getQuestions',
        'getCurrentUser'
      ]),

      /**
       * Set element's width to 50% if user hasn't agreed to share his personal details.
       */
      shouldSetElementWidth() {
        return this.userConsents ? '' : 'btn__big--half'
      },
    },
    data() {
      return {
        programs: [],
        userConsents: false
      }
    },
    created() {
      /**
       * Initialize the component.
       */
      if (window.currentUser) {
        this.initComponent()
      } else if (this.$route.query.name) {
        this.$store.dispatch('loginExistingDiagnosticUser', this.$route.query.name).then(() => {
          this.initComponent()
        })
      }
    },
    beforeRouteLeave(to, from, next) {
      this.$store.dispatch('logoutDiagnosticUser').then(() => {
        next()
      })
    },
    methods: {
      /**
       * Send the user a mail along with a token used to consult his results.
       */
      sendMeMyResults() {
        this.$store.dispatch('toggleLoader')
        axios.get(route('api.diagnostics.send')).then(res => {
          this.$store.dispatch('toggleLoader')
          if (res.status === 204) {
            this.$toasted.global.success({
              message: "We've sent you an email containing a permanent link to this session's results!"
            })
          } else {
            this.$toasted.global.danger({
              message: `Something went wrong. ${res.status} ${res.statusText}.`
            })
          }
        }).catch(err => {
          this.$store.dispatch('toggleLoader')
          this.$toasted.global.danger({
            message: `Something went wrong. ${res.status} ${res.statusText}.`
          })
        })
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
          this.doesUserConsent()
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
        this.calculatePercentage()
        this.sortByPercentage()
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
            percentage: 0
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
      },

      /**
       * Determine if user consents to sharing personal details.
       */
      doesUserConsent() {
        if (this.getCurrentUser.user_consents) {
          this.userConsents = true
        }
      },

      /**
       * Calculate the percentage property.
       */
      calculatePercentage() {
        this.programs.forEach(program => {
          program.percentage = Math.ceil(Math.round((program.points / program.maxPoints) * 100))
        })
      },

      sortByPercentage() {
        this.programs.sort((a, b) => {
          return b.percentage - a.percentage
        })
      }
    }
  }
</script>