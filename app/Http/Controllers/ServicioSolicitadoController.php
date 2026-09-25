<?php

namespace App\Http\Controllers;

use App\Models\ServicioSolicitado;
use App\Models\CategoriaServicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServicioSolicitadoController extends Controller
{
    /**
     * Muestra el listado de todas las solicitudes de servicio.
     */
    public function index()
    {
        $servicios = ServicioSolicitado::with(['cliente', 'categoriaServicio'])
            ->latest()
            ->get();

        return view('servicios.index', compact('servicios'));
    }

    /**
     * Muestra el formulario para crear una nueva solicitud.
     */
    public function create()
    {
        $categorias = CategoriaServicio::all();
        return view('servicios.create', compact('categorias'));
    }

    /**
     * Guarda la nueva solicitud en la base de datos.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'categoria_servicio_id' => 'required|exists:categoria_servicios,id',
            'descripcion' => 'required|string',
            'direccion' => 'required|string|max:255',
        ]);

        $validated['cliente_id'] = Auth::id();
        $validated['estado'] = 'pendiente';

        ServicioSolicitado::create($validated);

        return redirect()->route('servicios.index')->with('success', '¡Solicitud de servicio publicada con éxito!');
    }

    /**
     * Muestra la información detallada de una solicitud.
     */
    public function show(string $id)
    {
        $servicio = ServicioSolicitado::with(['cliente', 'categoriaServicio', 'cotizaciones.tecnico'])->findOrFail($id);

        return view('servicios.show', compact('servicio'));
    }
}