<?php

// -- Load composer autoload
require __DIR__ . '/vendor/autoload.php';

// -- Load used class
use Aura\Router\RouterFactory;
use Leadaki\Frontend\Service\LoadSiteDataService;

// -- Load config file or redirect to install script
if (file_exists(__DIR__ . '/config/config.php')) {
    require __DIR__ . '/config/config.php';
} else {
    header('Location: install/');
}

// -- Load remote data
$loadSiteDataService = new LoadSiteDataService(
    $config['api']['base_url'] . '/' . $config['app']['website_id'],
    array(
        'cacheFolder' => $config['folders']['cache'],
        'cacheValid' => 3600,
    )
);

$site = $loadSiteDataService->getSite();

$routerCachePath = sprintf('%s/%s', $config['folders']['cache'], 'router.cache');
$routerFactory = new RouterFactory();
$router = $routerFactory->newInstance();

if (file_exists($routerCachePath) && !$config['app']['debug']) {
    $router->setRoutes(unserialize(file_get_contents($routerCachePath)));
} else {
    $base_path = parse_url($config['app']['base_url'], PHP_URL_PATH);

    $router->attach(null, $base_path, function ($router) {
        // -- Set Defaults
        $router
            ->addServer(array(
                'REQUEST_METHOD' => 'HEAD|GET',
            ))
        ;

        // -- Index
        $router
            ->add('index', '/')
        ;

        // -- Promotions
        $router
            ->add('promociones', '/promociones')
        ;

        // -- Products
        $router
            ->add('productos', '/productos')
        ;

        // -- Services
        $router
            ->add('servicios', '/servicios')
        ;

        // -- Product View
        $router
            ->add('productos_detalle', '/productos/{friendly_name}/{product_id}')
            ->addTokens(array(
                'friendly_name' => '[\w-]+',
                'product_id' => '\w+',
            ))
        ;

        // -- Quienes Somos
        $router
            ->add('quienes_somos', '/quienes-somos')
        ;

        // -- Ubicacion
        $router
            ->add('ubicacion', '/ubicacion')
        ;

        // -- Contactanos
        $router
            ->add('contactanos', '/contactanos')
        ;
    });

    // -- Save cache
    file_put_contents($routerCachePath, serialize($router->getRoutes()));
}

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$route = $router->match($path, $_SERVER);

if (empty($route)) {
    header("HTTP/1.0 404 Not Found");
    echo 'Ruta no encontrada';
    exit;
}

// -- Load and configure Twig
$loader = new Twig_Loader_Filesystem($config['folders']['templates']);
$twig = new Twig_Environment($loader, array(
    'cache' => $config['folders']['templates_cache'],
    'debug' => $config['app']['debug'],
));

// -- Load Twig Debug Extension
if ($config['app']['debug']) {
    $twig->addExtension(new Twig_Extension_Debug());
}

$twig->addFunction(new Twig_SimpleFunction('url_generate', function($name, $parameters = array()) use ($router) {
    return $router->generate($name, $parameters);
}));


echo $twig->render($route->name . '.html.twig', array(
    'config' => $config,
    'site' => $site,
));
