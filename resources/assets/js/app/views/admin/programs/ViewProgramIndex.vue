<template>
  <main class="main__container">

    <!-- Back Button -->
    <router-link :to="{ name: 'admin' }"
                 tag="a"
                 class="main__back">
      <i class="fas fa-arrow-left"></i>
    </router-link>

    <!-- Title -->
    <h1 class="main__title">Programs</h1>

    <div class="main__row main__row--center">

      <!-- Add -->
      <router-link :to="{ name: 'admin.programs.create' }"
                   class="btn__small btn__small--success">
        <i class="fas fa-plus"></i>
        Add
      </router-link>
    </div>

    <p class="text__table-is-empty" v-if="tableIsEmpty">There isn't any program defined at the moment.</p>
    <table class="table" v-else>
      <tr class="table__row">
        <th class="table__header">Title</th>
        <th class="table__header">Code</th>
        <th class="table__header">Description</th>
        <th class="table__header">URL</th>
        <th class="table__header">Created</th>
        <th class="table__header">Actions</th>
      </tr>
      <tr class="table__row"
          v-for="program in getPrograms"
          :key="program.id">
        <td class="table__cell"
            v-text="program.title">
        </td>
        <td class="table__cell"
            v-text="program.code">
        </td>
        <td class="table__cell"
            v-text="program.description">
        </td>
        <td class="table__cell"
            v-text="program.url">
        </td>
        <td class="table__cell"
            v-text="formatDate(program.created_at)">
        </td>
        <td class="table__cell">
          <router-link :to="{ name: 'admin.programs.edit', params: { id: program.id } }"
                       class="btn__small btn__small--primary">
            <i class="fas fa-cog"></i>
            Update
          </router-link>
          <button class="btn__small btn__small--danger"
                  @click.prevent="deleteProgram(program)">
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
        'getPrograms'
      ]),

      tableIsEmpty() {
        return !this.getPrograms.length && this.fetching === false
      }
    },
    created() {
      this.fetching = true
      this.$store.dispatch('toggleLoader')
      this.$store.dispatch('fetchPrograms').then(() => {
        this.fetching = false
        this.$store.dispatch('toggleLoader')
      }).catch(() => {
        this.fetching = false
        this.$store.dispatch('toggleLoader')
      })
    },
    methods: {
      /**
       * Delete a program.
       */
      deleteProgram(program) {
        this.$store.dispatch('deleteProgram', program).then(() => {
          this.$toasted.global.success({
            message: `Program deleted successfully!`
          })
        }).catch(() => {
          this.$toasted.global.danger()
        })
      }
    }
  }
</script>