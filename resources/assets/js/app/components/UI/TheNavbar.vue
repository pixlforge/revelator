<template>
  <nav class="nav__container">

    <!-- Logo -->
    <div class="nav__brand">
      <router-link :to="{ name: 'home' }">
        <img src="/img/clp-logo.svg" alt="Logo La Prairie">
      </router-link>
    </div>
    <template v-if="$store.getters.getCurrentUser">
      <div class="nav__menu"
           v-if="$store.getters.getCurrentUser.role === 'dev' || $store.getters.getCurrentUser.role === 'admin'">
        <ul class="nav__list">

          <!-- Home -->
          <li>
            <router-link :to="{ name: 'home' }"
                         active-class="nav__link-active"
                         exact>
              Home
            </router-link>
          </li>

          <!-- Diagnostic -->
          <li>
            <router-link :to="{ name: 'diagnostic', query: { question: 0 } }"
                         active-class="nav__link-active">
              Diagnostic
            </router-link>
          </li>

          <!-- Log In -->
          <li v-if="!$store.getters.getCurrentUser">
            <router-link :to="{ name: 'auth.login' }"
                         active-class="nav__link-active"
                         exact>
              Sign in
            </router-link>
          </li>

          <!-- Admin -->
          <li v-if="userIsAdmin">
            <router-link :to="{ name: 'admin' }"
                         active-class="nav__link-active">
              Admin
            </router-link>
          </li>

          <!-- Log Out -->
          <li v-if="$store.getters.getCurrentUser">
            <a @click="logout">Sign out</a>
          </li>
        </ul>
      </div>
    </template>
  </nav>
</template>

<script>
  import { userIsAdmin } from '../../mixins/user'

  export default {
    mixins: [
      userIsAdmin
    ],
    methods: {
      logout() {
        this.$store.dispatch('logout')
          .then(() => {
            this.$toasted.global.info({
              message: `You've been signed out successfully.`
            })
            this.$router.push({ name: 'home' })
          })
          .catch(() => this.$toasted.global.danger())
      }
    }
  }
</script>