<template>
  <div class="col-md-12">
    <div class="col-md-12 d-flex justify-content-between align-items-center py-4 mx-0">
      <span class="btn btn-lg">
        <i class="fas fa-arrow-left"></i>
      </span>
      <h1 class="font-weight-bold h1">Mi proyecto compartido</h1>
      <button
        class="btn btn-success font-weight-bold btn-round"
        type="button"
        @click="abrirModalColaborador()"
      >
        <span class="btn-label">
          <i class="fa fa-user-plus"></i>
        </span> Agregar Usuario
      </button>
    </div>
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
            <!--Card confirmar actividad actividades-->
            <div class="col-md-12 card d-flex flex-column justify-content-center align-items-center px-0 py-0 my-0 mx-0 animated fadeIn" v-if="actividad.estado=='en evaluacion'">
              <h2 class="card-header font-weight-bold">~ Evaluación de la actividad " <span v-text="actividad.titulo"></span> " ~</h2>
              <h3 class="card-body">La actividad " <span class="font-weight-bold" v-text="actividad.titulo"></span> " ha sido acabada, ¿confirma que ha sido realizada correctamente o hay correcciones por hacer?</h3>
              <div class="d-flex justify-content-between align-items-center my-1 card-footer">
                <button type="button" class="btn btn-outline-success btn-sm btn-round mx-3" @click="aprovarAct(actividad)">Actividad Aprobada</button>
                <button type="button" class="btn btn-outline-danger btn-sm btn-round mx-3" @click="corregirAct(actividad)">Actividad En Corrección</button>
              </div>
            </div>
            <!--Card actividades-->
            <div class="col-md-12 d-flex flex-column px-0 py-0 my-0 mx-0 animated fadeIn" v-else>
              <div
                class="col-md-12 d-flex justify-content-between align-items-center px-0 py-0 my-0 mx-0"
              >
                <div class="col-md-6 d-flex justify-content-start align-items-center">
                  <span
                    class="btn pl-0 pr-2 py-0 my-0"
                    style="font-size: 1em"
                    v-if="actividad.estado=='en progreso'"
                    @click="evaluarAct(actividad)"
                  >
                    <i class="far fa-check-circle fa-2x"></i>
                  </span>
                  <span
                    class="btn pl-0 pr-2 py-0 my-0"
                    style="font-size: 1em"
                    v-if="actividad.estado=='en correccion'"
                    @click="evaluarAct(actividad)"
                  >
                    <i class="far fa-check-circle fa-2x"></i>
                  </span>
                  <span
                    class="pl-0 pr-2 py-0 my-0"
                    style="font-size: 1em; color:gray;"
                    v-if="actividad.estado=='en evaluacion'"
                  >
                    <i class="fas fa-check-circle fa-2x"></i>
                  </span>
                  <span
                    class="pl-0 pr-2 py-0 my-0"
                    style="font-size: 1em; color:gray;"
                    v-if="actividad.estado=='aprobado'"
                  >
                    <i class="fas fa-check-circle fa-2x"></i>
                  </span>
                  <del v-if="actividad.estado=='aprobado'">
                    <h2 v-text="actividad.titulo"></h2>
                  </del>
                  <h2 v-text="actividad.titulo" v-else></h2>
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
                  <p
                    class="btn-primary btn-round btn-sm mr-1"
                    v-text="actividad.prioridad"
                    v-if="actividad.prioridad=='Bajo'"
                  ></p>
                  <p
                    class="btn-warning btn-round btn-sm mr-1"
                    v-text="actividad.prioridad"
                    v-if="actividad.prioridad=='Medio'"
                  ></p>
                  <p
                    class="btn-danger btn-round btn-sm mr-1"
                    v-text="actividad.prioridad"
                    v-if="actividad.prioridad=='Alto'"
                  ></p>
                  <p class="btn-default btn-round btn-sm mr-1">Para: <span v-text="actividad.colaborador"></span></p>
                  <p class="btn-danger btn-round btn-sm mr-1">
                    Expira:
                    <span v-text="actividad.fec_exp"></span>
                  </p>
                </div>
                <div
                  class="col-md-6 d-flex justify-content-end"
                  v-if="actividad.estado=='en progreso'"
                >
                  <p class="btn-warning btn-round btn-sm">En progreso</p>
                  <p class="btn-primary btn-border btn-round btn-sm">En evaluación</p>
                  <p class="btn-danger btn-border btn-round btn-sm">En corrección</p>
                  <p class="btn-success btn-border btn-round btn-sm">aprobado</p>
                </div>
                <div
                  class="col-md-6 d-flex justify-content-end"
                  v-if="actividad.estado=='en evaluacion'"
                >
                  <p class="btn-warning btn-border btn-round btn-sm">En progreso</p>
                  <p class="btn-primary btn-round btn-round btn-sm">En evaluación</p>
                  <p class="btn-danger btn-border btn-round btn-sm">En corrección</p>
                  <p class="btn-success btn-border btn-round btn-sm">aprobado</p>
                </div>
                <div
                  class="col-md-6 d-flex justify-content-end"
                  v-if="actividad.estado=='en correccion'"
                >
                  <p class="btn-warning btn-border btn-round btn-sm">En progreso</p>
                  <p class="btn-primary btn-border btn-round btn-sm">En evaluación</p>
                  <p class="btn-danger btn-round btn-round btn-sm">En corrección</p>
                  <p class="btn-success btn-border btn-round btn-sm">aprobado</p>
                </div>
                <div
                  class="col-md-6 d-flex justify-content-end"
                  v-if="actividad.estado=='aprobado'"
                >
                  <p class="btn-warning btn-border btn-round btn-sm">En progreso</p>
                  <p class="btn-primary btn-border btn-round btn-sm">En evaluación</p>
                  <p class="btn-danger btn-border btn-round btn-sm">En corrección</p>
                  <p class="btn-success btn-round btn-round btn-sm">aprobado</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--Modal añadir / editar actividad-->
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
                <div class="form-group col-md-3">
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
                <div class="form-group col-md-3">
                  <label for="exampleFormControlSelect1">Asignar a:</label>
                  <select
                    class="form-control input-solid"
                    v-model="colaborador"
                    id="exampleFormControlSelect1"
                  >
                    <option v-for="col in arrayColaborador" :key="col">{{col}}</option>
                  </select>
                </div>
                <div class="form-group col-md-3">
                  <label for="exampleFormControlInput1">Expira el:</label>
                  <input type="date" v-model="fec_exp" class="form-control input-solid" />
                </div>
                <div class="form-group col-md-3">
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
    <!--Modal añadir / eliminar colaborador-->
    <div class="modal fade" tabindex="-1" :class="{'mostrar' : modal2}" role="dialog">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title font-weight-bold">Colaboradores del proyecto</h3>
            <button type="button" @click="cerrarModal()" class="close" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group">
                <label for="exampleFormControlInput1">Nombre del colaborador</label>
                <input
                  type="text"
                  v-model="nameColaborador"
                  class="form-control input-solid"
                  placeholder="Fulanoide Silverio"
                />
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button
              type="button"
              @click="registrarcolaborador()"
              class="btn btn-success font-weight-bold"
            >Añadir colaborador</button>
            <button
              type="button"
              @click="cerrarModalColaborador()"
              class="btn btn-danger font-weight-bold"
            >Cancelar</button>
          </div>
        </div>
      </div>
    </div>
    <!--Card de Proyecto-->
    <div class="col-md-12 row">
      <div class="col-md-12 animated fadeIn">
        <div class="card card-round card-efecto">
          <div class="card-header col-md-12 d-flex justify-content-between align-items-center py-3 mx-0">
            <div class="col-md-7">
              <h2 class="card-title font-weight-bold h2">Datos del proyecto</h2>
            </div>
            <div class="col-md-3 card-dark bg-primary-gradient card-round blockquote text-center" v-if="proyecto.estatus=='En progreso'">
              <p class="h4 mx-auto" v-text="proyecto.estatus"></p>
            </div>
            <div class="col-md-3 card-dark bg-warning-gradient card-round blockquote text-center" v-if="proyecto.estatus=='En evaluacion'">
              <p class="h4 mx-auto" v-text="proyecto.estatus"></p>
            </div>
            <div class="col-md-3 card-dark bg-success-gradient card-round blockquote text-center" v-if="proyecto.estatus=='Finalizado'">
              <p class="h4 mx-auto" v-text="proyecto.estatus"></p>
            </div>
          </div>
          <div class="card-body d-flex flex-column">
            <div class="progress-card">
              <div class="progress-status">
                <span class="text-muted">Avance del proyecto</span>
                <span class="text-muted fw-bold"><span v-text="proyecto.estado_actual">%</span></span>
              </div>
              <div class="progress" style="height: 22px;">
                <div
                  class="progress-bar bg-success-gradient animated slideInLeft"
                  role="progressbar"
                  style="width: 20%"
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
            <div class="col-md-12 d-flex justify-content-start px-0 mx-0">
              <p class="btn-secondary btn-round btn-sm mr-1">Inicio:<span v-text="proyecto.fec_ini"></span></p>
              <p class="btn-danger btn-round btn-sm mr-1">Fin:<span v-if="proyecto.fec_fin==''">--/--/----</span> <span v-else v-text="proyecto.fec_fin"></span></p>
              <p class="btn-default btn-round btn-sm mr-1"> <span v-text="proyecto.ncolaboradores"></span> Colaborador</p>
            </div>
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
      arrayColaborador:['Jayro Salazar', 'Uziel Can', 'Leonardo Catch'], 
      nameColaborador:"",
      proyecto:[],
      arrayActividades: [],
      modal: 0,
      modal2: 0,
      tituloModal: "",
      tipoAccion: 0,
      errorActividad: 0,
      errorMostrarMsjActividad: [],
      titulo: "",
      prioridad: "",
      colaborador:"",
      fec_exp: "",
      hrs_exp: "",
      descripcion: "",
      id_actividad: 0,
      id_proyecto: 0,
      id_colaborador: 0,
      estado: "",
      nombre:"",
      id_pro :0,
      nombre_pro:"",
      describcion_pro:"",
      estatus_pro:"",
      estado_actual_pro:0,
      ncolaboradores_pro:0,
      fec_ini_pro:""
    };
  },
  methods: {
    listarActividades() {
      let me = this;
      axios
        .get("/lista-actividades-asignadas")
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
        .post("/lista-actividades-asignadas", {
          titulo: this.titulo,
          prioridad: this.prioridad,
          colaborador: this.colaborador,
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
      let url = "/lista-actividades-asignadas/${id_actividad}";
      axios
        .put("/lista-actividades-asignadas/${id_actividad}", {
          titulo: this.titulo,
          prioridad: this.prioridad,
          estado: this.estado,
          colaborador: this.colaborador,
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
          text: "Al hacerlo esta actividad quedara eliminanda de por vida",
          type: "warning",
          showCancelButton: true,
          confirmButtonText: "Si, ¡eliminarlo!",
          cancelButtonText: "No, ¡cancelar!",
          reverseButtons: true
        })
        .then(result => {
          if (result.value) {
            console.log("ok" + id);
            console.log(url);
            let metodo = this;
            let url = "/deleteactividad-asignadas/" + id;
            axios
              .delete(url, {
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
    abrirModalColaborador(){
      this.modal2 = 1;
      this.nameColaborador="";
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
                this.estado = data["estado"];
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
    },
    cerrarModalColaborador(){
      this.modal2 = 0;
      this.nameColaborador="";
    },
    realizarAct(model) {
      let metodo = this;
      axios
        .put("/lista-actividades-asignadas/${id_actividad}", {
          titulo: model.titulo,
          prioridad: model.prioridad,
          estado: 'en progreso',
          colaborador: model.colaborador,
          fec_exp: model.fec_exp,
          hrs_exp: model.hrs_exp,
          descripcion: model.descripcion,
          id_actividad: model.id_actividad,
          id_proyecto: model.id_proyecto,
          id_colaborador: model.id_colaborador
        })
        .then(function(response) {
          metodo.listarActividades();
        })
        .catch(function(error) {
          console.log(error);
        });
        this.vpuntos(this.arrayActividades, this.proyecto);
    },
    evaluarAct(model) {
      let metodo = this;
      axios
        .put("/lista-actividades-asignadas/${id_actividad}", {
          titulo: model.titulo,
          prioridad: model.prioridad,
          estado: 'en evaluacion',
          colaborador: model.colaborador,
          fec_exp: model.fec_exp,
          hrs_exp: model.hrs_exp,
          descripcion: model.descripcion,
          id_actividad: model.id_actividad,
          id_proyecto: model.id_proyecto,
          id_colaborador: model.id_colaborador
        })
        .then(function(response) {
          metodo.listarActividades();
        })
        .catch(function(error) {
          console.log(error);
        });
        this.vpuntos(this.arrayActividades, this.proyecto);
    },
    corregirAct(model) {
      let metodo = this;
      axios
        .put("/lista-actividades-asignadas/${id_actividad}", {
          titulo: model.titulo,
          prioridad: model.prioridad,
          estado: 'en correccion',
          colaborador: model.colaborador,
          fec_exp: model.fec_exp,
          hrs_exp: model.hrs_exp,
          descripcion: model.descripcion,
          id_actividad: model.id_actividad,
          id_proyecto: model.id_proyecto,
          id_colaborador: model.id_colaborador
        })
        .then(function(response) {
          metodo.listarActividades();
        })
        .catch(function(error) {
          console.log(error);
        });
        this.vpuntos(this.arrayActividades, this.proyecto);
    },
    aprovarAct(model) {
      let metodo = this;
      axios
        .put("/lista-actividades-asignadas/${id_actividad}", {
          titulo: model.titulo,
          prioridad: model.prioridad,
          estado: 'aprobado',
          colaborador: model.colaborador,
          fec_exp: model.fec_exp,
          hrs_exp: model.hrs_exp,
          descripcion: model.descripcion,
          id_actividad: model.id_actividad,
          id_proyecto: model.id_proyecto,
          id_colaborador: model.id_colaborador
        })
        .then(function(response) {
          metodo.listarActividades();
        })
        .catch(function(error) {
          console.log(error);
        });
        this.vpuntos(this.arrayActividades, this.proyecto);
    },
    listarProyecto(id) {
      let me = this;
      let url='/unproyectoasig/'+id;
      axios
        .get(url)
        .then(function(response) {
          // handle success
          me.proyecto = response.data;
          //console.log(response);
        })
        .catch(function(error) {
          // handle error
          console.log(error);
        });
    },
    vpuntos(array, proyecto){
      var total = array.length;
      var aprovados=0;
      let metodo = this;
      for (var act in array){
        if(array[act].estado=="aprobado"){
          aprovados++;
          console.log(array[act]);
        }
      }
      var punto = 100/total;
      var totalpts = punto*aprovados;
      let url ="/sharedproject/update/" + proyecto.id_proyecto;
       axios
        .post(url, {
          id_pro : proyecto.id_proyecto,
          nombre_pro: proyecto.nombre,
          describcion_pro: proyecto.describcion,
          estatus_pro: proyecto.estatus,
          estado_actual_pro: totalpts,
          ncolaboradores_pro: proyecto.ncolaboradores,
          fec_ini_pro: proyecto.fec_ini
        })
        .then(function(response) {
          metodo.listarActividades();
        })
        .catch(function(error) {
          console.log(error);
        });

      console.log(total)
      console.log(punto)
      console.log(aprovados)
      console.log(totalpts)
      console.log(array)
      this.listarProyecto(2);
    },
    registrarcolaborador(){
      let colaborador = this.nameColaborador;
      this.arrayColaborador.push(colaborador);
      this.cerrarModalColaborador();
      //console.log(colaborador);
      let numcolaboradores = this.arrayColaborador.length;
      let url ="/sharedproject/update/" + this.proyecto.id_proyecto;
       axios
        .post(url, {
          id_pro : this.proyecto.id_proyecto,
          nombre_pro: this.proyecto.nombre,
          describcion_pro: this.proyecto.describcion,
          estatus_pro: this.proyecto.estatus,
          estado_actual_pro: this.proyecto.estado_actual,
          ncolaboradores_pro: numcolaboradores,
          fec_ini_pro: this.proyecto.fec_ini
        })
        .then(function(response) {
          metodo.listarActividades();
        })
        .catch(function(error) {
          console.log(error);
        });
        console.log(numcolaboradores)
        this.listarProyecto(2);
    }
  },
  mounted() {
    this.listarActividades();
    this.listarProyecto(2);
    //console.log("Component mounted.");
  }
};
</script>
