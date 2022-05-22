<template>
  <AppLayout title="Dashboard">

    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Editar Producto
      </h2>
    </template>



    <div class="max-w-2xl mx-auto">

      <!-- Button Eliminar -->
      <div class="flex justify-end pt-8 pb-4">
        <LinkButtonRed method="delete" :href="route('productos.destroy', producto.id)">
          <i class="fa-regular fa-trash-can pr-2"></i> Eliminar
        </LinkButtonRed>
      </div>
      <!-- End Button Eliminar -->

      <div class="shadow-md sm:rouned-lg px-8 py-6  bg-white">

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
            <LinkBlue method="get" :href="route('productos.index')">
              <i class="fa-solid fa-xmark pr-2"></i> Cancelar
            </LinkBlue>
            <JetButton class="ml-4 py-2.5" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
              <i class="fa-solid fa-pencil pr-2"></i> Editar Producto
            </JetButton>
          </div>

        </form>


      </div>
    </div>

  </AppLayout>

</template>
<script>
import AppLayout from '@/Layouts/AppLayout.vue';
import {Inertia} from '@inertiajs/inertia';
import LinkButtonRed from "../../Jetstream/LinkButtonRed";
import LinkBlue from "../../Jetstream/LinkBlue";
import {Head, Link, useForm} from '@inertiajs/inertia-vue3';
import JetButton from '@/Jetstream/Button.vue';
import JetButtonRed from '@/Jetstream/ButtonRed.vue';
import JetButtonBlue from '@/Jetstream/ButtonBlue.vue';
import JetInput from '@/Jetstream/Input.vue';
import JetLabel from '@/Jetstream/Label.vue';
import JetValidationErrors from '@/Jetstream/ValidationErrors.vue';

export default {
  props: {
    producto: Object,
    errors: Object
  },
  components: {
    AppLayout,
    JetButton,
    JetButtonRed,
    JetButtonBlue,
    JetInput,
    JetLabel,
    JetValidationErrors,
    useForm,
    Inertia,
    LinkButtonRed,
    LinkBlue
  },
  data() {
    return {
      form: {
        nombre: this.$inertia.page.props.producto.nombre,
        codigo: this.$inertia.page.props.producto.codigo,
        precio_sin_igv: this.$inertia.page.props.producto.precio_sin_igv,
        igv: this.$inertia.page.props.producto.igv,
        precio_con_igv: this.$inertia.page.props.producto.precio_con_igv,
      },
    };
  },
  methods: {
    loading: function () {
      console.log(this.$inertia.page.props.producto)

    },
    submit: function () {
      this.$inertia.put(
        route("productos.update", this.$props.producto.id),this.form
      );
    }
  },
  mounted() {
    this.loading();
  }


}
</script>
