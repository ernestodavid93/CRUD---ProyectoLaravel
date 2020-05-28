


@extends('layouts.app')

@section('content')

<div class="container">


 <form action="{{ url('/clientes/'.$cliente->id)}}" method="post" enctype="multipart/form-data">
{{ csrf_field() }}
{{ method_field('PATCH')}}

@include('clientes.form', ['Modo'=>'editar'])


</form>

</div>

@endsection