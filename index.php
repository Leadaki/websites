<?php

// -- Load composer autoload
require __DIR__ . '/vendor/autoload.php';

// -- Load used class
use Leadaki\Frontend\Service\LoadSiteDataService;
use Leadaki\Frontend\Application\Application;
use Leadaki\Frontend\Service\AltoRouterService;
use Leadaki\Frontend\Service\TwigTemplateService;

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

$routerService = new AltoRouterService(array(
    'base_path' => parse_url($config['app']['base_url'], PHP_URL_PATH)
));

$templateService = new TwigTemplateService(array(
    'templates_folder' => $config['folders']['templates'],
    'templates_cache_folder' => $config['folders']['templates_cache'],
    'debug' => $config['app']['debug'],
));

$templateService->addGlobal('config', $config);
$templateService->addGlobal('site', $site);

$templateService->addFunction(
    'url_generate',
    function($name, $parameters = array()) use ($routerService) {
        return $routerService->generate($name, $parameters);
    }
);

if ($config['app']['debug']) {
    $templateService->addExtension(new Twig_Extension_Debug());
}

$app = new Application(
    $routerService,
    $templateService,
    $config,
    $site
);

$app->run();
