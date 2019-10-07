<template>
  <div class="col-md-12">
    <div class="col-md-12 row">
      <div class="col-md-12 animated fadeIn">
        <div class="card card-round card-efecto">
          <div class="card-header d-flex justify-content-between py-4 mx-0">
            <h2 class="card-title">Lista de tareas</h2>
            <button
              class="btn btn-success font-weight-bold btn-round"
              type="button"
            >
              <span class="btn-label">
                <i class="fa fa-plus-circle"></i>
              </span> Nueva Tarea
            </button>
          </div>
          <div class="card-body">
            <actividad></actividad>
            <actividad></actividad>
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