<template>
  <main class="main__container main__container--admin-with-form"
        @keyup.enter="submit">
    <div class="main__title-group">
      <!-- Back Button -->
      <router-link :to="{ name: 'admin.users.index' }"
                   tag="a"
                   class="main__back">
        <i class="fas fa-arrow-left"></i>
      </router-link>

      <!-- Title -->
      <h1 class="main__title">Edit user</h1>
    </div>

    <!-- Name -->
    <div class="form__group">
      <label for="name" class="form__label">Name</label>
      <input type="text"
             name="name"
             id="name"
             class="form__input"
             :class="{ 'form__input--invalid': errors.name }"
             @input="$v.user.name.$touch()"
             v-model="user.name"
             required autofocus autocomplete="off">
      <AppTooltip v-if="$v.user.name.$error"
                  :pos-x="35">
        <p v-if="!$v.user.name.required">Please, provide a name for the user.</p>
        <p v-if="!$v.user.name.minLength">Minimum 3 characters.</p>
        <p v-if="!$v.user.name.maxLength">Maximum 255 characters.</p>
      </AppTooltip>
      <AppFeedback>
        <p v-if="errors.name">{{ errors.name[0] }}</p>
      </AppFeedback>
    </div>

    <!-- Email -->
    <div class="form__group">
      <label for="email" class="form__label">Email</label>
      <input type="email"
             name="email"
             id="email"
             class="form__input"
             :class="{ 'form__input--invalid': errors.email }"
             @input="$v.user.email.$touch()"
             v-model="user.email"
             required autocomplete="off">
      <AppTooltip v-if="$v.user.email.$error"
                  :pos-x="40">
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
      <input :type="passwordFieldType"
             name="password"
             id="password"
             class="form__input"
             :class="{ 'form__input--invalid': errors.password }"
             @input="$v.user.password.$touch()"
             v-model="user.password"
             required>
      <AppPasswordToggler/>
      <AppTooltip v-if="$v.user.password.$error"
                  :pos-x="45">
        <p v-if="!$v.user.password.required">Please, provide a password.</p>
        <p v-if="!$v.user.password.minLength">Minimum 6 characters.</p>
        <p v-if="!$v.user.password.maxLength">Maximum 255 characters.</p>
      </AppTooltip>
      <AppFeedback>
        <p v-if="errors.password">{{ errors.password[0] }}</p>
      </AppFeedback>
    </div>

    <!-- Password Confirmation -->
    <div class="form__group">
      <label for="password_confirmation" class="form__label">Password Confirmation</label>
      <input :type="passwordFieldType"
             name="password_confirmation"
             id="password_confirmation"
             class="form__input"
             :class="{ 'form__input--invalid': errors.password }"
             @input="$v.user.password_confirmation.$touch()"
             v-model="user.password_confirmation"
             required>
      <AppPasswordToggler/>
      <AppTooltip v-if="$v.user.password_confirmation.$error"
                  :pos-x="40">
        <p v-if="!$v.user.password_confirmation.required">Please, provide a confirmation to the password.</p>
        <p v-if="!$v.user.password_confirmation.minLength">Minimum 6 characters.</p>
        <p v-if="!$v.user.password_confirmation.maxLength">Maximum 255 characters.</p>
        <p v-if="!$v.user.password_confirmation.sameAs">The passwords must match.</p>
      </AppTooltip>
    </div>

    <!-- Role -->
    <div class="form__group">
      <label for="role" class="form__label">Role</label>
      <AppSelect id="role"
                 name="role"
                 :options="options"
                 v-model="user.role"/>
      <AppTooltip v-if="$v.user.role.value.$error"
                  :pos-x="55">
        <p v-if="!$v.user.role.value.required">Please, select a role for this user.</p>
      </AppTooltip>
      <AppFeedback>
        <p v-if="errors.role">{{ errors.role[0] }}</p>
      </AppFeedback>
    </div>

    <div class="form__group">
      
      <!-- Submit -->
      <button class="btn btn--primary"
              :disabled="$v.$invalid"
              @click="submit">
        <i class="fas fa-check"></i>
        Update
      </button>
    </div>
  </main>
</template>

<script>
  import AppTooltip from '../../../components/forms/AppTooltip'
  import AppFeedback from '../../../components/forms/AppFeedback'
  import AppSelect from '../../../components/forms/AppSelect'
  import AppPasswordToggler from '../../../components/forms/AppPasswordToggler'
  import { mapGetters } from 'vuex'
  import { admin } from '../../../mixins/middleware'
  import {
    required,
    email,
    minLength,
    maxLength,
    sameAs,
    requiredIf
  } from 'vuelidate/lib/validators'

  export default {
    components: {
      AppTooltip,
      AppFeedback,
      AppSelect,
      AppPasswordToggler
    },
    mixins: [admin],
    data() {
      return {
        user: {
          name: '',
          email: '',
          password: '',
          password_confirmation: '',
          role: {
            label: 'Select a role',
            value: ''
          }
        },
        old: {
          name: '',
          email: '',
          password: '',
          password_confirmation: '',
          role: {
            label: 'Select a role',
            value: ''
          }
        },
        errors: {},
        options: [
          { label: 'User', value: 'user' },
          { label: 'Administrator', value: 'admin' }
        ]
      }
    },
    validations: {
      user: {
        name: {
          required,
          minLength: minLength(3),
          maxLength: maxLength(255)
        },
        email: {
          required,
          email
        },
        password: {
          required: requiredIf('password_confirmation'),
          minLength: minLength(6),
          maxLength: maxLength(255)
        },
        password_confirmation: {
          required: requiredIf('password'),
          minLength: minLength(6),
          maxLength: maxLength(255),
          sameAs: sameAs('password')
        },
        role: {
          value: {
            required
          }
        }
      }
    },
    computed: {
      ...mapGetters([
        'passwordFieldType'
      ])
    },
    watch: {
      'user.name'() {
        if (this.user.name !== this.old.name) {
          this.errors = {}
        }
      },

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

      'user.role'() {
        if (this.user.role !== this.old.role) {
          this.errors = {}
        }
      },
    },
    mounted() {
      /**
       * Get the user passed in params and populate the fields accordingly.
       */
      this.$store.dispatch('getUser', this.$route.params.id).then(res => {
        this.user.id = res.id
        this.user.name = res.name
        this.user.email = res.email
        this.user.role.value = res.role
        if (res.role === 'user') {
          this.user.role.label = 'User'
        } else if (res.role === 'admin') {
          this.user.role.label = 'Administrator'
        }
      }).catch(err => {
        this.errors = err.response.data.errors
      })
    },
    methods: {
      /**
       * Submit the form and update the user.
       */
      submit() {
        if (!this.$v.$invalid) {
          this.$store.dispatch('updateUser', {
            id: this.user.id,
            name: this.user.name,
            email: this.user.email,
            password: this.user.password,
            password_confirmation: this.user.password_confirmation,
            role: this.user.role.value
          }).then(res => {
            this.$toasted.global.success({
              message: `User ${res.name} updated successfully!`
            })
            this.$router.push({ name: 'admin.users.index' })
          }).catch(err => {
            this.$toasted.global.danger()
            this.errors = err.response.data.errors
          })
        }
      }
    }
  }
</script>