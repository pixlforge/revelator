<template>
  <main
    class="main__container main__container--admin-with-form"
    @keyup.enter="submit">
    <div class="main__title-group">
      <router-link
        :to="{ name: 'admin.questions.index' }"
        tag="a"
        class="main__back">
        <i class="fas fa-arrow-left"/>
      </router-link>

      <h1 class="main__title">Edit question</h1>
    </div>

    <div class="form__group">
      <label
        for="name"
        class="form__label">
        Name
      </label>
      <input
        id="name"
        v-model="question.name"
        :class="{ 'form__input--invalid': errors.name }"
        type="text"
        name="name"
        class="form__input"
        required
        autofocus
        autocomplete="off"
        @input="$v.question.name.$touch()">
      <AppTooltip
        v-if="$v.question.name.$error"
        :pos-x="35">
        <p v-if="!$v.question.name.required">Please, provide a name for the question.</p>
        <p v-if="!$v.question.name.minLength">Minimum 3 characters.</p>
        <p v-if="!$v.question.name.maxLength">Maximum 255 characters.</p>
      </AppTooltip>
      <AppFeedback>
        <p v-if="errors.name">{{ errors.name[0] }}</p>
      </AppFeedback>
    </div>

    <div class="form__group">
      <label
        for="type"
        class="form__label">
        Type
      </label>
      <AppSelect
        id="type"
        v-model="question.type"
        :options="options"
        name="type"/>
      <AppTooltip
        v-if="$v.question.type.value.$error"
        :pos-x="45">
        <p v-if="!$v.question.type.value.required">Please, select a role for this question.</p>
      </AppTooltip>
      <AppFeedback>
        <p v-if="errors.type">{{ errors.type[0] }}</p>
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
        v-model.number="question.pos"
        :class="{ 'form__input--invalid': errors.pos }"
        type="number"
        name="pos"
        class="form__input"
        required
        @input="$v.question.pos.$touch()">
      <AppTooltip
        v-if="$v.question.pos.$error"
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
      <button
        :disabled="$v.$invalid"
        role="button"
        class="btn btn--primary"
        @click="submit">
        <i class="fas fa-check"/>
        Update
      </button>
    </div>
  </main>
</template>

<script>
import AppTooltip from "../../../components/forms/AppTooltip";
import AppFeedback from "../../../components/forms/AppFeedback";
import AppSelect from "../../../components/forms/AppSelect";
import { admin } from "../../../mixins/middleware";
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
      question: {
        id: "",
        name: "",
        type: {
          label: "Select a type",
          value: ""
        },
        pos: ""
      },
      old: {
        id: "",
        name: "",
        type: {
          label: "Select a type",
          value: ""
        },
        pos: ""
      },
      errors: {},
      options: [
        { label: "Dropdown", value: "dropdown" },
        { label: "Multiple", value: "multiple" },
        { label: "Infos", value: "infos" }
      ]
    };
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
    "question.name"() {
      if (this.question.name !== this.old.name) {
        this.errors = {};
      }
    },
    "question.type"() {
      if (this.question.type !== this.old.type) {
        this.errors = {};
      }
    },
    "question.pos"() {
      if (this.question.pos !== this.old.pos) {
        this.errors = {};
      }
    }
  },
  mounted() {
    /**
     * Get the question passed in params and populate the fields accordingly.
     */
    this.$store
      .dispatch("getQuestion", this.$route.params.id)
      .then(res => {
        this.question.id = res.id;
        this.question.name = res.name;
        this.question.type.value = res.type;
        if (res.type === "dropdown") {
          this.question.type.label = "Dropdown";
        } else if (res.type === "multiple") {
          this.question.type.label = "Multiple";
        } else if (res.type === "infos") {
          this.question.type.label = "Infos";
        }
        this.question.pos = res.pos;
      })
      .catch(err => {
        this.errors = err.response.data.errors;
      });
  },
  methods: {
    submit() {
      if (!this.$v.$invalid) {
        this.$store
          .dispatch("updateQuestion", {
            id: this.question.id,
            name: this.question.name,
            type: this.question.type.value,
            pos: this.question.pos
          })
          .then(() => {
            this.$toasted.global.success({
              message: `Question updatd successfully!`
            });
            this.$router.push({ name: "admin.questions.index" });
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