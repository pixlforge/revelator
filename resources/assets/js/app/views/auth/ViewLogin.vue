<template>
  <main
    class="auth__container"
    @keyup.enter="submit">
    <div>
      <div class="auth__title-box">
        
        <router-link
          :to="{ name: 'home' }"
          tag="a"
          class="auth__back">
          <i class="fas fa-arrow-left"/>
        </router-link>

        <h1 class="auth__title">Login</h1>
      </div>

      <div class="form__group">
        <label
          for="email"
          class="form__label">
          Email address
        </label>
        <input
          id="email"
          v-model="user.email"
          :class="{ 'form__input--invalid': errors.email }"
          type="email"
          name="email"
          class="form__input"
          required
          autofocus
          autocomplete="off"
          @input="$v.user.email.$touch()">
        <AppTooltip
          v-if="$v.user.email.$error"
          :pos-x="35">
          <p v-if="!$v.user.email.required">Please, provide a valid email address.</p>
          <p v-if="!$v.user.email.email">Email format must have the 'address@email.tld' pattern.</p>
        </AppTooltip>
        <AppFeedback>
          <p v-if="errors.email">{{ errors.email[0] }}</p>
        </AppFeedback>
      </div>

      <div class="form__group">
        <label
          for="password"
          class="form__label">
          Password
        </label>
        <input
          id="password"
          v-model="user.password"
          :class="{ 'form__input--invalid': errors.email }"
          type="password"
          name="password"
          class="form__input"
          required
          @input="$v.user.password.$touch()">
        <AppTooltip
          v-if="$v.user.password.$error"
          :pos-x="45">
          <p v-if="!$v.user.password.required">Please, provide the matching password.</p>
        </AppTooltip>
      </div>

      <input
        v-model="user.remember"
        type="hidden"
        name="remember">

      <div class="form__group form__group--inline">
        <button
          :disabled="$v.$invalid"
          class="btn btn--primary"
          @click="submit">
          Sign In
        </button>

        <router-link
          :to="{ name: 'reset.email' }"
          class="auth__forgotten">
          Forgot Your Password?
        </router-link>
      </div>
    </div>
  </main>
</template>

<script>
import AppTooltip from "../../components/forms/AppTooltip";
import AppFeedback from "../../components/forms/AppFeedback";
import { required, email } from "vuelidate/lib/validators";

export default {
  components: {
    AppTooltip,
    AppFeedback
  },
  data() {
    return {
      user: {
        email: "",
        password: "",
        remember: true
      },
      old: {
        email: "",
        password: ""
      },
      errors: {}
    };
  },
  validations: {
    user: {
      email: {
        required,
        email
      },
      password: {
        required
      }
    }
  },
  watch: {
    "user.email"() {
      if (this.user.email !== this.old.email) {
        this.errors = {};
      }
    },
    "user.password"() {
      if (this.user.password !== this.old.password) {
        this.errors = {};
      }
    }
  },
  methods: {
    submit() {
      if (!this.$v.$invalid) {
        this.$store
          .dispatch("login", this.user)
          .then(res => {
            this.$toasted.global.success({
              message: `Login successful! Connected as ${res.name}`
            });
            if (res.role === "user") {
              this.$router.push({ name: "home" });
            } else if (res.role === "admin" || res.role === "dev") {
              this.$router.push({ name: "admin" });
            }
          })
          .catch(err => {
            this.$toasted.global.danger();
            this.errors = err.response.data.errors;
          });
      }
    }
  }
};
</script>