<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use Illuminate\Http\Request;

class VehiculoController extends Controller
{
    public function index()
    {
        $vehiculos = Vehiculo::all();
        return view('vehiculos.index', compact('vehiculos'));
    }

    public function create()
    {
        return view('vehiculos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'marca'       => 'required|string|max:100',
            'modelo'      => 'required|string|max:100',
            'anio'        => 'required|integer|min:1900|max:2100',
            'placa'       => 'required|string|max:20|unique:vehiculos,placa',
            'color'       => 'required|string|max:50',
            'propietario' => 'required|string|max:150',
        ]);

        Vehiculo::create($request->all());

        return redirect()->route('vehiculos.index')->with('success', 'Vehículo registrado correctamente.');
    }

    public function edit(string $id)
    {
        $vehiculo = Vehiculo::findOrFail($id);
        return view('vehiculos.edit', compact('vehiculo'));
    }

    public function update(Request $request, string $id)
    {
        $vehiculo = Vehiculo::findOrFail($id);

        $request->validate([
            'marca'       => 'required|string|max:100',
            'modelo'      => 'required|string|max:100',
            'anio'        => 'required|integer|min:1900|max:2100',
            'placa'       => 'required|string|max:20|unique:vehiculos,placa,' . $id,
            'color'       => 'required|string|max:50',
            'propietario' => 'required|string|max:150',
        ]);

        $vehiculo->update($request->all());

        return redirect()->route('vehiculos.index')->with('success', 'Vehículo actualizado correctamente.');
    }

    public function destroy(string $id)
    {
        $vehiculo = Vehiculo::findOrFail($id);
        $vehiculo->delete();

        return redirect()->route('vehiculos.index')->with('success', 'Vehículo eliminado correctamente.');
    }
}
