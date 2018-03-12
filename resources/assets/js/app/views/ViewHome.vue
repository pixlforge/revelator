<template>
  <div>
    <main class="main__container">
      <h1 class="main__title main__title--big">Revelator</h1>
      <h2 class="main__subtitle">Find the program that suits you</h2>
      <TheSummary/>
    </main>
    <AppBigButton route-name="diagnostic"
                  label="Run the diagnostic"/>
  </div>
</template>

<script>
  import TheSummary from '../components/UI/TheSummary'
  import AppBigButton from '../components/buttons/AppBigButton'

  export default {
    components: {
      TheSummary,
      AppBigButton
    }
  }
</script>