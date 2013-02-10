<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use UniversDj\Podcast\Model\Podcast;

$app = new Silex\Application();

include __DIR__ .'/../config/config.php';

$mixshows = $app['controllers_factory'];
$episodes = $app['controllers_factory'];
$djs = $app['controllers_factory'];
$users = $app['controllers_factory'];

$users->post('/auth', function(Request $request) use ($app) {
    return $app['serializer']->serialize(array('user' => $request->get('user')), 'json');
});

$mixshows->get('/', function () use ($app) {
    $mixshows = $app['orm.em']->getRepository("UniversDj\Model\Mixshow")->findAll();
    return $app['serializer']->serialize(array('mixshows' => $mixshows), 'json');
});

$mixshows->get('/{id}', function ($id) use ($app) {
    $mixshow = $app['orm.em']->getRepository("UniversDj\Model\Mixshow")->find($id);
    return $app['serializer']->serialize(array('mixshow' => $mixshow), 'json');
});

$djs->get('/{id}', function ($id) use ($app) {
    $dj = $app['orm.em']->getRepository("UniversDj\Model\Dj")->find($id);
    return $app['serializer']->serialize(array('dj' => $dj), 'json');
});

$episodes->get('/{id}', function ($id) use ($app) {
    $episode = $app['orm.em']->getRepository("UniversDj\Model\Episode")->find($id);
    return $app['serializer']->serialize(array('episode' => $episode), 'json');
});

$app->mount('/episodes', $episodes);
$app->mount('/mixshows', $mixshows);
$app->mount('/users', $users);
$app->mount('/djs', $djs);

$app->after(function (Request $request, Response $response) {
    $response->headers->set('Content-Type', 'application/json');
});

$app->get('/podcast', function() use ($app) {
    $podcast = new Podcast();
    $podcast->setUrl('http://feeds.djpod.com/love-is-the-message');

    $mixshow = $app['orm.em']->getRepository("UniversDj\Model\Mixshow")->find(4);

    $episodes = $mixshow->getEpisodes();

    foreach($podcast->getEpisodes() as $podcastEpisode) {
        $episode = new UniversDj\Model\Episode();
        $episode->setMixshow($mixshow);
        $episode->setName($podcastEpisode->getTitle());
        $episode->setUrl($podcastEpisode->getUrl());
        $episodes[] = $episode;
    }

    $mixshow->setEpisodes($episodes);

    $app['orm.em']->persist($mixshow);
    $app['orm.em']->flush();

    return $app['serializer']->serialize($mixshow, 'json');
});

$app->run();
