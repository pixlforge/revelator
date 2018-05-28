<template>
  <main class="main__container main__container--admin">
    <div class="main__title-group">
      <router-link
        :to="{ name: 'admin' }"
        tag="a"
        class="main__back">
        <i class="fas fa-arrow-left"/>
      </router-link>

      <h1 class="main__title">Programs</h1>
    </div>

    <div class="main__row main__row--center">

      <router-link
        :to="{ name: 'admin.programs.create' }"
        class="btn__small btn__small--success">
        <i class="fas fa-plus"/>
        Add
      </router-link>
    </div>

    <div class="main__table-wrapper">
      <p
        v-if="tableIsEmpty"
        class="text__table-is-empty">
        There isn't any program defined at the moment.
      </p>
      <table
        v-else
        class="table">
        <tr class="table__row">
          <th class="table__header">Title</th>
          <th class="table__header">Code</th>
          <th class="table__header">Description</th>
          <th class="table__header">URL</th>
          <th class="table__header">Created</th>
          <th class="table__header">Actions</th>
        </tr>
        <tr
          v-for="program in getPrograms"
          :key="program.id"
          class="table__row">
          <td
            class="table__cell"
            v-text="program.title"/>
          <td
            class="table__cell"
            v-text="program.code"/>
          <td
            class="table__cell"
            v-text="program.description"/>
          <td
            class="table__cell"
            v-text="program.url"/>
          <td
            class="table__cell"
            v-text="formatDate(program.created_at)"/>
          <td class="table__cell">
            <router-link
              :to="{ name: 'admin.programs.edit', params: { id: program.id } }"
              class="btn__small btn__small--primary">
              <i class="fas fa-cog"/>
              Update
            </router-link>
            <button
              role="button"
              class="btn__small btn__small--danger"
              @click.prevent="deleteProgram(program)">
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
    ...mapGetters(["getPrograms"]),

    tableIsEmpty() {
      return !this.getPrograms.length && this.fetching === false;
    }
  },
  created() {
    this.fetching = true;
    this.$store.dispatch("toggleLoader");
    this.$store
      .dispatch("fetchPrograms")
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
    deleteProgram(program) {
      this.$store
        .dispatch("deleteProgram", program)
        .then(() => {
          this.$toasted.global.success({
            message: `Program deleted successfully!`
          });
        })
        .catch(() => {
          this.$toasted.global.danger();
        });
    }
  }
};
</script>