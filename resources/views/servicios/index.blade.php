<x-app-layout>
    <div class="contenedor-principal">

        {{-- Encabezado con Botón de Crear --}}
        <div class="encabezado-vista">
            <div>
                <h1 class="titulo-pagina">Solicitudes de Servicio</h1>
                <p class="texto-secundario">Explora las solicitudes publicadas o crea una nueva.</p>
            </div>
            <a href="{{ route('servicios.create') }}" class="btn-primario">+ Nueva Solicitud</a>
        </div>

        {{-- Alerta de Éxito al crear o actualizar --}}
        @if (session('success'))
            <div class="alerta-exito">
                {{ session('success') }}
            </div>
        @endif

        {{-- Grilla de Solicitudes --}}
        @if($servicios->isEmpty())
            <div class="tarjeta-blanca estado-vacio">
                <p>No hay solicitudes de servicio registradas actualmente.</p>
            </div>
        @else
            <div class="grid-servicios">
                @foreach ($servicios as $servicio)
                    <div class="tarjeta-servicio">
                        <div>
                            <div class="tarjeta-servicio-header">
                                <span class="badge badge-{{ $servicio->estado }}">
                                    {{ str_replace('_', ' ', $servicio->estado) }}
                                </span>
                                <small class="texto-secundario">{{ $servicio->created_at->format('d/m/Y') }}</small>
                            </div>

                            <h2 class="subtitulo-resumen">{{ $servicio->titulo }}</h2>
                            <p class="texto-secundario">
                                <strong>Categoría:</strong> {{ $servicio->categoriaServicio->nombre ?? 'Sin categoría' }}
                            </p>
                            <p class="texto-secundario">
                                <strong>Ubicación:</strong> {{ $servicio->direccion }}
                            </p>
                            <p class="texto-secundario">
                                <strong>Cliente:</strong> {{ $servicio->cliente->name ?? 'Anónimo' }}
                            </p>
                        </div>

                        <div class="acciones-form">
                            <a href="{{ route('servicios.show', $servicio->id) }}" class="btn-secundario">Ver Detalle</a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

    </div>
</x-app-layout>