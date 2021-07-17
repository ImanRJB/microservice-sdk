## Milyoona Model Consumer

#### How to install

```bash
composer require milyoona/microservice-sdk
```

###### Register the Service Provider in bootstrap/app.php for <code>Lumen</code>:

```php
$app->register(Milyoona\MicroserviceSdk\MicroserviceSdkServiceProvider::class);
```
  
###### Publish configuration files:

```bash
php artisan vendor:publish --tag=microservice-sdk
```
  
###### Set prefix in route for <code>Lumen</code>:

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

php artisan migrate
```

#### How to <code>publish</code> a message

```php
// In Repository
Amqp::publish( 'users', json_encode( ['method' => 'store', 'data' => $user->setAppends([])] ) ); // method: store, update, delete, forceDelete

return $user->setAppends( ['full_name'] );
```

#### How to <code>consume</code> messages

```bash
php artisan milyoona:consume
```

#### Use these directives for <code>amqp configs</code> in .env file

```dotenv
AMQP_HOST=
AMQP_PORT=
AMQP_USER=
AMQP_PASSWORD=
```

#### Use these directives for <code>JWT configs</code> in .env file

```dotenv
JWT_SECRET=GKPMVOCKpMCDJQ3GprVA0EfTKGJiTEAImjeKN009Vndls6oRD6raawkRzDoB97AI
JWT_LIFETIME=2
```