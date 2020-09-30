<template>
  <div>
    <div class="border-b flex px-6 py-2 items-center flex-none">
      <div class="flex flex-col">
        <h3 class="text-gray-800 mb-1 font-extrabold">
          #{{ current_channel.channel_name }}
        </h3>
        <p class="text-sm truncate text-gray-600">
          {{ current_channel.channel_description }}
        </p>
      </div>
      <div class="ml-auto md:block">
        <div class="relative">
          <input type="search" placeholder="Search" class="appearance-none border border-gray-700 rounded-lg pl-8 pr-4 py-2 outline-none">
          <div class="absolute pl-3 flex items-center justify-center left-0 top-0 pt-3">
            <svg class="fill-current text-gray-300 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
              <path d="M12.9 14.32a8 8 0 1 1 1.41-1.41l5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z" />
            </svg>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: [
    'current_channel'
  ],
  data() {
    return {
      searchQuery: '',
    }
  }
}
</script>         