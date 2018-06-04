<template>
  <div>
    <transition
      name="fade"
      mode="out-in"
      appear>
      <TheNavbar/>
    </transition>
    <transition
      name="fade"
      mode="out-in"
      appear>
      <router-view/>
    </transition>
    <transition
      name="fade"
      mode="out-in"
      appear>
      <AppVideo v-if="$router.currentRoute.name === 'home'"/>
    </transition>
    <transition
      name="fade"
      mode="out-in"
      appear>
      <div class="spinner__container">
        <OrbitSpinner
          v-if="loaderState"
          :animation-duration="1000"
          :size="100"
          :color="'#ffffff'"/>
        <div v-if="$router.currentRoute.name === 'results' && loaderState">
          <p class="spinner__please-wait">Please wait</p>
          <p class="spinner__analyzing">We are collecting and analyzing your answers</p>
        </div>
      </div>
    </transition>
    <transition
      name="fade"
      mode="out-in"
      appear>
      <div
        v-if="loaderState"
        class="spinner__background"/>
    </transition>
  </div>
</template>

<script>
import TheNavbar from "./components/UI/TheNavbar";
import AppVideo from "./components/video/AppVideo";
import { OrbitSpinner } from "epic-spinners";
import { mapGetters } from "vuex";

export default {
  components: {
    TheNavbar,
    AppVideo,
    OrbitSpinner
  },
  props: {
    currentUser: {
      type: Object,
      required: false,
      default: () => {
        return null;
      }
    }
  },
  computed: {
    ...mapGetters(["loaderState"])
  },
  created() {
    const currentUser = this.$store.getters.getCurrentUser;

    if (!currentUser && this.currentUser !== null) {
      this.$store.dispatch("hydrateCurrentUser", this.currentUser);
    }
  }
};
</script>