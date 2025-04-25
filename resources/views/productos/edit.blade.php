<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts: Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <style>
:root {
    --primary-color: #e63946;
    --primary-dark: #c1121f;
    --dark-color: #0a0a0a;
    --dark-light: #1a1a1a;
    --light-color: #f8f9fa;
    --gray-color: #2b2d42;
    --gray-light: #8d99ae;
}

/* Reset y estilos base */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    background-color: var(--dark-color);
    color: var(--light-color);
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    line-height: 1.6;
    padding-top: 100px; /* Para compensar el navbar fijo */
}

/* Navbar mejorado */
.navbar {
    background-color: var(--dark-light);
    padding: 1rem 0;
    position: fixed;
    width: 100%;
    top: 0;
    z-index: 1000;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
}

.nav-container {
    width: 90%;
    max-width: 1200px;
    margin: 0 auto;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
}

.logo-center {
    flex: 1;
    min-width: 200px;
    text-align: center;
}

.logo-center h1 {
    color: var(--primary-color);
    font-size: 2rem;
    letter-spacing: 3px;
    text-transform: uppercase;
    margin-bottom: 0.3rem;
    text-shadow: 0 0 15px rgba(230, 57, 70, 0.6);
    animation: glow 2s infinite alternate;
}

.slogan {
    color: var(--gray-light);
    font-size: 0.8rem;
    letter-spacing: 1.5px;
    font-style: italic;
}

.nav-links {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 1.5rem;
    align-items: center;
    padding: 0.5rem 0;
}

.nav-links a {
    color: var(--light-color);
    text-decoration: none;
    font-weight: 500;
    transition: all 0.3s;
    padding: 0.5rem 0;
    position: relative;
    font-size: 0.9rem;
    white-space: nowrap;
}

.nav-links a:hover {
    color: var(--primary-color);
}

.nav-links a.active {
    color: var(--primary-color);
}

.nav-links a.active::after,
.nav-links a:hover::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 2px;
    background-color: var(--primary-color);
}

.cart-icon {
    font-size: 1.2rem;
    margin-left: 0.5rem;
}

