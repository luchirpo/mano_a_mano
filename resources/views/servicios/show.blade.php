<x-app-layout>
    <div class="contenedor-principal">

        {{-- Navegación superior --}}
        <div class="encabezado-vista">
            <a href="{{ route('servicios.index') }}" class="enlace-volver">&larr; Volver al Listado</a>
            
            <div class="acciones-form">
                {{-- Botón de Editar habilitado solo si está pendiente --}}
                @if($servicio->estado === 'pendiente')
                    <a href="{{ route('servicios.edit', $servicio->id) }}" class="btn-secundario">Editar Solicitud</a>
                @endif
                
                {{-- Botón para enviar cotización --}}
                <a href="{{ route('cotizaciones.create', $servicio->id) }}" class="btn-exito">Cotizar Servicio</a>
            </div>
        </div>

        {{-- Tarjeta Principal con Información Detallada --}}
        <div class="tarjeta-blanca">
            <div class="tarjeta-servicio-header">
                <h1 class="titulo-pagina">{{ $servicio->titulo }}</h1>
                <span class="badge badge-{{ $servicio->estado }}">
                    {{ str_replace('_', ' ', $servicio->estado) }}
                </span>
            </div>

            <p class="texto-secundario"><strong>Publicado por:</strong> {{ $servicio->cliente->name ?? 'Usuario' }} el {{ $servicio->created_at->format('d/m/Y H:i') }}</p>
            <p class="texto-secundario"><strong>Categoría:</strong> {{ $servicio->categoriaServicio->nombre ?? 'Sin Asignar' }}</p>
            <p class="texto-secundario"><strong>Ubicación del trabajo:</strong> {{ $servicio->direccion }}</p>

            <hr style="margin: 1.5rem 0; border: 0; border-top: 1px solid #e5e7eb;">

            <h2 class="subtitulo-resumen">Descripción del Problema</h2>
            <p class="texto-secundario" style="white-space: pre-line;">{{ $servicio->descripcion }}</p>
        </div>

        {{-- Sección de Cotizaciones Recibidas --}}
        <div class="seccion-cotizaciones">
            <h2 class="titulo-pagina">Cotizaciones Recibidas ({{ $servicio->cotizaciones->count() }})</h2>

            @forelse ($servicio->cotizaciones as $cotizacion)
                <div class="tarjeta-cotizacion">
                    <div>
                        <p class="monto-cotizacion">$ {{ number_format($cotizacion->monto, 0, ',', '.') }} COP</p>
                        <p class="texto-secundario"><strong>Técnico:</strong> {{ $cotizacion->tecnico->name ?? 'Técnico Registrado' }}</p>
                        <p class="texto-secundario"><strong>Tiempo Estimado:</strong> {{ $cotizacion->tiempo_estimado }}</p>
                        <p class="texto-secundario"><strong>Propuesta:</strong> {{ $cotizacion->observaciones }}</p>
                    </div>
                    <div>
                        <span class="badge badge-{{ $cotizacion->estado }}">{{ $cotizacion->estado }}</span>
                    </div>
                </div>
            @empty
                <div class="tarjeta-blanca estado-vacio">
                    <p>Aún no hay cotizaciones para esta solicitud. ¡Sé el primer técnico en ofertar!</p>
                </div>
            @endforelse
        </div>

    </div>
</x-app-layout>