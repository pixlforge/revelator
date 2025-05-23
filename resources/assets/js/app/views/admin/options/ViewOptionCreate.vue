<template>
  <main
    class="main__container main__container--admin-with-form"
    @keyup.enter="submit">
    <div class="main__title-group">
      <router-link
        :to="{ name: 'admin.options.index' }"
        tag="a"
        class="main__back">
        <i class="fas fa-arrow-left"/>
      </router-link>

      <h1 class="main__title">Add option</h1>
    </div>

    <div class="form__group">
      <label
        for="name"
        class="form__label">
        Name
      </label>
      <input
        id="name"
        v-model="option.name"
        :class="{ 'form__input--invalid': errors.name }"
        type="text"
        name="name"
        class="form__input"
        required
        autofocus
        autocomplete="off"
        @input="$v.option.name.$touch()">
      <AppTooltip
        v-if="$v.option.name.$error"
        :pos-x="35">
        <p v-if="!$v.option.name.required">Please, provide a name for the option.</p>
        <p v-if="!$v.option.name.minLength">Minimum 2 characters.</p>
        <p v-if="!$v.option.name.maxLength">Maximum 255 characters.</p>
      </AppTooltip>
      <AppFeedback>
        <p v-if="errors.name">{{ errors.name[0] }}</p>
      </AppFeedback>
    </div>

    <div class="form__group">
      <label
        for="pos"
        class="form__label">
        Position
      </label>
      <input
        id="pos"
        v-model="option.pos"
        :class="{ 'form__input--invalid': errors.pos }"
        type="number"
        name="pos"
        class="form__input"
        @input="$v.option.pos.$touch()">
      <AppTooltip
        v-if="$v.option.pos.$error"
        :pos-x="45">
        <p v-if="!$v.option.pos.minValue">Minimum value 0.</p>
        <p v-if="!$v.option.pos.maxValue">Maximum value 999.</p>
      </AppTooltip>
      <AppFeedback>
        <p v-if="errors.pos">{{ errors.pos[0] }}</p>
      </AppFeedback>
    </div>

    <div class="form__group">
      <label
        for="question_id"
        class="form__label">
        Related question
      </label>
      <AppSelect
        id="question_id"
        v-model="option.question_id"
        :options="questions"
        name="question_id"/>
      <AppTooltip
        v-if="$v.option.question_id.value.$error"
        :pos-x="55">
        <p v-if="!$v.option.question_id.value.required">Please, select a question for this option.</p>
      </AppTooltip>
      <AppFeedback>
        <p v-if="errors.question_id">{{ errors.question_id[0] }}</p>
      </AppFeedback>
    </div>

    <template v-if="showPrograms">
      <div
        v-for="(program, index) in getPrograms"
        :key="program.id"
        class="form__group">
        <label
          :for="'program_'.concat(program.id)"
          class="form__label"
          v-text="program.title.concat(' program value')"/>
        <AppSelect
          :id="'program_'.concat(program.id)"
          v-model="option.programs[index].value"
          :name="'program_'.concat(program.id)"
          :options="programOptions"/>
      </div>
    </template>

    <div class="form__group">
      <button
        :disabled="$v.$invalid"
        role="button"
        class="btn btn--primary"
        @click="submit">
        <i class="fas fa-check"/>
        Add
      </button>
    </div>
  </main>
</template>

<script>
import AppTooltip from "../../../components/forms/AppTooltip";
import AppFeedback from "../../../components/forms/AppFeedback";
import AppSelect from "../../../components/forms/AppSelect";
import { admin } from "../../../mixins/middleware";
import { mapGetters } from "vuex";
import {
  required,
  minLength,
  maxLength,
  minValue,
  maxValue
} from "vuelidate/lib/validators";

export default {
  components: {
    AppTooltip,
    AppFeedback,
    AppSelect
  },
  mixins: [admin],
  data() {
    return {
      option: {
        name: "",
        pos: "",
        question_id: {
          label: "Select a question",
          value: ""
        },
        programs: []
      },
      old: {
        name: "",
        pos: "",
        question_id: {
          label: "Select a question",
          value: ""
        }
      },
      errors: {},
      questions: [],
      programOptions: [
        { label: "0", value: 0 },
        { label: "1", value: 1 },
        { label: "2", value: 2 },
        { label: "3", value: 3 }
      ],
      showPrograms: false
    };
  },
  validations: {
    option: {
      name: {
        required,
        minLength: minLength(2),
        maxLength: maxLength(255)
      },
      pos: {
        minValue: minValue(0),
        maxValue: maxValue(999)
      },
      question_id: {
        value: {
          required
        }
      }
    }
  },
  computed: {
    ...mapGetters(["getQuestions", "getPrograms"])
  },
  watch: {
    "option.name"() {
      if (this.option.name !== this.old.name) {
        this.errors = {};
      }
    },

    "option.pos"() {
      if (this.option.pos !== this.old.pos) {
        this.errors = {};
      }
    },

    "option.question_id"() {
      if (this.option.question_id !== this.old.question_id) {
        this.errors = {};
      }
    }
  },
  created() {
    this.$store.dispatch("toggleLoader");
    /**
     * Fetch all programs.
     */
    const fetchPrograms = this.$store
      .dispatch("fetchPrograms")
      .then(res => {
        res.forEach(program => {
          this.option.programs.push({
            id: program.id,
            label: program.title,
            value: {
              label: "Select a value",
              value: 0
            }
          });
        });
      })
      .then(() => {
        this.showPrograms = true;
      });
    /**
     * Fetch all questions and push them to the options array.
     */
    const fetchQuestions = this.$store.dispatch("fetchQuestions").then(res => {
      res.forEach(question => {
        this.questions.push({
          label: question.name,
          value: question.id
        });
      });
    });
    /**
     * Resolve all promises and turn off the loader once it's done.
     */
    Promise.all([fetchPrograms, fetchQuestions]).then(() => {
      this.$store.dispatch("toggleLoader");
    });
  },
  methods: {
    submit() {
      if (!this.$v.$invalid) {
        this.$store
          .dispatch("addOption", {
            name: this.option.name,
            pos: this.option.pos,
            question_id: this.option.question_id.value,
            programs: this.option.programs
          })
          .then(() => {
            this.$toasted.global.success({
              message: `Option added successfully!`
            });
            this.$router.push({ name: "admin.options.index" });
          })
          .catch(err => {
            this.$toasted.global.danger();
            this.errors = err.response.data.errors;
          });
      }
    }
  }
};
</script>