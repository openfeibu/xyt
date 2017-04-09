<?php

namespace Frozennode\Administrator;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use Frozennode\Administrator\DataTable\DataTable;
use Illuminate\Support\Facades\Validator as LValidator;
use Frozennode\Administrator\Fields\Factory as FieldFactory;
use Frozennode\Administrator\Config\Factory as ConfigFactory;
use Frozennode\Administrator\Actions\Factory as ActionFactory;
use Frozennode\Administrator\DataTable\Columns\Factory as ColumnFactory;

class AdministratorServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../../views', 'administrator');
        /*
        $this->mergeConfigFrom(
            __DIR__.'/../../config/administrator.php', 'administrator'
        );
        */

        $this->loadTranslationsFrom(__DIR__.'/../../lang', 'administrator');

        /*
        $this->publishes([
            __DIR__.'/../../config/administrator.php' => config_path('administrator.php'),
        ]);
        */

        //$this->publishes([
        //    __DIR__.'/../../config/administrator' => app_path('administrator'),
        //]);

        //$this->publishes([
        //    __DIR__.'/../../../public' => public_path('packages/hifone/dashboard'),
        //], 'public');

        //set the locale
        $this->setLocale();

        $this->app['events']->fire('administrator.ready');
    }

    /**
     * Register the service provider.
     */
    public function register()
    {
        //include our view composers, and routes to avoid issues with catch-all routes defined by users
        include __DIR__.'/../../viewComposers.php';
        include __DIR__.'/../../routes.php';

        //the admin validator
        $this->app['admin_validator'] = $this->app->share(function ($app) {
            //get the original validator class so we can set it back after creating our own
            $originalValidator = LValidator::make(array(), array());
            $originalValidatorClass = get_class($originalValidator);

            //temporarily override the core resolver
            LValidator::resolver(function ($translator, $data, $rules, $messages) use ($app) {
                $validator = new Validator($translator, $data, $rules, $messages);
                $validator->setUrlInstance($app->make('url'));

                return $validator;
            });

            //grab our validator instance
            $validator = LValidator::make(array(), array());

            //set the validator resolver back to the original validator
            LValidator::resolver(function ($translator, $data, $rules, $messages) use ($originalValidatorClass) {
                return new $originalValidatorClass($translator, $data, $rules, $messages);
            });

            //return our validator instance
            return $validator;
        });
        $arr = include __DIR__.'/../../config/administrator.php';

        //set up the shared instances
		//Frozennode\Administrator\Config\Factory
        $this->app['admin_config_factory'] = $this->app->share(function ($app) use ($arr){
			
            return new ConfigFactory($app->make('admin_validator'), LValidator::make(array(), array()), $arr);
        });
		//Frozennode\Administrator\Fields\Factory
        $this->app['admin_field_factory'] = $this->app->share(function ($app) {
            return new FieldFactory($app->make('admin_validator'), $app->make('itemconfig'), $app->make('db'));
        });
		//Frozennode\Administrator\DataTable\DataTable
        $this->app['admin_datatable'] = $this->app->share(function ($app) use($arr) {
            $dataTable = new DataTable($app->make('itemconfig'), $app->make('admin_column_factory'), $app->make('admin_field_factory'));
            $dataTable->setRowsPerPage($app->make('session.store'), $arr['global_rows_per_page']);

            return $dataTable;
        });
		//Frozennode\Administrator\DataTable\Columns\Factory 
        $this->app['admin_column_factory'] = $this->app->share(function ($app) {
            return new ColumnFactory($app->make('admin_validator'), $app->make('itemconfig'), $app->make('db'));
        });
		//Frozennode\Administrator\Actions\Factory
        $this->app['admin_action_factory'] = $this->app->share(function ($app) {
            return new ActionFactory($app->make('admin_validator'), $app->make('itemconfig'), $app->make('db'));
        });

        $this->app['admin_menu'] = $this->app->share(function ($app) {
            return new Menu($app->make('config'), $app->make('admin_config_factory'));
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array('admin_validator', 'admin_config_factory', 'admin_field_factory', 'admin_datatable', 'admin_column_factory',
            'admin_action_factory', 'admin_menu', );
    }

    /**
     * Sets the locale if it exists in the session and also exists in the locales option.
     */
    public function setLocale()
    {
        $locale = app('session')->get('administrator_locale');

        if ($locale) {
            $this->app->translator->setLocale($locale);
        }
    }
}
