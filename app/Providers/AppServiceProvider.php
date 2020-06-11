<?php

namespace App\Providers;

use App\FooterMenu;
use App\HeaderMenu;
use App\Setting;
use App\Slider;
use App\Social;
use Laravel\Passport\Passport;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;


class AppServiceProvider extends ServiceProvider
{

    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    public function register()
    {
        //
    }

    public function boot()
    {
        \Schema::defaultStringLength(191);

        view()->composer('layouts.public', function($view)
        {
            $info = Setting::find(1);
            $header_menus = HeaderMenu::orderBy('pariority')->get();
            $footer_menus = FooterMenu::orderBy('pariority')->get();
            $socials = Social::all();
            $view->with(compact('info','header_menus','footer_menus','socials'));
        });
        $this->registerPolicies();
        Passport::routes();
    }

}
