<template>
  <router-link
    :to="{ name: to }"
    role="button"
    class="manageable__container"
    tag="div">
    <i
      :class="icon"
      class="manageable__icon fas"/>
    <h4
      class="manageable__label"
      v-text="label"/>
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
};
</script>