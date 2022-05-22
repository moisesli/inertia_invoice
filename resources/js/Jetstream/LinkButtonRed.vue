<script>
  import {Link} from '@inertiajs/inertia-vue3';

  export default {
    props: {
      href: '',
      method: ''
    },
    components: {
      Link
    }
  }
</script>

<template>
  <Link
    :method="method"
    :href="href"
    class="
      inline-flex
      items-center
      px-4 py-2
      bg-red-500
      border border-transparent
      rounded-md
      font-semibold
      text-xs text-white
      uppercase tracking-widest
      hover:bg-red-700
      active:bg-red-900
      focus:outline-none focus:border-red-900 focus:ring focus:ring-red-300
      disabled:opacity-25 transition">
    <slot />
  </Link>
</template>
