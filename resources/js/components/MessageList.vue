<template>
  <div class="w-full h-full px-6 py-4 messages-list overflow-y-scroll">
    <transition name="fade">
      <div v-if="loading" key="loading">
        <loading-indicator />
      </div>
      <div v-else key="content">
        <div class="flex items-start mb-5 text-sm" v-for="message in messages">
          <template v-if="message.user.avatar_url">
            <img 
              :src="message.user.avatar_url" 
              class="w-10 h-10 rounded mr-3 bg-gray-300"
            />
          </template>
          <template>
            <img 
              :src="placeholder" 
              class="w-10 h-10 rounded mr-3 bg-gray-300"
            />
          </template>
          <div class="flex-1 overflow-hidden">
            <div class="mb-1">
              <span class="font-bold">{{ message.send_by }}</span>
              <span class="text-gray-500 text-xs">
                {{ message.send_at }} {{ pmOrAm }}
              </span>
            </div>
            <p class="text-black-700 leading-normal">
              {{ message.message }}
            </p>
          </div>
        </div>
      </div>
    </transition>
  </div>

  <!-- https://pbs.twimg.com/profile_images/875010472105222144/Pkt9zqPY_400x400.jpg -->
</template>

<script>
import LoadingIndicator from './LoadingIndicator'
import placeholder from '../../img/placeholder.png'

export default {
  components: {
    LoadingIndicator
  },
  props: ['messages', 'loading'],
  data() {
    return {
      placeholder: placeholder,
    }
  },
  computed: {
    pmOrAm() {
      let createdAtArray

      for (let message of this.messages) {
        const createdAt = message.send_at
        createdAtArray = createdAt.split(':')
        if (createdAtArray[0] >= 1 && createdAtArray[0] <= 12) {
          return 'am'
        } else {
          return 'pm'
        }
      }
    }
  },
  created() {
    console.log(this.messages)
  }
}
</script>

<style scoped>
.messages-list {
  scroll-behavior: smooth;
}

.fade-enter-active, .fade-leave-active {
  transition: opacity 0.5s ease;
}
.fade-enter, .fade-leave-to {
  opacity: 0;
}
</style>