<template>
  <main class="main__container">
    <h1 class="main__title">Admin dashboard</h1>
    <div class="main__row">
      <AppManageable to="admin.users.index"
                     icon="fa-users"
                     label="Users"/>

      <AppManageable to="admin.questions.index"
                     icon="fa-question"
                     label="Questions"/>

      <AppManageable to="admin.options.index"
                     icon="fa-list"
                     label="Options"/>

      <AppManageable to="admin.programs.index"
                     icon="fa-crosshairs"
                     label="Programs"/>

      <AppManageable to="admin.users.index"
                     icon="fa-exclamation"
                     label="Answers"/>
    </div>
  </main>
</template>

<script>
  import AppManageable from '../../components/buttons/AppManageable'
  import { admin } from '../../mixins/middleware'

  export default {
    components: {
      AppManageable
    },
    mixins: [
      admin
    ]
  }
</script>
