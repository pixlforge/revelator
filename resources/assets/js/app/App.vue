<template>
  <div>
    <transition name="fade" mode="out-in" appear>
      <TheNavbar/>
    </transition>
    <transition name="fade" mode="out-in" appear>
      <router-view></router-view>
    </transition>
    <transition name="fade" mode="out-in" appear>
      <AppVideo v-if="$router.currentRoute.name === 'home'"/>
    </transition>
    <transition name="fade" mode="out-in" appear>
      <OrbitSpinner :animation-duration="1000"
                    :size="100"
                    :color="'#ffffff'"
                    v-if="loaderState"/>
    </transition>
    <transition name="fade" mode="out-in" appear>
      <div class="loader__background" v-if="loaderState"></div>
    </transition>
  </div>
</template>

<script>
  import TheNavbar from './components/UI/TheNavbar'
  import AppVideo from './components/video/AppVideo'
  import { OrbitSpinner } from 'epic-spinners'
  import { mapGetters } from 'vuex'

  export default {
    props: {
      currentUser: {
        type: Object,
        required: false
      }
    },
    components: {
      TheNavbar,
      AppVideo,
      OrbitSpinner
    },
    computed: {
      ...mapGetters([
        'loaderState'
      ])
    },
    created() {
      const currentUser = this.$store.getters.getCurrentUser

      if (!currentUser && this.currentUser !== null) {
        this.$store.dispatch('hydrateCurrentUser', this.currentUser)
      }
    }
  }
</script>