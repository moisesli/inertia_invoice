<template>
   <AppLayout title="Dashboard">
      <template #header>
         <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Crear Producto
         </h2>
      </template>


      <div class="max-w-2xl mx-auto">
         <div class="shadow-md sm:rounded-lg px-8 py-6  my-12 bg-white">

            <!-- Primera Fila -->
            <div class="flex flex-col md:flex-row">
               <div class="md:w-3/5">
                  <JetLabel for="nombre" value="Nombre"/>
                  <JetInput
                     id="nombre"
                     type="text"
                     placeholder="Arroz Costenio Graneadito"
                     class="mt-1 block w-full"
                     required
                     autofocus
                  />
               </div>
               <div class="md:w-2/5 md:ml-4 mt-2 md:mt-0">
                  <JetLabel for="codigo" value="Codigo"/>
                  <JetInput
                     id="codigo"
                     placeholder="ARROZ54"
                     type="text"
                     class="mt-1 block w-full"
                     required
                     autofocus
                  />
               </div>
            </div>

            
         </div>
      </div>

   </AppLayout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue';
import JetButton from '@/Jetstream/Button.vue';
import JetInput from '@/Jetstream/Input.vue';
import JetLabel from '@/Jetstream/Label.vue';

export default {
   components: {
      AppLayout,
      JetButton,
      JetInput,
      JetLabel
   }
}
</script>
