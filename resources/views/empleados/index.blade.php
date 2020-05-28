@extends('layouts.app')

@section('content')

<div class="container">


@if(Session::has('Mensaje'))

<div class="alert alert-success" role="alert">
{{
    Session::get('Mensaje')
}}
</div>
@endif

<a href="{{ url('empleados/create' )}}" class="btn btn-success">Agregar Empleado</a>
<br>
<br>

<section>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    <p>
                       
                        {{ Form::open(['route' => 'empleados.index', 'method' => 'GET', 'class' => 'form-inline pull-right']) }}
                            <div class="form-group">
                                {{ Form::text( 'Nombre', null, ['class' => 'form-control', 'placeholder' => 'Nombre']) }}
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    <span>Buscar</span>
                                </button>

                            </div>

                            
                        {{ Form::close() }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<table class="table table-light table-hover">
    <thead class="thead-light">
        <tr>
            
            <th>#</th>
            <th>Foto</th>
            <th>Nombre</th>
            <th>Direccion</th>
            <th>Ciudad</th>
            <th>Telefono</th>
            <th>Correo</th>
            <th>Cargo</th>
            <th>Salario</th>
            <th>Status</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($empleados as $empleado)
        
            <tr>


                    <!-- <td>{{$loop->iteration}}</td> -->
                    <td>{{$empleado->id}}</td>

                    <td>
                    <img src="{{ asset('storage').'/'.$empleado->Foto}}" class="img-thumbnail img-fluid" alt="" width="100">
                    
                    </td>
                    
                    <td>{{$empleado->Nombre}}</td>
                    <td>{{$empleado->Direccion}}</td>
                    <td>{{$empleado->Ciudad}}</td>
                    <td>{{$empleado->Telefono}}</td>
                    <td>{{$empleado->Correo}}</td>
                    <td>{{$empleado->Cargo}}</td>
                    <td>{{$empleado->Salario}}</td>
                    <td>{{$empleado->Status}}</td>
                    <td>
                        
                        <a class="btn btn-warning" href="{{ url('/empleados/'.$empleado->id.'/edit' )}}">
                         Editar   
                        </a> 

                        <form method="POST" action="{{ url('/empleados/'.$empleado->id )}}" style="display:inline">
                            {{ csrf_field() }} 
                            {{method_field('DELETE')}}    
                            <button class="btn btn-danger" type="submit" onclick="return confirm('¿Borrar?');">Borrar</button> 
                        </form>
                    </td>
            </tr>
        @endforeach
    </tbody>
</table>

{{ $empleados->links() }} 
</div>

@endsection