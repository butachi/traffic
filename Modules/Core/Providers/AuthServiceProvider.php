<?php namespace Modules\Core\Providers;

use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider {

    public function boot()
    {

    }

    public function register()
    {

    }

    /**
     * Garbage collect activations and reminders.
     *
     * @return void
     */
    protected function garbageCollect()
    {
        $config = $this->app['config']->get('core.activations.lottery');

        $this->sweep($this->app['pChi.activations'], $config);

        $config = $this->app['config']->get('core.reminders.lottery');

        $this->sweep($this->app['pChi.reminders'], $config);
    }
} 