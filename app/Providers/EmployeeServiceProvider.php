<?php

namespace App\Providers;


use App\Services\EmployeeManagement\Employee;

use App\Services\EmployeeManagement\EmployeeService;
use Illuminate\Support\ServiceProvider;

class EmployeeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(Employee::class, EmployeeService::class);

    }
}
