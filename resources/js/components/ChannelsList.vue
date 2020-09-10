<template>
  <div>
    <div class="flex items-center justify-start mb-3 px-4" v-for="channel in channels">
      <button class="text-white hover:bg-teal-400 w-full text-left">
        # {{ channel.name }}
      </button>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      channels: [
        {name: 'general'},
        {name: 'FAQ'},
      ]
    }
  }
}
</script>