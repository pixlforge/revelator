<template>
  <div>
    <a class="btn__diagnostic"
       @click="runOrContinue"
       v-text="btnText">
    </a>
  </div>
</template>

<script>
  import { mapGetters } from 'vuex'

  export default {
    computed: {
      ...mapGetters([
        'getCurrentUser'
      ]),

      btnText() {
        if (this.getCurrentUser) {
          return 'Continue'
        } else {
          return 'Run the diagnostic'
        }
      }
    },
    methods: {
      /**
       * Log out the current user then create a new one and connect it or continue
       * if a user is logged-in.
       */
      runOrContinue() {
        if (this.getCurrentUser) {
          this.$router.push({
            name: 'diagnostic',
            query: {
              question: 0,
              name: this.getCurrentUser.name
            }
          })
        } else {
          this.$store.dispatch('toggleLoader')
          this.$store.dispatch('logoutDiagnosticUser').then(() => {
            this.$store.dispatch('loginDiagnosticUser').then(() => {
              this.$store.dispatch('fetchQuestions').then(() => {
                this.$store.dispatch('toggleLoader')
                this.$router.push({
                  name: 'diagnostic',
                  query: {
                    question: 0,
                    name: this.getCurrentUser.name
                  }
                })
              })
            })
          })
        }
      }
    }
  }
</script>