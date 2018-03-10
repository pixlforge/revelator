<template>
  <main class="main__container main__container--medium"
        @keyup.enter="submit">
    <router-link :to="{ name: 'admin.programs.index' }"
                 tag="a"
                 class="main__back">
      <i class="fas fa-arrow-left"></i>
    </router-link>

    <h1 class="main__title">Add program</h1>

    <!--Title-->
    <div class="form__group">
      <label for="title" class="form__label">Title</label>
      <input type="text"
             name="title"
             id="title"
             class="form__input"
             :class="{ 'form__input--invalid': errors.title }"
             @input="$v.program.title.$touch()"
             v-model="program.title"
             required autofocus autocomplete="off">
      <AppTooltip v-if="$v.program.title.$error"
                  :pos-x="35">
        <p v-if="!$v.program.title.required">Please, provide a title for the program.</p>
        <p v-if="!$v.program.title.minLength">Minimum 3 characters.</p>
        <p v-if="!$v.program.title.maxLength">Maximum 255 characters.</p>
      </AppTooltip>
      <AppFeedback>
        <p v-if="errors.title">{{ errors.title[0] }}</p>
      </AppFeedback>
    </div>

    <!--Code-->
    <div class="form__group">
      <label for="code" class="form__label">Code</label>
      <input type="text"
             name="code"
             id="code"
             class="form__input"
             :class="{ 'form__input--invalid': errors.code }"
             @input="$v.program.code.$touch()"
             v-model="program.code">
      <AppTooltip v-if="$v.program.code.$error"
                  :pos-x="45">
        <p v-if="!$v.program.code.minLength">Minimum 3 characters.</p>
        <p v-if="!$v.program.code.maxLength">Maximum 45 characters.</p>
      </AppTooltip>
      <AppFeedback>
        <p v-if="errors.code">{{ errors.code[0] }}</p>
      </AppFeedback>
    </div>

    <!--Description-->
    <div class="form__group">
      <label for="description" class="form__label">Description</label>
      <input type="text"
             name="description"
             id="description"
             class="form__input"
             :class="{ 'form__input--invalid': errors.description }"
             @input="$v.program.description.$touch()"
             v-model="program.description">
      <AppTooltip v-if="$v.program.description.$error"
                  :pos-x="55">
        <p v-if="!$v.program.description.minLength">Minimum 5 characters.</p>
        <p v-if="!$v.program.description.maxLength">Maximum 3000 characters.</p>
      </AppTooltip>
      <AppFeedback>
        <p v-if="errors.description">{{ errors.description[0] }}</p>
      </AppFeedback>
    </div>

    <div class="form__group">
      <!--Submit-->
      <button class="btn btn--primary"
              :disabled="$v.$invalid"
              @click="submit">
        <i class="fas fa-check"></i>
        Add
      </button>
    </div>

  </main>
</template>

<script>
  import AppTooltip from '../../../components/forms/AppTooltip'
  import AppFeedback from '../../../components/forms/AppFeedback'
  import { admin } from '../../../mixins/middleware'
  import {
    required,
    minLength,
    maxLength
  } from 'vuelidate/lib/validators'

  export default {
    components: {
      AppTooltip,
      AppFeedback
    },
    mixins: [admin],
    data() {
      return {
        program: {
          title: '',
          code: '',
          description: ''
        },
        old: {
          title: '',
          code: '',
          description: ''
        },
        errors: {}
      }
    },
    validations: {
      program: {
        title: {
          required,
          minLength: minLength(3),
          maxLength: maxLength(255)
        },
        code: {
          minLength: minLength(3),
          maxLength: maxLength(45)
        },
        description: {
          minLength: minLength(5),
          maxLength: maxLength(3000)
        }
      }
    },
    watch: {
      'program.title'() {
        if (this.program.title !== this.old.title) {
          this.errors = {}
        }
      },

      'program.code'() {
        if (this.program.code !== this.old.code) {
          this.errors = {}
        }
      },

      'program.description'() {
        if (this.program.description !== this.old.description) {
          this.errors = {}
        }
      },
    },
    methods: {
      submit() {
        if (!this.$v.$invalid) {
          this.$store.dispatch('addProgram', {
            title: this.program.title,
            code: this.program.code,
            description: this.program.description
          }).then(() => {
            this.$toasted.global.success({
              message: `Program added successfully!`
            })
            this.$router.push({ name: 'admin.programs.index'})
          }).catch(() => {
            this.$toasted.global.danger()
            this.errors = err.response.data.errors
          })
        }
      }
    }
  }
</script>