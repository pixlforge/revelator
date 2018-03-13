<template>
  <div>
    <a class="btn__diagnostic"
       @click="runDiagnostic"
       v-text="'Run the diagnostic'">
    </a>
  </div>
</template>

<script>
  export default {
    methods: {
      runDiagnostic() {
        /**
         * Log out the current user then create a new one and connect it.
         */
        this.$store.dispatch('toggleLoader')

        this.$store.dispatch('logoutDiagnosticUser').then(() => {
          this.$store.dispatch('loginDiagnosticUser').then(() => {
            this.$store.dispatch('fetchQuestions').then(() => {
              this.$store.dispatch('toggleLoader')
              this.$router.push({
                name: 'diagnostic',
                query: {
                  question: 0
                }
              })
            })
          })
        })
      }
    }
  }
</script>