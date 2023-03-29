<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Client::class => ClientPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        /**
         * Collection of gates to check if user is owner of clients
         */

         /**
          * Check is user owner of client and can display client 
          */
        Gate::define('client-show', function ($user, $client) {
            return $user->id == $client->id_user;
        });

          /**
          * Check is user owner of client and can update client 
          */
          Gate::define('client-update', function ($user, $client) {
            return $user->id == $client->id_user;
        });

          /**
          * Check is user owner of client and can show form to edit client's data 
          */
          Gate::define('client-edit', function ($user, $client) {
            return $user->id == $client->id_user;
        });

           /**
          * Check is user owner of client and can delete client 
          */
          Gate::define('client-delete', function ($user, $client) {
            return $user->id == $client->id_user;
        });
    }
}
