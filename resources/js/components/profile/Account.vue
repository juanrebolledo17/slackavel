<template>
  <div>
    <div class="flex justify-between">
      <h1 class="capitalize text-gray-900 font-semibold text-xl">
        Account settings
      </h1>
      <div>
        <button class="focus:outline-none cursor-pointer" @click="toggleForm">
          <font-awesome-icon :icon="faEdit" size="1x" class="text-teal-700 hover:text-indigo-800 transition-all ease-linear duration-100" />
        </button>
      </div>
    </div>
    <hr class="mt-2 mb-4 border-t-2 border-gray-200">
    <form @click.prevent="submit">
      <div class="grid grid-cols-2 row-gap-4">
        <div>
          <p class="text-teal-900 text-lg mb-1">Firstname</p>
          <div v-if="showInputs">
            <input type="text" v-model="newFirstname" class="outline-none py-2 px-2 rounded border border-indigo-500">
          </div>
          <div v-else>
            <p class="text-gray-900 capitalize">{{ user.firstname }}</p>
          </div>
        </div>
        <div>
          <p class="text-teal-900 text-lg mb-1">Lastname</p>
          <div v-if="showInputs">
            <input type="text" v-model="newLastname" class="outline-none py-2 px-2 rounded border border-indigo-500">
          </div>
          <div v-else>
            <p class="text-gray-900 capitalize">{{ user.lastname }}</p>
          </div>
        </div>
        <div>
          <p class="text-teal-900 text-lg mb-1">Username</p>
          <div v-if="showInputs">
            <input type="text" v-model="newUsername" class="outline-none py-2 px-2 rounded border border-indigo-500">
          </div>
          <div v-else>
            <p class="text-gray-900 capitalize">{{ user.username }}</p>
          </div>
        </div>
        <div>
          <p class="text-teal-900 text-lg mb-2">Avatar</p>
          <div v-if="user.avatar_url">
            <img :src="user.avatar_url" alt="avatar image">
          </div>
          <div v-else>
            <img :src="placeholder" alt="avatar image" class="w-24 h-24 rounded-lg bg-gray-300">
          </div>
          <div class="mt-3" v-if="showInputs">
            <input type="file" name="avatar" id="avatar"> 
          </div>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
import placeholder from '../../../img/placeholder.png'
import axios from 'axios'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { faEdit } from '@fortawesome/free-solid-svg-icons'

export default {
  props: {
    'user': {
      type: Object
    }
  },
  components: {
    FontAwesomeIcon
  },
  data() {
    return {
      placeholder: placeholder,
      showInputs: false,
      newFirstname: this.user.firstname,
      newLastname: this.user.lastname,
      newUsername: this.user.username,
      newAvatar: this.user.avatar_url,
      faEdit: faEdit
    }
  },
  methods: {
    toggleForm() {
      this.showInputs = !this.showInputs
    },
    async submit() {
      const response = await axios.post('profile/update', {
        user_id: this.user.id,
        firstname: newFirstname,
        lastname: newLastname,
        username: newUsername,
        avatar_url: newAvatar
      })
      this.showInputs = false
    }
  }
}
</script>