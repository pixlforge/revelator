<template>
  <div>
    <main class="main__container">

      <!-- Title -->
      <h1 class="main__title main__title--big">Revelator</h1>

      <!-- Subtitle -->
      <h2 class="main__subtitle">Find the program that suits you</h2>

      <!-- Summary -->
      <TheSummary/>
    </main>

    <!-- Run the Diagnostic Button -->
    <AppBigButton/>
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