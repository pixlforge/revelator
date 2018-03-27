<template>
  <div>
    <div class="program__container">

      <div class="program__result">
        <!--Circle-->
        <!--Result-->
        <div class="program__result-value"
             v-text="calculatePercentage">
        </div>
      </div>

      <div class="program__body">
        <!--Title-->
        <h2 class="program__title"
            v-text="program.title">
        </h2>

        <!--Slogan-->
        <h4 class="program__slogan"
            v-text="program.slogan">
        </h4>

        <div class="program__buttons">
          <button>I'm interested</button>
          <button>View details</button>
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