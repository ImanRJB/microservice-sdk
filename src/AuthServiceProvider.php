<?php

namespace Milyoona\MicroserviceSdk;

use Carbon\Carbon;
use Firebase\JWT\JWT;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app['auth']->viaRequest('api', function ($request) {
            $token = $request->bearerToken();
            if ($token) {
                try {
                    $decoded = JWT::decode($token, config('jwt.jwt_secret'), array('HS256'));
                    if ($decoded->expires_in < Carbon::now()) {
                        return;
                    }
                    $model = '\\App\\Models\\User';
                    $user = $model::find($decoded->user->id);
                    if ($user) {
                        return $user;
                    } else {
                        return;
                    }
                } catch (\Exception $exception) {
                    return;
                }
            }
        });
    }
}
