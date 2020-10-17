<template>
  <div>
    <h1 class="capitalize text-gray-900 font-semibold text-xl">
      Channels
    </h1>
    <hr class="mt-2 mb-4 border-t-2 border-gray-200">
    <div>
      <table class="w-full">
        <thead class="border-t border-b text-gray-800">
          <tr>
            <th class="py-2">
              Name
            </th>
            <th class="py-2">
              Description
            </th>
            <th class="py-2">
              Number of Users
            </th>
            <th class="py-2">
              Actions
            </th>
          </tr>
        </thead>
        <tbody>
          <tr :class="`border-b ${channel.id % 2 === 0 ? 'bg-white' : 'bg-gray-100'}`" v-for="channel in channels" :key="channel.id">
            <td class="text-center py-2">
              {{ channel.channel_name }}
            </td>
            <td class="text-center py-2">
              {{ channel.channel_description }}
            </td>
            <td class="text-center py-2">
              
            </td>
            <td class="text-center py-2">
              
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
export default {
  props: ['channels'],
  computed: {
    // oddOrEven() {
    //   let result = []
    //   this.channels.forEach((el, idx) => {
    //     result.push(idx % 2)
    //   })
    //   return result
    // }
  }
}
</script>