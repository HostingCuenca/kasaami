<?php
// router.php - Para usar con php -S localhost:8000 router.php

$request = $_SERVER['REQUEST_URI'];
$path = parse_url($request, PHP_URL_PATH);

// Rutas limpias
$routes = [
    '/sobre-nosotros' => 'pages/sobre-nosotros.php',
    '/servicios' => 'pages/servicios.php', 
    '/procedimientos' => 'pages/procedimientos.php',
    '/medicos-aliados' => 'pages/medicos-aliados.php',
    '/contactanos' => 'pages/contactanos.php'
];

// Si la ruta existe en nuestro mapa
if (array_key_exists($path, $routes)) {
    include $routes[$path];
    return true;
}

// Si es la raíz, mostrar index 
if ($path === '/' || $path === '') {
    include 'index.php';
    return true;
}

// Si es un archivo estático (CSS, JS, imágenes), servirlo directamente
if (preg_match('/\.(css|js|png|jpg|jpeg|gif|ico|svg)$/', $path)) {
    return false; // Deja que PHP sirva el archivo estático
}

// Si no existe, mostrar 404
http_response_code(404);
echo "Página no encontrada";
return true;
?>