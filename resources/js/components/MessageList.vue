<template>
  <div class="w-full px-6 py-4 overflow-y-scroll h-full messages-list">
    <div class="flex items-start mb-5 text-sm" v-for="message in messages">
      <img src="" class="w-10 h-10 rounded mr-3 bg-gray-300">
      <div class="flex-1 overflow-hidden">
        <div class="mb-1">
          <span class="font-bold">{{ message.user.username }}</span>
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

  <!-- https://pbs.twimg.com/profile_images/875010472105222144/Pkt9zqPY_400x400.jpg -->
</template>

<script>
export default {
  props: ['messages'],
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
  }
}
</script>

<style scoped>
.messages-list {
  scroll-behavior: smooth;
}
</style>