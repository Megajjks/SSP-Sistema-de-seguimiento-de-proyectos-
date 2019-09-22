@extends('template.template1')
@section('contenidopag')
    <template v-if="menu==0">
        <proyectos-asignados></proyectos-asignados>
        <proyectos-propios></proyectos-propios>
    </template>
    <template v-if="menu==1">
        <h1>sds</h1>
    </template>
        <template v-if="menu==2">
    <h1>contenido2</h1>
    </template>
    <template v-if="menu==3">
    <h1>contenido3</h1>
    </template>
@endsection