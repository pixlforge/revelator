<template>
  <div>
    <div class="program__container">
      <div class="program__result">
        <!-- Circle -->
        

        <!-- Result -->
        <div class="program__result-value"
             v-text="calculatePercentage">
        </div>
      </div>

      <div class="program__body">
        
        <!-- Title -->
        <p class="program__title"
            v-text="program.title">
        </p>

        <!-- Slogan -->
        <p class="program__slogan"
            v-text="program.slogan">
        </p>

        <div class="program__buttons">
          <a class="btn__results">
            I'm interested
          </a>
          <a class="btn__results"
             :href="program.url"
             target="_blank"
             rel="noopener noreferrer">
            View details
          </a>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    props: {
      program: {
        type: Object,
        required: true
      }
    },
    computed: {
      calculatePercentage() {
        return Math.ceil(Math.round((this.program.points / this.program.maxPoints) * 100)) + '%'
      }
    }
  }
</script>