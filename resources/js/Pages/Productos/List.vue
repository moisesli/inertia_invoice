<template>
   <AppLayout title="Dashboard">

      <template #header>
         <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Productos
         </h2>
      </template>

      <!-- component -->      
      <div class="max-w-4xl mx-auto">
         <div class="shadow-md sm:rounded-lg py-1 my-10 bg-white">            
            <div class="flex justify-between items-center">
               <div class="p-4">
                  <label for="table-search" class="sr-only">Search</label>
                  <div class="relative mt-1">
                     <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg">
                           <path fill-rule="evenodd"
                                 d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                 clip-rule="evenodd"></path>
                        </svg>
                     </div>
                     <input type="text" v-model="busq" @keyup="search" id="table-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-80 pl-10 p-2.5" placeholder="Buscar Productos">
                  </div>
               </div>
               <div class="px-6 ">                  
                  <Link href="/productos/create" class="
                     px-3 py-2 
                     bg-blue-600
                     text-white
                     text-sm
                     rounded-lg
                     font-bold">
                     Nuevo
                  </Link>
               </div>
            </div>
            <table class="w-full my-2 text-sm text-left text-gray-500 sm:rounded-lg">
               <thead class="text-xs text-gray-700 uppercase bg-gray-50">
               <tr>
                  <th scope="col" class="px-6 py-3">
                     #
                  </th>
                  <th scope="col" class="px-6 py-3">
                     Producto nombre <br>                     
                  </th>
                  <th scope="col" class="px-6 py-3 text-right">
                     Subtotal
                  </th>
                  <th scope="col" class="px-6 py-3 text-right">
                     IGV
                  </th>
                  <th scope="col" class="px-6 py-3 text-right">
                     Total
                  </th>
                  <th scope="col" class="px-6 py-3 text-right">
                     Acciones
                  </th>
               </tr>
               </thead>
               <tbody>
               <tr v-for="(producto, index) in productos.data" class="bg-white border-b hover:bg-gray-50">
                  <td class="w-4 pl-6">
                     {{ producto.id }}
                  </td>
                  <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                     {{ producto.nombre }} <br>
                     <span class="text-xs text-gray-400">{{ producto.codigo}}</span>
                  </th>
                  <td class="px-6 py-4 text-right">
                     {{ producto.precio_sin_igv }}
                  </td>
                  <td class="px-6 py-4 text-right">
                     {{ producto.igv }}
                  </td>
                  <td class="px-6 py-4 text-right">
                     {{ producto.precio_con_igv }}
                  </td>
                  <td class="px-8 py-4 text-right">
                     <a href="#" class="font-medium text-blue-600 hover:underline">Edit</a>
                  </td>
               </tr>
               </tbody>
            </table>            
            <pagination :links="productos.links" />   
         </div>
      </div>     

   </AppLayout>
</template>
<script>
import AppLayout from '@/Layouts/AppLayout.vue';
import Pagination from '@/Components/Pagination'
import { Inertia } from '@inertiajs/inertia'
import { Link } from '@inertiajs/inertia-vue3'
import _ from 'lodash';

export default {
   props: {
      productos: Object,
      filters: Object
   },
   components: {
      AppLayout,
      Pagination,
      Link
   },
   data(){
      return {
         busq: this.$inertia.page.props.filters.busq
      }
   },
   methods: {
      search: _.throttle(function(){
         let url = this.route('productos.index',{ busq: this.busq});
         this.$inertia.visit(url ,{replace:true,preserveState: true});                 
      }, 500),
      
   }
}
</script>


