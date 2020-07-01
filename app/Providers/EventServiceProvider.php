<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        'App\Events\NewOrderPlaced' => [
            'App\Listeners\DecreaseAvaliableItemsCounty',
            'App\Listeners\NewUserOrderNotification',
            'App\Listeners\RemoveWishlistItemIfBought',
            'App\Listeners\CreateShipment',
        ],
        'App\Events\ShipmentUpdate' => [
            'App\Listeners\NotifyUserOfShipmentChanges',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
