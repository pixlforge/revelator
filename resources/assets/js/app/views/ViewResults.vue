<template>
  <div>
    <main class="main__container main__container--results">
      <transition
        name="fade"
        mode="out-in"
        appear>
        <h1
          v-if="programs.length"
          class="main__title main__title--diagnostic">
          Your diagnostic
        </h1>
      </transition>
      <transition
        name="fade"
        mode="out-in"
        appear>
        <AppFeaturedProgram
          v-if="featuredProgram"
          :program="featuredProgram"/>
      </transition>

      <transition
        name="fade"
        mode="out-in"
        appear>
        <p
          v-if="shouldDisplayProgramsNow"
          class="main__lead">
          Here are the programs that we selected for you.
        </p>
      </transition>

      <transition
        name="fade"
        mode="out-in"
        appear>
        <div
          v-if="shouldDisplayProgramsNow"
          class="main__results">
          <AppProgram
            v-for="program in programs"
            :key="program.id"
            :program="program"/>
        </div>
      </transition>
    </main>

    <div
      v-if="programs.length"
      class="main__btn-group">
      <div
        v-if="userConsents"
        class="btn__big"
        @click="sendMeMyResults">
        <span class="sm-hidden">Send Me My Results</span>
        <span class="md-hidden">
          <div><i class="fal fa-envelope"/></div>
          <div class="small-label">Send Results</div>
        </span>
      </div>

      <div
        :class="shouldSetElementWidth"
        class="btn__big"
        @click="startAgain">
        <span class="sm-hidden">Start Again</span>
        <span class="md-hidden">
          <div><i class="fal fa-undo"/></div>
          <div class="small-label">Start Again</div>
        </span>
      </div>

      <div
        :class="shouldSetElementWidth"
        class="btn__big">
        <a
          class="sm-hidden"
          href="https://www.laprairie.ch/"
          target="_blank"
          rel="noopener noreferrer">
          Discover La Prairie
        </a>
        <a
          class="md-hidden"
          href="https://www.laprairie.ch/"
          target="_blank"
          rel="noopener noreferrer">
          <div><i class="fal fa-home"/></div>
          <div class="small-label">La Prairie</div>
        </a>
      </div>
    </div>
  </div>
</template>

<script>
import AppFeaturedProgram from "../components/UI/AppFeaturedProgram";
import AppProgram from "../components/UI/AppProgram";
import { mapGetters } from "vuex";

