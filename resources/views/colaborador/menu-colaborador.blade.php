@extends('template.template1')
@section('contenidopag')
    <template v-if="menu==0">
        <error-404></error-404>
    </template>
    <template v-if="menu==1">
        <proyectos-asignados-colaborador></proyectos-asignados-colaborador>
        <proyectos-propios></proyectos-propios>
    </template>
    <template v-if="menu==2">
        <error-404></error-404>
    </template>
    <template v-if="menu==3">
        <error-404></error-404>
    </template>
    
@endsection