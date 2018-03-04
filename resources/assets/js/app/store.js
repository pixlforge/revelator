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
    users: [],
    questions: []
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
     * Logout Mutation
     */
    logout: state => {
      window.currentUser = null
      state.currentUser = {}
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
      dispatch('toggleLoader')
      return new Promise((resolve, reject) => {
        axios.get(route('api.questions.index')).then(({ data }) => {
          commit('fetchQuestions', data)
          dispatch('toggleLoader')
          resolve(data)
        }).catch(err => {
          dispatch('toggleLoader')
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
     * Logout Action
     */
    logout: ({ commit, dispatch }) => {
      commit('toggleLoader')
      return new Promise((resolve, reject) => {
        axios.post(route('logout')).then(() => {
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
    }
  }
})