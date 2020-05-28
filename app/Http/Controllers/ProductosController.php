<?php

namespace App\Http\Controllers;

use App\Productos;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $Descripcion = $request->get('Descripcion');
        
       // $datos['empleados']=Empleados::paginate(5);
        $datos['productos'] = Productos::orderBy('Id', 'DESC')
            ->where('Descripcion', 'LIKE', "%$Descripcion%")
            //->Descripcion($Descripcion)
            ->paginate(5);
        
        return view('productos.index', $datos);

        
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('productos.create');
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

            'Descripcion' => 'required|string|max:100',
            'Departamento' => 'required|string|max:100',
            'Existencia' => 'required|string|max:100',
            'StockMaximo' => 'required|string|max:15',
            'StockMinimo' => 'required|string|max:15',
            'Status' => 'required|string|max:100',
            'Foto' => 'required|max:10000|mimes:jpg,png,jpeg',

        ];

        $Mensaje=["required"=>'El/La :attribute es un campo requerido'];
        $this->validate($request,$campos,$Mensaje);

        //
        //$datosProducto=request()->all();
        $datosProducto=request()->except('_token');
        if($request->hasFile('Foto')){
            $datosProducto['Foto']=$request->file('Foto')->store('uploads', 'public');
        }
        Productos::insert($datosProducto);

        //return response()->json($datosProducto);
        return redirect('productos')->with('Mensaje', 'Producto agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function show(Productos $productos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $empleado = Productos::findOrFail($id);
        return view('productos.edit', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $campos=[

            'Descripcion' => 'required|string|max:100',
            'Departamento' => 'required|string|max:100',
            'Existencia' => 'required|string|max:100',
            'StockMaximo' => 'required|string|max:15',
            'StockMinimo' => 'required|string|max:15',
            'Status' => 'required|string|max:100',
            

        ];


        if($request->hasFile('Foto')){

           $campos+=[ 'Foto' => 'required|max:10000|mimes:jpg,png,jpeg'];

        }
        $Mensaje=["required"=>'El/La :attribute es un campo requerido'];
        $this->validate($request,$campos,$Mensaje);


        $datosProducto=request()->except(['_token', '_method']);

        if($request->hasFile('Foto')){
            $producto = Productos::findOrFail($id);
            Storage::delete('public/'.$producto->Foto);
            $datosProducto['Foto']=$request->file('Foto')->store('uploads', 'public');
        }

        Productos::where('id', '=', $id)->update($datosProducto);

        $producto = Productos::findOrFail($id);
        return view('productos.edit', compact('producto'));
        //return redirect('productos')->with('Mensaje', 'Producto modificado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $producto = Productos::findOrFail($id);

        if(Storage::delete('public/'.$producto->Foto)){
            Productos::destroy($id);
        }

        

        
        return redirect('productos')->with('Mensaje', 'Producto eliminado con exito');
    }
}
