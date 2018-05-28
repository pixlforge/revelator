<template>
  <main
    class="auth__container"
    @keyup.enter="submit">
    <div>
      <div class="auth__title-box">
        <router-link
          :to="{ name: 'auth.login' }"
          tag="a"
          class="auth__back">
          <i class="fas fa-arrow-left"/>
        </router-link>

        <h1 class="auth__title">Request Password Reset Link</h1>
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
          :pos-x="40">
          <p v-if="!$v.user.email.required">Please, provide a valid email address.</p>
          <p v-if="!$v.user.email.email">Email format must have the 'address@email.tld' pattern.</p>
        </AppTooltip>
        <AppFeedback>
          <p v-if="errors.email">{{ errors.email[0] }}</p>
        </AppFeedback>
      </div>

      <div class="form__group form__group--inline">
        <button
          :disabled="$v.$invalid"
          class="btn btn--primary"
          @click="submit">
          Send Password Reset Link
        </button>
      </div>
    </div>
  </main>
</template>

<script>
import AppTooltip from "../../../components/forms/AppTooltip";
import AppFeedback from "../../../components/forms/AppFeedback";
import { required, email } from "vuelidate/lib/validators";

export default {
  components: {
    AppTooltip,
    AppFeedback
  },
  data() {
    return {
      user: {
        email: ""
      },
      old: {
        email: ""
      },
      errors: {}
    };
  },
  validations: {
    user: {
      email: {
        required,
        email
      }
    }
  },
  watch: {
    "user.email"() {
      if (this.user.email !== this.old.email) {
        this.errors = {};
      }
    }
  },
  methods: {
    submit() {
      if (!this.$v.$invalid) {
        this.$store.dispatch("toggleLoader");
        window.axios
          .post(window.route("password.email"), this.user)
          .then(() => {
            this.$store.dispatch("toggleLoader");
            this.$toasted.global.success({
              message: `We've sent you an email containing your password reset link!`
            });
            this.$router.push({ name: "home" });
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