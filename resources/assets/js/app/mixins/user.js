export const userIsAdmin = {
  computed: {
    userIsAdmin() {
      if (this.$store.getters.getCurrentUser) {
        return this.$store.getters.getCurrentUser.role === 'dev' || this.$store.getters.getCurrentUser.role === 'admin'
      }
    }
  },
}