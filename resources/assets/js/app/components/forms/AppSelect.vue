<template>
  <div class="select" ref="dropdownMenu" @click.prevent="toggleOpen">
    <span v-text="value ? value.label : 'Select'"></span>
    <transition name="fade" mode="out-in">
      <ul class="select__dropdown" v-if="open">
        <li v-for="(option, index) in options"
            :key="index"
            v-text="option.label"
            @click="select(option)">
        </li>
      </ul>
    </transition>
  </div>
</template>

<script>
  export default {
    props: {
      value: {
        type: [Object, Number],
        required: false
      },
      options: {
        type: Array,
        required: true
      }
    },
    data() {
      return {
        open: false
      }
    },
    created() {
      document.addEventListener('click', this.documentClick)
    },
    destroyed() {
      document.removeEventListener('click', this.documentClick)
    },
    methods: {
      select(option) {
        this.$emit('input', option)
      },

      /**
       * Toggle the open state of the dropdown list.
       */
      toggleOpen() {
        this.open = !this.open
      },

      /**
       * Retrieve the reference of the active dropdown and close
       * it if another element is clicked.
       */
      documentClick(event) {
        let el = this.$refs.dropdownMenu
        let target = event.target
        if ((el !== target) && !el.contains(target)) {
          this.open = false
        }
      }
    }
  }
</script>