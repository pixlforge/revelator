<template>
  <main class="main__container">
    <router-link :to="{ name: 'admin' }"
                 tag="a"
                 class="main__back">
      <i class="fas fa-arrow-left"></i>
    </router-link>

    <h1 class="main__title">Programs</h1>

    <div class="main__row main__row--center">
      <router-link :to="{ name: 'admin.programs.create' }"
                   class="btn__small btn__small--success">
        <i class="fas fa-plus"></i>
        Add
      </router-link>
    </div>

    <table class="table">
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
    mixins: [
      admin,
      dates
    ],
    computed: {
      ...mapGetters([
        'getPrograms'
      ])
    },
    created() {
      this.$store.dispatch('toggleLoader')
      this.$store.dispatch('fetchPrograms').then(() => {
        this.$store.dispatch('toggleLoader')
      }).catch(() => {
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