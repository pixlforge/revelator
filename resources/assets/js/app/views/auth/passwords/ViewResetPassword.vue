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

        <h1 class="auth__title">Reset Password</h1>
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
          <p v-if="!$v.user.password.required">Please, provide the new password.</p>
        </AppTooltip>
      </div>

      <div class="form__group">
        <label
          for="password"
          class="form__label">
          Password Confirmation
        </label>
        <input
          id="password_confirmation"
          v-model="user.password_confirmation"
          :class="{ 'form__input--invalid': errors.email }"
          type="password"
          name="password_confirmation"
          class="form__input"
          required
          @input="$v.user.password_confirmation.$touch()">
        <AppTooltip
          v-if="$v.user.password_confirmation.$error"
          :pos-x="55">
          <p v-if="!$v.user.password_confirmation.required">Please, type the new password once again.</p>
          <p v-if="!$v.user.password_confirmation.sameAs">The passwords must match.</p>
        </AppTooltip>
      </div>

      <div class="form__group form__group--inline">
        <button
          :disabled="$v.$invalid"
          class="btn btn--primary"
          @click="submit">
          Reset my password
        </button>
      </div>
    </div>
  </main>
</template>

<script>
import AppTooltip from "../../../components/forms/AppTooltip";
import AppFeedback from "../../../components/forms/AppFeedback";
import { required, email, sameAs } from "vuelidate/lib/validators";

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
        password_confirmation: "",
        token: this.$route.params.token
      },
      old: {
        email: "",
        password: "",
        password_confirmation: ""
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
      },
      password_confirmation: {
        required,
        sameAs: sameAs("password")
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
    },
    "user.password_confirmation"() {
      if (this.user.password_confirmation !== this.old.password_confirmation) {
        this.errors = {};
      }
    }
  },
  methods: {
    submit() {
      if (!this.$v.$invalid) {
        this.$store.dispatch("toggleLoader");
        window.axios
          .post("/password/reset", this.user)
          .then(res => {
            window.currentUser = res.data;
            this.$store.dispatch("hydrateCurrentUser", res.data);
            this.$store.dispatch("toggleLoader");
            this.$toasted.global.success({
              message: `Your account's password has been reset!`
            });
            this.$toasted.global.info({
              message: `Connected as ${res.data.name}`
            });
            if (res.data.role === "user") {
              this.$router.push({ name: "home" });
            } else if (res.data.role === "admin" || res.data.role === "dev") {
              this.$router.push({ name: "admin.dashboard" });
            }
          })
          .catch(err => {
            this.$store.dispatch("toggleLoader");
            this.$toasted.global.danger();
            this.errors = err.response.data.errors;
          });
      }
    }
  }
};
</script>