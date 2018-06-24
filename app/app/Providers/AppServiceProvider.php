<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Schema;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
	  Schema::defaultStringLength(191);
                  //Add this custom validation rule.
        Validator::extend('alpha_spaces', function ($attribute, $value) {
            // This will only accept alpha and spaces.
            // If you want to accept hyphens use: /^[\pL\s-]+$/u.
            return preg_match('/^[\pL\s-\s_]+$/u', $value);
        });
        Validator::extend('phone', function ($attribute, $value) {
            // This will only accept alpha and spaces.
            // If you want to accept hyphens use: /^[\pL\s-]+$/u.
            return preg_match('/^\+?\d+$/', $value);
        });
        Validator::extend('alpha_num_spaces',function($attribut, $value){
            
            return preg_match('/^[a-z0-9 .\-]+$/i', $value);
        });
        
        Validator::extend('grade', function ($attribute, $value) {
            // This will only accept alpha and spaces.
            // If you want to accept hyphens use: /^[\pL\s-]+$/u.
            return preg_match('/^[0-9]*\.{0,1}[0-9]{1,3}\%?$/', $value);
        });

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
