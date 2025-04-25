
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeria Usuario</title>
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
.content-section {
    padding: 2rem 0;
    background: radial-gradient(circle at center, #1a1a1a 0%, #000000 100%);
}

.content-section-heading h2 {
    font-weight: 700;
    color: #ffffff;
    position: relative;
    padding-bottom: 15px;
    margin-bottom: 2rem;
    text-transform: uppercase;
    letter-spacing: 2px;
}

.content-section-heading h2::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 100px;
    height: 3px;
    background: linear-gradient(90deg, transparent, #e63946, transparent);
}

/* Tarjetas de productos mejoradas */
.product-item {
    background: rgba(30, 30, 30, 0.8);
    border-radius: 10px;
    padding: 1.5rem;
    margin: 1rem 0;
    border: 1px solid rgba(230, 57, 70, 0.3);
    transition: all 0.3s;
}

.product-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(230, 57, 70, 0.2);
    border-color: #e63946;
}

.product-img {
    width: 120px;
    height: 120px;
    object-fit: cover;
    border: 3px solid #e63946;
    border-radius: 50%;
    margin: 0 auto 1rem;
    display: block;
}

.product-title {
    color: #ffffff;
    font-weight: 600;
    margin: 1rem 0 0.5rem;
    font-size: 1.2rem;
}

.product-info {
    color: #adb5bd;
    margin-bottom: 0.5rem;
    font-size: 0.9rem;
}

/* Botones mejorados */
.btn-action {
    margin: 0.3rem;
    font-weight: 600;
    padding: 0.5rem 1rem;
    font-size: 0.8rem;
    border-radius: 5px;
    transition: all 0.3s;
}

.btn-edit {
    background-color: #e63946;
    color: white;
}

.btn-edit:hover {
    background-color: #c1121f;
    color: white;
}

.btn-delete {
    background-color: #343a40;
    color: white;
}

.btn-delete:hover {
    background-color: #212529;
    color: white;
}

.btn-cart {
    background-color: #2b9348;
    color: white;
}

.btn-cart:hover {
    background-color: #1b5e20;
    color: white;
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
    
    .product-item {
        padding: 1rem;
    }
}

@media (max-width: 576px) {
    .logo-center h1 {
        font-size: 1.5rem;
    }
    
    .nav-links a {
        font-size: 0.8rem;
    }
    
    .product-img {
        width: 100px;
        height: 100px;
    }
    
    .btn-action {
        padding: 0.4rem 0.8rem;
        font-size: 0.75rem;
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
    
    <div class="container mt-5">
    <h2 class="text-center mb-4">AGREGAR PRODUCTO</h2>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="titulo" class="form-label">Título</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" required>
                </div>
                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="precio" class="form-label">Precio</label>
                    <input type="number" step="0.01" class="form-control" id="precio" name="precio" required>
                </div>
                <div class="mb-3">
                    <label for="estado" class="form-label">Estado</label>
                    <select class="form-control" id="estado" name="estado" required>
                        <option value="1">Activo</option>
                        <option value="0">Inactivo</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="categoria" class="form-label">Categoría</label>
                    <input type="text" class="form-control" id="categoria" name="categoria" required>
                </div>
                <div class="mb-3">
                    <label for="imagen" class="form-label">Imagen</label>
                    <input type="file" class="form-control" id="imagen" name="imagen">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">GUARDAR PRODUCTO</button>
                </div>
            </form>
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