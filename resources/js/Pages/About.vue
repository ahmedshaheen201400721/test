<template>
    <Head>
        <title>About</title>
        <meta name="description" head-key="description" content="this is about page">
    </Head>

    <div class="space-x-4">
        <p v-for="(user,key) in users" :key="key">
            {{user.name}}
        </p>
        <div class="text-6xl">About</div>
    </div>
</template>
<script>
    import AppLayout from '@/Layouts/TestLayout.vue'

export default {
    layout: AppLayout,
}
</script>
<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3'
defineProps({users:Array})
</script>

<style>

</style>
