<template>
  <button
    :class="classes"
    role="button"
    @click="nextQuestion"
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
    ...mapGetters(["getCurrentQuestion", "getQuestions"]),
    classes() {
      if (!this.disabled) {
        return "btn__control btn__control--continue-active";
      } else {
        return "btn__control btn__control--continue";
      }
    }
  },
  methods: {
    nextQuestion() {
      if (!this.disabled) {
        if (this.getCurrentQuestion + 1 === this.getQuestions.length) {
          this.$router.push({ name: "last-step" });
        }
        this.$emit("nextQuestion");
      }
    }
  }
};
</script>