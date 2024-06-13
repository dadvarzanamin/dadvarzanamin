<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Dashboard\Permission;
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
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        foreach ($this->getPermissions() as $permission) {
            Gate::define($permission->slug , function ($user) use($permission){
                return $user->hasRole($permission->roles);
            });
        }
    }
    protected function getPermissions()
    {
        return Permission::with('roles')->get();
    }
}
