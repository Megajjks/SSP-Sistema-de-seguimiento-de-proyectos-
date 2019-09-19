<template>
  <table class="table table-head-bg-success mb-3">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nombre</th>
        <th scope="col">Descripcion</th>
        <th scope="col">Estatus</th>
        <th scope="col">Progreso</th>
        <th scope="col">Fecha inicio</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="proyecto in arrayProyecto" :key="proyecto.id_proyecto">
        <td v-text="proyecto.id_proyecto"></td>
        <td v-text="proyecto.nombre"></td>
        <td v-text="proyecto.describcion"></td>
        <td v-text="proyecto.estatus"></td>
        <td v-text="proyecto.estado_actual">%</td>
        <td v-text="proyecto.fec_ini"></td>
        <td></td>
      </tr>
    </tbody>
  </table>
</template>

<script>
export default {
  data() {
    return {
      nombre: "",
      describcion: "",
      tareascheck: "0",
      tareasnocheck: "0",
      arrayProyecto: []
    };
  },
  methods: {
    listarproyecto() {
      let me = this;
      axios
        .get("/proyecto")
        .then(function(response) {
          // handle success
          me.arrayProyecto = response.data;
        })
        .catch(function(error) {
          // handle error
          console.log(error);
        });
    }
  },
  mounted() {
    this.listarproyecto();
  }
};
</script>
