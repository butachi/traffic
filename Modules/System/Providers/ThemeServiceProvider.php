<?php namespace Modules\System\Providers;

use Illuminate\Support\ServiceProvider;

class ThemeServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     * @return void
     */
    public function register()
    {
        $this->app->booted(function () {
            $this->registerAllThemes();
            $this->setActiveTheme();
        });
    }

    /**
     * Set the active theme based on the settings
     */
    private function setActiveTheme()
    {
        if ($this->inAdministration()) {
            $themeName = $this->app['config']->get('beputi.core.config.admin-theme');
            return $this->app['stylist']->activate($themeName, true);
        }
        //$themeName = $this->app['setting.settings']->get('core::template', null, 'Flatly');
        return $this->app['stylist']->activate('Butachi', true);
    }

    /**
     * Check if we are in the administration
     * @return bool
     */
    private function inAdministration()
    {
        $segment = config('laravellocalization.hideDefaultLocaleInURL', false) ? 1 : 2;

        return $this->app['request']->segment($segment) === $this->app['config']->get('beputi.core.config.admin-prefix');
    }

    /**
     * Register all themes with activating them
     */
    private function registerAllThemes()
    {
        $directories = $this->app['files']->directories(config('stylist.themes.paths', [base_path('/Themes')])[0]);
        foreach ($directories as $directory) {
            $this->app['stylist']->registerPath($directory);
        }
    }
}
