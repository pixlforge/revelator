<template>
  <div class="radio__button" @click="selection">
    <svg width="70px" height="70px" viewBox="0 0 70 70">
      <defs>
        <linearGradient id="gradient">
          <stop class="stop-color--turquoise" offset="20%"/>
          <stop class="stop-color--dark-grey" offset="100%" stop-opacity="0.9"/>
        </linearGradient>
      </defs>
      <circle cx="35" cy="35" r="25" :fill="shouldStyle"/>
    </svg>
    <slot></slot>
  </div>
</template>

<script>
  export default {
    props: {
      option: {
        type: String,
        required: true
      },
      selected: {
        type: Boolean,
        required: true
      }
    },
    computed: {
      shouldStyle() {
        return this.selected ? 'url(#gradient)' : 'white'
      }
    },
    methods: {
      selection() {
        this.$emit('radioSelect', this.option)
      }
    }
  }
</script>

<style scoped>
  svg {
    transform: rotate(45deg);
  }
</style>