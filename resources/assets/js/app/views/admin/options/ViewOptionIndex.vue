<template>
  <main class="main__container main__container--admin">
    <div class="main__title-group">
      <!-- Back Button -->
      <router-link :to="{ name: 'admin' }"
                   tag="a"
                   class="main__back">
        <i class="fas fa-arrow-left"></i>
      </router-link>

      <!-- Title -->
      <h1 class="main__title">Options</h1>
    </div>

    <div class="main__row main__row--center">

      <!-- Add -->
      <router-link :to="{ name: 'admin.options.create' }"
                   class="btn__small btn__small--success">
        <i class="fas fa-plus"></i>
        Add
      </router-link>
    </div>

    <div class="main__table-wrapper">
      <p class="text__table-is-empty" v-if="tableIsEmpty">There isn't any option defined at the moment.</p>
      <table class="table" v-else>
        <tr class="table__row">
          <th class="table__header">Name</th>
          <th class="table__header">Pos</th>
          <th class="table__header">Question</th>
          <th class="table__header">Created</th>
          <th class="table__header">Actions</th>
        </tr>
        <tr class="table__row"
            v-for="option in getOptions"
            :key="option.id">
          <td class="table__cell"
              v-text="option.name">
          </td>
          <td class="table__cell"
              v-text="option.pos">
          </td>
          <td class="table__cell"
              v-text="option.question.name">
          </td>
          <td class="table__cell"
              v-text="formatDate(option.created_at)">
          </td>
          <td class="table__cell">
            <router-link :to="{ name: 'admin.options.edit', params: { id: option.id } }"
                         class="btn__small btn__small--primary">
              <i class="fas fa-cog"></i>
              Update
            </router-link>
            <button class="btn__small btn__small--danger"
                    @click.prevent="deleteOption(option)">
              <i class="fas fa-times"></i>
              Delete
            </button>
          </td>
        </tr>
      </table>
    </div>

  </main>
</template>

<script>
  import { admin } from '../../../mixins/middleware'
  import { dates } from '../../../mixins/dates'
  import { mapGetters } from 'vuex'

  export default {
    data() {
      return {
        fetching: false
      }
    },
    mixins: [
      admin,
      dates
    ],
    computed: {
      ...mapGetters([
        'getOptions'
      ]),

      tableIsEmpty() {
        return !this.getOptions.length && this.fetching === false
      }
    },
    created() {
      this.fetching = true
      this.$store.dispatch('toggleLoader')
      this.$store.dispatch('fetchOptions')
        .then(() => {
          this.fetching = false
          this.$store.dispatch('toggleLoader')
        })
        .catch(() => {
          this.fetching = false
          this.$store.dispatch('toggleLoader')
        })
    },
    methods: {
      /**
       * Delete an option.
       */
      deleteOption(option) {
        this.$store.dispatch('deleteOption', option).then(() => {
          this.$toasted.global.success({
            message: `Option deleted successfully!`
          })
        }).catch(() => {
          this.$toasted.global.danger()
        })
      }
    }
  }
</script>