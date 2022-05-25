<template>
   <AppLayout title="Cliente Editar">

      <template #header>
         <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar Producto
         </h2>
      </template>

      <div class="max-w-2xl mx-auto">
         <div class="shadow-md sm:rounded-lg px-8 py-6  my-12 bg-white">
            <!-- Button Eliminar -->
            <div class="flex justify-end pb-2">
               <LinkButtonRed method="delete" :href="route('clientes.destroy', cliente.id)">
                  <i class="fa-regular fa-trash-can pr-2"></i> Eliminar
               </LinkButtonRed>
            </div>
            <!-- End Button Eliminar -->
            <form @submit.prevent="submit">
               <!-- Primera Fila -->
               <div class="flex flex-col md:flex-row">
                  <div class="md:w-3/5">
                     <JetLabel value="Nombre o Razon Social"/>
                     <JetInput
                        id="nombre"
                        type="text"
                        v-model="form.razon_social"
                        placeholder="Arroz Costenio Graneadito"
                        class="mt-1 block w-full"
                        required
                        autofocus
                     />
                     <div class="text-xs text-red-500" v-if="errors.razon_social">{{ errors.razon_social }}</div>
                  </div>
                  <div class="md:w-2/5 md:ml-4 mt-2 md:mt-0">
                     <JetLabel for="codigo" value="Ruc o Dni"/>
                     <JetInput
                        id="codigo"
                        placeholder="ARROZ54"
                        v-model="form.ruc_dni"
                        type="text"
                        class="mt-1 block w-full"
                        required
                        autofocus
                     />
                     <div class="text-xs text-red-500" v-if="errors.ruc_dni">{{ errors.ruc_dni }}</div>
                  </div>
               </div>
               <!-- End Primera Fila -->


               <!-- Segunda Fila -->
               <div class="flex flex-col md:flex-row md:mt-3">
                  <div class="md:w-3/6">
                     <JetLabel value="Direccion"/>
                     <JetInput
                        type="text"
                        placeholder="82.00"
                        v-model="form.direccion"
                        class="mt-1 block w-full"
                        required
                        autofocus
                     />
                     <div class="text-xs text-red-500" v-if="errors.direccion">{{ errors.direccion }}</div>
                  </div>
                  <div class="md:w-1/6 md:ml-4 mt-2 md:mt-0">
                     <JetLabel value="Ubigeo"/>
                     <JetInput
                        placeholder="18.00"
                        v-model="form.ubigeo"
                        type="text"
                        class="mt-1 block w-full"
                        required
                        autofocus
                     />
                     <div class="text-xs text-red-500" v-if="errors.ubigeo">{{ errors.ubigeo }}</div>
                  </div>
                  <div class="md:w-2/6 md:ml-4 mt-2 md:mt-0">
                     <JetLabel value="Telefonos"/>
                     <JetInput
                        placeholder="100.00"
                        v-model="form.telefonos"
                        type="text"
                        class="mt-1 block w-full"
                        required
                        autofocus
                     />
                     <div class="text-xs text-red-500" v-if="errors.telefonos">{{ errors.telefonos }}</div>
                  </div>
               </div>
               <!-- End Segunda Fila -->


               <!-- Tercera Fila -->
               <div class="flex flex-col md:flex-row md:mt-3">
                  <div class="md:w-3/6">
                     <JetLabel value="Correo"/>
                     <JetInput
                        type="text"
                        placeholder="82.00"
                        v-model="form.correo"
                        class="mt-1 block w-full"
                        required
                        autofocus
                     />
                     <div class="text-xs text-red-500" v-if="errors.correo">{{ errors.correo }}</div>
                  </div>
               </div>

               <!-- Button -->
               <div class="flex justify-end mt-4">
                  <LinkBlue :href="route('clientes.index')">
                     <i class="fa-solid fa-x pr-1"></i> Cancelar
                  </LinkBlue>
                  <JetButton class="ml-4 py-2.5" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                     <i class="fa-solid fa-plus pr-1"></i> Editar Cliente
                  </JetButton>
               </div>

            </form>
         </div>
      </div>

   </AppLayout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue';
import LinkButtonRed from "../../Jetstream/LinkButtonRed";
import LinkBlue from "../../Jetstream/LinkBlue";
import JetInput from '@/Jetstream/Input.vue';
import JetLabel from '@/Jetstream/Label.vue';
import JetValidationErrors from '@/Jetstream/ValidationErrors.vue';
import JetButton from '@/Jetstream/Button.vue';
import {Head, Link, useForm} from '@inertiajs/inertia-vue3';

export default {
   props: {
      cliente: Object,
      errors: Object
   },
   components: {
      AppLayout,
      LinkButtonRed,
      JetButton,
      LinkBlue,
      JetInput,
      JetLabel,
      JetValidationErrors,
      useForm,
   },
   data() {
      return {
         form: {
            razon_social: this.$inertia.page.props.cliente.razon_social,
            ruc_dni: this.$inertia.page.props.cliente.ruc_dni,
            direccion: this.$inertia.page.props.cliente.direccion,
            ubigeo: this.$inertia.page.props.cliente.ubigeo,
            telefonos: this.$inertia.page.props.cliente.telefonos,
            correo: this.$inertia.page.props.cliente.correo,
         },
      }
   },
   methods: {
      submit: function () {
         this.$inertia.put(
            route("clientes.update", this.$props.cliente.id),this.form
         );
      }
   }

}
</script>
