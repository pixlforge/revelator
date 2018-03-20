<template>
  <div>
    <main class="main__container">
      <h1 class="main__title">Your diagnostic</h1>

      <p class="main__lead">
        Thank you, here are the programs that we selected for you.
      </p>

      <!--Results-->
      <div class="main__results">
        <AppProgram v-for="program in getPrograms"
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
    created() {
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
    methods: {
      getResultsByProgram() {
        let optionIds = []

        this.getAnswers.forEach(answer => {
          optionIds.push(answer.option_id)
        })

        console.log('optionIds: ' + optionIds)

        let selectedOptions = this.getOptions.find(option => {
          return option.id === 2
        })

        console.log(selectedOptions)

        let programs = this.getPrograms

        console.log(programs)
      }
    }
  }
</script>