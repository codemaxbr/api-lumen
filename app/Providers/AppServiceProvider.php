<?php

namespace App\Providers;

use Illuminate\Queue\Events\JobFailed;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Schema::defaultStringLength(191);
    }

    public function boot()
    {
        // Queue::failing(function (JobFailed $event)
        // {
        //     $body = json_decode($event->job->getRawBody());
        //     $payload = unserialize($body->data->command); // Reporta o construct do Job

        //     $task = $payload->task;
        //     $task->failed_job_id = $event->job->getJobId();
        //     $task->save();
        // });

        // DB::listen(function ($query) {
        //     dump($query->sql);
        //     dump($query->bindings);
        //     dump($query->time);
        // });

        // \App\Models\User::  observe(\App\Observers\UserObserver::class);
        // \App\Models\Customer::  observe(\App\Observers\CustomerObserver::class);
        // \App\Models\Invoice::   observe(\App\Observers\InvoiceObserver::class);
        // \App\Models\Metadata::  observe(\App\Observers\MetadataObserver::class);
        // \App\Models\ModulesAccount::  observe(\App\Observers\ModuleAccountObserver::class);
    }
}
