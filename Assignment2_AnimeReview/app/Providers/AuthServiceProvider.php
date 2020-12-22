<?php

namespace App\Providers;

use App\User;
use App\Review;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Only moderator->2 can perform action
        Gate::define('moderator_only', function($user){
            return $user->type_id == 2;
        });
        
        // Only moderator->2 and (regular user->1 if review is their own review) can perfom review action
        Gate::define('user_review', function($user, \App\Review $review){
            if($user->type_id == 2){
                return true;
            }
            elseif($user->id == $review->user_id){
                return true;
            }
            return false;
        });
    }
}
