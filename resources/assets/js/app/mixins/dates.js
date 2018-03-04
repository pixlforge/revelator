import moment from 'moment'

export const dates = {
  methods: {
    formatDate(value) {
      return moment(value).format('Do MMMM YYYY')
    }
  }
}