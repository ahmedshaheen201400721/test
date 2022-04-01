<template>
    <form @submit.prevent="createUser">
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                    Name
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-first-name" type="text" placeholder="Jane Doe" v-model="form.name">
                <label class="text-red-300" v-if="form.errors.name" v-text="form.errors.name"></label>
            </div>
            <div class="w-full px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                    Email
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="email" placeholder="type our email" v-model="form.email">
                <label class="text-red-300" v-if="form.errors.email" v-text="form.errors.email"></label>

            </div>

            <div class="w-full px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                    password
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-first-password" type="text" placeholder="Jane Doe" v-model="form.password">
                <label class="text-red-300" v-if="form.errors.password" v-text="form.errors.password"></label>
            </div>
            <input type="submit"  value="submit" name="" id="">

        </div>
    </form>
</template>

<script setup>
import { useForm } from "@inertiajs/inertia-vue3";

let form=useForm({
    name: "",
    email: "",
    password: ""
});
let createUser=()=>{
    form.post(route('users.store'))
}
console.log(form);
</script>

<style>

</style>
