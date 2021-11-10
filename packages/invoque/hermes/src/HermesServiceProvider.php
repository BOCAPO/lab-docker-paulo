<?php

namespace Invoque\Hermes;

use Illuminate\Support\ServiceProvider;
use Invoque\Hermes\Http\Livewire\Menu\MenuSideBarComponent;
use Invoque\Hermes\Http\Livewire\Menu\MenuNodeComponent;
use Invoque\Hermes\Http\Livewire\Menu\MenuTreeComponent;
use Invoque\Hermes\Http\Livewire\Security\Profiles\ProfilesGridComponent;
use Invoque\Hermes\Http\Livewire\Security\Profiles\ProfilesComponent;
use Invoque\Hermes\Http\Livewire\Security\Users\UsersComponent;
use Invoque\Hermes\Http\Livewire\Security\Users\UsersGripComponent;

class HermesServiceProvider extends ServiceProvider
{
    public function boot(){
        include __DIR__.'/routes.php';
    }

    public function register(){
        if (is_dir(__DIR__ . '/Views')) {
            $this->loadViewsFrom(__DIR__ . '/Views', 'Hermes');
        }

        if (is_dir(__DIR__ . '/Database/Migrations')) {
            $this->loadMigrationsFrom(__DIR__ . '/Database/Migrations');
        }

        \Livewire\Livewire::component('hermes:menuSideBar', MenuSideBarComponent::class);

        \Livewire\Livewire::component('hermes:security:profiles', ProfilesComponent::class);
        \Livewire\Livewire::component('hermes:security:profiles.grid', ProfilesGridComponent::class);

        \Livewire\Livewire::component('hermes:security:users', UsersComponent::class);
        \Livewire\Livewire::component('hermes:security:users.grid', UsersGripComponent::class);

        // register our controller
        //$this->app->make('Invoque\Hermes\Http\Controllers\AuthController');
    }
}
