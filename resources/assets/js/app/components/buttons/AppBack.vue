<template>
  <button
    role="button"
    class="btn__control btn__control--back"
    @click="previousQuestion"
    v-text="label"/>
</template>

<script>
import { mapGetters } from "vuex";

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
    ...mapGetters(["getCurrentQuestion", "getQuestions"])
  },
  methods: {
    previousQuestion() {
      if (!this.disabled) {
        this.$emit("previousQuestion");
      }
    }
  }
};
</script>