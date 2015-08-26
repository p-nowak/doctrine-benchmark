<?php

$app = require_once 'bootstrap.php';

$application = new \Symfony\Component\Console\Application("Doctrine Benchmark", "0.1");
$application->addCommands([$app['command_add_objects']]);
$application->addCommands([$app['command_update_objects']]);
$application->run();