/* Contenido principal */
.container {
    background: radial-gradient(circle at center, #1a1a1a 0%, #000000 100%);
    padding: 2rem;
    border-radius: 10px;
    margin-bottom: 2rem;
}

.section-title {
    font-weight: 700;
    color: #ffffff;
    position: relative;
    padding-bottom: 15px;
    margin-bottom: 2rem;
    text-transform: uppercase;
    letter-spacing: 2px;
    text-align: center;
}

.section-title::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 100px;
    height: 3px;
    background: linear-gradient(90deg, transparent, #e63946, transparent);
}

/* Formulario */
.form-container {
    background: rgba(30, 30, 30, 0.8);
    border-radius: 10px;
    border: 1px solid rgba(230, 57, 70, 0.3);
}

.form-label {
    color: var(--light-color);
    font-weight: 500;
    margin-bottom: 0.5rem;
}

.form-control, .form-select {
    background-color: rgba(43, 45, 66, 0.5);
    border: 1px solid var(--gray-light);
    color: var(--light-color);
    padding: 0.75rem 1rem;
    border-radius: 5px;
    transition: all 0.3s;
}

.form-control:focus, .form-select:focus {
    background-color: rgba(43, 45, 66, 0.8);
    border-color: var(--primary-color);
    color: var(--light-color);
    box-shadow: 0 0 0 0.25rem rgba(230, 57, 70, 0.25);
}

.form-text {
    color: var(--gray-light);
    font-size: 0.8rem;
}

.current-image {
    max-width: 200px;
    max-height: 200px;
    border-radius: 10px;
    border: 2px solid var(--primary-color);
}

/* Botones */
.btn {
    font-weight: 600;
    padding: 0.5rem 1.5rem;
    border-radius: 5px;
    transition: all 0.3s;
    display: inline-flex;
    align-items: center;
    justify-content: center;
}

.btn-outline-secondary {
    color: var(--gray-light);
    border-color: var(--gray-light);
}

.btn-outline-secondary:hover {
    background-color: var(--gray-light);
    color: var(--dark-color);
}

.btn-gradient {
    background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
    color: white;
    border: none;
}

.btn-gradient:hover {
    background: linear-gradient(135deg, var(--primary-dark), var(--primary-color));
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(230, 57, 70, 0.4);
}

/* Footer */
.custom-footer {
    background-color: #111111;
    color: white;
    padding: 1.5rem 0;
    border-top: 3px solid #e63946;
    text-align: center;
}

.custom-footer p {
    margin: 0;
    font-size: 0.9rem;
}

/* Animación del logo */
@keyframes glow {
    from {
        text-shadow: 0 0 10px rgba(230, 57, 70, 0.6);
    }
    to {
        text-shadow: 0 0 20px rgba(230, 57, 70, 0.9), 0 0 30px rgba(230, 57, 70, 0.6);
    }
}

/* Responsive */
@media (max-width: 992px) {
    .nav-container {
        flex-direction: column;
    }
    
    .logo-center {
        margin-bottom: 1rem;
    }
    
    .nav-links {
        width: 100%;
        justify-content: center;
    }
}

@media (max-width: 768px) {
    body {
        padding-top: 140px;
    }
    
    .nav-links {
        gap: 1rem;
    }
    
    .container {
        padding: 1.5rem;
    }
}

@media (max-width: 576px) {
    .logo-center h1 {
        font-size: 1.5rem;
    }
    
    .nav-links a {
        font-size: 0.8rem;
    }
    
    .section-title {
        font-size: 1.5rem;
    }
    
    .btn {
        padding: 0.4rem 1rem;
        font-size: 0.9rem;
    }
}
</style>
</head>
<body>
   <!-- Navbar mejorado -->
   <nav class="navbar">
        <div class="nav-container">
            <div class="logo-center">
                <h1>ANIMEX</h1>
                <span class="slogan">El paraíso del coleccionista</span>
            </div>
            <div class="nav-links">
                <a href="{{ url('/') }}" class="active">Inicio</a>
                <a href="{{ route('usuarios.create') }}">Registrar Usuario</a>
                <a href="{{ route('usuarios.galeria') }}">Usuarios</a>
                <a href="{{ route('productos.create') }}">Agregar Productos</a>
                <a href="{{ url('Galeria') }}">Productos</a>
                <a href="{{ route('carrito.ver') }}">
                    <i class="fas fa-shopping-cart cart-icon"></i>
                </a>
            </div>
        </div>
    </nav>
    
    <!-- Main Content -->
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h2 class="section-title mb-4">Editar Producto</h2>
                
                <div class="form-container p-4 mb-5">
                    <form action="{{ route('productos.update', $producto->id_producto) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-4">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" 
                                   value="{{ old('nombre', $producto->nombre) }}" required>
                        </div>
                        
                        <div class="mb-4">
                            <label for="descripcion" class="form-label">Descripción</label>
                            <textarea class="form-control" id="descripcion" name="descripcion" 
                                      rows="4" required>{{ old('descripcion', $producto->descripcion) }}</textarea>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="precio" class="form-label">Precio</label>
                                <input type="number" step="0.01" min="0" class="form-control" 
                                       id="precio" name="precio" value="{{ old('precio', $producto->precio) }}" required>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label for="stock" class="form-label">Stock</label>
                                <input type="number" min="0" class="form-control" 
                                       id="stock" name="stock" value="{{ old('stock', $producto->stock) }}" required>
                            </div>
                        </div>
                        
                        <div class="mb-4">
                            <label for="estatus" class="form-label">Estatus</label>
                            <select class="form-select" id="estatus" name="estatus" required>
                                <option value="activo" {{ $producto->estatus == 'activo' ? 'selected' : '' }}>Activo</option>
                                <option value="inactivo" {{ $producto->estatus == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
                                <option value="agotado" {{ $producto->estatus == 'agotado' ? 'selected' : '' }}>Agotado</option>
                            </select>
                        </div>
                        
                        <div class="mb-4">
                            <label class="form-label">Imagen Actual</label>
                            <div class="text-center my-3">
                                @if($producto->imagen)
                                    <img src="{{ asset('storage/'.$producto->imagen) }}" 
                                         class="current-image img-fluid" alt="Imagen actual">
                                @else
                                    <div class="alert alert-info">Sin imagen</div>
                                @endif
                            </div>
                            
                            <label for="imagen" class="form-label">Cambiar Imagen</label>
                            <input type="file" class="form-control" id="imagen" name="imagen"
                                   accept="image/jpeg, image/png, image/jpg">
                            <div class="form-text">Formatos: JPEG, PNG, JPG (Max. 2MB)</div>
                        </div>
                        
                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('galeria') }}" class="btn btn-outline-secondary">
                                <i class="fas fa-arrow-left me-2"></i>Cancelar
                            </a>
                            <button type="submit" class="btn btn-gradient px-4">
                                <i class="fas fa-save me-2"></i>Guardar Cambios
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <footer class="custom-footer">
        <p>&copy; 2025 AnimeX. Todos los derechos reservados.</p>
    </footer>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>