export default {
  components: {
    AppFeaturedProgram,
    AppProgram
  },
  data() {
    return {
      programs: [],
      featuredProgram: null,
      userConsents: false,
      displayProgramsNow: false
    };
  },
  computed: {
    ...mapGetters([
      "getPrograms",
      "getAnswers",
      "getOptions",
      "getQuestions",
      "getCurrentUser"
    ]),
    /**
     * Set element's width to 50% if user hasn't agreed to share his personal details.
     */
    shouldSetElementWidth() {
      return this.userConsents ? "" : "btn__big--half";
    },
    shouldDisplayProgramsNow() {
      return this.programs.length && this.displayProgramsNow;
    }
  },
  created() {
    /**
     * Initialize the component.
     */
    if (window.currentUser) {
      this.initComponent();
    } else if (this.$route.query.name) {
      this.$store
        .dispatch("loginExistingDiagnosticUser", this.$route.query.name)
        .then(() => {
          this.initComponent();
        });
    }
  },
  beforeRouteLeave(to, from, next) {
    this.$store.dispatch("logoutDiagnosticUser").then(() => {
      next();
    });
  },
  methods: {
    /**
     * Send the user a mail along with a token used to consult his results.
     */
    sendMeMyResults() {
      this.$store.dispatch("toggleLoader");
      window.axios
        .get(window.route("api.diagnostics.send"))
        .then(res => {
          this.$store.dispatch("toggleLoader");
          if (res.status === 204) {
            this.$toasted.global.success({
              message:
                "We've sent you an email containing a permanent link to this session's results!"
            });
          } else {
            this.$toasted.global.danger({
              message: `Something went wrong. ${res.status} ${res.statusText}.`
            });
          }
        })
        .catch(err => {
          this.$store.dispatch("toggleLoader");
          this.$toasted.global.danger({
            message: `Something went wrong. ${err.status} ${err.statusText}.`
          });
        });
    },
    /**
     * Log out the user and redirect him to the home page.
     */
    startAgain() {
      this.$store.dispatch("toggleLoader");
      this.$store
        .dispatch("logoutDiagnosticUser")
        .then(() => {
          this.$store.dispatch("toggleLoader");
          this.$router.push({ name: "home" });
        })
        .catch(() => {
          this.$store.dispatch("toggleLoader");
        });
    },
    /**
     * Fetch the programs, options and existing answers.
     */
    initComponent() {
      this.$store.dispatch("toggleLoader");

      const fetchPrograms = this.$store.dispatch("fetchPrograms");
      const fetchExistingAnswers = this.$store.dispatch("fetchExistingAnswers");
      const fetchOptions = this.$store.dispatch("fetchOptions");
      const fetchQuestions = this.$store.dispatch("fetchQuestions");

      Promise.all([
        fetchPrograms,
        fetchExistingAnswers,
        fetchOptions,
        fetchQuestions
      ])
        .then(() => {
          setTimeout(() => {
            this.$store.dispatch("toggleLoader");
            this.getResultsByProgram();
            this.doesUserConsent();
          }, 3000);
        })
        .catch(() => {
          this.$store.dispatch("toggleLoader");
        });
    },
    /**
     * Get the full results for each program.
     */
    getResultsByProgram() {
      this.buildProgramsDataProperties();
      this.attributePoints();
      this.calculatePercentage();
      this.sortByPercentage();
      this.isolateFeaturedProgram();
      this.removeFeaturedProgramFromProgramsList();
      this.startProgramsDisplayDelayTimeout();
    },
    /**
     * Build the programs data properties.
     */
    buildProgramsDataProperties() {
      this.getPrograms.forEach(program => {
        let currentQuestion = 0;
        let max = 0;
        let sum = 0;

        // For each option associated with the current program.
        program.options.forEach(option => {
          // If the current program's id is the same as the option's associated program id.
          if (program.id === option.pivot.program_id) {
            // Check whether the question has changed.
            if (currentQuestion !== option.question_id) {
              currentQuestion = option.question_id;
              sum += max;
              max = 0;
            }

            // Check for max value and attribute new max if necessary.
            if (max < option.pivot.value) {
              max = option.pivot.value;
            }
          }
        });

        // Push the desired properties to the programs data property array.
        this.programs.push({
          id: program.id,
          title: program.title,
          slogan: program.slogan,
          url: program.url,
          points: 0,
          maxPoints: sum,
          percentage: 0
        });
      });
    },
    /**
     * Attribute points in relation with an option's weighting related to a program.
     */
    attributePoints() {
      this.getAnswers.forEach(answer => {
        answer.option.programs.forEach(program => {
          this.programs.forEach(item => {
            if (item.id === program.id) {
              item.points += program.pivot.value;
            }
          });
        });
      });
    },
    /**
     * Determine if user consents to sharing personal details.
     */
    doesUserConsent() {
      if (this.getCurrentUser.user_consents) {
        this.userConsents = true;
      }
    },
    /**
     * Calculate the percentage property.
     */
    calculatePercentage() {
      this.programs.forEach(program => {
        program.percentage = Math.ceil(
          Math.round(program.points / program.maxPoints * 100)
        );
      });
    },
    sortByPercentage() {
      this.programs.sort((a, b) => {
        return b.percentage - a.percentage;
      });
    },
    isolateFeaturedProgram() {
      this.featuredProgram = this.programs.slice(0, 1);
      this.featuredProgram = this.featuredProgram[0];
    },
    removeFeaturedProgramFromProgramsList() {
      this.programs.shift();
    },
    startProgramsDisplayDelayTimeout() {
      setTimeout(() => {
        this.displayProgramsNow = true;
      }, 3000);
    }
  }
};
</script>
