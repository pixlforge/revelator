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
        'getOptions',
        'getQuestions'
      ])
    },
    data() {
      return {
        programs: [],
        questions: []
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
            points: 0,
            maxPoints: 0
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

        /* No edit above this line */

        // Sort relevant attributes
        this.getQuestions.forEach(question => {
          this.questions.push({
            id: question.id,
            name: question.name,
            options: question.options
          })
        })

        this.questions.forEach(question => {
          if (question.id !== 3) {
            console.warn('START Question ID ' + question.id)
            
            question.options.forEach(option => {
              console.log('START Option ' + option.name)

              option.programs.forEach(program => {
                console.log(program)
              })

              console.log('STOP Option ' + option.name)
            })

            console.warn('STOP Question ID ' + question.id)
          }
        })

        // console.log(this.questions)


        // questions.forEach(question => {
        //   question.options.forEach(option => {
        //     if (option.question_id !== 3) {

        //       console.log(option)

        //     }
        //   })
        // })


        // this.getQuestions.forEach(question => {
        //   let maxValue = 0

        //   question.options.forEach(option => {
        //     if (option.question_id !== 3) {

        //       option.programs.forEach(program => {
        //         this.programs.forEach(item => {
        //           if (item.id === program.id) {
        //             console.log('--------------')
        //             console.log(program)
        //             console.log(item)
        //             console.log('--------------')
        //             item.maxPoints += program.pivot.value
        //           }
        //         })
        //       })

        //     }
        //   })
        // })




      }
    }
  }
</script>