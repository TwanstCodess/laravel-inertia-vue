<template>
<div class="flex justify-between items-center">
    <Link class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href="/admin/user/create">Create</Link>
<div>
    <input type="text" v-model="search" class="border border-gray-200 bg-gray-200 text-black rounded p-2 w-full">
</div>

</div>
<table class="min-w-full divide-y mt-6 divide-gray-200 bg-white rounded-lg shadow-md">
    <thead class="bg-gray-50">
      <tr>
        <th scope="col" class="px-6 py-3 text-left text-xs bg-gray-700 text-white font-medium text-gray-500 uppercase tracking-wider">Name</th>
        <th scope="col" class="px-6 py-3 text-left text-xs bg-gray-700 text-white font-medium text-gray-500 uppercase tracking-wider">email</th>
        <th scope="col" class="px-6 py-3 text-left text-xs bg-gray-700 text-white font-medium text-gray-500 uppercase tracking-wider">pass</th>
      </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
      <tr v-for="(item,index) in data.data" :key="index">
        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ item.name }}</td>
        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ item.email }}</td>
        <td class="bg-red-400 hover:bg-red-300 text-white font-bold py-2 px-4 rounded text-center"><Link href="/admin/user/create">Edit</Link></td>
      </tr>

      <!-- Add more rows as needed -->
    </tbody>
    <div class="flex justify-left mt-4">
        <Link
    v-for="(item, index) in data.links"
    :key="`link-${index}`"
    :href="item.url"
    v-html="item.label"
    preserve-scroll
    class=" py-2 px-3 rounded shadow "
    :class="[!item.url?'bg-gray-300':'', item.active ? 'bg-gray-700 text-white' : '']"
  ></Link>

    </div>
  </table>
</template>

<script setup>
import {Link, router} from '@inertiajs/vue3'
import debounce from 'lodash/debounce'
let props=defineProps(['data','search'])
let search = ref(props.search)
watch(search, debounce((value) => {
  router.get('/admin/user',
    { search: value },
    { preserveState: true, replace: true, only: ['data'] }
  );
}, 300));
</script>

<script>
import { ref } from 'vue'
import layout from '@/layouts/admin.vue'
import { watch } from '@vue/runtime-core'

export default {
layout: layout,
}
</script>
