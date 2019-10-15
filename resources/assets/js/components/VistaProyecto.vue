<template>
  <div class="col-md-12">
    <div class="col-md-12 d-flex justify-content-between align-items-center py-4 mx-0">
      <span class="btn btn-lg">
        <i class="fas fa-arrow-left"></i>
      </span>
      <h1 class="font-weight-bold h1">Residencia 2019-2020</h1>
      <span> </span>
    </div>

    <lista-actividades></lista-actividades>
    <datos-proyecto></datos-proyecto>
  </div>
</template>

<script>
export default {
  data() {
    return {

    };
  },
  methods:{
    
  },
  mounted() {
    console.log("Component mounted.");
  }
};
</script>
