<?php
/**
 * Created by PhpStorm.
 * User: zhuxiaoliang
 * Date: 2017/7/14
 * Time: 下午11:23
 */
require __DIR__.'/../vendor/autoload.php';
$app = new Illuminate\Container\Container;
with(new Illuminate\Events\EventServiceProvider($app))->register();
with(new Illuminate\Routing\RoutingServiceProvider($app))->register();

require __DIR__.'/../app/Http/routes.php';

$request = Illuminate\Http\Request::createFromGlobals();

$response = $app['router']->dispatch($request);

$response->send();