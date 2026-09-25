<x-app-layout>
    <div class="contenedor-principal">
        
        <div class="encabezado-vista">
            <h1 class="titulo-pagina">Editar Solicitud #{{ $servicio->id }}</h1>
            <a href="{{ route('servicios.show', $servicio->id) }}" class="enlace-volver">&larr; Cancelar y Volver</a>
        </div>

        <div class="tarjeta-blanca">

            @if ($errors->any())
                <div class="alerta-error">
                    <strong>¡Atención!</strong> Corrige los siguientes errores:
                    <ul class="lista-errores">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('servicios.update', $servicio->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="grupo-campo">
                    <label for="categoria_servicio_id" class="etiqueta-form">Categoría</label>
                    <select name="categoria_servicio_id" id="categoria_servicio_id" class="control-select">
                        <option value="">-- Selecciona una Categoría --</option>
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}" 
                                {{ old('categoria_servicio_id', $servicio->categoria_servicio_id) == $categoria->id ? 'selected' : '' }}>
                                {{ $categoria->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="grupo-campo">
                    <label for="titulo" class="etiqueta-form">Título del Problema</label>
                    <input type="text" name="titulo" id="titulo" 
                            value="{{ old('titulo', $servicio->titulo) }}"
                            class="control-input" placeholder="Ej: Fuga de agua en lavaplatos">
                </div>

                <div class="grupo-campo">
                    <label for="direccion" class="etiqueta-form">Dirección del Trabajo</label>
                    <input type="text" name="direccion" id="direccion" 
                            value="{{ old('direccion', $servicio->direccion) }}"
                            class="control-input" placeholder="Ej: Calle 45 # 12-34">
                </div>

                <div class="grupo-campo">
                    <label for="descripcion" class="etiqueta-form">Descripción Detallada</label>
                    <textarea name="descripcion" id="descripcion" rows="5" class="control-textarea">{{ old('descripcion', $servicio->descripcion) }}</textarea>
                </div>

                <div class="acciones-form">
                    <a href="{{ route('servicios.show', $servicio->id) }}" class="btn-secundario">Cancelar</a>
                    <button type="submit" class="btn-primario">Actualizar Solicitud</button>
                </div>
            </form>

        </div>
    </div>
</x-app-layout>