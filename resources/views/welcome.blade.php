<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mano a Mano - Soluciones para tu Hogar</title>
    <!-- Vinculación al archivo CSS externo -->
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
</head>
<body>

    <!-- BARRA DE NAVEGACIÓN -->
    <nav class="navbar">
        <div class="contenedor nav-contenedor">
            <a href="{{ url('/') }}" class="logo">🤝 Mano a Mano</a>
            <div class="nav-botones">
                @auth
                    <a href="{{ route('dashboard') }}" class="btn btn-primario">Ir a mi Panel</a>
                @else
                    <a href="{{ route('login') }}" class="btn-link">Iniciar Sesión</a>
                    <a href="{{ route('register') }}" class="btn btn-primario">Registrarse</a>
                @endauth
            </div>
        </div>
    </nav>

    <!-- PORTADA PRINCIPAL (HERO) -->
    <header class="hero">
        <div class="contenedor">
            <h1>Soluciona los problemas de tu hogar rápido y confiable</h1>
            <p>Conectamos a personas que necesitan reparaciones con técnicos expertos en plomería, cerrajería, electricidad y jardinería.</p>
            <div class="hero-acciones">
                <a href="{{ route('register') }}" class="btn btn-blanco">Solicitar un servicio</a>
                <a href="{{ route('register') }}" class="btn btn-secundario">Ofrecer mis servicios</a>
            </div>
        </div>
    </header>

    <!-- CATEGORÍAS DE SERVICIO -->
    <section class="contenedor seccion">
        <h2 class="titulo-seccion">Servicios más solicitados</h2>
        <div class="grid-categorias">
            <div class="tarjeta-categoria">
                <span class="icono">🚰</span>
                <h3>Plomería</h3>
                <p>Reparación de fugas, tuberías, grifos y sanitarios.</p>
            </div>
            <div class="tarjeta-categoria">
                <span class="icono">⚡</span>
                <h3>Electricidad</h3>
                <p>Arreglos de cortocircuitos, tomas e instalaciones.</p>
            </div>
            <div class="tarjeta-categoria">
                <span class="icono">🔑</span>
                <h3>Cerrajería</h3>
                <p>Apertura de cerraduras, cambio de llaves y candados.</p>
            </div>
            <div class="tarjeta-categoria">
                <span class="icono">🌿</span>
                <h3>Jardinería</h3>
                <p>Mantenimiento de jardines, poda y cuidado de césped.</p>
            </div>
        </div>
    </section>

    <!-- CÓMO FUNCIONA -->
    <section class="seccion-gris">
        <div class="contenedor">
            <h2 class="titulo-seccion">¿Cómo funciona Mano a Mano?</h2>
            <div class="grid-pasos">
                <div class="paso">
                    <span class="numero-paso">1</span>
                    <h3>Publica tu necesidad</h3>
                    <p>Describe el problema de tu casa y adjunta una foto explicativa.</p>
                </div>
                <div class="paso">
                    <span class="numero-paso">2</span>
                    <h3>Recibe cotizaciones</h3>
                    <p>Técnicos verificados revisarán tu caso y enviarán sus propuestas.</p>
                </div>
                <div class="paso">
                    <span class="numero-paso">3</span>
                    <h3>Acepta y contrata</h3>
                    <p>Elige la cotización conveniente, acuerda los detalles y listo.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- PIE DE PÁGINA -->
    <footer class="footer">
        <p>&copy; {{ date('Y') }} Mano a Mano - Plataforma de Servicios Técnicos.</p>
    </footer>

</body>
</html>