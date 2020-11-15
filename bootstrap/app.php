<?php

require_once __DIR__.'/../vendor/autoload.php';

try {
    (new Dotenv\Dotenv(dirname(__DIR__)))->load();
} catch (Dotenv\Exception\InvalidPathException $e) {
    //
}

/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
|
| Here we will load the environment and create the application instance
| that serves as the central piece of this framework. We'll use this
| application as an "IoC" container and router for this framework.
|
*/

$app = new Laravel\Lumen\Application(
    dirname(__DIR__)
);

$app->instance('path.config', app()->basePath() . DIRECTORY_SEPARATOR . 'config');
$app->instance('path.storage', env('APP_STORAGE', app()->basePath() . DIRECTORY_SEPARATOR . 'storage'));
$app->instance('path.public', app()->basePath() . DIRECTORY_SEPARATOR . 'public');

/*
 * ------------------------------------------------------------------------
 * Files config
 * ------------------------------------------------------------------------
 */

$app->configure('database');
$app->configure('cors');
$app->configure('cache');
$app->configure('filesystems');
$app->configure('broadcasting');
$app->configure('models');
$app->configure('sentry');
$app->configure('session');
$app->configure('queue');
$app->configure('swoole_http');
$app->configure('swoole_websocket');
/*
 * ------------------------------------------------------------------------
 * Insert yours Providers in here
 * ------------------------------------------------------------------------
 */
$app->register(Jenssegers\Mongodb\MongodbServiceProvider::class);
$app->register(Fruitcake\Cors\CorsServiceProvider::class);
$app->register(Illuminate\Notifications\NotificationServiceProvider::class);


$app->withFacades(true, [
    'Illuminate\Support\Facades\Notification' => 'Notification',
]);
$app->withEloquent();

/*
|--------------------------------------------------------------------------
| Register Container Bindings
|--------------------------------------------------------------------------
|
| Now we will register a few bindings in the service container. We will
| register the exception handler and the console kernel. You may add
| your own bindings here if you like or you can make another file.
|
*/

$app->singleton(
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    App\Exceptions\Handler::class
);

$app->singleton(
    Illuminate\Contracts\Console\Kernel::class,
    App\Console\Kernel::class
);

$app->singleton('filesystem', function ($app) {
    return $app->loadComponent(
        'filesystems',
        Illuminate\Filesystem\FilesystemServiceProvider::class,
        'filesystem'
    );
});

/*
|--------------------------------------------------------------------------
| Register Middleware
|--------------------------------------------------------------------------
|
| Next, we will register the middleware with the application. These can
| be global middleware that run before and after each request into a
| route or middleware that'll be assigned to some specific routes.
|
*/

$app->middleware([
    // App\Http\Middleware\ExampleMiddleware::class
    Fruitcake\Cors\HandleCors::class,
]);

$app->routeMiddleware([
    'auth'          => App\Http\Middleware\Authenticate::class,
    //'jwt.auth'      => App\Http\Middleware\JwtMiddleware::class,
]);

/*
|--------------------------------------------------------------------------
| Register Service Providers
|--------------------------------------------------------------------------
|
| Here we will register all of the application's service providers which
| are used to bind services into the container. Service providers are
| totally optional, so you are not required to uncomment this line.
|
*/

$app->register(App\Providers\AppServiceProvider::class);
$app->register(App\Providers\EventServiceProvider::class);
$app->register(Flipbox\LumenGenerator\LumenGeneratorServiceProvider::class);
$app->register(Prettus\Repository\Providers\LumenRepositoryServiceProvider::class);
$app->register(Webpatser\Uuid\UuidServiceProvider::class);
$app->register(Reliese\Coders\CodersServiceProvider::class);
$app->register(Illuminate\Filesystem\FilesystemServiceProvider::class);
$app->register(Illuminate\Notifications\NotificationServiceProvider::class);
$app->register(VladimirYuldashev\LaravelQueueRabbitMQ\LaravelQueueRabbitMQServiceProvider::class);

$app->register(SwooleTW\Http\LumenServiceProvider::class);
$app->register(Sentry\Laravel\ServiceProvider::class);

// $app->register(App\Providers\AuthServiceProvider::class);

/*
|--------------------------------------------------------------------------
| Load The Application Routes
|--------------------------------------------------------------------------
|
| Next we will include the routes file so that they can all be added to
| the application. This will provide all of the URLs the application
| can respond to, as well as the controllers that may handle them.
|
*/

$app->router->group([
    'namespace' => 'App\Http\Controllers',
], function ($router) {
    require __DIR__.'/../routes/web.php';
});

return $app;
