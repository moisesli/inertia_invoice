<template>
  <AppLayout title="Dashboard">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Crear Producto
      </h2>
    </template>


    <div class="max-w-2xl mx-auto">
      <div class="shadow-md sm:rounded-lg px-8 py-6  my-12 bg-white">
<!--        {{ errors }}-->
        <form @submit.prevent="submit">
          <!-- Primera Fila -->
          <div class="flex flex-col md:flex-row">
            <div class="md:w-3/5">
              <JetLabel for="nombre" value="Nombre"/>
              <JetInput
                id="nombre"
                type="text"
                v-model="form.nombre"
                placeholder="Arroz Costenio Graneadito"
                class="mt-1 block w-full"
                required
                autofocus
              />
              <div class="text-xs text-red-500" v-if="errors.nombre">{{ errors.nombre }}</div>
            </div>
            <div class="md:w-2/5 md:ml-4 mt-2 md:mt-0">
              <JetLabel for="codigo" value="Codigo"/>
              <JetInput
                id="codigo"
                placeholder="ARROZ54"
                v-model="form.codigo"
                type="text"
                class="mt-1 block w-full"
                required
                autofocus
              />
              <div class="text-xs text-red-500" v-if="errors.nombre">{{ errors.codigo }}</div>
            </div>
          </div>
          <!-- End Primera Fila -->

          <!-- Segunda Fila -->
          <div class="flex flex-col md:flex-row md:mt-3">
            <div class="md:w-1/3">
              <JetLabel for="precio_sin_igv" value="Subtotal"/>
              <JetInput
                type="text"
                placeholder="82.00"
                v-model="form.precio_sin_igv"
                class="mt-1 block w-full text-right"
                required
                autofocus
              />
              <div class="text-xs text-red-500" v-if="errors.precio_sin_igv">{{ errors.precio_sin_igv }}</div>
            </div>
            <div class="md:w-1/3 md:ml-4 mt-2 md:mt-0">
              <JetLabel for="codigo" value="IGV"/>
              <JetInput
                placeholder="18.00"
                v-model="form.igv"
                type="text"
                class="mt-1 block w-full text-right"
                required
                autofocus
              />
              <div class="text-xs text-red-500" v-if="errors.igv">{{ errors.igv }}</div>
            </div>
            <div class="md:w-1/3 md:ml-4 mt-2 md:mt-0">
              <JetLabel for="codigo" value="Total"/>
              <JetInput
                placeholder="100.00"
                v-model="form.precio_con_igv"
                type="text"
                class="mt-1 block w-full text-right"
                required
                autofocus
              />
              <div class="text-xs text-red-500" v-if="errors.precio_con_igv">{{ errors.precio_con_igv }}</div>
            </div>
          </div>
          <!-- End Segunda Fila -->

          <!-- Button -->
          <div class="flex justify-end mt-4">
            <JetButton class="ml-4 py-2.5" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
              Crear Producto
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
  },
  data() {
    return {
      form: this.$inertia.form({
        nombre: 'Coralie Purdy',
        codigo: 'ARROZRET',
        precio_sin_igv: 82.98,
        igv: 18.54,
        precio_con_igv: 100.87,
      })
    }
  },
  methods: {
    submit: function () {
      this.$inertia.post('/productos', this.form);
      console.log(this.form);
    }
  }
}
</script>
