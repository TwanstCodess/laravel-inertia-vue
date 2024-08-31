<template>

    <Link class="bg-green-500 hover:bg-green-700 w-max text-white font-bold py-2 px-4 rounded" href="/admin/user">Back</Link>
    <div class="bg-white p-8 rounded shadow-md w-full max-w-sm">

        <form @submit.prevent="store()" method="post">
            <div class="mb-4">
            <label for="name" class="block text-gray-700 font-bold mb-2">Name</label>
            <input type="text"  v-model="form.name" id="name" name="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" >
        <p class="text-red-700 text-sm">{{form.errors.name}}</p>
        </div>
          <div class="mb-4">
            <label for="email" class="block text-gray-700 font-bold mb-2">Email</label>
            <input type="email" v-model="form.email" id="email" name="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" >
        <p class="text-red-700 text-sm">{{form.errors.email}}</p>
        </div>
          <div class="mb-6">
            <label for="password" class="block text-gray-700 font-bold mb-2">Password</label>
            <input type="password" v-model="form.password" id="password" name="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" >
        <p class="text-red-700 text-sm">{{form.errors.password}}</p>
        </div>
          <div class="flex items-center justify-between">
            <button :disabled="form.processing" type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
              Submit
            </button>
          </div>
        </form>
      </div>
    </template>

    <script>
    import layout from '@/layouts/admin.vue'
    export default {
    layout: layout,
    }
    </script>

    <script setup>
import {Link} from '@inertiajs/vue3'

import { reactive } from 'vue'
import { router, useForm } from '@inertiajs/vue3'
let form=useForm({
    name:'',
    email:'',
    password:'',

})

const store=()=>{
    form.post('/admin/user',{
        onSuccess: () =>{

            form.reset()
        }


    })
}


    </script>
