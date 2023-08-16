<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Policies\TaskPolicy;
use App\Models\Task;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Task::class => TaskPolicy::class,
    ];

    public function boot()
    {
        $this->registerPolicies();

        Gate::define('task-ownership', [TaskPolicy::class, 'checkOwnership']);
    }
}
