<template>
  <div class="col-md-12">
    <div class="col-md-12 d-flex justify-content-between py-4 mx-0">
      <h1>Proyectos asignados</h1>
      <button
        class="btn btn-success font-weight-bold"
        type="button"
        @click="abrirModal('categoria','registrar')"
      >
        <span class="btn-label">
          <i class="fa fa-plus-circle"></i>
        </span> Agregar Proyecto
      </button>
    </div>
   <div class="col-md-12 row">
      <div
        class="col-md-5 animated fadeIn"
        v-for="proyecto in arrayColaborador"
        :key="proyecto.id_proyecto"
      >
        <div class="card card-round card-efecto" @click="mostrarproyecto(proyecto)">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h2 class="card-title" v-text="proyecto.nombre"></h2>
            <span
              class="btn btn-lg"
              data-toggle="collapse"
              href="#collapseExample"
              role="button"
              aria-expanded="false"
              aria-controls="collapseExample"
            >
              <i class="fas fa-ellipsis-v"></i>
            </span>
            <div class="collapse" id="collapseExample">
              <a class="dropdown-item" href="#" @click="abrirModal('categoria','actualizar',proyecto)">
                <span>
                  <i class="fas fa-edit"></i>
                </span>Editar
              </a>
              <a class="dropdown-item" href="#" @click="eliminarProyectoCompartido(proyecto.id_proyecto)">
                <span>
                  <i class="fas fa-trash-alt"></i>
                </span>Eliminar
              </a>
            </div>
          </div>
          <a href="http://localhost:8000/actividad1">
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
            <template v-if="tipoAccion==1 || tipoAccion==2 || tipoAccion==3">
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
              <div v-show="errorProyectoCompartido" class="form-group row div-error">
                <div class="text-center text-error">
                  <div
                    v-for="error in errorMostrarMsjProyectoCompartido"
                    :key="error"
                    v-text="error"
                    class="alert alert-danger"
                  ></div>
                </div>
              </div>
            </form>
            <!--modal 2-->
            <form>
               <div class="form-group">
                <label for="exampleFormControlInput1">Nombre del Colaborador</label>
                <input
                  type="text"
                  v-model="name"
                  class="form-control input-solid"
                  placeholder="Nuevo Colaborador"
                />
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Email</label>
                <input
                  type="text"
                  v-model="email"
                  class="form-control input-solid"
                  placeholder="Nuevo email"
                />
              </div>
              <div v-show="errorProyectoCompartido" class="form-group row div-error">
                <div class="text-center text-error">
                  <div
                    v-for="error in errorMostrarMsjProyectoCompartido"
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
              @click="registrarProyectoCompartido()"
              class="btn btn-success font-weight-bold"
            >Añadir proyecto</button>
            <button
              type="button"
              v-if="tipoAccion==2"
              @click="actualizarProyectoCompartido()"
              class="btn btn-success font-weight-bold"
            >Actualizar proyecto</button>
            <button
              type="button"
              v-if="tipoAccion==3"
              @click="registrarColaborador()"
              class="btn btn-success font-weight-bold"
            >registrar Colaborador</button>
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
      id_colaborador:"",
      id_proyecto:"",
      id_usuario:"",
      
      name:"",
      email:"",
      password:"",
      nombre: "",
      describcion: "",
      estatus: 0,
      estado_actual: "",
      ncolaboradores: "",
      fec_ini: "",
      fec_fin: "",
      tareascheck: "0",
      tareasnocheck: "0",
      arrayColaborador: [],
      modal: 0,
      tituloModal: "",
      tipoAccion: 0,
      errorProyectoCompartido: 0,
      errorMostrarMsjProyectoCompartido: []
    };
  },
  methods: {
    listarProyectoCompartido() {
      let me = this;
      axios
        .get("/colaborador")
        .then(function(response) {
          // handle success
          me.arrayColaborador = response.data;
        })
        .catch(function(error) {
          // handle error
          console.log(error);
        });
    },
    registrarProyectoCompartido() {
      //validación de datos previos
      if (this.validarProyectoCompartido()) {
        return;
      }

      let metodo = this;
      axios
        .post("/colaborador", {
          id_colaborador: this.id_colaborador,
          nombre: this.nombre,
          describcion: this.describcion,
          id_proyecto: this.id_proyecto,
          id_usuario: this.id_usuario,
          name: this.name,
          email: this.email,
          password: this.password
        })
        .then(function(response) {
          metodo.cerrarModal();
          metodo.listarProyectoCompartido();
        })
        .catch(function(error) {
          console.log(error);
        });
     
    },
     registrarColaborador() {
      //validación de datos previos
      if (this.validarProyectoCompartido()) {
        return;
      }

      let metodo = this;
      axios
        .post("/colaborador/actualizar", {
          id_colaborador: this.id_colaborador,
          id_usuario: this.id_usuario,
          name: this.name,
          email: this.email,
         })
        .then(function(response) {
          metodo.cerrarModal();
          metodo.listarProyectoCompartido();
        })
        .catch(function(error) {
          console.log(error);
        });
      this.sendEmailUser();
    },

    actualizarProyectoCompartido() {
      //validación de datos previos
      if (this.validarProyectoCompartido()) {
        return;
      }

      let metodo = this;
      axios
        .post("/colaborador/actualizar", {
          id_colaborador: this.id_colaborador,
          id_proyecto : this.id_proyecto,
          id_usuario: this.id_usuario,
          nombre: this.nombre,
          describcion: this.describcion,
          estatus: this.estatus,
          estado_actual: this.estado_actual,
          ncolaboradores: this.ncolaboradores,
          fec_ini: this.fec_ini,
          name: this.name,
          email: this.email,
          password: this.password
        })
        .then(function(response) {
          metodo.cerrarModal();
          metodo.listarProyectoCompartido();
        })
        .catch(function(error) {
          console.log(error);
        });
      this.sendEmailUser();
    },

    validarProyectoCompartido() {
      this.errorProyectoCompartido = 0;
      this.errorMostrarMsjProyectoCompartido = [];

      if (!this.nombre)
        this.errorMostrarMsjProyectoCompartido.push(
          "El nombre del proyecto no puede estar vacio"
        );
      if (!this.describcion)
        this.errorMostrarMsjProyectoCompartido.push(
          "La descripción del proyecto no puede estar vacio"
        );
      if (this.errorMostrarMsjProyectoCompartido.length) this.errorProyectoCompartido = 1;
      return this.errorProyectoCompartido;
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
      this.id_proyecto = "";
      this.id_usuario = "";
      this.name = "";
      this.email = "";
      this.password = "";
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
                this.id_proyecto = "";
                this.id_usuario = "";
                this.name = "";
                this.email = "";
                this.password = "";
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
                this.id_colaborador = data['id_colaboraor'];
                this.id_proyecto = data['id_proyecto'];
                this.id_usuario = data['id_usuario'];
                this.name = data['name'];
                this.email = data['email'];
                this.password = data['password'];
                break;
              }
              case "colaborador": {
               this.modal = 1;
                this.tituloModal = "Agregar colaborador";
                this.tipoAccion = 3;
                this.id_proyecto = "";
                this.id_usuario = "";
                this.name = "";
                this.email = "";
                this.password = "";
                break;
              }
            }
            
          }
          break;
      }
    },
    eliminarProyectoCompartido(id) {
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
            let url = "/deletecolaborador/" + id;
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
    MostrarProyectoCompartido(data = []) {
      console.log(data);
    },
    //conexiones con el api de outlook
    sendEmailUser() {
      console.log("Entre a sendEmail");
      axios
        .post("https://outlook.office.com/api/v2.0/me/sendmail", {
          Message: {
            Subject: "¡Nuevo proyecto!",
            Body: {
              ContentType: "Text",
              Content: "Te han agregado a un nuevo proyecto."
            },
            ToRecipients: [
              {
                EmailAddress: {
                  Address: "5871@itescam.edu.mx"
                }
              }
            ],
            Attachments: [
              {
                "@odata.type": "#Microsoft.OutlookServices.FileAttachment",
                Name: "menu.txt",
                ContentBytes: "bWFjIGFuZCBjaGVlc2UgdG9kYXk="
              }
            ]
          },
          SaveToSentItems: "false"
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
    this.listarProyectoCompartido();
  }
};
</script>