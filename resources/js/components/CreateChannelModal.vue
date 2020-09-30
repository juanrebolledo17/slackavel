<template>
  <div class="w-full m-5 md:w-1/2 md:m-0">
    <div class="bg-white rounded shadow-lg p-5">
      <h1 class="text-bold text-xl tracking-tight pb-1 text-gray-900">
        Create Channel
      </h1>
      <hr class="mb-4">
      <form @submit.prevent="emitCreateChannel">
        <div class="flex flex-col mb-4">
          <label for="channel-name" class="mb-2">
            Channel name
          </label>
          <input type="text" id="channel-name" class="border focus:border-teal-500 rounded-lg outline-none py-1 px-3" v-model="channelName" required>
        </div>
        <div class="flex flex-col mb-6">
          <label for="channel-description" class="mb-2">
            Channel description
          </label>
          <textarea name="channel_description" id="channel-description" cols="" rows="4" class="border focus:border-teal-500 rounded-lg outline-none py-1 px-3" v-model="channelDescription" required></textarea>
        </div>
        <div class="flex justify-end">
          <button type="button" class="mr-4 bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition-all ease-in-out" @click="closeModal">
            Dismiss
          </button>
          <button type="submit" class="bg-indigo-500 hover:bg-indigo-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition-all ease-in-out">
            Create
          </button>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
export default {
  props: ['user_id'],
  data() {
    return {
      channelName: '',
      channelDescription: '', 
    }
  },
  methods: {
    async emitCreateChannel() {
      const { channelName, channelDescription } = this

      this.$emit('createchannelevent', {
        channel_name: channelName,
        channel_description: channelDescription,
        user_id: this.user_id 
      })

      this.channelName = ''
      this.channelDescription = ''
      this.closeModal()
    },
    closeModal() {
      this.$emit('closemodalevent')
    }
  },
}
</script>

<style scoped>

</style>