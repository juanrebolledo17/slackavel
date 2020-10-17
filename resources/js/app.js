import store from './store'
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('sidebar', require('./components/Sidebar.vue').default);
Vue.component('navbar', require('./components/Navbar.vue').default);
Vue.component('channel-header', require('./components/ChannelHeader.vue').default);
Vue.component('message-list', require('./components/MessageList.vue').default);
Vue.component('message-form', require('./components/MessageForm.vue').default);
Vue.component('create-channel-modal', require('./components/CreateChannelModal.vue').default);

// profile components
Vue.component('profile-sidebar', require('./components/profile/ProfileSidebar.vue').default);
Vue.component('account', require('./components/profile/Account.vue').default);
Vue.component('channels', require('./components/profile/Channels.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    store,
    data: {
      messages: [],
      channels: [],
      loading: false,
      currentChannel: {},
      user: {},
      profileTab: 'channels',
    },
    created() {
      this.loading = true
      this.fetchCurrentChannel()
      this.fetchChannels()
      this.fetchMessages()

      // this.$store.dispatch('fetchMessages')
      // this.$store.dispatch('fetchCurrentChannel')
      // this.$store.dispatch('fetchChannels')
      // this.$store.dispatch('fetchUser')
      // this.$store.dispatch('fetchUsers')
    },
    methods: {
      async fetchMessages() {    
        try {
          const response = await axios.get(`messages`)
          this.messages = response.data
          this.loading = false
        } catch (error) {
          console.log(error)
        }

        let listOfMessages = document.querySelector('.messages-list')

        setTimeout(() => {
          listOfMessages.scrollTo('0', listOfMessages.scrollHeight)
        }, 100)
      },
      async addMessage(message) {
        let messagesList = document.querySelector('.messages-list')

        this.messages.push(message)
        const response = await axios.post('/messages', message)

        messagesList.scrollTo('0', messagesList.scrollHeight)
      },
      openModal() {
        const containerElement = document.querySelector('#create_channel_container')
        containerElement.classList.remove('hidden')
      },
      closeModal() {
        const containerElement = document.querySelector('#create_channel_container')
        containerElement.classList.add('hidden')
      },
      async fetchChannels() {
        const response = await axios.get('/api/channels')
        this.channels = response.data
      },
      async fetchCurrentChannel() {
        const response = await axios.get('currentChannel')
        this.currentChannel = response.data
      },
      async createChannel(channel) {
        try {
          const response = await axios.post('createChannel', channel)
          this.fetchChannels()
          this.fetchCurrentChannel()
        } catch (error) {
          console.log(error)
        }
      },
      async joinChannel(channel) {
        try {
          const response = axios.get(`joinChannel/${channel.channelId}/${channel.userId}`)
          this.fetchCurrentChannel()
          this.fetchMessages()

          Echo.join(`channel.${channel.channelId}`)
            .listen('MessageSent', e => {
              this.messages.push({
                message: e.message.message,
                user: e.user
              })
            })
        } catch (error) {
          console.log(error)
        }
      },
      changeTab(to) {
        this.profileTab = to
      }
    },
});
