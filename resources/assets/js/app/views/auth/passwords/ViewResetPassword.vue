<template>
  <main class="auth__container" @keyup.enter="submit">

    <!-- Back Button -->
    <router-link :to="{ name: 'home' }"
                 tag="a"
                 class="auth__back">
      <i class="fas fa-arrow-left"></i>
    </router-link>

    <!-- Title -->
    <h1 class="auth__title">
      Reset Password
    </h1>

    <!-- Email -->
    <div class="form__group">
      <label for="email" class="form__label">Email address</label>
      <input type="email"
             name="email"
             id="email"
             class="form__input"
             :class="{ 'form__input--invalid': errors.email }"
             @input="$v.user.email.$touch()"
             v-model="user.email"
             required autofocus autocomplete="off">
      <AppTooltip v-if="$v.user.email.$error"
                  :pos-x="35">
        <p v-if="!$v.user.email.required">Please, provide a valid email address.</p>
        <p v-if="!$v.user.email.email">Email format must have the 'address@email.tld' pattern.</p>
      </AppTooltip>
      <AppFeedback>
        <p v-if="errors.email">{{ errors.email[0] }}</p>
      </AppFeedback>
    </div>

    <!-- Password -->
    <div class="form__group">
      <label for="password" class="form__label">Password</label>
      <input type="password"
             name="password"
             id="password"
             class="form__input"
             :class="{ 'form__input--invalid': errors.email }"
             @input="$v.user.password.$touch()"
             v-model="user.password"
             required>
      <AppTooltip v-if="$v.user.password.$error"
                  :pos-x="45">
        <p v-if="!$v.user.password.required">Please, provide the new password.</p>
      </AppTooltip>
    </div>

    <!-- Password Confirmation -->
    <div class="form__group">
      <label for="password" class="form__label">Password Confirmation</label>
      <input type="password"
             name="password_confirmation"
             id="password_confirmation"
             class="form__input"
             :class="{ 'form__input--invalid': errors.email }"
             @input="$v.user.password_confirmation.$touch()"
             v-model="user.password_confirmation"
             required>
      <AppTooltip v-if="$v.user.password_confirmation.$error"
                  :pos-x="55">
        <p v-if="!$v.user.password_confirmation.required">Please, type the new password once again.</p>
        <p v-if="!$v.user.password_confirmation.sameAs">The passwords must match.</p>
      </AppTooltip>
    </div>

    <div class="form__group form__group--inline">
      
      <!-- Submit -->
      <button class="btn btn--primary"
              :disabled="$v.$invalid"
              @click="submit">
        Reset my password
      </button>
    </div>
  </main>
</template>

<script>
  import AppTooltip from '../../../components/forms/AppTooltip'
  import AppFeedback from '../../../components/forms/AppFeedback'
  import { required, email, sameAs } from 'vuelidate/lib/validators'

  export default {
    components: {
      AppTooltip,
      AppFeedback
    },
    data() {
      return {
        user: {
          email: '',
          password: '',
          password_confirmation: '',
          token: this.$route.params.token
        },
        old: {
          email: '',
          password: '',
          password_confirmation: ''
        },
        errors: {}
      }
    },
    validations: {
      user: {
        email: {
          required,
          email
        },
        password: {
          required
        },
        password_confirmation: {
          required,
          sameAs: sameAs('password')
        }
      }
    },
    watch: {
      'user.email'() {
        if (this.user.email !== this.old.email) {
          this.errors = {}
        }
      },

      'user.password'() {
        if (this.user.password !== this.old.password) {
          this.errors = {}
        }
      },

      'user.password_confirmation'() {
        if (this.user.password_confirmation !== this.old.password_confirmation) {
          this.errors = {}
        }
      },
    },
    methods: {
      submit() {
        if (!this.$v.$invalid) {
          this.$store.dispatch('toggleLoader')
          axios.post('/password/reset', this.user).then(res => {
            window.currentUser = res.data
            this.$store.dispatch('hydrateCurrentUser', res.data)
            this.$store.dispatch('toggleLoader')
            this.$toasted.global.success({
              message: `Your account's password has been reset!`
            })
            this.$toasted.global.info({
              message: `Connected as ${res.data.name}`
            })
            if (res.data.role === 'user') {
              this.$router.push({ name: 'home' })
            } else if (res.data.role === 'admin' || res.data.role === 'dev') {
              this.$router.push({ name: 'admin.dashboard' })
            }
          }).catch(err => {
            this.$store.dispatch('toggleLoader')
            this.$toasted.global.danger()
            this.errors = err.response.data.errors
          })
        }
      }
    }
  }
</script>