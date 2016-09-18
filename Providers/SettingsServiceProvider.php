<?php

/*
 * =============================================================================
 *
 * Collabmed Solutions Ltd
 * Project: Collabmed Health Platform
 * Author: Samuel Okoth <sodhiambo@collabmed.com>
 *
 * =============================================================================
 */

namespace Ignite\Settings\Providers;

use Ignite\Settings\Library\Settings;
use Ignite\Settings\Repositories\CacheSettingsDecorator;
use Ignite\Settings\Repositories\EloquentSettingsRepository;
use Ignite\Settings\Facades\Settings as SettingsFacade;
use Ignite\Settings\Repositories\SettingsRepository;
use Illuminate\Foundation\AliasLoader;
use Ignite\Core\Contracts\Settings as SettingsContract;
use Ignite\Settings\Entities\Settings as SettingsModel;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class SettingsServiceProvider extends ServiceProvider {

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * @var array
     */
    protected $middleware = [
        'Settings' => [
            'setup' => 'PracticeSetupMiddleware',
        ],
    ];

    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot() {
        $this->registerBindings();
        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();
        $this->registerMiddleware();

        $this->app['setting.settings'] = $this->app->share(function ($app) {
            return new Settings($app[SettingsRepository::class]);
        });

        $this->app->booting(function () {
            $loader = AliasLoader::getInstance();
            $loader->alias('Setting', SettingsFacade::class);
        });
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register() {
        //
    }

    private function registerMiddleware() {
        foreach ($this->middleware as $module => $middlewares) {
            foreach ($middlewares as $name => $middleware) {
                $class = "Ignite\\{$module}\\Http\\Middleware\\{$middleware}";
                $this->app['router']->middleware($name, $class);
            }
        }
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig() {
        $this->publishes([
            __DIR__ . '/../Config/config.php' => config_path('settings.php'),
        ]);
        $this->mergeConfigFrom(
                __DIR__ . '/../Config/config.php', 'settings'
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews() {
        $viewPath = base_path('resources/views/modules/settings');

        $sourcePath = __DIR__ . '/../Resources/views';

        $this->publishes([
            $sourcePath => $viewPath
        ]);

        $this->loadViewsFrom(array_merge(array_map(function ($path) {
                            return $path . '/modules/settings';
                        }, \Config::get('view.paths')), [$sourcePath]), 'settings');
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations() {
        $langPath = base_path('resources/lang/modules/settings');

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, 'settings');
        } else {
            $this->loadTranslationsFrom(__DIR__ . '/../Resources/lang', 'settings');
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides() {
        return [];
    }

    private function registerBindings() {
        $this->app->bind(SettingsRepository::class, function () {
            $repository = new EloquentSettingsRepository(new SettingsModel());
            if (!config('app.cache')) {
                return $repository;
            }
            return new CacheSettingsDecorator($repository);
        });
        $this->app->bind(
                SettingsContract::class, Settings::class
        );
    }

}
