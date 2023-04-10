<?php

namespace Hankin\LaravelComment;

use Illuminate\Support\ServiceProvider;

class CommentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $config_file = __DIR__ . "/../config/comment.php";

        $this->publishes([
            $config_file => config_path('comment.php')
        ], 'config');

        $this->mergeConfigFrom($config_file, 'comment');

        if(!class_exists('CreateCommentsTable')){
            $timestamp = date('Y_m_d_His', time());

            $this->publishes([
                __DIR__ . '/../database/migrations/create_comments_table.php.stub.stub' =>
                    database_path("migrations/{$timestamp}_create_comments_table.php")
            ], 'migrations');
        }
    }
}
