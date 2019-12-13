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

    // Registered::class => [
        //     SendEmailVerificationNotification::class,
        // ],
    protected $listen = [
        // ApprovalEvent::class =>[
        //     \App\Listeners\ApprovalEvent\ApprovalListener::class,
        // ],
        //have to use App\Events\ApprovalEvent for using like this
        'App\Events\ApprovalEvent' => [
            'App\Listeners\ApprovalEvent\ApprovalListener',

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
