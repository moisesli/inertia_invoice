<template>
  <AppLayout title="Crear">

    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Crear Empresa
      </h2>
    </template>

    <div class="max-w-3xl mx-auto">
      <div class="shadow-md sm:rounded-lg px-8 py-6  my-12 bg-white">
        <form @submit.prevent="submit">

          <!-- Primera Fila -->
          <div class="flex flex-col md:flex-row">
            <div class="md:w-3/5">
              <JetLabel value="Nombre o Razon Social"/>
              <JetInput
                type="text"
                v-model="form.razon_social"
                placeholder="Arroz Costenio Graneadito"
                class="mt-1 block w-full"
                required
              />
              <div class="text-xs text-red-500" v-if="errors.razon_social">{{ errors.razon_social }}</div>
            </div>
            <div class="md:w-2/5 md:ml-4 mt-2 md:mt-0">
              <JetLabel value="Ruc"/>
              <JetInput
                id="codigo"
                placeholder="ARROZ54"
                v-model="form.ruc"
                type="text"
                class="mt-1 block w-full"
                required
              />
              <div class="text-xs text-red-500" v-if="errors.ruc">{{ errors.ruc }}</div>
            </div>
          </div>
          <!-- End Primera Fila -->


          <!-- Segunda Fila -->
          <div class="flex flex-col md:flex-row md:mt-3">
            <div class="md:w-3/6">
              <JetLabel value="Razon Comercial"/>
              <JetInput
                type="text"
                v-model="form.razon_comercial"
                placeholder="Arroz Costenio Graneadito"
                class="mt-1 block w-full"
                required
              />
              <div class="text-xs text-red-500" v-if="errors.razon_comercial">{{ errors.razon_comercial }}</div>
            </div>
            <div class="md:w-3/6 md:ml-4 mt-2 md:mt-0">
              <JetLabel value="Direccion"/>
              <JetInput
                placeholder="ARROZ54"
                v-model="form.direccion"
                type="text"
                class="mt-1 block w-full"
                required
              />
              <div class="text-xs text-red-500" v-if="errors.direccion">{{ errors.direccion }}</div>
            </div>
          </div>
          <!-- End Segunda Fila -->

          <!-- Tercera Fila -->
          <div class="flex flex-col md:flex-row md:mt-3">
            <div class="md:w-6/12">
              <JetLabel value="Responsable"/>
              <JetInput
                type="text"
                v-model="form.responsable"
                placeholder=" Costenio Graneadito"
                class="mt-1 block w-full"
                required
              />
              <div class="text-xs text-red-500" v-if="errors.responsable">{{ errors.responsable }}</div>
            </div>
            <div class="md:w-3/12 md:ml-4 mt-2 md:mt-0">
              <JetLabel value="Telefono"/>
              <JetInput
                placeholder="Telefono"
                v-model="form.telefono"
                type="text"
                class="mt-1 block w-full"
                required
              />
              <div class="text-xs text-red-500" v-if="errors.telefono">{{ errors.telefono }}</div>
            </div>
            <div class="md:w-3/12 md:ml-4 mt-2 md:mt-0">
              <JetLabel value="Celular"/>
              <JetInput
                placeholder="Celular"
                v-model="form.celular"
                type="text"
                class="mt-1 block w-full"
                required
              />
              <div class="text-xs text-red-500" v-if="errors.celular">{{ errors.celular }}</div>
            </div>
          </div>
          <!-- End Tercera Fila -->

          <!-- Button -->
          <div class="flex justify-end mt-4">
            <LinkBlue :href="route('empresas.index')">
              <i class="fa-solid fa-x pr-1"></i> Cancelar
            </LinkBlue>
            <JetButton class="ml-4 py-2.5" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
              <i class="fa-solid fa-plus pr-1"></i> Crear Empresa
            </JetButton>
          </div>

        </form>
      </div>
    </div>

  </AppLayout>
</template>
<script>
  import {Head, Link, useForm} from '@inertiajs/inertia-vue3';
  import AppLayout from '@/Layouts/AppLayout.vue';
  import JetButton from '@/Jetstream/Button.vue';
  import JetInput from '@/Jetstream/Input.vue';
  import JetLabel from '@/Jetstream/Label.vue';
  import JetValidationErrors from '@/Jetstream/ValidationErrors.vue';
  import LinkBlue from "../../Jetstream/LinkBlue";

  export default {
    props: {
      errors: Object
    },
    components: {
      AppLayout,
      JetButton,
      JetInput,
      JetLabel,
      JetValidationErrors,
      useForm,
      LinkBlue
    },
    data(){
      return{
        form: this.$inertia.form({
          ruc: '10425162530',
          razon_social: 'Abraham Moises Linares Oscco',
          razon_comercial: 'Abraham Moises Linares Oscco',
          direccion: 'Cm 40 Lt 15 Mz 213 Ciudad Nueva Tacna',
          responsable: 'Cm 40 Lt 15 Mz 213 Ciudad Nueva Tacna',
          telefono: '+51 952631806',
          celular: '+51 952631806',
          ubigeo: '879734'
        })
      }
    },
    methods: {
      submit: function () {
        this.$inertia.post('/empresas', this.form);
        //console.log(this.form);
      }
    }
  }
</script>
