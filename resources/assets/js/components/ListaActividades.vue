<template>
  <div class="col-md-12">
    <div class="col-md-12 row">
      <div class="col-md-12 animated fadeIn">
        <div class="card card-round card-efecto">
          <div class="card-header d-flex justify-content-between align-items-center py-3 mx-0">
            <h2 class="card-title font-weight-bold h2">Lista de actividades</h2>
            <button
              class="btn btn-success font-weight-bold btn-round"
              type="button"
              @click="abrirModal('actividad','crear')"
            >
              <span class="btn-label">
                <i class="fa fa-plus-circle"></i>
              </span> Nueva Actividad
            </button>
          </div>
          <div
            class="card-body px-0 py-0 my-0 mx-0"
            v-for="actividad in arrayActividades"
            :key="actividad.id_actividad"
          >
            <!--Card actividades-->
            <div class="col-md-12 d-flex flex-column px-0 py-0 my-0 mx-0">
              <div
                class="col-md-12 d-flex justify-content-between align-items-center px-0 py-0 my-0 mx-0"
              >
                <div class="col-md-6 d-flex justify-content-start">
                  <h2 v-text="actividad.titulo">
                    <span class="btn pl-0 pr-2 py-0 my-0" style="font-size: 1em">
                      <i class="far fa-check-circle"></i>
                    </span>
                  </h2>
                </div>
                <div class="col-md-6 d-flex justify-content-end">
                  <span
                    class="btn pl-0 pr-2 py-0 my-0"
                    style="font-size: 1.5em; color: Dodgerblue"
                    @click="abrirModal('actividad','editar',actividad)"
                  >
                    <i class="fas fa-edit"></i>
                  </span>
                  <span
                    class="btn pl-0 pr-2 py-0 my-0"
                    style="font-size: 1.5em; color: Tomato;"
                    @click="eliminarActividad(actividad.id_actividad)"
                  >
                    <i class="fas fa-trash-alt"></i>
                  </span>
                </div>
              </div>
              <div class="d-flex justify-content-between align-items-center px-0 py-0 my-0 mx-0">
                <div class="col-md-6 d-flex justify-content-start">
                  <p class="btn-danger btn-round btn-sm mr-1" v-text="actividad.prioridad"></p>
                  <p class="btn-default btn-round btn-sm mr-1">Para:Jayro Salazar</p>
                  <p class="btn-danger btn-round btn-sm mr-1">
                    Expira:
                    <span v-text="actividad.fec_exp"></span>
                  </p>
                </div>
                <div class="col-md-6 d-flex justify-content-end">
                  <p class="btn-warning btn-round btn-sm">En progreso</p>
                  <p class="btn-primary btn-border btn-round btn-sm">En evaluación</p>
                  <p class="btn-danger btn-border btn-round btn-sm">En corrección</p>
                  <p class="btn-success btn-border btn-round btn-sm">Aprovado</p>
                </div>
              </div>
            </div>
          </div>
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
            <form>
              <div class="form-group">
                <label for="exampleFormControlInput1">Nombre de la Actividad</label>
                <input
                  type="text"
                  v-model="titulo"
                  class="form-control input-solid"
                  placeholder="Mi proyecto nuevo"
                />
              </div>
              <div class="d-flex justify-content-between align-items-center">
                <div class="form-group col-md-4">
                  <label for="exampleFormControlSelect1">Tipo de prioridad</label>
                  <select
                    class="form-control input-solid"
                    v-model="prioridad"
                    id="exampleFormControlSelect1"
                  >
                    <option>Bajo</option>
                    <option>Medio</option>
                    <option>Alto</option>
                  </select>
                </div>
                <div class="form-group col-md-4">
                  <label for="exampleFormControlInput1">Expira el:</label>
                  <input type="date" v-model="fec_exp" class="form-control input-solid" />
                </div>
                <div class="form-group col-md-4">
                  <label for="exampleFormControlInput1">A las:</label>
                  <input type="time" v-model="hrs_exp" class="form-control input-solid" />
                </div>
              </div>
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Descripción</label>
                <textarea class="form-control input-solid" v-model="descripcion" rows="5"></textarea>
              </div>
              <div v-show="errorActividad" class="form-group row div-error">
                <div class="text-center text-error">
                  <div
                    v-for="error in errorMostrarMsjActividad"
                    :key="error"
                    v-text="error"
                    class="alert alert-danger"
                  ></div>
                </div>
              </div>
              <div v-show="errorActividad" class="form-group row div-error">
                <div class="text-center text-error">
                  <div
                    v-for="error in errorMostrarMsjActividad"
                    :key="error"
                    v-text="error"
                    class="alert alert-danger"
                  ></div>
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button
              type="button"
              v-if="tipoAccion==1"
              @click="registrarActividad()"
              class="btn btn-success font-weight-bold"
            >Añadir actividad</button>
            <button
              type="button"
              v-if="tipoAccion==2"
              @click="actualizarActividad()"
              class="btn btn-success font-weight-bold"
            >Actualizar actividad</button>
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
import Actividad from "./Actividad";
export default {
  component: {
    Actividad
  },
  data() {
    return {
      arrayActividades: [],
      modal: 0,
      tituloModal: "",
      tipoAccion: 0,
      errorActividad: 0,
      errorMostrarMsjActividad: [],
      titulo: "",
      prioridad: "",
      fec_exp: "",
      hrs_exp: "",
      descripcion: "",
      id_actividad: 0,
      id_proyecto: 0,
      id_colaborador: 0
    };
  },
  methods: {
    listarActividades() {
      let me = this;
      axios
        .get("/lista-actividades")
        .then(function(response) {
          // handle success
          me.arrayActividades = response.data;
          //console.log(response);
        })
        .catch(function(error) {
          // handle error
          console.log(error);
        });
    },
    registrarActividad() {
      if (this.validarProyecto()) {
        return;
      }

      let metodo = this;
      axios
        .post("/lista-actividades", {
          titulo: this.titulo,
          prioridad: this.prioridad,
          fec_exp: this.fec_exp,
          hrs_exp: this.hrs_exp,
          descripcion: this.descripcion
        })
        .then(function(response) {
          metodo.cerrarModal();
          metodo.listarActividades();
        })
        .catch(function(error) {
          console.log(error);
        });
    },
    actualizarActividad() {
      if (this.validarProyecto()) {
        return;
      }

      let metodo = this;
      axios
        .put("/lista-actividades/${id_actividad}", {
          titulo: this.titulo,
          prioridad: this.prioridad,
          fec_exp: this.fec_exp,
          hrs_exp: this.hrs_exp,
          descripcion: this.descripcion,
          id_actividad: this.id_actividad,
          id_proyecto: this.id_proyecto,
          id_colaborador: this.id_colaborador
        })
        .then(function(response) {
          metodo.cerrarModal();
          metodo.listarActividades();
        })
        .catch(function(error) {
          console.log(error);
        });
    },
    eliminarActividad(id) {
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
          text: "Al hacerlo esta actividad quedara eliminanda de por vida",
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
            axios
              .delete("/lista-actividades/${id}", {
                //'id': id
              })
              .then(function(response) {
                metodo.listarActividades();
                swalWithBootstrapButtons.fire(
                  "¡Eliminada!",
                  "La actividad ha sido eliminado de forma correcta.",
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
              "La actividad esta segura",
              "error"
            );
          }
        });
    },
    validarProyecto() {
      this.errorActividad = 0;
      this.errorMostrarMsjActividad = [];

      if (!this.titulo)
        this.errorMostrarMsjActividad.push(
          "El titulo de la actividad no puede estar vacio"
        );
      if (!this.prioridad)
        this.errorMostrarMsjActividad.push(
          "La prioridad de la actividad no puede estar vacio"
        );
      if (!this.fec_exp)
        this.errorMostrarMsjActividad.push(
          "La fecha de termino de la actividad no puede estar vacio"
        );
      if (!this.hrs_exp)
        this.errorMostrarMsjActividad.push(
          "La hora de termino de la actividad no puede estar vacio"
        );
      if (!this.descripcion)
        this.errorMostrarMsjActividad.push(
          "La descripcion de la actividad no puede estar vacio"
        );
      if (this.errorMostrarMsjActividad.length) this.errorActividad = 1;
      return this.errorActividad;
    },
    abrirModal(modelo, accion, data = []) {
      switch (modelo) {
        case "actividad":
          {
            switch (accion) {
              case "crear": {
                this.modal = 1;
                this.tituloModal = "Nueva Actividad";
                this.tipoAccion = 1;
                this.titulo = "";
                this.prioridad = "";
                this.fec_exp = "";
                this.hrs_exp = "";
                this.descripcion = "";
                break;
              }
              case "editar": {
                this.modal = 1;
                this.tituloModal = "Editar Actividad";
                this.tipoAccion = 2;
                this.titulo = data["titulo"];
                this.prioridad = data["prioridad"];
                this.fec_exp = data["fec_exp"];
                this.hrs_exp = data["hrs_exp"];
                this.descripcion = data["descripcion"];
                this.id_actividad = data["id_actividad"];
                this.id_proyecto = data["id_proyecto"];
                this.id_colaborador = data["id_colaborador"];
                console.log(data);
                break;
              }
            }
          }
          break;
      }
    },
    cerrarModal() {
      this.modal = 0;
      this.tituloModal = "";
    }
  },
  mounted() {
    this.listarActividades();
    //console.log("Component mounted.");
  }
};
</script>
