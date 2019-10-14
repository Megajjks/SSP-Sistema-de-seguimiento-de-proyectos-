<template>
  <div class="col-md-12 d-flex flex-column mb-2">
    <div class="col-md-12 d-flex justify-content-between align-items-center px-0 py-0 my-0 mx-0">
      <div class="col-md-6 d-flex justify-content-start">
        <h2>
          <span class="btn pl-0 pr-2 py-0 my-0" style="font-size: 1em">
            <i class="far fa-check-circle"></i>
          </span>Revisión de expendientes
        </h2>
      </div>
      <div class="col-md-6 d-flex justify-content-end">
        <span
          class="btn pl-0 pr-2 py-0 my-0"
          style="font-size: 1.5em; color: Dodgerblue"
          @click="abrirModal('actividad','editar')"
        >
          <i class="fas fa-edit"></i>
        </span>
        <span class="btn pl-0 pr-2 py-0 my-0" style="font-size: 1.5em; color: Tomato;">
          <i class="fas fa-trash-alt"></i>
        </span>
      </div>
    </div>
    <div class="d-flex justify-content-between align-items-center px-0 py-0 my-0 mx-0">
      <div class="col-md-6 d-flex justify-content-start">
        <p class="btn-danger btn-round btn-sm mr-1">Alto</p>
        <p class="btn-default btn-round btn-sm mr-1">Para:Jayro Salazar</p>
        <p class="btn-danger btn-round btn-sm mr-1">Expira: 06/10/2019</p>
      </div>
      <div class="col-md-6 d-flex justify-content-end">
        <p class="btn-warning btn-round btn-sm">En progreso</p>
        <p class="btn-primary btn-border btn-round btn-sm">En evaluación</p>
        <p class="btn-danger btn-border btn-round btn-sm">En corrección</p>
        <p class="btn-success btn-border btn-round btn-sm">Aprovado</p>
      </div>
    </div>
<!--Modal añadir / editar proyecto-->
    <div class="modal fade mt-5" tabindex="-1" :class="{'mostrar' : modal}" role="dialog">
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
                <input type="text" class="form-control input-solid" placeholder="Mi proyecto nuevo" />
              </div>
              <div class="d-flex justify-content-between align-items-center">
                <div class="form-group col-md-4">
                  <label for="exampleFormControlSelect1">Tipo de prioridad</label>
                  <select class="form-control input-solid" id="exampleFormControlSelect1">
                    <option>Bajo</option>
                    <option>Medio</option>
                    <option>Alto</option>
                  </select>
                </div>
                <div class="form-group col-md-4">
                  <label for="exampleFormControlInput1">Expira el:</label>
                  <input type="date" class="form-control input-solid" />
                </div>
                <div class="form-group col-md-4">
                  <label for="exampleFormControlInput1">A las:</label>
                  <input type="time" class="form-control input-solid" />
                </div>
              </div>
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Descripción</label>
                <textarea class="form-control input-solid" rows="5"></textarea>
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
export default {
  data() {
    return {
      modal: 0,
      tituloModal: "",
      tipoAccion: 0,
      errorProyecto: 0,
      errorMostrarMsjProyecto: []
    };
  },
  methods: {
    abrirModal(modelo, accion, data = []) {
      switch (modelo) {
        case "actividad":
          {
            switch (accion) {
              case "crear": {
                this.modal = 1;
                this.tituloModal = "Nueva Actividad";
                this.tipoAccion = 1;
                break;
              }
              case "editar": {
                this.modal = 1;
                this.tituloModal = "Editar Actividad";
                this.tipoAccion = 2;
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
    console.log("Component mounted.");
  }
};
</script>
