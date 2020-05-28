<?php

namespace App\Http\Controllers;

use App\Clientes;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $Nombre = $request->get('Nombre');
        
       // $datos['empleados']=Empleados::paginate(5);
        $datos['clientes'] = Clientes::orderBy('Id', 'DESC')
            ->where('Nombre', 'LIKE', "%$Nombre%")
            //->Nombre($Nombre)
            ->paginate(5);
        
        return view('clientes.index', $datos);

        
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $campos=[

            'Rfc' => 'required|string|max:100',
            'Nombre' => 'required|string|max:100',
            'Domicilio' => 'required|string|max:100',
            'Ciudad' => 'required|string|max:100',
            'Telefono' => 'required|string|max:15',
            'Correo' => 'required|email',
            'CP' => 'required|string|max:100',
            'Foto' => 'required|max:10000|mimes:jpg,png,jpeg',
            

        ];

        $Mensaje=["required"=>'El/La :attribute es un campo requerido'];
        $this->validate($request,$campos,$Mensaje);

        //
        //$datosEmpleado=request()->all();
        $datosCliente=request()->except('_token');
        if($request->hasFile('Foto')){
            $datosCliente['Foto']=$request->file('Foto')->store('uploads', 'public');
        }
        Clientes::insert($datosCliente);

        //return response()->json($datosEmpleado);
        return redirect('clientes')->with('Mensaje', 'Cliente agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function show(Clientes $clientes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $cliente = Clientes::findOrFail($id);
        return view('clientes.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Clientes  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $campos=[

            'Rfc' => 'required|string|max:100',
            'Nombre' => 'required|string|max:100',
            'Domicilio' => 'required|string|max:100',
            'Ciudad' => 'required|string|max:100',
            'Telefono' => 'required|string|max:15',
            'Correo' => 'required|email',
            'CP' => 'required|string|max:100',
            

        ];


        if($request->hasFile('Foto')){

           $campos+=[ 'Foto' => 'required|max:10000|mimes:jpg,png,jpeg'];

        }
        $Mensaje=["required"=>'El/La :attribute es un campo requerido'];
        $this->validate($request,$campos,$Mensaje);


        $datosCliente=request()->except(['_token', '_method']);

        if($request->hasFile('Foto')){
            $cliente = Clientes::findOrFail($id);
            Storage::delete('public/'.$cliente->Foto);
            $datosCliente['Foto']=$request->file('Foto')->store('uploads', 'public');
        }

        Clientes::where('id', '=', $id)->update($datosCliente);

        $cliente = Clientes::findOrFail($id);
        return view('clientes.edit', compact('cliente'));
        //return redirect('empleados')->with('Mensaje', 'Empleado modificado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $cliente = Clientes::findOrFail($id);

        if(Storage::delete('public/'.$cliente->Foto)){
            Clientes::destroy($id);
        }

        

        
        return redirect('clientes')->with('Mensaje', 'Cliente eliminado con exito');
    }
}
