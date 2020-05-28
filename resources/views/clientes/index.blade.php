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

<a href="{{ url('clientes/create' )}}" class="btn btn-success">Agregar Cliente</a>
<br>
<br>

<section>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    <p>
                       
                        {{ Form::open(['route' => 'clientes.index', 'method' => 'GET', 'class' => 'form-inline pull-right']) }}
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
            <th>RFC</th>
            <th>Nombre</th>
            <th>Domicilio</th>
            <th>Ciudad</th>
            <th>Telefono</th>
            <th>Correo</th>
            <th>CP</th>
            <th>Acciones</th>


        </tr>
    </thead>
    <tbody>
        @foreach ($clientes as $cliente)
        
            <tr>


                    <!-- <td>{{$loop->iteration}}</td> -->
                    <td>{{$cliente->id}}</td>

                    <td>
                    <img src="{{ asset('storage').'/'.$cliente->Foto}}" class="img-thumbnail img-fluid" alt="" width="100">
                    
                    </td>
                    
                    <td>{{$cliente->Rfc}}</td>
                    <td>{{$cliente->Nombre}}</td>
                    <td>{{$cliente->Domicilio}}</td>
                    <td>{{$cliente->Ciudad}}</td>
                    <td>{{$cliente->Telefono}}</td>
                    <td>{{$cliente->Correo}}</td>
                    <td>{{$cliente->CP}}</td>
                    
    
                    <td>
                        
                        <a class="btn btn-warning" href="{{ url('/clientes/'.$cliente->id.'/edit' )}}">
                         Editar   
                        </a> 

                        <form method="POST" action="{{ url('/cliente/'.$cliente->id )}}" style="display:inline">
                            {{ csrf_field() }} 
                            {{method_field('DELETE')}}    
                            <button class="btn btn-danger" type="submit" onclick="return confirm('¿Borrar?');">Borrar</button> 
                        </form>
                    </td>
            </tr>
        @endforeach
    </tbody>
</table>

{{ $clientes->links() }} 
</div>

@endsection