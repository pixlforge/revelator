<template>
  <div
    class="radio__button"
    @click="selection">
    <div>
      <svg
        width="70px"
        height="70px"
        viewBox="0 0 70 70">
        <circle
          :fill="shouldStyle"
          cx="35"
          cy="35"
          r="25"/>
      </svg>
    </div>
    <slot/>
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
      return this.selected ? "#4e4f4f" : "white";
    }
  },
  methods: {
    selection() {
      this.$emit("radioSelect", this.option);
    }
  }
};
</script>
