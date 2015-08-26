<?php

$app->register(new \Silex\Provider\DoctrineServiceProvider(), [
    "db.options" => [
        "dbname" => "benchmark",
        "user" => "root",
        "password" => "mysql"
    ]
]);
