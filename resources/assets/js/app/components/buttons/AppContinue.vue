<template>
  <button class="btn__control btn__control--continue"
          v-text="label"
          @click="nextQuestion">
  </button>
</template>

<script>
  import { mapGetters } from 'vuex'

  export default {
    props: {
      label: {
        type: String,
        required: true
      },
      disabled: {
        type: Boolean,
        required: true
      }
    },
    computed: {
      ...mapGetters([
        'getCurrentQuestion',
        'getQuestions'
      ])
    },
    methods: {
      nextQuestion() {
        if (!this.disabled) {
          if (this.getCurrentQuestion + 1 === this.getQuestions.length) {
            this.$router.push({ name: 'last-step' })
          }
          this.$emit('nextQuestion')
        }
      }
    }
  }
</script>