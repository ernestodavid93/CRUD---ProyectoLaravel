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

<a href="{{ url('productos/create' )}}" class="btn btn-success">Agregar Producto</a>
<br>
<br>

<section>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    <p>
                       
                        {{ Form::open(['route' => 'productos.index', 'method' => 'GET', 'class' => 'form-inline pull-right']) }}
                            <div class="form-group">
                                {{ Form::text( 'Descripcion', null, ['class' => 'form-control', 'placeholder' => 'Descripcion']) }}
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
            <th>Descripcion</th>
            <th>Departamento</th>
            <th>Existencia</th>
            <th>StockMaximo</th>
            <th>StockMinimo</th>
            <th>Status</th>
            <th>Acciones</th>

          
        </tr>
    </thead>
    <tbody>
        @foreach ($productos as $producto)
        
            <tr>


                    <!-- <td>{{$loop->iteration}}</td> -->
                    <td>{{$producto->id}}</td>

                    <td>
                    <img src="{{ asset('storage').'/'.$producto->Foto}}" class="img-thumbnail img-fluid" alt="" width="100">
                    
                    </td>
                    
                    <td>{{$producto->Descripcion}}</td>
                    <td>{{$producto->Departamento}}</td>
                    <td>{{$producto->Existencia}}</td>
                    <td>{{$producto->StockMaximo}}</td>
                    <td>{{$producto->StockMinimo}}</td>
                    <td>{{$producto->Status}}</td>
                    <td>
                        
                        <a class="btn btn-warning" href="{{ url('/productos/'.$producto->id.'/edit' )}}">
                         Editar   
                        </a> 

                        <form method="POST" action="{{ url('/productos/'.$producto->id )}}" style="display:inline">
                            {{ csrf_field() }} 
                            {{method_field('DELETE')}}    
                            <button class="btn btn-danger" type="submit" onclick="return confirm('¿Borrar?');">Borrar</button> 
                        </form>
                    </td>
            </tr>
        @endforeach
    </tbody>
</table>

{{ $productos->links() }} 
</div>

@endsection