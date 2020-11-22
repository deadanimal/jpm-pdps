<?php

namespace App\Providers;

use App\Tag;
use App\Item;
use App\Role;
use App\User;
use App\Category;
use App\Program;
use App\Profil;
use App\Policies\TagPolicy;
use App\Policies\ItemPolicy;
use App\Policies\RolePolicy;
use App\Policies\UserPolicy;
use App\Policies\CategoryPolicy;
use App\Policies\ProgramPolicy;
use App\Policies\ProfilPolicy;
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
        User::class => UserPolicy::class,
        Category::class => CategoryPolicy::class,
        Item::class => ItemPolicy::class,
        Role::class => RolePolicy::class,
        Tag::class => TagPolicy::class,
        Program::class => ProgramPolicy::class,
        Media::class => MediaPolicy::class,
        Orgdata::class => OrgdataPolicy::class,
        Profil::class => ProfilPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('manage-items', 'App\Policies\UserPolicy@manageItems');
        Gate::define('manage-users', 'App\Policies\UserPolicy@manageUsers');
        Gate::define('manage-user-admin', 'App\Policies\UserPolicy@manageUsersAdmin');
        Gate::define('manage-user-agensi', 'App\Policies\UserPolicy@manageUsersAgensi');
        Gate::define('manage-report-admin', 'App\Policies\UserPolicy@manageReportAdmin');
        Gate::define('manage-report-agensi', 'App\Policies\UserPolicy@manageReportAgensi');
    }
}
