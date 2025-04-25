<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar producto</title>
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

.content-section-heading {
    text-align: center;
    margin-bottom: 2rem;
}

.content-section-heading h2 {
    font-weight: 700;
    color: #ffffff;
    position: relative;
    padding-bottom: 15px;
    margin-bottom: 2rem;
    text-transform: uppercase;
    letter-spacing: 2px;
    display: inline-block;
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

/* Estilos del formulario mejorado */
.custom-form {
    max-width: 600px;
    margin: 0 auto;
    padding: 2rem;
    background: rgba(30, 30, 30, 0.8);
    border-radius: 10px;
    border: 1px solid rgba(230, 57, 70, 0.3);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
}

.custom-form .form-label {
    color: var(--light-color);
    font-weight: 500;
    margin-bottom: 0.5rem;
    display: block;
}

.custom-form .form-control {
    background-color: rgba(43, 45, 66, 0.5);
    border: 1px solid var(--gray-light);
    color: var(--light-color);
    padding: 0.75rem 1rem;
    border-radius: 5px;
    transition: all 0.3s;
    width: 100%;
    margin-bottom: 1rem;
}

.custom-form .form-control:focus {
    background-color: rgba(43, 45, 66, 0.8);
    border-color: var(--primary-color);
    box-shadow: 0 0 0 0.25rem rgba(230, 57, 70, 0.25);
    color: var(--light-color);
}

.custom-form textarea.form-control {
    min-height: 120px;
    resize: vertical;
}

.custom-form input[type="file"].form-control {
    padding: 0.5rem;
}

.custom-btn {
    background-color: var(--primary-color);
    color: white;
    border: none;
    padding: 0.75rem 1.5rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1px;
    border-radius: 5px;
    transition: all 0.3s;
    width: 100%;
    margin-top: 1rem;
    cursor: pointer;
}

.custom-btn:hover {
    background-color: var(--primary-dark);
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(230, 57, 70, 0.4);
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

/* Animación */
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
    
    .product-item {
        padding: 1rem;
    }
    
    .custom-form {
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
    
    .product-img {
        width: 100px;
        height: 100px;
    }
    
    .btn-action {
        padding: 0.4rem 0.8rem;
        font-size: 0.75rem;
    }
    
    .custom-form {
        padding: 1rem;
    }
    
    .content-section-heading h2 {
        font-size: 1.5rem;
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
                <a href="<?php echo e(url('/')); ?>" class="active">Inicio</a>
                <a href="<?php echo e(route('usuarios.create')); ?>">Registrar Usuario</a>
                <a href="<?php echo e(route('usuarios.galeria')); ?>">Usuarios</a>
                <a href="<?php echo e(route('productos.create')); ?>">Agregar Productos</a>
                <a href="<?php echo e(url('Galeria')); ?>">Productos</a>
                <a href="<?php echo e(route('carrito.ver')); ?>">
                    <i class="fas fa-shopping-cart cart-icon"></i>
                </a>
            </div>
        </div>
    </nav>
    
    <div class="container mt-5">
        <div class="content-section">
            <div class="content-section-heading">
                <h2>Agregar Producto</h2>
            </div>
           <form action="<?php echo e(route('productos.store')); ?>" method="POST" enctype="multipart/form-data" class="custom-form">
    <?php echo csrf_field(); ?>
    <div class="mb-4">
        <label for="nombre" class="form-label">Nombre del Producto</label>
        <input type="text" name="nombre" id="nombre" class="form-control" required>
    </div>
    <div class="mb-4">
        <label for="descripcion" class="form-label">Descripción</label>
        <textarea name="descripcion" id="descripcion" class="form-control" required></textarea>
    </div>
    <div class="mb-4">
        <label for="precio" class="form-label">Precio</label>
        <input type="number" step="0.01" name="precio" id="precio" class="form-control" required min="0">
    </div>
    <div class="mb-4">
        <label for="stock" class="form-label">Stock Disponible</label>
        <input type="number" name="stock" id="stock" class="form-control" required min="0">
    </div>
    <div class="mb-4">
        <label for="estatus" class="form-label">Estatus</label>
        <select name="estatus" id="estatus" class="form-control" required>
            <option value="">Seleccione un estatus</option>
            <option value="activo">Activo</option>
            <option value="inactivo">Inactivo</option>
            <option value="agotado">Agotado</option>
        </select>
    </div>
    <div class="mb-4">
        <label for="imagen" class="form-label">Imagen</label>
        <input type="file" name="imagen" id="imagen" class="form-control" accept="image/jpeg,image/png,image/jpg">
        <small class="text-muted">Formatos aceptados: JPEG, PNG, JPG (Max 2MB)</small>
    </div>
    <button type="submit" class="btn btn-primary custom-btn">Agregar Producto</button>
</form>
        </div>
    </div> 
    <br> 
    <br> 

    <!-- Footer -->
    <footer class="custom-footer">
        <p>&copy; 2025 AnimeX. Todos los derechos reservados.</p>
    </footer>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html><?php /**PATH C:\xampp\htdocs\laravel\animex\resources\views/productos/create.blade.php ENDPATH**/ ?>