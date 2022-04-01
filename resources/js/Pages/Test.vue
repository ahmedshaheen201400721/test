<template>
    <div class="space-x-4">

        <div class="text-6xl">Test</div>
        <input type="text" v-model="name" name="" id="">
        <div class="h-screen">ahmed</div>
        <Link preserve-state preserve-scroll :class="{'text-green-700 font-bold':$page.component=='Test'}" as="button" class="bg-green-300 mx-4" :href="route('test')">test</Link>
    </div>
</template>
<script>
    import AppLayout from '@/Layouts/TestLayout.vue'

export default {
  components: { NavLink },
    layout: AppLayout,
}
</script>

<script setup>
import { Link } from '@inertiajs/inertia-vue3'
import NavLink from '../Jetstream/NavLink.vue'
let name = 'ahmed'
</script>

<style>

</style>
