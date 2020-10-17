<template>
  <div class="bg-indigo-800 h-full flex-none w-64 pb-6 text-purple-100 md:block">
    <div class="text-white mb-2 mt-3 px-4 flex justify-between">
      <div class="flex-auto">
        <h1 class="font-semibold text-xl leading-tight mb-1 truncate">Slackavel</h1>
        <div class="flex items-center mb-6">
          <span :class="`${status === 'online' ? 'bg-green-500' : 'bg-red-500'} rounded-full block w-2 h-2 mr-2`"></span>
          <span class="text-white opacity-50 text-sm">{{ user.username }}</span>
        </div>
      </div>
      <div class="cursor-pointer">
        <svg class="h-6 w-6 fill-current text-white opacity-25 hover:opacity-100" viewBox="0 0 20 20">
          <path d="M14 8a4 4 0 1 0-8 0v7h8V8zM8.027 2.332A6.003 6.003 0 0 0 4 8v6l-3 2v1h18v-1l-3-2V8a6.003 6.003 0 0 0-4.027-5.668 2 2 0 1 0-3.945 0zM12 18a2 2 0 1 1-4 0h4z" fill-rule="evenodd" />
        </svg>
      </div>
    </div>

    <div class="mb-8">
      <div class="px-4 mb-2 text-white flex justify-between items-center">
        <div class="opacity-75">Channels</div>
        <div class="cursor-pointer" @click="openModal">
          <svg class="fill-current h-4 w-4 opacity-50 hover:opacity-100" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
            <path d="M11 9h4v2h-4v4H9v-4H5V9h4V5h2v4zm-1 11a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16z" />
          </svg>
        </div>
      </div>
      <!-- <channels-list :channels="channels"></channels-list> -->
      <div class="flex items-center justify-start mb-3 px-4" v-for="channel in channels" :key="channel.id">
        <button 
          class="text-white hover:bg-teal-400 w-full text-left outline-none"
          @click="emitJoinEvent(channel.id)"
        >
          # {{ channel.channel_name }}
        </button>
      </div>
    </div>

    <div class="mb-8">
      <div class="px-4 mb-2 text-white flex justify-between items-center">
        <div class="opacity-50">Direct Messages</div>
        <div class="cursor-pointer">
          <svg class="fill-current h-4 w-4 opacity-50 hover:opacity-100" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
            <path d="M11 9h4v2h-4v4H9v-4H5V9h4V5h2v4zm-1 11a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16z" />
          </svg>
        </div>
      </div>
      <users-list :authuser="user" :currentUserStatus="status"></users-list>
    </div>

    <div>
      <div class="px-4 mb-2 text-white flex justify-between items-center">
        <div class="opacity-75">Profile settings</div>
        <div class="cursor-pointer" @click="goToProfile">
          <font-awesome-icon :icon="faCog" size="1x" class="opacity-50 hover:opacity-100" />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import ChannelsList from './ChannelsList.vue'
import UsersList from './UsersList.vue'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { faCog } from '@fortawesome/free-solid-svg-icons'

export default {
  components: {
    ChannelsList,
    UsersList,
    FontAwesomeIcon
  },
  props: {
    user: {
      type: Object,
      required: true,
    },
    status: {
      type: String
    },
    channels: {
      type: Array
    }
  },
  data() {
    return {
      faCog: faCog
    }
  },
  methods: {
    openModal() {
      this.$emit('openmodalevent')
    },
    emitJoinEvent(channelId) {
      this.$emit('joinchannelevent', {
        channelId,
        userId: this.user.id
      })
    },
    goToProfile() {
      location.href = `${location.origin}/profile`
    }
  }
}
</script>
