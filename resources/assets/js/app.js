/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap')

window.Vue = require('vue')
import VueRouter from 'vue-router'
import Vuelidate from 'vuelidate'
import Toasted from 'vue-toasted';
import App from './app/App'
import { routes } from './app/routes'
import { store } from './app/store'

Vue.use(VueRouter)
Vue.use(Vuelidate)
Vue.use(Toasted)

const globalToastDuration = 3000

Vue.toasted.register('success',
  payload => {
    if (!payload.message) {
      return "Action successful!"
    }
    return payload.message;
  },
  {
    icon: {
      name: 'check-circle'
    },
    className: [
      'toast',
      'toast--success'
    ],
    iconPack: 'fontawesome',
    duration: globalToastDuration
  }
)

Vue.toasted.register('info',
  payload => {
    if (!payload.message) {
      return "Information!"
    }
    return payload.message;
  },
  {
    icon: {
      name: 'info-circle'
    },
    className: [
      'toast',
      'toast--info'
    ],
    iconPack: 'fontawesome',
    duration: globalToastDuration
  }
)

Vue.toasted.register('warning',
  payload => {
    if (!payload.message) {
      return "Warning!"
    }
    return payload.message;
  },
  {
    icon: {
      name: 'exclamation-circle'
    },
    className: [
      'toast',
      'toast--warning'
    ],
    iconPack: 'fontawesome',
    duration: globalToastDuration
  }
)

Vue.toasted.register('danger',
  payload => {
    if (!payload.message) {
      return "Something went wrong."
    }
    return payload.message;
  },
  {
    icon: {
      name: 'times-circle'
    },
    className: [
      'toast',
      'toast--danger'
    ],
    iconPack: 'fontawesome',
    duration: globalToastDuration
  }
)

const router = new VueRouter({
  mode: 'history',
  routes: routes
})

const app = new Vue({
  el: '#app',
  components: { App },
  router,
  store
})
