<template>
  <transition
    name="fade"
    mode="out-in">
    <div
      :style="{ 'left': posX + '%' }"
      class="tooltip__container">
      <div>
        <slot/>
      </div>
      <svg
        viewBox="933.57 415.411 37.4 35.5"
        class="tooltip__viewbox">
        <path
          class="tooltip__comma"
          d="M1034.492,527.016c-1.408-.837-8.439,3.895-14.935,11.2s-8.18,18.2-8.18,18.2l31.966-6.386a8.9,8.9,0,0,1-9.065-7.7C1032.813,534.253,1035.9,527.853,1034.492,527.016Z"
          transform="matrix(-0.978, -0.208, 0.208, -0.978, 1844.56, 1176.594)"/>
      </svg>
    </div>
  </transition>
</template>

<script>
export default {
  props: {
    posX: {
      type: Number,
      required: false,
      default: () => {
        return 0;
      }
    }
  }
};
</script>