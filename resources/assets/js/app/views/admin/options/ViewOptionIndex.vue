<template>
  <main class="main__container main__container--admin">
    <div class="main__title-group">
      <router-link
        :to="{ name: 'admin' }"
        tag="a"
        class="main__back">
        <i class="fas fa-arrow-left"/>
      </router-link>

      <h1 class="main__title">Options</h1>
    </div>

    <div class="main__row main__row--center">
      <router-link
        :to="{ name: 'admin.options.create' }"
        class="btn__small btn__small--success">
        <i class="fas fa-plus"/>
        Add
      </router-link>
    </div>

    <div class="main__table-wrapper">
      <p
        v-if="tableIsEmpty"
        class="text__table-is-empty">
        There isn't any option defined at the moment.
      </p>
      <table
        v-else
        class="table">
        <tr class="table__row">
          <th class="table__header">Name</th>
          <th class="table__header">Pos</th>
          <th class="table__header">Question</th>
          <th class="table__header">Created</th>
          <th class="table__header">Actions</th>
        </tr>
        <tr
          v-for="option in getOptions"
          :key="option.id"
          class="table__row">
          <td
            class="table__cell"
            v-text="option.name"/>
          <td
            class="table__cell"
            v-text="option.pos"/>
          <td
            class="table__cell"
            v-text="option.question.name"/>
          <td
            class="table__cell"
            v-text="formatDate(option.created_at)"/>
          <td class="table__cell">
            <router-link
              :to="{ name: 'admin.options.edit', params: { id: option.id } }"
              class="btn__small btn__small--primary">
              <i class="fas fa-cog"/>
              Update
            </router-link>
            <button
              role="button"
              class="btn__small btn__small--danger"
              @click.prevent="deleteOption(option)">
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
    ...mapGetters(["getOptions"]),
    tableIsEmpty() {
      return !this.getOptions.length && this.fetching === false;
    }
  },
  created() {
    this.fetching = true;
    this.$store.dispatch("toggleLoader");
    this.$store
      .dispatch("fetchOptions")
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
    deleteOption(option) {
      this.$store
        .dispatch("deleteOption", option)
        .then(() => {
          this.$toasted.global.success({
            message: `Option deleted successfully!`
          });
        })
        .catch(() => {
          this.$toasted.global.danger();
        });
    }
  }
};
</script>