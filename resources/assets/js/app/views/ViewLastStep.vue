<template>
  <div>
    <main class="main__container main__container--medium"
          @keyup.enter="saveAndContinue">
      <h1 class="main__title">One Last Step!</h1>

      <p class="main__lead">
        In order to send you a personalised offer, we would like to know more about you and send you some recommendations.
      </p>

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

      <transition name="fade" mode="out-in">
        <div v-if="radioSelect === 'yes'">

          <div class="form__group form__group--last-step">

            <!--First Name-->
            <input type="text"
                   name="firstName"
                   id="firstName"
                   class="form__input form__input--inline"
                   :class="{ 'form__input--invalid': errors.firstName }"
                   @input="$v.guest.firstName.$touch()"
                   v-model="guest.firstName"
                   placeholder="First name"
                   required autocomplete="off">
            <AppTooltip v-if="$v.guest.firstName.$error"
                        :pos-x="35">
              <p v-if="!$v.guest.firstName.required">Please, provide your first name.</p>
              <p v-if="!$v.guest.firstName.minLength">Minimum 2 characters.</p>
              <p v-if="!$v.guest.firstName.maxLength">Maximum 255 characters.</p>
            </AppTooltip>
            <AppFeedback>
              <p v-if="errors.firstName">{{ errors.firstName[0] }}</p>
            </AppFeedback>

            <!--Last Name-->
            <input type="text"
                   name="lastName"
                   id="lastName"
                   class="form__input form__input--inline"
                   :class="{ 'form__input--invalid': errors.lastName }"
                   @input="$v.guest.lastName.$touch()"
                   v-model="guest.lastName"
                   placeholder="Last name"
                   required autocomplete="off">
            <AppTooltip v-if="$v.guest.lastName.$error"
                        :pos-x="75">
              <p v-if="!$v.guest.lastName.required">Please, provide your last name.</p>
              <p v-if="!$v.guest.lastName.minLength">Minimum 2 characters.</p>
              <p v-if="!$v.guest.lastName.maxLength">Maximum 255 characters.</p>
            </AppTooltip>
            <AppFeedback>
              <p v-if="errors.lastName">{{ errors.lastName[0] }}</p>
            </AppFeedback>
          </div>

          <!--Guest Email-->
          <div class="form__group">
            <input type="email"
                   name="guestEmail"
                   id="guestEmail"
                   class="form__input"
                   :class="{ 'form__input--invalid': errors.guestEmail }"
                   @input="$v.guest.guestEmail.$touch()"
                   v-model="guest.guestEmail"
                   placeholder="Email"
                   required autocomplete="off">
            <AppTooltip v-if="$v.guest.guestEmail.$error"
                        :pos-x="40">
              <p v-if="!$v.guest.guestEmail.required">Please, provide a valid email address.</p>
              <p v-if="!$v.guest.guestEmail.email">Email format must have the 'address@email.tld' pattern.</p>
            </AppTooltip>
            <AppFeedback>
              <p v-if="errors.guestEmail">{{ errors.guestEmail[0] }}</p>
            </AppFeedback>
          </div>

        </div>
      </transition>

      <!--Button Continue-->
      <button class="btn__continue"
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
          firstName: '',
          lastName: '',
          guestEmail: ''
        },
        old: {
          firstName: '',
          lastName: '',
          guestEmail: ''
        },
        errors: {}
      }
    },
    validations: {
      guest: {
        firstName: {
          required,
          minLength: minLength(2),
          maxLength: maxLength(255)
        },
        lastName: {
          required,
          minLength: minLength(2),
          maxLength: maxLength(255)
        },
        guestEmail: {
          required,
          email
        }
      }
    },
    methods: {
      saveAndContinue() {
        this.$store.dispatch('updateGuestInfos', this.guest)
          .then(() => {
            this.$toasted.global.success({
              message: `Infos saved successfully! Thank you for your participation!`
            })
            // this.$router.push({ name: 'results' })
          })
          .catch(err => {
            this.$toasted.global.danger()
            this.errors = err.response.data.errors
            console.log(err) // tmp
          })
      },

      radioSelection(selection) {
        this.radioSelect = selection
      }
    }
  }
</script>
