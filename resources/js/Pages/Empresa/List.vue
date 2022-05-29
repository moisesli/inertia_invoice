<template>
  <AppLayout title="Empresa">

    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Empresa
      </h2>
    </template>

    <!-- Border -->
    <div class="max-w-4xl mx-auto">
      <div class="shadow-md sm:rounded-lg py-1 my-10 bg-white">

        <!--  Search y Button New -->
        <div class="flex justify-between items-center">
          <div class="p-4">
            <label class="sr-only">Search</label>
            <div class="relative mt-1">
              <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20"
                     xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd"
                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                        clip-rule="evenodd"></path>
                </svg>
              </div>
              <input type="text" v-model="busq" @keyup="search" class="
                bg-gray-50 text-left
                border border-gray-300
                text-gray-900 text-sm
                rounded-lg
                focus:ring-blue-500 focus:border-blue-500
                block w-80 pl-10 p-2.5"
                placeholder="Buscar Clientes"/>
            </div>
          </div>
          <div class="px-6">
            <LinkBlue :href="route('empresas.create')">
              <i class="fa-solid fa-plus pr-1"></i> Empresa
            </LinkBlue>
          </div>
        </div>

        <!-- Table -->
        <table class="w-full my-2 text-sm text-left text-gray-500 sm:rounded-lg">
          <thead class="text-xs text-gray-700 uppercase bg-gray-50">
          <tr>
            <th scope="col" class="px-6 py-3">
              #
            </th>
            <th scope="col" class="px-6 py-3">
              Razon Social
            </th>
            <th scope="col" class="px-6 py-3 text-center">
              Ruc
            </th>
            <th scope="col" class="px-6 py-3 text-center">
              Direccion
            </th>
            <th scope="col" class="px-6 py-3 text-center">
              Ubigeo
            </th>
            <th scope="col" class="px-6 py-3 text-center">
              Acciones
            </th>
          </tr>
          </thead>
          <tbody>
          <tr v-for="(empresa, index) in empresas.data" class="bg-white border-b hover:bg-gray-50">
            <td class="w-4 pl-6">
              {{ empresa.id }}
            </td>
            <th scope="row" class="px-6 py-4 font-medium text-gray-700 whitespace-nowrap">
              {{ empresa.razon_social }}
            </th>
            <td class="px-6 py-4 text-center">
              {{ empresa.ruc }}
            </td>
            <td class="px-6 py-4 text-center">
              {{ empresa.direccion }}
            </td>
            <td class="px-6 py-4 text-center">
              {{ empresa.ubigeo }}
            </td>
            <td class="px-8 py-4 text-center">
              <Link
                :href="route('empresas.edit', empresa.id)"
                type="button">
                <i class="text-xl fa-regular fa-file"></i>
              </Link>
            </td>
          </tr>
          </tbody>
        </table>
        <pagination :links="empresas.links"/>
      </div>
    </div>

  </AppLayout>
</template>
<script>
import AppLayout from '@/Layouts/AppLayout.vue';
import Pagination from '@/Components/Pagination'
import {Link} from '@inertiajs/inertia-vue3'
import LinkBlue from "../../Jetstream/LinkBlue";
import _ from 'lodash';

export default {
  props: {
    empresas: Object,
    filters: Object
  },
  components: {
    AppLayout,
    Link,
    Pagination,
    LinkBlue
  },
  data() {
    return {
      busq: this.$inertia.page.props.filters.busq
    }
  },
  methods: {
    search: _.throttle(function () {
      let url = this.route('empresas.index', {busq: this.busq});
      this.$inertia.visit(url, {replace: true, preserveState: true});
    }, 500),
  }
}

</script>
