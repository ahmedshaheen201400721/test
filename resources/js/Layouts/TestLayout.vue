<template>
  <Head>
        <title>About</title>
        <meta name="description" head-key="description" content="this is layout">
    </Head>
   <nav-link active="Test'" :href="route('test')"> test nav link</nav-link>
    <Link :class="{'text-green-700 font-bold':$page.component=='Test'}" type="button" as="button" class="bg-green-300 mx-4" :href="route('test')">test</Link>
    <Link :class="{'text-green-700 font-bold':$page.component=='Test'}" type="button" as="button" method="post" class="bg-green-300 mx-4" :href="route('test.post')">test post</Link>
    <Link :class="{'text-green-700 font-bold':$page.component=='Contact'}" :href="route('about')">contact</Link>
    <Link :class="{'text-green-700 font-bold':$page.component=='About'}" :href="route('about')">about</Link>
   {{$page.component}}
    <slot />
</template>

<script setup>
import { Link ,Head} from '@inertiajs/inertia-vue3'
import NavLink from '../Jetstream/NavLink.vue'
</script>

<style>

</style>
