<template>
  <main class="main__container">

    <!-- Back Button -->
    <router-link :to="{ name: 'admin' }"
                 tag="a"
                 class="main__back">
      <i class="fas fa-arrow-left"></i>
    </router-link>

    <!-- Title -->
    <h1 class="main__title">Users</h1>

    <div class="main__row main__row--center">

      <!-- Add -->
      <router-link :to="{ name: 'admin.users.create' }"
                   class="btn__small btn__small--success">
        <i class="fas fa-user-plus"></i>
        Add
      </router-link>
    </div>

    <table class="table">
      <tr class="table__row">
        <th class="table__header">Name</th>
        <th class="table__header">Email</th>
        <th class="table__header">Role</th>
        <th class="table__header">Created</th>
        <th class="table__header">Actions</th>
      </tr>
      <tr class="table__row"
          v-for="user in getUsers"
          :key="user.id">
        <td class="table__cell"
            v-text="user.name">
        </td>
        <td class="table__cell"
            v-text="user.email">
        </td>
        <td class="table__cell">
          {{ user.role | formatRole }}
        </td>
        <td class="table__cell"
            v-text="formatDate(user.created_at)">
        </td>
        <td class="table__cell">
          <router-link v-if="user.role !== 'dev'"
                       :to="{ name: 'admin.users.edit', params: { id: user.id } }"
                       class="btn__small btn__small--primary">
            <i class="fas fa-cog"></i>
            Update
          </router-link>
          <button v-if="user.role !== 'dev'"
                  class="btn__small btn__small--danger"
                  @click.prevent="deleteUser(user)">
            <i class="fas fa-times"></i>
            Delete
          </button>
        </td>
      </tr>
    </table>
  </main>
</template>

<script>
  import { admin } from '../../../mixins/middleware'
  import { dates } from '../../../mixins/dates'
  import { mapGetters } from 'vuex'

  export default {
    mixins: [
      admin,
      dates
    ],
    filters: {
      formatRole(value) {
        if (value === 'user') {
          return 'User'
        } else if (value === 'admin') {
          return 'Administrator'
        } else if (value === 'dev') {
          return 'Developer'
        }
      }
    },
    computed: {
      ...mapGetters([
        'getUsers'
      ])
    },
    created() {
      this.$store.dispatch('fetchUsers')
    },
    methods: {
      deleteUser(user) {
        this.$store.dispatch('deleteUser', user).then(() => {
          this.$toasted.global.success({
            message: `User deleted successfully!`
          })
        }).catch(() => {
          this.$toasted.global.danger()
        })
      }
    }
  }
</script>