<?php

use Pnowak\Commands\AddObjectsCommand;
use Pnowak\Commands\RandomUpdatesCommand;
use Pnowak\RandomData\RandomDataRepository;
use Symfony\Component\Stopwatch\Stopwatch;

$loader = require_once 'vendor/autoload.php';

$stopwatch = new Stopwatch();

Doctrine\Common\Annotations\AnnotationRegistry::registerLoader(spl_autoload_functions()[0]);

$app = new Silex\Application();

$app['stopwatch'] = $stopwatch;

require_once 'db-config.php';

$app['random_data'] = function() use($app) {
    $app['stopwatch']->start('random_data', 'random_data');
    $result = new RandomDataRepository();
    $app['stopwatch']->stop('random_data');
    return $result;
};

$app['command_add_objects'] = function() use($app) {
    return new AddObjectsCommand($app['orm.em'], $app['random_data'], $app['stopwatch']);
};

$app['command_update_objects'] = function() use($app) {
    return new RandomUpdatesCommand($app['orm.em'], $app['random_data'], $app['stopwatch']);
};

$app->register(new \Dflydev\Silex\Provider\DoctrineOrm\DoctrineOrmServiceProvider(), [
    "orm.proxies_dir" => __DIR__ . "/app/cache/proxies",
    "orm.em.options" => [
        "mappings" => [
            ["type" => "annotation", "namespace" => "Pnowak\\Model", "path" => __DIR__ . "/src/Pnowak/Model", "use_simple_annotation_reader" => false]
        ]
    ]
]);

return $app;