<template>
  <div>
    <div class="flex items-center justify-start mb-3 px-4" v-for="channel in channels">
      <button class="text-white hover:bg-teal-400 w-full text-left">
        # {{ channel.channel_name }}
      </button>
    </div>
  </div>
</template>

<script>
export default {
  props: ['channels'],
}
</script>