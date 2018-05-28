<template>
  <main class="main__container main__container--admin">
    <div class="main__title-group">
      <router-link
        :to="{ name: 'admin' }"
        tag="a"
        class="main__back">
        <i class="fas fa-arrow-left"/>
      </router-link>

      <h1 class="main__title">Questions</h1>
    </div>

    <div class="main__row main__row--center">
      <router-link
        :to="{ name: 'admin.questions.create' }"
        class="btn__small btn__small--success">
        <i class="fas fa-plus"/>
        Add
      </router-link>
    </div>

    <div class="main__table-wrapper">
      <p
        v-if="tableIsEmpty"
        class="text__table-is-empty">
        There isn't any question defined at the moment.
      </p>
      <table
        v-else
        class="table">
        <tr class="table__row">
          <th class="table__header">Name</th>
          <th class="table__header">Type</th>
          <th class="table__header">Position</th>
          <th class="table__header">Created</th>
          <th class="table__header">Actions</th>
        </tr>
        <tr
          v-for="question in getQuestions"
          :key="question.id"
          class="table__row">
          <td
            class="table__cell"
            v-text="question.name"/>
          <td
            class="table__cell"
            v-text="question.type"/>
          <td
            class="table__cell"
            v-text="question.pos"/>
          <td
            class="table__cell"
            v-text="formatDate(question.created_at)"/>
          <td class="table__cell">
            <router-link
              :to="{ name: 'admin.questions.edit', params: { id: question.id } }"
              class="btn__small btn__small--primary">
              <i class="fas fa-cog"/>
              Update
            </router-link>
            <button
              role="button"
              class="btn__small btn__small--danger"
              @click.prevent="deleteQuestion(question)">
              <i class="fas fa-times"/>
              Delete
            </button>
          </td>
        </tr>
      </table>
    </div>
  </main>
</template>

<script>
import { admin } from "../../../mixins/middleware";
import { dates } from "../../../mixins/dates";
import { mapGetters } from "vuex";

export default {
  mixins: [admin, dates],
  data() {
    return {
      fetching: false
    };
  },
  computed: {
    ...mapGetters(["getQuestions"]),
    tableIsEmpty() {
      return !this.getQuestions.length && this.fetching === false;
    }
  },
  created() {
    this.fetching = true;
    this.$store.dispatch("toggleLoader");
    this.$store
      .dispatch("fetchQuestions")
      .then(() => {
        this.fetching = false;
        this.$store.dispatch("toggleLoader");
      })
      .catch(() => {
        this.fetching = false;
        this.$store.dispatch("toggleLoader");
      });
  },
  methods: {
    deleteQuestion(question) {
      this.$store
        .dispatch("deleteQuestion", question)
        .then(() => {
          this.$toasted.global.success({
            message: `Question deleted successfully!`
          });
        })
        .catch(() => {
          this.$toasted.global.danger();
        });
    }
  }
};
</script>