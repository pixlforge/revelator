<template>
  <div @click="navigate">
    <div
      :class="{ 'paginator__label-container-active' : shouldStyleElement }"
      class="paginator__label-container"/>
    <h5
      :style="styleLabel"
      class="paginator__label"
      v-text="element.name"/>
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
      return this.shouldStyleElement ? "" : "display: none;";
    }
  },
  methods: {
    navigate() {
      if (this.shouldStyleElement) {
        this.$store.dispatch("setCurrentQuestion", this.index);
        this.$store.dispatch("setShowContentValue", false);
        setTimeout(() => {
          this.$store.dispatch("setShowContentValue", true);
        }, 5);
        this.$router.push({ query: { question: this.index } });
      }
    }
  }
};
</script>