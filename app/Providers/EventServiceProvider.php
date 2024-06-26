<?php 
// app/Providers/EventServiceProvider.php

namespace App\Providers;

use App\Events\TransactionCreated;
use App\Listeners\LogTransaction;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        TransactionCreated::class => [
            LogTransaction::class,
        ],
    ];

    public function boot()
    {
        parent::boot();
    }
}

?>