<template>
  <main
    class="main__container main__container--admin-with-form"
    @keyup.enter="submit">
    <div class="main__title-group">
      <router-link
        :to="{ name: 'admin.programs.index' }"
        tag="a"
        class="main__back">
        <i class="fas fa-arrow-left"/>
      </router-link>

      <h1 class="main__title">Add program</h1>
    </div>

    <div class="form__group">
      <label
        for="title"
        class="form__label">
        Title
      </label>
      <input
        id="title"
        v-model="program.title"
        :class="{ 'form__input--invalid': errors.title }"
        type="text"
        name="title"
        class="form__input"
        required
        autofocus
        autocomplete="off"
        @input="$v.program.title.$touch()">
      <AppTooltip
        v-if="$v.program.title.$error"
        :pos-x="35">
        <p v-if="!$v.program.title.required">Please, provide a title for the program.</p>
        <p v-if="!$v.program.title.minLength">Minimum 3 characters.</p>
        <p v-if="!$v.program.title.maxLength">Maximum 255 characters.</p>
      </AppTooltip>
      <AppFeedback>
        <p v-if="errors.title">{{ errors.title[0] }}</p>
      </AppFeedback>
    </div>

    <div class="form__group">
      <label
        for="code"
        class="form__label">
        Code
      </label>
      <input
        id="code"
        v-model="program.code"
        :class="{ 'form__input--invalid': errors.code }"
        type="text"
        name="code"
        class="form__input"
        @input="$v.program.code.$touch()">
      <AppTooltip
        v-if="$v.program.code.$error"
        :pos-x="45">
        <p v-if="!$v.program.code.minLength">Minimum 3 characters.</p>
        <p v-if="!$v.program.code.maxLength">Maximum 45 characters.</p>
      </AppTooltip>
      <AppFeedback>
        <p v-if="errors.code">{{ errors.code[0] }}</p>
      </AppFeedback>
    </div>

    <div class="form__group">
      <label
        for="slogan"
        class="form__label">
        Slogan
      </label>
      <input
        id="slogan"
        v-model="program.slogan"
        :class="{ 'form__input--invalid': errors.slogan }"
        type="text"
        name="slogan"
        class="form__input"
        @input="$v.program.slogan.$touch()">
      <AppTooltip
        v-if="$v.program.slogan.$error"
        :pos-x="65">
        <p v-if="!$v.program.slogan.minLength">Minimum 3 characters.</p>
        <p v-if="!$v.program.slogan.maxLength">Maximum 255 characters.</p>
      </AppTooltip>
      <AppFeedback>
        <p v-if="errors.slogan">{{ errors.slogan[0] }}</p>
      </AppFeedback>
    </div>

    <div class="form__group">
      <label
        for="description"
        class="form__label">
        Description
      </label>
      <input
        id="description"
        v-model="program.description"
        :class="{ 'form__input--invalid': errors.description }"
        type="text"
        name="description"
        class="form__input"
        @input="$v.program.description.$touch()">
      <AppTooltip
        v-if="$v.program.description.$error"
        :pos-x="55">
        <p v-if="!$v.program.description.minLength">Minimum 5 characters.</p>
        <p v-if="!$v.program.description.maxLength">Maximum 3000 characters.</p>
      </AppTooltip>
      <AppFeedback>
        <p v-if="errors.description">{{ errors.description[0] }}</p>
      </AppFeedback>
    </div>

    <div class="form__group">
      <label
        for="url"
        class="form__label">
        URL
      </label>
      <input
        id="url"
        v-model="program.url"
        :class="{ 'form__input--invalid': errors.url }"
        type="text"
        name="url"
        class="form__input"
        @input="$v.program.url.$touch()">
      <AppTooltip
        v-if="$v.program.url.$error"
        :pos-x="40">
        <p v-if="!$v.program.url.required">Please, provide a URL for the program.</p>
        <p v-if="!$v.program.url.url">Please, provide a valid URL.</p>
        <p v-if="!$v.program.url.maxLength">Maximum 255 characters.</p>
      </AppTooltip>
      <AppFeedback>
        <p v-if="errors.url">{{ errors.url[0] }}</p>
      </AppFeedback>
    </div>

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
import { admin } from "../../../mixins/middleware";
import { required, minLength, maxLength, url } from "vuelidate/lib/validators";

export default {
  components: {
    AppTooltip,
    AppFeedback
  },
  mixins: [admin],
  data() {
    return {
      program: {
        title: "",
        code: "",
        slogan: "",
        description: "",
        url: ""
      },
      old: {
        title: "",
        code: "",
        slogan: "",
        description: "",
        url: ""
      },
      errors: {}
    };
  },
  validations: {
    program: {
      title: {
        required,
        minLength: minLength(3),
        maxLength: maxLength(255)
      },
      code: {
        minLength: minLength(3),
        maxLength: maxLength(45)
      },
      slogan: {
        minLength: minLength(3),
        maxLength: maxLength(255)
      },
      description: {
        minLength: minLength(5),
        maxLength: maxLength(3000)
      },
      url: {
        required,
        url,
        maxLength: maxLength(255)
      }
    }
  },
  watch: {
    "program.title"() {
      if (this.program.title !== this.old.title) {
        this.errors = {};
      }
    },
    "program.code"() {
      if (this.program.code !== this.old.code) {
        this.errors = {};
      }
    },
    "program.slogan"() {
      if (this.program.slogan !== this.old.slogan) {
        this.errors = {};
      }
    },
    "program.description"() {
      if (this.program.description !== this.old.description) {
        this.errors = {};
      }
    },
    "program.url"() {
      if (this.program.url !== this.old.url) {
        this.errors = {};
      }
    }
  },
  methods: {
    submit() {
      if (!this.$v.$invalid) {
        this.$store
          .dispatch("addProgram", {
            title: this.program.title,
            code: this.program.code,
            slogan: this.program.slogan,
            description: this.program.description,
            url: this.program.url
          })
          .then(() => {
            this.$toasted.global.success({
              message: `Program added successfully!`
            });
            this.$router.push({ name: "admin.programs.index" });
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