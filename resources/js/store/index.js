import Vuex from 'vuex'
import Vue from 'vue'
import axios from 'axios'
require('../bootstrap')

Vue.use(Vuex)

const store = new Vuex.Store({
  state: {
    channels: [],
    messages: [],
    loading: false,
    currentChannel: {},
    error: {},
    user: {},
    users: [],
  },
  mutations: {
    setMessages(state, payload) {
      state.messages = payload
      state.loading = false
    },
    updateMessages(state, payload) {
      state.messages = state.messages.push(payload)
    },
    updateChannels(state, payload) {
      state.channels = payload
    },
    updateCurrentChannel(state, payload) {
      state.currentChannel = payload
    },
    setUser(state, payload) {
      state.user = payload
    },
    setUsers(state, payload) {
      state.users = payload
    }
  },
  actions: {
    async fetchMessages({ commit }) {
      try {
        const response = await axios.get(`messages`)
        commit('setMessages', response.data)
      } catch (error) {
        console.log(error)
      }

      let listOfMessages = document.querySelector('.messages-list')

      setTimeout(() => {
        listOfMessages.scrollTo('0', listOfMessages.scrollHeight)
      }, 100)
    },
    async addMessage({ commit }, message) {
      let messagesList = document.querySelector('.messages-list')
      const response = await axios.post('/messages', message)
      commit('updateMessages', message)

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
    async fetchChannels({ commit }) {
      const response = await axios.get('/api/channels')
      commit('updateChannels', response.data)
    },
    async fetchCurrentChannel({ commit }) {
      const response = await axios.get('currentChannel')
      commit('updateCurrentChannel', response.data)
    },
    async createChannel({ dispatch }, channel) {
      try {
        const response = await axios.post('createChannel', channel)
        dispatch('fetchMessages')
        dispatch('fetchCurrentChannel')
      } catch (error) {
        console.log(error)
      }
    },
    async joinChannel({ dispatch, commit }, channel) {
      try {
        const response = axios.get(`joinChannel/${channel.id}/${channel.userId}`)
        dispatch('fetchCurrentChannel')
        dispatch('fetchMessages')

        Echo.join(`channel.${channel.id}`)
          .listen('MessageSent', e => {
            commit('setMessages', {
              message: e.message.message,
              user: e.user
            })
          })
      } catch (error) {
        console.log(error)
      }
    },
    async fetchUser({ commit }) {
      try {
        const user = await axios.get('/api/user')
        commit('setUser', user)
      } catch (error) {
        console.log(error)
      }
    },
    async fetchUsers({ commit }) {
      try {
        const users = await axios.get('/api/users')
        commit('setUsers', users)
      } catch (error) {
        console.log(error)
      }
    }
  }
})

export default store