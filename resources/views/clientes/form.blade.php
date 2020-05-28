
    
    
    <div class="form-group">

        <label for="Rfc" class="control-label">{{'RFC:'}}</label>
        <input type="text" class="form-control {{ $errors->has('Rfc')?'is-invalid':''}} " name="Rfc" id="Rfc" 
        
        value="{{ isset($cliente->Rfc)?$cliente->Rfc:old('Rfc') }}">
        {!! $errors->first('Rfc', '<div class="invalid-feedback">:message</div>') !!}
    
    </div>

    
    <div class="form-group">

        <label for="Nombre" class="control-label">{{'Nombre:'}}</label>
        <input type="text" class="form-control {{ $errors->has('Nombre')?'is-invalid':''}} " name="Nombre" id="Nombre" 
        
        value="{{ isset($cliente->Nombre)?$cliente->Nombre:old('Nombre') }}">
        {!! $errors->first('Nombre', '<div class="invalid-feedback">:message</div>') !!}
    
    </div>
    
    
    <div class="form-group">

        <label for="Domicilio" class="control-label">{{'Domicilio:'}}</label>
        <input type="text" class="form-control {{ $errors->has('Domicilio')?'is-invalid':''}}" name="Domicilio" id="Domicilio" 
        
        value="{{ isset($cliente->Domicilio)?$cliente->Domicilio:old('Domicilio') }}">
        {!! $errors->first('Domicilio', '<div class="invalid-feedback">:message</div>') !!}

    </div>


    
    <div class="form-group">

        <label for="Ciudad" class="control-label">{{'Ciudad:'}}</label>
        <input type="text" class="form-control {{ $errors->has('Ciudad')?'is-invalid':''}}" name="Ciudad" id="Ciudad" 
        
        value="{{ isset($cliente->Ciudad)?$cliente->Ciudad:old('Ciudad')}}">
        {!! $errors->first('Ciudad', '<div class="invalid-feedback">:message</div>') !!}

    </div>
    

    <div class="form-group">

        <label for="Telefono" class="control-label">{{'Telefono:'}}</label>
        <input type="text"  class="form-control {{ $errors->has('Telefono')?'is-invalid':''}}" name="Telefono" id="Telefono" 
        value="{{ isset($cliente->Telefono)?$cliente->Telefono:old('Telefono') }}">
        {!! $errors->first('Telefono', '<div class="invalid-feedback">:message</div>') !!}

    </div>
    

    <div class="form-group">

        <label for="Correo" class="control-label">{{'Correo:'}}</label>
        <input type="email" class="form-control {{ $errors->has('Correo')?'is-invalid':''}}" name="Correo" id="Correo" 
        value="{{ isset($cliente->Correo)?$cliente->Correo:old('Correo') }}">
        {!! $errors->first('Correo', '<div class="invalid-feedback">:message</div>') !!}

    </div>
    
    <div class="form-group">

        <label for="CP" class="control-label">{{'CP:'}}</label>
        <input type="text" class="form-control {{ $errors->has('CP')?'is-invalid':''}}" name="CP" id="CP" 
        value="{{ isset($cliente->CP)?$cliente->CP:old('CP') }}">
        {!! $errors->first('CP', '<div class="invalid-feedback">:message</div>') !!}

    </div>
    
    
    
    <div class="form-group">

        <label for="Foto" class="control-label" >{{'Foto:'}}</label>
        
        @if(isset($cliente->Foto))
            <br> 
            <img src="{{ asset('storage').'/'.$cliente->Foto}}" alt="" width="150">
        @endif
        <br>
        <input class="form-control {{ $errors->has('Foto')?'is-invalid':''}}" type="file" name="Foto" id="Foto" value="" class="{{ $errors->has('Foto')?'is-invalid':''}}">
        {!! $errors->first('Foto', '<div class="invalid-feedback">:message</div>') !!}
    
    
    </div>
    
    <input type="submit" class="control-label btn btn-success" value="{{ $Modo=='crear' ? 'Agregar':'Modificar'}}">
    
    <a class="btn btn-primary" href="{{ url('clientes')}}">Regresar</a>
