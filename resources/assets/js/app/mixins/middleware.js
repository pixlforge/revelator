export const admin = {
  beforeRouteEnter: (to, from, next) => {
    if (window.currentUser) {
      if (window.currentUser.role === 'dev' || window.currentUser.role === 'admin') {
        return next()
      }
    } else {
      next({ name: 'home' })
    }
  }
}