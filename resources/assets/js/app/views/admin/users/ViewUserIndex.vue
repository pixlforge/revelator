<template>
  <main class="main__container main__container--admin">
    <div class="main__title-group">
      <router-link
        :to="{ name: 'admin' }"
        tag="a"
        class="main__back">
        <i class="fas fa-arrow-left"/>
      </router-link>

      <h1 class="main__title">Users</h1>
    </div>

    <div class="main__row main__row--center">

      <router-link
        :to="{ name: 'admin.users.create' }"
        class="btn__small btn__small--success">
        <i class="fas fa-user-plus"/>
        Add
      </router-link>
    </div>

    <div class="main__table-wrapper">
      <table class="table">
        <tr class="table__row">
          <th class="table__header">Name</th>
          <th class="table__header">Email</th>
          <th class="table__header">Role</th>
          <th class="table__header">Created</th>
          <th class="table__header">Actions</th>
        </tr>
        <tr
          v-for="user in getUsers"
          :key="user.id"
          class="table__row">
          <td
            class="table__cell"
            v-text="user.name"/>
          <td
            class="table__cell"
            v-text="user.email"/>
          <td class="table__cell">
            {{ user.role | formatRole }}
          </td>
          <td
            class="table__cell"
            v-text="formatDate(user.created_at)"/>
          <td class="table__cell">
            <router-link
              v-if="user.role !== 'dev'"
              :to="{ name: 'admin.users.edit', params: { id: user.id } }"
              class="btn__small btn__small--primary">
              <i class="fas fa-cog"/>
              Update
            </router-link>
            <button
              v-if="user.role !== 'dev'"
              class="btn__small btn__small--danger"
              @click.prevent="deleteUser(user)">
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
  filters: {
    formatRole(value) {
      if (value === "user") {
        return "User";
      } else if (value === "admin") {
        return "Administrator";
      } else if (value === "dev") {
        return "Developer";
      }
    }
  },
  mixins: [admin, dates],
  computed: {
    ...mapGetters(["getUsers"])
  },
  created() {
    this.$store.dispatch("fetchUsers");
  },
  methods: {
    deleteUser(user) {
      this.$store
        .dispatch("deleteUser", user)
        .then(() => {
          this.$toasted.global.success({
            message: `User deleted successfully!`
          });
        })
        .catch(() => {
          this.$toasted.global.danger();
        });
    }
  }
};
</script>