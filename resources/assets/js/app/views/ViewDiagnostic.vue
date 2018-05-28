<template>
  <div>
    <main class="main__container main__container--medium">

      <!-- Question -->
      <transition
        name="fade-longer"
        mode="out-in">
        <h1
          v-if="getQuestions.length && getShowContentStatus"
          class="main__title main__title--diagnostic"
          v-text="getQuestions[getCurrentQuestion].name"/>
      </transition>

      <!-- Answers -->
      <div v-if="getQuestions.length">
        <div class="form__group">
          <transition
            name="fade-longer"
            mode="out-in">

            <!-- Type Dropdown -->
            <div v-if="typeDropdown">
              <AppDiagnosticSelect
                :options="options"
                :value="selectedOptionLabel"
                @selectedOption="addAnswer"/>
            </div>

            <!-- Type Multiple -->
            <div v-if="typeMultiple">
              <ul class="options__list">
                <li
                  v-for="option in getQuestions[getCurrentQuestion].options"
                  :key="option.id"
                  :class="{ 'options__list-item--active': answerExistsInStore(option) }"
                  class="options__list-item"
                  @click="addAnswer({ label: option.name, value: option.id })"
                  v-text="option.name"/>
              </ul>
            </div>

            <!-- Type Multiple Inline -->
            <div v-if="typeMultipleInline">
              <ul class="options__list-inline">
                <li
                  v-for="option in getQuestions[getCurrentQuestion].options"
                  :key="option.id"
                  :class="{ 'options__list-inline-item--active': answerExistsInStore(option) }"
                  class="options__list-inline-item"
                  @click="addAnswer({ label: option.name, value: option.id })"
                  v-text="option.name"/>
              </ul>
            </div>

          </transition>
        </div>
      </div>

      <AppBack
        :disabled="getCurrentQuestion <= 0"
        label="Back"
        @previousQuestion="previousQuestion"/>

      <AppContinue
        :disabled="buttonDisabled"
        label="Continue"
        @nextQuestion="nextQuestion"/>
    </main>

    <AppPaginator/>
  </div>
</template>

<script>
import AppPaginator from "../components/UI/AppPaginator";
import AppContinue from "../components/buttons/AppContinue";
import AppBack from "../components/buttons/AppBack";
import AppDiagnosticSelect from "../components/forms/AppDiagnosticSelect";
import { mapGetters } from "vuex";

export default {
  components: {
    AppPaginator,
    AppContinue,
    AppBack,
    AppDiagnosticSelect
  },
  data() {
    return {
      answers: [],
      options: []
    };
  },
  computed: {
    /**
     * Map the following getters from the store.
     */
    ...mapGetters([
      "getCurrentQuestion",
      "getCurrentUser",
      "getQuestions",
      "getAnswers",
      "getOptions",
      "getShowContentStatus"
    ]),
    /**
     * Filter questions of type 'dropdown'.
     */
    typeDropdown() {
      return (
        this.getQuestions[this.getCurrentQuestion].type === "dropdown" &&
        this.getShowContentStatus
      );
    },
    /**
     * Filter questions of type 'multiple'.
     */
    typeMultiple() {
      return (
        this.getQuestions[this.getCurrentQuestion].type === "multiple" &&
        this.getShowContentStatus
      );
    },
    /**
     * Filter questions of type 'multiple-inline'.
     */
    typeMultipleInline() {
      return (
        this.getQuestions[this.getCurrentQuestion].type === "multiple-inline" &&
        this.getShowContentStatus
      );
    },
    /**
     * What to display in the select component.
     */
    selectedOptionLabel() {
      if (this.getAnswers[this.getCurrentQuestion]) {
        return {
          label: this.getAnswers[this.getCurrentQuestion].label
        };
      } else {
        return {
          label: "Select"
        };
      }
    },
    /**
     * Continue button is disabled unless an answer has been selected.
     */
    buttonDisabled() {
      return !this.getAnswers[this.getCurrentQuestion];
    }
  },
  created() {
    this.$store.dispatch("toggleLoader");

    const setCurrentQuestion = this.$store.dispatch(
      "setCurrentQuestion",
      parseInt(this.$route.query.question)
    );
    const fetchQuestions = this.$store.dispatch("fetchQuestions");
    const fetchOptions = this.$store.dispatch("fetchOptions");
    const fetchExistingAnswers = this.$store.dispatch("fetchExistingAnswers");

    Promise.all([
      setCurrentQuestion,
      fetchQuestions,
      fetchOptions,
      fetchExistingAnswers
    ])
      .then(() => {
        this.getAnswers.forEach(answer => {
          return (answer.label = this.getOptions.find(option => {
            return answer.option_id === option.id;
          }).name);
        });
      })
      .then(() => {
        this.$store.dispatch("toggleLoader");
        this.getSelectOptions();
      });
  },
  methods: {
    /**
     * Get all questions and format them to be displayed in the select component.
     */
    getSelectOptions() {
      this.getQuestions[this.getCurrentQuestion].options.forEach(option => {
        this.options.push({ label: option.name, value: option.id });
      });
    },
    /**
     * Check whether an answer to the current question is present in the store.
     */
    answerExistsInStore(option) {
      return this.getAnswers.find(answer => {
        return (
          answer.question_id ===
            this.getQuestions[this.getCurrentQuestion].id &&
          answer.option_id === option.id
        );
      });
    },
    /**
     * Add or update an answer.
     */
    addAnswer(data) {
      this.$store.dispatch("addAnswer", {
        user_id: this.getCurrentUser.id,
        question_id: this.getQuestions[this.getCurrentQuestion].id,
        option_id: data.value,
        label: data.label
      });
    },
    /**
     * Continue to the next question.
     */
    nextQuestion() {
      if (this.getCurrentQuestion < this.getQuestions.length - 1) {
        this.$store.dispatch("setShowContentValue", false);
        this.$store.dispatch("incrementCurrentQuestion");
        setTimeout(() => {
          this.$store.dispatch("setShowContentValue", true);
        }, 5);
        this.$router.push({
          query: {
            question: this.getCurrentQuestion,
            name: this.getCurrentUser.name
          }
        });
        this.getSelectOptions();
      }
    },
    /**
     * Go back to the previous question.
     */
    previousQuestion() {
      if (this.getCurrentQuestion > 0) {
        this.$store.dispatch("setShowContentValue", false);
        this.$store.dispatch("decrementCurrentQuestion");
        setTimeout(() => {
          this.$store.dispatch("setShowContentValue", true);
        }, 5);
        this.$router.push({
          query: {
            question: this.getCurrentQuestion,
            name: this.getCurrentUser.name
          }
        });
        this.getSelectOptions();
      }
    }
  }
};
</script>