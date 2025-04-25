<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
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

/* Estilos para la tabla del carrito */
.cart-table {
    width: 100%;
    background: rgba(30, 30, 30, 0.8);
    border-radius: 10px;
    overflow: hidden;
    border: 1px solid rgba(230, 57, 70, 0.3);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
    margin-bottom: 2rem;
}

.cart-table th {
    background-color: rgba(230, 57, 70, 0.2);
    color: var(--light-color);
    padding: 1rem;
    text-align: left;
    text-transform: uppercase;
    font-size: 0.9rem;
    letter-spacing: 1px;
}

.cart-table td {
    padding: 1rem;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    vertical-align: middle;
}

.cart-table tr:last-child td {
    border-bottom: none;
}

.cart-table tfoot td {
    background-color: rgba(43, 45, 66, 0.5);
    font-weight: bold;
}

/* Estilos para las imágenes del carrito */
.cart-img {
    width: 80px;
    height: 80px;
    object-fit: cover;
    border-radius: 5px;
    border: 2px solid var(--primary-color);
}

/* Estilos para los botones de cantidad */
.quantity-control {
    display: flex;
    align-items: center;
}

.quantity-btn {
    background-color: var(--gray-color);
    color: white;
    border: none;
    width: 30px;
    height: 30px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 5px;
    cursor: pointer;
    transition: all 0.3s;
}

.quantity-btn:hover {
    background-color: var(--primary-color);
}

.quantity-input {
    width: 50px;
    text-align: center;
    margin: 0 10px;
    background-color: rgba(43, 45, 66, 0.5);
    border: 1px solid var(--gray-light);
    color: white;
    padding: 0.25rem;
    border-radius: 5px;
}

/* Estilos para el botón de eliminar */
.delete-btn {
    background-color: var(--primary-color);
    color: white;
    border: none;
    width: 30px;
    height: 30px;
    border-radius: 5px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s;
}

.delete-btn:hover {
    background-color: var(--primary-dark);
    transform: scale(1.1);
}

/* Estilos para el botón de pagar */
.checkout-btn {
    background-color: var(--primary-color);
    color: white;
    border: none;
    padding: 0.75rem 2rem;
    border-radius: 5px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1px;
    transition: all 0.3s;
    margin-top: 1rem;
}

.checkout-btn:hover {
    background-color: var(--primary-dark);
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(230, 57, 70, 0.4);
}

/* Estilos para el mensaje de carrito vacío */
.empty-cart {
    background: rgba(30, 30, 30, 0.8);
    border-radius: 10px;
    padding: 2rem;
    text-align: center;
    border: 1px solid rgba(230, 57, 70, 0.3);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
}

.empty-cart a {
    color: var(--primary-color);
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s;
}

.empty-cart a:hover {
    color: var(--primary-dark);
    text-decoration: underline;
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
    
    .cart-table {
        display: block;
        overflow-x: auto;
    }
    
    .cart-table th, 
    .cart-table td {
        padding: 0.75rem;
    }
}

@media (max-width: 576px) {
    .logo-center h1 {
        font-size: 1.5rem;
    }
    
    .nav-links a {
        font-size: 0.8rem;
    }
    
    .content-section-heading h2 {
        font-size: 1.5rem;
    }
    
    .cart-img {
        width: 60px;
        height: 60px;
    }
    
    .quantity-input {
        width: 40px;
        margin: 0 5px;
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
    
    <div class="container py-4">
        <div class="content-section">
            <div class="content-section-heading">
                <h2>Tu Carrito</h2>
            </div>
            
            <?php if(isset($carrito) && count($carrito) > 0): ?>
                <div class="table-responsive">
                    <table class="cart-table">
                        <thead>
                            <tr>
                                <th>Imagen</th>
                                <th>Producto</th>
                                <th>Precio</th>
                                <th>Cantidad</th>
                                <th>Total</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $carrito; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id_producto => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <?php if(!empty($item['imagen'])): ?>
                                        <?php if(Str::startsWith($item['imagen'], 'http')): ?>
                                            <img src="<?php echo e($item['imagen']); ?>" class="cart-img" alt="<?php echo e($item['nombre']); ?>">
                                        <?php elseif(file_exists(public_path('storage/'.$item['imagen']))): ?>
                                            <img src="<?php echo e(asset('storage/'.$item['imagen'])); ?>" class="cart-img" alt="<?php echo e($item['nombre']); ?>">
                                        <?php elseif(file_exists(public_path('img/'.$item['imagen']))): ?>
                                            <img src="<?php echo e(asset('img/'.$item['imagen'])); ?>" class="cart-img" alt="<?php echo e($item['nombre']); ?>">
                                        <?php else: ?>
                                            <img src="<?php echo e(asset('img/Captura de pantalla 2025-03-16 190807.png')); ?>" class="cart-img" alt="Producto sin imagen">
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <img src="<?php echo e(asset('img/fisherprice.jpg')); ?>" class="cart-img" alt="Producto sin imagen">
                                    <?php endif; ?>
                                </td>
                                <td><?php echo e($item['nombre'] ?? 'Producto sin nombre'); ?></td>
                                <td>$<?php echo e(number_format($item['precio'] ?? 0, 2)); ?></td>
                                <td>
                                    <form action="<?php echo e(route('carrito.actualizar', $id_producto)); ?>" method="POST" class="quantity-control">
                                        <?php echo csrf_field(); ?>
                                        <button type="submit" name="accion" value="decrementar" class="quantity-btn">-</button>
                                        <input type="number" name="cantidad" value="<?php echo e($item['cantidad']); ?>" 
                                               class="quantity-input" min="1">
                                        <button type="submit" name="accion" value="incrementar" class="quantity-btn">+</button>
                                    </form>
                                </td>
                                <td>$<?php echo e(number_format(($item['precio'] ?? 0) * ($item['cantidad'] ?? 1), 2)); ?></td>
                                <td>
                                    <form action="<?php echo e(route('carrito.eliminar', $id_producto)); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <button type="submit" class="delete-btn">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4" class="text-end"><strong>Total:</strong></td>
                                <td><strong>$<?php echo e(number_format($total ?? 0, 2)); ?></strong></td>
                                <td></td>
                            </tr>
                        </tfoot>
                    </table>
                    
                    <div class="text-end">
                        <a href="#" class="checkout-btn">Pagar</a>
                    </div>
                </div>
            <?php else: ?>
                <div class="empty-cart">
                    <p>Tu carrito está vacío. <a href="<?php echo e(url('Galeria')); ?>">Ver productos</a></p>
                </div>
            <?php endif; ?>
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
</html><?php /**PATH C:\xampp\htdocs\laravel\animex\resources\views/carrito.blade.php ENDPATH**/ ?>