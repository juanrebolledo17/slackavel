<template>
  <div>
    <div class="flex items-center mb-3 px-4" v-for="user in users">
      <span :class="`${user.online === '1' ? 'bg-green-500' : 'bg-red-500'} rounded-full block w-2 h-2 mr-2`"></span>
      <button class="text-white opacity-75 hover:opacity-100">
        {{ user.username }} <span :class="user.username === authuser.username ? 'text-grey text-sm' : 'hidden'">(you)</span>
      </button>
    </div>
  </div>
</template>

<script>
export default {
  props: ['authuser'],
  data() {
    return {
      users: [],
    }
  },
  created() {
    this.fetchUsers()
  },
  methods: {
    async fetchUsers() {
      const response = await axios.get('/api/users')
      this.users = response.data
    }
  }
}
</script>