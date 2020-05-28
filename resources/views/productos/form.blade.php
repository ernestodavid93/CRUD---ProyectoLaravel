
 <div class="form-group">

    <label for="Descripcion" class="control-label">{{'Descripcion:'}}</label>
    <input type="text" class="form-control {{ $errors->has('Descripcion')?'is-invalid':''}} " name="Descripcion" id="Descripcion" 
    
    value="{{ isset($producto->Descripcion)?$producto->Descripcion:old('Descripcion') }}">
    {!! $errors->first('Descripcion', '<div class="invalid-feedback">:message</div>') !!}

</div>


<div class="form-group">

    <label for="Departamento" class="control-label">{{'Departamento:'}}</label>
    <input type="text" class="form-control {{ $errors->has('Departamento')?'is-invalid':''}} " name="Departamento" id="Departamento" 
    
    value="{{ isset($producto->Departamento)?$producto->Departamento:old('Departamento') }}">
    {!! $errors->first('Departamento', '<div class="invalid-feedback">:message</div>') !!}

</div>


<div class="form-group">

    <label for="Existencia" class="control-label">{{'Existencia:'}}</label>
    <input type="text" class="form-control {{ $errors->has('Existencia')?'is-invalid':''}}" name="Existencia" id="Existencia" 
    
    value="{{ isset($producto->Existencia)?$producto->Existencia:old('Existencia') }}">
    {!! $errors->first('Existencia', '<div class="invalid-feedback">:message</div>') !!}

</div>



<div class="form-group">

    <label for="StockMaximo" class="control-label">{{'StockMaximo:'}}</label>
    <input type="text" class="form-control {{ $errors->has('StockMaximo')?'is-invalid':''}}" name="StockMaximo" id="StockMaximo" 
    
    value="{{ isset($producto->StockMaximo)?$producto->StockMaximo:old('StockMaximo')}}">
    {!! $errors->first('StockMaximo', '<div class="invalid-feedback">:message</div>') !!}

</div>


<div class="form-group">

    <label for="StockMinimo" class="control-label">{{'StockMinimo:'}}</label>
    <input type="text"  class="form-control {{ $errors->has('StockMinimo')?'is-invalid':''}}" name="StockMinimo" id="StockMinimo" 
    value="{{ isset($producto->StockMinimo)?$producto->StockMinimo:old('StockMinimo') }}">
    {!! $errors->first('StockMinimo', '<div class="invalid-feedback">:message</div>') !!}

</div>


<div class="form-group">

    <label for="Status" class="control-label">{{'Status:'}}</label>
    <input type="text" class="form-control {{ $errors->has('Status')?'is-invalid':''}}" name="Status" id="Status" 
    value="{{ isset($producto->Status)?$producto->Status:old('Status') }}">
    {!! $errors->first('Status', '<div class="invalid-feedback">:message</div>') !!}

</div>



<div class="form-group">

    <label for="Foto" class="control-label" >{{'Foto:'}}</label>
    
    @if(isset($producto->Foto))
        <br> 
        <img src="{{ asset('storage').'/'.$producto->Foto}}" alt="" width="150">
    @endif
    <br>
    <input class="form-control {{ $errors->has('Foto')?'is-invalid':''}}" type="file" name="Foto" id="Foto" value="" class="{{ $errors->has('Foto')?'is-invalid':''}}">
    {!! $errors->first('Foto', '<div class="invalid-feedback">:message</div>') !!}


</div>

<input type="submit" class="control-label btn btn-success" value="{{ $Modo=='crear' ? 'Agregar':'Modificar'}}">

<a class="btn btn-primary" href="{{ url('productos')}}">Regresar</a>
