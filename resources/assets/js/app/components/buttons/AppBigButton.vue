<template>
  <div>
    <router-link :to="{ name: routeName }" class="btn__big">{{ label }}</router-link>
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