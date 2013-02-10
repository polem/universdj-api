<?php

use UniversDj\Security\UserProvider;
use Dflydev\Silex\Provider\DoctrineOrm\DoctrineOrmServiceProvider;
use Silex\Provider\DoctrineServiceProvider;
use Symfony\Component\Security\Core\Encoder\PlaintextPasswordEncoder;

$app['debug'] = true;

// Setup the serializer
$app['serializer'] = JMS\Serializer\SerializerBuilder::create()
    ->addMetadataDir(__DIR__ . '/../config/serializer')
    ->setCacheDir(__DIR__ . '/../cache')
    ->setDebug($app['debug'])
    ->build();

// Rest
$app->register(new Flintstones\Rest\ServiceProvider(), array(
    'rest.fos.class_path'           => __DIR__.'/vendor',
    'rest.serializer.class_path'    => __DIR__.'/vendor',
));

// Setup orm
$app->register(new DoctrineServiceProvider, array(
    "db.options" => array(
        'dbname'   => 'udj',
        'user'     => 'root',
        'password' => 'root',
        'host'     => 'localhost',
        'driver'   => 'pdo_mysql',
    ),
));

// Security
$app->register(new Silex\Provider\SecurityServiceProvider(), array(
    'security.firewalls' => array(
        'default' => array(
            'security' => true,
            'http' => true,
            'stateless' => true,
            'users' => $app->share(function () use ($app) {
                return new UserProvider($app['orm.em']);
            })
        )
    )
));

$app['security.encoder.digest'] = $app->share(function ($app) {
    return new PlaintextPasswordEncoder();
});

$app->register(new DoctrineOrmServiceProvider, array(
    "orm.em.options" => array(
        "mappings" => array(
            array(
                "type" => "yml",
                "namespace" => "UniversDj\Model",
                "path" => __DIR__."/../config/orm",
            ),
        ),
    ),
));

