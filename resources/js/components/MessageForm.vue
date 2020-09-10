<template>
  <div class="pb-6 px-4 flex-none">
    <form>
      <div class="flex rounded-lg border-2 border-gray-500 overflow-hidden">
        <button class="text-3xl text-gray-400 border-r-2 border-gray-500 p-2" type="submit" @click.prevent="sendMessage">
            <svg class="fill-current h-6 w-6 block" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M16 10c0 .553-.048 1-.601 1H11v4.399c0 .552-.447.601-1 .601-.553 0-1-.049-1-.601V11H4.601C4.049 11 4 10.553 4 10c0-.553.049-1 .601-1H9V4.601C9 4.048 9.447 4 10 4c.553 0 1 .048 1 .601V9h4.399c.553 0 .601.447.601 1z"/></svg>
        </button>
        <input type="text" class="w-full px-4" :placeholder="`Message #${currentChannel}`" v-model="newMessage"/>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  props: ['user'],
  data() {
    return {
      currentChannel: 'general',
      newMessage: '',
      send_at: null, 
    }
  },
  methods: {
    sendMessage() {
      this.send_at = `${new Date().getHours()}:${new Date().getMinutes()}:${new Date().getSeconds()}`

      this.$emit('messagesend', {
        user: this.user,
        message: this.newMessage,
        send_at: this.send_at
      })

      this.newMessage = ''
      this.send_at = null
    }
  }
}
</script>