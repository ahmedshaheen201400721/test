<template>
    <div class="my-6">
       <component
						    class="bg-white p-2 m-2  "
						    :class="{'text-gray-500':!link.url,'bg-gray-200':link.active}"
						    v-for="(link,index) in props.links"
						    :key="index"
						    :href="link.url"
						    :is="link.url?'Link':'span'"
						    v-html="link.label">
       </component>


    </div>
</template>

<script setup>
let props=defineProps(['links'])
</script>
