<template>
  <div class="h-screen">
    <div class="py-8 px-8 bg-indigo-800 text-gray-400 h-full flex flex-col justify-between">
      <ul class="flex flex-col">
        <li class="py-3 border-t border-white capitalize tracking-wide font-sans font-medium text-md hover:text-white cursor-pointer transition-all ease-linear duration-100" @click="emitChangeEvent('account')">
          Account
        </li>
        <li class="py-3 border-t border-white capitalize tracking-wide font-sans font-medium text-md hover:text-white cursor-pointer transition-all ease-linear duration-100" @click="emitChangeEvent('channels')">
          My channels
        </li>
        <li class="py-3 border-t border-white capitalize tracking-wide font-sans font-medium text-md hover:text-white cursor-pointer transition-all ease-linear duration-100" @click="emitChangeEvent('security')">
          Security
        </li>
        <li class="py-3 border-t border-white capitalize tracking-wide font-sans font-medium text-md hover:text-white cursor-pointer transition-all ease-linear duration-100" @click="emitChangeEvent('tokens')">
          Tokens / API keys
        </li>
        <li class="py-3 border-t border-white capitalize tracking-wide font-sans font-medium text-md hover:text-white cursor-pointer transition-all ease-linear duration-100" @click="emitChangeEvent('notifications')">
          Notifications
        </li>
        <li class="py-3 border-t border-white capitalize tracking-wide font-sans font-medium text-md hover:text-white cursor-pointer transition-all ease-linear duration-100" @click="emitChangeEvent('email')">
          Email address
        </li>
        <li class="py-3 border-t border-white capitalize tracking-wide font-sans font-medium text-md hover:text-white cursor-pointer transition-all ease-linear duration-100" @click="emitChangeEvent('delete')">
          Delete account
        </li>
        <li class="py-3 border-t border-white tracking-wide border-b cursor-pointer transition-all ease-linear duration-100">
          <form @click.prevent="submit">
            <button type="submit" class="capitalize font-sans font-medium text-md hover:text-white">
              Sign out
            </button>
          </form>
        </li>
      </ul>
      <div class="flex justify-between">
        <button class="bg-white opacity-25 flex items-center justify-center text-black font-semibold rounded-lg mb-1 overflow-hidden hover:opacity-75 transition-all ease-linear duration-100 px-2" @click="goToMainChat">
          Go back
        </button>
        <button class="bg-white opacity-25 h-12 w-12 flex items-center justify-center text-black text-2xl font-semibold rounded-lg mb-1 overflow-hidden hover:opacity-75 transition-all ease-linear duration-100">
          <
        </button>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios'

export default {
  methods: {
    goToMainChat() {
      location.href = location.origin
    },
    emitChangeEvent(to) {
      this.$emit('change-tab-event', to)
    },
    submit() {
      axios.post(`${location.origin}/logout`)
      location.href = location.origin
    }
  }
}
</script>