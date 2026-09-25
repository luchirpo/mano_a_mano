<x-app-layout>
    <div class="contenedor-principal">

        <h1 class="titulo-pagina">Enviar Cotización para el Servicio #{{ $servicio->id }}</h1>

        <div class="tarjeta-resumen">
            <h2 class="subtitulo-resumen">{{ $servicio->titulo }}</h2>
            <p class="texto-secundario"><strong>Cliente:</strong> {{ $servicio->cliente->name ?? 'Usuario' }}</p>
            <p class="texto-secundario"><strong>Ubicación:</strong> {{ $servicio->direccion }}</p>
            <p class="texto-secundario"><strong>Descripción:</strong> {{ $servicio->descripcion }}</p>
        </div>

        <div class="tarjeta-blanca">

            @if ($errors->any())
                <div class="alerta-error">
                    <ul class="lista-errores">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('cotizaciones.store') }}" method="POST">
                @csrf

                <input type="hidden" name="servicio_solicitado_id" value="{{ $servicio->id }}">

                <div class="grid-dos-columnas">
                    <div class="grupo-campo">
                        <label for="monto" class="etiqueta-form">Monto Ofertado ($ COP)</label>
                        <input type="number" step="1000" name="monto" id="monto" 
                                value="{{ old('monto') }}" class="control-input" placeholder="Ej: 80000" required>
                    </div>

                    <div class="grupo-campo">
                        <label for="tiempo_estimado" class="etiqueta-form">Tiempo Estimado</label>
                        <input type="text" name="tiempo_estimado" id="tiempo_estimado" 
                                value="{{ old('tiempo_estimado') }}" class="control-input" placeholder="Ej: 2 horas" required>
                    </div>
                </div>

                <div class="grupo-campo">
                    <label for="observaciones" class="etiqueta-form">Detalle de la Propuesta Técnica</label>
                    <textarea name="observaciones" id="observaciones" rows="4" 
                                class="control-textarea" placeholder="Explica tu propuesta..." required>{{ old('observaciones') }}</textarea>
                </div>

                <div class="acciones-form">
                    <a href="{{ route('servicios.show', $servicio->id) }}" class="btn-secundario">Cancelar</a>
                    <button type="submit" class="btn-exito">Enviar Cotización</button>
                </div>
            </form>

        </div>
    </div>
</x-app-layout> 