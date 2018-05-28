import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export const store = new Vuex.Store({
  state: {
    loader: {
      show: false
    },
    showContent: true,
    passwordVisibility: false,
    currentUser: null,
    currentQuestion: 0,
    users: [],
    questions: [],
    programs: [],
    options: [],
    answers: [],
  },
  getters: {
    loaderState: state => {
      return state.loader.show
    },
    passwordVisibilityState: state => {
      return state.passwordVisibility
    },
    passwordFieldType: state => {
      if (state.passwordVisibility === true) {
        return 'text'
      } else {
        return 'password'
      }
    },
    getCurrentUser: state => {
      return state.currentUser
    },
    getUsers: state => {
      return state.users
    },
    getQuestions: state => {
      return state.questions
    },
    getPrograms: state => {
      return state.programs
    },
    getOptions: state => {
      return state.options
    },
    getAnswers: state => {
      return state.answers
    },
    getCurrentQuestion: state => {
      return state.currentQuestion
    },
    getShowContentStatus: state => {
      return state.showContent
    }
  },
  mutations: {
    /**
     * toggleLoader Mutation
     */
    toggleLoader: state => {
      state.loader.show = !state.loader.show
      document.querySelector('body').classList.toggle('loader__on')
    },
    /**
     * togglePasswordVisiblity Mutation
     */
    togglePasswordVisiblity: state => {
      state.passwordVisibility = !state.passwordVisibility
    },
    /**
     * hydrateCurrentUser Mutation
     */
    hydrateCurrentUser: (state, payload) => {
      window.currentUser = payload
      state.currentUser = payload
    },
    /**
     * fetchUsers Mutation
     */
    fetchUsers: (state, payload) => {
      state.users = payload
    },
    /**
     * fetchQuestions Mutation
     */
    fetchQuestions: (state, payload) => {
      state.questions = payload
    },
    /**
     * fetchPrograms Mutation
     */
    fetchPrograms: (state, payload) => {
      state.programs = payload
    },
    /**
     * fetchOptions Mutation
     */
    fetchOptions: (state, payload) => {
      state.options = payload
    },
    /**
     * addAnswer Mutation
     */
    addAnswer: (state, payload) => {
      let found = state.answers.find(answer => {
        return answer.question_id === payload.question_id
      })
      if (found) {
        found.option_id = payload.option_id
        found.label = payload.label
      } else {
        state.answers.push(payload)
      }
    },
    /**
     * clearAnswers Mutation
     */
    clearAnswers: state => {
      state.answers = []
    },
    /**
     * fetchExistingAnswers Mutation
     */
    fetchExistingAnswers: (state, payload) => {
      state.answers = payload
      state.answers.forEach(answer => {
        Vue.set(answer, 'label')
      })
    },
    /**
     * incrementCurrentQuestion Mutation
     */
    incrementCurrentQuestion: state => {
      state.currentQuestion++
    },
    /**
     * decrementCurrentQuestion Mutation
     */
    decrementCurrentQuestion: state => {
      state.currentQuestion--
    },
    /**
     * setCurrentQuestion Mutation
     */
    setCurrentQuestion: (state, payload) => {
      state.currentQuestion = payload
    },
    /**
     * setShowContentValue Mutation
     */
    setShowContentValue: (state, payload) => {
      state.showContent = payload
    },
    /**
     * setUserConsent Mutation
     */
    setUserConsent: (state, payload) => {
      state.currentUser.user_consents = payload
    },
    /**
     * setUserDetails Mutation
     */
    setUserDetails: (state, payload) => {
      state.currentUser.first_name = payload.first_name
      state.currentUser.last_name = payload.last_name
      state.currentUser.guest_email = payload.guest_email
    },
    /**
     * Logout Mutation
     */
    logout: state => {
      window.currentUser = null
      state.currentUser = null
    }
  },
  actions: {
    /**
     * toggleLoader Action
     *
     * Toggles the spinner and the dimmed background.
     */
    toggleLoader: ({ commit }) => {
      commit('toggleLoader')
    },
    /**
     * togglePasswordVisiblity Action
     *
     * Toggles the visibility of the password.
     */
    togglePasswordVisiblity: ({ commit }) => {
      commit('togglePasswordVisiblity')
    },
    /**
     * hydrateCurrentUser Action
     *
     * Hydrate the current user.
     */
    hydrateCurrentUser: ({ commit }, payload) => {
      commit('hydrateCurrentUser', payload)
    },
    /**
     * fetchUsers Action
     */
    fetchUsers: ({ commit, dispatch }) => {
      dispatch('toggleLoader')
      return new Promise((resolve, reject) => {
        window.axios.get(window.route('api.users.index')).then(({ data }) => {
          commit('fetchUsers', data)
          dispatch('toggleLoader')
          resolve(data)
        }).catch(err => {
          dispatch('toggleLoader')
          reject(err)
        })
      })
    },
    /**
     * getUser Action
     */
    getUser: ({ dispatch }, payload) => {
      dispatch('toggleLoader')
      return new Promise((resolve, reject) => {
        window.axios.get(window.route('api.users.edit', [payload])).then(({ data }) => {
          dispatch('toggleLoader')
          resolve(data)
        }).catch(err => {
          dispatch('toggleLoader')
          reject(err)
        })
      })
    },
    /**
     * addUser Action
     */
    addUser: ({ dispatch }, payload) => {
      dispatch('toggleLoader')
      return new Promise((resolve, reject) => {
        window.axios.post(window.route('api.users.store'), payload).then(() => {
          dispatch('toggleLoader')
          resolve()
        }).catch(err => {
          dispatch('toggleLoader')
          reject(err)
        })
      })
    },
    /**
     * updateUser Action
     */
    updateUser: ({ dispatch }, payload) => {
      dispatch('toggleLoader')
      return new Promise((resolve, reject) => {
        window.axios.patch(window.route('api.users.update', payload.id), payload).then(({ data }) => {
          dispatch('toggleLoader')
          resolve(data)
        }).catch(err => {
          dispatch('toggleLoader')
          reject(err)
        })
      })
    },
    /**
     * deleteUser Action
     */
    deleteUser: ({ dispatch }, payload) => {
      dispatch('toggleLoader')
      return new Promise((resolve, reject) => {
        window.axios.delete(window.route('api.users.destroy', [payload.id])).then(() => {
          dispatch('toggleLoader')
          dispatch('fetchUsers')
          resolve()
        }).catch(err => {
          dispatch('toggleLoader')
          reject(err)
        })
      })
    },
    /**
     * fetchQuestions Action
     */
    fetchQuestions: ({ commit }) => {
      return new Promise((resolve, reject) => {
        window.axios.get(window.route('api.questions.index')).then(({ data }) => {
          commit('fetchQuestions', data)
          resolve(data)
        }).catch(err => {
          reject(err)
        })
      })
    },
    /**
     * addQuestion Action
     */
    addQuestion: ({ dispatch }, payload) => {
      dispatch('toggleLoader')
      return new Promise((resolve, reject) => {
        window.axios.post(window.route('api.questions.store'), payload).then(() => {
          dispatch('toggleLoader')
          resolve()
        }).catch(err => {
          dispatch('toggleLoader')
          reject(err)
        })
      })
    },
    /**
     * getQuestion Action
     */
    getQuestion: ({ dispatch }, payload) => {
      dispatch('toggleLoader')
      return new Promise((resolve, reject) => {
        window.axios.get(window.route('api.questions.edit', [payload])).then(({ data }) => {
          dispatch('toggleLoader')
          resolve(data)
        }).catch(err => {
          dispatch('toggleLoader')
          reject(err)
        })
      })
    },
    /**
     * updateQuestion Action
     */
    updateQuestion: ({ dispatch }, payload) => {
      dispatch('toggleLoader')
      return new Promise((resolve, reject) => {
        window.axios.patch(window.route('api.questions.update', payload.id), payload).then(({ data }) => {
          dispatch('toggleLoader')
          resolve(data)
        }).catch(err => {
          dispatch('toggleLoader')
          reject(err)
        })
      })
    },
    /**
     * deleteQuestion Action
     */
    deleteQuestion: ({ dispatch }, payload) => {
      dispatch('toggleLoader')
      return new Promise((resolve, reject) => {
        window.axios.delete(window.route('api.questions.destroy', [payload.id])).then(() => {
          dispatch('toggleLoader')
          dispatch('fetchQuestions')
          resolve()
        }).catch(err => {
          dispatch('toggleLoader')
          reject(err)
        })
      })
    },
    /**
     * fetchPrograms Action
     */
    fetchPrograms: ({ commit }) => {
      return new Promise((resolve, reject) => {
        window.axios.get(window.route('api.programs.index')).then(({ data }) => {
          commit('fetchPrograms', data)
          resolve(data)
        }).catch(err => {
          reject(err)
        })
      })
    },
    /**
     * getProgram Action
     */
    getProgram: ({ dispatch }, payload) => {
      dispatch('toggleLoader')
      return new Promise((resolve, reject) => {
        window.axios.get(window.route('api.programs.edit', [payload])).then(({ data }) => {
          dispatch('toggleLoader')
          resolve(data)
        }).catch(err => {
          dispatch('toggleLoader')
          reject(err)
        })
      })
    },
    /**
     * addProgram Action
     */
    addProgram: ({ dispatch }, payload) => {
      dispatch('toggleLoader')
      return new Promise((resolve, reject) => {
        window.axios.post(window.route('api.programs.store'), payload).then(() => {
          dispatch('toggleLoader')
          resolve()
        }).catch(err => {
          dispatch('toggleLoader')
          reject(err)
        })
      })
    },
    /**
     * updateProgram Action
     */
    updateProgram: ({ dispatch }, payload) => {
      dispatch('toggleLoader')
      return new Promise((resolve, reject) => {
        window.axios.patch(window.route('api.programs.update', payload.id), payload).then(({ data }) => {
          dispatch('toggleLoader')
          resolve(data)
        }).catch(err => {
          dispatch('toggleLoader')
          reject(err)
        })
      })
    },
    /**
     * deleteProgram Action
     */
    deleteProgram: ({ dispatch }, payload) => {
      dispatch('toggleLoader')
      return new Promise((resolve, reject) => {
        window.axios.delete(window.route('api.programs.destroy', [payload.id])).then(() => {
          dispatch('toggleLoader')
          dispatch('fetchPrograms')
          resolve()
        }).catch(err => {
          dispatch('toggleLoader')
          reject(err)
        })
      })
    },
    /**
     * fetchOptions Action
     */
    fetchOptions: ({ commit }) => {
      return new Promise((resolve, reject) => {
        window.axios.get(window.route('api.options.index')).then(({ data }) => {
          commit('fetchOptions', data)
          resolve(data)
        }).catch(err => {
          reject(err)
        })
      })
    },
    /**
     * getOption Action
     */
    getOption: (context, payload) => {
      return new Promise((resolve, reject) => {
        window.axios.get(window.route('api.options.edit', [payload])).then(({ data }) => {
          resolve(data)
        }).catch(err => {
          reject(err)
        })
      })
    },
    /**
     * addOption Action
     */
    addOption: ({ dispatch }, payload) => {
      dispatch('toggleLoader')
      return new Promise((resolve, reject) => {
        window.axios.post(window.route('api.options.store'), payload).then(() => {
          dispatch('toggleLoader')
          resolve()
        }).catch(err => {
          dispatch('toggleLoader')
          reject(err)
        })
      })
    },
    /**
     * updateOption Action
     */
    updateOption: ({ dispatch }, payload) => {
      dispatch('toggleLoader')
      return new Promise((resolve, reject) => {
        window.axios.patch(window.route('api.options.update', payload.id), payload).then(({ data }) => {
          dispatch('toggleLoader')
          resolve(data)
        }).catch(err => {
          dispatch('toggleLoader')
          reject(err)
        })
      })
    },
    /**
     * deleteOption Action
     */
    deleteOption: ({ dispatch }, payload) => {
      dispatch('toggleLoader')
      return new Promise((resolve, reject) => {
        window.axios.delete(window.route('api.options.destroy', [payload.id])).then(() => {
          dispatch('toggleLoader')
          dispatch('fetchOptions')
          resolve()
        }).catch(err => {
          dispatch('toggleLoader')
          reject(err)
        })
      })
    },
    /**
     * logoutDiagnosticUser Action
     */
    logoutDiagnosticUser: ({ commit }) => {
      return new Promise((resolve, reject) => {
        window.axios.get(window.route('api.diagnostics.logout')).then(() => {
          commit('logout')
          commit('clearAnswers')
          resolve()
        }).catch(() => {
          reject()
        })
      })
    },
    /**
     * loginDiagnosticUser Action
     */
    loginDiagnosticUser: ({ dispatch }) => {
      dispatch('toggleLoader')
      return new Promise((resolve, reject) => {
        window.axios.get(window.route('api.diagnostics.login')).then(({ data }) => {
          dispatch('toggleLoader')
          dispatch('hydrateCurrentUser', data)
          resolve()
        }).catch(() => {
          dispatch('toggleLoader')
          reject()
        })
      })
    },
    /**
     * loginExistingDiagnosticUser Action
     */
    loginExistingDiagnosticUser: ({ dispatch }, payload) => {
      return new Promise((resolve, reject) => {
        window.axios.get(window.route('api.diagnostics.login', [payload])).then(({ data }) => {
          dispatch('hydrateCurrentUser', data)
          resolve()
        }).catch(err => {
          reject(err)
        })
      })
    },
    /**
     * addAnswer Action
     */
    addAnswer: ({ commit }, payload) => {
      commit('addAnswer', payload)
      window.axios.post(window.route('api.answers.store'), payload)
    },
    /**
     * fetchExistingAnswers Action
     */
    fetchExistingAnswers: ({ commit }) => {
      return new Promise((resolve, reject) => {
        window.axios.get(window.route('api.answers.index')).then(({ data }) => {
          commit('fetchExistingAnswers', data)
          resolve(data)
        }).catch(err => {
          reject(err)
        })
      })
    },
    /**
     * Logout Action
     */
    logout: ({ commit, dispatch }) => {
      commit('toggleLoader')
      return new Promise((resolve, reject) => {
        window.axios.post(window.route('logout')).then(() => {
          commit('logout')
          dispatch('toggleLoader')
          resolve()
        }).catch(err => {
          dispatch('toggleLoader')
          reject(err)
        })
      })
    },
    /**
     * Login Action
     */
    login: ({ dispatch }, payload) => {
      dispatch('toggleLoader')
      return new Promise((resolve, reject) => {
        window.axios.post(window.route('login'), payload).then(({ data }) => {
          dispatch('hydrateCurrentUser', data)
          dispatch('toggleLoader')
          resolve(data)
        }).catch(err => {
          dispatch('toggleLoader')
          reject(err)
        })
      })
    },
    /**
     * incrementCurrentQuestion Action
     */
    incrementCurrentQuestion: ({ commit }) => {
      commit('incrementCurrentQuestion')
    },
    /**
     * decrementCurrentQuestion Action
     */
    decrementCurrentQuestion: ({ commit }) => {
      commit('decrementCurrentQuestion')
    },
    /**
     * setCurrentQuestion Action
     */
    setCurrentQuestion: ({ commit }, payload) => {
      commit('setCurrentQuestion', payload)
    },
    /**
     * updateGuestInfos Action
     */
    updateGuestInfos: ({ dispatch, commit, state }, payload) => {
      dispatch('toggleLoader')
      return new Promise((resolve, reject) => {
        window.axios.patch(window.route('api.diagnostics.update', state.currentUser.id), {
          user_consents: payload.user_consents,
          first_name: payload.first_name,
          last_name: payload.last_name,
          guest_email: payload.guest_email
        }).then(() => {
          commit('setUserConsent', payload.user_consents)
          commit('setUserDetails', {
            first_name: payload.first_name,
            last_name: payload.last_name,
            guest_email: payload.guest_email
          })
          dispatch('toggleLoader')
          resolve()
        }).catch(err => {
          dispatch('toggleLoader')
          reject(err)
        })
      })
    },
    /**
     * setShowContentValue Action
     */
    setShowContentValue: ({ commit }, payload) => {
      commit('setShowContentValue', payload)
    }
  }
})