<template>
  <div>
    <a class="btn__big"
       v-text="label"
       @click="nextQuestion">
    </a>
  </div>
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