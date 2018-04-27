<template>
  <div @click="navigate">
    <div class="paginator__label-container"
         :class="{ 'paginator__label-container-active' : this.shouldStyleElement }">
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
      styleLabel() {
        return this.shouldStyleElement ? '' : 'display: none;'
      }
    },
    methods: {
      navigate() {
        this.$store.dispatch('setCurrentQuestion', this.index)
        this.$store.dispatch('setShowContentValue', false)
        setTimeout(() => {
            this.$store.dispatch('setShowContentValue', true)
        }, 5)
        this.$router.push({ query: { question: this.index } })
      }
    }
  }
</script>