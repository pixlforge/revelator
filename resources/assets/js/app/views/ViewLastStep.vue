<template>
  <div>
    <main class="main__container main__container--medium"
          @keyup.enter="saveAndContinue">
      <h1 class="main__title">One Last Step!</h1>

      <p class="main__lead">
        In order to send you a personalised offer, we would like to know more about you and send you some recommendations.
      </p>

      <!-- Radio Buttons -->
      <div class="radio__group">
        <AppRadioButton option="yes"
                        :selected="radioSelect === 'yes'"
                        @radioSelect="radioSelection">
          <p>Yes I agree to share my information.</p>
        </AppRadioButton>

        <AppRadioButton option="no"
                        :selected="radioSelect === 'no'"
                        @radioSelect="radioSelection">
          <p>No, I just want to see my results and stay anonymous.</p>
        </AppRadioButton>
      </div>

      <!-- Personal Infos Inputs -->
      <transition name="fade" mode="out-in">
        <div v-if="radioSelect === 'yes'">

          <div class="form__group form__group--last-step">

            <!-- First Name -->
            <input type="text"
                   name="first_name"
                   id="first_name"
                   class="form__input form__input--inline form__input--small"
                   :class="{ 'form__input--invalid': errors.first_name }"
                   @input="$v.guest.first_name.$touch()"
                   v-model="guest.first_name"
                   placeholder="First name"
                   required autocomplete="off">
            <AppTooltip v-if="$v.guest.first_name.$error"
                        :pos-x="35">
              <p v-if="!$v.guest.first_name.required">Please, provide your first name.</p>
              <p v-if="!$v.guest.first_name.minLength">Minimum 2 characters.</p>
              <p v-if="!$v.guest.first_name.maxLength">Maximum 255 characters.</p>
            </AppTooltip>
            <AppFeedback>
              <p v-if="errors.first_name">{{ errors.first_name[0] }}</p>
            </AppFeedback>

            <!-- Last Name -->
            <input type="text"
                   name="last_name"
                   id="last_name"
                   class="form__input form__input--inline form__input--small"
                   :class="{ 'form__input--invalid': errors.last_name }"
                   @input="$v.guest.last_name.$touch()"
                   v-model="guest.last_name"
                   placeholder="Last name"
                   required autocomplete="off">
            <AppTooltip v-if="$v.guest.last_name.$error"
                        :pos-x="75">
              <p v-if="!$v.guest.last_name.required">Please, provide your last name.</p>
              <p v-if="!$v.guest.last_name.minLength">Minimum 2 characters.</p>
              <p v-if="!$v.guest.last_name.maxLength">Maximum 255 characters.</p>
            </AppTooltip>
            <AppFeedback>
              <p v-if="errors.last_name">{{ errors.last_name[0] }}</p>
            </AppFeedback>
          </div>

          <!-- Guest Email -->
          <div class="form__group">
            <input type="email"
                   name="guest_email"
                   id="guest_email"
                   class="form__input form__input--small"
                   :class="{ 'form__input--invalid': errors.guest_email }"
                   @input="$v.guest.guest_email.$touch()"
                   v-model="guest.guest_email"
                   placeholder="Email"
                   required autocomplete="off">
            <AppTooltip v-if="$v.guest.guest_email.$error"
                        :pos-x="40">
              <p v-if="!$v.guest.guest_email.required">Please, provide a valid email address.</p>
              <p v-if="!$v.guest.guest_email.email">Email format must have the 'address@email.tld' pattern.</p>
            </AppTooltip>
            <AppFeedback>
              <p v-if="errors.guest_email">{{ errors.guest_email[0] }}</p>
            </AppFeedback>
          </div>

        </div>
      </transition>

      <!-- Button Continue -->
      <button class="btn__control btn__control--continue"
              v-text="'Continue'"
              @click="saveAndContinue">
      </button>
    </main>
  </div>
</template>

<script>
  import AppContinue from '../components/buttons/AppContinue'
  import AppTooltip from '../components/forms/AppTooltip'
  import AppFeedback from '../components/forms/AppFeedback'
  import AppRadioButton from '../components/buttons/AppRadioButton'
  import {
    required,
    email,
    minLength,
    maxLength
  } from 'vuelidate/lib/validators'

  export default {
    components: {
      AppContinue,
      AppRadioButton,
      AppTooltip,
      AppFeedback
    },
    data() {
      return {
        radioSelect: '',
        guest: {
          first_name: '',
          last_name: '',
          guest_email: ''
        },
        old: {
          first_name: '',
          last_name: '',
          guest_email: ''
        },
        errors: {}
      }
    },
    validations: {
      guest: {
        first_name: {
          required,
          minLength: minLength(2),
          maxLength: maxLength(255)
        },
        last_name: {
          required,
          minLength: minLength(2),
          maxLength: maxLength(255)
        },
        guest_email: {
          required,
          email
        }
      }
    },
    computed: {
      /**
       * User agrees to send personal infos and to be contacted.
       */
      userAgrees() {
        return this.radioSelect === 'yes'
      },

      /**
       * User does not agree to send personal infos and to be contacted.
       */
      userDoesNotAgree() {
        return this.radioSelect === 'no'
      }
    },
    methods: {
      /**
       * Save the user's personal infos if he agrees, then route to the results views.
       */
      saveAndContinue() {
        if (this.userAgrees) {
          this.updateGuestInfos()
        } else if (this.userDoesNotAgree) {
          this.goToResults()
        }
      },

      /**
       * Go to the results view.
       */
      goToResults() {
        this.$router.push({ name: 'results' })
      },

      /**
       * Update the guest's infos.
       */
      updateGuestInfos() {
        this.$store.dispatch('updateGuestInfos', this.guest).then(() => {
          this.$toasted.global.success({
            message: `Infos saved successfully! Thank you for your participation!`
          })
          this.goToResults()
        }).catch(err => {
          this.$toasted.global.danger()
          this.errors = err.response.data.errors
        })
      },

      /**
       * Set the radio button selected state.
       */
      radioSelection(selection) {
        this.radioSelect = selection
      }
    }
  }
</script>
