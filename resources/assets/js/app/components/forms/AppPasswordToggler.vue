<template>
  <button class="btn btn__password"
          tabindex="-1"
          @click.prevent="togglePasswordVisiblity">
    <span v-show="!passwordVisibilityState"><i class="fas fa-eye"></i></span>
    <span v-show="passwordVisibilityState"><i class="fas fa-eye-slash"></i></span>
  </button>
</template>

<script>
  import { mapGetters, mapActions } from 'vuex'

  export default {
    computed: {
      ...mapGetters([
        'passwordVisibilityState'
      ])
    },
    methods: {
      ...mapActions([
        'togglePasswordVisiblity'
      ])
    }
  }
</script>