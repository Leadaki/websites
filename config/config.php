<?php

/**
 * Website id for retrieve data from the API
 */
$config['app']['website_id'] = 'inserte su ID de sitio entre las comillas';

/**
 * Template id to apply
 */
$config['template']['id'] = 'modern';

/**
 * Template color
 */
$config['template']['color'] = 'red';

/**
 * Folder to sve cache
 */
$config['folders']['cache'] = __DIR__ . '/../cache';

/**
 * Folder Twig find views
 */
$config['folders']['templates'] = __DIR__ . '/../Resources/views';

/**
 * Folder to Twig save cache views
 */
$config['folders']['templates_cache'] = __DIR__ . '/../cache/views';

/**
 * Debug application
 */
$config['app']['debug'] = true;

/**
 * Language of display app
 */
$config['app']['language'] = 'es';

/**
 * Charset application
 */
$config['app']['charset'] = 'UTF-8';

/**
 * Api Base URL
 */
$config['api']['base_url'] = 'http://api.leadaki.com/api/v2/websites';
$config['app']['base_url'] = '/websites';