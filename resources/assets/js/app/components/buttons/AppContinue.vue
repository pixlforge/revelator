<template>
  <div>
    <a class="btn__big"
       @click="$emit('nextQuestion')"
       v-text="label">
    </a>
  </div>
</template>

<script>
  export default {
    props: {
      label: {
        type: String,
        required: true
      }
    }
  }
</script>