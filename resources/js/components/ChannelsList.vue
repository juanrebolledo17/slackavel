<template>
  <div>
    <div class="flex items-center justify-start mb-3 px-4" v-for="channel in channels">
      <button 
        class="text-white hover:bg-teal-400 w-full text-left outline-none"
        @click="joinChannel(channel)"
      >
        # {{ channel.channel_name }}
      </button>
    </div>
  </div>
</template>

<script>
import { mapState } from 'vuex'

export default {
  computed: mapState([
    'channels',
    'user'
  ]),
  methods: {
    joinChannel(channel) {
      channel['userId'] = this.user.id
      this.$store.dispatch('joinChannel', channel)
    }
  }
}
</script>