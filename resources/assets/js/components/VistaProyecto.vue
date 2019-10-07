<template>
  <div class="col-md-12">
    <div class="col-md-12 d-flex justify-content-between py-4 mx-0">
      <span class="btn btn-lg">
        <i class="fas fa-arrow-left"></i>
      </span>
      <h1>Residencia 2019-2020</h1>
      <div class="d-flex justify-content-around">
        <button class="btn btn-primary btn-round">
          <span class="btn-label">
            <i class="fas fa-arrow-left"></i>
          </span>
          Modificar
        </button>
        <button class="btn btn-danger btn-round">
          <span class="btn-label">
            <i class="fas fa-trash-alt"></i>
          </span>
          Eliminar
        </button>
      </div>
    </div>
    
    <lista-actividades></lista-actividades>
    <datos-proyecto></datos-proyecto>

  </div>
</template>

<script>
export default {
  mounted() {
    console.log("Component mounted.");
  }
};
</script>