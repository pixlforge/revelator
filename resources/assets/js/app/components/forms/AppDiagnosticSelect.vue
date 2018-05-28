<template>
  <div
    ref="dropdownMenu"
    class="select"
    @click.prevent="toggleOpen">
    <span v-text="value ? value.label : 'Select'"/>
    <transition
      name="fade"
      mode="out-in">
      <ul
        v-if="open"
        class="select__dropdown">
        <li
          v-for="(option, index) in options"
          :key="index"
          @click="$emit('selectedOption', option)"
          v-text="option.label"/>
      </ul>
    </transition>
  </div>
</template>

<script>
export default {
  props: {
    value: {
      type: [Object, Number],
      required: false,
      default: () => {
        return null;
      }
    },
    options: {
      type: Array,
      required: true
    }
  },
  data() {
    return {
      open: false
    };
  },
  created() {
    document.addEventListener("click", this.documentClick);
  },
  destroyed() {
    document.removeEventListener("click", this.documentClick);
  },
  methods: {
    select(option) {
      this.$emit("input", option);
    },
    toggleOpen() {
      this.open = !this.open;
    },
    /**
     * Retrieve the reference of the active dropdown and close
     * it if another element is clicked.
     */
    documentClick(event) {
      let el = this.$refs.dropdownMenu;
      let target = event.target;
      if (el !== target && !el.contains(target)) {
        this.open = false;
      }
    }
  }
};
</script>