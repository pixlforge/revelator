<template>
  <div>
    <router-link :to="{ name: routeName, query: { question: 0 } }"
                 class="btn__big"
                 v-text="label">
    </router-link>
  </div>
</template>

<script>
  export default {
    props: {
      routeName: {
        type: String,
        required: true
      },

      label: {
        type: String,
        required: true
      }
    }
  }
</script>