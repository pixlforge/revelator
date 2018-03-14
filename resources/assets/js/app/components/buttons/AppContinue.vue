<template>
  <button class="btn__continue"
          v-text="label"
          @click="nextQuestion">
  </button>
</template>

<script>
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
    methods: {
      nextQuestion() {
        if (!this.disabled) {
          this.$emit('nextQuestion')
        }
      }
    }
  }
</script>