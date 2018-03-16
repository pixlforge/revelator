<template>
  <div @click="navigate">
    <div class="paginator__label-container"
         :style="styleLabelContainer">
    </div>
    <h5 class="paginator__label"
        :style="styleLabel"
        v-text="element.name">
    </h5>
  </div>
</template>

<script>
  export default {
    props: {
      element: {
        type: Object,
        required: true
      },
      shouldStyleElement: {
        type: Boolean,
        required: true
      },
      index: {
        type: Number,
        required: true
      }
    },
    computed: {
      styleLabelContainer() {
        return this.shouldStyleElement ? 'background-color: #4e4f4f;!important;' : 'display: none;'
      },

      styleLabel() {
        return this.shouldStyleElement ? '' : 'display: none;'
      }
    },
    methods: {
      navigate() {
        this.$store.dispatch('setCurrentQuestion', this.index)
        this.$router.push({ query: { question: this.index } })
      }
    }
  }
</script>