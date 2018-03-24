<template>
  <main class="main__container main__container--medium"
        @keyup.enter="submit">

    <!-- Back Button -->
    <router-link :to="{ name: 'admin.questions.index' }"
                 tag="a"
                 class="main__back">
      <i class="fas fa-arrow-left"></i>
    </router-link>

    <!-- Title -->
    <h1 class="main__title">Add question</h1>

    <!-- Name -->
    <div class="form__group">
      <label for="name" class="form__label">Name</label>
      <input type="text"
             name="name"
             id="name"
             class="form__input"
             :class="{ 'form__input--invalid': errors.name }"
             @input="$v.question.name.$touch()"
             v-model="question.name"
             required autofocus autocomplete="off">
      <AppTooltip v-if="$v.question.name.$error"
                  :pos-x="35">
        <p v-if="!$v.question.name.required">Please, provide a name for the question.</p>
        <p v-if="!$v.question.name.minLength">Minimum 3 characters.</p>
        <p v-if="!$v.question.name.maxLength">Maximum 255 characters.</p>
      </AppTooltip>
      <AppFeedback>
        <p v-if="errors.name">{{ errors.name[0] }}</p>
      </AppFeedback>
    </div>

    <!-- Type -->
    <div class="form__group">
      <label for="type" class="form__label">Type</label>
      <AppSelect id="type"
                 name="type"
                 :options="options"
                 v-model="question.type"/>
      <AppTooltip v-if="$v.question.type.value.$error"
                  :pos-x="45">
        <p v-if="!$v.question.type.value.required">Please, select a role for this question.</p>
      </AppTooltip>
      <AppFeedback>
        <p v-if="errors.type">{{ errors.type[0] }}</p>
      </AppFeedback>
    </div>

    <!-- Position -->
    <div class="form__group">
      <label for="pos" class="form__label">Position</label>
      <input type="number"
             name="pos"
             id="pos"
             class="form__input"
             :class="{ 'form__input--invalid': errors.pos }"
             @input="$v.question.pos.$touch()"
             v-model.number="question.pos"
             required>
      <AppTooltip v-if="$v.question.pos.$error"
                  :pos-x="55">
        <p v-if="!$v.question.pos.required">Please, provide a value.</p>
        <p v-if="!$v.question.pos.minValue">Minimum position is 0.</p>
        <p v-if="!$v.question.pos.maxValue">Maximum position is 999.</p>
      </AppTooltip>
      <AppFeedback>
        <p v-if="errors.pos">{{ errors.pos[0] }}</p>
      </AppFeedback>
    </div>

    <div class="form__group">
      
      <!-- Submit -->
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
  import AppSelect from '../../../components/forms/AppSelect'
  import { admin } from '../../../mixins/middleware'
  import {
    required,
    minLength,
    maxLength,
    minValue,
    maxValue
  } from 'vuelidate/lib/validators'

  export default {
    components: {
      AppTooltip,
      AppFeedback,
      AppSelect
    },
    mixins: [admin],
    data() {
      return {
        question: {
          name: '',
          type: {
            label: 'Select a type',
            value: ''
          },
          pos: ''
        },
        old: {
          name: '',
          type: {
            label: 'Select a type',
            value: ''
          },
          pos: ''
        },
        errors: {},
        options: [
          { label: 'Dropdown', value: 'dropdown' },
          { label: 'Multiple', value: 'multiple' },
          { label: 'Infos', value: 'infos' },
        ]
      }
    },
    validations: {
      question: {
        name: {
          required,
          minLength: minLength(3),
          maxLength: maxLength(255)
        },
        type: {
          value: {
            required
          }
        },
        pos: {
          required,
          minValue: minValue(0),
          maxValue: maxValue(999)
        }
      }
    },
    watch: {
      'question.name'() {
        if (this.question.name !== this.old.name) {
          this.errors = {}
        }
      },

      'question.type'() {
        if (this.question.type !== this.old.type) {
          this.errors = {}
        }
      },

      'question.pos'() {
        if (this.question.pos !== this.old.pos) {
          this.errors = {}
        }
      },
    },
    methods: {
      submit() {
        if (!this.$v.$invalid) {
          this.$store.dispatch('addQuestion', {
            name: this.question.name,
            type: this.question.type.value,
            pos: this.question.pos
          }).then(() => {
            this.$toasted.global.success({
              message: `Question added successfully!`
            })
            this.$router.push({ name: 'admin.questions.index'})
          }).catch(() => {
            this.$toasted.global.danger()
            this.errors = err.response.data.errors
          })
        }
      }
    }
  }
</script>