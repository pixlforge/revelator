<template>
  <div class="featured__container">
    <div class="featured__body">
      <p class="featured__lead">Thank you, here is the program that best fits your needs</p>
      <div class="featured__result">
        <svg class="featured__svg">
          <circle
            class="featured__circle"
            cx="70"
            cy="70"
            r="70"
            fill="#fff"/>
          <path
            :id="'path_' + program.id"
            fill="#4e4f4f"/>
          <circle
            class="featured__circle"
            cx="70"
            cy="70"
            r="45"
            fill="#f0f0f0"/>
        </svg>
        <div class="featured__value">
          <div :id="'result_' + program.id"/>
          <p class="featured__compatible">Compatible</p>
        </div>
      </div>
      <div class="featured__details">
        <p
          class="featured__title"
          v-text="program.title"/>
        <p
          class="featured__slogan"
          v-text="program.slogan"/>
      </div>
    </div>
    <a
      :href="program.url"
      role="button"
      class="featured__button"
      target="_blank"
      rel="noopener noreferrer"
      v-text="'Discover the program'"/>
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
  mounted() {
    this.animateResults();
  },
  methods: {
    /**
     * Animate the results text and circle.
     */
    animateResults() {
      const path = document.getElementById("path_" + this.program.id);
      const element = document.querySelector("#result_" + this.program.id);
      let arc;
      let count = 0;
      let end = this.program.percentage;

      let animation = setInterval(() => {
        count += 1;
        element.innerHTML = count + "%";
        arc = this.drawArc(70, 70, 70, 0, count * 3.6);
        path.setAttribute("d", arc);

        if (count >= end) {
          clearInterval(animation);
        }
      }, 25);
    },

    /**
     * Polar to cartesian.
     */
    polarToCartesian(centerX, centerY, radius, angleInDegrees) {
      let angleInRadians = (angleInDegrees - 90) * Math.PI / 180.0;
      return {
        x: centerX + radius * Math.cos(angleInRadians),
        y: centerY + radius * Math.sin(angleInRadians)
      };
    },

    /**
     * Draw an arc.
     */
    drawArc(x, y, radius, startAngle, endAngle) {
      let start = this.polarToCartesian(x, y, radius, endAngle);
      let end = this.polarToCartesian(x, y, radius, startAngle);
      let arcSweep = endAngle - startAngle <= 180 ? "0" : "1";
      let d =
        (endAngle - startAngle) % 360 === 0
          ? [
              "M",
              start.x,
              0,
              "A",
              radius,
              radius,
              0,
              0,
              0,
              start.x,
              radius * 2,
              "A",
              radius,
              radius,
              0,
              0,
              0,
              start.x,
              0
            ]
          : [
              "M",
              start.x,
              start.y,
              "A",
              radius,
              radius,
              0,
              arcSweep,
              0,
              end.x,
              end.y,
              "L",
              x,
              y,
              "Z"
            ];
      return d.join(" ");
    }
  }
};
</script>

