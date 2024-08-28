<?php
namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use App\Models\Rol;
use App\Models\Area;

class EmpleadoController extends Controller
{
    // Métodos index, create y store ya proporcionados
    public function index()
    {
        // Obtener todos los empleados con su área asociada
        $empleados = Empleado::with('area')->get(); 

        // Obtener todas las áreas para el formulario de creación y edición si es necesario
        $areas = Area::all(); 
        $roles = Rol::all();

        // Retornar la vista con los datos de empleados
        return view('empleados.index', compact('empleados', 'roles','areas'));
    }
        /**
     * Show the form for creating a new resource.
     */
    public function create() {
        // Obtener todos los roles
        $roles = Rol::all();
        // Obtener todos las areas
        $areas = Area::all();

        // Pasar los roles y areas a la vista
        return view('empleados.create', compact('roles', 'areas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        ///dd($request->all());  // Check all incoming data
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:empleados,email',
            'sexo' => 'required|in:M,F', // Asegurarse de que sea 'M' o 'F'
            'area_id' => 'required|integer|exists:areas,id',
            'roles' => 'required|array',
            'descripcion' => 'required|string',
            'boletin' => 'nullable|boolean',
        ]);
    
        // Crear un nuevo empleado con los datos validados
        // $empleado = Empleado::create($request->all());
        $empleado = Empleado::create($validatedData);
        
        // Verificar si 'boletin' está presente y asignar su valor
        $empleado->boletin = $request->has('boletin');
        $empleado->save();
        // // Asociar los roles al empleado
        $empleado->roles()->sync($request->input('roles'));
        // Redirigir con un mensaje de éxito
        return redirect()->back()->with('success', 'Empleado guardado con éxito.');
    }
    /**
     * Display the specified resource.
     */
    public function show(Empleado $empleado)
    {
        // Retornar la vista con los datos del empleado especificado
        return view('empleados.show', compact('empleado'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Empleado $empleado)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Empleado $empleado)
    {
        //dd($request->all());// Verificar los datos enviados
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email',
            'sexo' => 'required|in:M,F',
            'area_id' => 'required|exists:areas,id',
            'descripcion' => 'required|string',
            'roles' => 'array', // Validar que roles es un array
            'boletin' => 'nullable|boolean',
        ]);
    
        $empleado->update($request->only('nombre', 'email', 'area_id', 'descripcion', 'boletin'));
    
        // Sincronizar los roles
        $empleado->roles()->sync($request->input('roles', []));
    
        return redirect()->route('empleados.index')->with('success', 'Empleado actualizado con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Empleado $empleado)
    {
        // Eliminar el empleado
        $empleado->delete();

        // Redirigir con un mensaje de éxito
        return redirect()->back()->with('success', 'Empleado eliminado con éxito.');
    }
}
