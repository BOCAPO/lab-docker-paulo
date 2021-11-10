<?php

namespace Invoque\Zeus;

use Illuminate\Support\ServiceProvider;
use Invoque\Zeus\Livewires\ActionButtonComponent;
use Invoque\Zeus\Livewires\loadingGridComponent;

class ZeusServiceProvider extends ServiceProvider
{
    public function boot(){
        include __DIR__.'/routes.php';
    }

    public function register(){
        // register our controller
        //$this->app->make('Invoque\Zeus\Controllers\ZeusBaseController');
        $this->loadViewsFrom(__DIR__.'/views', 'zeus');

        \Livewire\Livewire::component('zeus:actionButton', ActionButtonComponent::class);
    }
}
