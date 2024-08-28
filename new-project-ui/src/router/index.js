import Vue from 'vue'
import Router from 'vue-router'
import UserProfile from '@/components/UserProfile'
import ContactList from '@/components/ContactList'
import ContactForm from '@/components/ContactForm'
import ContactSearch from '@/components/ContactSearch'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/profile',
      name: 'UserProfile',
      component: UserProfile
    },
    {
      path: '/contacts',
      name: 'ContactList',
      component: ContactList
    },
    {
      path: '/contacts/:id',
      name: 'ContactForm',
      component: ContactForm
    },
    {
      path: '/contacts/search',
      name: 'ContactSearch',
      component: ContactSearch
    }
  ]
})
