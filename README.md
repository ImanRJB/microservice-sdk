## Milyoona Model Consumer

#### How to install

```bash
composer require milyoona/model-consumer
```

```php
// Add Config Files to app.php
$app->configure('amqp');
$app->configure('consumer');
$app->configure('database');
```

```php
// Register Service Provider to app.php
$app->register(Milyoona\ModelConsumer\ModelConsumerServiceProvider::class);
```

```bash
php artisan vendor:publish --tag=consumer
```

```php
// Change the route in app.php
$app->router->group([
    'namespace' => 'App\Http\Controllers',
    'prefix' => 'v1'
], function ($router) {
    require __DIR__.'/../routes/web.php';
});
```

#### How to publish migrations

Set configs in <code>config/consumer.php</code> and Run this command

```bash
php artisan milyoona:install

// If you want to generate key in .env
php artisan key:generate

// Config your database information in .env then run this command
php artisan migrate
```

#### How to <code>publish</code> on queue

```php
// In Repository
Amqp::publish( 'users', json_encode( ['method' => 'store', 'data' => $user->setAppends([])] ) ); // method: store, update, delete, forceDelete

return $user->setAppends( ['full_name'] );
```

#### How to <code>consume</code> from queue

```bash
php artisan milyoona:consume
```