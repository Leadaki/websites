<?php

// -- Load composer autoload
require __DIR__ . '/vendor/autoload.php';

// -- Load used class
use Leadaki\Frontend\Service\LoadSiteDataService;
use Leadaki\Frontend\Service\LoadUrlConfigService;
use Leadaki\Frontend\Application\Application;
use Leadaki\Frontend\Service\AltoRouterService;
use Leadaki\Frontend\Service\TwigTemplateService;

// -- Load config file or redirect to install script
if (file_exists(__DIR__ . '/config/config.php')) {
    require __DIR__ . '/config/config.php';
} else {
    header('Location: install/');
}

// -- Load config from url
$loadUrlConfigService = new LoadUrlConfigService($config, $_SERVER['REQUEST_URI']);
$config['app']['website_id'] = $loadUrlConfigService->getWebsiteId();

// -- Load remote data
$loadSiteDataService = new LoadSiteDataService(
    $config['api']['base_url'] . '/' . $config['app']['website_id'],
    array(
        'cacheFolder' => $config['folders']['cache'],
        'cacheValid' => 3600,
    )
);

$site = $loadSiteDataService->getSite();

$site->getTemplate()->setId($loadUrlConfigService->getTemplate());
$site->getTemplate()->setColor($loadUrlConfigService->getColor());

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
    'path',
    function($name, $parameters = array()) use ($routerService) {
        $queryString = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
        return $routerService->generate($name, $parameters) . (empty($queryString) ? '' : '?' . $queryString);
    }
);

$templateService->addFunction(
    'is_path',
    function($name) use ($routerService) {
        $route = $routerService->match();

        if (empty($route)) {
            return false;
        }

        return $route->getName() === $name;
    }
);

$templateService->addFunction(
    'asset',
    function($path) use ($config) {
        return $config['app']['base_url'] . $path;
    }
);

$templateService->addExtension(new Twig_Extensions_Extension_Text());
$templateService->addExtension(new Twig_Extensions_Extension_Array());

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
