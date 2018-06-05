<?php

namespace lovizu\LaravelNaverXmlRpc;

use Illuminate\Support\ServiceProvider;

class LaravelNaverXmlRpcServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     */
    public function boot()
    {
        $configFile = __DIR__ . '/../config/naver-blog.php';
        $this->publishes([
            $configFile => config_path('naver-blog.php')
        ]);

        $this->mergeConfigFrom($configFile, 'naverBLog');
    }

    /**
     * Register any package services.
     */
    public function register()
    {
        $this->app->bind('naver-blog', function ($app) {
            $config = $app->make('config');
            $blogId = $config->get('naverBLog.naver.id');
            $blogPass = $config->get('naverBLog.naver.pass');
            $isSecret = $config->get('naverBLog.naver.secret');
            return new LaravelNaverXmlRpc($blogId, $blogPass, $isSecret);
        });
    }
}
