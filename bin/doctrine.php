<?php

require_once __DIR__ . '/../vendor/autoload.php';

$app = new Silex\Application();

include __DIR__ . '/../config/config.php';

$helperSet = new Symfony\Component\Console\Helper\HelperSet(array(
    'db' => new \Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper($app['orm.em']->getConnection()),
    'em' => new \Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper($app['orm.em'])
));

$commands = array();

\Doctrine\ORM\Tools\Console\ConsoleRunner::run($helperSet, $commands);
