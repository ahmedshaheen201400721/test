<template>
<div class="w-1/2 mx-auto">
<input  class="w-full" type="text" name="search" v-model="search" id="">
</div>
<div class="flex justify-between">
<div class="w-1/6 p-4 bg-yellow-200"></div>
<div class="w-1/6 p-4 bg-yellow-200"></div>
<div class="w-1/6 p-4 bg-yellow-200"></div>
</div>

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
        <th scope="col" class="px-6 py-3">
        user name
        </th>
        <th scope="col" class="px-6 py-3">
        email
        </th>
        <th scope="col" class="px-6 py-3">
        Category
        </th>
        <th scope="col" class="px-6 py-3">
        Price
        </th>
        <th scope="col" class="px-6 py-3">
        <span class="sr-only">Edit</span>
        </th>
        </tr>
        </thead>
    <tbody>
    <tr  v-for="(user,index) in users.data" :key="index" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
    <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
    {{user.name}}
    </th>
    <td class="px-6 py-4">
    {{user.email}}
    </td>
    <td class="px-6 py-4">
    Laptop
    </td>
    <td class="px-6 py-4">
    $2999
    </td>
    <td class="px-6 py-4 text-right">
    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
    </td>
    </tr>
    </tbody>
    </table>

</div>
<Links :links="props.users.links"></Links>

</template>

<script setup>
    import Links from '@/shared/Links.vue'
import { Inertia } from '@inertiajs/inertia';
import { ref } from '@vue/reactivity';
import { watch } from '@vue/runtime-core';
import throttle from "lodash/throttle"

import debounce from "lodash/debounce"
import { usePage } from '@inertiajs/inertia-vue3';


let props=defineProps(['users','search']);
let search=ref(props.search);

watch(search,debounce((newValue,oldValue)=>{
    console.log(newValue);
    Inertia.get('/users',
       {search:newValue},{
        preserveState:true,
        replace:true,
        preserveScroll:true
    })
},400))
</script>

<style>

</style>
