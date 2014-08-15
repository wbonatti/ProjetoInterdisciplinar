@extends('finalizarlayout')

@section('inforeserva')
    <br>
    <h4><b>Status:</b> {{ $status }}</h4>
    <hr>
    <h2 class="white">CÓDIGO DA SUA SOLICITAÇÃO DE RESERVA: <span class="label label-success">{{ $codigo }}</span></h2>
    <hr>
@stop