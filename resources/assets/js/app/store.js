import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export const store = new Vuex.Store({
  state: {
    loader: {
      show: false
    },
    passwordVisibility: false,
    currentUser: null,
    currentQuestion: 0,
    users: [],
    questions: [],
    programs: [],
    options: [],
    answers: []
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
     * incrementCurrentQuestion Mutation
     */
    incrementCurrentQuestion: state => {
      state.currentQuestion++
    },

    /**
     * setCurrentQuestion Mutation
     */
    setCurrentQuestion: (state, payload) => {
      state.currentQuestion = payload
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
        axios.get(route('api.users.index')).then(({ data }) => {
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
    getUser: ({ commit, dispatch }, payload) => {
      dispatch('toggleLoader')
      return new Promise((resolve, reject) => {
        axios.get(route('api.users.edit', [payload])).then(({ data }) => {
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
    addUser: ({ commit, dispatch }, payload) => {
      dispatch('toggleLoader')
      return new Promise((resolve, reject) => {
        axios.post(route('api.users.store'), payload).then(() => {
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
    updateUser: ({ commit, dispatch }, payload) => {
      dispatch('toggleLoader')
      return new Promise((resolve, reject) => {
        axios.patch(route('api.users.update', payload.id), payload).then(({ data }) => {
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
    deleteUser: ({ commit, dispatch }, payload) => {
      dispatch('toggleLoader')
      return new Promise((resolve, reject) => {
        axios.delete(route('api.users.destroy', [payload.id])).then(() => {
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
    fetchQuestions: ({ commit, dispatch }) => {
      return new Promise((resolve, reject) => {
        axios.get(route('api.questions.index')).then(({ data }) => {
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
    addQuestion: ({ commit, dispatch }, payload) => {
      dispatch('toggleLoader')
      return new Promise((resolve, reject) => {
        axios.post(route('api.questions.store'), payload).then(() => {
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
    getQuestion: ({ commit, dispatch }, payload) => {
      dispatch('toggleLoader')
      return new Promise((resolve, reject) => {
        axios.get(route('api.questions.edit', [payload])).then(({ data }) => {
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
    updateQuestion: ({ commit, dispatch }, payload) => {
      dispatch('toggleLoader')
      return new Promise((resolve, reject) => {
        axios.patch(route('api.questions.update', payload.id), payload).then(({ data }) => {
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
    deleteQuestion: ({ commit, dispatch }, payload) => {
      dispatch('toggleLoader')
      return new Promise((resolve, reject) => {
        axios.delete(route('api.questions.destroy', [payload.id])).then(() => {
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
    fetchPrograms: ({ commit, dispatch }) => {
      return new Promise((resolve, reject) => {
        axios.get(route('api.programs.index')).then(({ data }) => {
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
    getProgram: ({ commit, dispatch }, payload) => {
      dispatch('toggleLoader')
      return new Promise((resolve, reject) => {
        axios.get(route('api.programs.edit', [payload])).then(({ data }) => {
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
    addProgram: ({ commit, dispatch }, payload) => {
      dispatch('toggleLoader')
      return new Promise((resolve, reject) => {
        axios.post(route('api.programs.store'), payload).then(() => {
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
    updateProgram: ({ commit, dispatch }, payload) => {
      dispatch('toggleLoader')
      return new Promise((resolve, reject) => {
        axios.patch(route('api.programs.update', payload.id), payload).then(({ data }) => {
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
    deleteProgram: ({ commit, dispatch }, payload) => {
      dispatch('toggleLoader')
      return new Promise((resolve, reject) => {
        axios.delete(route('api.programs.destroy', [payload.id])).then(() => {
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
    fetchOptions: ({ commit, dispatch }) => {
      dispatch('toggleLoader')
      return new Promise((resolve, reject) => {
        axios.get(route('api.options.index')).then(({ data }) => {
          commit('fetchOptions', data)
          dispatch('toggleLoader')
          resolve(data)
        }).catch(err => {
          dispatch('toggleLoader')
          reject(err)
        })
      })
    },

    /**
     * getOption Action
     */
    getOption: ({ commit, dispatch }, payload) => {
      return new Promise((resolve, reject) => {
        axios.get(route('api.options.edit', [payload])).then(({ data }) => {
          resolve(data)
        }).catch(err => {
          reject(err)
        })
      })
    },

    /**
     * addOption Action
     */
    addOption: ({ commit, dispatch }, payload) => {
      dispatch('toggleLoader')
      return new Promise((resolve, reject) => {
        axios.post(route('api.options.store'), payload).then(() => {
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
    updateOption: ({ commit, dispatch }, payload) => {
      dispatch('toggleLoader')
      return new Promise((resolve, reject) => {
        axios.patch(route('api.options.update', payload.id), payload).then(({ data }) => {
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
    deleteOption: ({ commit, dispatch }, payload) => {
      dispatch('toggleLoader')
      return new Promise((resolve, reject) => {
        axios.delete(route('api.options.destroy', [payload.id])).then(() => {
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
    logoutDiagnosticUser: ({ commit, dispatch }) => {
      return new Promise((resolve, reject) => {
        axios.get(route('api.diagnostics.logout')).then(() => {
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
    loginDiagnosticUser: ({ commit, dispatch }) => {
      return new Promise((resolve, reject) => {
        axios.get(route('api.diagnostics.login')).then(({ data }) => {
          dispatch('hydrateCurrentUser', data)
          resolve()
        }).catch(() => {
          reject()
        })
      })
    },

    /**
     * addAnswer Action
     */
    addAnswer: ({ commit, dispatch }, payload) => {
      commit('addAnswer', payload)
      axios.post(route('api.answers.store'), payload)
    },

    /**
     * Logout Action
     */
    logout: ({ commit, dispatch }) => {
      commit('toggleLoader')
      return new Promise((resolve, reject) => {
        axios.post(route('logout')).then(res => {
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
    login: ({ commit, dispatch }, payload) => {
      dispatch('toggleLoader')
      return new Promise((resolve, reject) => {
        axios.post(route('login'), payload).then(({ data }) => {
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
     * setCurrentQuestion Action
     */
    setCurrentQuestion: ({ commit }, payload) => {
      commit('setCurrentQuestion', payload)
    },
  }
})