import App from './App'
import ViewHome from './views/ViewHome'
import ViewHello from './views/ViewHello'

import ViewLogin from './views/auth/ViewLogin'
import ViewResetEmail from './views/auth/passwords/ViewResetEmail'
import ViewResetPassword from './views/auth/passwords/ViewResetPassword'

import ViewAdminDashboard from './views/admin/ViewAdminDashboard'

import ViewUserIndex from './views/admin/users/ViewUserIndex'
import ViewUserCreate from './views/admin/users/ViewUserCreate'
import ViewUserEdit from './views/admin/users/ViewUserEdit'

import ViewQuestionIndex from './views/admin/questions/ViewQuestionIndex'
import ViewQuestionCreate from './views/admin/questions/ViewQuestionCreate'
import ViewQuestionEdit from './views/admin/questions/ViewQuestionEdit'

import ViewOptionIndex from './views/admin/options/ViewOptionIndex'
import ViewOptionCreate from './views/admin/options/ViewOptionCreate'
import ViewOptionEdit from './views/admin/options/ViewOptionEdit'

import ViewProgramIndex from './views/admin/programs/ViewProgramIndex'
import ViewProgramCreate from './views/admin/programs/ViewProgramCreate'
import ViewProgramEdit from './views/admin/programs/ViewProgramEdit'

import { store } from './store'

export const routes = [
  /**
   * Home
   */
  {
    path: '/',
    name: 'home',
    component: ViewHome
  },

  /**
   * Hello
   */
  {
    path: '/hello',
    name: 'hello',
    component: ViewHello
  },

  /**
   * Login
   */
  {
    path: '/login',
    name: 'auth.login',
    component: ViewLogin,
    beforeEnter: (to, from, next) => {
      if (!window.currentUser) {
        next()
      } else {
        next({ name: 'admin' })
      }
    }
  },

  /**
   * Reset Email
   */
  {
    path: '/reset/email',
    name: 'reset.email',
    component: ViewResetEmail
  },

  /**
   * Reset Password
   */
  {
    path: '/reset/password/:token',
    name: 'reset.password',
    component: ViewResetPassword
  },

  /**
   * Admin Dashboard
   */
  {
    path: '/admin/dashboard',
    name: 'admin',
    component: ViewAdminDashboard
  },

  /**
   * User Index
   */
  {
    path: '/admin/users',
    name: 'admin.users.index',
    component: ViewUserIndex
  },

  /**
   * User Create
   */
  {
    path: '/admin/users/create',
    name: 'admin.users.create',
    component: ViewUserCreate
  },

  /**
   * User Edit
   */
  {
    path: '/admin/users/:id/edit',
    name: 'admin.users.edit',
    component: ViewUserEdit
  },

  /**
   * Questions Index
   */
  {
    path: '/admin/questions',
    name: 'admin.questions.index',
    component: ViewQuestionIndex
  },

  /**
   * Questions Create
   */
  {
    path: '/admin/questions/create',
    name: 'admin.questions.create',
    component: ViewQuestionCreate
  },

  /**
   * Questions Edit
   */
  {
    path: '/admin/questions/:id/edit',
    name: 'admin.questions.edit',
    component: ViewQuestionEdit
  },

  /**
   * Options Index
   */
  {
    path: '/admin/options',
    name: 'admin.options.index',
    component: ViewOptionIndex
  },

  /**
   * Options Create
   */
  {
    path: '/admin/options/create',
    name: 'admin.options.create',
    component: ViewOptionCreate
  },

  /**
   * Options Edit
   */
  {
    path: '/admin/options/:id/edit',
    name: 'admin.options.edit',
    component: ViewOptionEdit
  },

  /**
   * Programs Index
   */
  {
    path: '/admin/programs',
    name: 'admin.programs.index',
    component: ViewProgramIndex
  },

  /**
   * Programs Create
   */
  {
    path: '/admin/programs/create',
    name: 'admin.programs.create',
    component: ViewProgramCreate
  },

  /**
   * Programs Edit
   */
  {
    path: '/admin/programs/:id/edit',
    name: 'admin.programs.edit',
    component: ViewProgramEdit
  },

  /**
   * Catch-all
   */
  {
    path: '/*',
    redirect: {
      name: 'home'
    }
  }
]