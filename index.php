<?php
# CRIANDO UM SISTEMA SIMPLES DE ROTAS 
$routes = [];

# A Funcão route tem dois argumentos 1-> URI e o 2-> callback
route('/', function () {
    echo 'HOME PAGE';
});

route('/login', function () {
   echo 'LOGIN PAGE';
});

route('/404', function () {
    echo 'PÁGINA NÃO ENCONTRADA';
 });
  
# Implementar a função route
function route (string $path, callable $callback) {
    global $routes;
    $routes[$path] = $callback;
}

run();

function run () {
    global $routes;
    $uri = $_SERVER['REQUEST_URI'];
    $found = false;
    foreach ($routes as $path => $callback) {
        # codigo...
        if($path !== $uri) continue;
        $found = true;
        $callback();
    }

    if(!$found):
      $notfound = $routes['/404'];
      $notfound();
    endif;    
}