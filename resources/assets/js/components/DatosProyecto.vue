<template>
  <div class="col-md-12">
    <div class="col-md-12 row">
      <div class="col-md-12 animated fadeIn">
        <div class="card card-round card-efecto">
          <div class="card-header col-md-12 d-flex justify-content-between align-items-center py-3 mx-0">
            <div class="col-md-7">
              <h2 class="card-title font-weight-bold h2">Datos del proyecto</h2>
            </div>
            <div class="col-md-3 card-dark bg-primary-gradient card-round blockquote text-center">
              <p class="h4 mx-auto">En progreso</p>
            </div>
          </div>
          <div class="card-body d-flex flex-column">
            <div class="progress-card">
              <div class="progress-status">
                <span class="text-muted">Avance del proyecto</span>
                <span class="text-muted fw-bold">0%</span>
              </div>
              <div class="progress" style="height: 22px;">
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
            <div class="col-md-12 d-flex justify-content-start px-0 mx-0">
              <p class="btn-secondary btn-round btn-sm mr-1">Inicio: 01/10/2019</p>
              <p class="btn-danger btn-round btn-sm mr-1">Fin: --/--/----</p>
              <p class="btn-default btn-round btn-sm mr-1">1 Colaborador</p>
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