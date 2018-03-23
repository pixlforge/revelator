<template>
  <button class="btn__continue btn__continue--back"
          v-text="label"
          @click="previousQuestion">
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
      previousQuestion() {
        if (!this.disabled) {
          this.$emit('previousQuestion')
        }
      }
    }
  }
</script>