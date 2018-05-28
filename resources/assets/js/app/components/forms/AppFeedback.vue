<template>
  <div class="feedback__container">
    <transition
      name="fade"
      mode="out-in">
      <slot/>
    </transition>
  </div>
</template>