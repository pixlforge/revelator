<template>
  <div>
    <main class="main__container">

      <!-- Title -->
      <h1 class="main__title">Your diagnostic</h1>

      <!-- Lead -->
      <p class="main__lead">
        Thank you, here are the programs that we selected for you.
      </p>

      <!-- Results -->
      <div class="main__results">
        <AppProgram v-for="program in programs"
                    :key="program.id"
                    :program="program"/>
      </div>
    </main>
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
        'getOptions'
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
       * Fetch the programs, options and existing answers.
       */
      initComponent() {
        this.$store.dispatch('toggleLoader')

        const fetchPrograms = this.$store.dispatch('fetchPrograms')
        const fetchExistingAnswers = this.$store.dispatch('fetchExistingAnswers')
        const fetchOptions = this.$store.dispatch('fetchOptions')

        Promise.all([
          fetchPrograms,
          fetchExistingAnswers,
          fetchOptions
        ]).then(() => {
          this.$store.dispatch('toggleLoader')
          this.getResultsByProgram()
        }).catch(err => {
          this.$store.dispatch('toggleLoader')
          console.log(err)
        })
      },

      getResultsByProgram() {
        /**
         * Build the programs data property.
         */
        this.getPrograms.forEach(program => {
          this.programs.push({
            id: program.id,
            title: program.title,
            slogan: program.slogan,
            url: program.url,
            points: 0
          })
        })

        /**
         * Attribute points in relation with an option's weighting related to a program.
         */
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