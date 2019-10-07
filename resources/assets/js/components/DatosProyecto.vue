<template>
  <div class="col-md-12">
    <div class="col-md-12 row">
      <div class="col-md-12 animated fadeIn">
        <div class="card card-round card-efecto">
          <div class="card-header col-md-12 d-flex justify-content-between py-4 mx-0">
            <div class="col-md-7">
              <h2 class="card-title">Datos del proyecto</h2>
            </div>
            <div class="col-md-3 card-dark bg-primary-gradient card-round blockquote text-center">
              <p class="h4 mx-auto">En progreso</p>
            </div>
          </div>
          <div class="card-body d-flex flex-column">
            <div class="col-md-12 d-flex justify-content-start">
              <button class="btn btn-secondary btn-round btn-sm">Inicio: 01/10/2019</button>
              <button class="btn btn-danger btn-round btn-sm">Fin: --/--/----</button>
              <button class="btn btn-default btn-round btn-sm">1 Colaborador</button>
            </div>
          </div>
        </div>
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