<template>
  <div>
    <div class="program__container">
      <div class="program__result">

        <svg class="svg__results">
          <circle
            class="svg__circle"
            cx="40"
            cy="40"
            r="40"
            fill="#fff"/>
          <path
            :id="'path_' + program.id"
            class="svg__path"
            fill="#4e4f4f"/>
          <circle
            class="svg__circle"
            cx="40"
            cy="40"
            r="30"
            fill="#f0f0f0"/>
        </svg>

        <div
          :id="'result_' + program.id"
          class="program__result-value"/>
      </div>
      <div class="program__body">
        <p
          class="program__title"
          v-text="program.title"/>
        <p
          class="program__slogan"
          v-text="program.slogan"/>
        <div
          v-if="getCurrentUser"
          class="program__buttons">
          <!--<a class="btn__results"-->
          <!--v-if="getCurrentUser.user_consents"-->
          <!--@click="subscribe">-->
          <!--I'm interested-->
          <!--</a>-->
          <a
            :href="program.url"
            class="btn__results"
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
import { mapGetters } from "vuex";

export default {
  props: {
    program: {
      type: Object,
      required: true
    }
  },
  computed: {
    ...mapGetters(["getCurrentUser"])
  },
  mounted() {
    this.animateResults();
  },
  methods: {
    /**
     * Subscribe to the Campaign Monitor list.
     */
    subscribe() {
      const payload = {
        first_name: this.getCurrentUser.first_name,
        full_name:
          this.getCurrentUser.first_name + " " + this.getCurrentUser.last_name,
        email: this.getCurrentUser.guest_email,
        program: this.program.title + " EN"
      };

      this.$store.dispatch("toggleLoader");

      window.axios
        .post(window.route("api.campaign.store"), payload)
        .then(({ data }) => {
          if (data.http_status_code === 201) {
            this.$toasted.global.success({
              message: `Thank you, you will receive more information about the ${
                this.program.title
              } program.`
            });
          } else {
            this.$toasted.global.danger();
          }
          this.$store.dispatch("toggleLoader");
        })
        .catch(() => {
          this.$toasted.global.danger();
          this.$store.dispatch("toggleLoader");
        });
    },

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
        arc = this.drawArc(40, 40, 40, 0, count * 3.6);
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