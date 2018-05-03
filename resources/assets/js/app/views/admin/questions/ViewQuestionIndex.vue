<template>
  <main class="main__container">

    <!-- Back Button -->
    <router-link :to="{ name: 'admin' }"
                 tag="a"
                 class="main__back">
      <i class="fas fa-arrow-left"></i>
    </router-link>

    <!-- Title -->
    <h1 class="main__title">Questions</h1>

    <div class="main__row main__row--center">

      <!-- Add -->
      <router-link :to="{ name: 'admin.questions.create' }"
                   class="btn__small btn__small--success">
        <i class="fas fa-plus"></i>
        Add
      </router-link>
    </div>

    <p class="text__table-is-empty" v-if="tableIsEmpty">There isn't any question defined at the moment.</p>
    <table class="table" v-else>
      <tr class="table__row">
        <th class="table__header">Name</th>
        <th class="table__header">Type</th>
        <th class="table__header">Position</th>
        <th class="table__header">Created</th>
        <th class="table__header">Actions</th>
      </tr>
      <tr class="table__row"
          v-for="question in getQuestions"
          :key="question.id">
        <td class="table__cell"
            v-text="question.name">
        </td>
        <td class="table__cell"
            v-text="question.type">
        </td>
        <td class="table__cell"
            v-text="question.pos">
        </td>
        <td class="table__cell"
            v-text="formatDate(question.created_at)">
        </td>
        <td class="table__cell">
          <router-link :to="{ name: 'admin.questions.edit', params: { id: question.id } }"
                       class="btn__small btn__small--primary">
            <i class="fas fa-cog"></i>
            Update
          </router-link>
          <button class="btn__small btn__small--danger"
                  @click.prevent="deleteQuestion(question)">
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
        'getQuestions'
      ]),

      tableIsEmpty() {
        return !this.getQuestions.length && this.fetching === false
      }
    },
    created() {
      this.fetching = true
      this.$store.dispatch('toggleLoader')
      this.$store.dispatch('fetchQuestions')
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
       * Delete a question.
       */
      deleteQuestion(question) {
        this.$store.dispatch('deleteQuestion', question).then(() => {
          this.$toasted.global.success({
            message: `Question deleted successfully!`
          })
        }).catch(() => {
          this.$toasted.global.danger()
        })
      }
    }
  }
</script>