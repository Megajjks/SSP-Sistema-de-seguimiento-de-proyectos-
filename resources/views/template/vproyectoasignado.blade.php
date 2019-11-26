@extends('template.template1')
@section('contenidopag')
    <template>
        <vista-proyecto-asignado v-bind:id_pro={{$id}}></vista-proyecto-asignado>
    </template>
@endsection
