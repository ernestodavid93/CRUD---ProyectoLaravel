

<div class="form-group">

<label for="Nombre" class="control-label">{{'Nombre:'}}</label>
<input type="text" class="form-control {{ $errors->has('Nombre')?'is-invalid':''}} " name="Nombre" id="Nombre" 

value="{{ isset($empleado->Nombre)?$empleado->Nombre:old('Nombre') }}">
{!! $errors->first('Nombre', '<div class="invalid-feedback">:message</div>') !!}

</div>


<div class="form-group">
<label for="Direccion" class="control-label">{{'Direccion:'}}</label>
<input type="text" class="form-control {{ $errors->has('Direccion')?'is-invalid':''}}" name="Direccion" id="Direccion" 

value="{{ isset($empleado->Direccion)?$empleado->Direccion:old('Direccion') }}">
{!! $errors->first('Direccion', '<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">
<label for="Ciudad" class="control-label">{{'Ciudad:'}}</label>
<input type="text" class="form-control {{ $errors->has('Ciudad')?'is-invalid':''}}" name="Ciudad" id="Ciudad" 

value="{{ isset($empleado->Ciudad)?$empleado->Ciudad:old('Ciudad')}}">
{!! $errors->first('Ciudad', '<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">
<label for="Telefono" class="control-label">{{'Telefono:'}}</label>
<input type="text"  class="form-control {{ $errors->has('Telefono')?'is-invalid':''}}" name="Telefono" id="Telefono" 
value="{{ isset($empleado->Telefono)?$empleado->Telefono:old('Telefono') }}">
{!! $errors->first('Telefono', '<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">
<label for="Correo" class="control-label">{{'Correo:'}}</label>
<input type="email" class="form-control {{ $errors->has('Correo')?'is-invalid':''}}" name="Correo" id="Correo" 
value="{{ isset($empleado->Correo)?$empleado->Correo:old('Correo') }}">
{!! $errors->first('Correo', '<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">
<label for="Cargo" class="control-label">{{'Cargo:'}}</label>
<input type="text" class="form-control {{ $errors->has('Cargo')?'is-invalid':''}}" name="Cargo" id="Cargo" 
value="{{ isset($empleado->Cargo)?$empleado->Cargo:old('Cargo') }}">
{!! $errors->first('Cargo', '<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">
<label for="Salario" class="control-label">{{'Salario:'}}</label>
<input type="text" class="form-control {{ $errors->has('Salario')?'is-invalid':''}}" name="Salario" id="Salario" 

value="{{ isset($empleado->Salario)?$empleado->Salario:old('Salario') }}">
{!! $errors->first('Salario', '<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">
<label for="Status" class="control-label">{{'Status:'}}</label>
<input type="text" class="form-control {{ $errors->has('Status')?'is-invalid':''}}" name="Status" id="Status" 

value="{{ isset($empleado->Status)?$empleado->Status:old('Status') }}">
{!! $errors->first('Status', '<div class="invalid-feedback">:message</div>') !!}
</div>


<div class="form-group">
<label for="Foto" class="control-label" >{{'Foto:'}}</label>

@if(isset($empleado->Foto))
<br> 
<img src="{{ asset('storage').'/'.$empleado->Foto}}" alt="" width="150">
@endif
<br>
<input class="form-control {{ $errors->has('Foto')?'is-invalid':''}}" type="file" name="Foto" id="Foto" value="" class="{{ $errors->has('Foto')?'is-invalid':''}}">
{!! $errors->first('Foto', '<div class="invalid-feedback">:message</div>') !!}


</div>

<input type="submit" class="control-label btn btn-success" value="{{ $Modo=='crear' ? 'Agregar':'Modificar'}}">

<a class="btn btn-primary" href="{{ url('empleados')}}">Regresar</a>