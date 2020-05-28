
@extends('layouts.app')

@section('content')

<div class="container">

@if(count($errors)>0)
<div class="alert alert-danger" role="alert">
    <ul>
        @foreach($errors->all() as $error)
    <li>{{ $error}}</li>
        @endforeach 
    </ul>
</div>
@endif

<label>{{'Seccion para crear productos'}}</label><br>

<form action="{{url('/productos')}}" class="form-horizontal" method="post" enctype="multipart/form-data">
{{ csrf_field() }}

@include('productos.form', ['Modo'=>'crear'])


</form>

</div>

@endsection