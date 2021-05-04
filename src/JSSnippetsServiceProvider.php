<?php

namespace Nanuc\JSSnippets;

use Illuminate\Support\ServiceProvider;
use Nanuc\JSSnippets\View\Components\Snippet;

class JSSnippetsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/js-snippets.php' => config_path('js-snippets.php'),
        ], 'config');

        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

        $this->loadViewComponentsAs('js', [
            Snippet::class,
        ]);
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/js-snippets.php', 'js-snippets');
    }
}
