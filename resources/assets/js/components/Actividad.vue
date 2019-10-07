<template>
  <div class="col-md-12 d-flex flex-column">
    <div class="col-md-12 d-flex justify-content-between py-4 mx-0">
      <div class="col-md-6 d-flex justify-content-start">
        <h4>
          <span>
            <i class="far fa-check-circle"></i>
          </span>Revisión de expendientes
        </h4>
      </div>
      <div class="col-md-6 d-flex justify-content-end">
        <span>
          <i class="fas fa-arrow-left"></i>
        </span>
        <p>|</p>
        <span>
          <i class="fas fa-trash-alt"></i>
        </span>
      </div>
    </div>
    <div class="col-md-12 d-flex justify-content-between px-0 mx-0">
      <div class="col-md-6 d-flex justify-content-start">
        <button class="btn btn-danger btn-round btn-sm">
          Alto
        </button>
        <button class="btn btn-default btn-round btn-sm">
          Para:Jayro Salazar
        </button>
        <button class="btn btn-danger btn-round btn-sm">
          Expira: 06/10/2019
        </button>
      </div>
      <div class="col-md-6 d-flex justify-content-end">
        <button class="btn btn-warning btn-round btn-sm">
          En progreso
        </button>
        <button class="btn btn-primary btn-border btn-round btn-sm">
          En evaluación
        </button>
        <button class="btn btn-danger btn-border btn-round btn-sm">
          En corrección
        </button>
        <button class="btn btn-success btn-border btn-round btn-sm">
          Aprovado
        </button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  mounted() {
    console.log("Component mounted.");
  }
};
</script>