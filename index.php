<?php

// -- Load composer autoload
require __DIR__ . '/vendor/autoload.php';

// -- Load used class
use Leadaki\Frontend\Service\LoadSiteDataService;
use Leadaki\Frontend\Service\LoadUrlConfigService;
use Leadaki\Frontend\Application\Application;
use Leadaki\Frontend\Service\AltoRouterService;
use Leadaki\Frontend\Service\TwigTemplateService;
use Leadaki\Frontend\Twig\ApplicationTwigExtension;

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

$templateService->addExtension(new Twig_Extensions_Extension_Text());
$templateService->addExtension(new Twig_Extensions_Extension_Array());
$templateService->addExtension(new ApplicationTwigExtension($config, $routerService));

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
