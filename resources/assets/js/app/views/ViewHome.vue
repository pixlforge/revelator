<template>
  <div>
    <main class="main__container">
      <h1 class="main__title main__title--big">Revelator</h1>
      <h2 class="main__subtitle">Find the program that is perfect for you</h2>
      <TheSummary/>
    </main>
    <AppRunDiagnostic/>
  </div>
</template>

<script>
import TheSummary from "../components/UI/TheSummary";
import AppRunDiagnostic from "../components/buttons/AppRunDiagnostic";

export default {
  components: {
    TheSummary,
    AppRunDiagnostic
  }
};
</script>