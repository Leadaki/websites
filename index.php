<?php

// -- Load composer autoload
require __DIR__ . '/vendor/autoload.php';

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
        'cachePath' => $config['folders']['cache'],
    )
);

$site = $loadSiteDataService->getSite();

// -- Load and configure Twig
$loader = new Twig_Loader_Filesystem($config['folders']['templates']);
$twig = new Twig_Environment($loader, array(
    'cache' => $config['folders']['templates_cache'],
    'debug' => $config['app']['debug'],
));

echo $twig->render('index.html.twig', array(
    'config' => $config,
    'site' => $site,
));
