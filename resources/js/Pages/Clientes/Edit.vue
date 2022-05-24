<template>
   <AppLayout title="Cliente Editar">

      <template #header>
         <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar Producto
         </h2>
      </template>
   </AppLayout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue';
import {Inertia} from '@inertiajs/inertia';
import LinkButtonRed from "../../Jetstream/LinkButtonRed";
import LinkBlue from "../../Jetstream/LinkBlue";
import JetButton from '@/Jetstream/Button.vue';
import JetInput from '@/Jetstream/Input.vue';
import JetLabel from '@/Jetstream/Label.vue';
import JetValidationErrors from '@/Jetstream/ValidationErrors.vue';
import {useForm} from "@inertiajs/inertia-vue3";
export default {
   props: {

   },
   components: {
      AppLayout,
      JetButton,
      JetInput,
      JetLabel,
      JetValidationErrors,
      useForm,
      LinkButtonRed,
      LinkBlue
   },
   data(){
      return{

      }
   },
   methods: {

   }

}
</script>
