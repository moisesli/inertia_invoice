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
      bg-blue-500
      border border-transparent
      rounded-md
      font-semibold
      text-xs text-white
      uppercase tracking-widest
      hover:bg-blue-700
      active:bg-blue-900
      focus:outline-none focus:border-blue-900 focus:ring focus:ring-blue-300
      disabled:opacity-25 transition">
    <slot />
  </Link>
</template>
