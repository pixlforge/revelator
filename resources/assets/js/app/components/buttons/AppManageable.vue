<template>
  <router-link class="manageable__container"
               :to="{ name: to }"
               tag="div">
    <i class="manageable__icon fas" :class="icon"></i>
    <h4 class="manageable__label" v-text="label"></h4>
  </router-link>
</template>

<script>
  export default {
    props: {
      to: {
        type: String,
        required: true
      },
      icon: {
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