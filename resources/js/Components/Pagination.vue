<template>
    <div v-if="links.length > 3" class="py-2 px-6">
        <div class="flex flex-wrap">
            <template v-for="(link, p) in links" :key="p">
                <div v-if="link.url === null" class="mr-1 px-3 py-2 text-sm leading-4 text-gray-400 border rounded" v-html="link.label" />
                <Link 
                     v-else
                     :href="link.url"
                     v-html="link.label"
                     class="
                        mr-1 px-3 py-2
                        text-sm 
                        border rounded 
                        hover:bg-blue-700
                        hover:text-white
                        focus:border-indigo-500 focus:text-indigo-500" 
                     :class="{ 'bg-blue-700 text-white': link.active }">                    
                </Link>                
            </template>
        </div>
    </div>
</template>
<script>   
   import { Head, Link } from '@inertiajs/inertia-vue3';
   export default {
      components:{
         Head,
         Link
      },
      props: {
         links: Array
      },
   }
</script>
