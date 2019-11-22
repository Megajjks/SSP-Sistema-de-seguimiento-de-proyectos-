@extends('template.template1')
@section('contenidopag')
    <template>
        <vista-proyecto-propio v-bind:id_pro={{$id}}></vista-proyecto-propio>
    </template>
@endsection
