<template>
  <div class="col-md-12">
    <div class="col-md-12 d-flex justify-content-between py-4 mx-0">
      <h1>Proyectos Asignados</h1>
    </div>
    <div class="col-md-12 row">
      <div
        class="col-md-5 animated fadeIn"
        v-for="proyecto in arrayProyecto"
        :key="proyecto.id_proyecto"
      >
        <div class="card card-round card-efecto" @click="mostrarproyecto(proyecto)">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h2 class="card-title" v-text="proyecto.nombre"></h2>
          </div>
          <a v-bind:href="proyecto.slug">
            <div class="card-body">
              <div class="row d-flex justify-content-between">
                <div
                  class="col-md-6 card-dark bg-primary-gradient card-round blockquote text-center"
                >
                  <p class="h4 mx-auto">0 Tareas faltantes</p>
                </div>
                <div
                  class="col-md-6 card-dark bg-success-gradient card-round blockquote text-center"
                >
                  <p class="h4 mx-auto">0 Tareas realizadas</p>
                </div>
              </div>
              <div class="row mt--2">
                <div class="col-md-5 text-center blockquote">
                  <p class="h4 mx-auto">Estatus actual</p>
                </div>
                <div
                  class="col-md-7 card-dark bg-primary-gradient card-round text-center blockquote"
                >
                  <p class="h4 mx-auto" v-text="proyecto.estatus"></p>
                </div>
              </div>
              <div class="progress-card">
                <div class="progress-status">
                  <span class="text-muted">Avance del proyecto</span>
                  <span class="text-muted fw-bold" v-text="proyecto.estado_actual">%</span>
                </div>
                <div class="progress" style="height: 10xpx;">
                  <div
                    class="progress-bar bg-success-gradient animated slideInLeft"
                    role="progressbar"
                    style="width: 10%"
                    aria-valuenow="10"
                    aria-valuemin="0"
                    aria-valuemax="100"
                    data-toggle="tooltip"
                    data-placement="top"
                    title
                    data-original-title="70%"
                  ></div>
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>

    <!--Modal añadir / editar proyecto-->
    <div class="modal fade" tabindex="-1" :class="{'mostrar' : modal}" role="dialog">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title font-weight-bold" v-text="tituloModal"></h3>
            <button type="button" @click="cerrarModal()" class="close" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <template v-if="tipoAccion==1 || tipoAccion==2">
            <form>
              <div class="form-group">
                <label for="exampleFormControlInput1">Nombre del proyecto</label>
                <input
                  type="text"
                  v-model="nombre"
                  class="form-control input-solid"
                  placeholder="Mi proyecto nuevo"
                />
              </div>
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Descripción</label>
                <textarea class="form-control input-solid" v-model="describcion" rows="5"></textarea>
              </div>
              <div v-show="errorProyecto" class="form-group row div-error">
                <div class="text-center text-error">
                  <div
                    v-for="error in errorMostrarMsjProyecto"
                    :key="error"
                    v-text="error"
                    class="alert alert-danger"
                  ></div>
                </div>
              </div>
            </form>
            </template>
          </div>
          <div class="modal-footer">
            <button
              type="button"
              v-if="tipoAccion==1"
              @click="registrarProyecto()"
              class="btn btn-success font-weight-bold"
            >Añadir proyecto</button>
            <button
              type="button"
              v-if="tipoAccion==2"
              @click="actualizarProyecto()"
              class="btn btn-success font-weight-bold"
            >Actualizar proyecto</button>
            <button
              type="button"
              @click="cerrarModal()"
              class="btn btn-danger font-weight-bold"
            >Cancelar</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      id_proyecto:"",
      nombre: "",
      describcion: "",
      estatus: 0,
      estado_actual: "",
      ncolaboradores: "",
      fec_ini: "",
      fec_fin: "",
      tareascheck: "0",
      tareasnocheck: "0",
      arrayProyecto: [],
      modal: 0,
      tituloModal: "",
      tipoAccion: 0,
      errorProyecto: 0,
      errorMostrarMsjProyecto: []
    };
  },
  methods: {
    listarproyecto() {
      let me = this;
      axios
        .get("/sharedproject")
        .then(function(response) {
          // handle success
          me.arrayProyecto = response.data;
        })
        .catch(function(error) {
          // handle error
          console.log(error);
        });
    },
    registrarProyecto() {
      //validación de datos previos
      if (this.validarProyecto()) {
        return;
      }

      let metodo = this;
      axios
        .post("/sharedproject", {
          nombre: this.nombre,
          describcion: this.describcion
        })
        .then(function(response) {
          metodo.cerrarModal();
          metodo.listarproyecto();
        })
        .catch(function(error) {
          console.log(error);
        });
      this.sendEmailUser();
    },

    actualizarProyecto() {
      //validación de datos previos
      if (this.validarProyecto()) {
        return;
      }

      let metodo = this;
      axios
        .post("/sharedproject/actualizar", {
          id_proyecto : this.id_proyecto,
          nombre: this.nombre,
          describcion: this.describcion,
          estatus: this.estatus,
          estado_actual: this.estado_actual,
          ncolaboradores: this.ncolaboradores,
          fec_ini: this.fec_ini
        })
        .then(function(response) {
          metodo.cerrarModal();
          metodo.listarproyecto();
        })
        .catch(function(error) {
          console.log(error);
        });
    },

    validarProyecto() {
      this.errorProyecto = 0;
      this.errorMostrarMsjProyecto = [];

      if (!this.nombre)
        this.errorMostrarMsjProyecto.push(
          "El nombre del proyecto no puede estar vacio"
        );
      if (!this.describcion)
        this.errorMostrarMsjProyecto.push(
          "La descripción del proyecto no puede estar vacio"
        );
      if (this.errorMostrarMsjProyecto.length) this.errorProyecto = 1;
      return this.errorProyecto;
    },
    

    cerrarModal() {
      this.modal = 0;
      this.tituloModal = "";
      this.nombre = "";
      this.describcion = "";
      this.estatus = 0;
      this.estado_actual = "";
      this.fec_ini = "";
      this.fec_fin = "";
    },

    abrirModal(modelo, accion, data = []) {
      switch (modelo) {
        case "categoria":
          {
            switch (accion) {
              case "registrar": {
                this.modal = 1;
                this.tituloModal = "¿Qué construiras hoy?";
                this.nombre = "";
                this.describcion = "";
                this.estatus = 0;
                this.estado_actual = "";
                this.fec_ini = "";
                this.fec_fin = "";
                this.tipoAccion = 1;
                break;
              }
              case "actualizar": {
                this.modal = 1;
                this.tituloModal = "Actualizar Datos del Proyecto";
                this.nombre = data['nombre'];
                this.describcion = data['describcion'];
                this.estado_actual = data['estado_actual'];
                this.estatus = data['estatus'];
                this.fec_ini = data['fec_ini'];
                this.tipoAccion = 2;
                this.id_proyecto = data['id_proyecto'];
                break;
              }
            }
            
          }
          break;
      }
    },
    eliminarProyecto(id) {
      console.log(id);
      const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: "btn btn-success",
          cancelButton: "btn btn-danger"
        },
        buttonsStyling: false
      });

      swalWithBootstrapButtons
        .fire({
          title: "¿Estas seguro?",
          text: "Al hacerlo este proyecto quedara eliminanda de por vida",
          type: "warning",
          showCancelButton: true,
          confirmButtonText: "Si, ¡eliminarlo!",
          cancelButtonText: "No, ¡cancelar!",
          reverseButtons: true
        })
        .then(result => {
          if (result.value) {
            console.log('ok' + id)
            let metodo = this;
            let url = "/deletesharedproject/" + id;
            console.log(url)
            axios
              .delete(url, {
                
              })
              .then(function(response) {
                metodo.listarproyecto();
                swalWithBootstrapButtons.fire(
                  "¡Eliminada!",
                  "El proyecto ha sido eliminado de forma correcta.",
                  "success"
                );
              })
              .catch(function(error) {
                console.log(error);
              });

          } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
          ) {
            swalWithBootstrapButtons.fire(
              "Cancelado",
              "El proyecto esta segura",
              "error"
            );
          }
        });
    },
    mostrarproyecto(data = []) {
      console.log(data);
    },
    //conexiones con el api de outlook
    sendEmailUser() {
      console.log("Entre a sendEmail");
      axios
        .post("/contactar", {
          
        })
        .then(function(response) {
          console.log(response);
        })
        .catch(function(error) {
          console.log(error);
        });
    }
  },
  mounted() {
    this.listarproyecto();
  }
};
</script>