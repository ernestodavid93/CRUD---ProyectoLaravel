<?php

namespace App\Http\Controllers;

use App\Empleados;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmpleadosController extends Controller
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
        $datos['empleados'] = Empleados::orderBy('Id', 'DESC')
            ->where('Nombre', 'LIKE', "%$Nombre%")
            //->Nombre($Nombre)
            ->paginate(5);
        
        return view('empleados.index', $datos);

        
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('empleados.create');
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
            'Nombre' => 'required|string|max:100',
            'Direccion' => 'required|string|max:100',
            'Ciudad' => 'required|string|max:100',
            'Telefono' => 'required|string|max:15',
            'Correo' => 'required|email',
            'Cargo' => 'required|string|max:100',
            'Salario' => 'required|string|max:100',
            'Status' => 'required|string|max:100',
            'Foto' => 'required|max:10000|mimes:jpg,png,jpeg',

        ];

        $Mensaje=["required"=>'El/La :attribute es un campo requerido'];
        $this->validate($request,$campos,$Mensaje);

        //
        //$datosEmpleado=request()->all();
        $datosEmpleado=request()->except('_token');
        if($request->hasFile('Foto')){
            $datosEmpleado['Foto']=$request->file('Foto')->store('uploads', 'public');
        }
        Empleados::insert($datosEmpleado);

        //return response()->json($datosEmpleado);
        return redirect('empleados')->with('Mensaje', 'Empleado agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function show(Empleados $empleados)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $empleado = Empleados::findOrFail($id);
        return view('empleados.edit', compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $campos=[
            'Nombre' => 'required|string|max:100',
            'Direccion' => 'required|string|max:100',
            'Ciudad' => 'required|string|max:100',
            'Telefono' => 'required|string|max:15',
            'Correo' => 'required|email',
            'Cargo' => 'required|string|max:100',
            'Salario' => 'required|string|max:100',
            'Status' => 'required|string|max:100',
            

        ];


        if($request->hasFile('Foto')){

           $campos+=[ 'Foto' => 'required|max:10000|mimes:jpg,png,jpeg'];

        }
        $Mensaje=["required"=>'El/La :attribute es un campo requerido'];
        $this->validate($request,$campos,$Mensaje);


        $datosEmpleado=request()->except(['_token', '_method']);

        if($request->hasFile('Foto')){
            $empleado = Empleados::findOrFail($id);
            Storage::delete('public/'.$empleado->Foto);
            $datosEmpleado['Foto']=$request->file('Foto')->store('uploads', 'public');
        }

        Empleados::where('id', '=', $id)->update($datosEmpleado);

        $empleado = Empleados::findOrFail($id);
        return view('empleados.edit', compact('empleado'));
        //return redirect('empleados')->with('Mensaje', 'Empleado modificado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $empleado = Empleados::findOrFail($id);

        if(Storage::delete('public/'.$empleado->Foto)){
            Empleados::destroy($id);
        }

        

        
        return redirect('empleados')->with('Mensaje', 'Empleado eliminado con exito');
    }
}
